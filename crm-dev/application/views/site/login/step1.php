 <div id="page">
           
           
        <section class="login-section signup-section">
          <div class="container">
            <div class="row">
        

            <div class="col-12 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                <div class="logoLogin"><a href="#"><img src="<?php echo base_url();?>public/site/images/logo.png" alt=""></a></div>
                  <div class="login-right" data-aos="fade-left">
                    <div class="login-inner-left">
                        <img src="<?php echo base_url();?>public/site/images/l-icon2.png" alt="">
                    </div> 
                      <div class="login-inner-right">
                          <h2>Login</h2>
                          <p>We were not able to verify your Facial Recognition. Please enter the details below to login.</p>
                        <div class="formSection">
                             <?php 
                                $attributes = array('id' => 'loginStep1');
                                echo form_open('login', $attributes);

                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/email-icon.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/password.png" alt=""></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn customBtn">Submit</button>
                            </form>
                            <div class="forgotSec">Forgot Password ? <a href="#">Click here </a></div>
                        </div>
                    </div>
                  </div>  
           </div> 
            </div> 
          </div>
        </section>
           
           
      </div>