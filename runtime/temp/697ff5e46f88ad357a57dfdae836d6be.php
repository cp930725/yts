<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:78:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/merchant/payset.html";i:1606981034;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/header_new.html";i:1572787926;s:73:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_merchant.html";i:315504000;s:71:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_trader.html";i:1979183310;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_agent.html";i:315504000;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/footer_new.html";i:1563934900;}*/ ?>
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
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="/message/index#tab_1464414772" data-toggle="tab">银联支付</a></li>
						<li><a href="/message/index#tab_886859313" data-toggle="tab">支付宝</a></li>
						<li><a href="/message/index#tab_1558780376" data-toggle="tab">微信支付</a></li>
						<li><a href="/message/index#tab_886859312" data-toggle="tab">USDT</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1464414772">
							<form action="<?php echo url('home/merchant/doaccount'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
							 enctype="multipart/form-data" pjax-container="">
								<div class="box-body">
									<div class="fields-group">
										<div class="form-group ">
											<label class="col-sm-2  control-label">姓名</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="truename" name="truename" value="" class="form-control password" placeholder="您的真实姓名">
												</div>
											</div>
										</div>
						
										<div class="form-group ">
											<label class="col-sm-2  control-label">银行卡号标识</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="name" name="name" value="" class="form-control password" placeholder="银行卡标识">
												</div>
											</div>
										</div>
										<div class="form-group  ">
											<label for="name" class="col-sm-2  control-label">开户银行</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="c_bank" name="c_bank" value="" class="form-control password" placeholder="开户银行">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password" class="col-sm-2  control-label">开户支行</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_detail" name="c_bank_detail" value="" class="form-control password"
												 placeholder="开户支行">
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password_confirmation" class="col-sm-2  control-label">银行卡号</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_card" name="c_bank_card" value="" class="form-control c_bank_card"
												 placeholder="银行卡号">
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password_confirmation" class="col-sm-2  control-label">确认卡号</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_card_again" name="c_bank_card_again" value="" class="form-control c_bank_card"
												 placeholder="确认卡号">
											</div>
										</div>
									</div>
									<div class="box-footer">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<div class="btn-group pull-right">
												<input type="hidden" name="id" id="id" value="" />
												<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
											</div>
											<div class="btn-group pull-left">
												<button type="reset" class="btn btn-warning">重置</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="tab-content">
								<div class="" id="">
									<table class="table">
										<thead>
											<tr>
												<th>姓名</th>
												<!--<th>银行类型</th>-->
												<!--<th>银行账户id</th>-->
												<th>标识</th>
												<th>开户银行</th>
												<th>开户支行</th>
												<th>银行卡号</th>
												<th>创建时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<tr>
												<td><?php echo $vo['truename']; ?></td>
												<!--<td><?php echo $vo['bankdaima']; ?></td>-->
												<!--<td><?php echo $vo['bankid']; ?></td>-->
												<td><?php echo $vo['name']; ?></td>
												<td><?php echo $vo['c_bank']; ?></td>
												<td><?php echo $vo['c_bank_detail']; ?></td>
												<td><?php echo $vo['c_bank_card']; ?></td>
												<td><?php echo date('Y-m-d H:i', $vo['create_time']); ?></td>
												<td>
													<a href="javascript:;;" class="btn btn-sm btn-success edit" data-id='<?php echo $vo['id']; ?>'>编辑</a>
													<a id="<?php echo $vo['id']; ?>" class="btn btn-sm btn-danger del">删除</a>
												</td>
											</tr>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>

									</table>
								</div>
								<div class="box-footer clearfix">
									<?php echo $list->render(); ?>
								</div>
							</div>
						</div>




						<div class="tab-pane" id="tab_1464414772Z">
							<form action="<?php echo url('home/merchant/doaccount2'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
								  enctype="multipart/form-data" pjax-container="">
								<div class="box-body">
									<div class="fields-group">
										<div class="form-group ">
											<label class="col-sm-2  control-label">姓名</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="truename" name="truename" value="" class="form-control password" placeholder="您的真实姓名">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<label class="col-sm-2  control-label">银行类型</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="bankdaima" name="bankdaima" value="" class="form-control password" placeholder="银行类型">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<label class="col-sm-2  control-label">银行账户ID</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="bankid" name="bankid" value="" class="form-control password" placeholder="银行账户ID">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<label class="col-sm-2  control-label">银行卡号标识</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="name" name="name" value="" class="form-control password" placeholder="银行卡标识">
												</div>
											</div>
										</div>
										<div class="form-group  ">
											<label for="name" class="col-sm-2  control-label">开户银行</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="c_bank" name="c_bank" value="" class="form-control password" placeholder="开户银行">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password" class="col-sm-2  control-label">开户支行</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_detail" name="c_bank_detail" value="" class="form-control password"
													   placeholder="开户支行">
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password_confirmation" class="col-sm-2  control-label">银行卡号</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_card" name="c_bank_card" value="" class="form-control c_bank_card"
													   placeholder="银行卡号">
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="password_confirmation" class="col-sm-2  control-label">确认卡号</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="c_bank_card_again" name="c_bank_card_again" value="" class="form-control c_bank_card"
													   placeholder="确认卡号">
											</div>
										</div>
									</div>
									<div class="box-footer">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<div class="btn-group pull-right">
												<input type="hidden" name="id" id="id" value="" />
												<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
											</div>
											<div class="btn-group pull-left">
												<button type="reset" class="btn btn-warning">重置</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="tab-content">
								<div>
									<table class="table">
										<thead>
										<tr>
											<th>姓名</th>
											<th>银行类型</th>
											<th>银行账户id</th>
											<th>标识</th>
											<th>开户银行</th>
											<th>开户支行</th>
											<th>银行卡号</th>
											<th>创建时间</th>
											<th>操作</th>
										</tr>
										</thead>
										<tbody>
										<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> <!--原来变量为list7-->
										<tr>
											<td><?php echo $vo['truename']; ?></td>
											<td><?php echo $vo['bankdaima']; ?></td>
											<td><?php echo $vo['bankid']; ?></td>
											<td><?php echo $vo['name']; ?></td>
											<td><?php echo $vo['c_bank']; ?></td>
											<td><?php echo $vo['c_bank_detail']; ?></td>
											<td><?php echo $vo['c_bank_card']; ?></td>
											<td><?php echo date('Y-m-d H:i', $vo['create_time']); ?></td>
											<td>
												<a href="javascript:;;" class="btn btn-sm btn-success edit2" data-id='<?php echo $vo['id']; ?>'>编辑</a>
												<a id="<?php echo $vo['id']; ?>" class="btn btn-sm btn-danger del_6">删除</a>
											</td>
										</tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>

									</table>
								</div>
								<div class="box-footer clearfix">
									<?php echo $list->render(); ?>
								</div>
							</div>
						</div>









						<div class="tab-pane " id="tab_886859313">
							<form action="<?php echo url('home/merchant/doalipaynew'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
							 enctype="multipart/form-data" pjax-container="">
								<div class="box-body">
									<div class="fields-group">
										<div class="form-group ">
											<label class="col-sm-2  control-label">姓名</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="zfbtruename" name="zfbtruename" class="form-control password" placeholder="您的真实姓名">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<label class="col-sm-2  control-label">账户标识</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="zfbname" name="zfbname" class="form-control password" placeholder="填写用于区别的标识,如账户1,账户2">
												</div>
											</div>
										</div>
										<div class="form-group  ">
											<label for="name" class="col-sm-2  control-label">支付宝账号</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="alipay_account" name="alipay_account" value="" class="form-control alipay_account"
													 placeholder="输入支付宝账号">
												</div>
											</div>
										</div>
										<div class="form-group  ">
											<label for="avatar" class="col-sm-2  control-label">收款码</label>
											<div class="col-sm-8">
												<div class="file-input">
													<div class="file-preview ">
														<input type="file" class="avatar" name="avatar" data-initial-preview="/static/home/images/zfb.png"
														 data-initial-caption="请选择支付宝收款码" id="1542010388780">
														<input type="hidden" id="img" name="last_alipay_img" value="">
													</div>
												</div>
											</div>
											<div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<div class="kv-zoom-actions pull-right"><button type="button" class="btn btn-default btn-header-toggle btn-toggleheader"
																 title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-vertical"></i></button><button
																 type="button" class="btn btn-default btn-fullscreen" title="Toggle full screen" data-toggle="button"
																 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-fullscreen"></i></button><button
																 type="button" class="btn btn-default btn-borderless" title="Toggle borderless mode" data-toggle="button"
																 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-full"></i></button><button
																 type="button" class="btn btn-default btn-close" title="Close detailed preview" data-dismiss="modal"
																 aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div>
															<h3 class="modal-title">Detailed Preview <small><span class="kv-zoom-title"></span></small></h3>
														</div>
														<div class="modal-body">
															<div class="floating-buttons"></div>
															<div class="kv-zoom-body file-zoom-content"></div>
															<button type="button" class="btn btn-navigate btn-prev" title="View previous file"><i class="glyphicon glyphicon-triangle-left"></i></button>
															<button type="button" class="btn btn-navigate btn-next" title="View next file"><i class="glyphicon glyphicon-triangle-right"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.box-body -->
										<div class="box-footer">
											<div class="col-md-2">
											</div>
											<div class="col-md-8">
												<div class="btn-group pull-right">
													<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
												</div>
												<div class="btn-group pull-left">
													<button type="reset" class="btn btn-warning">重置</button>
												</div>
											</div>
										</div>
									</div>
							</form>
							<div class="tab-content">
								<div class="" id="">
									<table class="table">
										<thead>
											<tr>
												<th>姓名</th>
												<th>标识</th>
												<th>支付宝账号</th>
												<th>收款码(点击图片查看)</th>
												<th>创建时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<tr>
												<td><?php echo $vo['truename']; ?></td>
												<td><?php echo $vo['name']; ?></td>
												<td><?php echo $vo['c_bank']; ?></td>
												<td><a onclick="show('<?php echo $vo['c_bank_detail']; ?>')"><img src="/uploads/face/<?php echo $vo['c_bank_detail']; ?>" style="width: 30px;"></a></td>
												<td><?php echo date('Y-m-d H:i', $vo['create_time']); ?></td>
												<td>
													<!--  <a href="javascript:;;" class="btn btn-sm btn-success editzfb" data-id='<?php echo $vo['id']; ?>'>编辑</a> -->
													<a id="<?php echo $vo['id']; ?>" class="btn btn-sm btn-danger delzfb">删除</a>
												</td>
											</tr>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>

									</table>
								</div>
								<div class="box-footer clearfix">
									<?php echo $list->render(); ?>
								</div>
							</div>
						</div>
					</div>
						<div class="tab-pane " id="tab_886859312">
								<form action="<?php echo url('home/merchant/dousdt'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
								 enctype="multipart/form-data" pjax-container="">
									<div class="box-body">
										<div class="fields-group">
											<div class="form-group ">
												<label class="col-sm-2  control-label">USDT地址</label>
												<div class="col-sm-8">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
														<input type="text" id="zfbtruename" name="zfbtruename" class="form-control password" placeholder="您的USDT地址">
													</div>
												</div>
											</div>
											<!-- /.box-body -->
											<div class="box-footer">
												<div class="col-md-2">
												</div>
												<div class="col-md-8">
													<div class="btn-group pull-right">
														<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
													</div>
													<div class="btn-group pull-left">
														<button type="reset" class="btn btn-warning">重置</button>
													</div>
												</div>
											</div>
										</div>
								</form>
							<div class="tab-content">
								<div class="" id="">
									<table class="table">
										<thead>
										<tr>
											<th>USDT地址</th>
											<th>创建时间</th>
											<th>操作</th>
										</tr>
										</thead>
										<tbody>
										<?php if(is_array($list4) || $list4 instanceof \think\Collection || $list4 instanceof \think\Paginator): $i = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<tr>
											<td><?php echo $vo['address']; ?></td>
											<td><?php echo date('Y-m-d H:i', $vo['create_time']); ?></td>
											<td>
												<!--  <a href="javascript:;;" class="btn btn-sm btn-success editzfb" data-id='<?php echo $vo['id']; ?>'>编辑</a> -->
												<a id="<?php echo $vo['id']; ?>" class="btn btn-sm btn-danger delusdt">删除</a>
											</td>
										</tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>

									</table>
								</div>
								<div class="box-footer clearfix">
									<?php echo $list->render(); ?>
								</div>
							</div>

						</div>
						</div>
						<div class="tab-pane " id="tab_1558780376">
							<form action="<?php echo url('home/merchant/dowechatnew'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
							 enctype="multipart/form-data" pjax-container="">
								<div class="box-body">
									<div class="fields-group">
										<div class="form-group ">
											<label class="col-sm-2  control-label">姓名</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="wxtruename" name="wxtruename" class="form-control password" placeholder="您的真实姓名">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<label class="col-sm-2  control-label">账户标识</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="wxname" name="wxname" class="form-control password" placeholder="填写用于区别的标识,如账户1,账户2">
												</div>
											</div>
										</div>
										<div class="form-group  ">
											<label for="name" class="col-sm-2  control-label">微信账号</label>
											<div class="col-sm-8">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
													<input type="text" id="wechat_account" name="wechat_account" value="<?php echo $user['c_wechat_account']; ?>" class="form-control wechat_account"
													 placeholder="输入 微信账号">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group  ">
										<label for="avatar" class="col-sm-2  control-label">收款码</label>
										<div class="col-sm-8">
											<div class="file-input">
												<div class="file-preview ">
													<input type="file" class="avatar2" name="avatar2" data-initial-preview="/static/home/images/wx.png"
													 data-initial-caption="请选择微信收款二维码" id="1542010388780">
													<input type="hidden" id="img2" name="last_wechat_img" value="<?php echo $user['c_wechat_img']; ?>">
												</div>
											</div>
										</div>
										<div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<div class="kv-zoom-actions pull-right"><button type="button" class="btn btn-default btn-header-toggle btn-toggleheader"
															 title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-vertical"></i></button><button
															 type="button" class="btn btn-default btn-fullscreen" title="Toggle full screen" data-toggle="button"
															 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-fullscreen"></i></button><button
															 type="button" class="btn btn-default btn-borderless" title="Toggle borderless mode" data-toggle="button"
															 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-full"></i></button><button
															 type="button" class="btn btn-default btn-close" title="Close detailed preview" data-dismiss="modal"
															 aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div>
														<h3 class="modal-title">Detailed Preview <small><span class="kv-zoom-title"></span></small></h3>
													</div>
													<div class="modal-body">
														<div class="floating-buttons"></div>
														<div class="kv-zoom-body file-zoom-content"></div>
														<button type="button" class="btn btn-navigate btn-prev" title="View previous file"><i class="glyphicon glyphicon-triangle-left"></i></button>
														<button type="button" class="btn btn-navigate btn-next" title="View next file"><i class="glyphicon glyphicon-triangle-right"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="box-footer">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<div class="btn-group pull-right">
												<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
											</div>
											<div class="btn-group pull-left">
												<button type="reset" class="btn btn-warning">重置</button>
											</div>
										</div>
									</div>

								</div>
							</form>
							<div class="tab-content">
								<div class="" id="">
									<table class="table">
										<thead>
											<tr>
												<th>姓名</th>
												<th>标识</th>
												<th>微信账号</th>
												<th>收款码(点击图片查看)</th>
												<th>创建时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($list3) || $list3 instanceof \think\Collection || $list3 instanceof \think\Paginator): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<tr>
												<td><?php echo $vo['truename']; ?></td>
												<td><?php echo $vo['name']; ?></td>
												<td><?php echo $vo['c_bank']; ?></td>
												<td><a onclick="show('<?php echo $vo['c_bank_detail']; ?>')"><img src="/uploads/face/<?php echo $vo['c_bank_detail']; ?>" style="width: 30px;"></a></td>
												<td><?php echo date('Y-m-d H:i', $vo['create_time']); ?></td>
												<td>
													<!--  <a href="javascript:;;" class="btn btn-sm btn-success editwx" data-id='<?php echo $vo['id']; ?>'>编辑</a> -->
													<a id="<?php echo $vo['id']; ?>" class="btn btn-sm btn-danger delwx">删除</a>
												</td>
											</tr>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>

									</table>
								</div>
								<div class="box-footer clearfix">
									<?php echo $list->render(); ?>
								</div>
							</div>
						</div>
						<div class="tab-pane " id="tab_23892081">
						<form action="<?php echo url('home/merchant/doysfnew'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
						 enctype="multipart/form-data" pjax-container="">
							<div class="box-body">
								<div class="fields-group">
									<div class="form-group ">
										<label class="col-sm-2  control-label">姓名</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="ysftruename" name="ysftruename" class="form-control password" placeholder="您的真实姓名">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<label class="col-sm-2  control-label">账户标识</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
												<input type="text" id="ysfname" name="ysfname" class="form-control password" placeholder="填写用于区别的标识,如账户1,账户2">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group  ">
									<label for="avatar" class="col-sm-2  control-label">收款码</label>
									<div class="col-sm-8">
										<div class="file-input">
											<div class="file-preview ">
												<input type="file" class="avatar2" name="avatar2" data-initial-preview="/static/home/images/ysf.jpg"
												 data-initial-caption="请选择云闪付收款码" id="ysf">
												<input type="hidden" id="img2" name="ysfimg" value="<?php echo $user['c_wechat_img']; ?>">
											</div>
										</div>
									</div>
									<div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<div class="kv-zoom-actions pull-right"><button type="button" class="btn btn-default btn-header-toggle btn-toggleheader"
														 title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-vertical"></i></button><button
														 type="button" class="btn btn-default btn-fullscreen" title="Toggle full screen" data-toggle="button"
														 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-fullscreen"></i></button><button
														 type="button" class="btn btn-default btn-borderless" title="Toggle borderless mode" data-toggle="button"
														 aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-full"></i></button><button
														 type="button" class="btn btn-default btn-close" title="Close detailed preview" data-dismiss="modal"
														 aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div>
													<h3 class="modal-title">Detailed Preview <small><span class="kv-zoom-title"></span></small></h3>
												</div>
												<div class="modal-body">
													<div class="floating-buttons"></div>
													<div class="kv-zoom-body file-zoom-content"></div>
													<button type="button" class="btn btn-navigate btn-prev" title="View previous file"><i class="glyphicon glyphicon-triangle-left"></i></button>
													<button type="button" class="btn btn-navigate btn-next" title="View next file"><i class="glyphicon glyphicon-triangle-right"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer">
									<div class="col-md-2">
									</div>
									<div class="col-md-8">
										<div class="btn-group pull-right">
											<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
										</div>
										<div class="btn-group pull-left">
											<button type="reset" class="btn btn-warning">重置</button>
										</div>
									</div>
								</div>

							</div>
						</form>
					</div>



				<div class="tab-pane " id="tab_23892081M">
					<form action="<?php echo url('home/merchant/dodmfnew'); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
						  enctype="multipart/form-data" pjax-container="">
						<div class="box-body">
							<div class="fields-group">
								<div class="form-group ">
									<label class="col-sm-2  control-label">APPID</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
											<input type="text" id="app_id" name="app_id" class="form-control password" placeholder="APPID">
										</div>
									</div>
								</div>
								<div class="form-group ">
									<label class="col-sm-2  control-label">开发者私钥</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
											<textarea name="app_rsa" id="app_rsa" class="form-control" rows="15" placeholder="APP_RSA"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group ">
									<label class="col-sm-2  control-label">支付宝公钥</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
											<textarea name="pub_key" id="pub_key" class="form-control" rows="15" placeholder="pub_key"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group ">
									<label class="col-sm-2  control-label">账户标识</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
											<input type="text" id="dmfname" name="dmfname" class="form-control password" placeholder="填写用于区别的标识,如账户1,账户2">
										</div>
									</div>
								</div>

								<div class="form-group ">
									<label class="col-sm-2  control-label">姓名</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
											<input type="text" id="dmfusername" name="dmfusername" class="form-control password" placeholder="您的真实姓名">
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<div class="col-md-2">
								</div>
								<div class="col-md-8">
									<div class="btn-group pull-right">
										<button type="submit" class="btn btn-info pull-right" data-loading-text="&lt;i class=&#39;fa fa-spinner fa-spin &#39;&gt;&lt;/i&gt; 保存">保存</button>
									</div>
									<div class="btn-group pull-left">
										<button type="reset" class="btn btn-warning">重置</button>
									</div>
								</div>
							</div>

						</div>
					</form>
				</div>

				</div>
			</div>
		</div>
