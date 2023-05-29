
<div class="stap_top__wrapper">
  <form id="msform">
    <fieldset class="custom-field">
      <div class="card das_warp">
        <div class="card-body">
          
         <!--  <a href="<?php echo site_url();?>/voting-management" class="ar_row">
          <img src="<?php echo base_url();?>public/assets/img/arrow.jpg">
             
          </a> -->
          <h2 class="efri-text">All Votes</h2>


          <div class="row mb60">

          <?php if(!empty($progress)){
              foreach($progress as $progressVal){
                ?>

            <div class="col-lg-3">

              <!-- Card with an image on top -->
              <div class="card custom-card">
             <video class="shareVideo" width="200" height="200" controls>
                    <source src="<?php echo base_url();?><?php echo $progressVal->video_file;?>" type="video/mp4">
                    
                    Your browser does not support the video tag.
                </video>
              </div><!-- End Card with an image on top -->
            </div>
      
        <?php  }  }?>
        

    

    



        </div>

          
         <div class="col-lg-6">
         


         





       <div class="fro_m">
       <input type="hidden" name="voteDetailsId" class="voteDetailsId" value="<?php echo $stepId;?>">
          <table>
            <!-- <tr>
              <th>Recent Tier Name :</th>
              <th><b>Birdie</b></th>
            </tr> -->
            <tr>
              <!-- <td>Recent Completed Masterclass : </td> -->
              <td><b>Step <?php echo $stepId;?></b></td>
              
            </tr>
             <tr>
              <td>No. of Votes : </td>
              
              <td><b><?php echo $voteCount;?></b></td>
            </tr>

               </table>
                <div class="social__icon">
                    <ul>
                        <li><a class="shareBtn shareBtnFBDetails" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                        <li><a class="twitterBtnDetails" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                        <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                    </ul>
                </div>

               <a href="<?php echo site_url();?>/voting-management" class="btn btn-primary w-100 action-button" type="submit">Back</a>

          </div> </div>

        </div>
        </div>
      </div>
    </fieldset>
  </form>
</div>
