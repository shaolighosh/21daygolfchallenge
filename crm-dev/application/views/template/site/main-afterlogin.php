<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
      <title>  </title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>public/site/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>public/site/css/swiper.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>public/site/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>public/site/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>public/site/css/bootstrap-datetimepicker.min.css"  rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url();?>public/site/css/aos.css" >
      <link rel="stylesheet" href="<?php echo base_url();?>public/site/css/animate.css" >
      <link href="<?php echo base_url();?>public/site/css/style1.css" rel="stylesheet">
      <link href="<?php echo base_url();?>public/site/css/responsive.css" rel="stylesheet">
       <link href="<?php echo base_url();?>public/site/css/calender.css" rel="stylesheet">
      
   </head>
   <body id="fullscreen" class="fullBodyClick">

      <div id="page">
  
    <!--------------------------- Top MAIN Header ------------------------------->
        <header class="header">    
          <nav class="navbar navbar-toggleable-md navbar-light">
           
            <div class="top-branding-left">
                  <div class="sidebar-toggle"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>              
                  <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>public/site/images/logo.png" alt="logo"></a>
            </div>
          
               
            <button class="navbar-toggler navbar-toggler-right top-right-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
              
                
            <div class="collapse navbar-collapse flex-row-reverse top-right-navbar" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown messages-menu">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success bg-primary">10</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <ul class="dropdown-menu-over list-unstyled">
                      <li class="header-ul text-center">You have 4 messages</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu list-unstyled">
                          <li><!-- start message -->
                          <a href="#">
                            <div class="pull-left">
                              <img src="<?php echo base_url();?>public/site/images/user-img.png" class="rounded-circle  " alt="User Image">
                            </div>
                            <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>                     
                          <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="<?php echo base_url();?>public/site/images/user-img.png" class="rounded-circle " alt="User Image">
                            </div>
                            <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>                      
                      </ul>
                    </li>
                    <li class="footer-ul text-center"><a href="#">See All Messages</a></li>
                  </ul>
                </div>
              </li>
                  
                <li class="nav-item dropdown notifications-menu">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-warning bg-primary">10</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <ul class="dropdown-menu-over list-unstyled">
                    <li class="header-ul text-center">You have 10 notifications</li>
                    <li>
                    
                      <ul class="menu list-unstyled">
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                            page and may cause design problems
                          </a>
                        </li>                      
                      </ul>
                    </li>
                    <li class="footer-ul text-center"><a href="#">View all</a></li>
                  </ul>
                </div>
              </li>
                  
                <li class="nav-item logout">
                    <a href="<?php echo base_url();?>login/logout" class="nav-link dropdown-toggle">Logout</a>   
               </li>   
              
                <li class="nav-item dropdown  user-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo base_url();?>public/site/images/profile-pic.png" class="user-image" alt="User Image" >
                  <span class="hidden-xs">Welcome John!</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Account</a>                
                </div>
              </li>                  
                                 
             </ul>
          </div>
              
              
        </nav>
      </header>
          
          
          
          
      <div class="main">
        <aside class="left-sidebar">            
          <div class="sidebar left">
            <!---<div class="user-panel">
              <div class="pull-left image">
                <img src="<?php echo base_url();?>public/site/images/" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>bootstrap develop</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>-->
              
              
            <ul class="list-sidebar bg-defoult">
                
              <li class="active"> <a href="#"><i class="icon"><img src="<?php echo base_url();?>public/site/images/m-icon1.png" alt=""></i> <span class="nav-label">Dashboard</span></a> </li> 
                
              <!--<li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed" > <i class="fa fa-window-restore" aria-hidden="true"></i> <span class="nav-label"> Projects </span> <span class="fa fa-chevron-down pull-right"></span> </a>
                  <ul class="sub-menu collapse" id="dashboard">
                    <li><a href="#">New Projects</a></li>
                    <li><a href="#">Approved Projects</a></li>
                    <li><a href="#">Completed Projects</a></li>
                    <li><a href="#">Archived Projects</a></li>               
                  </ul>
             </li>-->
                
                <?php 

                  $course = $this->Common_model->getAllDataOrder('course_management',  '','course_name','ASC');
                ?>

            <li> 
                    <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed"><i class="icon"><img src="<?php echo base_url();?>public/site/images/m-icon2.png" alt=""></i> <span class="nav-label">Available Courses</span> <span class="fa fa-chevron-down pull-right"></span></a> 
                    <ul class="sub-menu collapse" id="dashboard">
                        <?php if(!empty($course)){
                          foreach ($course as $courseValue) {
                           
                          ?>

                          <li><a href="<?php echo base_url();?>courses/<?php echo $courseValue->id;?>"><?php echo $courseValue->course_name;?></a></li>

                        <?php } } ?>
                        
                      </ul>
                </li>
                <li class=""> <a href="#"><i class="icon"><img src="<?php echo base_url();?>public/site/images/m-icon3.png" alt=""></i> <span class="nav-label">Pending Courses</span></a> </li>
                <li class=""> <a href="#"><i class="icon"><img src="<?php echo base_url();?>public/site/images/m-icon4.png" alt=""></i> <span class="nav-label">Training Reports</span></a> </li>
            <li class=""> <a href="<?php echo base_url();?>settings"><i class="icon"><img src="<?php echo base_url();?>public/site/images/m-icon5.png" alt=""></i> <span class="nav-label">Settings</span></a> </li>
        </ul>
    </div>                                
         </aside>

   
          


      <?php echo $content;?>


       <!-- / page -->
       
            </div> <!-- Page -->
        
                 
                 
       </div>  <!-- Main -->
      
      <!-- / page -->
      <script src="<?php echo base_url();?>public/site/js/jquery.min.js"></script> 
      <script src="<?php echo base_url();?>public/site/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>public/site/js/swiper.min.js"></script>
      <script src="<?php echo base_url();?>public/site/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo base_url();?>public/site/js/moment.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>public/site/js/aos.js"></script>
      <script src="<?php echo base_url();?>public/site/js/jquery.easing.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="<?php echo base_url();?>public/site/js/custom.js"></script>
      <script src="<?php echo base_url();?>public/site/js/jquery.fullscreen.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
       
      
       
       
       <!---sidebar script---->
      <script>



      window.onload = maxWindow;

          function maxWindow() {

           // alert("aaaaaaa");
              window.moveTo(0, 0);

              if (document.all) {
                  top.window.resizeTo(screen.availWidth, screen.availHeight);
              }

              else if (document.layers || document.getElementById) {
                  if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                      top.window.outerHeight = screen.availHeight;
                      top.window.outerWidth = screen.availWidth;
                  }
              }
          }

        $(document).ready(function(){


         /* $(document).keydown(function(e){
            var key = e.charCode || e.keyCode;
            if (key == 27) { 
              // enter key do nothing
            } else {
              e.preventDefault();
            }    
          });*/
          $('.startVideo').click(function() {

            const element = document.getElementById("videoPlayer");
            element.play();
            $('#fullscreen').fullscreen();
            return false;
          });


          
          <?php if($this->uri->segment(1) == 'dashboard'){?>

            $('.fullBodyClick').click(function(){
                 $('#fullscreen').fullscreen();
             });


            $( ".fullBodyClick" ).trigger( "click" );


          <?php } ?>

            

           




   $('.button-left').click(function(){
       $('.sidebar').toggleClass('fliph');
   });
     
});
      </script> 
       
       
       <?php if($this->uri->segment(2) == 'start'){?>
     
     <script type="text/javascript">
              
              $(document).ready(function(){


                    let videoSource = new Array();
                    videoSource[0] = 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4';
                    videoSource[1] = 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4';
                    let i = 0; // global
                    const videoCount = videoSource.length;
                    const element = document.getElementById("videoPlayer");
                     
                    function videoPlay(videoNum) {
                        element.setAttribute("src", videoSource[videoNum]);
                        element.autoplay = true;
                        element.load();
                        element.play();
                    }
                    document.getElementById('videoPlayer').addEventListener('ended', myHandler, false);
                     
                    videoPlay(0); // play the video
                     
                    function myHandler() {
                        i++;
                        if (i == videoCount) {
                            i = 0;
                            videoPlay(i);
                        } else {
                            videoPlay(i);
                        }
                    }

                      /*var video_count =1;
                      var videoPlayer = document.getElementById("episodeVideo");


                      function run(){
                            video_count++;
                            if (video_count == 4) video_count = 1;
                            var nextVideo = "http://localhost/training/public/uploads/module/sample-mp4-file.mp4";
                            videoPlayer.src = nextVideo;
                            videoPlayer.play();
                       };*/

               

              });
              


          </script>
        
          <?php } ?>
       
       
       
       
       
   </body>
</html>
