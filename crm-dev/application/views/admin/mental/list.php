<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Mental Imagery Management</h1>
                      </div>
                            <a href="<?php echo site_url(); ?>/admin/mental-management/add"><button type="submit" class="btn btn-primary action-button" data-toggle="modal" data-target="#exampleModal">Add </button></a>
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
                          
                         
                           <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-cards coursesSec innerTable">
                                        <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                             
                                            
                                             
                                              <th>Step Id</th>
                                              <th>Lesson Name</th>
                                              <th>Golfers Name</th>
                                              <th width="100px">Action</th> 
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <?php if(!empty($mental)){
                                              foreach ($mental as $mentalValue) {
                                               
                                             ?> 
                                            <tr>                                          
                                              <td><?php echo $mentalValue->step_id; ?></td>   
                                              <td><?php echo $mentalValue->lesson_name; ?></td>
                                              
                                                <td><?php echo $mentalValue->golfers_name; ?></td>
                                               
                                                
                                                <td>
                                                    <ul class="settingBtnSec">
                                                        <li><a href="<?php echo site_url(); ?>/admin/mental-management/edit/<?php echo $mentalValue->id; ?>" class="editBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
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