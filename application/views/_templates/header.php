<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
<title><?=TITLE?> <?php if ( !empty($this->_title) ) echo(' - ' . $this->_title); ?></title>
<!-- start: META -->
<meta charset="utf-8" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="<?=$this->_desc?>" name="description">
<meta content="kolaykolej.com" name="author">
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
<link rel="stylesheet" href="<?=URL?>public/css/print.css" type="text/css" media="print">
<!--[if IE 7]>
<link rel="stylesheet" href="<?=URL?>public/plugins/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- end: MAIN CSS -->
<link rel="stylesheet" href="<?=URL?>public/plugins/fullcalendar/fullcalendar/fullcalendar.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/DataTables/media/css/DT_bootstrap.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/select2/select2.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css">
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap-modal/css/bootstrap-modal.css">
<link rel="shortcut icon" href="<?=URL?>public/favicon.ico" />

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
<script src="<?=URL?>public/plugins/flot/jquery.flot.js"></script> 
<script src="<?=URL?>public/plugins/flot/jquery.flot.pie.js"></script> 
<script src="<?=URL?>public/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?=URL?>public/plugins/flot/jquery.flot.categories.js"></script>
<script src="<?=URL?>public/js/charts.js"></script>
<script src="<?=URL?>public/plugins/jquery.sparkline/jquery.sparkline.js"></script> 
<script src="<?=URL?>public/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script> 
<script src="<?=URL?>public/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> 
<script src="<?=URL?>public/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script> 
<script src="<?=URL?>public/plugins/select2/select2.min.js"></script>
<script src="<?=URL?>public/plugins/DataTables/media/js/jquery.dataTables.min.js"></script> 
<script src="<?=URL?>public/plugins/DataTables/media/js/DT_bootstrap.js"></script>  
<script src="<?=URL?>public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=URL?>public/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script> 
<script src="<?=URL?>public/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?=URL?>public/plugins/bootstrap-modal/js/bootstrap-modal.js"></script> 
<script src="<?=URL?>public/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script> 
<script src="<?=URL?>public/plugins/ckeditor/ckeditor.js"></script> 
<script src="<?=URL?>public/plugins/ckeditor/adapters/jquery.js"></script> 
<script src="<?=URL?>public/js/table-data.js"></script>
<script src="<?=URL?>public/js/form-elements.js"></script>

<script>
jQuery(document).ready(function() {
	Main.init();
	// Index.init();
	TableData.init();
	FormElements.init();
	Charts.init();
});
</script>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top"> 
  <!-- start: TOP NAVIGATION CONTAINER -->
  <div class="container">
    <div class="navbar-header"> 
      <!-- start: RESPONSIVE MENU TOGGLER -->
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="clip-list-2"></span> </button>
      <!-- end: RESPONSIVE MENU TOGGLER --> 
      <!-- start: LOGO --> 
      <a class="navbar-brand" href="<?=URL?>home"> <img src="<?=URL?>public/images/logo.png" width="145" height="40" alt="Kolaykolej"> </a> 
      <!-- end: LOGO --> 
    </div>
    <div class="navbar-tools"> 
      <!-- start: TOP NAVIGATION MENU -->
      <ul class="nav navbar-right">
        <!-- start: USER DROPDOWN -->
        <li class="dropdown current-user"> <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#"> <img src="<?=URL?>public/images/avatar-1-small.jpg" class="circle-img" alt=""> <span class="username"><?php echo $_SESSION['user']['first_name']. ' ' .$_SESSION['user']['last_name']; ?></span> <i class="clip-chevron-down"></i> </a>
          <ul class="dropdown-menu">
			<?php if ( Secure::hasPermission('user') ) { ?>
            <li> <a href="<?=URL?>user/updateuser/<?php echo $_SESSION['user']['id']; ?>"> <i class="clip-user-3"></i>  Profilim </a> </li>
            <?php } ?>
            <li> <a href="<?=URL?>screenlock/index"><i class="clip-locked"></i> Ekranı Kilitle </a> </li>
            <!-- <li class="divider"></li> -->
            <li> <a href="<?=URL?>login/logout"> <i class="clip-exit"></i> &nbsp;Çıkış </a> </li>
          </ul>
        </li>
        <!-- end: USER DROPDOWN -->
      </ul>
      <!-- end: TOP NAVIGATION MENU --> 
    </div>
  </div>
  <!-- end: TOP NAVIGATION CONTAINER --> 
