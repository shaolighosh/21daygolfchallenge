<div class="stap_top__wrapper">
  <form id="msform">
    <fieldset class="custom-field">
      
      <div class="card das_warp">
        <div class="card-body">
          
           <!-- <a href="#" class="ar_row"><img src="<?php echo base_url();?>public/assets/img/arrow.jpg"></a> -->
          <h2 class="efri-text">All Videos</h2>

           <h1 class="ste_p2">My Videos</h1>
          
         
<div class="row mb60">



    <?php if(!empty($userVideos)){
      foreach($userVideos as $userVideo){
      ?>
      <div class="col-lg-3">

      <!-- Card with an image on top -->
      <div class="card custom-card">
      <video class="shareVideo" controls>
      <source src="<?php echo base_url();?><?php echo $userVideo->video_file;?>" type="video/mp4"></source>
       </video>
        <!-- <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->Common_model->getValue('golfersu_user', 'first_name',array('id' => $userVideo->user_id));?> <?php echo $this->Common_model->getValue('golfersu_user', 'last_name',array('id' => $userVideo->user_id));?></h5> 
          <h5 class="card-title">Step <?php echo $userVideo->step;?></h5>
          <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div>

        <!-- <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div> -->
      </div><!-- End Card with an image on top -->
    </div>
    <?php } }?>
    

    

    



        </div>


<!-- <h1 class="ste_p2">My Videos</h1>

<div class="row">

<div class="col-lg-3">

      
      <div class="card custom-card">
        <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card with an image on top</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div>

      </div>
    </div>

<div class="col-lg-3">

      
      <div class="card custom-card">
        <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card with an image on top</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div>
      </div>
    </div>

    <div class="col-lg-3">

      
      <div class="card custom-card">
        <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card with an image on top</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div>
      </div>
    </div>

    <div class="col-lg-3">

      
      <div class="card custom-card">
        <img src="<?php echo base_url();?>public/assets/img/video.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card with an image on top</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="viw_ago"><p>1.5m Views | 24 Hours ago</p></div>
      </div>
    </div>



        </div>

      </div> -->
    </div>
   </fieldset>
   </form>
   </div>   