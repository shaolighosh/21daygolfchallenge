<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>GolfersU</title>
  <link rel="shortcut icon" type="" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png"/>
  <!-- Bootstrap -->
  <link href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
  <!-- Custom css -->
  <link href="<?php echo get_template_directory_uri();?>/assets/css/custom.css" rel="stylesheet">
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.carousel.min.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.theme.default.min.css" rel="stylesheet" media="all">
  <?php wp_head();?>

</head>
<body>

<div class="wrapper">  

 <!-- <div class="circle"></div>
  <div class="circle-follow"></div>-->

  <!-- Tab header with menus -->
  <div class="tab-menu">
    <div class="container">
      <div class="menu-and-btn">
        <span><a href="index.html"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png"></a></span>
        <span class="menu-btn"><i class="las la-bars"></i></span>
      </div>
    </div>
  </div>
  <div class="menu-outer"></div>
  <div class="side-menu">
    <div class="menu-header">
      <a class="close-menu" href="javascript:void(0)"><i class="las la-times"></i></a>
    </div>
    <div class="menu-body">
      <ul>
        <li><a href="<?php bloginfo('url');?>">Home</a></li>
        <li class="main-submenu">
          <p>Programs <i class="las la-angle-down arw-down"></i></p>
          <ul class="sub-menus">
            <li><a href="#">Programs sub menu</a></li>
            <li><a href="#">Programs sub menu</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li><a href="#">Community</a></li>
        <li><a href="<?php bloginfo('url');?>/sponsership">Sponsors</a></li>
        <!-- <li><a href="<?php bloginfo('url');?>/register/">Pricing</a></li> -->
        <li><a  target="_blank"  href="https://www.golfersu.com/about">About Us</a></li>
        <!-- <li><a href="<?php bloginfo('url');?>/contact/">Contact Us</a></li> -->
        <li><a href="<?php bloginfo('url');?>/crm-dev/index.php/login">Login</a></li>
        <li><a href="<?php bloginfo('url');?>/crm-dev/index.php/signup">Register</a></li>
      </ul>
    </div>
  </div>
  <!-- Tab header with menus -->


  <!-- desktop-header -->
  <header class="main-header">
    <div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url');?>"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="" class="img-responsive"></a>
          </div>
          <div id="navbar1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="#"><a href="<?php bloginfo('url');?>">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programs <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php bloginfo('url');?>/21-day-challenge/">21 Day Challenge</a></li>
                  <li><a href="<?php bloginfo('url');?>/video-library">Video Library</a></li>
                  <li><a href="<?php bloginfo('url');?>/get-in-the-zone/">Get In The Zone</a></li>
                  <li><a href="<?php bloginfo('url');?>/swing-analysis/">Swing Analysis</a></li>
                  
                </ul>
              </li>
            <!--  <li><a href="#">Community</a></li>-->
              <li><a href="<?php bloginfo('url');?>/sponsership">Sponsors</a></li>
              <!-- <li><a href="<?php bloginfo('url');?>/register/">Pricing</a></li> -->
              <li><a target="_blank" href="https://www.golfersu.com/about">About Us</a></li>
              <!-- <li><a href="<?php bloginfo('url');?>/contact/">Contact Us</a></li> -->

              <li><a href="<?php bloginfo('url');?>/crm-dev/index.php/login" class="login-btn">Login</a></li>
              <li><a href="<?php bloginfo('url');?>/crm-dev/index.php/signup" class="register-btn">Register</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- desktop-header -->