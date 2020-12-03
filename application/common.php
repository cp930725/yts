<?php
use think\Db;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;

/**
 * 字符串截取，支持中文和其他编码
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr"))
		$slice = mb_substr($str, $start, $length, $charset);
	elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str, $start, $length, $charset);
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("", array_slice($match[0], $start, $length));
	}
	return $suffix ? $slice . '...' : $slice;
}

function getTime($time){
    return date("Y-m-d H:i:s", $time);
}

/**
 * 读取配置
 * @return array
 */
function load_config(){
    $list = Db::name('config')->select();
    $config = [];
    foreach ($list as $k => $v) {
        $config[trim($v['name'])]=$v['value'];
    }

    return $config;
}


/**
* 验证手机号是否正确
* @author honfei
* @param number $mobile
*/
function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}


/**
 * 阿里云云通信发送短息
 * @param string $mobile    接收手机号
 * @param string $tplCode   短信模板ID
 * @param array  $tplParam  短信内容
 * @return array
 */
function sendMsg($mobile,$tplCode,$tplParam){
    if( empty($mobile) || empty($tplCode) ) return array('Message'=>'缺少参数','Code'=>'Error');
    if(!isMobile($mobile)) return array('Message'=>'无效的手机号','Code'=>'Error');

    require_once '../extend/aliyunsms/vendor/autoload.php';
    Config::load();             //加载区域结点配置
    $accessKeyId = config('alisms_appkey');
    $accessKeySecret = config('alisms_appsecret');
    if( empty($accessKeyId) || empty($accessKeySecret) ) return array('Message'=>'请先在后台配置appkey和appsecret','Code'=>'Error');
    $templateParam = $tplParam; //模板变量替换

	//$signName = (empty(config('alisms_signname'))?'阿里大于测试专用':config('alisms_signname'));
	$signName = config('alisms_signname');
    //短信模板ID
    $templateCode = $tplCode;
    //短信API产品名（短信产品名固定，无需修改）
    $product = "Dysmsapi";
    //短信API产品域名（接口地址固定，无需修改）
    $domain = "dysmsapi.aliyuncs.com";
    //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
    $region = "cn-hangzhou";
    // 初始化用户Profile实例
    $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
    // 增加服务结点
    DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
    // 初始化AcsClient用于发起请求
    $acsClient= new DefaultAcsClient($profile);
    // 初始化SendSmsRequest实例用于设置发送短信的参数
    $request = new SendSmsRequest();
    // 必填，设置雉短信接收号码
    $request->setPhoneNumbers($mobile);
    // 必填，设置签名名称
    $request->setSignName($signName);
    // 必填，设置模板CODE
    $request->setTemplateCode($templateCode);
    // 可选，设置模板参数
    if($templateParam) {
        $request->setTemplateParam(json_encode($templateParam));
    }
    //发起访问请求
    $acsResponse = $acsClient->getAcsResponse($request);
    //返回请求结果
    $result = json_decode(json_encode($acsResponse),true);

    return $result;
}



//生成网址的二维码 返回图片地址
function Qrcode($token, $url, $size = 8){
    $md5 = md5($token);
    $dir = date('Ymd'). '/' . substr($md5, 0, 10) . '/';
    $patch = 'qrcode/' . $dir;
    if (!file_exists($patch)){
        mkdir($patch, 0755, true);
    }
    $file = 'qrcode/' . $dir . $md5 . '.png';
    $fileName =  $file;
    if (!file_exists($fileName)) {

        $level = 'L';
        $data = $url;
        QRcode::png($data, $fileName, $level, $size, 2, true);
    }
    return $file;
}



/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}



//时间格式化1
function formatTime($time) {
    $now_time = time();
    $t = $now_time - $time;
    $mon = (int) ($t / (86400 * 30));
    if ($mon >= 1) {
        return '一个月前';
    }
    $day = (int) ($t / 86400);
    if ($day >= 1) {
        return $day . '天前';
    }
    $h = (int) ($t / 3600);
    if ($h >= 1) {
        return $h . '小时前';
    }
    $min = (int) ($t / 60);
    if ($min >= 1) {
        return $min . '分钟前';
    }
    return '刚刚';
}


//时间格式化2
function pincheTime($time) {
     $today  =  strtotime(date('Y-m-d')); //今天零点
      $here   =  (int)(($time - $today)/86400) ;
      if($here==1){
          return '明天';
      }
      if($here==2) {
          return '后天';
      }
      if($here>=3 && $here<7){
          return $here.'天后';
      }
      if($here>=7 && $here<30){
          return '一周后';
      }
      if($here>=30 && $here<365){
          return '一个月后';
      }
      if($here>=365){
          $r = (int)($here/365).'年后';
          return   $r;
      }
     return '今天';
}


