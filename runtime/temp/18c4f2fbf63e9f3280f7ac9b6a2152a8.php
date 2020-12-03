<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/login/login.html";i:1570517386;}*/ ?>
﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title><?php echo config('web_site_title'); ?> |登陆</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--图标-->
	<link rel="stylesheet" type="text/css" href="/static/home/login/css/font-awesome.min.css">
	
	<!--布局框架-->
	<link rel="stylesheet" type="text/css" href="/static/home/login/css/util.css">
	
	<!--主要样式-->
	<link rel="stylesheet" type="text/css" href="/static/home/login/css/main.css">
	
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="/static/home/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/static/home/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/static/home/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/static/home/css/blue.css">
</head>

<body>
	<div class="container-login100">
	<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="/static/home/login/img/img-01.png" alt="IMG">
			</div>
	  <div class="login-box-body">
    <p class="login-box-msg"><?php echo config('web_site_title'); ?> 用户登录</p>

    <noform action="" method="post">
      <div class="form-group has-feedback 1">


        <input type="input" class="input100" placeholder="用户名" name="username" value="" id="username" onblur="usernames()">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback 1">


        <input type="password" class="input100" placeholder="密码" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback 1">
        <input type="text" class="input101" placeholder="图片验证码" name="verify" id="verify">
       
        <div>
         <img style="width: 104px;position:absolute;top:10px;right:-30px;" src="<?php echo url('home/login/verify'); ?>" id="verify_img" alt="captcha" onclick="refreshVerify()"/>	
        </div>
      </div>
	  <div class="form-group has-feedback 1" id="ga" style="display:none;">
        <input type="text" class="input100" placeholder="如您未绑定谷歌验证码，则不用填" name="goole" id="goole">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-md-offset-4">
          <input type="hidden" name="_token" value="bNzO8aGnLnPI5Tgo7i9YVw8qTQEoybhZxxZNraQX">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="login();">登录</button>
        </div>
		<a href="/findpwd" style="    font-size: 12px;
    position: relative;
    float: right;
    top: 20px;" target="_blank">忘记密码？</a>
        <!-- /.col -->
      </div>
      <div class="text-center p-t-136">
					<a class="txt2" href="/register">
							还没有账号？立即注册
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
    </noform>

  </div>
  </div>

<!-- /.login-box -->
</div>
</div>
<!-- jQuery 2.1.4 -->
<script src="/static/home/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/static/home/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/static/home/js/icheck.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  function usernames(){
      var username = $('#username').val();
      if(username==""||username==null){
    	  layer.tips('请填写用户名', '#username');
        return false;
      }
      $.post("<?php echo url('Home/Login/jiancega'); ?>", {
          username:username,
      }, function (data) {
          if (data.code == 1) {
                  $('#ga').show();
          }
      }, "json");
  }
  function refreshVerify() {
      var ts = Date.parse(new Date())/1000;
      var img = document.getElementById('verify_img');
      img.src = "/home/login/verify?id="+ts;
  }
  function login(){
	  var username = $('#username').val();
	  var password = $('#password').val();
	  var verify = $('#verify').val();
	  var goole = $('#goole').val();
	  if(!username){
		  layer.tips('请填写用户名', '#username');return false;
	  }
	  if(!password){
		  layer.tips('请填写登陆密码', '#password');return false;
	  }
	  if(!verify){
		  layer.tips('请填写图片验证码', '#verify');return false;
	  }
	  $.post('/login.html',{username:username,password:password, goole:goole,verify:verify},function(data){
		  layer.msg(data.msg);
		  if(data.code == 1){
			  window.location.href='/Merchant/index.html';
		  }else{
        $('#verify_img').click();
      }
	  })
  }
</script>

</body>
</html>