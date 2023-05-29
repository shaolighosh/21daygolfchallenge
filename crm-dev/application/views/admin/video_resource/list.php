<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Video Resource Management</h1>
                      </div>
                     
                     <div>
                      <!--<a href="<?php echo site_url(); ?>/admin/video_management/add"><button type="submit" class="btn btn-primary action-button" data-toggle="modal" data-target="#exampleModal">Add Video</button></a>-->
                     </div>
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
                                             
                                            
                                             
                                              <th>Step No</th>
                                           <!--    <th>User Email</th> -->
                                                 <th>Video URL</th> 
                                              
                                               <th width="100px">Action</th> 
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <?php if(!empty($media)){
                                              foreach ($media as $media) {
                                              // echo $step->id;
                                            //  echo $media->step_id;
                                         $step_id =$media->step_id;
                                              $data = $this->Common_model->dbQuery("SELECT * FROM `golfersu_steps` WHERE id ='".$step_id."'");
                                             // echo "SELECT * FROM `golfersu_steps` WHERE id ='".$step_id."'";
                                             //   $count = count($data); 
                                             // print_r($data);//die();
                                              $i = 0;
                                             ?> 
                                            <tr>                                          
                                              <td><?php echo $media->step_id; ?></td>   
                                           <!--    <td><?php //echo $count?></td> -->
                                           <td><?php echo $media->video_file; ?></td> 
                                            
                                                <td>
                                                    <ul class="settingBtnSec">
                                                        <li><a href="<?php echo site_url(); ?>/admin/video-management/edit/<?php echo $media->id; ?>" class="editBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> 
                                                       <!-- <li><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url(); ?>admin/video-management/delete/<?=$media->id?>" class="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></li>-->
                                                    </ul>
                                                </td> 
                                            </tr>
                                             <?php $i++; } }else{ ?>
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