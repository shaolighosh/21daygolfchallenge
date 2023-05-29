 <div class="pagetitle">
      <h1>All Sales Rep</h1>
      <div class = "pull-right">
         <a href="<?php echo site_url();?>/admin/sales-management/add" style="float: right;" class="propesalbnt">Add Sales Rep</a>
      </div>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Transcriber Management</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      <div class="row mt-3">

        <!-- Left side columns -->
        <div class="col-lg-12">

          <div class="search-bar">

      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <!-- <label></label> -->
        <input type="text" name="query" placeholder="Name" title="Enter search keyword">
        <input type="text" name="query" placeholder="Email" title="Enter search keyword">
        <input type="date" placeholder="Date" id="birthday" name="birthday">
        <input type="text" name="query" placeholder="Date">
        <!-- <input type="text" name="query" placeholder="Email" title="Enter search keyword"> -->
      </form>
    </div>

        </div>
<!-- <div class="col-lg-4">

          <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        
        <input type="date" id="birthday" name="birthday">
      
      </form>
    </div>

        </div> -->



      </div>




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
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">No. of Service Proposal</th>
                    <th scope="col">No. of Assigned Service</th>
                    <!-- <th scope="col">Pending Payment</th>
                    <th scope="col">Total Earning</th> -->
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) {?>
                  <tr>
                      <td><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></td>
                      <td><?php echo $user->user_email; ?></td>
                      <td style="text-align:center;">10</td>
                      <td style="text-align:center;">6</td>
                      <!-- <td style="text-align:center;">$0.09</td>
                      <td style="text-align:center;">$40</td> -->
                     <td>
                        <a href="<?php echo site_url(); ?>/admin/sales-management/view/<?php echo $user->id ?>">View</a>
                        <a href="<?php echo site_url(); ?>/admin/sales-management/edit/<?php echo $user->id ?>" class="gr_en">Edit</a>
                        <a href="<?php echo site_url(); ?>/admin/sales-management/delete/<?php echo $user->id ?>" class="re_d">Delete</a>
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