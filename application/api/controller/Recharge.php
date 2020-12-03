<?php

namespace app\api\controller;

use think\Controller;
use think\Db;

Class Recharge extends Controller
{
    private $merchant;
    private $appid = 'qA4XGRC6mWplWVho';
    private $key = 'xBmrxxDCFGsyxW5AIVAsEvQ';
    private $mid = 'EU85200932P3Q';

    protected function _initialize()
    {
        file_put_contents("./data/request.txt"," - ".json_encode(input('post.')).date("Y-m-d H:i:s", time()),FILE_APPEND);
        $this->checkSign(input('post.'));
        // echo json_encode(array('status'=>0,'err'=>input('post.sign')));
        $this->merchant = Db::name('merchant')->where(array('appid'=>$this->appid))->find();
    }

    public function requestTraderRecharge()
    {
        $data = input('post.');
        if(empty($data['beforenumber']) || $data['beforenumber'] <= 0){
            $this->myerror('请输入正确的充值数量');
        }
        if(empty($data['price']) || $data['price'] <= 0){
            $this->myerror('请输入正确的充值数量');
        }
        if(empty($data['receiveUrl'])){
            $this->myerror('回调地址不正确');
        }
        if(empty($data['signType'])){
            $this->myerror('签名类型不正确');
        }
        if(empty($data['customerId'])){
            $this->myerror('客户账号不正确');
        }

        if(empty($data['intime'])){
            $this->myerror('订单创建时间不正确');
        }

        if(empty($data['payno'])){
            $this->myerror('订单号不能为空');
        }
        if(empty($data['mid'])){
            $this->myerror('商户标识错误');
        }
        if(empty($data['orderCurrency'])){
            $this->myerror('货币类型错误');
        }
        $find = Db::name('order_buy')->where('orderid', $data['payno'])->find();
        if(!empty($find)){
            $this->myerror('订单号已存在，请勿重复提交');
        }
        $address = Db::name('merchant_user_address')->where('username', $data['customerId'])->value('address');
        if (empty($address)) {
            $res = $this->newAddress($data['customerId']);
            $address = $res['ads'];
            $key = bind_address($res);
            Db::name('merchant_user_address')->where('username', $data['customerId'])->update(['key' => $key]);
        }
        $pk_num = Db::table('think_config')->where('name', 'pk_waiting_finished_num')->value('value');//盘口订单限制
        $trader_limit = Db::table('think_config')->where('name', 'trader_pp_max_unfinished_order')->value('value');
        if($pk_num > 0){
            $count = Db::name('order_buy')->where('buy_id', $this->merchant['id'])->where('status', 'in', [0,1])->count();
            if($count >= $pk_num){
                $this->myerror('您有未完成的订单');
            }
        }
        //设置交易员在线状态
        $ids = Db::name('login_log')->where('online=1 and unix_timestamp(now())-update_time<1800')->column('merchant_id');
        $sql = 'Update think_merchant set online=0';
        $result=Db::query($sql);
        Db::name('merchant')->where('id', 'in', $ids)->update(['online'=>1]);
        //系统自动选择在线的交易员和能够交易这个金额的交易员
        $where['state'] = 1;
        $where['min_limit'] = ['elt', $data['price']];
        $where['max_limit'] = ['egt', $data['price']];
        //判断是否商户匹配交易
        $pptrader = $this->merchant['pptrader'];

        $pptraderarray = explode(',', $pptrader);
        if(!empty($pptrader) && is_array($pptraderarray)){
            $where['c.id'] = ['in', $pptraderarray];
        }
        $join=[
            ['__MERCHANT__ c','a.userid=c.id','LEFT'],
        ];
        $ads = Db::name('ad_sell')->field('a.*, c.id as traderid, c.mobile, c.usdt')->alias('a')->join($join)->group('a.id')->where($where)->order('online desc,price asc,averge asc,pp_amount asc,id asc')->select();

        $onlinead = array();
        $actualamount = 0;
        //	$this->myerror(json_encode($ads));
        // dump($ads);
        // $this->myerror($where);

        foreach($ads as $k=>$v){
            //开始判断广告剩余
            $total = Db::name('order_buy')->where('sell_sid', $v['id'])->where('status','neq',5)->where('status','neq',9)->sum('deal_num');

            $actualamount = $data['beforenumber'];

            if(($v['amount'] - $total) < $actualamount || $v['usdt'] < $actualamount){
                //dump(1);die;
                continue;
            }
            //判断交易员是否被其它盘口设置过
            if(empty($pptrader)){
                $find = Db::name('merchant')->where('pptrader', 'like', '%'.$v['traderid'].'%')->find();
                if(!empty($find)){
                    continue;
                }

            }
            //判断未完成的单子
            $trader_count = Db::name('order_buy')->where('sell_id', $v['traderid'])->where('status', 'in', [0, 1])->count();
            if($trader_limit && $trader_count >= $trader_limit){
                //dump($trader_limit);die;
                continue;
            }
            $onlinead = $v;
            break;
        }
        if(empty($onlinead)){
            $this->myerror('没有可以匹配的交易广告');
        }

        // $this->myerror($onlinead);
        //开始冻结交易员usdt
        Db::startTrans();
        try{
            $rs1 = Db::table('think_merchant')->where('id', $onlinead['traderid'])->setDec('usdt', $actualamount);
            $rs3 = Db::table('think_merchant')->where('id', $onlinead['traderid'])->setInc('usdtd', $actualamount);
            $rs4 = Db::table('think_merchant')->where('id', $onlinead['traderid'])->setInc('pp_amount', 1);
            $address = Db::name('merchant_usdt')->where('id', $onlinead['pay_method4'])->find();
            $rs2 = Db::table('think_order_buy')->insertGetId(array(
                'buy_id'=>$this->merchant['id'],//接口请求时,返回商户的id,放行时增加商户的USDT,有疑问?!
                // 'buy_id'=>'',//暂时改成空
                'sell_id'=>$onlinead['traderid'],
                'sell_sid'=>$onlinead['id'],
                'deal_amount'=>$data['price'],
                'deal_num'=>$actualamount,
                'deal_price'=>$onlinead['price'],
                'ctime'=>time(),
                'ltime'=>6,
                'deal_ctype'=>$data['orderCurrency'] == 'CNY' ? 0 : 1,
                'order_no'=>$data['payno'],
                'buy_username'=>$data['customerId'],
                'buy_address'=>$address['address'],
                'return_url'=>'',
                'notify_url'=>$data['receiveUrl'],
                'orderid'=>$data['payno'],
                'status'=>0,
                'mess'=>1,
            ));

            if($rs1 && $rs2 && $rs3 && $rs4){
                // 提交事务
                Db::commit();
                //todo 发送短信给交易员
                /*  if(!empty($onlinead['mobile'])){
                      $content = str_replace('{usdt}',$actualamount,config('send_message_content'));
                      send_moble($onlinead['mobile'], $content);
                  }*/
                $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
                $url = $http_type . $_SERVER['HTTP_HOST'] . '/merchant/pay?id='.$rs2.'&appid='.$this->appid;
                $this->mysuccess($url);
            }else{
                // 回滚事务
                Db::rollback();
                $this->myerror('提交失败');
            }
        } catch (\think\Exception\DbException $e) {
            // 回滚事务
            Db::rollback();
            $this->myerror('提交失败，参考信息：'.$e->getMessage());
        }
    }

    private function mysuccess($data){
        $return = array(
            'code' => 1,    /* 返回状态，200 成功，500失败 */
            'data' => ['url' => $data],
        );
        echo json_encode($return);die;
    }
    private function myerror($message){
        $return = array(
            'code' => 0,    /* 返回状态，200 成功，500失败 */
            'err' => $message,
        );
        echo json_encode($return);die;
    }

    public function checkSign($data)
    {
        $sign=MD5('payno='.$data['payno'].'|intime='.$data['intime'].'|beforenumber='.$data['beforenumber'].'|price='.$data['price'].'|customerId='.$data['customerId'].'|signType='.$data['signType'].'|orderCurrency='.$data['orderCurrency'].'|receiveUrl='.$data['receiveUrl'].'|mid='.$this->mid.$this->key);
        if ($data['sign'] !== $sign) {
            echo json_encode(array('status'=>0,'err'=>'签名错误'.__LINE__));
            die;
        }
    }

    public function newAddress($username)
    {

        $address=Db::name('address')->where(array('status'=>0,'type'=>'eth'))->find();
        if ($address) {
            $rs = Db::name('merchant_user_address')->insertGetId(['merchant_id'=>$this->merchant['id'], 'username'=>$username, 'address'=>$address['address'], 'addtime'=>time()]);
            if($rs){
                $mp['status']=1;
                $mp['uid']=$this->merchant['id'];
                Db::table('think_address')->where('address',$address['address'])->update($mp);
                if($this->merchant['pid'] > 0){
                    $request_param = "username=>".$username;
                    apilog($this->merchant['pid'], $this->merchant['id'], '生成地址', $request_param, $address['address']);
                }
                return ['ads' => $address['address'], 'uid' => $rs];
            }else{
                return $this->myerror('数据库更新失败');
            }
        } else {
            return $this->myerror('生成钱包地址失败');
        }
    }
    
    

}