function getRandomString($len, $chars=null){
    if (is_null($chars)){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}


function random_str($length){
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++)
    {
        $rand = mt_rand(0, $arr_len-1);
        $str.=$arr[$rand];
    }

    return $str;
}
/**
 * 参数检查并写日志
 */
function stopattack($StrFiltKey, $StrFiltValue, $ArrFiltReq){
    if(is_array($StrFiltValue))$StrFiltValue = implode($StrFiltValue);
    if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue) == 1){
        writeslog($_SERVER["REMOTE_ADDR"]."    ".strftime("%Y-%m-%d %H:%M:%S")."    ".$_SERVER["PHP_SELF"]."    ".$_SERVER["REQUEST_METHOD"]."    ".$StrFiltKey."    ".$StrFiltValue);
        return false;
    }
    return true;
}
function sql_check(){
    //dump($_POST);
    $getfilter = "'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
    $postfilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
    $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";

    foreach($_GET as $key=>$value){
        if(!stopattack($key,$value,$getfilter))
            return false;
    }
    foreach($_POST as $key=>$value){
        if(!stopattack($key,$value,$postfilter))
            return false;
    }
    foreach($_COOKIE as $key=>$value){
        if(!stopattack($key,$value,$cookiefilter))
            return false;
    }
    return true;
}
/**
 * SQL注入日志
 */
function writeslog($log){
    $log_path = RUNTIME_PATH.'sql_log.txt';
    $ts = fopen($log_path,"a+");
    fputs($ts,$log."\r\n");
    fclose($ts);
}
function writeslogtibi($log){
    $log_path = RUNTIME_PATH.'tibi_log.txt';
    $ts = fopen($log_path,"a+");
    fputs($ts,$log."\r\n");
    fclose($ts);
}
function sql_check2(){
    $getfilter = "'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
    $postfilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
    $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
    $key = 'content';
    $value = 'SELECT * from merchant_user';
    if (preg_match("/".$postfilter."/is",$value) == 1){
        dump(1111);
        //writeslog($_SERVER["REMOTE_ADDR"]."    ".strftime("%Y-%m-%d %H:%M:%S")."    ".$_SERVER["PHP_SELF"]."    ".$_SERVER["REQUEST_METHOD"]."    ".$StrFiltKey."    ".$StrFiltValue);
        return false;
    }else{
        dump(222);
    }
}
/**
 * 调用系统的API接口方法（静态方法）
 * api('User/getName','id=5'); 调用公共模块的User接口的getName方法
 * api('Admin/User/getName','id=5');  调用Admin模块的User接口
 * @param  string  $name 格式 [模块名]/接口名/方法名
 * @param  array|string  $vars 参数
 */
function api($name,$vars=array()){
    $array     = explode('/',$name);
    $method    = array_pop($array);
    $classname = array_pop($array);
    $module    = $array? array_pop($array) : 'common';
    $callback  = 'app\\'.$module.'\\Api\\'.$classname.'Api::'.$method;
    if(is_string($vars)) {
        parse_str($vars,$vars);
    }
    return call_user_func_array($callback,$vars);
}
function generate_password( $length = 16 ) {
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}
function getConfig($field){
    return Db::name('config')->where(array('name'=>$field))->value('value');
}
/**
 * 返回订单号
 * @param int $paywhere,1:商户提现
 * @param int $uid
 * @return string
 */
function createOrderNo($paywhere,$uid) {
    if($paywhere==1){
        //商家提币
        $kait = 'M';
    }else if($paywhere==2){
        //用户提币
        $kait = 'U';
    }else if($paywhere==3){
        $kait = 'S';
    }else if($paywhere==4){
        $kait = 'T';
    }else{
        $kait = 'O';
    }//M22768T3085073605350PS198
    return $kait.$uid.'T'.strtoupper(dechex(date('m'))) .
    date('d') .substr(time(), -5) . substr(microtime(), 2, 5) .'P'.'S'.sprintf(rand(100, 999));
}
function curl_mobile($url, $post_data = array(), $header= array('Accept: application/json',)){
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // 超时设置
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    // 超时设置，以毫秒为单位
    // curl_setopt($curl, CURLOPT_TIMEOUT_MS, 500);

    // 设置请求头
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE );

    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    //执行命令

    $result = curl_exec($curl); //执行发送

    curl_close($curl);
    return $result;
}
function curl_post($url, $post_data = array(), $header= array('Accept: application/json','Content-Type: application/json')){
    $post_data = json_encode($post_data);
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // 超时设置
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    // 超时设置，以毫秒为单位
    // curl_setopt($curl, CURLOPT_TIMEOUT_MS, 500);

    // 设置请求头
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE );

    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    //执行命令

    $result = curl_exec($curl); //执行发送

    curl_close($curl);
    return $result;
}
function curl_get($url){
    $testurl = $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_URL, $testurl);
    //参数为1表示传输数据，为0表示直接输出显示。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //参数为0表示不带头文件，为1表示带头文件
    curl_setopt($ch, CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 30);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
