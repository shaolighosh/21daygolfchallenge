<?php 
/* 
Template Name: Home page Template 
*/ 

get_header('new');
?>

<section class="banner">
    <div id="banner-slider"  class="owl-carousel">
      <div class="item" style="">
        <img src="<?php the_field('banner_2'); ?>">
        <div class="banner-container">
          <div class="container">
            <div class="banner-text">
              <h1>Improve Your Golf Game with Expert <br> Coaching and Lessons, Anytime,<br> Anywhere</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="item" style="">
        <img src="<?php the_field('banner_1'); ?>">
        <div class="banner-container">
          <div class="container">
            <div class="banner-text">
              <h1>Improve Your Golf Game with Expert <br> Coaching and Lessons, Anytime,<br> Anywhere</h1>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </section>

  <section class="section program-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb30">
          <h2 class="mb20">Our Programs</h2>
        </div>
        <div class="col-md-3 col-sm-6 mb30">
          <div class="program-box">
            <div class="program-image">
              <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/program1.jpg" alt="" class="img-responsive">
            </div>
            <div class="program-dtls">
              <h4>Improve Your Golf Game with Our Video Library</h4>
              <p>At GolfersU, we believe that every golfer has the potential to play at their absolute best every single game. That's why we've created the ultimate resource for golfers looking to improve their game – the GolfersU Video Library.</p>
              <a href="https://www.golfersu.com/" class="read-more">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb30">
          <div class="program-box">
            <div class="program-image">
              <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/program2.jpg" alt="" class="img-responsive">
            </div>
            <div class="program-dtls">
              <h4>Get a Pro Swing Analysis for Your Best Game Ever</h4>
              <p>Are you struggling with your golf swing and not sure where to turn? GolfersU's Personal Swing Analysis is here to help. </p>
              <a href="https://www.golfersu.com/" class="read-more">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb30">
          <div class="program-box">
            <div class="program-image">
              <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/program3.jpg" alt="" class="img-responsive">
            </div>
            <div class="program-dtls">
              <h4>Master Your Mental Game with Get in the Zone</h4>
              <p>Get in the Zone is the ultimate mental training program for golfers looking to take their game to the next level. </p>
              <a href="https://www.golfersu.com/" class="read-more">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="program-box">
            <div class="program-image">
              <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/program4.jpg" alt="" class="img-responsive">
            </div>
            <div class="program-dtls">
              <h4>The 21 Day Golf Challenge</h4>
              <p>Welcome to The 21 Day Golf Challenge! Our program is designed to help you transform your golf game by focusing on the habits that will stick with you for a lifetime.</p>
              <a href="<?php bloginfo('url');?>/21-day-challenge/" class="read-more">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section about-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb30">
          <div class="about-image">
            <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/about-image.png" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-md-6 extra-padd-left">
          <h2>About Us</h2>
          <p>The fast track to your best game, every time. GolfersU is the only app for golfers looking for expert, on-demand coaching during a round, at home or at the driving range. Hosted discreetly on a smartphone app, it’s the premier way to receive personalized golf coaching that is tailored specifically to the problems you’re experiencing to help you nail any shot.</p>
          <p>Are you tired of shooting the same score every round? Do you want to finally break 90 or 80? With GolfersU, you can get expert coaching and lessons from PGA Pros, anytime, anywhere.</p>
          <p>GolfersU is the perfect solution for busy golfers who want to improve their game. With our on-demand coaching and lessons, you can learn at your own pace, on your own time. Whether you're a beginner or a seasoned pro, we have a program that's right for you.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section testimonial-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb30">
          <img src="https://myeverythinggolf.com/21-day-challenge/assets/img/testimonial-quotes.png" alt="" class="testimonial-quotes-image">
        </div>
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 mb30">
          <div id="testimonial-slider"  class="owl-carousel">
            <div class="item text-center">
             <p>GolfersU has been a game changer for me. The quality of instruction and coaching is top-notch, and I love being able to practice on my own schedule. I've seen significant improvement in my game since I started using GolfersU.</p>
             <div class="author">
               <span class="author-image"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/author-image.png" alt=""></span>
               <h6>John D</h6>
               <p>GolfersU user</p>
             </div>
            </div>
            <div class="item text-center">
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
             <div class="author">
               <span class="author-image"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/author-image.png" alt=""></span>
               <h6>John Dou</h6>
               <p>GolfersU user</p>
             </div>
            </div>
            <div class="item text-center">
             <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
             <div class="author">
               <span class="author-image"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/author-image.png" alt=""></span>
               <h6>Mr Doe</h6>
               <p>Mr Doe user</p>
             </div>
            </div> 
          </div>
        </div>
        <div class="col-md-12 text-center">
          <a href="#" class="see-more-btn">See More</a>
        </div>
      </div>
    </div>
  </section>

  <section class="featured-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb30">
          <h2>Featured on</h2>
        </div>
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 text-center">
          <div class="all-featured">
            <a href="#"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/featured1.png" alt=""></a>
            <a href="#"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/featured2.png" alt=""></a>
            <a href="#"><img src="https://myeverythinggolf.com/21-day-challenge/assets/img/featured3.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section free-trial" style="background-image: url(https://myeverythinggolf.com/21-day-challenge/assets/img/free-triel-bg.png);">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
          <h2>Sign up for a free trial today and start improving your game with GolfersU.</h2>
          <a href="#" class="btn btn-primary">Learn more</a>
        </div>
      </div>
    </div>
  </section>

  <?php 


get_footer('new');
?>