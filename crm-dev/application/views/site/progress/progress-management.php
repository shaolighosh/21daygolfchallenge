
<div class="stap_top__wrapper">
  <form id="msform" method="post" action="<?php echo site_url(); ?>/admin/promo-code/add" enctype="multipart/form-data">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
           <a href="<?php echo site_url(); ?>/rewards" class="btn btn-primary">Rewards Program</a>
          <h2 class="efri-text">Progress Tracker </h2>
          <div class="content-pages-inner">
                      <div class="drillviewSec">
                          <div class="settingsSec">

                            <?php if($this->session->flashdata('success')){?>

                              <div class="alert alert-success">
                              <?php echo $this->session->flashdata('success');?>
                            </div>


                            <?php } ?>
                            


                             <?php 
                              $attributes = array('id' => 'formSettings');
                              echo form_open('promo-code/add', $attributes);
                              $countData = 0;
                              if(!empty($progress)){ 

                                $baseDays = 21;
                                if($progress[0]->step_id == 1){
                                  $countData =  round((1/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 2) {
                                  $countData =  round((1/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 3) {
                                    $countData =  round((4/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 4) {
                                    $countData =  round((8/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 5) {
                                    $countData = round((12/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 6) {
                                  $countData =  round((15/$baseDays) * 100);
                                }
                                elseif ($progress[0]->step_id == 7) {
                                    $countData =  round((18/$baseDays) * 100);
                                }
                                else{
                                  $countData = 0;
                                }
                                
                              }
                              else{
                                $countData = 0;
                              }

                              ?>
                                  
                                  
                                  <div class="form-group">
                                    <label>Current Step: <?php if(!empty($progress)){ echo $progress[0]->step_id;}?></label>
                                    
                                  </div>
                                   <div class="form-group">
                                    <label>Overall Progress</label>
                                    <progress  class="form-control" id="file" value="<?php echo $countData;?>" max="100" style="padding: 5px;height: 25px;"> <?php echo $countData;?>% </progress><?php echo $countData;?>% 

                                    
                                    
                                  </div>
                                  <?php /*
                                  <div class="form-group">
                                    <label>Unlocked Tiers and Rewards</label>
                                    <?php

                                    $rewardData =  $this->Common_model->dbQuery("SELECT SUM(`reward_point`) AS reward FROM golfersu_user_rewards where user_id = '".$this->session->userdata('user_id')."'");

                                     
                                    ?>
                                    <?php 

                                    if($rewardData[0]->reward  >= 100 && $rewardData[0]->reward <= 199){?>
                                      10% off: 100 points
                                    <?php } elseif ($rewardData[0]->reward >= 200 && $rewardData[0]->reward <= 249) {
                                      ?>
                                       20% off: 200 points
                                    <?php }
                                    elseif ($rewardData[0]->reward >= 250 && $rewardData[0]->reward <= 299) {
                                      ?>
                                       Free GolfersU t-shirt: 250 points (shipping extra)

                                    <?php }
                                    elseif ($rewardData[0]->reward >= 300 && $rewardData[0]->reward <= 399) {
                                      ?>
                                      30% off: 300 points
                                       Free GolfersU lesson: 300 points
                                    <?php }
                                    elseif ($rewardData[0]->reward >= 400 && $rewardData[0]->reward <= 499) {
                                      ?>
                                       40% off: 400 points
                                    <?php }
                                    elseif ($rewardData[0]->reward >= 500) {
                                      ?>
                                       50% off: 500 points
                                    <?php }
                                    else{
                                      ?>
                                      Total Points : <?php echo $rewardData[0]->reward;?>
                                    <?php }
                                    ?>
                                    
                                  </div>
                                  */?>

                                  

                                 
                                  
                             
                                  <!-- <button type="submit" class="btn btn-primary action-button" data-toggle="modal" data-target="#exampleModal">Submit</button> -->
                              </form>
                          </div>
                      </div>
          </div>
        </div>
      </div>                   
    </fieldset>
  </form>
</div>