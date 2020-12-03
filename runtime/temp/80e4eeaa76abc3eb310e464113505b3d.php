<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/www/wwwroot/abc.yptsc.cn/public/../application/admin/view/user/index.html";i:1563934898;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/header.html";i:1563934900;s:67:"/www/wwwroot/abc.yptsc.cn/application/admin/view/public/footer.html";i:1563934900;}*/ ?>
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
                <h5>用户列表</h5>
            </div>
            <div class="ibox-content">
                <!--工具条-->
                <el-form :inline="true" class="demo-form-inline">
                    <el-form-item>
                        <div class="col-sm-3" style="padding-left: 0px;">
                            <div class="input-group">
                                <input type="text" class="form-control" v-model="key" placeholder="输入需查询的用户名" />
                                <span class="input-group-btn">
                                    <a type="button" class="btn btn-primary" @click="search"><i class="fa fa-search"></i> 搜索</a>
                                </span>
                            </div>
                        </div>
                        <a @click="add" type="button" class="btn btn-primary" >
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
                            <el-table-column prop="username" label="用户名" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="portrait" label="头像" align="center">
                                <template scope="scope">
                                    <img :src="scope.row.portrait ? imgPath + scope.row.portrait:'/static/admin/images/no_img.jpg'" style="height: 50px;padding: 5px">
                                </template>
                            </el-table-column>
                            <el-table-column prop="real_name" label="真实姓名" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="title" label="角色" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="loginnum" label="登录次数" width="100" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="last_login_ip" label="上次登录ip" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="last_login_time" :formatter="dateFormat" label="上次登录时间" show-overflow-tooltip align="center"></el-table-column>
                            <el-table-column prop="status" label="状态" width="120" align="center">
                                <template scope="scope">
                                    <span v-if="scope.row.status==0" style="color:#FF4949">禁用</span>                           
                                    <span v-if="scope.row.status==1" style="color:#07a379">启用</span>
                                </template>
                            </el-table-column>
                            <el-table-column align="center" width="120" label="操作">
                                <template scope="scope">
                                    <el-button size="small" type="text" @click="edit(scope.row.id)">编辑</el-button>
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

                <!-- <div class="example-wrap">
                    <div class="example">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="long-tr">
                                    <th>ID</th>
                                    <th>管理员名称</th>
                                    <th>头像</th>
                                    <th>管理员角色</th>
                                    <th>登录次数</th>
                                    <th>上次登录ip</th>
                                    <th>上次登录时间</th>
                                    <th>真实姓名</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <script id="list-template" type="text/html">
                                {{# for(var i=0;i<d.length;i++){  }}

                                <tr class="long-td">
                                    <td>{{d[i].id}}</td>
                                    <td>{{d[i].username}}</td>
                                    <td>
                                        <img src="/uploads/face/{{d[i].portrait}}" class="img-circle" style="width:35px;height:35px" onerror="this.src='/static/admin/images/head_default.gif'"/>
                                    </td>
                                    <td>{{d[i].title}}</td>
                                    <td>{{d[i].loginnum}}</td>
                                    <td>{{d[i].last_login_ip}}</td>
                                    <td>{{d[i].last_login_time}}</td>
                                    <td>{{d[i].real_name}}</td>
                                    <td>
                                        {{# if(d[i].id!==1){ }}
                                            {{# if(d[i].status==1){ }}
                                                <a class="red" href="javascript:;" onclick="state({{d[i].id}});">
                                                    <div id="zt{{d[i].id}}"><span class="label label-info">开启</span></div>
                                                </a>
                                            {{# }else{ }}
                                                <a class="red" href="javascript:;" onclick="state({{d[i].id}});">
                                                    <div id="zt{{d[i].id}}"><span class="label label-danger">禁用</span></div>
                                                </a>
                                            {{# } }}
                                        {{# } }}
                                    </td>
                                    <td>
                                        {{# if(d[i].id!==1){ }}
                                            <a href="javascript:;" onclick="edit({{d[i].id}})" class="btn btn-primary btn-outline btn-xs">
                                                <i class="fa fa-paste"></i> 编辑</a>&nbsp;&nbsp;
                                            <a href="javascript:;" onclick="del({{d[i].id}})" class="btn btn-danger btn-outline btn-xs">
                                                <i class="fa fa-trash-o"></i> 删除</a>
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
            </div> -->
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
            imgPath: '/uploads/face/',
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
            listLoading: false,
            //时间格式化
            dateFormat:function(row, column) {
                var date = row[column.property];
                if (date == undefined) {
                    return "";
                }
                return moment(date * 1000).format("YYYY-MM-DD HH:mm:ss");
            }
        },
        methods: {
            //从服务器读取数据
            loadData(key, currentPage, pageSize){
                vm.listLoading = true;
                $.getJSON('<?php echo url("User/index"); ?>', {key:key,page:currentPage,rows:pageSize}, function(data){
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
            //添加
            add() {
                openAdd();
            },
            //编辑
            edit(id) {
                openEdit(id);
            },
            //状态
            state(id){
                lunhui.status(id,'<?php echo url("state"); ?>');
                this.loadData(this.key, this.currentPage, this.pageSize);
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
                        url: '<?php echo url("User/del"); ?>',
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


    function openAdd(){
        layer.open({
            type: 2,
            title: '添加',
            shadeClose: false,
            scrollbar: false,
            maxmin: true,
            shade: 0.2,
            area: ['45%', '80%'],
            content: '<?php echo url("add"); ?>',
        });
    }

    function openEdit(id){
        layer.open({
            type: 2,
            title: '编辑',
            shadeClose: false,
            scrollbar: false,
            maxmin: true,
            shade: 0.2,
            area: ['45%', '80%'],
            content: './edit/id/'+id+'.html',
        });
    }

</script>
</body>
</html>
