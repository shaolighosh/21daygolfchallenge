 <div class="pagetitle">
      <h1>Add Core Service</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/service-management/add');?>">
      <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Service Category :</label>
                          <div class=" col-lg-10">
                          <select name="service_type" id="service_type" class="form-control" required >
                          <option value="">Select Service</option>
                          <option value="core_service">Core Service</option>
                          <option value="outdoor_pest_service">Outdoor Pest Service</option>
                          <option value="individual_service">Individual Service</option>
                          </select>
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Service Name :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_name" id="service_name"  class="form-control" placeholder="Service Name"/>
                            <?php echo form_error('service_name', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Program/
Service :</label>
                          <div class=" col-lg-10">
                          <select name="program_service" id="program_service" class="form-control" required>
                          <option value="">Select Program/
Service</option>
                          <option value="s">Service</option>
                          <option value="p">Program</option>
                          </select>
                            
                           
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Service Type :</label>
                          <div class=" col-lg-10">
                          <select name="square_foot" id="square_foot" class="form-control" >
                          <option value="">Select Service Type</option>
                          <option value="yes">Square Foot</option>
                          <option value="no">Time</option>
                          </select>
                            
                           
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Total Service :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="total_service" id="total_service"  class="form-control" placeholder="Rounds"/>
                            <?php echo form_error('total_service', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Service Prefix :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_prefix" id="service_prefix"  class="form-control" placeholder="Service Prefix" required/>
                            <?php echo form_error('service_prefix', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="size">
                          <label for="First Name" class="col-lg-2 col-form-label">Min Size :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_min_size" id="service_min_size"  class="form-control" placeholder="Min Size"/>
                            <?php echo form_error('service_min_size', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="time" style="display:none;">
                          <label for="First Name" class="col-lg-2 col-form-label">Min Time :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_min_time" id="service_min_time"  class="form-control" placeholder="Min Time"/>
                            <?php echo form_error('service_min_time', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Min Price :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_min_price" id="service_min_price"  class="form-control" placeholder="Min Price"/>
                            <?php echo form_error('service_min_price', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Incremental(Per 1000 sf) :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_incremental" id="service_incremental"  class="form-control" placeholder="Incremental(Per 1000 sf)"/>
                            <?php echo form_error('service_incremental', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Price with :</label>
                          <div class=" col-lg-10">
                          <select name="related_service_id" id="related_service_id" class="form-control" >
                          <option value="">Select Service</option>
                          <?php 
						  
						foreach ($services as $service ){
						?>
                          <option value="<?php echo $service->id; ?>"><?php echo $service->service_name; ?></option>
                          <?php } ?>
                          
                          </select>
                            
                           
                          </div>
                        </div>
                       
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Price :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="with_service_price" id="with_service_price"  class="form-control" placeholder="Price"/>
                            
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Incremental Price :</label>
                          <div class=" col-lg-10">
                            <input type="text" name="service_incremental_price" id="service_incremental_price"  class="form-control" placeholder="Incremental Price"/>
                            
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Short Description :</label>
                          <div class=" col-lg-10">
                            <textarea id="short_description" name="short_description" rows="4" cols="30"></textarea>
                            
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Description :</label>
                          <div class=" col-lg-10">
                            <textarea id="description" name="description" rows="4" cols="30"></textarea>
                            
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="fullName" class="col-lg-2 col-form-label"></label>
                          <div class=" col-lg-10">
                          <input type="submit" class="btn  propesalbnt" value="Add" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>