 <footer class="main-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12 mb30">
          <div class="fot-box">
            <a href="index.html" class="fot-logo"><img src="<?php echo get_template_directory_uri();?>/assets//img/footer-logo.png" alt=""></a>
            <p>Welcome to GolfersU, the ultimate destination for improving your golf game. Our mobile app connects golfers of all skill levels with PGA Pros who provide expert coaching and lessons, anytime, anywhere.</p>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 mb30">
          <div class="fot-box">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="<?php bloginfo('url');?>">Home</a></li>
             <!-- <li><a href="#">Programs</a></li>-->
              <!--<li><a href="#">Community</a></li>-->
              <li><a href="<?php bloginfo('url');?>/sponsership">Sponsors</a></li>
              <!-- <li><a href="<?php bloginfo('url');?>/register/">Pricing</a></li> -->
              <li><a target="_blank" href="https://www.golfersu.com/about/">About Us</a></li>
              <!-- <li><a href="<?php bloginfo('url');?>/contact/">Contact Us</a></li> -->
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 mb30">
          <div class="fot-box">
            <h3>Useful Info</h3>
            <ul>
              <li><a href="<?php bloginfo('url');?>/21-day-challenge/">Join the masterclass</a></li>
           <!--   <li><a href="<?php bloginfo('url');?>/partner-list/">Visit Our Partners</a></li>-->
              <li><a target="_blank" href="https://www.golfersu.com/my-account/">Update Account</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="fot-box">
            <h3>Download GolfersU App</h3>
            <span class="play-store"><a href="https://play.google.com/store/apps/details?id=com.jimmygolf.student.app"><img src="<?php echo get_template_directory_uri();?>/assets//img/play-store.png" alt=""></a></span>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 text-center">
          <p class="copyright-text">© GolfersU <?php echo date('Y'); ?> - All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

</div>
<?php wp_footer();?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri();?>/assets//js/bootstrap.min.js"></script>
<!-- mouse hover animation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
<!-- mouse hover animation -->
<script src="<?php echo get_template_directory_uri();?>/assets//js/custom.js"></script>
<!-- Owl js -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets//js/owl.carousel.js"></script>



<script>
  $(document).ready(function() {        
    $("#new-testimonial-slider").owlCarousel({
      margin:0,
      nav: false,
      dots:true,
      loop: true,
      autoplay:true,
      autoplayTimeout:2500,
      autoplayHoverPause:true,
      navText: ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"],
      responsive: {
       0: {
            items: 1
          },
          481: {
            items: 1
          },
          849: {
            items: 1
          },
          1200: {
            items: 1
          },
      }
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.menu-btn').click(function (){
      $('.side-menu').addClass("open-side-menu");
      $('.menu-outer').show();
    });
    $('.close-menu, .menu-outer').click(function (){
      $('.side-menu').removeClass("open-side-menu");
      $('.menu-outer').hide();
    });
  });
</script>
<script type="text/javascript">
  $(".main-submenu").click(function(){
    $(".sub-menus").slideToggle();
  });
</script>

<!-- mouse hover animation -->
<script type="text/javascript">
  var $circle = $('.circle'),
    $follow = $('.circle-follow');

  function moveCircle(e) {
  TweenLite.to($circle, 0.3, {
      x: e.clientX,
      y: e.clientY
  });
  TweenLite.to($follow, 0.5, {
      x: e.clientX,
      y: e.clientY
  });  
  }

  function hoverFunc(e) {
  TweenLite.to($circle, 0.3, {
    opacity: 1,
    scale: 0
  });
  TweenLite.to($follow, 0.3, {
      scale: 2
  });  
  }

  function unhoverFunc(e) {
  TweenLite.to($circle, 0.3, {
    opacity: 1,
    scale: 1
  });
  TweenLite.to($follow, 0.3, {
      scale: 1
  });  
  }

  $(window).on('mousemove', moveCircle);

  $("a").hover(hoverFunc, unhoverFunc);
</script>

<script>
$(document).ready(function() {        
  $("#banner-slider").owlCarousel({
    margin:0,
    nav: true,
    dots:false,
    loop: true,
    autoplay:false,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
    navText: ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"],
    responsive: {
     0: {
          items: 1
        },
        481: {
          items: 1
        },
        849: {
          items: 1
        },
        1200: {
          items: 1
        },
    }
  });
})
</script>

<script>
  $(document).ready(function() {        
    $("#testimonial-slider").owlCarousel({
      margin:0,
      nav: true,
      dots:false,
      loop: true,
      autoplay:true,
      autoplayTimeout:2500,
      autoplayHoverPause:true,
      navText: ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"],
      responsive: {
       0: {
            items: 1
          },
          481: {
            items: 1
          },
          849: {
            items: 1
          },
          1200: {
            items: 1
          },
      }
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.menu-btn').click(function (){
      $('.side-menu').addClass("open-side-menu");
      $('.menu-outer').show();
    });
    $('.close-menu, .menu-outer').click(function (){
      $('.side-menu').removeClass("open-side-menu");
      $('.menu-outer').hide();
    });
  });
</script>
<script type="text/javascript">
  $(".main-submenu").click(function(){
    $(".sub-menus").slideToggle();
  });
</script>

<!-- mouse hover animation -->
<script type="text/javascript">
  var $circle = $('.circle'),
    $follow = $('.circle-follow');

  function moveCircle(e) {
  TweenLite.to($circle, 0.3, {
      x: e.clientX,
      y: e.clientY
  });
  TweenLite.to($follow, 0.5, {
      x: e.clientX,
      y: e.clientY
  });  
  }

  function hoverFunc(e) {
  TweenLite.to($circle, 0.3, {
    opacity: 1,
    scale: 0
  });
  TweenLite.to($follow, 0.3, {
      scale: 2
  });  
  }

  function unhoverFunc(e) {
  TweenLite.to($circle, 0.3, {
    opacity: 1,
    scale: 1
  });
  TweenLite.to($follow, 0.3, {
      scale: 1
  });  
  }

  $(window).on('mousemove', moveCircle);

  $("a").hover(hoverFunc, unhoverFunc);
</script>
<!-- mouse hover animation -->

</body>
</html>