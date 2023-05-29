
<div class="stap_top__wrapper">

  <?php 
      $attributes = array('id' => 'msform');
      echo form_open_multipart('settings', $attributes);

      ?>
 <!--  <form id="msform"> -->
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <!-- <a href="#" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a> -->
          <h2 class="efri-text">Profile</h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                             
                                  <div class="settingsprofile">
                                      <div class="settingsPic">
                                          <div class="thumb"><img width="100px" src="<?php echo base_url().$userDetails->user_image;?>" alt=""></div>
                                          <a href="#" class="picEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <input type="file" name="profile">
                                      </div>
                                      <div class="userCont">
                                          <!-- <h3><?php echo $userDetails->first_name;?> <?php echo $userDetails->last_name;?></h3> -->
                                         <!--  <p><i class="fa fa-map-marker" aria-hidden="true"></i> Canada</p> -->
                                          <!-- <div class="idChange"><a href="#" class="idEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a> Change Face ID</div> -->
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required value="<?php echo $userDetails->first_name;?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="<?php echo $userDetails->last_name;?>">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" autocomplete="new-password"  name="password" id="password" class="form-control" placeholder="******" >
                                  </div>
                                  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password"  name="confirm_password" class="form-control" placeholder="******" >
                                  </div>

                                 <!--  <div class="form-group">
                                    <label>Email Settings</label>
                                    <input type="text"  name="email_settings" class="form-control" value="<?php echo $userDetails->email_settings;?>" >
                                  </div> -->

                                  <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text"  name="phone" class="form-control" value="<?php echo $userDetails->phone;?>" >
                                  </div>

                                   <div class="form-group">
                                    <label>Street address</label>
                                    <input type="text"  name="street_address" class="form-control" value="<?php echo $userDetails->street_address;?>" >
                                  </div>

                                   <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text"  name="street_address1" class="form-control" value="<?php echo $userDetails->street_address1;?>" >
                                  </div>

                                   <div class="form-group">
                                    <label>City</label>
                                    <input type="text"  name="city" class="form-control" value="<?php echo $userDetails->city;?>" >
                                  </div>

                                   <div class="form-group">
                                    <label>Country</label>
                                    <select name="country_id" class="form-control">
                                      <option>Select Country</option>
                                      <?php if(!empty($countries)){
                                        foreach ($countries as $country) {
                                         ?>
                                          <option value="<?php echo $country->id;?>" <?php if($country->id == $userDetails->country_id ){ echo "Selected";}?>><?php echo $country->country_name;?></option>
                                      <?php  } } ?>
                                     

                                    </select>
                                   
                                  </div>


                                   <div class="form-group">
                                    <label>Postcode</label>
                                    <input type="text"  name="post_code" class="form-control" value="<?php echo $userDetails->post_code;?>" >
                                  </div>

                                  <!--  <div class="form-group">
                                    <label>Communication Preference </label>
                                    <input type="text"  name="phone_no_communication" class="form-control" value="<?php echo $userDetails->phone_no_communication;?>" >
                                  </div> -->



                                  <button type="submit" class="btn btn-primary action-button" data-toggle="modal" data-target="#exampleModal">Submit</button>
                              </form>
                          </div>
                      </div>
          </div>
        </div>
      </div>                   
    </fieldset>
  </form>
</div>