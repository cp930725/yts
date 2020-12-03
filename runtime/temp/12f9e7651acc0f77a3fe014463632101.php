<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/merchant/index.html";i:1569060366;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
    <div class="wrapper wrapper-content animated fadeInRight">
        <!-- Panel Other -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>商户列表</h5>
            </div>
            <div class="ibox-content">
                <!--搜索框开始-->
                <div class="row">
                    <div class="col-sm-12">
                        <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="会员账号/昵称/手机号" />
                                    <input type="hidden" name="reg_type" id="reg_type" value="<?php echo $reg_type; ?>" />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--搜索框结束-->
                <div class="hr-line-dashed"></div>
                <div class="example-wrap">
                    <div class="example">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="long-tr">
                                    <th width="4%">ID</th>
                                    <th width="9%">姓名</th>
                                    <th width="9%">手机号</th>
                                    <th width="5%">邀请人</th>
                                    <th width="6%">身份证</th>
                                    <th width="5%">正面</th>
                                    <th width="5%">反面</th>
                                    <th width="5%">可用USDT</th>
                                    <th width="5%">冻结USDT</th>
                                    <th width="5%">谷歌验证</th>
                                    <th width="5%">注册审核</th>
                                    <th width="5%">代理商</th>
                                    <th width="5%">交易员</th>
                                    <th width="6%">状态</th>
                                    <th width="10%">注册时间</th>
                                    <th width="10%">操作</th>
                                </tr>
                            </thead>
                            <script id="list-template" type="text/html">
                                {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].id}}</td>
                                <td>{{d[i].name}}</td>
                                <td>{{d[i].mobile}}</td>
                                <td>{{d[i].parent}}</td>
                                <td>{{d[i].idcard}}</td>
<td>
                                    <a href="/uploads/idcard/{{d[i].idcard_zheng}}" target="_blank" title="点击查看原图"><img src="/uploads/idcard/{{d[i].idcard_zheng}}" class="img-circle" style="width:35px;height:35px" onerror="this.src='/static/admin/images/head_default.gif'"/></a>
                                </td>
<td>
                                    <a href="/uploads/idcard/{{d[i].idcard_fan}}" target="_blank" title="点击查看原图"><img src="/uploads/idcard/{{d[i].idcard_fan}}" class="img-circle" style="width:35px;height:35px" onerror="this.src='/static/admin/images/head_default.gif'"/></a>
                                </td>
