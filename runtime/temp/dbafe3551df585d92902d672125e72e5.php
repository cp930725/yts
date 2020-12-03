<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/merchant/tibi.html";i:1360952464;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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

                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('tibi'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="输入需查询的商户姓名/手机号" />
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
                                <th width="9%">手机号</th>
                                <th width="9%">订单号</th>
                                <th width="5%">提币USDT</th>
                                <th width="10%">转出地址</th>
                                <th width="5%">手续费</th>
                                <th width="5%">实到</th>
                                <th width="5%">状态</th>
                                <th width="10%">备注</th>
                                <th width="8%">创建时间</th>
                                <th width="10%">审核时间</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].id}}</td>
                                <td>{{d[i].mobile}}</td>
                                <td>{{d[i].ordersn}}</td>
                                <td>{{d[i].num}}</td>
                                <td>{{d[i].address}}</td>
                                <td>{{d[i].fee}}</td>
                                <td>{{d[i].mum}}</td>
                                <td>
                                    {{# if(d[i].status==0){ }}
                                        待审核
                                    {{# }else if(d[i].status==1){ }}
                                        通过
									{{# }else if(d[i].status==2){ }}
			   拒绝
									{{# }else if(d[i].status==3){ }}
				已撤销
                                    {{# }else{ }}
                                        未知
                                    {{# } }}
                                </td>
                                <td>{{d[i].note}}</td>
                                <td>{{d[i].addtime}}</td>
								<td>
{{#if(d[i].endtime == '1970-01-01 08:00:00'){}}
	---
{{#}else{}}
	{{d[i].endtime}}
{{#}}}
								</td>
                                <td>
									{{# if(d[i].status == 0){ }}
	<a href="javascript:;" onclick="pass({{d[i].id}})" class="btn btn-danger btn-outline btn-xs">
                                        <i class="fa fa-trash-o"></i> 通过</a>&nbsp;&nbsp;
<a href="javascript:;" onclick="refuse({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                        <i class="fa fa-trash-o"></i> 拒绝</a>

{{# }else{ }}
	<a href="javascript:;" onclick="showtxid('{{d[i].txid}}')" class="btn btn-primary btn-outline btn-xs">
                                        查看TXID</a>
{{# } }}
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
    function Ajaxpage(curr){
        var key=$('#key').val();
        $.getJSON('<?php echo url("Merchant/tibi"); ?>', {page: curr || 1,key:key}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data==''){
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            }else{
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function(html){
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages:'<?php echo $allpage; ?>',//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 3,//连续显示分页数
                    jump: function(obj, first){
                        if(!first){
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第'+ obj.curr +'页，共'+ obj.pages +'页');
                    }
                });
            }
        });
    }

//编辑会员
function edit_member(id){
    location.href = './edit_member/id/'+id+'.html';
}

//删除会员
function del_member(id){
    lunhui.confirm(id,'<?php echo url("del_member"); ?>');
}

//用户会员
function member_status(id){
    lunhui.status(id,'<?php echo url("member_status"); ?>');
}
//通过
function pass(id){
	layer.confirm('请选择方式', {
		btn: ['走钱包', '不走钱包']
	}, function(){
		$.post('<?php echo url("passTibi"); ?>', {id:id,type:1}, function(res){
			if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                Ajaxpage();
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
		})
	}, function(){
		$.post('<?php echo url("passTibi"); ?>', {id:id,type:2}, function(res){
			if(res.code == 1){
                layer.msg(res.msg,{icon:1,time:1500,shade: 0.1});
                Ajaxpage();
            }else{
                layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
            }
		})
	})
}
//拒绝
function refuse(id){
	lunhui.myconfirm(id, '<?php echo url("refuseTibi"); ?>', '确认拒绝？操作将原路返回商家USDT');
}
function showtxid(txid){
    <?php 
    if(config('wallettype')=='omni'){
        $url='https://www.omniexplorer.info/search/';
    }
    if(config('wallettype')=='erc'){
        $url='https://etherscan.io/tx/';
    }
     ?>

    var str="<a href='<?php echo $url; ?>"+txid+"' target='_blank'>查看交易详情:"+txid+"</a>";
	// var str="<a href='https://www.omniexplorer.info/search/"+txid+"' target='_blank'>"+txid+"</a>";
	layer.alert(str);
}
</script>
</body>
</html>