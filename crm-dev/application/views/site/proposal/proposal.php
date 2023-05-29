 <div class="pagetitle">
      <h1>My Service Proposal</h1>
      <div class = "pull-right">
         <a href="<?php echo site_url();?>/proposal/addProposal" class="propesalbnt" style="float: right;">Add New Proposal</a>
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

      <form class="search-form d-flex align-items-center" method="GET" action="">
        <!-- <label></label> -->
        <input type="text" name="customer_name" placeholder="Customer Name" value="<?php if(isset($_GET['customer_name'])){ echo $_GET['customer_name']; }?>" title="Customer Name">
        <input type="submit" name="search" class="propesalbnt" value="search">
        <!-- <input type="date" placeholder="Date" id="birthday" name="birthday">
        <select class="search-form ">
        <option value="">Select Service</option>
        <?php if(!empty($services)){
          foreach($services as $service){
            ?>
            <option value="<?php echo $service->id;?>"><?php echo $service->service_name;?></option>
          <?php } } ?>
        
        
        </select> -->
        
      </form>
    </div>

        </div>
      </div>




<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">


<div class="card">
            <div class="card-body">
              <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success">
                      <?php echo $this->session->flashdata('success');?>
                    </div>
              <?php } ?>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Proposal Number</th>
                    <th scope="col">Customer Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Proposal Value</th>
                    <!-- <th scope="col">No. of Assigned Service</th> -->
                    <!-- <th scope="col">Pending Payment</th>
                     -->
                     <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($results)){
                  foreach($results as $result){
                   // $numberOfService = $this->Common_model->numrows('proposal_additional',array('proposal_id' => $result->id));
                   // $service_number_service = $this->Common_model->dbQuery("SELECT SUM(service_number_service) AS serviceCount FROM proposal_additional where proposal_id = '".$result->id."'");
                    
                  ?>
                    <tr>
                      <td><?php echo $result->id;?></td> 
                      <td><?php echo $result->customer_name;?></td>
                      <td><?php echo $result->email;?></td>
                      <td style="text-align:center;">$<?php echo $result->total_prepaid;?></td>
                      <td style="text-align:center;"><?php echo $result->status;?></td>
                      <!-- <td style="text-align:center;">$0.09</td>
                      <td style="text-align:center;">$40</td> -->
                     <td>
                        <a target="_blank" href="<?php echo site_url();?>/proposal/show/<?php echo $result->id;?>">View</a>
                        <a href="<?php echo site_url();?>/proposal/edit/<?php echo $result->id;?>" class="gr_en">Edit</a>
                        <a onClick="return confirm('Are you sure?')" href="<?php echo site_url();?>/proposal/delete/<?php echo $result->id;?>" class="re_d">Delete</a>
                     </td>
                  </tr>
                <?php } } ?>
                  
                 
                   
                 

                </tbody>
              </table>
              <p><?php echo $links; ?></p>
              <!-- End Default Table Example -->
            </div>
          </div>

</div></div>


      </section>