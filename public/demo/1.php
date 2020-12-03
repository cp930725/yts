
<?php
$pay_orderid = 'E'.date("YmdHis").rand(100000,999999);    //订单号
$user = '1380'.rand(1000000,9999999);    //订单号
$amount = rand(10,999);    //订单号
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>USDT DEMO测试页</title>
    <link href="./demo/css/Reset.css" rel="stylesheet" type="text/css">
    <script src="./demo/js/jquery-1.11.3.min.js"></script>
    <link href="./demo/css/main12.css" rel="stylesheet" type="text/css">
    <style>
        .pay_li input{
            display: none;
        }
        .immediate_pay{
            border:none;
        }
        .PayMethod12
        {
            min-height: 150px;
        }
        @media screen and (max-width: 700px) {
            .PayMethod12{
                padding-top:0;
            }
            .order-amount12{
                margin-bottom: 0;
            }
            .order-amount12,.PayMethod12{
                padding-left: 15px;padding-right: 15px;
            }
        }
        .order-amount12-right input{
            border:1px solid #efefef;
            width:6em;
            padding:5px 20px;
            font-size: 15px;
            text-indent: 0.5em;
            line-height: 1.8em;
        }

    </style>
    <script>
        var lastClickTime;
        var orderNo = "15248148988132090444";
        $(function () {
            $('.PayMethod12 ul li').each(function (index, element) {
                $('.PayMethod12 ul li').eq(5 * index + 4).css('margin-right', '0')
            });

            //支付方式选择
            $('.PayMethod12 ul li').click(function (e) {
                $(this).addClass('active').siblings().removeClass('active');
            });

            $(".pay_li").click(function () {
                $(".pay_li").removeClass("active");
                $(this).addClass("active");
            });
            //点击立即支付按钮
            $(".immediate_pay").click(function () {
                //判断用户是否选择了支付渠道
                if (!$(".pay_li").hasClass("active")) {
                    message_show("请选择支付功能");
                    return false;
                }
                //获取选择的支付渠道的li
                var payli = $(".pay_li[class='pay_li active']");
                if (payli[0]) {
                    prepay(payli.attr("data_power_id"), payli.attr("data_product_id"));
                } else {
                    message_show("请重新选择支付功能");
                }

            });


            $('.mt_agree').click(function (e) {
                $('.mt_agree').fadeOut(300);
            });

            $('.mt_agree_main').click(function (e) {
                return false;
            });

            //弹窗
        // 		$('.pay_sure12').click(function(e) {
        // 			$(this).fadeOut();
        // 		});

            $('.pay_sure12-main').click(function (e) {
                //e. stopPropagation();
                return false;
            });
        });

</script>

    <script>
        if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
            window.location.href = "mobile.php";
        } else {

        }
    </script>
</head>
<body style="background-color:#f9f9f9">
<form action="2.php/rechargeRmb" class="mui-input-group" method="post" autocomplete="off">
  <input type="hidden" name="orderid" value="<?php echo $pay_orderid;?>">
<!--弹窗结束-->
<!--导航-->
<div class="w100 navBD12">
    <div class="w1080 nav12">
        <div class="nav12-left">
            <a href="/"><img src="/static/home/netindex/static/home/images/logo.png" style="max-height: 45px;"></a>
            <span class="shouyintai"></span>
        </div>
        <div class="nav12-right">
                <span class="contact">支付体验收银台</span>
            </div>
    </div>
</div>
<!--订单金额-->
<div class="w1080 order-amount12" style="border-radius: 1em;">
	
    <ul class="order-amount12-left">
        <li>
            <span>充值货币：USDT</span>
        </li>
        <li>
            <span>订单编号：</span>
            <input type="number" class="mui-input" placeholder="<?php echo $pay_orderid;?>"  readonly="">
           
        </li>
        
        <li>
            <span>用户账号：</span>
            <input type="text" class="mui-input" placeholder="输入充值用户名" name="user"  value="<?php echo $user;?>">
        </li>

          <li>
            <span>商户号：</span>
            <input type="text" name="appid" class="mui-input" value="zFuDhrkkol2aVz5v" >
            <span>商户密钥：</span>
            <input type="text" name="key" class="mui-input" placeholder="" value="24ccfcdb5d8f5b7a86e9df6348a20347">
        </li>

    </ul>

    <div class="order-amount12-right">
        <span>订单金额：</span>
        <strong><input type="text" name="amount" value="<?php echo $amount;?>"></strong>
        <span>元</span>
    </div>
    
