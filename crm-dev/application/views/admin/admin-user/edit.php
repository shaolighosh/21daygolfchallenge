
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/admin-user/edit" enctype="multipart/form-data">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
         <!--  <a href="<?php echo site_url(); ?>/admin/mental-management" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a> -->
          <h2 class="efri-text">Edit Mental Imagery</h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                             <?php 
                              // $attributes = array('id' => 'formSettings');
                              // echo form_open('admin-user/edit', $attributes);

                              ?>
                                  
                                 
                                
                                   
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" class="form-control" name="email" value="<?php echo $mental->email; ?>" />
                                    </div>
                                     <div class="form-group">
                                      <label>Password</label>
                                      <input type="text" class="form-control" name="password" value="" />
                                      
                                    </div>

                                     <div class="form-group1">

                                      <label>Permission</label>
                                    </div>

                                    <div class="form-group1">

                                      <label>User Management</label>

                                    


                                      <input type="checkbox" class="form-control1" name="user_manage" value="user_manage" <?php if($mental->user_manage == 'Y'){ echo "checked";} ?>/>
                                      
                                    </div>

                                     <div class="form-group1">
                                      <label>Student Management</label>
                                      <input type="checkbox" class="form-control1" name="student_manage" value="student_manage"  <?php if($mental->student_manage == 'Y'){ echo "checked";} ?> />
                                      
                                    </div>

                                     <div class="form-group1">
                                      <label>Media Management</label>
                                      <input type="checkbox" class="form-control1" name="media_manage"  <?php if($mental->media_manage == 'Y'){ echo "checked";} ?> value="media_manage" />
                                      
                                    </div>

                                     <div class="form-group1">
                                      <label>Video Management</label>
                                      <input type="checkbox" class="form-control1" name="video_manage" value="video_manage" <?php if($mental->video_manage == 'Y'){ echo "checked";} ?> />
                                      
                                    </div>

                                     <div class="form-group1">
                                      <label>Promo Code Management</label>
                                      <input type="checkbox" class="form-control1" name="promo_manage" value="promo_manage" <?php if($mental->promo_manage == 'Y'){ echo "checked";} ?> />
                                      
                                    </div>

                                    <div class="form-group1">
                                      <label>Payment Management</label>
                                      <input type="checkbox" class="form-control1" name="payment_manage" value="promo_manage" <?php if($mental->payment_manage == 'Y'){ echo "checked";} ?> />
                                      
                                    </div>



                                  
                                <input type="hidden" name="id" value="<?php echo $mental->id; ?>">
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