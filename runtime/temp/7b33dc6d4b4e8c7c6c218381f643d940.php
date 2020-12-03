<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/abc.yptsc.cn/public/../application/home/view/login/register.html";i:1605701183;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name=renderer  content=webkit>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo config('web_site_title'); ?></title>
    <!-- Fonts -->
    <link href="/static/home/css/css.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="/static/home/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/static/home/js/clipboard.min.js"></script>
    <style>
        .container {
            margin-top: 20px;
        }

        .row {
            font-size: 15px;
        }

        .row div:nth-child(2) {
            text-align: right;
        }

        .box h1 {
            border-bottom: 1px solid #f1f1f1;
            font-size: 18px;
            padding: 0;
            margin: 0;
            line-height: 50px;
        }

        .send div {
            height: 30px;
            line-height: 30px;
            font-size: 14px;
            color: #a4aaae;
        }
        .p1 span {
            color: #1c2d3f;
        }
        .j_cen{
            height: auto;
            padding-top: 20px;
            overflow:hidden;
        }
        .j_cen1{
            width: 1000px;
            background: #fff;
            margin: 0 auto;
            padding-top:50px;
            padding-bottom: 50px;
        }
        .j_p {
            width: 20%;
            font-size: 14px;
            color: #333;
            text-align: right;
            height: 40px;
            line-height: 40px;
        }
        .j_ncen{
            text-align: center;
            display: block;
        }
        .j_text{
            width: 348px;
            height: 39px;
            border: 1px solid #e5e5e5;
            color: #b5b5b5;
            text-indent: 13px;
            line-height: 39px\9;
        }
        .list{
            display: -webkit-inline-box;
            margin-bottom: 1px;
            width: 100%;
        }
        .message {
            /* float: right; */
            color: #797b8b;
            margin-top: -20px;
        }
        .message i {
            display: block;
            position: relative;
            width: 200px;
            margin: 15px;
            border-radius: 3px;
            border: 1px solid #f5f5f5;
        }
        .message i .file_update {
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: 600;
            height: 100%;
            width: 100%;
            opacity: 0;
        }
        .message i img {
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }
        .help-block{
            color: red;
            margin-left: 3%;
        }
		@media (max-width: 768px){
			.j_cen1{
				width:auto;
			}
			.j_text{width:200px;}
			.col-xs-offset-5{width:33.33%;}
		}
        #reg_box{
            display: none;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row" style="background: #023c77;height: 100px;line-height: 100px">
        <img src="/uploads/images/<?php echo config('logo'); ?>" style="float: left;height:43px;margin: 30px;margin-top: 27px;">
        <div class="col-sm-3" style="color: #fff;font-size: 16px;text-align: left;">最安全的数字货币兑换平台</div>
    </div>
    <!-- 申明和警告部分 -->
            <div id="show_box">
                <div style="background:#ebedf6;padding: 4%;">
                    平台申明：
                    <br />
                    <ul>
                        <li>1. 数字资产本身不由任何金融机构或公司或本网站发行；</li>
                        <li>2. 数字资产市场是全新的、未经确认的，而且可能不会增长；</li>
                        <li>3. 数字资产主要由投机者大量使用，零售和商业市场使用相对较少，数字资产交易存在极高风险，其全天不间断交易，没有涨跌限制，价格容易受庄家、全球政府政策的影响而大幅波动；</li>
                        <li>4. 如果公司根据其单方判断认为您违反了本协议，或者根据您所在管辖区域的法律本网站提供的服务或者您使用本网站提供的服务的行为是非法的，公司有权随时暂停或终止您的账户，或者暂停或终止您使用本网站提供的服务或数字资产交易。</li>
                        <li>5. 禁止位于美国的任何人使用本网站提供的服务。
                            数字资产交易有极高风险，并不适合绝大部分人士。您了解和理解此投资有可能导致部分损失或全部损失，所以您应该以能承受的损失程度来决定投资的金额。您了解和理解数字资产会产生衍生风险，所以如有任何疑问，建议先寻求理财顾问的协助。此外，除了上述提及过的风险以外，还会有未能预测的风险存在。您应慎重考虑并用清晰的判断能力去评估自己的财政状况及上述各项风险而作出任何买卖数字资产的决定，并承担由此产生的全部损失，我们对此不承担任何责任。
                        </li>
                    </ul>
                    平台敬告您：
                    <ul>
                        <li>1.
                            您了解本网站仅作为您获取数字资产信息、寻找交易方、就数字资产的交易进行协商及开展交易的场所，本网站不参与您的任何交易，故您应自行谨慎判断确定相关数字资产及/或信息的真实性、合法性和有效性，并自行承担因此产生的责任与损失。</li>
                        <li>2. 本网站的任何意见、消息、探讨、分析、价格、建议和其他资讯均是一般的市场评论，并不构成投资建议。我们不承担任何因依赖该资讯直接或间接而产生的损失，包括但不限于任何利润损失。</li>
                        <li>3.
                            本网站的内容会随时更改并不作另行通知，我们已采取合理措施确保网站资讯的准确性，但并不能保证其准确性程度，亦不会承担任何因本网站上的资讯或因未能链结互联网、传送或接收任何通知和信息时的延误或失败而直接或间接产生的损失。</li>
                        <li>4. 使用互联网形式的交易系统亦存有风险，包括但不限于软件，硬件和互联网链结的失败等。由于我们不能控制互联网的可靠性和可用性，我们不会对失真，延误和链结失败而承担任何责任。</li>
                        <li>5. 本网站任何服务均不接受信用卡支付；</li>
                        <li>6.
                            禁止使用本网站从事洗钱、走私、商业贿赂等一切非法交易活动或违法行为，若发现任何涉嫌非法交易或违法行为，本站将采取各种可使用之手段，包括但不限于冻结账户，通知相关权力机关等，我们不承担由此产生的所有责任并保留向相关人士追究责任的权利。</li>
                        <li>7.
                            禁止使用本网站进行恶意操纵市场、不正当交易等一切不道德交易活动，若发现此类事件，本网站将对所有恶意操纵价格、恶意影响交易系统等不道德的行为采取警告、限制交易、关停账户等预防性地保护措施，我们不承担由此产生的所有责任并保留向相关人士追究责任的权利。</li>
                    </ul>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="check_box"> 我已经仔细阅读上述申明和警告事项
                    </label>
                </div>
                <button type="button" class="btn btn-primary" onclick="next_reg()">下一步</button>
                <script>
                    function next_reg(){
                    if($("#check_box").is(":checked")){
                        // console.log("ok");
                        $('#show_box').hide();
                        $("#reg_box").show();


                    }else{
                        alert('请先仔细阅读上述申明和警告项目！');
                    }
                }
            </script>
            </div>
    <div id="reg_box" style="background:#ebedf6;padding: 4%;">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="j_cen">
            <div class="j_cen1">
                <div class="j_ncen">
                    <div class="yh_dl_box">
                        <div class="yh_dl curs">
                            <div class="list">
                                <p class="j_p mt30">注册类型：</p>
                                <select name='reg_type' style='padding:8px;' id='reg_type' class="j_text mt12">
                                    <?php 
                                    if(input('type') &&input('type')<4){


                                    if(input('type')==1){
                                     echo "<option value='1'>商户</option>";
                                    }
                                    if(input('type')==2){
                                     echo "<option value='2'>承兑商</option>";
                                    }
                                    if(input('type')==3){
                                     echo "<option value='3'>代理商</option>";
                                    }
                                    }else{
                                         echo "<option value='0'>请选择注册类型</option>
                                        <option value='1'>商户</option>
                                        <option value='2'>承兑商</option>
                                        <option value='3'>代理商</option>";
                                    }
                                     ?>

                                    <!-- <option value='0'>请选择注册类型</option>
                                    <option value='1'>商户</option>
                                    <option value='2'>承兑商</option>
                                    <option value='3'>代理商</option> -->
                                </select>
                            </div>
                            <div class="list">
                                <p class="j_p mt30">姓名：</p>
                                <input type="text" name="username" id="username" class="j_text mt12" value="" placeholder="请输入姓名">

                            </div>
							<div class="list">
                                <p class="j_p mt30">昵称：</p>
                                <input type="text" name="nickname" id="nickname" class="j_text mt12" value="" placeholder="请输入昵称">

                            </div>
                            <div class="list">
                                <p class="j_p mt30">身份证号：</p>
                                <input type="text" name="idcard" id="idcard" class="j_text mt12" value="" placeholder="请输入身份证号">

                            </div>
                            <div class="list">
                                <p class="j_p mt30">手机号：</p>
                                <input type="tel" name="mobile" id="mobile" class="j_text mt12" value="" placeholder="请输入手机号">

                            </div>
                            <div class="list">
                                <p class="j_p mt30">短信验证码：</p>
                                <input type="number" name="smscode" id="smscode" class="j_text mt12" value="" placeholder="请输入短信验证码">
                                <a type="button" name="getcode" id="getcode"  onclick="sendPhoneCode()">获取验证码</a>

                            </div>
                            <div class="list">
                                <p class="j_p mt30">登录密码：</p>
                                <input type="password" name="password" id="password" class="j_text mt12" placeholder="请输入登录密码">

                            </div>
                            <div class="list">
                                <p class="j_p mt30">确认登录密码：</p>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="j_text mt12" placeholder="请输入确认登录密码">

                            </div>
                             <div class="list">
                                <p class="j_p mt30">交易密码：</p>
                                <input type="password" name="paypassword" id="paypassword" class="j_text mt12" placeholder="请输入交易密码">

                            </div>
                            <div class="list">
                                <p class="j_p mt30">确认交易密码：</p>
                                <input type="password" name="paypassword_confirmation" id="paypassword_confirmation" class="j_text mt12" placeholder="请输入确认交易密码">

                            </div>

                               <div class="list">
                                <p class="j_p mt30">邀请码：</p>
                                <input type="text" name="invite_code" id="invite_code" class="j_text mt12" value="<?php echo \think\Session::get('invite'); ?>" placeholder="请输入邀请码">

                            </div>
                                                        <div class="list">
                                <p class="j_p mt30">身份证正面照片：</p>
                                <span class="message">
                                    <i>
                                        <input type="file" name="image[]" class="file_update">
                                        <img src="/static/home/images/zheng.jpg">
                                    </i>
                                </span>

                            </div>
                            <div class="list">
                                <p class="j_p mt30">身份证背面照片：</p>
                                <span class="message">
                                    <i>
                                        <input type="file" name="image[]" class="file_update">
                                        <img src="/static/home/images/fan.jpg">
                                    </i>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-xs-2 col-xs-offset-5 ">
                        <input type="hidden" name="_token" value="bS46ZqTIeFAziyKFXuX5Q1hfkc9Szm1nOFLSKE6G">
                        <input type="hidden" name="type" value="2">
                        <button class="btn btn-primary btn-lg btn-block" type="button" role="button" onclick="submitr();return false;">提交</button>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
