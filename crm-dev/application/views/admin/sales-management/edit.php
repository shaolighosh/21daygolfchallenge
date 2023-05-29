 <div class="pagetitle">
      <h1>Add Sales Rep</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/sales-management/edit');?>">
      <input type="hidden" name="id" value="<?php echo $rep->id ?>">
                         <div class="row  mb-3 mt-5">
                          <label for="First Name" class="col-md-2 col-lg-2 col-form-label">First Name :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="text" name="first_name" id="first_name"  class="form-control" placeholder="First Name" value="<?php echo $rep->first_name ?>"/>
                            <?php echo form_error('first_name', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="Last Name" class="col-md-2 col-lg-2 col-form-label">Last Name :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="text" name="last_name" id="last_name"  class="form-control" placeholder="Last Name" value="<?php echo $rep->last_name ?>"/>
                            <?php echo form_error('last_name', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="email" class="col-md-2 col-lg-2 col-form-label">Email Id :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="email" name="email" id="name"  class="form-control" placeholder="Email Id" value="<?php echo $rep->user_email ?>"/>
                            <?php echo form_error('email', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="password" class="col-md-2 col-lg-2 col-form-label">Password :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="password" name="pass" id="pass"   class="form-control" placeholder="Password" value="<?php echo $rep->password ?>"/>
                            <?php echo form_error('pass', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label"></label>
                          <div class="col-md-10 col-lg-10">
                          <input type="submit" class="btn  propesalbnt" value="Edit" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>