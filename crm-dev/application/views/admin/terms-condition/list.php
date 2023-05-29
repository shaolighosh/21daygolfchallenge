 
 <div class="pagetitle">
      <h1>All Terms & Conditions</h1>
      <div class="pull-right">
         <a href="<?php echo site_url();?>/admin/terms-condition/add" style="float: right;" class="propesalbnt">Add Terms & Condition</a>
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
                    <th scope="col">Terms & Condition Details </th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($services as $service) {?>
                  <tr>
                      <td><?php echo $service->description; ?></td>
                                  <td>
                        <a href="<?php echo site_url();?>/admin/terms-condition/edit/<?php echo $service->id?>" class="gr_en">Edit</a>
                        <a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url();?>/admin/terms-condition/delete/<?php echo $service->id?>" class="re_d">Delete</a>
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