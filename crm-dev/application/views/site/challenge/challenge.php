<div class="stap_top__wrapper">
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li <?php if(empty($progress)){?> class="active" <?php }?>  id="introduction"><strong>Introduction</strong></li>
                    <li  id="introduction1"><strong>Meet Jimmy</strong></li>
                    <!-- <li  id="account"><strong>Step 1</strong></li> -->
                    <li   id="personal"><strong>Step 1</strong></li>
                    <li <?php if(!empty($progress)){ if($progress[0]->step_id == 1){?> class="active" <?php } }?> id="payment"><strong>Step 2</strong></li>
                    <li <?php if(!empty($progress)){ if($progress[0]->step_id == 2){?> class="active" <?php } }?> id="confirm"><strong>Step 3</strong></li>
                    <li <?php if(!empty($progress)){ if($progress[0]->step_id == 3){?> class="active" <?php } }?> id="confirm2"><strong>Step 4</strong></li>
                    <li <?php if(!empty($progress)){ if($progress[0]->step_id == 4){?> class="active" <?php } }?> id="confirm2"><strong>Step 5</strong></li>
                    <li <?php if(!empty($progress)){ if($progress[0]->step_id == 5){?> class="active" <?php } }?> id="confirm2"><strong>Step 6</strong></li>
                    
                     <li <?php if(!empty($progress)){ if($progress[0]->step_id == 6){?> class="active" <?php } }?> id="confirm2"><strong>Step 7</strong></li>

                </ul>

                <fieldset class="first-tab custom-bullets" <?php if(!empty($progress)){ echo "style='display:none'";}?>>
                     <?php echo $introData->content;?>

                    
                    
                            
                         <input type="button" name="next" class="next action-button" value="Lets get started" />
                </fieldset>

                 <fieldset class="first-tab custom-bullets" <?php if(!empty($progress)){ echo "style='display:none'";}?>>
                    <p>Coming Soon</p>
                     <!-- <h2 class="tab-titel">Please follow the below mentioned steps to complete the 21-day Challenge Masterclass</h2>
                    <p><span>1</span> Click on the steps to view the course material for each step.</p>
                    <p><span>2</span> Once you complete each step, please verify by clicking on the checkbox "I have completed the step".</p>
                    <p><span>3</span> Once you complete each step, you will be given the option to upload your learning video and share it fo the 21-day challenge masterclass
                    community and also to share the video on your social media with your family and friends.</p>
                    <p><span>4</span> Each likes and share on your video will be counted as a vote.</p>
                    <p><span>5</span> Based on each vote, you will unlock different levels. Each level has rewards that include Freebies and prizes.<p>
                    <p><span>6</span> Once you complete the step 5, you will complete the 21-day challenge masterclass course.</p> -->

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />    
                         <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>



                <!-- Step 1 -->
                <fieldset <?php if(!empty($progress)){ ?> style="display:none;"<?php  }?> >
                    <input type="hidden" value="" class="uploadedShareVideo">
                    <input type="hidden" name="step" class="step" value="1">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                         
                        </span> -->
                        <iframe allowfullscreen src="<?php echo $stepData[0]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>


                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html">
                            <label for="html">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                      
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                   
                                </h3>
                                 <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>

                                <?php if(!empty($stepUserVideo1)){
                                    foreach($stepUserVideo1 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo base_url().$videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?> <span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                               <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <input type="hidden" name="share_video_url" value="">

                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                    </div>
                    
                    <div class="video__section">
                        <div class="video__left">

                         <?php if(!empty($stepUserVideo1)){
                                    foreach($stepUserVideo1 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                               <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" />
                </fieldset>


                <!-- Step 1 Ends Here -->

                <!-- Step 2 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 1){?> style="display:block;"<?php } }?>>
                <input type="hidden" value="" class="uploadedShareVideo">
                <input type="hidden" name="step" class="step" value="2">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                         

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                         <iframe allowfullscreen src="<?php echo $stepData[1]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html1">
                            <label for="html1">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                      
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                                <?php if(!empty($stepUserVideo2)){
                                    foreach($stepUserVideo2 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?><span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">

                        <?php if(!empty($stepUserVideo2)){
                                    foreach($stepUserVideo2 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                                <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" />
                </fieldset>


                <!-- Step 2 Ends Here -->

                <!-- Step 3 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 2){?> style="display:block;"<?php } }?>>
                <input type="hidden" value="" class="uploadedShareVideo">
                <input type="hidden" name="step" class="step" value="3">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                         

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                         <iframe allowfullscreen src="<?php echo $stepData[2]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html2">
                            <label for="html2">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                      
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                                <?php if(!empty($stepUserVideo3)){
                                    foreach($stepUserVideo3 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?><span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">
                        <?php if(!empty($stepUserVideo3)){
                                    foreach($stepUserVideo3 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                               <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" />
                </fieldset>


                <!-- Step 3 Ends Here -->

                <!-- Step 4 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 3){?> style="display:block;"<?php } }?>>
                <input type="hidden" value="" class="uploadedShareVideo">
                <input type="hidden" name="step" class="step" value="4">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                        

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                         <iframe  allowfullscreen src="<?php echo $stepData[3]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html3">
                            <label for="html3">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                      
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                               <?php if(!empty($stepUserVideo4)){
                                    foreach($stepUserVideo4 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?><span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">
                        <?php if(!empty($stepUserVideo4)){
                                    foreach($stepUserVideo4 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                                <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" /> 
                </fieldset>

                <!-- Step 4 Ends Here -->


                <!-- Step 5 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 4){?> style="display:block;"<?php } }?>>
               
                <input type="hidden" value="" class="uploadedShareVideo">
                 <input type="hidden" name="step" class="step" value="5">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                        

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                        <iframe allowfullscreen src="<?php echo $stepData[4]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html4">
                            <label for="html4">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                     
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                               <?php if(!empty($stepUserVideo5)){
                                    foreach($stepUserVideo5 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?> <span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">

                         <?php if(!empty($stepUserVideo5)){
                                    foreach($stepUserVideo5 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                                <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" /> 
                </fieldset>

                <!-- Step 5 Ends Here -->

                <!-- Step 6 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 5){?> style="display:block;"<?php } }?>>
                
                <input type="hidden" value="" class="uploadedShareVideo">
                 <input type="hidden" name="step" class="step" value="6">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                        

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                        <iframe  allowfullscreen src="<?php echo $stepData[5]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html4">
                            <label for="html4">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                     
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                               <?php if(!empty($stepUserVideo6)){
                                    foreach($stepUserVideo6 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?> <span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">

                         <?php if(!empty($stepUserVideo6)){
                                    foreach($stepUserVideo6 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                                <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <input type="button" name="next" class="next action-button" value="Next" />
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" />
                </fieldset>

                <!-- Step 6 Ends Here -->


                 <!-- Step 7 -->
                <fieldset <?php if(!empty($progress)){ if($progress[0]->step_id == 6){?> style="display:block;"<?php } }?>>
                
                <input type="hidden" value="" class="uploadedShareVideo">
                 <input type="hidden" name="step" class="step" value="7">
                    <div class="parentSection">
                    <h2 class="tab-titel">Learning Video</h2>
                    <div class="vedeo padd0">
                        <!-- <span><a href="#">
                        <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a>
                        

                        </span> -->
                        <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                        <iframe allowfullscreen src="<?php echo $stepData[6]->video_file;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                        
                       
                    </div>
                    <div class="new">
                          
                        <div class="form-group">
                            <input type="checkbox" class="completedVideo" id="html4">
                            <label for="html4">I have completed the step</label>
                        </div>
                        
                      </div>
                      <div class="file-upload" style="display:none;">
                     
                      <input type="hidden" name="check_video" class="check_video" value="">
                        <div class="file-upload-left-wrapper" >
                            <div class="file-upload-left">
                                <img src="<?php echo base_url();?>public/assets/img/file-upload-icon.png" alt="">
                                <h3>Drag and Drop files to upload
                                    <br>
                                    or
                                    <br>
                                    <input type="file" accept="video/*" class="imageInput">
                                    <button for="imageInput">Browse</button>
                                    <p>Supported files : MP4, MPEG, AVI</p>
                                    <p>Upload limit 10MB</p>
                                    
                                </h3>
                                <p class="fileError" style="display:none;" style="color:red"></p>
                            </div>
                        </div>
                        <div class="file-upload-right" >
                            <div class="file-upload-progressbar-wrapper">
                                <h3>Uploaded File</h3>
                               <?php if(!empty($stepUserVideo7)){
                                    foreach($stepUserVideo7 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                         <div class="file-upload-progressbar">
                                            <div class="filename">
                                            <input type="hidden" value="<?php echo $videoData1->id;?>" name="delete_video_id">
                                            <?php echo $videoName[count($videoName) - 1];?> <span class="removeVideo"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>

                                    <?php }
                                }?>
                                <div class="fileUploadAjax"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <input type="hidden" name="share_video_url" value="">
                    <div class="shareSection" style="display:none;">
                    <div class="video__topsection">
                        <div class="video__topsection__left">
                            Uploaded Videos
                        </div>
                        <!-- <div class="video__topsection__right">
                            <ul>
                                <li><a href="#">Back to Step 1</a></li>
                                <li><a href="#">Upload more videos</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="video__section">
                        <div class="video__left">

                         <?php if(!empty($stepUserVideo7)){
                                    foreach($stepUserVideo7 as $videoData1){
                                        $videoName = explode('/',$videoData1->video_file);

                                        ?>
                                    <div class="video__left-div">
                                        <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                        <video class="shareVideo" width="500" height="300" controls>
                                            <source src="<?php echo base_url().$videoData1->video_file;?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                            <?php }}?>

                            <div class="video__left-div">
                                <!-- <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                                <!-- <img src="<?php echo base_url();?>public/assets/img/v2.png" alt=""> -->
                                <video class="shareVideo" width="500" height="300" controls>
                                    <source src="" type="video/mp4">
                                    
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="video__right">
                            <div class="video__right__top">
                                <h4>Share your video into internal community</h4>
                                <a href="javascript:void(0);" class="shareInternal"><img src="<?php echo base_url();?>public/assets/img/she.png" alt=""> Share</a>
                            </div>
                            <div class="video__right__con">  Want more reward point? </div>
                            <div class="video__right__con">Share into your Personal Social Media Account</div>
                            <div class="social__icon">
                                <ul>
                                    <li><a class="shareBtn shareBtnFB" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/f.png" alt=""></a></li>
                                    <li><a class="twitterBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/t.png" alt=""></a></li>
                                    <!-- <li><a class="shareBtn" href="javascript:void(0);"><img src="<?php echo base_url();?>public/assets/img/p.png" alt=""></a></li> -->
                                </ul>
                            </div>

                            <!-- <div class="message"><img src="<?php echo base_url();?>public/assets/img/mass.png" alt=""><span>3</span> Jimmy’s Message </div> -->
                        </div>
                    </div>

                    </div>
                    

                    
                    
                        <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                         <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                         <input type="button" name="next" class="nextShare action-button" value="Next" style="display:none;" />
                </fieldset>

                <!-- Step 7 Ends Here -->
                
                
            </form>
        </div>