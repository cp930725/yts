<?php

namespace app\api\controller;
use aop\AopClient;
use aop\request\AlipayTradePrecreateRequest;
use aop\request\AlipayTradeQueryRequest;
use think\Controller;
use think\Db;
use think\Loader;
use aop\SignData;
class Dmfpay extends Controller
{

    public function getpayimg(){
        Loader::import('aop.AopCertClient', EXTEND_PATH);
        Loader::import('aop.request.AlipayTradeQueryRequest', EXTEND_PATH);
        Loader::import('aop.request.AlipayTradeWapPayRequest', EXTEND_PATH);
        Loader::import('aop.request.AlipayOpenOperationOpenbizmockBizQueryRequest', EXTEND_PATH);

        $token="P7iAfLCbPSmYeCWL_4tATGRfaZ6GPRKXG";
        $token1=$this->request->param("token");
        $id=$this->request->param("id");
        $dmfid=$this->request->param("dmfid");

        $dmf_inf = Db::name('merchant_dmf')->where('id', $dmfid)->find();

        if ($token1!=$token){
            echo json_encode(['status'=>-1,"接口验证错误！"],true);
            return;
        }
        $order = Db::name('order_buy')->where('id', $id)->find();
        if(empty($order)){
            echo json_encode(['status'=>-1,"订单参数错误1"],true);
            return;
        }

        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';

        $aop->appId = $dmf_inf['app_id'];
        $aop->rsaPrivateKey =$dmf_inf['app_rsa'];
        $aop->alipayrsaPublicKey=$dmf_inf['pub_key'];

        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='utf-8';
        $aop->format='json';
        $request = new AlipayTradePrecreateRequest ();

        $sub['subject']="当面付：".$order['order_no'];
        $sub['out_trade_no']=$order['order_no'];  //商户订单号
        $sub['total_amount']=$order['deal_amount'];

        $request->setBizContent(json_encode($sub,true));
        $result = $aop->execute ($request);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
     //   print_r($result->$responseNode);
        //https://api.uomg.com/api/qrcode?url=https://qr.alipay.com/bax00128ezs5xhte0rgg6045
        if(!empty($resultCode)&&$resultCode == 10000){
            $url="https://api.uomg.com/api/qrcode?url=".$result->$responseNode->qr_code;
            echo json_encode(["status"=>1,"src"=>$url,"qr_code"=>$result->$responseNode->qr_code]);
        } else {
            echo json_encode(["status"=>-1,"msg"=>$result->$responseNode->sub_msg]);
        }

    }
}