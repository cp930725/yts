<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/config/index.html";i:1567308316;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
<style type="text/css">
/* TAB */
.nav-tabs.nav>li>a {
    padding: 10px 25px;
    margin-right: 0;
}
.nav-tabs.nav>li>a:hover,
.nav-tabs.nav>li.active>a {
    border-top: 3px solid #1ab394;
    padding-top: 8px;
    border-bottom: 1px solid #FFFFFF;
}
.nav-tabs>li>a {
    color: #A7B1C2;
    font-weight: 500;
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 0;
}
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
                    <h5>网站配置</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="panel blank-panel">
                        <div class="panel-heading">
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本配置</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">内容配置</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5" aria-expanded="false">交易员配置</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">系统配置</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">短信配置</a></li>
                                   <?php 
                                    if(config('wallettype')=='omni'){
                                         echo ' <li class=""><a data-toggle="tab" href="#tab-6" aria-expanded="false">OMNI钱包配置</a></li>';
                                    }
                                     if(config('wallettype')=='erc'){
                                         echo ' <li class=""><a data-toggle="tab" href="#tab-7" aria-expanded="false">ERC20钱包配置</a></li>';
                                    }
                                     ?>


                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站标题：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[web_site_title]" value="<?php echo $config['web_site_title']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 网站标题</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站描述：</label>
                                            <div class="input-group col-sm-4">
                                                <textarea class="form-control" type="text" rows="3" name="config[web_site_description]"><?php echo $config['web_site_description']; ?></textarea>
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 网站搜索引擎描述</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站关键字：</label>
                                            <div class="input-group col-sm-4">
                                                <textarea class="form-control" type="text" rows="3" name="config[web_site_keyword]"><?php echo $config['web_site_keyword']; ?></textarea>
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 网站搜索引擎关键字</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站备案号：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[web_site_icp]" value="<?php echo $config['web_site_icp']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 设置在网站底部显示的备案号，如“ 陇ICP备15002349号-1</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">统计代码：</label>
                                            <div class="input-group col-sm-4">
                                                <textarea class="form-control" type="text" rows="3" name="config[web_site_cnzz]"><?php echo $config['web_site_cnzz']; ?></textarea>
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 设置在网站底部显示的站长统计信息</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">版权信息：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[web_site_copy]" value="<?php echo $config['web_site_copy']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 设置在网站底部显示的版权信息</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">站点状态：</label>
                                            <div class="input-group col-sm-4">
                                                <div class="radio i-checks">
                                                    <input type="radio" name='config[web_site_close]' value="1" <?php if($config['web_site_close'] == 1): ?>checked<?php endif; ?>/>开启&nbsp;&nbsp;
                                                    <input type="radio" name='config[web_site_close]' value="0" <?php if($config['web_site_close'] == 0): ?>checked<?php endif; ?>/>关闭
                                                </div>
                                            <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 站点关闭后除管理员外所有人访问不了后台</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
				                            <label class="col-sm-3 control-label">Logo：</label>
				                            <div class="input-group col-sm-4">
				                                <input type="hidden" id="data_photo" name="config[logo]" value="<?php echo $config['logo']; ?>">
				                                <div id="fileList" class="uploader-list" style="float:right"></div>
				                                <div id="imgPicker" style="float:left">选择图片</div>
				                                <img id="img_data" height="100px" style="float:left;margin-left: 50px;margin-top: -10px;" onerror="this.src='/static/admin/images/no_img.jpg'" src="/uploads/images/<?php echo $config['logo']; ?>"/>
				                            </div>
				                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">后台每页记录数：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[list_rows]" value="<?php echo $config['list_rows']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 后台数据每页显示记录数</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                       <div class="form-group">
                                            <label class="col-sm-2 control-label">提币手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[merchant_tibi_fee]" value="<?php echo $config['merchant_tibi_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>USDT提币,平台扣除手续费个数</span>
                                            </div>
                                        </div>
                                         <!-- <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户提币手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[user_tibi_fee]" value="<?php echo $config['user_tibi_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>用户提现USDT平台收取手续费百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户充值手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[user_recharge_fee]" value="<?php echo $config['user_recharge_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>用户充值USDT平台收取手续费百分比</span>
                                            </div>
                                        </div> -->
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">商户提币最小：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[merchant_tibi_min]" value="<?php echo $config['merchant_tibi_min']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>商户提币最小限制</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">商户提币最大：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[merchant_tibi_max]" value="<?php echo $config['merchant_tibi_max']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>商户提币最大限制</span>
                                            </div>
                                        </div>
										<div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">到账确认数：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_confirms]" value="<?php echo $config['usdt_confirms']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>区块确认数,一般为6</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">代理商抽取商户提币费率：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[agent_tibi_fee]" value="<?php echo $config['agent_tibi_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>每次商户USDT提币时给代理商的佣金百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">代理商抽取商户用户提币费率：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[agent_withdraw_fee]" value="<?php echo $config['agent_withdraw_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>每次用户USDT提币时给代理商的佣金百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">代理商抽取商户用户充值费率：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[agent_recharge_fee]" value="<?php echo $config['agent_recharge_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>每次用户USDT充值时给代理商的佣金百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">场外交易商户费率：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[trader_merchant_fee]" value="<?php echo $config['trader_merchant_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
										<div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">注册邀请人：</label>
                                            <div class="input-group col-sm-4">
                                                <div class="radio i-checks">
                                                    <input type="radio" name='config[reg_invite_on]' value="1" <?php if($config['reg_invite_on'] == 1): ?>checked<?php endif; ?>/>必填&nbsp;&nbsp;
                                                    <input type="radio" name='config[reg_invite_on]' value="0" <?php if($config['reg_invite_on'] == 0): ?>checked<?php endif; ?>/>非必填
                                                </div>
                                            <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT转账手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_fee]" value="<?php echo $config['usdt_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>仅用于OMNI协议</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">盘口未完成订单数量限制：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[pk_waiting_finished_num]" value="<?php echo $config['pk_waiting_finished_num']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                         <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">钱包类型:</label>
                                            <div class="input-group col-sm-4">
                                               <select class="form-control" name="config[wallettype]">
                                                   <option value="omni" <?php if($config['wallettype'] == 'omni'): ?>selected=""<?php endif; ?>>BTC链OMNI协议</option>
                                                   <option value="erc" <?php if($config['wallettype'] == 'erc'): ?>selected=""<?php endif; ?>>ETH链ERC20协议</option>
                                                  <!--  <option value="all" <?php if($config['wallettype'] == 'all'): ?>selected=""<?php endif; ?>>两者兼容</option> -->
                                               </select>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">禁止后台访问IP：</label>
                                            <div class="input-group col-sm-4">
                                                <textarea class="form-control" type="text" rows="3" name="config[admin_allow_ip]"><?php echo $config['admin_allow_ip']; ?></textarea>
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 多个用#号分隔，如果不配置表示不限制IP访问</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-4" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信接口URL：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[moble_url]" value="<?php echo $config['moble_url']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信接口用户名：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[moble_user]" value="<?php echo $config['moble_user']; ?>">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信接口安全秘钥：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="password" class="form-control" name="config[moble_pwd]" value="<?php echo $config['moble_pwd']; ?>">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信内容：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[send_message_content]" value="<?php echo $config['send_message_content']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle">{usdt}代表usdt数量</i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-5" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布出售USDT价格方式：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_way]" value="<?php echo $config['usdt_price_way']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 0:后台区间，1:自动采集,2:采集价+加价金额</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">出售加价金额：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_add]" value="<?php echo $config['usdt_price_add']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 价格方式选择2时起效</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布出售USDT最小价：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_min]" value="<?php echo $config['usdt_price_min']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 上边配置为0时生效</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布出售USDT最大价：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_max]" value="<?php echo $config['usdt_price_max']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 上边配置为0时生效</span>
                                            </div>
                                        </div>
										 <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布购买USDT价格方式：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_way_buy]" value="<?php echo $config['usdt_price_way_buy']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 0:后台区间，1:自动采集,2:采集价+加价金额</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">购买加价金额：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_add_buy]" value="<?php echo $config['usdt_price_add_buy']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 价格方式选择2时起效</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布购买USDT最小价：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_min_buy]" value="<?php echo $config['usdt_price_min_buy']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 上边配置为0时生效</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布购买USDT最大价：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_price_max_buy]" value="<?php echo $config['usdt_price_max_buy']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 上边配置为0时生效</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">交易员求购商户手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_buy_merchant_fee]" value="<?php echo $config['usdt_buy_merchant_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">交易员求购交易员手续费：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_buy_trader_fee]" value="<?php echo $config['usdt_buy_trader_fee']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>百分比</span>
                                            </div>
                                        </div>
										<div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">平台利润：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[trader_platform_get]" value="<?php echo $config['trader_platform_get']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>百分比</span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">广告下架剩余数量：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[ad_down_remain_amount]" value="<?php echo $config['ad_down_remain_amount']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle">小于等于这个值会被下架</i></span>
                                            </div>
                                        </div>
										<div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">交易员匹配未完成订单数量限制：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[trader_pp_max_unfinished_order]" value="<?php echo $config['trader_pp_max_unfinished_order']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle">大于等于这个值不会被匹配</i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

								<div id="tab-6" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包账号：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[rpc_user]" value="<?php echo $config['rpc_user']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包密码：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[rpc_pwd]" value="<?php echo $config['rpc_pwd']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> </span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包IP地址：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[rpc_url]" value="<?php echo $config['rpc_url']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包端口：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[rpc_port]" value="<?php echo $config['rpc_port']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包总地址：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[base_address]" value="<?php echo $config['base_address']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT钱包解锁密码：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdt_pwd]" value="<?php echo $config['usdt_pwd']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="tab-7" class="tab-pane">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal">
                                       <!--  <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">ETH钱包地址：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[ethip]" value="<?php echo $config['ethip']; ?>">
                                            </div>
                                        </div> -->
                                        <!-- <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">USDT合约地址</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[usdtaddr]" value="<?php echo $config['usdtaddr']; ?>">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">手续费地址</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[feeaddr]" value="<?php echo $config['feeaddr']; ?>">
                                                 <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>此地址需导入钱包服务器</span>
                                            </div>
                                        </div> -->
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">手续费地址私钥</label>
                                            <div class="input-group col-sm-4">
                                                <input type="password" class="form-control" name="config[feeaddrprive]" value="<?php echo $config['feeaddrprive']; ?>">
                                                 <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>用于发送手续费地址的私钥,账户请勿保留太多ETH</span>
                                            </div>
                                        </div>
                                        <!-- <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">手续费地址密码</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[feepass]" value="<?php echo $config['feepass']; ?>">

                                            </div>
                                        </div> -->
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">汇总地址</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[hzaddr]" value="<?php echo $config['hzaddr']; ?>">
                                            </div>
                                        </div>
                                     <!--    <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">最低汇总额度</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="config[mincover]" value="<?php echo $config['mincover']; ?>">
                                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>低于此额度的账户不进行USDT汇总</span>
                                            </div>
                                        </div> -->
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        swf: '/static/admin/js/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('Upload/upload'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#data_photo").val(data._raw);
            $("#img_data").attr('src', '/uploads/images/' + data._raw).show();
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


</script>
<script type="text/javascript">

    var config = {
        '.chosen-select': {},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>
</body>
</html>
