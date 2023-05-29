 <div id="page">
           
           
        <section class="login-section signup-section">
          <div class="container">
            <div class="row">
        

            <div class="col-12 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                <div class="logoLogin"><a href="#"><img src="images/logo.png" alt=""></a></div>
                  <div class="login-right" data-aos="fade-left">
                    <div class="login-inner-left">
                        <img src="<?php echo base_url();?>public/site/images/l-icon1.png" alt="">
                    </div> 
                      <div class="login-inner-right">
                          <h2>Registration</h2>
                          <?php 
                                $attributes = array('id' => 'formStep1');
                                echo form_open('registration/step2', $attributes);

                                ?>

                        <div class="scannerSection"><!-- <img src="<?php echo base_url();?>public/site/images/scanner.png" alt=""> -->
                          
                          <!-- <div id="videoContainer">
                            <video id="webcam" width="640" height="480" autoplay style="display:none" ></video>    
                            <canvas id="canvas" width="640" height="480"></canvas>
                          </div> -->
                          <div id="videoContainer">
                          <video id="video"  width="640" height="480"  autoplay muted></video>
                        </div>

                          <img src="" id="captaureSrc" style="display: none;">
                          <input type="hidden" name="image_data" value="" id="image_data_captaure">
                          <!-- <button id="captaureImage" type="button">Take Photo</button> -->
                          <button id="captaureSubmit" type="submit" style="display: none;">Submit</button>

                        </form>

                        </div>
                    </div>
                  </div>  
           </div> 
            </div> 
          </div>
        </section>
           
           
      </div>