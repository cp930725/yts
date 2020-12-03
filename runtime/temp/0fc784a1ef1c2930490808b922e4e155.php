<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:77:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/merchant/index.html";i:1010059850;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/header_new.html";i:1572787926;s:73:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_merchant.html";i:315504000;s:71:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_trader.html";i:1979183310;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_agent.html";i:315504000;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/footer_new.html";i:1563934900;}*/ ?>
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
<script src="/static/admin/js/layer/layer.js"></script>

<div class="content-wrapper" id="pjax-container" style="min-height: 706px;">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h5>账户余额(1 USDT=¥<?php echo $price; ?>)</h5>
                                </span>
                                <span class="info-box-number"><?php echo $merchant['usdt']; ?></span>
                                <span class="info-box-number">≈¥<?php echo round($merchant['usdt']*$price, 4); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-usd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h5>冻结余额(1 USDT=¥<?php echo $price; ?>)</h5>
                                </span>
                                <span class="info-box-number"><?php echo $merchant['usdtd']; ?></span>
                                <span class="info-box-number">≈¥<?php echo round($merchant['usdtd']*$price, 4); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h5>代理商</h5>
                                </span>
                                <span class="info-box-number">
                                    <?php if($merchant['agent_check'] == 0 and $merchant['reg_type'] == 3): ?>
                                    <a href="/merchant/applyAgent">申请</a>
                                    <?php elseif($merchant['agent_check'] == 1): ?>
                                    通过
                                    <?php elseif($merchant['agent_check'] == 2): ?>
                                    拒绝
                                    <?php elseif($merchant['agent_check'] == 3): ?>
                                    待审核
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="/merchant/withdraw?status=1">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-credit-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>目前待审核提币记录</h5>
                                    </span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="/merchant/tibi?status=1">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-credit-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>目前待审核提币卖币</h5>
                                    </span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-buysellads"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h5>交易员</h5>
                                </span>
                                <span class="info-box-number">
                                    <?php if($merchant['trader_check'] == 0 and $merchant['reg_type'] == 2): ?>
                                    <a href="/merchant/applyTrader">申请</a>
                                    <?php elseif($merchant['trader_check'] == 1): ?>
                                    通过
                                    <?php elseif($merchant['trader_check'] == 2): ?>
                                    拒绝
                                    <?php elseif($merchant['trader_check'] == 3): ?>
                                    待审核
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($merchant['reg_type'] == '1'): ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4>对接说明</h4>
                        <div class="info-box" style="min-height:auto;">
                            <table class="table" style="margin: 0;">
                                <tbody>
                                    <tr>
                                        <td>商户使用手册：<a href="/商户使用手册.pdf" target="_blank" download="">下载</a></td>
                                    </tr>
                                    <tr>
                                        <td>纯USDT充提对接文档下载：<a href="/api.pdf" target="_blank" download="">下载</a></td>
                                        <td>充值RMB对接承兑商文档下载：<a href="/交易员api.pdf" target="_blank" download="">下载</a></td>
                                    </tr>
                                    <tr>
                                        <td>纯USDT充提Demo下载：<a href="/商户对接-demo(PHP).rar" target="_blank" download="">下载</a></td>
                                        <td>充值RMB对接Demo下载：<a href="/交易员对接-demo(PHP).rar" target="_blank" download="">下载</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>接口配置</h4>
                        <div class="info-box" style="min-height:auto;">
                            <table class="table" style="margin: 0;">
                                <tbody>
                                    <tr>
                                        <th>商户ID</th>
                                        <td><?php echo \think\Session::get('user')['appid']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>商户MD5Key</th>
                                        <td><?php echo \think\Session::get('user')['key']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; if($merchant['agent_check'] == '1'): ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4>邀请信息</h4>
                        <div class="info-box" style="min-height:auto;">
                            <table class="table" style="margin: 0;">
                                <tbody>
                                    <tr>
                                        <th>邀请码</th>
                                        <td><input type="text" id="invite" class="form-control" value="<?php echo $merchant['invite']; ?>" readOnly /></td>
                                        <td><input type="button" data-clipboard-target="#invite" id="copy_button1" class="btn btn-sm btn-info inviteCopyButton" value="复制"></td>
                                    </tr>
                                    <tr>
                                        <th>邀请链接(商户)</th>
                                        <td><input type="text" id="inviteurl" class="form-control" readOnly value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/register?invite=<?php echo $merchant['invite']; ?>&type=1" /></td>
                                        <td><button type="button" data-clipboard-target="#inviteurl" id="copy_button2" class="btn btn-sm btn-info inviteCopyButton">复制</button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>邀请信息</h4>
                        <div class="info-box" style="min-height:auto;">
                            <table class="table" style="margin: 0;">
                                <tbody>
                                   <tr>
                                        <th>邀请链接(承兑商)</th>
                                        <td><input type="text" id="inviteurl2" class="form-control" readOnly value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/register?invite=<?php echo $merchant['invite']; ?>&type=2" /></td>
                                        <td><button type="button" data-clipboard-target="#inviteurl2" id="copy_button3" class="btn btn-sm btn-info inviteCopyButton">复制</button></td>
                                    </tr>
                                    <tr>
                                        <th>邀请链接(代理)</th>
                                        <td><input type="text" id="inviteurl3" class="form-control" readOnly value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/register?invite=<?php echo $merchant['invite']; ?>&type=3" /></td>
                                        <td><button type="button" data-clipboard-target="#inviteurl3" id="copy_button4" class="btn btn-sm btn-info inviteCopyButton">复制</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; if($merchant['pid'] != '0'): ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4>邀请信息</h4>
                        <div class="info-box" style="min-height:auto;">
                            <table class="table" style="margin: 0;">
                                <tbody>
                                    <tr>
                                        <th>您的邀请人:</th>
                                        <td><input type="text" id="invite" class="form-control" value="<?php echo $myacc['name']; ?>" readOnly /></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 <?php endif; ?>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <i class="fa fa-cogs"></i><?php echo $vo['name']; ?>
                                </div>
                                <div class="panel-body list-group">
                                    <?php if(!(empty($vo['article']) || (($vo['article'] instanceof \think\Collection || $vo['article'] instanceof \think\Paginator ) && $vo['article']->isEmpty()))): if(is_array($vo['article']) || $vo['article'] instanceof \think\Collection || $vo['article'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                    <a href="/merchant/detail?id=<?php echo $vv['id']; ?>" class="list-group-item">
                                        <?php echo $vv['title']; ?>
                                        <span class="badge"><?php echo date("Y-m-d H:i:s", $vv['create_time']); ?></span>
                                    </a>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="row" style="display:none;">
                    <div class="col-md-6">
                        <h4>近期订单量趋势图</h4>
                        <div class="info-box" id="chart-1" style="height: 400px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" _echarts_instance_="ec_1541645437776">
                            <div style="position: relative; overflow: hidden; width: 614px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="767" height="500" style="position: absolute; left: 0px; top: 0px; width: 614px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>近期买卖币趋势图</h4>
                        <div class="info-box" id="chart-2" style="height: 400px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" _echarts_instance_="ec_1541645437777">
                            <div style="position: relative; overflow: hidden; width: 614px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="767" height="500" style="position: absolute; left: 0px; top: 0px; width: 614px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <script src="/static/home/js/echarts.common.min.js"></script>
                <script>
                var chart1 = echarts.init(document.getElementById('chart-1'));
                chart1.setOption({
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
                        type: 'category',
                        data: []
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                        name: '订单数量',
                        data: [],
                        type: 'line'
                    }]
                });
                var chart2 = echarts.init(document.getElementById('chart-2'), 'walden');
                chart2.setOption({
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
                        type: 'category',
                        data: []
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                            name: '入金',
                            data: [],
                            type: 'line'
                        },
                        {
                            name: '出金',
                            data: [],
                            type: 'line'
                        }
                    ]
                });
                </script>
                <!-- <script src="/static/home/js/ZeroClipboard.min.js"></script> -->
                 <script src="/static/home/js/pay/clipboard.min.js"></script>
                <script>
                $(document).ready(function() {
                    var clip1 = new ClipboardJS("#copy_button1");
                    var clip2 = new ClipboardJS("#copy_button2");
                    var clip3 = new ClipboardJS("#copy_button3");
                    var clip4 = new ClipboardJS("#copy_button4");
                    // var clip1 = new ZeroClipboard(document.getElementById("copy_button1"));
                    // var clip2 = new ZeroClipboard(document.getElementById("copy_button2"));
                    clip1.on("success", function(e) {
                        layer.msg('复制成功！', {icon: 1});
                        // alert('复制成功');
                    });
                    clip2.on("success", function(e) {
                        layer.msg('复制成功！', {icon: 1});
                        // alert('复制成功');
                    });
                    clip3.on("success", function(e) {
                        layer.msg('复制成功！', {icon: 1});
                        // alert('复制成功');
                    });
                    clip4.on("success", function(e) {
                        layer.msg('复制成功！', {icon: 1});
                        // alert('复制成功');
                    });
                })
                </script>
            </div>
        </div>
    </section>
    <script data-exec-on-popstate="">
    $(function() {});
    </script>
</div>
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