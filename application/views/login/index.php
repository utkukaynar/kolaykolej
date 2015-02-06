<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
<title>Kolay Kolej - Login</title>
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
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="login example2">
<div class="main-login col-sm-4 col-sm-offset-4">
  <div class="logo"> <img src="<?=URL?>public/images/logo-big.png" width="200" height="55" alt="Kolaykolej"> </div>
  <!-- start: LOGIN BOX -->
  <div class="box-login">
    <h3>Oturum açın</h3>
    <p> Kullanıcı Adı ve Şifrenizi girin </p>
    <form class="form-login" action="<?=URL?>login/access" method="post" autocomplete="off">
      <input type="hidden" name="submit" value="true">
      <div class="errorHandler alert alert-danger no-display"> <i class="fa fa-remove-sign"></i> Lütfen formu kontrol edin. </div>
      <fieldset>
        <div class="form-group"> <span class="input-icon">
          <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı">
          <i class="fa fa-user"></i> </span> </div>
        <div class="form-group form-actions"> <span class="input-icon">
          <input type="password" class="form-control password" name="password" placeholder="Şifre">
          <i class="fa fa-lock"></i> <!-- <a class="forgot" href="#"> Şifremi unuttum </a> --> </span> </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary pull-right"> Giriş <i class="fa fa-arrow-circle-right"></i> </button>
        </div>
        <div class="new-account"> Henüz bir hesabınız yok mu? <a href="#" class="register"> Bir hesap oluşturun </a> </div>
      </fieldset>
    </form>
  </div>
  <!-- end: LOGIN BOX --> 
  <!-- start: FORGOT BOX -->
  <div class="box-forgot">
    <h3>Şifrenizimi Unuttunuz?</h3>
    <p> Şifrenizi sıfırlamak için aşağıya e-posta adresinizi girin. </p>
    <form class="form-forgot">
      <div class="errorHandler alert alert-danger no-display"> <i class="fa fa-remove-sign"></i> Lütfen formu kontrol edin. </div>
      <fieldset>
        <div class="form-group"> <span class="input-icon">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <i class="fa fa-envelope"></i> </span> </div>
        <div class="form-actions"> <a class="btn btn-light-grey go-back"> <i class="fa fa-circle-arrow-left"></i> Geri Dön </a>
          <button type="submit" class="btn btn-primary pull-right"> Gönder <i class="fa fa-arrow-circle-right"></i> </button>
        </div>
      </fieldset>
    </form>
  </div>
  <!-- end: FORGOT BOX --> 
  <!-- start: REGISTER BOX -->
  <div class="box-register">
    <h3>Kayıt Ol</h3>
    <p> Kişisel Bilgileriniz: </p>
    <form class="form-register">
      <div class="errorHandler alert alert-danger no-display"> <i class="fa fa-remove-sign"></i> Lütfen formu kontrol edin. </div>
      <fieldset>
        <div class="form-group">
          <input type="text" class="form-control" name="first_name" placeholder="Adınız">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="last_name" placeholder="Soyadınız">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <p> Hesap Bilgileriniz: </p>
        <div class="form-group"> <span class="input-icon">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <i class="fa fa-user"></i> </span> </div>
        <div class="form-group"> <span class="input-icon">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <i class="fa fa-lock"></i> </span> </div>
        <div class="form-group"> <span class="input-icon">
          <input type="password" class="form-control" name="password_again" placeholder="Password Again">
          <i class="fa fa-lock"></i> </span> </div>
        <div class="form-actions"> <a class="btn btn-light-grey go-back"> <i class="fa fa-circle-arrow-left"></i> Geri Dön </a>
          <button type="submit" class="btn btn-primary pull-right"> Gönder <i class="fa fa-arrow-circle-right"></i> </button>
        </div>
      </fieldset>
    </form>
  </div>
  <!-- end: REGISTER BOX --> 
  <!-- start: COPYRIGHT -->
  <div class="copyright"> 2014 &copy; kolaykolej. </div>
  <!-- end: COPYRIGHT --> 
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
<script src="<?=URL?>public/plugins/jquery-validation/dist/jquery.validate.min.js"></script> 
<script src="<?=URL?>public/js/login.js"></script> 
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --> 
<script>
jQuery(document).ready(function() {
	Main.init();
	Login.init();
});
</script>
</body>
<!-- end: BODY -->
</html>