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
      <style type="text/css">

        .couponAppliedError{
            color: red;
            text-align: center;
            font-size: 23px;
        }

      </style>
   </head>
   <body>
    <header class="page-header">
      <div class="container-header">
          <div class="header-wrap">
              <div class="logo">
                  <a href="https://21daygolfchallenge.com/"><img src="<?php echo base_url();?>public/assets/img/logo.png" alt="Keyhouse" class="img-responsive"></a>
              </div>
              <div class="header-right">
                  <nav class="nav-primary">
                      <ul>                                     
                     
                      <li class="#"><a href="https://21daygolfchallenge.com/">Home</a></li>
                      <li class="dropdown">
                        <a href="https://21daygolfchallenge.com/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programs </a>
                      
                      </li>
                    <!--  <li><a href="#">Community</a></li>-->
                      <li><a href="https://21daygolfchallenge.com/sponsership">Sponsors</a></li>
                      
                      <li><a target="_blank" href="https://www.golfersu.com/about">About Us</a></li>
                      

                      <li><a href="<?php echo site_url();?>/login" class="login-btn">Login</a></li>
                      <li><a href="<?php echo site_url();?>/signup" class="register-btn">Register</a></li>


                      
                      </ul>
                  </nav>
                  <!-- <div class="header-right__button">
                    <ul>
                        <li><a href="<?php echo site_url();?>/login"><img src="<?php echo base_url();?>public/assets/img/login-icon.png" alt=""> Login / Register</a></li>
                       
                    </ul>
                  </div> -->
                  
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
                    <img src="<?php echo base_url();?>public/assets/img/logo.png" alt="">
                    <p>Welcome to GolfersU, the ultimate destination for improving your golf game. Our mobile app connects golfers of all skill levels with PGA Pros who provide expert coaching and lessons, anytime, anywhere.</p>
                </div>
                <div class="footer-right">
                    <div class="footer-link">
                        <h3>Quick Links</h3>
                        <ul>
                          <li><a href="https://21daygolfchallenge.com/">Home</a></li>
                         
                          <li><a href="https://21daygolfchallenge.com/sponsership">Sponsors</a></li>
                          
                          <li><a target="_blank" href="https://www.golfersu.com/about/">About Us</a></li>
                          
                        </ul>
                    </div>
                    <div class="footer-link">
                        <h3>Useful Info</h3>
                        <ul>
                          <li><a href="https://21daygolfchallenge.com/21-day-challenge/">Join the masterclass</a></li>
                       
                          <li><a target="_blank" href="https://www.golfersu.com/my-account/">Update Account</a></li>
                        </ul>
                    </div>
                    <div class="footer-link">
                        <h3>Download App</h3>
                        <div class="app_img"><a href="https://play.google.com/store/apps/details?id=com.jimmygolf.student.app"><img src="<?php echo base_url();?>public/assets/img/gooapp.png" alt=""></a></div>
                       <!--  <div class="app_img"><img src="<?php echo base_url();?>public/assets/img/Appstore.png" alt=""></div> -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                © GolfersU <?php echo date('Y'); ?> - All Rights Reserved
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
<?php if($this->input->cookie('payment_success',true)){
    if($this->input->cookie('payment_success',true) == 'yes'){
        //$this->input->delete_cookie('payment_success');
        delete_cookie('payment_success');

       

    
    ?>
$.confirm({
    title: '',
    content: 'Thank you for registering. We have received your payment. You are now a registered user.',
    buttons: {
        Ok: function () {
           window.location.replace("<?php echo site_url();?>/challenge");
          
        }
        
    }
});
<?php } }?>



document.getElementById('phone_number').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

