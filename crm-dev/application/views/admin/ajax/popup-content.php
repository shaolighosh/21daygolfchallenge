<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 video-list-right">
  <input type="hidden" name="order_row" class="order_row" value="<?php echo $_POST['order'];?>">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Image</a></li>
                    <li><a data-toggle="tab" href="#menu1">Video</a></li>
                    <li><a data-toggle="tab" href="#menu2">Audio</a></li>
                   
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <table class="table table-bordered table-hover">
                        
                          <tr>
                            <td>No</td>
                            <th>Content Image</th>
                            <td>Content Name</td>
                            <td>Action</td>
                          </tr>
                          <tbody class="imageContent">
                            <?php if(!empty($image)){
                              $i=1;foreach ($image as $imageValue) {
                              ?>
                            <tr>
                              <td><?php echo $i;?></td>
                              <td><img src="<?php echo base_url();?><?php echo $imageValue->image_thumbnail;?>" alt="" width="60px;"></td>
                              <td><?php echo $imageValue->content_name;?></td>
                              <input type="hidden" name="content_id" value="<?php echo $imageValue->content_id;?>" class="content_id">
                              <td><a href="javascript:void(0)" class="addContentRow"><i class="fa fa-plus"></i></a></td>
                            </tr>
                            <?php $i++; } }else{ ?>
                              <tr>
                                <td colspan="4">No. Data Found.</td>
                              </tr>
                            <?php } ?>                                                      
                          </tbody>
                      </table>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <table class="table table-bordered table-hover">
                        <tr>
                          <th>No</th>
                          <th>Content Video</th>
                          <th>Content Name</th>
                          <th>Action</th>
                        </tr>
                        <tbody class="videoContent">
                        <?php if(!empty($video)){
                          $i=1;foreach ($video as $videoValue) {
                         ?>
                         <tr>
                           <td><?php echo $i;?></td>
                              <td><img src="<?php echo base_url();?><?php echo $videoValue->image_thumbnail;?>" alt="" width="60px;"></td>
                              <td><?php echo $videoValue->content_name;?></td>
                              <input type="hidden" name="content_id" value="<?php echo $videoValue->content_id;?>" class="content_id">
                              <td><a href="javascript:void(0)" class="addContentRow"><i class="fa fa-plus"></i></a></td>
                         </tr>

                        <?php $i++; } }else{ ?>
                          <tr>
                              <td colspan="4">No. Data Found.</td>
                          </tr>
                        <?php } ?>                                             
                        </tbody>
                      </table>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <table class="table table-bordered table-hover">
                        <tr>
                          <th>No</th>
                          <th>Content Audio</th>
                          <th>Content Name</th>
                          <th>Action</th>
                        </tr>
                        <tbody class="audioContent">
                        <?php if(!empty($audio)){
                          $i=1;foreach ($audio as $audioValue) {
                         ?>
                         <tr>
                           <td><?php echo $i;?></td>
                              <td><img src="<?php echo base_url();?><?php echo $audioValue->image_thumbnail;?>" alt="" width="60px;"></td>
                              <td><?php echo $audioValue->content_name;?></td>
                              <input type="hidden" name="content_id" value="<?php echo $audioValue->content_id;?>" class="content_id">
                              <td><a href="javascript:void(0)" class="addContentRow"><i class="fa fa-plus"></i></a></td>
                         </tr>

                        <?php $i++; } }else{ ?>
                          <tr>
                              <td colspan="4">No. Data Found.</td>
                          </tr>
                        <?php } ?>                                             
                        </tbody>
                      </table>
                    </div>
                  </div>
                
            </div>
            