<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:80:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/merchant/withdraw.html";i:1563934900;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/header_new.html";i:1572787926;s:73:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_merchant.html";i:315504000;s:71:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_trader.html";i:1979183310;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/menu_agent.html";i:315504000;s:70:"/www/wwwroot/abc.yptsc.cn/application/home/view/Public/footer_new.html";i:1563934900;}*/ ?>
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
    <div class="content-wrapper" id="pjax-container" style="min-height: 706px;">
            <section class="content-header"><h1>
            提币记录
            <small>列表</small>
        </h1>

        <!-- breadcrumb start -->
                <!-- breadcrumb end -->

    </section><section class="content"><div class="row"><div class="col-md-12">
<div class="box">
    <div class="box-header">

        <h3 class="box-title"></h3>

        <div class="pull-right">
            <div class="btn-group pull-right" style="margin-right: 10px">
    <a data-href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#filter-modal"><i class="fa fa-filter"></i>&nbsp;&nbsp;筛选</a>
    <a href="/merchant/withdraw" class="btn btn-sm btn-facebook"><i class="fa fa-undo"></i>&nbsp;&nbsp;重置</a>
</div>

<div class="modal fade" id="filter-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">筛选</h4>
            </div>
            <form action="/merchant/withdraw" method="get" pjax-container="">
                <div class="modal-body">
                    <div class="form">
                    <div class="form-group">
                                <div class="form-group">
    <label>订单号</label>
    <div class="input-group">
    <div class="input-group-addon">
        <i class="fa fa-pencil"></i>
    </div>
    <input type="text" class="form-control username" placeholder="订单号" name="ordersn" value="">
</div>
</div>
                            </div>
                                                    <div class="form-group">
                                <div class="form-group">
    <label>用户名</label>
    <div class="input-group">
    <div class="input-group-addon">
        <i class="fa fa-pencil"></i>
    </div>
    <input type="text" class="form-control username" placeholder="用户名" name="username" value="">
</div>
</div>
                            </div>
                                                    <div class="form-group">
                                <div class="form-group">
    <label>状态</label>
    <select class="form-control status select2-hidden-accessible" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true"><option></option>
<option value="1">待审核</option>
<option value="2">已通过</option>
<option value="3">已拒绝</option>
</select>
</div>
                            </div>
                                                    <div class="form-group">
                                <div class="form-group">
    <label>起止时间</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" id="created_at_start" placeholder="起止时间" name="created_at[start]" value=""><span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
        <input type="text" class="form-control" id="created_at_end" placeholder="起止时间" name="created_at[end]" value="">
</div>
</div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
    <label>审核时间</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" id="end_at_start" placeholder="审核时间" name="end_at[start]" value=""><span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
        <input type="text" class="form-control" id="end_at_end" placeholder="审核时间" name="end_at[end]" value="">
</div>
</div>
                            </div>
                                                    <div class="form-group">
                                <div class="form-group">
    <label>客户提现USDT</label>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="客户提现USDT" name="buy_amount[start]" value=""><span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
        <input type="text" class="form-control" placeholder="客户提现USDT" name="buy_amount[end]" value="">
</div>
</div>
                            </div>
                                            </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit">提交</button>
                    <button type="reset" class="btn btn-warning pull-left">重置</button>
                </div>
            </form>
        </div>
    </div>
</div>
            
<div class="btn-group pull-right" style="margin-right: 10px">
    <a class="btn btn-sm btn-twitter" href='<?php echo url("home/merchant/outUserWithdraw"); ?>' target="_blank"><i class="fa fa-download"></i> 导出</a>
</div>
&nbsp;&nbsp;

            
        </div>

        <span>
            <a class="btn btn-sm btn-primary grid-refresh"><i class="fa fa-refresh"></i> 刷新</a>
        </span>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover"><tbody><tr>
<th>ID<a class="fa fa-fw fa-sort" href="/merchant/withdraw?order=asc"></a>
</th>
								<th>订单号</th>
                                <th>用户名</th>
                                <th>客户提币USDT</th>
                                <th>转出地址</th>
                                <th>手续费支出</th>
                                <th>实到</th>
                                <th>状态</th>
                                <th>创建日期</th>
                                <th>审核时间</th>
								<th>操作</th>
                            </tr>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                            	<td><?php echo $vo['id']; ?></td>
                            	<td><?php echo $vo['ordersn']; ?></td>
                            	<td><?php echo $vo['username']; ?></td>
                            	<td><?php echo $vo['num']; ?></td>
                            	<td><?php echo $vo['address']; ?></td>
                            	<td><?php echo $vo['fee']; ?></td>
                            	<td><?php echo $vo['mum']; ?></td>
                            	<td>
                            		<?php if($vo['status'] == 0): ?>
                            		待审核
                            		<?php elseif($vo['status'] == 1): ?>
                            		已通过
                            		<?php elseif($vo['status'] == 2): ?>
                            		已拒绝
                            		<?php endif; ?>
                            	</td>
                            	<td><?php echo date("Y-m-d H:i:s", $vo['addtime']); ?></td>
                            	<td>
                            	<?php if(empty($vo['endtime']) || (($vo['endtime'] instanceof \think\Collection || $vo['endtime'] instanceof \think\Paginator ) && $vo['endtime']->isEmpty())): ?>
                            	---
                            	<?php else: ?>
                            	<?php echo date("Y-m-d H:i:s", $vo['endtime']); endif; ?>
                            	</td>
								<td>
									<a href="https://www.omniexplorer.info/search/<?php echo $vo['txid']; ?>" target="_blank" class="btn btn-sm btn-success">
        查看Tid
    </a>
								</td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody></table>
</div>
    <div class="box-footer clearfix">
		<?php echo $list->render(); ?>
    </div>
    <!-- /.box-body -->
</div>
</div></div>

    </section><script data-exec-on-popstate="">

    $(function () {
                                $('#created_at_start').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh_CN"});
            $('#created_at_end').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh_CN","useCurrent":false});
            $("#created_at_start").on("dp.change", function (e) {
                $('#created_at_end').data("DateTimePicker").minDate(e.date);
            });
            $("#created_at_end").on("dp.change", function (e) {
                $('#created_at_start').data("DateTimePicker").maxDate(e.date);
            });
                                $('#end_at_start').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh_CN"});
            $('#end_at_end').datetimepicker({"format":"YYYY-MM-DD HH:mm:ss","locale":"zh_CN","useCurrent":false});
            $("#end_at_start").on("dp.change", function (e) {
                $('#end_at_end').data("DateTimePicker").minDate(e.date);
            });
            $("#end_at_end").on("dp.change", function (e) {
                $('#end_at_start').data("DateTimePicker").maxDate(e.date);
            });
                    
$("#filter-modal .submit").click(function () {
    $("#filter-modal").modal('toggle');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
});

                    $(".status").select2({
  placeholder: "选择"
});

                    
$('.export-selected').click(function (e) {
    e.preventDefault();
    
    var rows = selectedRows().join(',');
    if (!rows) {
        return false;
    }
    
    var href = $(this).attr('href').replace('__rows__', rows);
    location.href = href;
});

                    
$('.grid-refresh').on('click', function() {
    //$.pjax.reload('#pjax-container');
    //toastr.success('刷新成功 !');
    window.location.reload();
});

                    
$('.grid-per-pager').on("change", function(e) {
    //$.pjax(<?php echo url("","",true,false);?>);
});

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