</div>
</section>
<script src="/static/admin/js/layer/layer.js"></script>
<script>
	$('.edit').click(function() {
		var truename = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().html();
		var c_bank_card = $(this).parent().prev().prev().html();
		var c_bank_detail = $(this).parent().prev().prev().prev().html();
		var c_bank = $(this).parent().prev().prev().prev().prev().html();
		var name = $(this).parent().prev().prev().prev().prev().prev().html();
		var bankdaima = $(this).parent().prev().prev().prev().prev().prev().prev().prev().html();
		var bankid = $(this).parent().prev().prev().prev().prev().prev().prev().html();
		var id = $(this).attr('data-id');
		$('#c_bank').val(c_bank);

		$('#c_bank_detail').val(c_bank_detail);
		$('#bankdaima').val(bankdaima);
		$('#bankid').val(bankid);
		$('#c_bank_card').val(c_bank_card);
		$('#c_bank_card_again').val(c_bank_card);
		$('#name').val(name);
		$('#truename').val(truename);
		$('#id').val(id);
	})

	$('.edit2').click(function() {
		var truename = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().html();
		var c_bank_card = $(this).parent().prev().prev().html();
		var c_bank_detail = $(this).parent().prev().prev().prev().html();
		var c_bank = $(this).parent().prev().prev().prev().prev().html();
		var name = $(this).parent().prev().prev().prev().prev().prev().html();
		var bankdaima = $(this).parent().prev().prev().prev().prev().prev().prev().prev().html();
		var bankid = $(this).parent().prev().prev().prev().prev().prev().prev().html();
		var id = $(this).attr('data-id');
		console.log("id:".id);
		$('#tab_1464414772Z #c_bank').val(c_bank);
		$('#tab_1464414772Z #c_bank_detail').val(c_bank_detail);
		$('#tab_1464414772Z #bankdaima').val(bankdaima);
		$('#tab_1464414772Z #bankid').val(bankid);
		$('#tab_1464414772Z #c_bank_card').val(c_bank_card);
		$('#tab_1464414772Z #c_bank_card_again').val(c_bank_card);
		$('#tab_1464414772Z #name').val(name);
		$('#tab_1464414772Z #truename').val(truename);
		$('#tab_1464414772Z #id').val(id);
	})

	$('.del').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delBank'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})
	$('.del_6').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delBank2'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})



	$('.delzfb').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delZfb'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})
	
	$('.delusdt').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delusdt'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})
	$('.delwx').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delWx'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})
	$('.delysf').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/delYsf'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})

	$('.deldmf').click(function() {
		// $(this).parent().parent().remove();return;
		var id = $(this).attr('id');
		var obj = $(this);
		layer.confirm('确认删除此条记录吗?', {
			icon: 3,
			title: '提示'
		}, function(index) {
			$.getJSON("<?php echo url('home/merchant/deldmf'); ?>", {
				'id': id
			}, function(res) {
				if (res.code == 1) {
					layer.msg(res.msg, {
						icon: 1,
						time: 1500,
						shade: 0.1
					});
					obj.parent().parent().remove();
					//window.location.reload();
				} else {
					layer.msg(res.msg, {
						icon: 0,
						time: 1500,
						shade: 0.1
					});
				}
			});
			layer.close(index);
		})
	})

