<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
<title>Kolay Kolej - Lock</title>
<!-- start: META -->
<meta charset="utf-8" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- end: META -->
<!-- start: MAIN CSS -->
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=URL?>public/fonts/style.css">
<link rel="stylesheet" href="<?=URL?>public/css/main.css">
<link rel="stylesheet" href="<?=URL?>public/css/main-responsive.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/iCheck/skins/all.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
<link rel="stylesheet" href="<?=URL?>public/css/theme_light.css" type="text/css" id="skin_color">
<link rel="stylesheet" href="<?=URL?>public/css/print.css" type="text/css" media="print"/>
<!--[if IE 7]>
<link rel="stylesheet" href="<?=URL?>public/plugins/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- end: MAIN CSS -->
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="lock-screen">
<div class="main-ls">
  <div class="logo"> KOLAY<i class="clip-clip"></i>KOLEJ </div>
  <div class="box-ls">
    <img alt="" src="<?=URL?>public/images/lock.png"/>
    <div class="user-info">
      <h1><?php echo $_SESSION['user']['first_name']. ' ' .$_SESSION['user']['last_name']; ?></h1>
      <span><?php echo $_SESSION['user']['email']; ?></span> <span><em>Kilidi açmak için şifrenizi girin.</em></span>
      <form action="<?=URL?>screenlock/lock" method="post" autocomplete="off">
        <input type="hidden" name="submit" value="true">
        <div class="input-group">
          <input type="password" name="password" id="password" placeholder="Şifre" class="form-control">
          <span class="input-group-btn">
          <button class="btn btn-blue" type="submit"> <i class="fa fa-chevron-right"></i> </button>
          </span> </div>
        <div class="relogin"> <a href="<?=URL?>screenlock/changeaccount"> Hesap değiştir</a> </div>
      </form>
    </div>
  </div>
  <div class="copyright"> 2014 &copy; kolaykolej. </div>
</div>
<!-- start: MAIN JAVASCRIPTS --> 
<!--[if lt IE 9]>
<script src="<?=URL?>public/plugins/respond.min.js"></script>
<script src="<?=URL?>public/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]--> 
<!--[if gte IE 9]><!--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="<?=URL?>public/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script> 
<script src="<?=URL?>public/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?=URL?>public/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script> 
<script src="<?=URL?>public/plugins/blockUI/jquery.blockUI.js"></script> 
<script src="<?=URL?>public/plugins/iCheck/jquery.icheck.min.js"></script> 
<script src="<?=URL?>public/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script> 
<script src="<?=URL?>public/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script> 
<script src="<?=URL?>public/plugins/less/less-1.5.0.min.js"></script> 
<script src="<?=URL?>public/plugins/jquery-cookie/jquery.cookie.js"></script> 
<script src="<?=URL?>public/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script> 
<script src="<?=URL?>public/js/main.js"></script> 
<!-- end: MAIN JAVASCRIPTS --> 
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --> 
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --> 
<script>
jQuery(document).ready(function() {
	Main.init();
});
</script>
</body>
<!-- end: BODY -->
</html>