</div>
<!-- end: HEADER --> 
<!-- start: MAIN CONTAINER -->
<div class="main-container">
  <div class="navbar-content"> 
    <!-- start: SIDEBAR -->
    <div class="main-navigation navbar-collapse collapse"> 
      <!-- start: MAIN MENU TOGGLER BUTTON -->
      <div class="navigation-toggler"> <i class="clip-chevron-left"></i> <i class="clip-chevron-right"></i> </div>
      <!-- end: MAIN MENU TOGGLER BUTTON --> 
      <!-- start: MAIN NAVIGATION MENU -->
      <ul class="main-navigation-menu">
        <li <?php if ( Secure::$route == 'home' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>home"><i class="clip-home-3"></i> <span class="title"> Masaüstü </span><span class="selected"></span> </a> </li>
        <?php if ( Secure::hasPermission('student') ) { ?>
        <li <?php if ( Secure::$route == 'student' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>student"><i class="clip-user"></i> <span class="title"> Öğrenci </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('teacher') ) { ?>
        <li <?php if ( Secure::$route == 'teacher' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>teacher"><i class="clip-user-5"></i> <span class="title"> Öğretmen </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('parents') ) { ?>
        <li <?php if ( Secure::$route == 'parents' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>parents"><i class="clip-users-2"></i> <span class="title"> Veli </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('classroom') ) { ?>
        <li <?php if ( Secure::$route == 'classroom' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>classroom"><i class="clip-study"></i> <span class="title"> Sınıf </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('subject') ) { ?>
        <li <?php if ( Secure::$route == 'subject' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>subject"><i class="clip-book"></i> <span class="title"> Dersler </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('exam') ) { ?>
        <li <?php if ( Secure::$route == 'exam' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>exam"><i class="clip-stack-2"></i> <span class="title"> Sınavlar </span><span class="selected"></span> </a> 
        </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('season') ) { ?>
        <li <?php if ( Secure::$route == 'season' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>season"><i class="clip-calendar"></i> <span class="title"> Sezonlar </span><span class="selected"></span> </a> 
        </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('examgrade') ) { ?>
        <li <?php if ( Secure::$route == 'examgrade' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>examgrade"><i class="clip-checkbox"></i> <span class="title"> Not Sistemi </span><span class="selected"></span> </a> 
        </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('meeting') ) { ?>
        <li <?php if ( Secure::$route == 'meeting' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>meeting"><i class="clip-bubbles-2"></i> <span class="title"> Görüşmeler </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('notice') ) { ?>
        <li <?php if ( Secure::$route == 'notice' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>notice"><i class="clip-bubble-3"></i> <span class="title"> Duyurular </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('user') ) { ?>
        <li <?php if ( Secure::$route == 'user' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>user"><i class="clip-cog-2"></i> <span class="title"> Kullanıcılar </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('usergroup') ) { ?>
        <li <?php if ( Secure::$route == 'usergroup' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>usergroup"><i class="clip-cogs"></i> <span class="title"> Kullanıcı Grupları </span><span class="selected"></span> </a> </li>
        <?php } ?>
        <?php if ( Secure::hasPermission('report') ) { ?>
        <li <?php if ( Secure::$route == 'report' ) { echo 'class="active open"'; } ?>> <a href="javascript:;" class="active"> <i class="clip-folder"></i> <span class="title"> Raporlar </span> <i class="icon-arrow"></i> </a>
          <ul class="sub-menu">
            <li> <a href="javascript:;"> Öğrenci <i class="icon-arrow"></i> </a>
              <ul class="sub-menu">
                <li> <a href="<?=URL?>report/studentlist"> Öğrenci Listesi </a> </li>
                <li> <a href="<?=URL?>report/classlist"> Sınıf Listesi </a> </li>
                <li> <a href="<?=URL?>report/numberofstudent"> Öğrenci Sayıları </a> </li>
                <li> <a href="<?=URL?>report/examresults"> Sınav Sonuçları </a> </li>
                <li> <a href="<?=URL?>report/studentperformance"> Öğrenci Performansı </a> </li>
              </ul>
            </li>
            <li> <a href="javascript:;"> Öğretmen <i class="icon-arrow"></i> </a>
              <ul class="sub-menu">
                <li> <a href="<?=URL?>report/teacherlist"> Öğretmen Listesi </a> </li>
                <li> <a href="#"> Ders Programı </a> </li>
              </ul>
            </li>
            <li> <a href="javascript:;"> Veli <i class="icon-arrow"></i> </a>
              <ul class="sub-menu">
                <li> <a href="<?=URL?>report/parentlist"> Veli Listesi </a> </li>
                <li> <a href="#"> Görüşmeler </a> </li>
              </ul>
            </li>
            <li> <a href="javascript:;"> Finans <i class="icon-arrow"></i> </a>
              <ul class="sub-menu">
                <li> <a href="<?=URL?>report/collectingstatus"> Tahsilat Durumu </a> </li>
                <li> <a href="<?=URL?>report/monthlyendorsement"> Aylık Ciro </a> </li>
              </ul>
            </li>
          </ul>
        </li>
        <?php } ?>
        <li <?php if ( Secure::$route == 'search' ) { echo 'class="active open"'; } ?>> <a href="<?=URL?>search"><i class="clip-search"></i> <span class="title"> Arama </span><span class="selected"></span> </a> </li>
      </ul>
      <!-- end: MAIN NAVIGATION MENU --> 
    </div>
    <!-- end: SIDEBAR --> 
  </div>
  <!-- start: PAGE -->
  <div class="main-content"> 
    <!-- start: PANEL CONFIGURATION MODAL FORM -->
    <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
            <h4 class="modal-title">Panel Configuration</h4>
          </div>
          <div class="modal-body"> Here will be a configuration form </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
            <button type="button" class="btn btn-primary"> Save changes </button>
          </div>
        </div>
        <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container"> 
      <!-- start: PAGE HEADER -->
      <div class="row">
        <div class="col-sm-12">  
          <!-- start: PAGE TITLE & BREADCRUMB -->
          <ol class="breadcrumb">
			<li> <i class="clip-home-3"></i> <a href="<?=URL?>"> Masaüstü </a> </li>
			<?php
			if ( !empty($this->_crumbs) ) {
				foreach ( $this->_crumbs as $key => $value ) {
			?>
            <li><?=$value?></li>
			<?php
            	}
            }
            ?>
            <li class="search-box">
              <form class="sidebar-search" action="<?=URL?>search/index" method="post">
                <div class="form-group">
                  <input type="text" name="key" placeholder="Aramaya Başla...">
                  <button class="submit"> <i class="clip-search-3"></i> </button>
                </div>
              </form>
            </li>
          </ol>
          <div class="page-header">
            <h1><?=$this->_title?> <small><?=$this->_desc?></small></h1>
          </div>
          <!-- end: PAGE TITLE & BREADCRUMB --> 
        </div>
      </div>
      <!-- end: PAGE HEADER --> 
      <!-- start: PAGE CONTENT -->