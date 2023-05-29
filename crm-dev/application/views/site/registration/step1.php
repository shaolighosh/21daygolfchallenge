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
                          <h2>Registration</h2>
                        <div class="formSection">
                            
                              <?php 
                                $attributes = array('id' => 'formStep1');
                                echo form_open('registration', $attributes);

                                ?>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/user-icon.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="last_name" placeholder="Last Name">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/user-icon.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="hk_id" placeholder="HKID">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/id-icon.png" alt=""></span>
                                    </div>
                                </div>
                                
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="email" placeholder="Email">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/email-icon.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="rank" placeholder="Rank">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/rank-icon.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/password.png" alt=""></span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control"  name="confirm_password" placeholder="Confirm Password">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><img src="<?php echo base_url();?>public/site/images/password.png" alt=""></span>
                                    </div>
                                </div>
                                <!-- <div class="captcha"><img src="<?php echo base_url();?>public/site/images/captcha.png" alt=""></div> -->
                                <button type="submit" class="btn customBtn">Submit</button>
                            </form>
                            <div class="forgotSec">Already an user ? <a href="#">Click here</a> to Login</div>
                        </div>
                    </div>
                  </div>  
           </div> 
            </div> 
          </div>
        </section>
           
           
      </div>