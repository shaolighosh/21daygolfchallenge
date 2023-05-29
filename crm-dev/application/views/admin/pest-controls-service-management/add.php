 <div class="pagetitle">
      <h1>Add Pest Controls Service</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/pest-controls-service-management/add');?>">
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Name :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_name" id="service_name"  class="form-control" placeholder="Service Name"/>
                            <?php echo form_error('service_name', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Type :</label>
                          <div class="col-md-8 col-lg-8">
                          <select name="square_foot" id="square_foot" class="form-control" >
                          <option value=""></option>
                          <option value="yes">Square Foot</option>
                          <option value="no">Time</option>
                          </select>
                            
                           
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Total Service :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="total_service" id="total_service"  class="form-control" placeholder="Rounds"/>
                            <?php echo form_error('total_service', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Prefix :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_prefix" id="service_prefix"  class="form-control" placeholder="Service Prefix" required/>
                            <?php echo form_error('service_prefix', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="size">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Size :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_size" id="service_min_size"  class="form-control" placeholder="Min Size"/>
                            <?php echo form_error('service_min_size', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="time" style="display:none;">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Time :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_time" id="service_min_time"  class="form-control" placeholder="Min Time"/>
                            <?php echo form_error('service_min_time', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Price :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_price" id="service_min_price"  class="form-control" placeholder="Min Price"/>
                            <?php echo form_error('service_min_price', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Incremental(Per 1000 sf) :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_incremental" id="service_incremental"  class="form-control" placeholder="Incremental(Per 1000 sf)"/>
                            <?php echo form_error('service_incremental', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Description :</label>
                          <div class="col-md-8 col-lg-8">
                            <textarea id="description" name="description" rows="4" cols="30"></textarea>
                            
                          </div>
                        </div>
                        
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-4 col-lg-4 col-form-label"></label>
                          <div class="col-md-8 col-lg-8">
                          <input type="submit" class="btn  propesalbnt" value="Add" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>