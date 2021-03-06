<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/article/index.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
    <div class="ibox float-e-margins" id="app" v-cloak>
        <template>
            <div class="ibox-title">
                <h5>文章列表</h5>
            </div>
            <div class="ibox-content">         
                <!--工具条-->
                <el-form :inline="true" class="demo-form-inline">
                    <el-form-item>
                        <div class="col-sm-3" style="padding-left: 0px;">
                            <div class="input-group">
                                <input type="text" class="form-control" v-model="key" placeholder="输入需查询的文章名称" />
                                <span class="input-group-btn">
                                    <a type="button" class="btn btn-primary" @click="search"><i class="fa fa-search"></i> 搜索</a>
                                </span>
                            </div>
                        </div>
                        <a href="<?php echo url('add_article'); ?>" type="button" class="btn btn-primary" >
                            <i class="fa fa-plus"></i> 添加
                        </a>
                        <a type="button" class="btn btn-danger" @click="del">
                            <i class="fa fa-trash-o"></i> 删除
                        </a>
                    </el-form-item>
                </el-form>

                <div class="example-wrap">
                    <div class="example" >
                        <el-table :data="tableData" border highlight-current-row v-loading="listLoading" element-loading-text="拼命加载中..." @selection-change="handleSelectionChange" style="width: 100%">
                            <el-table-column type="selection" width="60" align="center"></el-table-column>
                            <el-table-column prop="id" label="ID" width="80" align="center"></el-table-column>
                            <el-table-column prop="title" label="标题" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="avatar" label="文章图片" align="center">
                                <template scope="scope">
                                    <img :src="scope.row.photo ? imgPath + scope.row.photo:'/static/admin/images/no_img.jpg'" style="height: 50px;padding: 5px">
                                </template>
                            </el-table-column>
                            <el-table-column prop="keyword" label="关键字" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="views" label="浏览量" width="100" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="writer" label="作者" width="100" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="create_time" label="创建时间" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="status" label="状态" width="120" align="center">
                                <template scope="scope">
                                    <span v-if="scope.row.status==0" style="color:#FF4949">禁用</span>
                                    <span v-if="scope.row.status==1" style="color:#07a379">启用</span>
                                </template>
                            </el-table-column>
                            <el-table-column align="center" width="120" label="操作">
                                <template scope="scope">
                                    <el-button size="small" type="text" @click="edit(scope.row)">编辑</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <div class="layout-pagination">
                            <el-pagination
                                @size-change="handleSizeChange"
                                @current-change="handleCurrentChange"
                                :current-page="currentPage"
                                :page-sizes="[10, 20, 50, 100]"
                                :page-size="pageSize"
                                layout="total, sizes, prev, pager, next, jumper"
                                :total="totalCount">
                            </el-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </template>    
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

<script type="text/javascript">

    var vm = new Vue({
        el: '#app',
        data: {
            imgPath: '/uploads/images/',
            //表格当前页数据
            tableData: [],
            //多选数组
            multipleSelection: [],
            //搜索条件
            key: '',
            //默认每页数据量
            pageSize: 10,
            //当前页码
            currentPage: 1,
            //默认数据总数
            totalCount: 0,
            //列表加载遮罩
            listLoading: false
        },
        methods: {
            //从服务器读取数据
            loadData(key, currentPage, pageSize){
                vm.listLoading = true;
                $.getJSON('<?php echo url("article/index"); ?>', {key:key,page:currentPage,rows:pageSize}, function(data){
                    vm.tableData = [];
                    vm.totalCount = data.count;
                    for(var i=0;i<data.list.length;i++){
                        if(data.list[i]){
                            vm.tableData.push(data.list[i]);
                        }
                    }
                    vm.listLoading = false;
                });
            },
            openMessage(type,message){
                this.$message({
                    type: type,
                    duration: 1500,
                    message: message
                });
            },
            //每页显示数据量变更
            handleSizeChange(val) {
                this.pageSize = val;
                this.loadData(this.key, this.currentPage, this.pageSize);
            },
            //页码变更
            handleCurrentChange(val) {
                this.currentPage = val;
                this.loadData(this.key, this.currentPage, this.pageSize);
            },
            //多选响应
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            //搜索
            search(){
                this.loadData(this.key, this.currentPage, this.pageSize);
                vm.listLoading = false;
            },
            //编辑
            edit(row) {
                location.href = './edit_article/id/'+row.id+'.html';
            },
            //批量删除
            del() {
                if(this.multipleSelection.length==0){
                    vm.openMessage('warning','请选择至少一条数据进行删除！');
                    return;
                }
                var array = [];
                this.multipleSelection.forEach((row) => {
                    array.push(row.id);
                })

                this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    $.ajax({
                        url: '<?php echo url("article/del_article"); ?>',
                        data:"id="+array,
                        type: "POST",
                        dataType:'json',
                        success:function(res){
                            if(res.code == 1){
                                vm.openMessage('success',res.msg);
                                vm.loadData(vm.key, vm.currentPage, vm.pageSize);
                            }else{
                                vm.openMessage('error',res.msg);
                            }
                        },
                        error:function(er){

                        }
                    });
                }).catch(() => {
                    vm.openMessage('info','已取消删除');
                });
            }
        }
    })

    //载入数据
    vm.loadData(vm.key, vm.currentPage, vm.pageSize);

</script>

</body>
</html>