</script>
<script data-exec-on-popstate="">
	$(function() {

		$("input.avatar, input.avatar2").fileinput({
			"overwriteInitial": true,
			"initialPreviewAsData": true,
			"browseLabel": "\u6d4f\u89c8",
			"showRemove": false,
			"showUpload": false,
			"deleteExtraData": {
				"avatar": "_file_del_",
				"_file_del_": "",
				"_token": "NMTpuxZn8hIn4gtRifTX85NwwTcNuM8UsF6ClPne",
				"_method": "PUT"
			},
			"deleteUrl": "http:\/\/we.btc360.io\/admin\/386",
			"allowedFileTypes": ["image"]
		});

	});
	$('.avatar, .avatar2').change(function() {
		var url = getObjectURL(this.files[0]); //获取本地的文件地址
		if (url) {
			$(this).parent().find('img').attr('src', url); //修改图片路径
			//$('.kv-preview-data').attr('src',url);
		} else {
			$(this).parent().find('img').attr('src', defaultimage);
			//$('.kv-preview-data').attr('src',url);
		}
	});

	//本地URL地址解析
	function getObjectURL(file) {
		//不存在选择路径补null
		file = file ? file : null;
		if (file == null) {
			return null;
		}
		var url = null;
		if (window.createObjectURL != undefined) { // basic
			url = window.createObjectURL(file);
		} else if (window.URL != undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file);
		} else if (window.webkitURL != undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file);
		}
		return url;
	}

	function show(url) {
		layer.open({
			type: 1,
			title: false,
			closeBtn: 0,
			area: ['300px', '300px'],
			skin: 'layui-layer-nobg', //没有背景色
			shadeClose: true,
			content: '<img style="width:300px;height:300px;" src="/uploads/face/' + url + '">'
		});
	}
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
