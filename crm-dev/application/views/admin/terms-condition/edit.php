 <div class="pagetitle">
      <h1>Edit Individual Service</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/terms-condition/edit');?>">
                        <input type="hidden" name="id" value="<?php echo $terms->id; ?>">
                        <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-4 col-lg-4 col-form-label">Terms and Condition Description :</label>
                          <div class="col-md-8 col-lg-8">
                            <textarea id="description" name="description"class="form-control" rows="5"  ><?php echo $terms->description; ?></textarea>
                            
                          </div>
                        </div>
                        
                        
                                         
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label"></label>
                          <div class="col-md-10 col-lg-10">
                         
                          <input type="submit" class="btn  propesalbnt" value="Update" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>