<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Internet Dreams</title>
	<link type="text/css" href="<?php echo base_url() ?>stylesheets/screen.css"  rel="stylesheet" media="screen" title="default" />
	<script src="<?php echo base_url() ?>javascripts/jquery.min.js" type="text/javascript"></script>
	<!-- Custom jquery scripts -->
	<script src="<?php echo base_url() ?>javascripts/custom_jquery.js" type="text/javascript"></script>
	<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
	<script src="<?php echo base_url() ?>javascripts/jquery.pngFix.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$(document).pngFix( );
	});
	</script>
</head>
<body id="login-bg">
<!-- Start: login-holder -->
<div id="login-holder">
	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="<?php echo base_url()?>images/shared/logo-trans.png" height="70" alt="" /></a>
	</div>
	<!-- end logo -->
	<div class="clear"></div>
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
<div id="infoMessage"><?php echo $message;?></div>
	<!--  start login-inner -->
	<div id="login-inner">

	 <?php echo form_open("auth/login");?>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username </th>
			<td><?php echo form_input($email,'',"onfocus='this.value=\'\'' class='login-inp'");?><?php echo form_error('$email'); ?></td>
		</tr>
		<tr>
			<th>Password</th>
			<td>
				<?php echo form_input($password,'',"onfocus='this.value=\'\'' class='login-inp'");?></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><?php echo form_checkbox('remember', '1', FALSE,"class='checkbox-size' id='login-check'");?><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
		 <?php echo form_close();?>
	</div>
	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->

	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>