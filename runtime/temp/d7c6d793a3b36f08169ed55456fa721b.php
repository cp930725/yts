<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/merchant/traderrecharge.html";i:1569056406;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
            <h5>交易员充值列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                <!-- <div  class="col-sm-2" style="width: 100px">
                    <div class="input-group" >
                        <a href="<?php echo url('add_member'); ?>"><button class="btn btn-outline btn-primary" type="button">添加会员</button></a>
                    </div>
                </div>  -->
                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('traderrecharge'); ?>">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" style="width:40%;" name="key" value="<?php echo $val; ?>" placeholder="输入交易员姓名/手机号" />
                                <input type="text" id="oid" class="form-control" style="width:40%;" name="oid" value="<?php echo $oid; ?>" placeholder="输入转入地址" />
                                <select name="status" class="form-control" id="status" style="width:20%;">
                                	<option value="0" <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?>selected<?php endif; ?>>选择状态</option>
                                	<option value="1" <?php if($status == '1'): ?>selected<?php endif; ?>>未到账</option>
                                	<option value="2" <?php if($status == '2'): ?>selected<?php endif; ?>>已到账</option>
                                </select>
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
                                <th width="">交易员</th>
                                <th>转出地址</th>
                                <th>转入地址</th>
                                <th>数量</th>
                                <th>手续费</th>
                                <th>实到</th>
								<th>确认数</th>
                                <th>状态</th>
                                <th width="">时间</th>
								<th>操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].name}}</td>
                                <td>{{d[i].from_address}}</td>
                                <td>{{d[i].to_address}}</td>
                                <td>{{d[i].num}}</td>
                                <td>{{d[i].fee}}</td>
                                <td>{{d[i].mum}}</td>
								<td>{{d[i].confirmations}}</</td>
                                <td>
{{# if(d[i].status == 0){ }}
	未到账
{{# }else if(d[i].status == 1){ }}
	已到账
{{# } }}
</td>
                                <td>{{d[i].addtime}}</td>
								<td>
<a href="javascript:;" onclick="showtxid('{{d[i].txid}}')" class="btn btn-primary btn-outline btn-xs">
                                        Txid</a>
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
        var oid=$('#oid').val();
        var status = $('#status option:selected').val();
        $.getJSON('<?php echo url("Merchant/traderrecharge"); ?>', {page: curr || 1,key:key,oid:oid, status:status}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data==''){
                $("#list-content").html('<td colspan="10" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
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
	lunhui.myconfirm(id, '<?php echo url("passWithdraw"); ?>', '确认通过吗？');
}
//拒绝
function refuse(id){
	lunhui.myconfirm(id, '<?php echo url("refuseWithdraw"); ?>', '确认拒绝？');
}
function showtxid(txid){
	// var str="<a href='https://www.omniexplorer.info/search/"+txid+"' target='_blank'>"+txid+"</a>";
	// layer.alert(str);
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