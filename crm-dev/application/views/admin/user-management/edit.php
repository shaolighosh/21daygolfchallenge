
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/user-management/edit">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="#" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
          <h2 class="efri-text">User Detail</h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                             <?php 
                              $attributes = array('id' => 'formSettings');
                              echo form_open('settings', $attributes);

                              ?>
                              <?php if(!empty($userDetails->user_image)) {?>
                               <div class="form-group">
                                    <label>User Image</label>
                                    <img src="<?php echo $userDetails->user_image ?>">
                                  </div>
                                  <?php }?>
                                  <input type="hidden" class="form-control" name="id" placeholder="First Name" required value="<?php echo $userDetails->id;?>">
                                  <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required value="<?php echo $userDetails->first_name;?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required value="<?php echo $userDetails->last_name;?>">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $userDetails->user_email;?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text"  name="street_address" id="address" class="form-control" placeholder="Email" value="<?php echo ($userDetails->street_address);?>">
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
                                    <label>City</label>
                                    <input type="text"  name="city" id="city" class="form-control" placeholder="Email" value="<?php echo ($userDetails->city);?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Post Code</label>
                                    <input type="text"  name="post_code" id="post_code" class="form-control" placeholder="Email" value="<?php echo ($userDetails->post_code);?>">
                                  </div>
                                  <div class="form-group">
                                    <label>UserName</label>
                                    <input type="text"  name="username" id="username" class="form-control" placeholder="Email" value="<?php echo $userDetails->username;?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"  name="password" id="username" class="form-control" >
                                  </div>

                                  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password"  name="confirm_password" id="username" class="form-control" >
                                  </div>
                                
                                  <button type="submit" class="btn btn-primary action-button" data-toggle="modal" data-target="#exampleModal">Edit</button>
                              </form>
                          </div>
                      </div>
          </div>
        </div>
      </div>                   
    </fieldset>
  </form>
</div>