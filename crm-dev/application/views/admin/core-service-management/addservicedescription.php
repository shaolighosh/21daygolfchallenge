 <div class="pagetitle">
      <h1>Add Service Description By Round</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      



<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">



<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/core-service-management/addservicedescription');?>">
      <?php for( $i = 1; $i<=$service->total_service;  $i++){ ?>
      <div class="container">
      <div class="row  mb-3 mt-5">
      <div class="col-2">
      <label for="First Name" class="col-form-label">Round :</label>
      <input type="text" name="round_content<?php echo $i; ?>" id="round_content"  class="form-control" placeholder="Round" required />
      </div>
      <div class="col-2">
      <label for="First Name" class="col-form-label">Application :</label>
      <input type="text" name="round_application<?php echo $i; ?>" id="round_application"  class="form-control" placeholder="Application" required />
      </div>
      <div class="col-2">
      <label for="First Name" class="col-form-label">Period :</label>
      <input type="text" name="round_period<?php echo $i; ?>" id="round_period"  class="form-control" placeholder="Period" required />
      </div>
      <div class="col-6">
      <label for="First Name" class="col-form-label">Service Description :</label>
      <textarea id="round_des" name="round_des<?php echo $i; ?>"  class="form-control" rows="4" cols="30" required ></textarea>
      </div>
      </div>
      </div>
      <?php } ?>
                 <div class="container">        
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-12 col-lg-12 col-form-label"></label>
                          <div class="col-md-8 col-lg-8">
                          <input type="hidden" name="roundservice" value="<?php echo $service->total_service; ?>" />
                          <input type="hidden" name="service_id" value="<?php echo $this->uri->segment(4); ?>" />
                          <input type="submit" class="btn  propesalbnt" value="Add" name="change_pass"/>
                          
                          </div>
                        </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>
</div>


      </section>