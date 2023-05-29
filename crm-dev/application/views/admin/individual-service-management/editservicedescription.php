 <div class="pagetitle">
      <h1>Edit Service Description By Round</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      



<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">



<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/individual-service-management/editservicedescription');?>">
      <?php 
						
						$i =0;
						foreach ($rounds as $round ){
						$i =$i+1;
						?>
      <div class="container">
      <div class="row">
      <div class="col-2">
      <label for="First Name" class="col-form-label">Round :</label>
      <input type="text" name="round_content<?php echo $i; ?>" id="round_content"  class="form-control" placeholder="Round" required value="<?php echo $round->round_content; ?>" />
      <input type="hidden" name="service_round_id<?php echo $i; ?>" value="<?php echo $round->service_round_id; ?>" />
      </div>
      <div class="col-2">
      <label for="First Name" class="col-form-label">Application :</label>
      <input type="text" name="round_application<?php echo $i; ?>" id="round_application"  class="form-control" placeholder="Application" required  value="<?php echo $round->round_application; ?>"/>
      </div>
      <div class="col-2">
      <label for="First Name" class="col-form-label">Period :</label>
      <input type="text" name="round_period<?php echo $i; ?>" id="round_period"  class="form-control" placeholder="Period" required  value="<?php echo $round->round_period; ?>"/>
      </div>
      <div class="col-6">
      <label for="First Name" class="col-form-label">Service Description :</label>
      <textarea id="round_des" name="round_des<?php echo $i; ?>"  class="form-control" rows="4" cols="30" required ><?php echo $round->round_des; ?></textarea>
      </div>
      </div>
      </div>
      <?php 
	  
	  } ?>
                 <div class="container">        
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-12 col-lg-12 col-form-label"></label>
                          <div class="col-md-8 col-lg-8">
                          <input type="hidden" name="roundservice" value="<?php echo $service->total_service; ?>" />
                          <input type="hidden" name="service_id" value="<?php echo $this->uri->segment(4); ?>" />
                          <input type="submit" class="btn  propesalbnt" value="Update" name="change_pass"/>
                          
                          </div>
                        </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>
</div>


      </section>