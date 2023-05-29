<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Media Management</h1>
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
                                        </div>

                                
                              </form>



                              </div>

                         
                           <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-cards coursesSec innerTable">
                                        <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                             
                                            
                                             
                                              <th>Student Name</th>
                                              <th>Student Email</th>
                                                <th>No of uploaded Videos</th>
                                                <th>Course Status</th>
                                               <th width="100px">Action</th> 
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <?php if(!empty($users)){
                                              foreach ($users as $userValue) {
                                               
                                             ?> 
                                            <tr>                                          
                                              <td><?php echo $userValue->first_name.' '.$userValue->last_name; ?></td>   
                                              <td><?php echo $userValue->user_email; ?></td>
                                              <?php 
                                               $media = $this->Common_model->dbQuery('SELECT * FROM `golfersu_userstep_video` WHERE `user_id`='.$userValue->id.'');
                                               $count = count($media);
                                             

                                              ?>
                                                <td><?php echo $count; ?></td>
                                               
                                                <td>
                                                    <ul class="apprBtnSec">
                                                      <?php if($userValue->status=='Y'){
                                                        $a = 'Y';
                                                       ?> 
                                                        <li><a href="void:javascript(0);" class="apprBtn">Completed</a></li>
                                                      <?php }else{
                                                        $a = '1';
                                                       ?>
                                                        <li><a href="void:javascript(0);" class="notApprBtn">Ongoing</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="settingBtnSec">
                                                        <li><a href="<?php echo site_url(); ?>/admin/media-management/view/<?php echo $userValue->id; ?>" class="editBtn"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                        <!--<li><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url(); ?>/admin/media-management/delete/<?=$userValue->id?>" class="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></li>-->
                                                    </ul>
                                                </td> 
                                            </tr>
                                             <?php } }else{ ?>
                                              <tr>
                                                <td colspan="7">No. Data Found.</td>
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