function getTotalInfo($where, $table, $field){
    $sum = Db::name($table)->where($where)->sum($field);
    return $sum ? $sum : 0;
}
function tradenoa()
{
    return substr(str_shuffle('ABCDEFGHIJKLMNPQRSTUVWXYZ'), 0, 6);
}
function agentReward($uid, $duid, $amount, $type){
    $rs = array();
    $rs[0] = Db::table('think_merchant')->where('id', $uid)->setInc('usdt', $amount);
    $rs[1] = Db::table('think_agent_reward')->insert(['uid'=>$uid, 'duid'=>$duid, 'amount'=>$amount, 'type'=>$type, 'create_time'=>time()]);
    return $rs;
}
function apilog($uid, $duid, $api_name, $request_param, $return_param){
    Db::name('merchant_apilog')->insert(['uid'=>$uid, 'duid'=>$duid, 'api_name'=>$api_name, 'request_param'=>$request_param, 'return_param'=>$return_param, 'create_time'=>time()]);
}
function getUsdtPrice(){
    return 6.258;
    $data = curl_get('https://otc-api.huobi.pro/v1/data/market/detail');//获取火币价格
    $price = 0;
    $data_arr = json_decode($data, true);
    if($data_arr['success']==true){
       $buyprice= $data_arr['data']['detail'][2]['buy'];
       $sellprice= $data_arr['data']['detail'][2]['sell'];
       // $map['buy']=$data_arr['data']['detail'][2]['buy'];
       // $map['sell']=$data_arr['data']['detail'][2]['sell'];
       // $map['addtime']=time();
       // Db::name('hbprice')->where('id',1)->update($map);
    }else{
        $buyprice=7.00;
        $sellprice=7.00;
    }
    // dump($sellprice);

    // if($data_arr[0]['price_cny']>0){
    //    $price=round($data_arr[0]['price_cny'],2);
    // }
    // return $price;
    return $buyprice;
}
function getUsdtPrice_old(){
    /*$v = 'tether';
    $jiekou = "https://api.coinmarketcap.com/v1/ticker/".$v."/?convert=CNY";
    $url=@file_get_contents($jiekou);
    $biarr=json_decode($url,true);
    return $biarr[0]['price_cny'];*/
	$data = curl_get('https://otc-api.huobi.co/v1/data/market/detail');
    $price = 0;
    $data_arr = json_decode($data, true);//dump($data_arr);
    if($data_arr['code'] == 200){
        $coin_arr = $data_arr['data']['detail'];
        foreach($coin_arr as $k=>$v){
            if($v['coinName'] == 'USDT'){
                $price = $v['sell'];break;
            }
        }
    }
    return $price;
}
function send_moble($to, $datas, $tempId)
{
    $url = Db::table('think_config')->where('name', 'moble_url')->value('value');
	$user = Db::table('think_config')->where('name', 'moble_user')->value('value');
	$key = Db::table('think_config')->where('name', 'moble_pwd')->value('value');
    $sign = Db::table('think_config')->where('name', 'web_site_title')->value('value');

    $data = "";
    for ($i = 0; $i < count($datas); $i++) {
        if ($i == 0) {
            $data = $data . "'" . $datas[$i] . "'";
        } else {
            $data = $data . ",'" . $datas[$i] . "'";
        }
    }
    $batch = date('YmdHis');
    $appid = '8aaf070875e449d701762180da3a14b7';
    $account_id = '8aaf070875e449d701762180d93e14b1';
    $token = 'aab967353f624d25bb065b842bdba8b8';
    $body_type = 'json';

    $body = "{'to':'$to','templateId':'$tempId','appId':'$appid','datas':[" . $data . "]}";
    $sig = strtoupper(md5($account_id.$token.$batch));
    // 生成请求URL
    $url = "https://app.cloopen.com:8883/2013-12-26/Accounts/8aaf070875e449d701762180d93e14b1/SMS/TemplateSMS?sig=$sig";
    $authen = base64_encode($account_id . ":" . $batch);
    // 生成包头
    $header = array("Accept:application/$body_type", "Content-Type:application/$body_type;charset=utf-8", "Authorization:$authen");
    // 发送请求
    $result = json_decode(curl_mobile($url, $body, $header), true);
    
    if ($result['statusCode'] == '000000') {
        return true;
    } else {
        return false;
    }

//    $content='【'.$sign.'】'.$content;
//    $url = $url.'/?Uid='.$user.'&Key='.$key.'&smsMob='.$moble.'&smsText='.$content;
    // $url = 'http://utf8.sms.webchinese.cn/?Uid=gaoyuanme&Key=e52c8b397c679177fc70&smsMob=' . $moble . '&smsText=' . $content;
    /*if (function_exists('file_get_contents')) {
        $file_contents = file_get_contents($url);
    }else {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    return $file_contents;*/
}
function askNotify($data, $url, $key){
    ksort($data);
    $serverstr = '';
    foreach ($data as $k => $v) {
        $serverstr = $serverstr.$k.$v;
    }
    $reserverstr=$serverstr.$key;
    $sign = strtoupper(sha1($reserverstr));
    $data['sign'] = $sign;
    $return = curl_post($url, $data);
    file_put_contents("./data/notify.txt"," - ".$return.'|'.$url."|".date("Y-m-d H:i:s", time())."|".$reserverstr." + ".PHP_EOL,FILE_APPEND);
}

