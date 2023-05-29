<div class="row">
        <div class="col-lg-12">
          
          <div class="card das_warp">
            <div class="card-body">
              
               <a href="<?php echo site_url();?>/admin/media-management/" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a>
              <h2 class="efri">All Videos</h2>

               <h1 class="ste_p2">Course Resources</h1>
              
             
<div class="row">
<?php if(!empty($userDetails)){
                                              foreach ($userDetails as $userValue) {
                                               
                                             ?> 
<div class="col-lg-3">

          <!-- Card with an image on top -->
          <div class="card">
            <input type="hidden" name="user_id" value="<?php echo $userValue->user_id;?>">
            <input type="hidden" name="video_id" value="<?php echo $userValue->id;?>">
            <div class="card-body"> 
              <h5 class="card-title">Step 0<?php echo $userValue->step; ?></h5>
              <p class="card-text">
              <video width="320" height="240" controls>
  <source src="<?php echo base_url();?><?php echo $userValue->video_file; ?>" type="video/mp4">

</video>
              </p>
            </div>

             <div class="social__icon">
                    <ul>
                        <li><a class="shareBtn shareBtnFBDetails" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                        <li><a class="twitterBtnDetails" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                        <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                    </ul>
                </div>


            

          </div><!-- End Card with an image on top -->
        </div>

<?php } }else{ ?>
                                           
                                                <div>No. Data Found.</div>
                                             
                                              <?php } ?>

   



            </div>




          </div>
        </div>
          </div>




        </div>