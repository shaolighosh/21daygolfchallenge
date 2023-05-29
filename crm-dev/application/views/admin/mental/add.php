
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/mental-management/add" enctype="multipart/form-data">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="<?php echo site_url(); ?>/admin/mental-management" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
          <h2 class="efri-text">Add Mental Imagery</h2>
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
                                  
                                  <div class="form-group">
                                    <label>Select Step:</label>
                                   <select name="step_id">
                                    <option>Select Step</option>
                                    <?php foreach($steps as $step){ 
                                      if($mental->step_id){
                                      ?>
                                    <option <?php echo ($step->id==$mental->step_id)?'selected':'' ?> value="<?php echo $step->id; ?>"><?php echo $step->step; ?></option>
                                    <?php }  else{?>
                                      <option value="<?php echo $step->id; ?>"><?php echo $step->step; ?></option>
                                  <?php  }
                                  } ?>
                                   </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Lesson Name</label>
                                    <input type="text" class="form-control" name="lesson_name" value="" />
                                  </div>
                                   <div class="form-group">
                                    <label>Golfers Name</label>
                                    <input type="text" class="form-control" name="golfers_name" value="" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Golfers Image</label>
                                    <input type="file" class="form-control" name="golfers_image" value="" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Mental Imagery Video URL</label>
                                    <input type="text" class="form-control" name="imagery_video" value="" />
                                   
                                
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