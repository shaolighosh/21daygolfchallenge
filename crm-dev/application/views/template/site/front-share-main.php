<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Days Golf Challenge</title>
      <link rel="icon" href="<?php echo base_url();?>public/assets/img/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/slick.css">
      <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/style-dashborad.css">
      
      <!-- <script src="<?php echo base_url();?>public/assets/js/checkout.js" defer></script> -->
   </head>
   <body>
    <header class="page-header">
      <div class="container-header">
          <div class="header-wrap">
              <div class="logo">
                  <a href="index.html"><img src="<?php echo base_url();?>public/assets/img/logo.png" alt="Keyhouse" class="img-responsive"></a>
              </div>
              <div class="header-right">
                  <nav class="nav-primary">
                      <ul>                                     
                      <li class="active"><a href="https://developer.marketingplatform.ca/GolfersU/" target="_blank">Home</a></li>
                    <!--<li><a href="#">Products</a> 
                      <ul class="nav-dropdown"> 
                        <li> <a href="#">Solar</a></li>
                        <li> <a href="#">Roofing</a></li>
                        <li> <a href="#">Painting</a></li>
                        <li> <a href="#">Windows</a></li>
                        <li> <a href="#">Landscaping</a></li>
                        <li> <a href="#">Patio Covers</a></li>
                      </ul>
                    </li>-->
                    <li><a href="#">About</a></li> 
                    <li><a href="#">Program</a> </li>
                      <li><a href="#">Testimonials</a> </li>
                      <li><a href="#">Sponsors</a> </li>
                      <li><a href="#">Contact Us</a> </li>
                      
                      </ul>
                  </nav>
                  <div class="header-right__button">
                    <ul>
                        <li><a href="#"><img src="<?php echo base_url();?>public/assets/img/login-icon.png" alt=""> Login / Register</a></li>
                        <!-- <li><a href="#"><img src="<?php echo base_url();?>public/assets/img/join-icon.png" alt="">  Join the masterclass</a></li> -->
                    </ul>
                  </div>
                  
                  <div class="toggle-menu hidden-lg">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </div>
          </div>
      </div>
    </header>

<?php echo $content;?>

 <footer>
        <div class="footer-bg"><img src="<?php echo base_url();?>public/assets/img/footer-bg.png" alt=""></div>
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-info">
                    <img src="<?php echo base_url();?>public/assets/img/footer-logo.png" alt="">
                    <p>
                        Magna etiam tempor orci eu lobortis. A cras semper auctor neque. Porta lorem mollis aliquam ut porttitor leo. Amet tellus cras adipiscing enim. Congue mauris rhoncus aenean vel. Quis imperdiet massa tincidunt nunc pulvinar.<br><br>
                        Venenatis tellus in metus vulputate eu. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor.
                    </p>
                </div>
                <div class="footer-right">
                    <div class="footer-link">
                        <h3>Let Us Help You</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">User Terms</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="footer-link">
                        <h3>Useful Info</h3>
                        <ul>
                            <li><a href="#">Join the Masterclass</a>
                            <li><a href="#">Visit Our Partners</a>
                            <li><a href="#">Update Account</a>
    
                        </ul>
                    </div>
                    <div class="footer-link">
                        <h3>Download App</h3>
                        <div class="app_img"><img src="<?php echo base_url();?>public/assets/img/gooapp.png" alt=""></div>
                        <div class="app_img"><img src="<?php echo base_url();?>public/assets/img/Appstore.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; logohere 2023 - All Rights Reserved
            </div>
        </div>

    </footer>


    
    

    
      <script src="<?php echo base_url();?>public/assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>public/assets/js/slick.min.js"></script>
      <script src="<?php echo base_url();?>public/assets/js/custom.js"></script>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
$(function() {

     $(".externalvote").click(function() {
        var ref = $(this).closest('.externamShare');
        var videoId = $('input[name="external_video_id"]',ref).val();
        

         $.ajax({
            url: '<?php echo site_url();?>/ajax/addUserVoteExternal', // <-- point to server-side PHP script 
            data: {video_id:videoId},                         
            type: 'post',
            
            success: function(resultData){
                var result = JSON.parse(resultData);
                if(result.status == true){

                    $('.externalvote',ref).prop('disabled', true);
                     $.alert({
                        title: 'Alert!',
                        content: result.message,
                    });
                }
                else{
                    $.alert({
                        title: 'Alert!',
                        content: result.message,
                    });
                }
                // console.log("Save Complete"+result.status);
                // alert("videoId");
            }
        });
    });
     
});
</script>
   </body>
</html>
