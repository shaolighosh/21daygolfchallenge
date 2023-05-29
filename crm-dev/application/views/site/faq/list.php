


<div class="stap_top__wrapper rewards-page">
    <div class="wrapper wrapper-content animated fadeInRight">
        <fieldset class="custom-field">
            <div class="card">
                <div class="card-body">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="ibox-content m-b-sm border-bottom">
                <div class="text-center p-lg">
                    <h2 class="tab-titel">FAQ</h2>
                    
                </div>
            </div>
            
            <?php if(!empty($faqs)){
                $i = 0;
                foreach ($faqs as $faq) {
                 ?>
         <div class="allfaq-item">
            <div class="faq-item">
                <div class="row">
                    <div class="col-md-12">
                        <a data-toggle="collapse" href="#faq<?php echo $i;?>" class="faq-question"><?php echo $faq->title;?></a>
                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="faq<?php echo $i;?>" class="panel-collapse collapse ">
                            <div class="faq-answer">
                                <p>
                                   <?php echo $faq->content;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php $i++; } } ?>
           
        </div>
    </div>
    </div>
   </fieldset>
</div>
</div>