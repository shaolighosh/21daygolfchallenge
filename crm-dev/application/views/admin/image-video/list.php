<div class="content">
                 <div class="container-fluid">
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Image/Audio/Video/Document Management</h1>
                        <div class="date-wise-search">
                            <div class="addsection"><a href="<?php echo base_url();?>admin/image-audio-video-managment/add" class="addBtn">Add</a></div>
                        </div>
                      </div>
                     <div class="content-pages-inner">
                          
                         
                           <div class="row">
                            

                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-cards coursesSec innerTable">
                                        <div class="table-responsive">
                                           <?php if($this->session->flashdata('success')){ ?>
                                             

                                               <div class="alert alert-success">
                                                <?php echo $this->session->flashdata('success');?>
                                              </div>



                                            <?php } ?>
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>File Type</th>
                                               <th>Content</th>   
                                              <!--<th>Size/Duration</th> -->
                                              <th width="150px">Setting</th>
                                            </tr>
                                            </thead>
                                          <tbody>

                                            <?php if(!empty($image)){
                                              foreach ($image as $imageValue) {
                                            ?>
                                             
                                            
                                            <tr>                                          
                                              <td><?php echo $imageValue->content_name;?></td>  
                                              <td><img src="<?php echo base_url();?><?php echo $imageValue->image_thumbnail;?>" alt="" width="60px;"></td> 
                                              <td><?php echo ucfirst($imageValue->content_type); ?></td>
                                              <!-- <td>5</td>
                                                <td>5</td> -->
                                                <?php
                                                 if($imageValue->content_type=='video'){
                                                  $content_type ='videoPlay';
                                                }elseif ($imageValue->content_type=='audio') {
                                                  $content_type ='audioPlay';
                                                }else{
                                                 $content_type = 'imageView';
                                                }
                                                ?>
                                                <td>
                                                    <ul class="settingBtnSec">
                                                        <!-- <li><a href="#" class="viewBtn"><i class="fa fa-eye" aria-hidden="true"></i></a></li> -->
                                                        <input type="hidden" name="device_id" value="<?php echo $imageValue->content_id;?>" class="content_id">
                                                        <li><a href="javascript:void(0)" class="editBtn <?=$content_type;?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                        <li><a onclick="return confirm(' you want to delete?');" href="<?php echo base_url().admin;?>image-audio-video-managment/delete/<?php echo $imageValue->content_id;?>" class="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul> 
                                                </td>
                                            </tr>

                                            <?php  } }else{ ?>
                                              <tr><td colspan="3">No. Data Found.</td></tr>
                                            <?php }  ?>
                                             
                                          </tbody>
                                        </table>
                                        </div>
                                     </div>
                                </div>
                               
                           </div>

                     </div>
                     
                     
                     
                 </div>
             </div>