 <div class="pagetitle">
      <h1>Change password</h1>
      
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
      <form method="POST" action="<?php echo site_url('admin/login/change_password');?>">
                         <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label">Old Password :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="password" name="oldpass" id="oldpass"  class="form-control" placeholder="Old Password"/>
                            <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label">New Password :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="password" name="newpass" id="newpass"   class="form-control" placeholder="New Password"/>
                            <?php echo form_error('newpass', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label">Confirm Password :</label>
                          <div class="col-md-10 col-lg-10">
                            <input type="password" name="passconf" id="passconf"  class="form-control" placeholder="Confirm Password"/>
                            <?php echo form_error('passconf', '<div class="error">', '</div>')?>
                          </div>
                        </div>
                        <div class="row  mb-3">
                          <label for="fullName" class="col-md-2 col-lg-2 col-form-label"></label>
                          <div class="col-md-10 col-lg-10">
                          <input type="submit" class="btn btn-success" value="Update" name="change_pass"/>
                          
                          </div>
                        </div>
                        
      </form>
            
            </div>
          </div>

</div>

</div>


      </section>