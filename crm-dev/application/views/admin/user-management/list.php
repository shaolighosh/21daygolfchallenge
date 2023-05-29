<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Student Management</h1>
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
                                            
                                        </div>

                                  <div class="search-bar">
                                     
                                    <label> Country</label>
                                        <select name="country_id">
                                      <option value="">Select Country</option>
                                      <?php if(!empty($countries)){
                                        foreach ($countries as $country) {
                                         ?>
                                          <option value="<?php echo $country->id;?>" <?php if(isset($_GET['country_id'])){ if($country->id == $_GET['country_id'] ){ echo "Selected";} } ?>><?php echo $country->country_name;?></option>
                                      <?php  } } ?>
                                     

                                    </select>
                                  </div>
                                  <div class="search-bar">
                                   
                                  <label> City</label>
                                      <input type="text" name="city" value="<?php if(isset($_GET['city'])){ echo $_GET['city']; }?>" placeholder="City" title="city">
                                      <!-- <button type="submit" title="Search">Search</button> -->
                                </div>

                                <div class="search-bar" style="padding-top: 24px;">
                                   
                                  <!-- <label> City</label>
                                      <input type="text" name="city" value="<?php if(isset($_GET['city'])){ echo $_GET['city']; }?>" placeholder="City" title="city"> -->
                                      <button type="submit" title="Search">Search</button>
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
                                              <th>ID</th>
                                              <th>Student Email</th>
                                             
                                              <th>Name</th>
                                                <th>Student Image</th>
                                                <th>City</th>
                                                <th>Country</th>
                                                <!-- <th>Status</th> -->
                                                <th>Status</th>
                                         <th width="150px">Action</th> 
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <?php if(!empty($users)){
                                              foreach ($users as $userValue) {
                                               
                                             ?> 
                                            <tr>                                          
                                              <td>#<?php echo $userValue->id; ?></td>   
                                              <td><?php echo $userValue->user_email; ?></td>
                                              
                                                <td><?php echo $userValue->first_name.' '. $userValue->last_name; ?></td>
                                                <td>
                                                  <?php if($userValue->user_image != ''){ ?>
                                                  <span class="userthumb"><img width="150px" src="<?php echo base_url();?><?php echo  $this->Common_model->getValue('golfersu_user','user_image', array('id' => $userValue->id));?>" alt=""></span>
                                                <?php }else{?>
                                                  <span class="userthumb"><img width="100px" src="<?php echo base_url();?>public/assets/img/No_image_available.svg.png" alt=""></span>
                                                <?php } ?>
                                                </td>
                                                <td><?php echo $userValue->city; ?></td>
                                                <td><?php echo  $this->Common_model->getValue('golfersu_signup_countries','country_name', array('id' => $userValue->country_id));?></td>
                                                <td>
                                                    <ul class="apprBtnSec">
                                                      <?php if($userValue->status=='Y'){
                                                        $a = '0';
                                                       ?> 
                                                        <li><a onclick="return confirm('Are you sure want to Disable?');" href="<?php echo site_url();?>/admin/user-management/inactiveStatus/<?php echo $userValue->id;?>" class="apprBtn">Active</a></li>
                                                      <?php }else{
                                                        $a = '1';
                                                       ?>
                                                        <li><a onclick="return confirm('Are you sure want to Enable?');" href="<?php echo site_url();?>/admin/user-management/activeStatus/<?php echo $userValue->id;?>" class="notApprBtn">Inactive</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="settingBtnSec">
                                                        <li><a href="<?php echo site_url(); ?>/admin/user-management/edit/<?php echo $userValue->id; ?>" class="editBtn"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo site_url(); ?>/admin/user-management/show/<?php echo $userValue->id; ?>" class="editBtn"><i class="fa fa-eye" aria-hidden="true"></i></a></li>

                                                        <li><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url(); ?>/admin/user-management/delete/<?=$userValue->id?>" class="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                             <?php } }else{ ?>
                                              <tr>
                                                <td colspan="8">No. Data Found.</td>
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