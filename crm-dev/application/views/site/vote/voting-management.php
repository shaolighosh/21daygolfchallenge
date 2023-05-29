
<div class="stap_top__wrapper">
  <form id="msform">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          <!-- <a href="#" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a> -->
          <h2 class="efri-text">All Votes</h2>
          <div class="col-md-12 custom-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Level Name</th>
                    <th scope="col">Video Thumbnails</th>
                    <th scope="col">No. of Votes</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($userVideos)){
                  foreach($userVideos as $userVideo){
                    $row = $this->Common_model->numrows('golfersu_user_video_votes',array('user_step_video_id' =>  $userVideo->id));
                    $allData['progress'] = $this->Common_model->getAllData('golfersu_userstep_video',array('user_id' => $this->session->userdata('user_id'),'step' => $userVideo->step_id));
                   $allVideoId = [];
                    if(!empty($allData['progress'])){
                        $i = 0;
                        foreach($allData['progress'] as $allVideo){
                          $allVideoId[$i] = $allVideo->id;
                          $i++;
                        }

                        $voteCount =  $this->Common_model->dbQuerynumrows("select * from golfersu_user_video_votes where user_step_video_id in (".implode(',',$allVideoId).")");

                        //echo "select * from golfersu_user_video_votes where user_step_video_id in (".implode(',',$allVideoId).")";

                      }
                      else{
                        $voteCount = 0;
                      }
                    ?>
                    <tr>
                      <td>Step <?php echo $userVideo->step_id;?></td>
                      <td>

                        <video class="shareVideo" width="200" height="200" controls>
                        <source src="<?php echo base_url();?><?php echo $userVideo->video_url;?>" type="video/mp4">
                        
                        Your browser does not support the video tag.
                    </video>

                        <!-- <a target="_blank" href="<?php echo base_url();?><?php echo $userVideo->video_url;?>">
                          <img src="<?php echo base_url();?>public/assets/img/video.jpg" alt="..." class="table-image">
                        </a> -->
                      </td>
                      <td><?php echo $voteCount;?></td>
                      <td><a href="<?php echo site_url();?>/voting-management/show/<?php echo $userVideo->user_id;?>/<?php echo $userVideo->step_id;?>" class="btn btn-primary action-button">View Details</a></td>
                    </tr>
                  <?php }
                }?>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
       </div>
    </fieldset>
  </form>
</div>
