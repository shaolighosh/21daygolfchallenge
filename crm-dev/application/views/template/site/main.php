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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="<?php echo base_url();?>public/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/assets/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/assets/css/slick-theme.css" rel="stylesheet">
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

                        <?php if($this->Common_model->getValue('golfersu_user','user_image', array('id' => $this->session->userdata('user_id'))) != ''){?>
                    <div class="menu-user-img"><img style="width: 56px;height: 56px;" src="<?php echo base_url();?><?php echo  $this->Common_model->getValue('golfersu_user','user_image', array('id' => $this->session->userdata('user_id')));?>"></div>
                <?php }else{?>
                    <div class="menu-user-img"><img style="width: 56px;height: 56px;" src="<?php echo base_url();?>public/assets/img/logo.png"></div>
                <?php } ?>

                        <!-- <div class="menu-user-img"><img src="<?php echo base_url();?>public/assets/img/menu-user-img.png" alt=""></div> -->

                        <?php $userDetails = $this->Common_model->getSingle('golfersu_user',array('id' => $this->session->userdata('user_id')));?>
                        <div class="menu-user-con">
                            <h2><?php echo $this->Common_model->getValue('golfersu_user','name', array('id' => $this->session->userdata('user_id')));?> <span><?php echo $userDetails->city;?>, <?php echo $this->Common_model->getValue('golfersu_signup_countries','country_name', array('id' => $userDetails->country_id));?></span></h2>
                            

                            <h2><span class="rewardPoints">
                            <?php 

                           $rewardData =  $this->Common_model->dbQuery("SELECT SUM(`reward_point`) AS reward FROM golfersu_user_rewards where user_id = '".$this->session->userdata('user_id')."'");
                           
                            ?>
                            Reward Point <?php if($rewardData[0]->reward == '') { echo 0;} else{ echo $rewardData[0]->reward;}?></span></h2>
                           <span class="userProgress"> 
                                <?php if($rewardData[0]->reward == '') { 
                                    echo 0;
                                } 
                                elseif($rewardData[0]->reward >= 50){
                                    ?>
                                    <progress max="100" value="25"></progress>
                                    <?php 
                                }
                                elseif($rewardData[0]->reward >= 100){
                                    ?>
                                    <progress max="100" value="50"></progress>
                                    <?php 
                                }
                                elseif($rewardData[0]->reward >= 150){
                                    ?>
                                    <progress max="100" value="100"></progress>
                                    <?php 
                                }
                                else{ 
                                    //echo $rewardData[0]->reward;
                                }
                            ?>
                            
                            <span>
                        
                        </div>
                    </div>
                </div>
                <div class="nav-section-nav">
                    <ul>
                        <li><a href="<?php echo site_url();?>/challenge"  <?php if($this->uri->segment(1) == 'challenge' ){?> class="active" <?php }?> ><img src="<?php echo base_url();?>public/assets/img/menu1.png" alt=""> <span>Course Outline</span></a></li>
                        <li><a <?php if($this->uri->segment(1) == 'progress-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/progress-management"><img src="<?php echo base_url();?>public/assets/img/menu2.png" alt=""> <span>Progress Tracker</span></a></li>
                        <!-- <li><a <?php if($this->uri->segment(1) == 'internal-community' ){?> class="active" <?php }?> href="<?php echo site_url();?>/internal-community"><img src="<?php echo base_url();?>public/assets/img/menu2.png" alt=""> <span>Internal Community</span></a></li> -->
                        <li><a <?php if($this->uri->segment(1) == 'media-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/media-management"><img src="<?php echo base_url();?>public/assets/img/menu3.png" alt=""> <span>Media management</span></a></li>
                        <!-- <li><a <?php if($this->uri->segment(1) == 'voting-management' ){?> class="active" <?php }?> href="<?php echo site_url();?>/voting-management"><img src="<?php echo base_url();?>public/assets/img/menu4.png" alt=""> <span>Voting management</span></a></li> -->
                        <!-- <li><a href="<?php echo site_url();?>/mental-imagery"><img src="<?php echo base_url();?>public/assets/img/menu5.png" alt=""> <span>Mental Imagery</span></a></li> -->
                        <li><a <?php if($this->uri->segment(1) == 'settings' ){?> class="active" <?php }?> href="<?php echo site_url();?>/settings"><img src="<?php echo base_url();?>public/assets/img/menu6.png" alt=""> <span>Account Settings</span></a></li>

                        <li><a <?php if($this->uri->segment(1) == 'faq' ){?> class="active" <?php }?> href="<?php echo site_url();?>/faq"><img src="<?php echo base_url();?>public/assets/img/menu6.png" alt=""> <span>FAQ</span></a></li>



                    </ul>
                </div>
            </div>
        </div>
        <!--end nav -->
    </header>
     <section class="content-section-header">
     <div class="content-section-wrap">
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
                    <?php if($this->Common_model->getValue('golfersu_user','user_image', array('id' => $this->session->userdata('user_id'))) != ''){?>
                    <div><img src="<?php echo base_url();?><?php echo  $this->Common_model->getValue('golfersu_user','user_image', array('id' => $this->session->userdata('user_id')));?>"></div>
                <?php } else{?>
                    <div><img src="<?php echo base_url();?>public/assets/img/logo.png"></div>
                    
                <?php }?>
                    <p><?php echo $this->Common_model->getValue('golfersu_user','name', array('id' => $this->session->userdata('user_id')));?></p>
                    <div class="drop-down-avtar">
                        <ul>
                            <!-- <li><a href="#">Change Password</a></li> -->
                            <li><a href="<?php echo site_url(); ?>/rewards">Rewards Program</a></li>
                            <li><a href="<?php echo site_url(); ?>/login/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
<?php echo $content;?>
</div>
<div class="copyright">© GolfersU <?php echo date('Y'); ?> - All Rights Reserved.</div> 
<div id="dialog" title="" style="display:none;" class="custom-popup alertmessage">
 <!--  <p><b>Congratulations on completing Step <span class="stepDialog"></span> of the 21-day Challenge Masterclass!</b><br>

Share your progress and inspire fellow golfers in our Facebook group. Join the group <a target="_blank" href="https://www.facebook.com/people/GolfersU/100067556422697/">here</a> and post your learning video using #GolfersUChallenge.<br>

Engage with the community, ask questions, and provide support to fellow golfers on their improvement journey.<br>

Feel free to share your achievements on other social media platforms using #GolfersUChallenge.<br>

Thank you for your commitment to the 21-day Challenge Masterclass! Click 'Next' to proceed.</p> -->
<!-- <p>Congratulations on completing this Step of the 21-day Challenge Masterclass! Share your progress and inspire fellow golfers in our Facebook group. Join the group here and post your learning video using #GolfersUChallenge. Engage with the community, ask questions, and provide support to fellow golfers on their improvement journey.</p>

<p>We value your privacy and convenience. As part of our commitment to providing a comprehensive learning experience, we offer multiple options for showcasing your swing videos:</p>
<p>Option 1: Share in GolfersU Facebook Group Share your swing video in our GolfersU Facebook group using #GolfersUChallenge. By doing so, you'll inspire others, engage with fellow golfers, and have the chance to earn points and rewards. These points can be redeemed for discounts, free lessons, and other exciting experiences. Plus, every vote your video receives will bring you closer to unlocking exclusive rewards!</p>
<p>Option 2: Share with Friends and Family Share your swing video with your friends and family on your personal social media accounts. Not only will you gain their support and encouragement, but you can also refer them to the 21-day Challenge Masterclass. When they sign up using your unique referral code, both you and your friend will receive a discount on future courses or even free lessons.</p>

<p>Option 3: Keep it Private on GolfersU If you prefer to keep your videos private or have them easily accessible within the course environment, you can choose to upload and store your swing videos securely on our site. Simply click the checkbox below, and you'll be directed to an image with an "Upload Here" button. By choosing this option, you can conveniently access and review your swing videos anytime during your subscription period.</p>
<p>[Checkbox] Yes, I'd like GolfersU to host my swing videos for privacy and convenience. Please provide instructions for uploading them.</p>
<p>Thank you for your commitment to the 21-day Challenge Masterclass! Click 'Next' to proceed.</p> -->


<!-- <p>Congratulations on completing the step <span class="stepDialog"></span> in the 21-Day Challenge Masterclass! Share your video showcasing your performance of the completed step and inspire fellow golfers in our GolfersU community. Engage, ask questions, and support others on their improvement journey.</p> -->

<p>Congratulations on completing Step <span class="stepDialog"></span> of the 21-Day Challenge Masterclass! Share your progress and inspire fellow golfers in our GolfersU Facebook Group.Join the group here  <a target="_blank" href="https://www.facebook.com/groups/golfersu">https://www.facebook.com/groups/golfersu</a>  and post your learning video using #GolfersUChallenge. Engage with the community, ask questions, and provide support to fellow golfers on their improvement journey.</p>
<p>Choose how you'd like to showcase your swing videos:</p>
<p>1. Share in the GolfersU Community: Inspire others, earn points, and receive rewards by sharing your videos of the completed step in our community. Join the conversation and support fellow golfers.</p>
<p>2. Keep Your Videos Private: If you prefer privacy or easy access within the course, securely upload and store your swing videos on GolfersU. You'll still earn points and rewards.</p>
<p>Thank you for your commitment to the 21-Day Challenge Masterclass! Click 'Next' to proceed.</p>




</div>

<div class="toast">
  <div class="toast-header">
    Toast Header
  </div>
  <div class="toast-body">
    Some text inside the toast body
  </div>
</div>

</section>
 <script src="<?php echo base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/custom-challenge.js"></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script src="https://platform.twitter.com/widgets.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>


twttr.events.bind('tweet' , function(event) {
  // do somethings here
alert("Tweet has been successfully posted");
});
</script>
<script>
// document.getElementById('shareBtn').onclick = function() {
//   FB.ui({
//     display: 'popup',
//     method: 'share',
//     href: 'https://developer.marketingplatform.ca/',
//   }, function(response){});
// }
</script>
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
<script>

$(document).ready(function() {

        <?php 
        $notificationData = $this->Common_model->getAllData('golfersu_progress', array('user_id' => $this->session->userdata('user_id'),'video_url' => ''));
        if(!empty($notificationData)){
            foreach($notificationData as $notify){
                ?>
                 $.toast({
                        heading: '',
                        position: 'mid-center',
                        text: [
                            'Forgot to upload a video in Step <?php echo $notify->step_id;?>? ',
                            'Upload the video now and earn rewards.',
                        ],
                        icon: 'info',
                        hideAfter: false,
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600', 
                    });


                
                <?php 
            }
        }?>

$(".removeVideo").click(function() {
    var ref = $(this).closest('.file-upload-progressbar');
    var videoId = $('input[name="delete_video_id"]',ref).val();
    $.ajax({
        url: '<?php echo site_url();?>/ajax/delete_video',
        data: {video_id:videoId},                         
        type: 'post',
        success: function(resultData){
            var result = JSON.parse(resultData);
            if(result.status == true){

                    $(ref).remove();
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
        }
    });




});

 $(".shareInternal").click(function() {


    var ref = $(this).closest('fieldset');
    var step = $('input[name="step"]',ref).val();

    $.confirm({
        title: '',
        content: 'Do you like to Share your video into internal community?',
        buttons: {
            yes: function () {

                 $.ajax({
                    url: '<?php echo site_url();?>/ajax/internal_share',
                    data: {step_id:step},                         
                    type: 'post',
                    success: function(resultData){
                        var result = JSON.parse(resultData);
                        if(result.status == true){

                                
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
                    }
                });             
            },
            no: function () {
               
            },
            
        }
    });


});



    $(".voteUser").click(function() {
        var ref = $(this).closest('.custom-card');
        var videoId = $('input[name="share_video_id"]',ref).val();
        

         $.ajax({
            url: '<?php echo site_url();?>/ajax/addUserVote', // <-- point to server-side PHP script 
            data: {video_id:videoId},                         
            type: 'post',
            
            success: function(resultData){
                var result = JSON.parse(resultData);
                if(result.status == true){
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
    
    $(".twitterBtn").click(function() {

         $.ajax({
            url: '<?php echo site_url();?>/ajax/addRewardsPoint', // <-- point to server-side PHP script 
            data: {share_data:'twitter_share'},                         
            type: 'post',
            
            success: function(php_script_response){

            }
        });
        var ref = $(this).closest('fieldset');
        var step = $('input[name="step"]',ref).val();
        var videoUrl = "<?php echo site_url();?>/user-share/<?php echo $this->session->userdata('user_id');?>/"+step;//$('input[name="share_video_url"]',ref).val();
        var url = "http://google.com";
        var text = "21 Day Challenge Masterclass";
        window.open('http://twitter.com/share?url='+encodeURIComponent(videoUrl)+'&text='+encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');


    });
    $( "#dialog" ).on( "dialogclose", function( event, ui ) {
        $(".file-upload").show();
        $(".file-upload-right").show();
        //alert("ddd");

    } );

         $(".shareBtnFB").click(function() {

            var ref = $(this).closest('fieldset');
            var step = $('input[name="step"]',ref).val();
            var videoUrl = "<?php echo site_url();?>/user-share/<?php echo $this->session->userdata('user_id');?>/"+step;
            //$('input[name="share_video_url"]',ref).val();
            
            if(videoUrl != ''){
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: videoUrl,
                }, function(response){

                   // alert(response);
                    console.log(response);

                     $.ajax({
                        url: '<?php echo site_url();?>/ajax/addRewardsPoint', // <-- point to server-side PHP script 
                        data: {share_data:'fb_share'},                         
                        type: 'post',
                        
                        success: function(php_script_response){

                        }
                    });

                });
            }
            

        });


        $(".shareBtnFBDetails").click(function() {

             var ref = $(this).closest('.fro_m');
            var step = $('input[name="voteDetailsId"]',ref).val();
            var videoUrl = "<?php echo site_url();?>/user-share/<?php echo $this->session->userdata('user_id');?>/"+step;
            //$('input[name="share_video_url"]',ref).val();
            
            if(videoUrl != ''){
                FB.ui({
                    display: 'popup',
                    method: 'share',
                    href: videoUrl,
                }, function(response){

                   // alert(response);
                    console.log(response);

                     $.ajax({
                        url: '<?php echo site_url();?>/ajax/addRewardsPoint', // <-- point to server-side PHP script 
                        data: {share_data:'fb_share'},                         
                        type: 'post',
                        
                        success: function(php_script_response){

                        }
                    });

                });
            }
            

        });

        $(".twitterBtnDetails").click(function() {

            $.ajax({
                url: '<?php echo site_url();?>/ajax/addRewardsPoint', // <-- point to server-side PHP script 
                data: {share_data:'twitter_share'},                         
                type: 'post',
                
                success: function(php_script_response){

                }
            });
            
            var ref = $(this).closest('.fro_m');
            var step = $('input[name="voteDetailsId"]',ref).val();
            var videoUrl = "<?php echo site_url();?>/user-share/<?php echo $this->session->userdata('user_id');?>/"+step;//$('input[name="share_video_url"]',ref).val();
            var url = "http://google.com";
            var text = "21 Day Challenge Masterclass";
            window.open('http://twitter.com/share?url='+encodeURIComponent(videoUrl)+'&text='+encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');


        });




        $(".completedVideo").click(function() {
            var checked = $(this).is(':checked');
            if (checked) {
                var ref = $(this).closest('fieldset');
                var step = $('input[name="step"]',ref).val();
                $('.stepDialog').html(step);
                $( "#dialog" ).dialog();

                 $.ajax({
                    //url: 'http://golf.local.com/index.php/ajax/submit_without_video', 
                     url: '<?php echo site_url();?>/ajax/submit_without_video', 
                    data: {step:$('input[name="step"]',ref).val()},                         
                    type: 'post',
                    
                    success: function(php_script_response){

                    }
                });

               // alert('checked');
            } else {
               // alert('unchecked');
            }
        });

        $('.imageInput').on('change', function() {

            const size = 
               (this.files[0].size / 1024 / 1024).toFixed(2);
          
            if (size > 10) {

                $.alert({
                    title: 'Alert!',
                    content: 'File must be less than 10 MB',
                });
               // alert("File must be between the size of 2-4 MB");
                // $('.fileError').html('File must be less than 10 MB');
                // $('.fileError').show();
                return false;
            } else {
            //    $('.fileError').html('');
            //     $('.fileError').hide();
            }

           


            var ref = $(this).closest('.file-upload');
            var ref1 = $(this).closest('fieldset');
             $(".fileUploadAjax",ref1).append('<div class="file-upload-progressbar"><div class="filename"><input type="hidden" value="0" name="delete_video_id">'+this.files[0].name+'<span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div><div class="progress"><div class="progress-bar" style="width:0%;"></div></div></div>');

            var file_data = $('.imageInput',ref1).prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            form_data.append('step', $('.step',ref1).val());
           // alert(form_data);        
           $(this).val("");                     
            $.ajax({
                xhr: function() {
                var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100).toFixed(2);

                            $(".progress-bar:last-child",ref1).last().width(percentComplete + '%');
                            $(".progress-bar:last-child",ref1).last().html(percentComplete+'%');
                            //$(".progress-bar:last-child",ref1).width(percentComplete + '%');
                           // $(".progress-bar").width(percentComplete + '%');
                            //$(".progress-bar:last-child",ref1).html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                url: '<?php echo site_url();?>/ajax/fileUploadVideo', // <-- point to server-side PHP script 
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                beforeSend: function(){
                    //$(".progress-bar").width('0%');
                   // $('#uploadStatus').html('<img src="images/loading.gif"/>');
                },
                success: function(php_script_response){
                    //alert(php_script_response); // <-- display response from the PHP script, if any
                    var result = JSON.parse(php_script_response);
                    //console.log("Save Complete"+result.service_type);

                    if(result.status == true){
                        $('.imageInput',ref1).val("");
                        $('.check_video',ref).val('ok');
                        $('.uploadedShareVideo',ref1).val(result.video_url);

                        $('.uploadedShareVideo',ref1).val(result.video_url);

                        $(".shareVideo",ref1).html('<source src="'+result.video_url+'" type="video/mp4"></source>' );
                        $('input[name="share_video_url"]',ref1).val(result.video_url);
                        
                        $('input[name="delete_video_id"]',ref1).last().val(result.id);

                        $.confirm({
                        title: '',
                        content: 'Do you like to share your videos and earn rewards?',
                        buttons: {
                            yes: function () {
                                //$.alert('Confirmed!');
                                $('.next',ref1).hide();
                                $('.nextShare',ref1).show(); 

                                $('.parentSection',ref1).hide();
                                $('.shareSection',ref1).show();

                                
                            },
                            no: function () {
                                //$.alert('Canceled!');
                                $('.next',ref1).show();
                                $('.nextShare',ref1).hide(); 
                            },
                            
                        }
                    });
                        
                        
                      //  $('.next',ref1).addClass('nextShare');
                       // $('.next',ref1).removeClass('next');
                    }
                }
            });
        });


        $(".nextShare").click(function() {
            var ref = $(this).closest('fieldset');
            $('.parentSection',ref).hide();
            $('.shareSection',ref).show();
            $('.nextShare',ref).hide(); 
            $('.next',ref).show(); 
        });

        $('.mentalImage').click(function(){
            var ref = $(this).closest('.progolfers__item');
            var ref1 = $(this).closest('.tab-con');
            var videoData = $('.hiddenVideo',ref).val();

           // alert(videoData);
            //alert('<source src="'+videoData+'" type="video/mp4"></source>' );
            
            $(".mentalvideo",ref1).html('<iframe  src="'+videoData+'" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>');

            // $(".mentalvideo",ref1).attr({
            //                 "src": videoData,
            //                 "autoplay": "autoplay",        
            //             })
           // $(".mentalvideo",ref1).html('<source src="'+videoData+'" type="video/mp4"></source>' );

        });

        //$(".shareVideo",ref1).html('<source src="'+php_script_response+'" type="video/mp4"></source>' );
        


    });


    

</script>
    
</body>

</html>