function bind_address($data)
{
    $key = 'otpkKOZsyJm54bin';
    $url = 'http://demo.uee-forex.com/api/Post/BindID';

    $res = curl_mobile($url, $data);
    return md5($data['uid'].$key.$data['ads']);
}

function mt4Notifiy ($data, $url, $key)
{
    $sign=MD5('payno='.$data['payno'].'|beforenumber='.$data['beforenumber'].'|price='.$data['price'].'|customerId='.$data['customerId'].'|signType='.$data['signType'].'|orderCurrency='.$data['orderCurrency'].'|transactionId='.$data['transactionId'].'|status='.$data['status'].'|mid='.$data['mid'].$key);
    $data['sign'] = $sign;
    $return = curl_post($url, $data);
    // dump($return);
    // exit;
    file_put_contents("./data/notify.txt"," - ".$return.'|'.$url."|".date("Y-m-d H:i:s", time())."|".$sign." + ".PHP_EOL,FILE_APPEND);
}

function go_mobile() {
    $agent   = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($agent, "comFront") || strpos($agent, "iPhone") || strpos($agent, "MIDP-2.0") || strpos($agent, "Opera Mini") || strpos($agent, "UCWEB") || strpos($agent, "Android") || strpos($agent, "Windows Phone") || strpos($agent, "Windows CE") || strpos($agent, "SymbianOS")) {
        return true;
    }
    return false;
}
function checkName($name)
{
 $ret = true;
//中文+身份证允许有.
 if (!preg_match('/^[\x{4e00}-\x{9fa5}]+[·?]?[\x{4e00}-\x{9fa5}]+$/u', $name)) {
  return false;
 }
 $strLen = mb_strlen($name,"utf-8");
 if ($strLen < 2 || $strLen > 8) {//字符长度2到8之间
  return false;
 }

 return $ret;
}
function financelog($uid,$amount,$note,$status,$op){

     $user=Db::name('merchant')->where('id',$uid)->find();
     $rs = Db::table('think_financelog')->insert(['uid'=>$uid,'user'=>$user['name'], 'note'=>$note, 'amount'=>$amount, 'status'=>$status, 'add_time'=>time(),'op'=>$op]);
     if($rs){
        return $rs;
     }else{
        return '记录失败';
     }
}
function getMoneyByLevel($total, $pm, $tpm, $mpm, $tm){
    if($pm >= $total){
        return [$total, 0, 0, 0];
    }
    if($pm + $tpm >= $total){
        return [$pm, $total - $pm, 0, 0];
    }
    if($pm + $tpm + $mpm >= $total){
        return [$pm, $tpm, $total - $pm - $tpm, 0];
    }
    if($pm + $tpm + $mpm + $tm >= $total){
        return [$pm, $tpm, $mpm, $total - $pm - $tpm - $mpm];
    }
    return [$total - $tpm - $mpm - $tm, $tpm, $mpm, $tm];
}
function getStatisticsOfOrder($buyerid, $sellerid, $buyamount, $sellamount){
    Db::name('merchant')->where('id', $sellerid)->setInc('order_sell_success_num', 1);
    Db::name('merchant')->where('id', $buyerid)->setInc('order_buy_success_num', 1);
    Db::name('merchant')->where('id', $sellerid)->setInc('order_sell_usdt_amount', $sellamount);
    Db::name('merchant')->where('id', $buyerid)->setInc('order_buy_usdt_amount', $buyamount);
}
/**
 * 返回统一的json格式
 */
function jsonData($code = 1,$msg = '',$data = [])
{
    $codeV = ['error','success'];
    return json_encode(['code' => $codeV[$code],'msg'=>$msg,'data'=>$data],JSON_UNESCAPED_UNICODE);
}