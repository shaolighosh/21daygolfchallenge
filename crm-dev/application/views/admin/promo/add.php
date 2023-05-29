
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/promo-code/add" enctype="multipart/form-data">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <a href="<?php echo site_url(); ?>/admin/promo-code" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
          <h2 class="efri-text">Add Promo Code</h2>
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
                                    <label>Promo Name</label>
                                    <input type="text" class="form-control" name="promo_name" value="" />
                                  </div>
                                   <div class="form-group">
                                    <label>Promo Code</label>
                                    <input type="text" class="form-control" name="promo_code" value="" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Promo Percentage</label>
                                    <input type="text" class="form-control" name="promo_percentage" value="" />
                                    
                                  </div>

                                  <div class="form-group">
                                      <label>Quantity</label>
                                      <input type="text" class="form-control" name="quantity" value="" />
                                      
                                    </div>

                                    <div class="form-group">
                                      <label>Expiry Date</label>
                                      <input type="text" id="datepicker" class="form-control" name="expiry_date" value="" />
                                      
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