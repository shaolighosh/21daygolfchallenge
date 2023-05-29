<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>public/assets/img/favicon.png" type="image/x-icon" />
    <title>21 Day Challenge Masterclass</title>
    <link href="<?php echo base_url();?>public/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/assets/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/assets/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="<?php echo base_url();?>public/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- font-family: 'Bebas Neue', cursive; -->
    
</head>

<body>
        <!--top header -->
    <header class="top-header-section">
        <!-- nav -->
        <div class="nav-section-header">
            <div class="nav-section-nav-all">
                <div class="navbar-toggler__logo">
                    <div class="nav-section-logo">
                        <a href="https://21daygolfchallenge.com/"><img src="<?php echo base_url();?>public/assets/img/logo.png"></a>
                    </div>
                    <!-- <div class="toggle-btn toggle__none-mobile">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div> -->
                </div>
                <div class="menu-user">
                    <div class="menu-user__img"><img src="<?php echo base_url();?>public/assets/img/menu-user.png" alt=""></div>
                    <div class="menu-user-wrapper">
                        <div class="menu-user-img"><img src="<?php echo base_url();?>public/assets/img/menu-user-img.png" alt=""></div>
                        <div class="menu-user-con">
                            <h2>John Doe </h2>
                        </div>
                    </div>
                </div>
                
                <div class="nav-section-nav">
                    <ul>
                    <li><a href="<?php echo site_url();?>/admin/dashboard" <?php if($this->uri->segment(2) == 'dashboard' ){?> class="active" <?php }?> ><img src="<?php echo base_url();?>public/assets/img/menu1.png" alt=""> <span>Dashboard</span></a></li>

                    <?php if($this->session->userdata('student_manage') == 'Y'){?>
                    <li><a <?php if($this->uri->segment(2) == 'user-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/user-management"><img src="<?php echo base_url();?>public/assets/img/menu1.png" alt=""> <span>Student Management</span></a></li>
                     <?php }?>

                     <?php if($this->session->userdata('media_manage') == 'Y'){?>

                    <li><a <?php if($this->uri->segment(2) == 'media-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/media-management"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Media management</span></a></li>
                    <?php }?>
                    <?php if($this->session->userdata('video_manage') == 'Y'){?>


                        <li><a <?php if($this->uri->segment(2) == 'course-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/course-management"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Course Management</span></a></li>

                         <li><a <?php if($this->uri->segment(2) == 'video-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/video-management"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Module Management</span></a></li>

                         <!-- <li>
                            <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-list-ul" aria-hidden="true"></i> Course Management</a>
                            <ul class="collapse list-unstyled" id="ordersSubmenu">
                                <li>
                                   

                                <a href="#ordersSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-list-ul" aria-hidden="true"></i>21-Day Challenge Masterclass</a>
                                <ul class="collapse list-unstyled" id="ordersSubmenu1">
                                    
                                    <li>
                                        <a href="<?php echo site_url();?>/admin/intro-content"><i class="fa fa-chevron-right" aria-hidden="true"></i>21-Day Challenge Intro </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=1"><i class="fa fa-chevron-right" aria-hidden="true"></i>Step 1</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 2</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=3"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 3</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=4"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 4</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=5"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 5</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=6"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 6</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url();?>/admin/video-management?step=7"><i class="fa fa-chevron-right" aria-hidden="true"></i> Step 7</a>
                                    </li>

                                    

                                </ul>



                                </li> -->
                               <!--  <li>
                                    <a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Group Management</a>
                                </li> -->
                            <!-- </ul>
                        </li> -->


                   <!--  <li><a <?php if($this->uri->segment(2) == 'video-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/video-management"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Video Resource management</span></a></li> -->
                    <?php }?>

                    <!-- <li><a <?php if($this->uri->segment(2) == 'progress_management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/progress_management"><img src="<?php echo base_url();?>public/assets/img/menu2.png" alt=""> <span>Progress Management</span></a></li> -->
                       <!--  <li><a href="#" ><img src="<?php echo base_url();?>public/assets/img/menu1.png" alt=""> <span>FAQ Management</span></a></li> -->
                       
                       
                       <!--  <li><a <?php if($this->uri->segment(2) == 'voting-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/voting-management"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Voting management</span></a></li> -->
                       <?php if($this->session->userdata('promo_manage') == 'Y'){?>
                        <li><a <?php if($this->uri->segment(2) == 'promo-code' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/promo-code"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Promo management</span></a></li>
                        <?php }?>
                        <?php if($this->session->userdata('user_manage') == 'Y'){?>
                         <li><a <?php if($this->uri->segment(2) == 'admin-user' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/admin-user"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Users</span></a></li>
                         <?php }?>

                         <?php if($this->session->userdata('payment_manage') == 'Y'){?>
                         <li><a <?php if($this->uri->segment(2) == 'payment-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/payment-management"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Subscription Management</span></a></li>
                         <?php }?>

                          <li><a <?php if($this->uri->segment(2) == 'revenue-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/revenue-management"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Revenue and Subscription Metrics</span></a></li>

                          <li>
                            <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-list-ul" aria-hidden="true"></i> Customer Support</a>
                            <ul class="collapse list-unstyled" id="ordersSubmenu">
                                

                          <li><a <?php if($this->uri->segment(2) == 'faq' ){?> class="active" <?php }?> href="<?php echo site_url();?>/admin/faq"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Faq</span></a></li>

                             </ul>
                         </li>

                          


                      <!--   <li><a href="#"><img src="<?php echo base_url();?>public/assets/img/menu5.png" alt=""> <span>Mental Imagery Video</span></a></li> -->
                    <!--     <li><a href="#"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Level management</span></a></li> -->
                        <!--<li><a href="#"><img src="<?php echo base_url();?>public/assets/img/menu6.png" alt=""> <span>Settings</span></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!--end nav -->
    </header>
    <section class="content-section-header">
    <div class="content-section-wrap">
            <!-- content -->
        <div class="content-section-header-top">
            <div class="sub-content-section-header-top2">
                <div class="toggle-btn toggle__none">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="three"></div>
                </div>
                <h1 class="page__titel"><span>21 Day </span> Challenge Masterclass</h1>
            </div>
            <div class="sub-content-section-header-top">
                <div class="avtar_info">
                    <div><img src="<?php echo base_url();?>public/assets/img/menu-user-img.png"></div>
                    <p>John Doe</p>
                    <div class="drop-down-avtar">
                        <ul>
                          <!--   <li><a href="#">Change Password</a></li> -->
                          <!--   <li><a href="my-profile.html">My Profile</a></li> -->
                            <li><a href="<?php echo site_url(); ?>/admin/login/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>

<main id="main" class="main">
<?php echo $content;?>
</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/custom.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '559458359603984',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v16.0'
    });
  };
</script>
<script src="https://platform.twitter.com/widgets.js"></script>

  <script>
//   tinymce.init({
//   selector: 'textarea#short_description',
//   height: 500,
//   plugins: [
//     'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
//     'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
//     'insertdatetime', 'media', 'table', 'help', 'wordcount'
//   ],
//   toolbar: 'undo redo | blocks | ' +
//   'bold italic backcolor | alignleft aligncenter ' +
//   'alignright alignjustify | bullist numlist outdent indent | ' +
//   'removeformat | help',
//   content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
// });
// tinymce.init({
//   selector: 'textarea#description',
//   height: 500,
//   plugins: [
//     'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
//     'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
//     'insertdatetime', 'media', 'table', 'help', 'wordcount'
//   ],
//   toolbar: 'undo redo | blocks | ' +
//   'bold italic backcolor | alignleft aligncenter ' +
//   'alignright alignjustify | bullist numlist outdent indent | ' +
//   'removeformat | help',
//   content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
// });

$(document).ready(function() {

    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

$(".twitterBtnDetails").click(function() {

        var ref = $(this).closest('.card');
        var user_id = $('input[name="user_id"]',ref).val();
        var videoId = $('input[name="video_id"]',ref).val();
        var videoUrl = "<?php echo site_url();?>/user-video-share/"+user_id+"/"+videoId;
        var url = "http://google.com";
        var text = "21 Day Challenge Masterclass";
        window.open('http://twitter.com/share?url='+encodeURIComponent(videoUrl)+'&text='+encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');


    });

    $(".shareBtn").click(function() {

            
             var ref = $(this).closest('.card');
            var user_id = $('input[name="user_id"]',ref).val();
            var videoId = $('input[name="video_id"]',ref).val();
            var videoUrl = "<?php echo site_url();?>/user-video-share/"+user_id+"/"+videoId;
            
            if(videoUrl != ''){
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: videoUrl,
                }, function(response){

                   // alert(response);
                    console.log(response);

                });
            }
            

        });

        });
  </script>
</body>

</html>