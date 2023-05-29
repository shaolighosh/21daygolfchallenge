 
 <div class="pagetitle">
      <h1>Service Management</h1>
      <div class="pull-right">
         <a href="<?php echo site_url();?>/admin/service-management/add" style="float: right;" class="propesalbnt">Add Service</a>
      </div>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Transcriber Management</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">

<?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success">
                  <strong><?php echo $this->session->flashdata('success');?></strong> 
                </div>
          <?php } ?>
<div class="card">
            <div class="card-body">

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Service Name </th>
                    <th scope="col">Service Type </th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($services as $service) {?>
                  <tr>
                      <td><?php echo $service->service_name; ?></td>
                      <td>
					  <?php 
					  if($service->service_type == "core_service") { echo "Core Service"; }
					  if($service->service_type == "outdoor_pest_service") { echo "Outdoor Pest Service"; }
					  if($service->service_type == "individual_service") { echo "Individual Service"; }
					  
					  ?></td>
                      
                                    <td> <a href="<?php echo site_url();?>/admin/service-management/view/<?php echo $service->id?>" class="gr_en">View Price Table</a>
                        <a href="<?php echo site_url();?>/admin/service-management/edit/<?php echo $service->id?>" class="gr_en">Edit</a>
                        <a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url();?>/admin/service-management/delete/<?php echo $service->id?>" class="re_d">Delete</a>
                     </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>

</div></div>


      </section>