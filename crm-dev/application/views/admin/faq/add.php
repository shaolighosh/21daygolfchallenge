
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/faq/add" enctype="multipart/form-data">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <!-- <a href="<?php echo site_url(); ?>/admin/promo-code" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a> -->
          <h2 class="efri-text">Add Faq</h2>
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
                              echo form_open('promo-code/add', $attributes);

                              ?>
                                  
                                  
                                  <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="" />
                                  </div>
                                   <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" class="form-control" name="content" value="" />
                                    
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