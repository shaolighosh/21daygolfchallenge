
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/settings">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="#" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
          <h2 class="efri-text">Settings</h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                            <!--  <?php 
                             // $attributes = array('id' => 'formSettings','method'=>'post');
                             // echo form_open('settings', $attributes);

                              ?> -->
                                 
                                 <input type="hidden" class="form-control" name="admin_id" required value="<?php echo $userDetails->id;?>">
                                  <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $userDetails->username;?>">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"  name="password" id="password" class="form-control" placeholder="******" value="<?php echo $userDetails->password;?>" >
                                  </div>
                                  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password"  name="confirm_password" class="form-control" placeholder="******" value="<?php echo $userDetails->password;?>">
                                  </div>
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