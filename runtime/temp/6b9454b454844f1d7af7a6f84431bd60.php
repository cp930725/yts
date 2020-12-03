<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/merchant/edit_merchant.html";i:1240543140;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/style.css">
<style>
.file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
.file-item .info{overflow: hidden;}
.uploader-list{width: 100%; overflow: hidden;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑商户</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" name="edit_member" id="edit_member" method="post" action="<?php echo url('edit_merchant'); ?>">
                        <input type="hidden" name="id" value="<?php echo $merchant['id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">姓名：</label>
                            <div class="input-group col-sm-4">
                                <input id="account" type="text" class="form-control" name="name" value="<?php echo $merchant['name']; ?>" placeholder="请输入姓名">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">手机号：</label>
                            <div class="input-group col-sm-4">
                                <input id="nickname" type="text" class="form-control" name="mobile" value="<?php echo $merchant['mobile']; ?>" placeholder="请输入手机号">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">密码：</label>
                            <div class="input-group col-sm-4">
                                <input id="password" type="password" class="form-control" name="password" placeholder="请输入密码">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">邀请人：</label>
                            <div class="input-group col-sm-4">
                                <input id="nickname" type="text" class="form-control" name="pid" value="<?php echo $merchant['pid']; ?>" placeholder="请输入邀请人id">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">身份证号：</label>
                            <div class="input-group col-sm-4">
                                <input id="nickname" type="text" class="form-control" name="idcard" value="<?php echo $merchant['idcard']; ?>" placeholder="请输入身份证号">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">正面：</label>
                            <div class="input-group col-sm-4">
                                <input type="hidden" id="idcard_zheng" name="idcard_zheng" value="<?php echo $merchant['idcard_zheng']; ?>">
                                <div id="fileList" class="uploader-list" style="float:right"></div>
                                <div id="imgPicker" style="float:left">选择头像</div>
                                <img id="img_data" class="img-circle" height="80px" width="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/uploads/idcard/<?php echo $merchant['idcard_zheng']; ?>" onerror="this.src='/static/admin/images/head_default.gif'"/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">反面：</label>
                            <div class="input-group col-sm-4">
                                <input type="hidden" id="idcard_fan" name="idcard_fan" value="<?php echo $merchant['idcard_fan']; ?>">
                                <div id="fileList2" class="uploader-list" style="float:right"></div>
                                <div id="imgPicker2" style="float:left">选择头像</div>
                                <img id="img_data2" class="img-circle" height="80px" width="80px" style="float:left;margin-left: 50px;margin-top: -10px;" src="/uploads/idcard/<?php echo $merchant['idcard_fan']; ?>" onerror="this.src='/static/admin/images/head_default.gif'"/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">appid：</label>
                            <div class="input-group col-sm-4">
                                <input id="appid" type="text" class="form-control" name="appid" value="<?php echo $merchant['appid']; ?>" placeholder="请输入appid">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">key：</label>
                            <div class="input-group col-sm-4">
                                <input id="key" type="text" class="form-control" name="key" value="<?php echo $merchant['key']; ?>" placeholder="请输入密钥">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态：</label>
                            <div class="input-group col-sm-4">
                                <div class="radio i-checks">
                                    <input type="radio" name='status' value="1" <?php if($merchant['status'] == 1): ?>checked<?php endif; ?>/>开启&nbsp;&nbsp;
                                    <input type="radio" name='status' value="0" <?php if($merchant['status'] == 0): ?>checked<?php endif; ?>/>禁用&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">可用USDT：</label>
                            <div class="input-group col-sm-4">
                                <input id="usdt" type="text" class="form-control" name="usdt" value="<?php echo $merchant['usdt']; ?>" placeholder="请输入可用usdt">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">冻结USDT：</label>
                            <div class="input-group col-sm-4">
                                <input id="usdtd" type="text" class="form-control" name="usdtd" value="<?php echo $merchant['usdtd']; ?>" placeholder="请输入冻结usdt">
                            </div>
                        </div>
						 <!-- <div class="hr-line-dashed"></div>
						   <div class="form-group">
                            <label class="col-sm-3 control-label">USDT地址：</label>
                            <div class="input-group col-sm-4">
                                <input id="usdtb" type="text" class="form-control" name="usdtb" value="<?php echo $merchant['usdtb']; ?>" placeholder="USDT地址：">
                            </div>
                        </div> -->
						<div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">提币手续费：</label>
                            <div class="input-group col-sm-4">
                                <input id="merchant_tibi_fee" type="text" class="form-control" name="merchant_tibi_fee" value="<?php echo $merchant['merchant_tibi_fee']; ?>" placeholder="请输入提币手续费">个
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">盘口提币手续费：</label>
                            <div class="input-group col-sm-4">
                                <input id="user_withdraw_fee" type="text" class="form-control" name="user_withdraw_fee" value="<?php echo $merchant['user_withdraw_fee']; ?>" placeholder="请输入盘口提币手续费">%
                            </div>
                        </div>
						<div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户充值手续费：</label>
                            <div class="input-group col-sm-4">
                                <input id="user_recharge_fee" type="text" class="form-control" name="user_recharge_fee" value="<?php echo $merchant['user_recharge_fee']; ?>" placeholder="请输入用户充值手续费">%
                            </div>
                        </div>
						<div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">商户盘口费率：</label>
                            <div class="input-group col-sm-4">
                                <input id="merchant_pk_fee" type="text" class="form-control" name="merchant_pk_fee" value="<?php echo $merchant['merchant_pk_fee']; ?>" placeholder="请输入商户盘口费率">%
                            </div>
                        </div>

                        <?php if($merchant['trader_check'] == '1'): ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">交易员充值手续费：</label>
                            <div class="input-group col-sm-4">
                                <input id="trader_recharge_fee" type="text" class="form-control" name="trader_recharge_fee" value="<?php echo $merchant['trader_recharge_fee']; ?>" placeholder="请输入交易员充值手续费">%
                            </div>
                        </div>
						<div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">交易员利润：</label>
                            <div class="input-group col-sm-4">
                                <input id="trader_trader_get" type="text" class="form-control" name="trader_trader_get" value="<?php echo $merchant['trader_trader_get']; ?>" placeholder="请输入交易员利润">%
                            </div>
                        </div>
                        <?php endif; if($merchant['agent_check'] == '1'): ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">下级交易员出售订单利润：</label>
                            <div class="input-group col-sm-4">
                                <input id="trader_parent_get" type="text" class="form-control" name="trader_parent_get" value="<?php echo $merchant['trader_parent_get']; ?>" placeholder="下级交易员出售订单利润">%
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">下级商户购买订单利润：</label>
                            <div class="input-group col-sm-4">
                                <input id="trader_merchant_parent_get" type="text" class="form-control" name="trader_merchant_parent_get" value="<?php echo $merchant['trader_merchant_parent_get']; ?>" placeholder="下级商户购买订单利润">%
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">谷歌验证：</label>
                            <div class="input-group col-sm-4">
                                <input id="ga" type="text" class="form-control" name="ga" value="<?php echo $merchant['ga']; ?>" placeholder="请输入谷歌验证码">
                            </div>
                        </div>
						<div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">匹配交易员：</label>
                            <div class="input-group col-sm-9">
                                <div class="radio i-checks">
                                	<?php if(is_array($traders) || $traders instanceof \think\Collection || $traders instanceof \think\Paginator): $i = 0; $__LIST__ = $traders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <input type="checkbox" name='pptrader[]' <?php if($vo['ispp'] == '1'): ?>checked<?php endif; ?> value="<?php echo $vo['id']; ?>"/><?php echo $vo['name']; ?>&nbsp;&nbsp;
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
<script type="text/javascript" src="/static/admin/webupload/webuploader.min.js"></script>

<script type="text/javascript">
    var $list = $('#fileList');
    //上传图片,初始化WebUploader
    var uploader = WebUploader.create({

        auto: true,// 选完文件后，是否自动上传。
        swf: '/static/admin/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('Upload/uploadidcard'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#idcard_zheng").val(data._raw);
            $("#img_data").attr('src', '/uploads/idcard/' + data._raw).show();
        }
    });
    var $list = $('#fileList2');
    //上传图片,初始化WebUploader
    var uploader = WebUploader.create({

        auto: true,// 选完文件后，是否自动上传。
        swf: '/static/admin/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('Upload/uploadidcard'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker2',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#idcard_fan").val(data._raw);
            $("#img_data2").attr('src', '/uploads/idcard/' + data._raw).show();
        }
    });

    uploader.on( 'fileQueued', function( file ) {
        $list.html( '<div id="' + file.id + '" class="item">' +
            '<h4 class="info">' + file.name + '</h4>' +
            '<p class="state">正在上传...</p>' +
        '</div>' );
    });

    // 文件上传成功
    uploader.on( 'uploadSuccess', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传成功！');
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错!');
    });

    //提交
    $(function(){
        $('#edit_member').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });

        function checkForm(){

        }

        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('merchant/index?reg_type='.$reg_type); ?>";
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:1500,shade: 0.1});
                return false;
            }
        }
    });

</script>
</body>
</html>