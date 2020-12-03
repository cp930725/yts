var navData = [{url: 'login.html', title: '登陆'},{url: 'register.html', title: '注册'}];

function loadHeader(index) {

	var htmlStr = '';
	htmlStr += '<div class="nav">';
	htmlStr += '	<div class="logo"></div>';
	htmlStr += '	<ul class="menu">';
	for (var i = 0; i < navData.length; i++) {
		var childNode = navData[i].subMenu;
		if (i == index) {
			htmlStr += '<li class="active">';
		} else {
			htmlStr += '<li>';
		}
		htmlStr += '<a class="first" href="'+navData[i].url+'">'+navData[i].title+'</a>';
		htmlStr += '<span></span>';

		if (childNode) {  // 次级菜单

			htmlStr += '<ul class="sub-menu">';
			for (var j = 0; j < childNode.length; j++) {
				htmlStr += '<li>';
				htmlStr += '<a href="'+childNode[j].url+'">'+childNode[j].title+'</a>';
				htmlStr += '</li>';
			}
			htmlStr += '</ul>';
		}

		htmlStr += '</li>';
	}
	htmlStr += '	</ul>';
	htmlStr += '</div>';
	document.querySelector('.starfire-header').innerHTML = htmlStr;
}

function loadFooter() {
	var htmlStr = `<div class="content">
			<div class="left">
				<div class="logo"></div>
				<div class="text">
					<p>全球风控级别最高的支付通道</p>
					<p>UK SPARK DIGITAL CURRENCY PAYMENT.LTD 11848905</p>
				</div>
			</div>
			<div class="info">
				<div class="bank">
					<p class="title">银行支持</p>
					<ul>
						<li><img src="static/home/images/footer_bank_1.png"></li>
						<li><img src="static/home/images/footer_bank_2.png"></li>
						<li><img src="static/home/images/footer_bank_3.png"></li>
						<li><img src="static/home/images/footer_bank_4.png"></li>
						<li><img src="static/home/images/footer_bank_5.png"></li>
					</ul>
					<ul class="second">
						<li><img src="static/home/images/footer_bank_6.png"></li>
						<li><img src="static/home/images/footer_bank_7.png"></li>
					</ul>
				</div>
				<div class="company" style="width: 180px;">
					<p class="title">合作伙伴</p>
					<ul>
						<li><img src="static/home/images/footer_partner_1.png"></li>
						<li><img src="static/home/images/footer_partner_2.png"></li>
						<li><img src="static/home/images/footer_partner_3.png"></li>
						<li><img src="static/home/images/footer_partner_4.png"></li>
						<li><img src="static/home/images/footer_partner_5.png"></li>
					</ul>
					<ul class="second">
						<!--  <li><img src="static/home/images/footer_partner_6.png"></li> -->
						<li><img src="static/home/images/footer_partner_7.png"></li>
					</ul>
				</div>
			</div>
		</div>`;
		document.querySelector('.starfire-footer').innerHTML = htmlStr;

		loadAlert();
}

function loadAlert() {
	var hasAlert = localStorage.getItem('hasAlertTips');
	if (hasAlert == 1) return;
	var htmlStr = '<div class="alert-content">'+
			'<div class="alert-left">'+
				'<img src="static/home/netindex/static/home/images/pop_img.png" alt="">'+
			'</div>'+
			'<div class="alert-right">'+
				'<p class="right-title">友情提醒</p>'+
				'<p class="tips">禁止使用数字资产交易从事洗钱、走私、赌博、商业贿赂等一切非法交易活动或违法行为，若发现任何涉嫌非法交易或违法行为，将采取各种可使用之手段，包括终止交易，冻结数字资产，通知相关权力机关等，平台不承担由此产生的所有责任并保留向相关人士追究责任的权利。</p>'+
			'</div>'+
			'<div class="alert-close-btn" onclick="closeAlert()">我知道了</div>'+
		'</div>';
	var para = document.createElement('div');
	para.className = 'alert-box-wrap';
	para.innerHTML = htmlStr;
	document.body.appendChild(para);
	localStorage.setItem('hasAlertTips', '1')
}

function closeAlert() {
	document.querySelector('.alert-box-wrap').style.display = 'none';
}

// 手机适配
//判断是否手机端访问
var userAgentInfo = navigator.userAgent.toLowerCase();
var Agents = ["android", "iphone",
    "symbianos", "windows phone",
    "ipad", "ipod"];
var isMobile = false;
for (var v = 0; v < Agents.length; v++) {
  if (userAgentInfo.indexOf(Agents[v]) >= 0) {
    isMobile = true;
  }
}

if (isMobile) {
  let screenWidth = window.screen.width;
  let scale = screenWidth/1875;
  let scaledHeight = document.body.offsetHeight*scale;

  document.body.style.transformOrigin = 'top left';
  document.body.style.transform = 'scale('+(scale)+')';
  document.body.style.width = '1875px';
  document.body.style.height = scaledHeight + 'px';

}