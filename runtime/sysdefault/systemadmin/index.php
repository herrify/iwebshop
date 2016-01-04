<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台登录</title>
<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
<meta name="robots" content="noindex,nofollow">
<script type="text/javascript" src="<?php echo $this->getWebViewPath()."javascript/common.js";?>"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/artdialog/skins/aero.css" />
</head>
<body id="login">
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="#"><img src="<?php echo $this->getWebSkinPath()."images/admin/logo.png";?>" width="303" height="43" /></a>
			</div>
		</div>
		<div id="wrapper" class="clearfix">
			<div class="login_box">
				<div class="login_title">后台管理登录</div>
				<div class="login_cont">
					<form action='<?php echo IUrl::creatUrl("/systemadmin/login_act");?>' method='post'>
						<table class="form_table">
							<col width="90px" />
							<col />
							<tr>
								<th valign="middle">用户名：</th><td><input class="normal" type="text" name="admin_name" alt="请填写用户名" /></td>
							</tr>
							<tr>
								<th valign="middle">密码：</th><td><input class="normal" type="password" name="password" alt="请填写密码" /></td>
							</tr>
							<tr>
								<th valign="middle">验证码：</th><td><input style="width:85px" type='text' class='normal' name='captcha' pattern='^\w{5,10}$' alt='填写下面图片所示的字符' /><label>填写下图所示字符</label></td>
						  	</tr>
							<tr class="low">
								<th></th>
								<td><img src='<?php echo IUrl::creatUrl("/simple/getCaptcha/w/90/h/30/s/15");?>' id='captchaImg' /><span class="light_gray">看不清？<a class="link" href="javascript:changeCaptcha('<?php echo IUrl::creatUrl("/simple/getCaptcha/w/90/h/30/s/15");?>');">换一张</a></span></td>
							</tr>
							<tr>
								<th valign="middle"></th><td><input class="submit" type="submit" value="登录" /><input class="submit" type="reset" value="取消" /></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div id="footer">Power by <a href="http://www.aircheng.com" target="_blank" style="color:#fff">www.aircheng.com</a> Copyright &copy; 2005-2014</div>
	</div>
</body>
</html>
