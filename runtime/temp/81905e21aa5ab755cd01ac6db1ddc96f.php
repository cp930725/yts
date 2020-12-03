<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/index/index.html";i:1606616124;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/elementUI-1.4.12/css/index.min.css" rel="stylesheet">
    <script src="/static/admin/elementUI-1.4.12/js/vue.min.js"></script>
    <script src="/static/admin/elementUI-1.4.12/js/index.min.js"></script>
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    /*elementUI分页样式*/
    .layout-pagination {
        text-align: right;
        margin-top: 15px;
    }
    .control-label{
        margin-top: 7px;
        text-align: right;
    }
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">

    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right" data-show="<?php echo $rechargeToday; ?>">日</span>
                    <span class="label pull-right" data-show="<?php echo $rechargeWeek; ?>">周</span>
                    <span class="label label-success pull-right" data-show="<?php echo $rechargeMonth; ?>">月</span>
                    <h5>充值数量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $rechargeMonth; ?></h1>
                    <small>总充值数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right" data-show="<?php echo $tiToday; ?>">日</span>
                    <span class="label pull-right" data-show="<?php echo $tiWeek; ?>">周</span>
                    <span class="label label-success pull-right" data-show="<?php echo $tiMonth; ?>">月</span>
                    <h5>提币数量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $tiMonth; ?></h1>
                    <small>总提币数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right" data-show="<?php echo $feeToday; ?>">日</span>
                    <span class="label pull-right" data-show="<?php echo $feeWeek; ?>">周</span>
                    <span class="label label-success pull-right" data-show="<?php echo $feeMonth; ?>">月</span>
                    <h5>手续费数量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $feeMonth; ?></h1>
                    <small>总手续费数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right" data-show="<?php echo $addressToday; ?>">日</span>
                    <span class="label pull-right" data-show="<?php echo $addressWeek; ?>">周</span>
                    <span class="label label-success pull-right" data-show="<?php echo $addressMonth; ?>">月</span>
                    <h5>地址分配数量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $addressMonth; ?></h1>
                    <small>分配地址数量</small>
                </div>
            </div>
        </div>
        <?php if(config('wallettype') == 'omni'): ?>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>USDT余额</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="usdtbalance"><?php echo $usdt; ?></h1>
                    <small onclick="getUsdt();" style="cursor:pointer;color:#1ab394">点击获取</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>BTC余额</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="btcbalance"><?php echo $btc; ?></h1>
                    <small onclick="getBtc();" style="cursor:pointer;color:#1ab394">点击获取</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>OMNI_USDT可用地址</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="alladdress1"><?php echo $alladdress1; ?></h1>
                    <small onclick="addaddress1();" style="cursor:pointer;color:#1ab394">点击生成10个新地址</small>
                </div>
            </div>
        </div>
    <?php else: ?>
     <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ERC20_USDT可用地址</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="alladdress2"><?php echo $alladdress2; ?></h1>
                    <small onclick="addaddress2();" style="cursor:pointer;color:#1ab394">点击生成10个新地址</small>
                </div>
            </div>
        </div>
<?php endif; ?>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>USDT数量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $usdtToday; ?></h1>
                    <small>总USDT数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>清空数据</h5>
                </div>
                <div class="ibox-content">
                    <small onclick="destory()" style="cursor:pointer;color:#1ab394">清空</small>
                </div>
            </div>
        </div>
       <!--  <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>USDT余额</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="usdtbalance"><?php echo $usdt; ?></h1>
                    <small onclick="getUsdt();" style="cursor:pointer;color:#1ab394">点击获取</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>BTC余额</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="btcbalance"><?php echo $btc; ?></h1>
                    <small onclick="getBtc();" style="cursor:pointer;color:#1ab394">点击获取</small>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>OMNI_USDT可用地址</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="alladdress1"><?php echo $alladdress1; ?></h1>
                    <small onclick="addaddress1();" style="cursor:pointer;color:#1ab394">点击生成10个新地址</small>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ERC20_USDT可用地址</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="alladdress2"><?php echo $alladdress2; ?></h1>
                    <small onclick="addaddress2();" style="cursor:pointer;color:#1ab394">点击生成10个新地址</small>
                </div>
            </div>
        </div> -->
    </div>

    <!-- 中间折线 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 系统信息
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-sitemap"></i> 框架版本：ThinkPHP<?php echo $info['think_v']; ?>
                        </p>
                        <p><i class="fa fa-windows"></i> 服务环境：<?php echo $info['web_server']; ?>
                        </p>
                        <p><i class="fa fa-warning"></i> 上传附件限制：<?php echo $info['onload']; ?>
                        </p>
                        <p><i class="fa fa-credit-card"></i> PHP 版本：<?php echo $info['phpversion']; ?>
                        </p>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
