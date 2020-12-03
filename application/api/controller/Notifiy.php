<?php
namespace app\api\controller;

use app\home\model\MerchantModel;
use app\home\model\OrderModel;
use think\Controller;
use think\Db;

Class Notifiy extends Controller
{
    public function index()
    {
        $params = $this->request->param();
        file_put_contents("./data/usdt.txt"," - ".json_encode($params).date("Y-m-d H:i:s", time()),FILE_APPEND);
        $user = Db::name('merchant_user_address')->where('key', $params['sign'])->find();
        if(empty($user)) {
            return $this->error('用户不存在');
        }
        $order = Db::name('order_buy')->where('buy_username', $user['username'])->where('buy_address', $user['address'])->where('deal_num', $params['Value']+3)->order('ctime', 'desc')->find();
        if (empty($order)) {
            return $this->error('订单不存在');
        } 
        if($order['ctime']+ 60 * 30 < time()) {
            return $this->error('订单已过期');
        }
        
        
        $this->sfbtc_ajax($order['id'], $order['sell_id']);
        
    }

    public function sfbtc_ajax($id, $sell_id)
    {//放行usdt

            $model = new OrderModel();
            $model2 = new MerchantModel();
            $where['id'] = $id;
            $where['sell_id'] = $sell_id;
            $orderinfo = $model->getOne($where);
            if(empty($orderinfo)){
                $this->error('订单不存在');
            }
            if($orderinfo['status']==5){
                $this->error('订单已经被取消');
            }
            if($orderinfo['status']==6){
                $this->error('订单申诉中，无法释放');
            }
            if($orderinfo['status']==0){//20190830修改,不打款,也可以确认
                $nopay=1;//20190830修改
                // $this->error('此订单对方已经拍下还未付款');
            }else{
                $nopay=0;
            }
            if($orderinfo['status']>=3){
                $this->error('此订单已经释放无需再次释放');
            }
            $merchant = $model2->getUserByParam(session('uid'), 'id');
            $buymerchant = $model2->getUserByParam($orderinfo['buy_id'], 'id');
            if($merchant['usdtd'] < $orderinfo['deal_num']){
                $this->error('您的冻结不足，释放失败');
            }

            $sfee = 0;
            $mum = $orderinfo['deal_num'] - $sfee;
            //盘口费率
            $pkfee = $buymerchant['merchant_pk_fee'];
            $pkfee = $pkfee ? $pkfee : 0;
            $pkdec = $orderinfo['deal_num']*$pkfee/100;
            //平台利润
            $platformGet = config('trader_platform_get');
            $platformGet = $platformGet ? $platformGet : 0;
            $platformMoney = $platformGet*$orderinfo['deal_num']/100;
            //交易员利润
            $traderGet = $merchant['trader_trader_get'];
            $traderGet = $traderGet ? $traderGet : 0;
            $traderMoney = $traderGet*$orderinfo['deal_num']/100;
            $traderParentMoney = $traderMParentMoney = $tpexist = $mpexist = 0;
            if($merchant['pid']){
                $traderP = $model2->getUserByParam($merchant['pid'], 'id');
                if($traderP['agent_check'] == 1 && $traderP['trader_parent_get']){
                    //交易员代理利润
                    $tpexist = 1;
                    $traderParentGet = $traderP['trader_parent_get'];
                    $traderParentGet = $traderParentGet ? $traderParentGet : 0;
                    $traderParentMoney = $traderParentGet*$orderinfo['deal_num']/100;
                }
            }
            if($buymerchant['pid']){
                $buymerchantP = $model2->getUserByParam($buymerchant['pid'], 'id');
                if($buymerchantP['agent_check'] == 1 && $buymerchantP['trader_merchant_parent_get']){
                    //商户代理利润
                    $mpexist = 1;
                    $traderMParentGet = $buymerchantP['trader_merchant_parent_get'];
                    $traderMParentGet = $traderMParentGet ? $traderMParentGet : 0;
                    $traderMParentMoney = $traderMParentGet*$orderinfo['deal_num']/100;
                }
            }
            //平台，交易员代理，商户代理，交易员，商户只能得到这么多，多的给平台
            $moneyArr = getMoneyByLevel($pkdec, $platformMoney, $traderParentMoney, $traderMParentMoney, $traderMoney);
            $mum = $mum - $pkdec;
            $traderParentMoney = $moneyArr[1];
            $traderMParentMoney = $moneyArr[2];
            $traderMoney = $moneyArr[3];
            Db::startTrans();
            try{
                $rs1 = Db::table('think_merchant')->where('id', $orderinfo['sell_id'])->setDec('usdtd', $orderinfo['deal_num']);
                //20190830修改
                if($nopay==1){
                    $rs2 = Db::table('think_order_buy')->update(['id'=>$orderinfo['id'], 'status'=>4, 'finished_time'=>time(), 'dktime'=>time(),'platform_fee'=>$moneyArr[0]]);
                }else{
                    $rs2 = Db::table('think_order_buy')->update(['id'=>$orderinfo['id'], 'status'=>4, 'finished_time'=>time(), 'platform_fee'=>$moneyArr[0]]);
                }
                // $rs2 = Db::table('think_order_buy')->update(['id'=>$orderinfo['id'], 'status'=>4, 'finished_time'=>time(), 'platform_fee'=>$moneyArr[0]]);
                $rs3 = Db::table('think_merchant')->where('id', $orderinfo['buy_id'])->setInc('usdt', $mum);
                $rs4 = Db::table('think_merchant')->where('id', $orderinfo['sell_id'])->setInc('transact', 1);
                $total = Db::table('think_order_buy')->field('sum(finished_time-dktime) as total')->where('sell_id', $orderinfo['sell_id'])->where('status', 4)->select();
                $tt = $total[0]['total'];
                $transact = Db::table('think_merchant')->where('id', $orderinfo['sell_id'])->value('transact');
                $rs5 = Db::table('think_merchant')->where('id', $orderinfo['sell_id'])->update(['averge'=>intval($tt/$transact)]);
                //交易员利润
                $rs6 = $rs7 = $rs8 = $rs9 = $rs10 = $rs11 = true;
                if($traderMoney > 0){
                    $rs6 = Db::table('think_merchant')->where('id', $orderinfo['sell_id'])->setInc('usdt', $traderMoney);
                    $rs7 = Db::table('think_trader_reward')->insert(['uid'=>$orderinfo['sell_id'], 'orderid'=>$orderinfo['id'], 'amount'=>$traderMoney, 'type'=>0, 'create_time'=>time()]);
                }
                //交易员代理利润
                if($traderParentMoney > 0 && $tpexist){
                    $rsarr = agentReward($merchant['pid'], $orderinfo['sell_id'], $traderParentMoney, 3);//3
                    $rs8 = $rsarr[0];$rs9 = $rsarr[1];
                }
                //商户代理利润
                if($traderMParentMoney > 0 && $mpexist){
                    $rsarr = agentReward($buymerchant['pid'], $orderinfo['buy_id'], $traderMParentMoney, 4);//4
                    $rs10 = $rsarr[0];$rs11 = $rsarr[1];
                }
                if($rs1 && $rs2 && $rs3 && $rs4  && $rs6 && $rs7 && $rs8 && $rs9 && $rs10 && $rs11){
                    // 提交事务
//                    Db::commit();
                    financelog($orderinfo['buy_id'],$mum,'买入USDT_f1',0,session('user.name'));//添加日志
                    if($traderMoney>0){
                        financelog($orderinfo['sell_id'],$traderMoney,'交易员利润_f1',0,session('user.name'));//添加日志
                    }

                    getStatisticsOfOrder($orderinfo['buy_id'], $orderinfo['sell_id'], $mum, $orderinfo['deal_num']);

                    if (Db::name('merchant')->where('id', $orderinfo['buy_id'])->value('appid') == 'qA4XGRC6mWplWVho') {
                        $data = [
                            'payno' => $orderinfo['orderid'],
                            'beforenumber' => round($orderinfo['deal_amount'] / $orderinfo['deal_price'], 2),
                            'price' => $orderinfo['deal_amount'],
                            'customerId' => $orderinfo['orderid'],
                            'signType' => 'MD5',
                            'orderCurrency' => $orderinfo['deal_ctype'] == 0 ? 'CNY' : 'USD',
                            'transactionId' => $orderinfo['order_no'],
                            'status' => 1,
                            'mid' => 'EU85200932P3Q'
                        ];
                        $res = mt4Notifiy($data, $orderinfo['notify_url'], 'xBmrxxDCFGsyxW5AIVAsEvQ');
                    } else {
                        //请求回调接口
                        $data['amount'] = $orderinfo['deal_num'];
                        $data['rmb'] = $orderinfo['deal_amount'];
                        $data['orderid'] = $orderinfo['orderid'];
                        $data['appid'] = $buymerchant['appid'];
                        $data['status'] = 1;
                        $res = askNotify($data, $orderinfo['notify_url'], $buymerchant['key']);
                    }

                    $this->success('释放成功');
                }else{
                    // 回滚事务
                    Db::rollback();
                    $this->error('释放失败,请稍后再试!');
                }
            } catch (\think\Exception\DbException $e) {
                // 回滚事务
                Db::rollback();
                $this->error('释放失败，参考信息：'.$e->getMessage());
            }
        }
    
}