<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:83:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/merchant/merchantSet.html";i:338075764;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/header_new.html";i:1572787926;s:73:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_merchant.html";i:315504000;s:71:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_trader.html";i:1979183310;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_agent.html";i:315504000;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/footer_new.html";i:1563934900;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo config('web_site_title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/static/home/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/home/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/static/home/css/skin-blue-light.min.css">

    <link rel="stylesheet" href="/static/home/css/all.css">
    <link rel="stylesheet" href="/static/home/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/static/home/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/static/home/css/fileinput.min.css">
    <link rel="stylesheet" href="/static/home/css/select2.min.css">
    <link rel="stylesheet" href="/static/home/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="/static/home/css/ion.rangeSlider.skinNice.css">
    <link rel="stylesheet" href="/static/home/css/bootstrap-switch.min.css">
    <link rel="stylesheet" href="/static/home/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="/static/home/css/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="/static/home/css/default.css">
    <link rel="stylesheet" href="/static/home/css/prettify.css">

    <link rel="stylesheet" href="/static/home/css/laravel-admin.css">
    <link rel="stylesheet" href="/static/home/css/nprogress.css">
    <link rel="stylesheet" href="/static/home/css/sweetalert.css">
    <link rel="stylesheet" href="/static/home/css/nestable.css">
    <link rel="stylesheet" href="/static/home/css/toastr.min.css">
    <link rel="stylesheet" href="/static/home/css/bootstrap-editable.css">
    <link rel="stylesheet" href="/static/home/css/fonts.css">
    <link rel="stylesheet" href="/static/home/css/AdminLTE.min.css">

    <!-- REQUIRED JS SCRIPTS -->
    <script src="/static/home/js/jQuery-2.1.4.min.js"></script>
    <script src="/static/home/js/bootstrap.min.js"></script>
    <script src="/static/home/js/jquery.slimscroll.min.js"></script>
    <script src="/static/home/js/app.min.js"></script>
    <script src="/static/home/js/jquery.pjax.js"></script>
    <script src="/static/home/js/nprogress.js"></script>
    <script>
    	
    	function order(){
    		$.ajax({
    			type:'get',
    			url:"<?php echo url('Merchant/getNewOrder'); ?>",
    			dataType:'json',
    			timeout:90000,
    			cache:false,
    			async:true,
    			success:function(data){
    				if(data.code==1){
		                var audio = document.getElementById( "play" );
		                //浏览器支持 audio
		                audio.play();//播放提示音
		                // $("#audioPlay").play();
		            }
    			}
    			
    		})
    		
    	}
    	    	setInterval("order()",90000);
    	function order1(){
    		$.ajax({
    			type:'get',
    			url:"<?php echo url('Merchant/getNew1Order'); ?>",
    			dataType:'json',
    			timeout:95000,
    			cache:false,
    			async:true,
    			success:function(data){
    				if(data.code==1){
		                var audio = document.getElementById( "play1" );
		                //浏览器支持 audio
		                audio.play();//播放提示音
		                // $("#audioPlay").play();
		            }
    			}
    			
    		})
    		
    	}
    	setInterval("order1()",95000);
    
    </script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->

</head>

<body class="skin-blue-light fixed">
<div style="dispay:none">
	<audio controls id='play'>
        <source src="/static/home/tishiyin.wav" type="audio/mpeg">
    </audio>
</div>
<div style="dispay:none">
	<audio controls id='play1'>
        <source src="/static/home/tishiyin.wav" type="audio/mpeg">
    </audio>
</div>
<div class="wrapper">

    <!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/merchant/index" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>后台</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo config('WEB_SITE_TITLE'); ?>后台</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a data-href="<?php echo $url; ?>" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>



        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
    <a href="/message/index" class="dropdown-toggle">
        <span class="hidden-xs">
            消息<span class="pull-right-container"><small style="margin-left: 5px;" class="label pull-right bg-red" id="message_total"></small></span>
        </span>
    </a>
</li>

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="/#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php if(empty(\think\Session::get('user.headpic')) || ((\think\Session::get('user.headpic') instanceof \think\Collection || \think\Session::get('user.headpic') instanceof \think\Paginator ) && \think\Session::get('user.headpic')->isEmpty())): ?>/static/home/images/user2-160x160.jpg<?php else: ?>/Uploads/face/<?php echo \think\Session::get('user.headpic'); endif; ?>" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo \think\Session::get('user')['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="<?php if(empty(\think\Session::get('user.headpic')) || ((\think\Session::get('user.headpic') instanceof \think\Collection || \think\Session::get('user.headpic') instanceof \think\Paginator ) && \think\Session::get('user.headpic')->isEmpty())): ?>/static/home/images/user2-160x160.jpg<?php else: ?>/Uploads/face/<?php echo \think\Session::get('user.headpic'); endif; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo \think\Session::get('user')['name']; ?>
                                <small>注册日期: <?php echo date("Y-m-d H:i:s", \think\Session::get('user')['addtime']); ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/merchant/setting" class="">设置</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo url('login/loginout'); ?>" class="btn btn-default btn-flat">登出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 656px;"><section class="sidebar" style="height: 656px; overflow: hidden; width: auto;">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="height: 80px;">
            <div class="pull-left image">
                <img src="<?php if(empty(\think\Session::get('user.headpic')) || ((\think\Session::get('user.headpic') instanceof \think\Collection || \think\Session::get('user.headpic') instanceof \think\Paginator ) && \think\Session::get('user.headpic')->isEmpty())): ?>/static/home/images/user2-160x160.jpg<?php else: ?>/Uploads/face/<?php echo \think\Session::get('user.headpic'); endif; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo \think\Session::get('user')['name']; ?></p>
                <!-- Status -->
              <i class="fa fa-circle text-success"></i>
          <?php if(\think\Session::get('user.reg_type') == 1 and \think\Session::get('user.reg_check') == 1): ?>
        商户
        <?php elseif(\think\Session::get('user.reg_type') == 2 and \think\Session::get('user.trader_check') == 1): ?>
        承兑商
        <?php elseif(\think\Session::get('user.reg_type') == 3 and \think\Session::get('user.agent_check') == 1): ?>
        代理商
        <?php endif; ?>
            </div>
        </div>

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <?php if(\think\Session::get('user.reg_type') == 1 and \think\Session::get('user.reg_check') == 1): ?>
        
        <ul class="sidebar-menu">
            <li class="header">菜单</li>

            <li>
                             <a href="/merchant/index">
                            <i class="fa fa-bar-chart"></i>
                <span>首页</span>
            </a>
        </li>
    <li>
                            <a href="/merchant/adindex">
                           <i class="fa fa-bullhorn"></i>
               <span>出售广告</span>
           </a>
       </li>
    <li>
                            <a href="/merchant/ordersell">
                           <i class="fa fa-list"></i>
               <span>匹配订单列表</span>
           </a>
       </li>
<li>

                             <a href="/merchant/tibi">
                            <i class="fa fa-credit-card-alt"></i>
                <span>商户提币</span>
            </a>
        </li>
    <li>

                      <a href="/merchant/pkorder">
                           <i class="fa fa-list"></i>
               <span>盘口用户订单列表</span>
           </a>
       </li>
    <li>
	                             <a href="/merchant/recharge">
                            <i class="fa fa-hospital-o"></i>
                <span>盘口用户充值记录</span>
            </a>
        </li>
    <li>
                             <a href="/merchant/address">
                            <i class="fa fa-bars"></i>
                <span>盘口用户钱包地址</span>
            </a>
        </li>
    <li>
                             <a href="/merchant/withdraw">
                            <i class="fa fa-external-link"></i>
                <span>盘口用户提币记录</span>
            </a>
        </li>
    <li>
	                             <a href="/merchant/merchantSet">
                            <i class="fa fa-bars"></i>
                <span>谷歌验证</span>
            </a>
        </li>
		<li>
                             <a href="/merchant/payset">
                            <i class="fa fa-bars"></i>
                <span>支付设置</span>
            </a>
        </li>
       <li>
                             <a href="/message/index">
                            <i class="fa fa-comment"></i>
                <span>反馈问题</span>
            </a>
        </li>
		<li>
                             <a href="/merchant/log">
                            <i class="fa fa-list-ol"></i>
                <span>登录日志</span>
            </a>
        </li>
        </ul>
        <?php elseif(\think\Session::get('user.reg_type') == 2 and \think\Session::get('user.trader_check') == 1): ?>
        <ul class="sidebar-menu">
      <li>
	                <a href="/merchant/index">
                            <i class="fa fa-bar-chart"></i>
                <span>首页</span>
            </a>
        </li>
    <li>

                             <a href="/merchant/traderrecharge">
                            <i class="fa fa-usd"></i>
                <span>承兑商充值</span>
            </a>
        </li>
        <li>                             <a href="/merchant/tibi">
                            <i class="fa fa-credit-card-alt"></i>
                <span>承兑商提币</span>
            </a>
        </li>
    <li>
                             <a href="/merchant/newad">
                            <i class="fa fa-signal"></i>
                <span>发布广告</span>
            </a>
        </li>
        <li>
                            <a href="/merchant/adindex">
                           <i class="fa fa-bullhorn"></i>
               <span>求购广告</span>
           </a>
       </li>
       <li>
                            <a href="/merchant/ordersell">
                           <i class="fa fa-list"></i>
               <span>卖出订单列表</span>
           </a>
       </li>
        <li>

                             <a href="/merchant/orderlist">
                            <i class="fa fa-list"></i>
                <span>匹配订单列表</span>
            </a>
        </li>
        <li>
                             <a href="/merchant/orderlistbuy">
                            <i class="fa fa-list"></i>
                <span>购买订单列表</span>
            </a>
        </li>
        <li>
                             <a href="/merchant/traderreward">
                            <i class="fa fa-tasks"></i>
                <span>出售订单奖励</span>
            </a>
        </li>
    <li>
                         	<a href="/merchant/payset">
                            <i class="fa fa-paypal"></i>
                <span>支付设置</span>
            </a>
        </li>
        <li>
                              <a href="/merchant/merchantSet">
                            <i class="fa fa-bars"></i>
                <span>谷歌验证</span>
            </a>
        </li>
       <li>
                            <a href="/message/index">
                            <i class="fa fa-comment"></i>
                <span>反馈问题</span>
            </a>
        </li>
		<li>
                             <a href="/merchant/log">
                            <i class="fa fa-list-ol"></i>
                <span>登录日志</span>
            </a>
        </li>
        </ul>
        <?php elseif(\think\Session::get('user.reg_type') == 3 and \think\Session::get('user.agent_check') == 1): ?>
        <ul class="sidebar-menu">
            <li class="header">菜单</li>
    <li>

	                       <a href="/merchant/index">
                            <i class="fa fa-bar-chart"></i>
                <span>首页</span>
            </a>
        </li>
    <li>

                             <a href="/merchant/tibi">
                            <i class="fa fa-credit-card-alt"></i>
                <span>商户提币</span>
            </a>
        </li>
    <li>
                             <a href="/merchant/merchantSet">
                            <i class="fa fa-bars"></i>
                <span>谷歌验证</span>
            </a>
        </li>
       <li>
                            <a href="/merchant/adindex">
                           <i class="fa fa-bullhorn"></i>
               <span>出售广告</span>
           </a>
       </li>
       <li>
                            <a href="/merchant/ordersell">
                           <i class="fa fa-list"></i>
               <span>匹配订单列表</span>
           </a>
       </li>
        <li>
                             <a href="/merchant/downmerchant">
                            <i class="fa fa-user-plus"></i>
                <span>下级商户</span>
            </a>
        </li>
        <li>
                             <a href="/merchant/agentreward">
                            <i class="fa fa-tasks"></i>
                <span>代理奖励</span>
            </a>
        </li>
        <li>
                             <a href="/merchant/payset">
                            <i class="fa fa-paypal"></i>
                <span>支付设置</span>
            </a>
        </li>
    <li>
                             <a href="/message/index">
                            <i class="fa fa-comment"></i>
                <span>反馈问题</span>
            </a>
        </li>
    <li>
                             <a href="/merchant/log">
                            <i class="fa fa-list-ol"></i>
                <span>登录日志</span>
            </a>
        </li>
        </ul>
        <?php endif; ?>
        <!-- /.sidebar-menu -->
    </section><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.2); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 656px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    <!-- /.sidebar -->
</aside>
    <div class="content-wrapper" id="pjax-container" style="min-height: 414px;">
            <section class="content-header"><h1>
            谷歌验证
            <small>配置</small>
        </h1>

        <!-- breadcrumb start -->
                <!-- breadcrumb end -->

    </section><section class="content"><div class="row"><div class="col-md-12">
<style>
   .config-forms>form{
       margin: 10px;
       border-bottom: 1px solid #eee;
   }
   .config-forms>form:last-child{
       border-bottom: none;
   }
</style>
<div class="box box-info">
    <div class="box-body config-forms">
        <form action="" method="post" class="form-horizontal hide">
            <input type="hidden" name="_token" value="hdMCdhk5gT8sPEOpfjfOro8DmTlYVlKsfRtHuxYl"><div class="form-group">
                <label class="col-md-2 control-label">支付设置</label>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label><input type="checkbox" name="config_pay_channel[]" value="1" checked="">启用支付宝 </label>
                    </div>
                </div>
                <div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">提交</button></div>
            </div>
        </form>

        <form action="" method="post" class="form-horizontal hide">
            <input type="hidden" name="_token" value="hdMCdhk5gT8sPEOpfjfOro8DmTlYVlKsfRtHuxYl"><div class="form-group">
                <label class="col-md-2 control-label">提现使用短信认证</label>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label><input type="checkbox" name="config_payment_sms" value="1">启用安全短信 </label>
                    </div>
                </div>
                <div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">提交</button></div>
            </div>
        </form>

        <form action="" method="post" class="hide form-horizontal">
            <input type="hidden" name="_token" value="hdMCdhk5gT8sPEOpfjfOro8DmTlYVlKsfRtHuxYl"><div class="form-group">
                <label class="col-md-2 control-label">安全通知手机号</label>
                <div class="col-md-2">
                    <input type="text" disabled="" name="mobile" value="18565074862" class="form-control">
</div>
                <div class="col-sm-3">
                    <a class="btn btn-link x-action-sms" data-url="http://we.btc360.io/admin/channel/config/oldSms">获取验证码</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="text" name="code" value="" placeholder="当前手机号验证码" class="form-control">
</div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="text" name="new_mobile" value="" placeholder="新的手机号" class="form-control">
</div>
                <div class="col-sm-1">
                    <a class="btn btn-link x-action-sms" data-url="http://we.btc360.io/admin/channel/config/newSms">获取验证码</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="text" name="new_code" value="" placeholder="新手机号验证码" class="form-control">
</div>
                <div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">提交</button></div>
            </div>
        </form>

        <form action="" method="post" class="form-horizontal hide" autocomplete="off">
            <input type="hidden" name="_token" value="hdMCdhk5gT8sPEOpfjfOro8DmTlYVlKsfRtHuxYl"><div class="form-group">
                <label class="col-md-2 control-label">设置交易密码</label>
                <div class="col-md-2">
                    <input type="text" name="code" placeholder="请输入安全验证码" class="form-control">
</div>
                <div class="col-sm-1">
                    <a class="btn btn-link x-action-sms" data-url="http://we.btc360.io/admin/channel/sms">获取验证码</a>
                </div>
            </div>
                        <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="password" name="new_trans_pass" value="" placeholder="初始化交易密码" class="form-control" autocomplete="off">
</div>
                <div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">提交</button></div>
            </div>
                    </form>
         <form action="/merchant/merchantSet" method="post" class="form-horizontal" autocomplete="off">
         	<div class="form-group">
                <label class="col-md-2 control-label">谷歌验证</label>
                <div class="col-md-2"></div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label" style="text-align:left;padding-bottom:10px;">
                	1.在您的手机上安装谷歌两步验证程序：GOOGLE Authenticator

                </label>
                <div class="col-md-2" style="float:none;">
                	<a  target="_blank" href="http://itunes.apple.com/cn/app/google-authenticator/id388497605?mt=8"><img src="/static/home/images/apple.png" style="width: 172px;" alt=""></a>
                	<!--<img src="/static/home/images/goole.png" style="width: 172px;margin-top:10px;" alt="">-->
                	<a  target="_blank" href="https://sj.qq.com/myapp/detail.htm?apkName=com.google.android.apps.authenticator"><img src="/static/home/images/yyb.png" style="width: 172px;margin-top:10px;" alt=""></a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label" style="text-align:left;">
                	2.打开两步验证程序，手动添加并输入密钥： <?php echo $Asecret; ?>
                        手动添加时需要填写账户，直接填写登录账号即可也可以直接扫描下方二维码以添加验证令牌
                </label>
                <div class="col-md-2" style="float:none;padding-top:70px;" id="qrcode">
                </div>
            </div>
            <?php if(($is_ga == 0)): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">配置验证模块</label>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label><input type="checkbox" name="ga_login" value="1" checked="">登录 </label>
                        <label><input type="checkbox" name="ga_transfer" value="1" checked="">提币 </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="text" name="ga" value="" placeholder="请填写两步验证码" class="form-control">
				</div>
				<input type="hidden" name="type" value="add"/>
				<div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">启用</button></div>
            </div>
            <script type="text/javascript" src="/static/home/js/jquery.qrcode.min.js"></script>
                <script>
                    $('#qrcode').qrcode({
                        render: "table",
                        size: 200,
                        text: "<?php echo $qrCodeUrl; ?>"
                    });
                </script>
            <?php else: ?>
            <div class="form-group">
                <label class="col-md-2 control-label">配置验证模块</label>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label><input type="checkbox" name="ga_login" value="1" <?php if($ga_login == '1'): ?>checked="1"<?php endif; ?>>登录 </label>
                        <label><input type="checkbox" name="ga_transfer" value="1" <?php if($ga_transfer == '1'): ?>checked="1"<?php endif; ?>>提币 </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">&nbsp;</label>
                <div class="col-md-2">
                    <input type="text" name="ga" value="" placeholder="请输入双重验证密码" class="form-control">
				</div>
				<input type="hidden" name="type" value="updat"/>
				<div class="col-md-2"><button type="submit" class="btn btn-sm btn-info">提交</button></div>
            </div>
            <?php endif; ?>
         </form>
    </div>
</div>

<script>
$(function () {
    var delay = 30;
    var now;
    $('.x-action-sms').each(function () {
        var $btn = $(this);
        $btn.click(function () {
            if (this.disabled) {
                return;
            }
            this.disabled = true;
            var url = $btn.data('url');
            var mobile = $btn.closest('.form-group').find('input').val();

            $.ajax({
                url: url,
                type:'post',
                data: {_token: LA.token, mobile: mobile},
                success:function (res) {
                    if (res.code != 0) {
                        toastr.error(res.msg, null);
                        $btn[0].disabled = false;
                        return;
                    }

                    now = delay;
                    var timer = setInterval(function () {
                        now--;
                        if (now == 0) {
                            clearInterval(timer);
                            $btn[0].disabled = false;
                            return;
                        }
                        $btn.html(now + '秒 重新获取');
                    }, 1000)
                },
                error:function () {
                    $btn[0].disabled = false;
                    toastr.error('发生错误，请重试', null);
                }
            });

        });
    });
})
</script>
</div></div>

    </section><script data-exec-on-popstate="">

    $(function () {
            });
</script></div>
    <!-- Main Footer -->
<footer class="main-footer hidden" style="">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <strong>Version</strong>&nbsp;&nbsp;0.5.1
    </div>
    <!-- Default to the left -->
    <strong>Powered by btc360</strong>
</footer>
</div>

<!-- ./wrapper -->

<script>
    function LA() {}
    LA.token = "hdMCdhk5gT8sPEOpfjfOro8DmTlYVlKsfRtHuxYl";
</script>

<!-- REQUIRED JS SCRIPTS -->
<script src="/static/home/js/jquery.nestable.js"></script>
<script src="/static/home/js/toastr.min.js"></script>
<script src="/static/home/js/bootstrap-editable.min.js"></script>
<script src="/static/home/js/sweetalert.min.js"></script>
<script src="/static/home/js/icheck.min.js"></script>
<script src="/static/home/js/bootstrap-colorpicker.min.js"></script>
<script src="/static/home/js/jquery.inputmask.bundle.min.js"></script>
<script src="/static/home/js/moment-with-locales.min.js"></script>
<script src="/static/home/js/bootstrap-datetimepicker.min.js"></script>
<script src="/static/home/js/canvas-to-blob.min.js"></script>
<script src="/static/home/js/fileinput.min.js"></script>
<script src="/static/home/js/select2.full.min.js"></script>
<script src="/static/home/js/bootstrap-number-input.js"></script>
<script src="/static/home/js/icheck.min.js"></script>
<script src="/static/home/js/ion.rangeSlider.min.js"></script>
<script src="/static/home/js/bootstrap-switch.min.js"></script>
<script src="/static/home/js/fontawesome-iconpicker.min.js"></script>
<script src="/static/home/js/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/static/home/js/kindeditor-all-min.js"></script>
<script src="/static/home/js/zh-CN.js"></script>
<script src="/static/home/js/prettify.js"></script>

<script src="/static/home/js/laravel-admin.js"></script>

<script>
    $(function() {
        var interval = 5000;
        var $con = $('.sidebar-menu a[href!="#"]');
        if (!$con.length) return;
        var refresh = function () {
            $.get('http://we.btc360.io/admin/common/state', function (rs) {
                if (typeof rs == 'string') {
                    interval = interval > 60000 ? 60000 : interval * 2;
                    return setTimeout(refresh, interval);
                }
                interval = 5000;
                $con.find('.pull-right-container').remove();
                $con.each(function(){
                    var total = null;
                    if(this.href.indexOf('order_exception')>0){
                        total = rs.order_exception_total;
                    }
                    if(this.href.indexOf('payment_exception')>0){
                        total = rs.payment_exception_total;
                    }
                    if(this.href.indexOf('message')>0){
                        total = rs.message_total;
                        if(total == 0){
                            total = '';
                        }
                        $("#message_total").html(total);
                    }
                    if(!total){
                        return;
                    }
                    $(this).append('<span class="pull-right-container"><small class="label pull-right bg-red">' + total + '</small></span>');
                });
                setTimeout(refresh, interval);
            });
        };
        //refresh();
    });
</script>



</body></html>