<div style="color: red !important; text-align: center;"><!--<strong>&#31449;&#30721;&#20043;&#23478;&#28304;&#30721;&#32;&#119;&#119;&#119;&#46;&#122;&#104;&#97;&#110;&#109;&#97;&#122;&#106;&#46;&#99;&#111;&#109;</strong>--></div>
</div>

<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/static/admin/js/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="/static/admin/js/jquery.form.js"></script>
<script src="/static/admin/js/moment.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<script src="/static/admin/js/laypage/laypage.js"></script>
<script src="/static/admin/js/laytpl/laytpl.js"></script>
<script src="/static/admin/js/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script src="/static/admin/js/ethers-v4.min.js"></script>
<script>
		$('.ibox-title span').click(function(){
			var num = $(this).attr('data-show');
			$(this).siblings('span').removeClass('label-success');
			$(this).addClass('label-success');
			$(this).parent().siblings('.ibox-content').children('h1').html(num);
		})
        function addaddress1(){
            var load;
            $.ajax({
                url:'/admin/index/addaddress',
                type:'post',
                data:{},
                beforeSend:function(){
                    load = layer.load();
                },
                success:function(data){
                    layer.close(load);
                    console.log(data);
                    if(data.code==1){
                        layer.msg(data.msg, {
                              icon: 1,
                              time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                              window.location.reload()
                            });
                    }else{
                         layer.msg(data.msg, {
                              icon: 2,
                              time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            });
                    }
                    // $('#usdtbalance').html(data.msg);
                    // window.location.reload()
                }
            })
        }

        function destory() {
            var load;
            $.ajax({
                url:'/admin/index/destory',
                type:'post',
                data:{},
                beforeSend:function(){
                    load = layer.load();
                },
                success:function(data){
                    layer.close(load);
                    console.log(data);
                    if(data.code==1){
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            window.location.reload()
                        });
                    }else{
                        layer.msg(data.msg, {
                            icon: 2,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        });
                    }
                    // $('#usdtbalance').html(data.msg);
                    // window.location.reload()
                }
            })
        }

        function addaddress2(){
           var load = layer.load();
            // load = layer.load();
            var provider = ethers.getDefaultProvider();//线上默认网络
            for (var i = 0; i < 10; i++) {
                const wallet = new ethers.Wallet.createRandom();
                // wallet.provider = provider;
                const addr=wallet.address;
                const prive=wallet.privateKey;
                // console.log('钱包地址:' + wallet.address);
                // console.log('导出私钥:'+ wallet.privateKey);
                $.ajax({
                url:'/admin/index/addaddresseth',
                type:'post',
                // data:{addr:addr,prive:prive},

             })
            }

            // console.log(provider);
             layer.close(load);
                 layer.msg('生成成功!', {
                              icon: 1,
                              time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function(){
                              window.location.reload()
                            });
        }
		function getUsdt(){
			var load;
			$.ajax({
				url:'/admin/index/getUsdt',
				type:'post',
				data:{},
				beforeSend:function(){
					load = layer.load();
				},
				success:function(data){
					layer.close(load);
					$('#usdtbalance').html(data.msg);
				}
			})
		}
		function getBtc(){
			var load;
			$.ajax({
				url:'/admin/index/getBtc',
				type:'post',
				data:{},
				beforeSend:function(){
					load = layer.load();
				},
				success:function(data){
					layer.close(load);
					$('#btcbalance').html(data.msg);
				}
			})
		}

        $(function(){
             contractaddr='<?php  echo config('usdtaddr'); ?>';
             abi='<?php  echo config('usdtabi'); ?>';
            localStorage.setItem('tokenaddress',contractaddr);//获取合约地址
            localStorage.setItem('tokenabi',abi);//获取合约地址
            });
	</script>
</body>
</html>