</div>
<!--支付方式-->
   
<div class="w1080 PayMethod12" style="border-radius: 1em;">
    <div class="row">
        <h2>支付方式</h2>
        <ul>



            <label for="zfb">

            
			<li class="pay_li active" data_power_id="3000000011" data_product_id="3000000001">
            <input value="903" checked="checked" name="channel" id="zfb" type="radio">

                <i class="i1"></i>
                <span>支付宝扫码</span>
            </li></label>


           


            <label for="wx">
            <li class="pay_li" data_power_id="3000000031" data_product_id="3000000031">
                <input value="902" name="channel" id="wx" type="radio">

                <i class="i2"></i>
                <span>微信扫码</span>

            </li>  </label>
          
          
	
          
            <label for="zfb1">

            
			<li class="pay_li active1" data_power_id="3000000041" data_product_id="3000000041">
            <input value="903" checked="checked" name="channel" id="zfb" type="radio">

                <i class="i1"></i>
                <span>支付宝转卡</span>
            </li></label>


           
			
			
            <label for="zfb2">

            
			<li class="pay_li active2" data_power_id="3000000051" data_product_id="3000000051">
            <input value="903" checked="checked" name="channel" id="zfb" type="radio">

                <i class="i1"></i>
                <span>支付宝H5</span>
            </li></label>
			

			
		
			 <label for="yl">
            <li class="pay_li" data_power_id="3000000061" data_product_id="3000000061">
                <input value="911" name="channel" id="yl" type="radio">

                <i class="i3"></i>
                <span>银联快捷</span>
            </li></label>
			

			
			
			
            <label for="jd">
            <li class="pay_li" data_power_id="3000000071" data_product_id="3000000071">
                <input value="907" name="channel" id="jd" type="radio">

                <i class="i5"></i>
                <span>云闪付扫码</span>

            </li></label>
			
        </ul>
    </div>
</div>
<!--立即支付-->
<div class="w1080 immediate-pay12" style="border-radius: 1em; padding-top:1em; padding-bottom: 1em;padding-right: 1em;">
    <div class="immediate-pay12-right">
        <span>需支付：<strong><?php echo $amount;?></strong>元</span>

        <button type="submit" class="immediate_pay" >立即支付</button>
    </div>
</div>
<div class="mt_agree">
    <div class="mt_agree_main">
        <h2>提示信息</h2>
        <p id="errorContent" style="text-align:center;line-height:36px;"></p>
        <a class="close_btn" onclick="message_hide()">确定</a>
    </div>
</div>
<!--底部-->
<div class="w1080 footer12">
    <p>Copyright © 2019 USDTWEB 版权所有</p>
	   

</div>


<script type="text/javascript">
    function message_show(message) {
        $("#errorContent").html(message);
        $('.mt_agree').fadeIn(300);
    }

    function message_hide() {
        $('.mt_agree').fadeOut(300);
    }

</script>
        <script>
            mui.init({
                swipeBack: true //启用右滑关闭功能
            });
             //语音识别完成事件


            var nativeWebview, imm, InputMethodManager;
            var initNativeObjects = function() {
                if (mui.os.android) {
                    var main = plus.android.runtimeMainActivity();
                    var Context = plus.android.importClass("android.content.Context");
                    InputMethodManager = plus.android.importClass("android.view.inputmethod.InputMethodManager");
                    imm = main.getSystemService(Context.INPUT_METHOD_SERVICE);
                } else {
                    nativeWebview = plus.webview.currentWebview().nativeInstanceObject();
                }
            };
            var showSoftInput = function() {
                if (mui.os.android) {
                    imm.toggleSoftInput(0, InputMethodManager.SHOW_FORCED);
                } else {
                    nativeWebview.plusCallMethod({
                        "setKeyboardDisplayRequiresUserAction": false
                    });
                }
                setTimeout(function() {
                    var inputElem = document.querySelector('input');
                    inputElem.focus();
                    inputElem.parentNode.classList.add('mui-active'); //第一个是search，加上激活样式
                }, 200);
            };
            mui.plusReady(function() {
                initNativeObjects();
                showSoftInput();
            });

        </script>
</form>

</body>
</html>