<div class="row" style="margin-bottom: 20px;margin-left: 10%;">

</div>



<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/static/home/js/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/static/home/js/bootstrap.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<script>
    $('.file_update').change(function() {
        var url=getObjectURL(this.files[0]);//获取本地的文件地址
        if(url)
        {
            $(this).parent().find('img').attr('src',url);//修改图片路径
        }else{
            $(this).parent().find('img').attr('src',defaultimage);
        }
    });

    //本地URL地址解析
    function getObjectURL(file) {
        //不存在选择路径补null
        file=file?file:null;
        if(file==null)
        {
            return null;
        }
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    function submitr(){
    	var username = $('#username').val();
        var idcard = $('#idcard').val();
    	var smscode = $('#smscode').val();
    	var mobile = $('#mobile').val();
        var password = $('#password').val();
    	var paypassword = $('#paypassword').val();
        var password_confirmation = $('#password_confirmation').val();
    	var paypassword_confirmation = $('#paypassword_confirmation').val();
		var reg_type = $('select[name="reg_type"]').val();
    	if(reg_type == 0){
    		layer.msg('请选择注册类型');return false;
    	}
    	if(!username){
    		 layer.msg('请输入姓名');return false;
    	}
       /* if(!smscode){
            layer.msg('请输入短信验证码');return false;
        }*/
    	if(!idcard){
    		layer.msg('请输入身份证号');return false;
    	}
    	if(!mobile){
    		layer.msg('请输入手机号');return false;
    	}
    	if(!password){
    		layer.msg('请输入登录密码');return false;
    	}
        if(password == paypassword){
            layer.msg('登录密码不能与交易密码相同');return false;
        }
    	if(password != password_confirmation){
    		layer.msg('确认登录密码错误');return false;
    	}
        if(paypassword != paypassword_confirmation){
            layer.msg('确认交易密码错误');return false;
        }
        if(checkID(idcard)==false){
            layer.msg('身份证号码错误');return false;
        }

    	$('form').submit();

    }


    var time=60;
    function sendPhoneCode(){
        var mobile = $('#mobile').val();
      if(!mobile){
            layer.tips('请输入手机号', '#mobile');return false;
        }


      $.post("<?php echo url('Home/Login/sendPhoneCode'); ?>",{mobile:mobile},function(data){
          layer.msg(data.msg);
          if(data.code == 0){
              $("#getcode").html("获取验证码");
              $("#getcode").attr("onclick",'sendPhoneCode()');
              return false;
            }else{
                 var timer=setInterval(function(){
                if(time>0){
                    $("#getcode").html(time+'s　');
                    $("#getcode").attr("onclick", '');
                    time--;
                }else{
                    time=60;
                    $("#getcode").html("获取验证码");
                    $("#getcode").attr("onclick",'sendPhoneCode()');
                    clearInterval(timer)
                }
                 },1000)
            }
      })
  }


  function checkID(ID) {
    if(typeof ID !== 'string') return '非法字符串';
    var city = {11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"};
    var birthday = ID.substr(6, 4) + '/' + Number(ID.substr(10, 2)) + '/' + Number(ID.substr(12, 2));
    var d = new Date(birthday);
    var newBirthday = d.getFullYear() + '/' + Number(d.getMonth() + 1) + '/' + Number(d.getDate());
    var currentTime = new Date().getTime();
    var time = d.getTime();
    var arrInt = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
    var arrCh = ['1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'];
    var sum = 0, i, residue;

    if(!/^\d{17}(\d|x)$/i.test(ID)){
        return false;
        // return '非法身份证';
    } else{
        return true;
    }
    // if(city[ID.substr(0,2)] === undefined) return "非法地区";
    // if(time >= currentTime || birthday !== newBirthday) return '非法生日';
    // for(i=0; i<17; i++) {
    //   sum += ID.substr(i, 1) * arrInt[i];
    // }
    // residue = arrCh[sum % 11];
    // if (residue !== ID.substr(17, 1)) return '非法身份证';

    // return city[ID.substr(0,2)]+","+birthday+","+(ID.substr(16,1)%2?" 男":"女")
  }


</script>

</body></html>