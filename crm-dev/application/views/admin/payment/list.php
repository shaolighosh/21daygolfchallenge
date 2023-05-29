<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Payment Management</h1>
                      </div>
                     
                     <div></div>
                     <?php if($this->session->flashdata('success')){?>
                      <div class="alert alert-success">
                        <strong><?php echo $this->session->flashdata('success');?></strong> 
                      </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                      <div class="alert alert-danger">
                        <strong><?php echo $this->session->flashdata('error');?></strong>
                      </div>

                  <?php } ?>
                     
                     <div class="content-pages-inner">
                          
                          
                          <div class="row mt-3">
                                <!-- Left side columns -->
                                <form method="get" class="search-form d-flex align-items-center">
                                <!-- <div class="col-lg-8"> -->

                                  <div class="search-bar">
                                   
                                  <label> Name</label>
                                      <input type="text" name="name" value="<?php if(isset($_GET['name'])){ echo $_GET['name']; }?>" placeholder="Name" title="Name">
                                </div>

                                <div class="search-bar">
                                            <label> Student Email</label>
                                            <input type="text" id="birthday" name="email" value="<?php if(isset($_GET['email'])){ echo $_GET['email']; }?>" placeholder="Email">
                                            <button type="submit" title="Search">Search</button>
                                            <a href="<?php echo site_url();?>/admin/payment-management/" title="Search">Reset</a>
                                        </div>



                                <!-- </div> -->

                              <!--   <div class="col-lg-4">

                                          <div class="search-bar">
                                            <label>Student Email</label>
                                            <input type="text" id="birthday" name="email">
                                            <button type="submit" title="Search">Search</button>
                                        </div>
                                </div> -->
                              </form>



                              </div>

                           <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-cards coursesSec innerTable">
                                        <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                              
                                              <th>Student Email</th>
                                             
                                              <th>Student Name</th>
                                                <th>Amount</th>
                                                <th>Transaction Id</th>
                                                <th>Plan Frequency</th>
                                                <th>Subscription Status</th>
                                                <th width="100px">Action</th> 
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <?php if(!empty($users)){
                                              foreach ($users as $userValue) {
                                               
                                             ?> 
                                            <tr>                                          
                                              <td><?php echo $this->Common_model->getValue('golfersu_user', 'first_name',array('id' => $userValue->user_id)) ?> <?php echo $this->Common_model->getValue('golfersu_user', 'last_name',array('id' => $userValue->user_id)) ?></td>   
                                              <td><?php echo $this->Common_model->getValue('golfersu_user', 'user_email',array('id' => $userValue->user_id)) ?></td>
                                              
                                                <td>$<?php echo $userValue->paid_amount; ?></td>
                                               
                                                <td><?php echo $userValue->txn_id; ?></td>
                                                <td><?php echo $userValue->plan_interval; ?></td>

                                                <td><?php echo ucfirst($userValue->status); ?></td>

                                                <td>
                                                  <?php if($userValue->status == 'active'){?>
                                                    <a href="<?php echo site_url();?>/admin/payment-management/cancel?id=<?php echo $userValue->id;?>">Cancel Subscription</a>
                                                  <?php } else{?>
                                                      Already Cancelled
                                                  <?php } ?>
                                                  </td>
                                            </tr>
                                             <?php } }else{ ?>
                                              <tr>
                                                <td colspan="5">No. Data Found.</td>
                                              </tr>
                                              <?php } ?>
                                              
                                          </tbody>
                                        </table>
                                        </div>
                                     </div>
                                </div>
                               
                           </div>

                     </div>
                     
                     
                     
                 </div>
             </div>