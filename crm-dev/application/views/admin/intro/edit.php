
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/intro-content/edit">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="<?php echo site_url(); ?>/admin/intro-content" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
          <h2 class="efri-text">Edit Intro Content</h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                             
                                  
                                 
                                  <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control1" rows="20" cols="50" name="content" placeholder="Enter Video URL" required><?php echo $introData->content; ?></textarea>
                                  
                                   
                                  </div>
                                  
                                 
                                <input type="hidden" name="resourceId" value="<?php echo $introData->id; ?>">
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