<div class="stap_top__wrapper">
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <!-- <li class="active" id="introduction"><strong>Introduction</strong></li> -->
                    <li class="active" id="account"><strong>Lessson 1</strong></li>
                    <li id="personal"><strong>Lessson 2</strong></li>
                    <li id="payment"><strong>Lessson 3</strong></li>
                    <li id="confirm"><strong>Lessson 4</strong></li>
                    <li id="confirm2"><strong>Lessson 5</strong></li>
                </ul>

                

                <fieldset class="first-tab">
                     <div class="tab-con">
                        <div class="progolfers">
                            <?php if(!empty($step1)){
                            foreach($step1 as $step1Data){
                                ?>   
                                <div class="progolfers__item"> 
                                    <a href="javascript:void(0);" class="mentalImage"><img src="<?php echo base_url();?><?php echo $step1Data->golfers_image;?>" alt=""></a>
                                    <h4><?php echo $step1Data->golfers_name;?></h4>
                                    <input type="hidden" class="hiddenVideo" value="<?php echo $step1Data->imagery_video;?>">
                                </div>
                            <?php } } ?>
                            
                            
                        </div>
                        <div class="vedeo second-tab-video">
                            <!-- <span><a href="#">
                            <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                            <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                            <div class="mentalvideo">
                            <iframe  src="<?php echo $step1[0]->imagery_video;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                            </div>
                            <!-- <video class="mentalvideo" controls preload="auto">
                                    <source src="<?php //echo base_url().$step1[0]->imagery_video;?>">
                                    
                                </video> -->
                        </div>

                    </div>
                    
                    <input type="button" name="next" class="next action-button" value="Next" /> 
                </fieldset>
                <fieldset>
                    
                   <div class="tab-con">
                        <div class="progolfers">
                            <?php if(!empty($step2)){
                            foreach($step2 as $step1Data){
                                ?>   
                                <div class="progolfers__item"> 
                                    <a href="javascript:void(0);" class="mentalImage"><img src="<?php echo base_url();?><?php echo $step1Data->golfers_image;?>" alt=""></a>
                                    <h4><?php echo $step1Data->golfers_name;?></h4>
                                    <input type="hidden" class="hiddenVideo" value="<?php echo $step1Data->imagery_video;?>">
                                </div>
                            <?php } } ?>
                            
                            
                        </div>
                        <div class="vedeo second-tab-video">
                            <!-- <span><a href="#">
                            <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                            <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                            <div class="mentalvideo">
                            <iframe  src="<?php echo $step2[0]->imagery_video;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                            </div>
                            <!-- <video class="mentalvideo" controls preload="auto">
                                    <source src="<?php echo base_url().$step2[0]->imagery_video;?>">
                                    
                                </video> -->
                        </div>

                    </div>

                    <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                    <input type="button" name="next" class="next action-button" value="Next" /> 
                </fieldset>
                <fieldset>
                     <div class="tab-con">
                        <div class="progolfers">
                            <?php if(!empty($step3)){
                            foreach($step3 as $step1Data){
                                ?>   
                                <div class="progolfers__item"> 
                                    <a href="javascript:void(0);" class="mentalImage"><img src="<?php echo base_url();?><?php echo $step1Data->golfers_image;?>" alt=""></a>
                                    <h4><?php echo $step1Data->golfers_name;?></h4>
                                    <input type="hidden" class="hiddenVideo" value="<?php echo $step1Data->imagery_video;?>">
                                </div>
                            <?php } } ?>
                            
                            
                        </div>
                        <div class="vedeo second-tab-video">
                            <span><a href="#">
                            <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span>
                            <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                            <div class="mentalvideo">
                            <iframe  src="<?php echo $step3[0]->imagery_video;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                            </div>

                            <!-- <video class="mentalvideo" controls preload="auto">
                                   <source src="<?php echo base_url().$step3[0]->imagery_video;?>">
                                    
                                </video> -->
                        </div>

                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                    <input type="button" name="next" class="next action-button" value="Next" /> 
                </fieldset>
                <fieldset>
                    <div class="tab-con">
                        <div class="progolfers">
                            <?php if(!empty($step4)){
                            foreach($step4 as $step1Data){
                                ?>   
                                <div class="progolfers__item"> 
                                    <a href="javascript:void(0);" class="mentalImage"><img src="<?php echo base_url();?><?php echo $step1Data->golfers_image;?>" alt=""></a>
                                    <h4><?php echo $step1Data->golfers_name;?></h4>
                                    <input type="hidden" class="hiddenVideo" value="<?php echo $step1Data->imagery_video;?>">
                                </div>
                            <?php } } ?>
                            
                            
                        </div>
                        <div class="vedeo second-tab-video">
                            <!-- <span><a href="#">
                            <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                            <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                            <div class="mentalvideo">
                            <iframe src="<?php echo $step4[0]->imagery_video;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                            </div>
                            <!-- <video class="mentalvideo" controls preload="auto">
                                  <source src="<?php echo base_url().$step4[0]->imagery_video;?>">
                                    
                                </video> -->
                        </div>

                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                    <input type="button" name="next" class="next action-button" value="Next" /> 
                </fieldset>
                <fieldset>
                    <div class="tab-con">
                        <div class="progolfers">
                            <?php if(!empty($step5)){
                            foreach($step5 as $step1Data){
                                ?>   
                                <div class="progolfers__item"> 
                                    <a href="javascript:void(0);" class="mentalImage"><img src="<?php echo base_url();?><?php echo $step1Data->golfers_image;?>" alt=""></a>
                                    <h4><?php echo $step1Data->golfers_name;?></h4>
                                    <input type="hidden" class="hiddenVideo" value="<?php echo $step1Data->imagery_video;?>">
                                </div>
                            <?php } } ?>
                            
                            
                        </div>
                        <div class="vedeo second-tab-video">
                            <!-- <span><a href="#">
                            <img src="<?php echo base_url();?>public/assets/img/play.png" alt=""></a></span> -->
                            <!-- <img src="<?php echo base_url();?>public/assets/img/v.png" alt=""> -->
                            <div class="mentalvideo">
                            <iframe  src="<?php echo $step5[0]->imagery_video;?>" width="640" height="360" frameborder="0" allow="autoplay;"></iframe>
                            </div>
                            <!-- <video class="mentalvideo" controls preload="auto">
                                    <source src="<?php echo base_url().$step5[0]->imagery_video;?>">
                                    
                                </video> -->
                        </div>

                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Back" />
                    
                </fieldset>
                
                
            </form>
        </div>