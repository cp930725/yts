<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/merchant/addresslist.html";i:1998611476;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
            <h5>钱包地址列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('addresslist'); ?>">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>" placeholder="输入姓名/手机号" style="width:40%;"/>
                                <select name='addresstype' id='addresstype' class="form-control" style="width:40%;">
                                	<option value="-1">选择类型</option>
                                	<option value='1' <?php if($type == '1'): ?>selected<?php endif; ?>>已分配</option>
                                	<option value='0' <?php if($type == '0'): ?>selected<?php endif; ?>>未分配</option>
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
                                <th width="">ID</th>
                                <th width="">手机号</th>
                                <th width="">用户名</th>
                                <th width="">地址</th>
                                <th width="">类型</th>
                                <th width="">状态</th>
                                <th width="">操作</th>
                            </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i<d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].id}}</td>
                                <td>{{d[i].mobile}}</td>
                                <td>{{d[i].username}}</td>
                                <td>{{d[i].address}}</td>
                                <td>{{d[i].type}}</td>
                                <td>{{d[i].status}}</td>
                                <td>
{{# if(d[i].status == '已分配'){ }}
{{# if(d[i].type == 'BTC'){ }}
<a href="javascript:;" onclick="getbalancebtc('{{d[i].id}}','{{d[i].address}}')" class="btn btn-danger btn-outline btn-xs" id="ye{{d[i].id}}"><i class="fa fa-btc"></i>链上余额</a>&nbsp;&nbsp;
<a href="javascript:;" onclick="coverbtc('{{d[i].id}}')" class="btn btn-primary btn-outline btn-xs" id="hz"><i class="fa fa-usd"></i> 汇总余额</a>
{{# }else{ }}
 <a href="javascript:;" onclick="getbalance('{{d[i].id}}','{{d[i].privatekey}}')" class="btn btn-danger btn-outline btn-xs" id="ye{{d[i].id}}"><i class="fa fa-btc"></i>链上余额</a>&nbsp;&nbsp;
<a href="javascript:;" onclick="javascript:if(confirm('该操作将从手续费地址转入该账户0.001ETH,确认吗?'))sendeth('{{d[i].address}}')" class="btn btn-primary btn-outline btn-xs" id=""><i class="fa fa-cny"></i> 转手续费</a>
<a href="javascript:;" onclick="javascript:if(confirm('该操作将从该地址转出所有USDT到汇总账户,确认吗?'))covereth('{{d[i].privatekey}}')" class="btn btn-primary btn-outline btn-xs" id="hz"><i class="fa fa-usd"></i> 汇总余额</a>

{{# } }}
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
<script src="/static/admin/js/ethers-v4.min.js"></script>
<script src="/static/admin/js/usdt.js"></script>
<script type="text/javascript">

    //laypage分页
    Ajaxpage();
    function Ajaxpage(curr){
        var key=$('#key').val();
        var type = $('#addresstype').val();
        $.getJSON('<?php echo url("Merchant/addresslist"); ?>', {page: curr || 1,key:key,addresstype:type}, function(data){
            $(".spiner-example").css('display','none'); //数据加载完关闭动画
            if(data==''){
                $("#list-content").html('<td colspan="5" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
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
	lunhui.myconfirm(id, '<?php echo url("passTibi"); ?>', '确认通过吗？');
}
//拒绝
function refuse(id){
	lunhui.myconfirm(id, '<?php echo url("refuseTibi"); ?>', '确认拒绝？操作将原路返回商家USDT');
}
function getbalancebtc(id,address){
            var load;
            $.ajax({
                url:'/admin/index/getbalancebtc',
                type:'post',
                data:{address:address},
                beforeSend:function(){
                    load = layer.load();
                },
                success:function(data){
                    layer.close(load);
                    $('#ye'+id).html(data.msg);
                }
            })
        }

$(function(){
    // layer.msg(1);
    <?php 
    if(config('wallettype')=='erc'){
        //设置汇总地址,手续费私钥
       echo "var toaddress='".config('hzaddr')."';";
       echo "localStorage.setItem('feeprive','".config('feeaddrprive')."');";
    }
     ?>


    });


function covereth(key){
    <?php 
     echo "var toaddress='".config('hzaddr')."';";
      ?>
    sendtoken(toaddress,key);
}
</script>
</body>
</html>