<td>{{d[i].usdt}}</td>
<td>{{d[i].usdtd}}</td>
<td>
{{# if(!d[i].ga){  }}
    未设置
{{# }else{  }}
    <p style="color:blue">已设置</p>
{{# }  }}
</td>                           <td>
                                    {{# if(d[i].reg_check==0){ }}
                                        <a class="red" href="javascript:;" onclick="member_check({{d[i].id}},1);">
                                            <div id="zt{{d[i].id}}"><span class="label label-info">通过</span></div>
                                        </a>
                                        <a class="red" href="javascript:;" onclick="member_check({{d[i].id}},2);">
                                            <div id="zt{{d[i].id}}"><span class="label label-danger">拒绝</span></div>
                                        </a>
                                    {{# }else if(d[i].reg_check==1){ }}
                                            通过
                                    {{# }else if(d[i].reg_check==2){ }}
                                            拒绝
                                    {{# } }}
                                </td>
                                <td>
                                    {{# if(d[i].agent_check==3){ }}
                                        <a class="red" href="javascript:;" onclick="member_agent_check({{d[i].id}},1);">
                                            <div id="zt{{d[i].id}}"><span class="label label-info">通过</span></div>
                                        </a>
                                        <a class="red" href="javascript:;" onclick="member_agent_check({{d[i].id}},2);">
                                            <div id="zt{{d[i].id}}"><span class="label label-danger">拒绝</span></div>
                                        </a>
                                    {{# }else if(d[i].agent_check==1){ }}
                                            通过
                                    {{# }else if(d[i].agent_check==2){ }}
                                            拒绝
                                    {{# }else if(d[i].agent_check==0){ }}
                                            未申请
                                    {{# } }}
                                </td>
                                <td>
                                    {{# if(d[i].trader_check==3){ }}
                                        <a class="red" href="javascript:;" onclick="member_trader_check({{d[i].id}},1);">
                                            <div id="zt{{d[i].id}}"><span class="label label-info">通过</span></div>
                                        </a>
                                        <a class="red" href="javascript:;" onclick="member_trader_check({{d[i].id}},2);">
                                            <div id="zt{{d[i].id}}"><span class="label label-danger">拒绝</span></div>
                                        </a>
                                    {{# }else if(d[i].trader_check==1){ }}
                                            通过
                                    {{# }else if(d[i].trader_check==2){ }}
                                            拒绝
                                    {{# }else if(d[i].trader_check==0){ }}
                                            未申请
                                    {{# } }}
                                </td>
                                <td>
                                    {{# if(d[i].status==1){ }}
                                        <a class="red" href="javascript:;" onclick="member_status({{d[i].id}});">
                                            <div id="zt{{d[i].id}}"><span class="label label-info">开启</span></div>
                                        </a>
                                    {{# }else{ }}
                                        <a class="red" href="javascript:;" onclick="member_status({{d[i].id}});">
                                            <div id="zt{{d[i].id}}"><span class="label label-danger">禁用</span></div>
                                        </a>
                                    {{# } }}
                                </td>
                                <td>{{d[i].addtime}}</td>
                                <td>
                                    <a href="javascript:;" onclick="edit_member({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                        <i class="fa fa-paste"></i> 编辑</a>&nbsp;&nbsp;
                                     <a href="javascript:;" onclick="edit_member2({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                        <i class="fa fa-paste"></i> 充值</a>&nbsp;&nbsp;
                                    <a href="javascript:;" onclick="del_member({{d[i].id}})" class="btn btn-danger btn-outline btn-xs">
                                        <i class="fa fa-trash-o"></i> 删除</a>
                                </td>
                            </tr>
                            {{# } }}
                        </script>
                            <tbody id="list-content"></tbody>
                        </table>
                        <div id="AjaxPage" style=" text-align: right;"></div>
                        <div id="allpage" style=" text-align: right;"></div>
                    </div>
                </div>
                <!-- End Example Pagination -->
            </div>
        </div>
    </div>
    <!-- End Panel Other -->
    </div>
    <!-- 加载动画 -->
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
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
    <script type="text/javascript">
    //laypage分页
    Ajaxpage();

    function Ajaxpage(curr) {
        var key = $('#key').val();
        var reg_type = $('#reg_type').val();
        $.getJSON('<?php echo url("Merchant/index"); ?>', { page: curr || 1, key: key, reg_type: reg_type }, function(data) {
            $(".spiner-example").css('display', 'none'); //数据加载完关闭动画
            if (data == '') {
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            } else {
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html) {
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'), //容器。值支持id名、原生dom对象，jquery对象,
                    pages: '<?php echo $allpage; ?>', //总页数
                    skip: true, //是否开启跳页
                    skin: '#1AB5B7', //分页组件颜色
                    curr: curr || 1,
                    groups: 3, //连续显示分页数
                    jump: function(obj, first) {
                        if (!first) {
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第' + obj.curr + '页，共' + obj.pages + '页');
                    }
                });
            }
        });
    }
  //充值
    function edit_member2(id) {
        location.href = '/admin/merchant/edit_merchant2/id/' + id + '/reg_type/' + $('#reg_type').val() + '.html';
    }
    //编辑会员
    function edit_member(id) {
        location.href = '/admin/merchant/edit_merchant/id/' + id + '/reg_type/' + $('#reg_type').val() + '.html';
    }

    //删除会员
    function del_member(id) {
        lunhui.confirm(id, '<?php echo url("del_merchant"); ?>');
    }

    //用户会员
    function member_status(id) {
        lunhui.status(id, '<?php echo url("merchant_status"); ?>');
    }

    function member_check(id, check) {
        var param = {};
        var title;
        param.id = id;
        param.check = check;
        if (check == 1) {
            title = '确认通过吗？';
        } else {
            title = '确认拒绝吗？';
        }
        //console.log(param);
        lunhui.tongyong(param, "<?php echo url('merchant_check'); ?>", title);
    }

    function member_agent_check(id, check) {
        var param = {};
        var title;
        param.id = id;
        param.check = check;
        if (check == 1) {
            title = '确认通过吗？';
        } else {
            title = '确认拒绝吗？';
        }
        //console.log(param);
        lunhui.tongyong(param, "<?php echo url('merchant_agent_check'); ?>", title);
    }

    function member_trader_check(id, check) {
        var param = {};
        var title;
        param.id = id;
        param.check = check;
        if (check == 1) {
            title = '确认通过吗？';
        } else {
            title = '确认拒绝吗？';
        }
        //console.log(param);
        lunhui.tongyong(param, "<?php echo url('merchant_trader_check'); ?>", title);
    }
    </script>
</body>

</html>