$.validator.addMethod("strong_password", function (value, element) {
    let password = value;
    if (!(/^(?=.*[a-z])(?=.*[0-9])(.{8,10}$)/.test(password))) {
        return false;
    }
    return true;
}, function (value, element) {
    let password = $(element).val();
    if (!(/^(.{6,10}$)/.test(password))) {
        return 'Password must be between 8 to 10 characters long.';
    }
    else if ((/^(?=.*[A-Z])/.test(password))) {
        return 'Password must contain only lowercase.';
    }
    else if (!(/^(?=.*[a-z])/.test(password))) {
        return 'Password must contain at least one lowercase.';
    }
    else if (!(/^(?=.*[0-9])/.test(password))) {
        return 'Password must contain at least one digit.';
    }
    // else if (!(/^(?=.*[@#$%&])/.test(password))) {
    //     return "Password must contain special characters from @#$%&.";
    // }
    return false;
});

var signUpForm = $("#payment-form").validate({

    
      rules: {
        card_number:{
            required: true,
            number: true
        },
        first_name: {
            required: true,
        },
         last_name: {
            required: true,
        },
        
         user_name: {
            required: true,
            remote: "<?php echo site_url();?>/ajax/userName"
        },
         email: {
            required: true,
            email:true,
            remote: "<?php echo site_url();?>/ajax/emailCheck"
        },
        password: {
            required: true,
            strong_password:true,
        },
      },
      messages: {
            first_name: {
                required: "Please Enter First Name",
            },
            last_name: {
                required: "Please Enter Last Name",
            },
            
            user_name: {
                required: "Please Enter User Name",
                remote:"User Name alredy exists."
            },
            email: {
                required: "Please Enter Email Address",
                email:"Please Enter valid Email Address",
                remote:"Email alredy exists."
            },
            password: {
                required: "Please Enter Password",
            },
            
         }
      
});
$(function() {

    // $("#payment-form").submit( function () {
    //     //alert("dd");
    //      var formData = new FormData( $( '#payment-form' )[ 0 ] );
    //      if(signUpForm.valid()){
    //         $.ajax({
    //               type: 'POST',
    //               url: "<?php echo site_url('signup/handlePayment');?>",
    //               data: formData,
    //               success: function(resultData) { 
                       
    //               }
    //         });
    //      }

    //      return false;
        


        

    // });

    $(".couponDiv").click( function () {
        $('.cou_pon').toggle();

    });

    $(".removeCoupon").click( function () {
        $('input[name="applied_discount"]').val();
        $('.changeAmount').html('$'+<?php echo class_amount;?>);
        $('input[name="coupon_code"]').val(''); 
        $('.couponAppliedText').html('');
        $('.couponApplied').hide();
        $('.cou_pon').show();
    });
    
    $(".applyCoupon").click( function () {
        //alert($('input[name="coupon_code"]').val());
         var checkCpoupon = $('input[name="coupon_code"]').val();   
         $.ajax({
                  type: 'POST',
                  url: "<?php echo site_url();?>/ajax/promo_check",
                  data: {
                        coupon_code:$('input[name="coupon_code"]').val(),
                  },
                  success: function(resultData) { 
                        var result = JSON.parse(resultData);
                        
                        if(result.success == true){
                           // alert("sss"+result.amount);
                            $('input[name="applied_discount"]').val(result.id);
                            $('.changeAmount').html('$'+result.amount);
                            $('.couponAppliedText').html(checkCpoupon);
                            $('.couponApplied').show();
                            $('.cou_pon').hide();
                        }
                        else{
                             $('.couponApplied').hide();
                             $('.couponAppliedError').html(result.message);
                              $('.couponAppliedError').show();
                           // alert("ddddd"+result.success);
                           
                            $('input[name="applied_discount"]').val();
                        }
                  }
            });
    });
    
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

    //   alert($form.data('stripe-publishable-key'));
    //   alert($('.card-number-new').val());
      Stripe.createToken({
        number: $('.card-number-new').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month option:selected').val(),
        exp_year: $('.card-expiry-year option:selected').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
    
        
        if (response.error) {
            //alert("dddddddddd");
            $('.errorHide').show();
            $('.errorHide')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            console.log("ooooooooooo ",response);
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
        
    }
     
});
</script>
   </body>
</html>
