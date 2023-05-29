 <div class="pagetitle">
      <h1>Edit Service</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/service-management/edit');?>">
       <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Category :</label>
                          <div class="col-md-8 col-lg-8">
                          <select name="service_type" id="service_type" class="form-control" required >
                          <option value="">Select Service</option>
                          <option value="core_service" <?php if($service->service_type == "core_service"){ ?> selected="selected" <?php } ?>>Core Service</option>
                          <option value="outdoor_pest_service" <?php if($service->service_type == "outdoor_pest_service"){ ?> selected="selected" <?php } ?>>Outdoor Pest Service</option>
                          <option value="individual_service" <?php if($service->service_type == "individual_service"){ ?> selected="selected" <?php } ?>>Individual Service</option>
                          </select>
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Name :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_name" id="service_name"  required class="form-control" placeholder="Service Name" value="<?php echo $service->service_name; ?>"/>
                            
                            <?php echo form_error('service_name', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Program/
Service :</label>
                          <div class="col-md-8 col-lg-8">
                          <select name="program_service" id="program_service" class="form-control" required>
                          <option value="">Select rogram/
Service</option>
                          <option value="s" <?php if($service->program_service == "p"){ ?> selected="selected" <?php } ?>>Service</option>
                          <option value="p" <?php if($service->program_service == "s"){ ?> selected="selected" <?php } ?>>Program</option>
                          </select>
                            
                           
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Type :</label>
                          <div class="col-md-8 col-lg-8">
                          <?php
                          if($service->square_foot == "yes"){ echo "Square Foot"; } elseif ($service->square_foot == "no") { echo "Time"; }
						  
						  ?>
                          
                            
                           
                          </div>
                        </div>
                       <!-- <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Total Service :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="total_service" id="total_service"  class="form-control" placeholder="Rounds" value="<?php echo $service->total_service; ?>"/>
                            <?php echo form_error('total_service', '<div class="error">', '</div>')?>
                          </div>
                        </div>-->
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Service Prefix :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_prefix" id="service_prefix"  class="form-control" placeholder="Service Prefix" required  value="<?php echo $service->service_prefix; ?>"/>
                            <?php echo form_error('service_prefix', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="size">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Size :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_size" id="service_min_size"  class="form-control" placeholder="Min Size"  value="<?php echo $service->service_min_size; ?>"/>
                            <?php echo form_error('service_min_size', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5" id="time" style="display:none;">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Time :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_time" id="service_min_time"  class="form-control" placeholder="Min Time"  value="<?php echo $service->service_min_time; ?>"/>
                            <?php echo form_error('service_min_time', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Min Price :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_min_price" id="service_min_price"  class="form-control" placeholder="Min Price"  value="<?php echo $service->service_min_price; ?>"/>
                            <?php echo form_error('service_min_price', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Incremental(Per 1000 sf) :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_incremental" id="service_incremental"  class="form-control" placeholder="Incremental(Per 1000 sf)"  value="<?php echo $service->service_incremental; ?>"/>
                            <?php echo form_error('service_incremental', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                        
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Price with :</label>
                          <div class="col-md-8 col-lg-8">
                          <select name="related_service_id" id="related_service_id" class="form-control" >
                          <option value="">Select Service</option>
                          <?php 
						 
						foreach ($allservice as $all ){
						?>
                          <option value="<?php echo $all->id; ?>" <?php if($all->id == $service->related_service_id){ ?> selected="selected" <?php } ?>><?php echo $all->service_name; ?></option>
                          <?php } ?>
                          
                          </select>
                            
                           
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Price :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="with_service_price" id="with_service_price"  class="form-control" placeholder="Price" value="<?php echo $service->with_service_price; ?>"/>
                            
                          </div>
                        </div>
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Incremental Price :</label>
                          <div class="col-md-8 col-lg-8">
                            <input type="text" name="service_incremental_price" id="service_incremental_price"  class="form-control" placeholder="Incremental Price" value="<?php echo $service->service_incremental_price; ?>"/>
                            
                          </div>
                        </div>
                       
                        
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Short Description :</label>
                          <div class=" col-lg-10">
                            <textarea id="short_description" name="short_description" rows="4" cols="30"><?php echo $service->short_description; ?></textarea>
                            
                          </div>
                        </div>
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-lg-2 col-form-label">Description :</label>
                          <div class=" col-lg-10">
                            <textarea id="description" name="description" rows="4" cols="30"><?php echo $service->description; ?></textarea>
                            
                          </div>
                        </div>
                                         
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label"></label>
                          <div class="col-md-10 col-lg-10">
                          <input type="hidden" name="serviceId" value="<?php echo $service->id; ?>">
                          <input type="submit" class="btn  propesalbnt" value="Update" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>