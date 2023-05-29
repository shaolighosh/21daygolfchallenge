
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/user-management/edit">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="<?php echo site_url(); ?>/admin/user-management/" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
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
                             <div class="row userdetail">
                              <div class="col-md-6">
                               <div class="form-group">
                                    <label><b></b>User Image</b></label>
                                    <img src="<?php echo $userDetails->user_image ?>">
                                  </div>
                                  <?php }?>
                              </div> 
                              </div>
                              <div class="row userdetail">
                                  <input type="hidden" class="form-control" name="id" placeholder="First Name" required value="<?php echo $userDetails->id;?>">
                                 <div class="col-md-6"> 
                                  <div class="form-group">
                                    <label><b>First Name : </b><?php echo $userDetails->first_name;?></label>
                                   
                                  </div>
                                  </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>Last Name :</b> <?php echo $userDetails->last_name;?></label>
                                   
                                  </div>
                                  </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>Email : </b><?php echo $userDetails->user_email;?></label>
                                    
                                  </div>
                                  </div>
                                 <div class="col-md-6"> 
                                   <div class="form-group">
                                    <label><b>Phone :</b> <?php echo $userDetails->phone;?></label>
                                    
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>Street Address : </b><?php echo ($userDetails->street_address);?></label>
                                    
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>City :</b> <?php echo ($userDetails->city);?> </label>
                                    
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>Post Code :</b> <?php echo ($userDetails->post_code);?></label>
                                    
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>UserName : </b><?php echo $userDetails->username;?></label>
                                    
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label><b>Step Completed :</b> <?php if(!empty($userProgress)){ echo "Step  ".$userProgress[0]->step_id;} else{ echo "N/A";} ?></label>
                                    
                                  </div>
                                </div>
                            </div>
                                  
                              </form>
                          </div>

                          <div class="row mb60" style="margin-top:50px;">


                            <h2 class="efri-text">User Uploaded Videos</h2>
                            <?php if(!empty($userVideos)){
                              foreach($userVideos as $userVideo){
                               // print_r($userVideo);die();

                              ?>
                              <div class="col-lg-3">

                              <!-- Card with an image on top -->
                              <div class="card custom-card">
                              <video class="shareVideo" controls>
                              <source src="<?php echo base_url();?><?php echo $userVideo->video_file;?>" type="video/mp4"></source>
                               </video>
                                <!-- <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $this->Common_model->getValue('golfersu_user', 'first_name',array('id' => $userVideo->user_id));?> <?php echo $this->Common_model->getValue('golfersu_user', 'last_name',array('id' => $userVideo->user_id));?></h5> 
                                  <h5 class="card-title">Step <?php echo $userVideo->step;?></h5>
                                  <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>

                                <!-- <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div> -->
                              </div><!-- End Card with an image on top -->
                            </div>
                            <?php } } ?>
                       
                        </div>


                      </div>
          </div>
        </div>
      </div>                   
    </fieldset>
  </form>
</div>