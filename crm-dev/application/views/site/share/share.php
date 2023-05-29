<section class="signup__body__wrapper">
        <div class="container">
            <div class="signup__body__top">
                <h2><?php echo $userDetails->first_name;?> <?php echo $userDetails->last_name;?></h2>
                <p>
                    Click to vote for your favorite video.
                </p>
            </div>
        </div>
    </section>
   
    <section class="signup__body__form-section">
        <div class="container">
            <div class="col-md-12 custom-table">
            <div class="table-responsive">
                <div class="share-video">
                <?php if(!empty($userVideos)){
                  foreach($userVideos as $userVideo){
                    $row = $this->Common_model->numrows('golfersu_user_video_votes',array('user_step_video_id' =>  $userVideo->id));
                    ?>
                    
                    <div class="externamShare">
                    <input type="hidden" value="<?php echo $userVideo->id;?>" name="external_video_id">
                    <!-- <span>Step <?php echo $userVideo->step;?></span> -->
                    <span class="sharevd">
                    <video class="externamShare" width="300" height="300" controls>
                        <source src="<?php echo base_url();?><?php echo $userVideo->video_file;?>" type="video/mp4">
                        
                        Your browser does not support the video tag.
                    </video>
                    </span>
                    <span class="share-vote"><button class="externalvote" href="javascript:void(0);">Click to vote</button></span>
                    
                  </div>
                  
                  <?php }
                }?>

                </div>
                  
                  
                
            </div>
          </div>
        </div>
    </section>
 