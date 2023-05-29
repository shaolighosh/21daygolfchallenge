 <div class="pagetitle">
      <h1>Add New Proposal</h1>
      
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Transcriber Management</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

<section class="section transcriber_management">
  

        <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12 mt-5">

                <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active"  aria-selected="true" id="step1_tab" role="tab" href="#step1">Step 01</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"  aria-selected="false" id="step2_tab" role="tab" href="#step2">Step 02</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"  aria-selected="false" id="step3_tab" role="tab" href="#step3">Step 03</a>
                      </li>
                    </ul>
                    <form method="POST" id="proposalSubmit" action="<?php echo site_url();?>/proposal">
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="step1">

                          <div class="thumb-pic">
                          <!-- <img src="<?php echo base_url();?>public/assets/img/step1.jpg" alt=""> -->
                          <!-- <table class="table" style="height: 355px; width: 524px; background-color: #eff0ef; border-color: green;" border="2px">
                            <tbody>
                                <tr style="height: 34px;">
                                <td style="width: 216.855px; height: 34px;"><strong><span style="font-size: 12pt;">&nbsp; Customer No.</span></strong></td>
                                <td style="width: 290.41px; height: 34px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_no_data" default=""></span></span></td>
                                </tr>
                                <tr style="height: 1px;">
                                <td style="width: 216.855px; height: 1px;">
                                    <p><strong><span style="font-size: 12pt;">&nbsp; Name</span></strong></p>
                                </td>
                                <td style="width: 290.41px; height: 1px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_name_data" default=""></span></span></td>
                                </tr>
                                <tr style="height: 44px;">
                                <td style="width: 216.855px; height: 44px;"><span style="font-size: 12pt;"><strong>&nbsp; Contact</strong></span></td>
                                <td style="width: 290.41px; height: 44px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_contact_data" default=""></span></span></td>
                                </tr>
                                <tr style="height: 46px;">
                                <td style="width: 216.855px; height: 46px;"><strong><span style="font-size: 12pt;">&nbsp; Email</span></strong></td>
                                <td style="width: 290.41px; height: 46px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_email_data" default=""></span></span></td>
                                </tr>
                                <tr style="height: 66px;">
                                <td style="width: 216.855px; height: 66px;"><strong><span style="font-size: 12pt;">&nbsp; Address</span></strong></td>
                                <td style="width: 290.41px; height: 66px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_address_data" default=""></span></span></td>
                                </tr>
                                <tr style="height: 52.8945px;">
                                <td style="width: 216.855px; height: 52.8945px;"><strong><span style="font-size: 12pt;">&nbsp; Lawn Size</span></strong></td>
                                <td style="width: 290.41px; height: 52.8945px;"><span style="font-size: 12pt;">&nbsp;<span style="white-space: pre-wrap" class="replaceTag customer_lwan_size_data" default=""></span></span></td>
                                </tr>
                            </tbody>
                            </table> -->
                              
                              <div class="row">
                                  <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <div class="form-inner">
                                          <label for="fname">Customer No :</label>
                                          <input type="text" id="customer_no" class="form-control" name="customer_no" value="">
                                        </div>
                                    </div> -->
                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="lname">Customer's First Name:</label>
                                        <input type="text" id="customer_name" name="customer_first_name" class="form-control" value="">
                                    </div>
                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="lname">Customer's Last Name:</label>
                                        <input type="text" id="customer_last_name" name="customer_last_name" class="form-control" value="">
                                    </div>
                                    <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Customer No :</label>
                                        <input type="text" class="form-control" id="customer_no" name="customer_no" value="">
                                    </div> -->
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Phone Number :</label>
                                        <input type="text" placeholder="(000) 000-0000" class="form-control" id="phone_number" name="phone_number" value="">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Email :</label>
                                        <input type="text" class="form-control" id="email" name="email" value="">
                                    </div>
                                  <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Address :</label>
                                        <input type="text" class="form-control" id="address" name="address" value="">
                                    </div> -->
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Street Address :</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address" value="">
                                    </div>
                                  <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Street Address Line 2 :</label><br>
                                        <input type="text" class="form-control" id="street_address2" name="street_address2" value="">
                                    </div> -->
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">City :</label>
                                    <input type="text" class="form-control" id="city" name="city" value="">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">State / Province :</label>
                                    <input type="text" class="form-control" id="state" name="state" value="">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Postal / Zip Code :</label>
                                        <input type="text" class="form-control" id="postal" name="postal" value="">
                                    </div>
                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Lawn Size (kilo sq. ft.) :</label>
                                    <input type="text" class="form-control" id="lawn_size" name="lawn_size" value="">
                                    </div>

                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Internal Comments:</label>
                                      <textarea class="form-control"  name="internal_comments" value=""></textarea>
                                    </div>

                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">External Comments :</label>
                                      <textarea class="form-control"  name="external_comments" value=""></textarea>
                                    </div>

                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Account Level Discount:</label> 
                                      <select name="discount" class="form-control">
                                      <option value="">None</option>
                                        <?php if(!empty($discount)){
                                            foreach($discount as $discountData){
                                        ?>
                                        <option value="<?php echo $discountData->id;?>"><?php echo $discountData->discount_name;?></option>
                                        <?php } } ?>
                                      </select>

                                    </div>

                                      <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Service Level Discount:</label> 
                                      <select name="discount" class="form-control">
                                        <option value="">None</option>
                                         <?php if(!empty($individual_discount)){
                                            foreach($individual_discount as $individual_discountData){
                                        ?>
                                          <option value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                        <?php } } ?>
                                        

                                        </select>

                                    </div> -->

                              </div>


                          </div>
                          <div class="btnsec">
                              <div class="btn-left"></div>
                              <div class="btn-right">
                                  <!-- <a href="javascript:void(0);" class="btn save-btn">Save</a> -->
                                <a href="javascript:void(0);" class="btn next-btn firstNext">Next</a>
                              </div>
                          </div>
                        </div>
                        
                      <div class="tab-pane fade" id="step2">
                          <div class="newformsection">
                              <!-- <div class="row mb-3">
                                      <div class="col-sm-6 col-md-6">
                                          <table class="table table-bordered custom-table2">
                                          <?php if(!empty($services)){
                                            foreach($services as $service){
                                          ?>
                                              <tr class="discountService_<?php echo $service->id;?>">
                                              <td><?php echo $service->service_name;?></td>
                                              <td>New</td>
                                              <td>$120</td>
                                              <td>New</td>
                                              <td>$120</td>
                                              </tr>
                                          <?php } } ?>
                                          </table>
                                      </div>
                                  </div> -->

                              <form>
                                  <table class="table table-bordered custom-table">
                                      <tr>
                                          <th></th>
                                          <!-- <th style="width: 3%;  word-break: break-all;">Program/ Service</th> -->
                                          <th style="width: 10%">Service</th>
                                          <th>Code</th>
                                          <th style="width: 3%;  word-break: break-all;">Recommended</th>
                                          <th style="width: 3%;  word-break: break-all;">Optional</th>
                                          <th>Size (ksf) Time (min)</th>
                                          <th>Number of Services (EOY)</th>
                                          <th>Number of Services (FY)</th>
                                          <th>System Unit Price</th>
                                          <th style="width: 3%;  word-break: break-all;">Overwrite Price</th>
                                          <th>Account Level Discount</th>
                                          <th>Service Level Discount</th>
                                          <th>Unit Price After All Discounts</th>
                                          <th>Total This Year</th>
                                          <th>Total Full Year</th>
                                      </tr>
                                      <tr class="title-sect">
                                        <td colspan="18"><h4>CORE SERVICES</h4></td>
                                      </tr>

                                      <?php if(!empty($services)){
                                        foreach($services as $service){
                                          if($service->service_type == 'core_service'){
                                             if($service->square_foot == 'yes'){
                                              $sizeData = $service->service_min_size;
                                             }
                                             else{
                                              $sizeData = $service->service_min_time;
                                             }
                                        ?>
                                         <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <!-- <td><?php echo $service->program_service;?></td> -->
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                                <select name="size[]" class="form-control">
                                                <option value="">Select</option>
                                                <?php if($sizeData != ''){

                                                  if($service->square_foot == 'yes'){
                                                    $newSize = preg_replace('/0/', '', $sizeData);
                                                    $incrementData = preg_replace('/0/', '', $service->service_incremental);
                                                  }
                                                  else{
                                                    $newSize = $sizeData;
                                                    $incrementData = $service->service_incremental;
                                                  }
                                                  ?>
                                                  <option value="<?php echo $newSize;?>"><?php echo $newSize;?></option>
                                                  <?php 
                                                  for($j = 0;$j< 10;$j++){
                                                    $newSize+=$incrementData;
                                                    ?>
                                                    <option value="<?php echo $newSize;?>"><?php echo $newSize;?></option>
                                                  <?php }
                                                }
                                                ?>
                                                </select>

                                                  <!-- <input class="form-control" type="text"  name="size[]" value="<?php echo $sizeData;?>">   -->
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" name="system_unit_price[]" value="" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service">
                                              <select name="individual_discount[]" class="form-control">
                                              <option value="">None</option>
                                              <?php if(!empty($individual_discount)){
                                                  foreach($individual_discount as $individual_discountData){
                                                    if($service->id == 1){
                                                      if($individual_discountData->id == 1){
                                                      ?>
                                                        <option value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                                      <?php }
                                                    }
                                                    else{
                                                        //if($individual_discountData->id == 2){
                                                        ?>
                                                          <option value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                                        <?php //}
                                                    }
                                                     } } ?>
                                              

                                              </select>
                                              </td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly name="total_full_year[]" class="totalFullYear"></td>
                                          </tr>
                                        
                                      <?php } } }?>
                                      
                                      
                                      <tr class="empty-sect">
                                        <td colspan="18"></td>
                                      </tr>
                                      <tr class="title-sect">
                                        <td colspan="18"><h4>OUTDOOR PEST CONTROL</h4></td>
                                      </tr>
                                      <?php if(!empty($services)){
                                        foreach($services as $service){
                                          if($service->service_type == 'outdoor_pest_service'){
                                            if($service->square_foot == 'yes'){
                                              $sizeData = $service->service_min_size;
                                             }
                                             else{
                                              $sizeData = $service->service_min_time;
                                             }
                                            //$serviceData = $this->Common_model->getSingle('',array('id' => $service->id));
                                        ?>
                                        <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <!-- <td><?php echo $service->program_service;?></td> -->
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                              <select name="size[]" class="form-control">
                                                <option value="">Select</option>
                                                <?php if($sizeData != ''){

                                                  if($service->square_foot == 'yes'){
                                                    $newSize = preg_replace('/0/', '', $sizeData);
                                                    $incrementData = preg_replace('/0/', '', $service->service_incremental);
                                                  }
                                                  else{
                                                    $newSize = $sizeData;
                                                    $incrementData = $service->service_incremental;
                                                  }
                                                  ?>
                                                  <option value="<?php echo $newSize;?>"><?php echo $newSize;?></option>
                                                  <?php 
                                                  for($j = 0;$j< 10;$j++){
                                                    $newSize+=$incrementData;
                                                    ?>
                                                    <option value="<?php echo $newSize;?>"><?php echo $newSize;?></option>
                                                  <?php }
                                                }
                                                ?>
                                                </select>
                                                  <!-- <input class="form-control" type="text"  name="size[]" value="<?php echo $sizeData;?>">   -->
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" name="system_unit_price[]" value="" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service">
                                              <select name="individual_discount[]" class="form-control">
                                              <option value="">None</option>
                                              <?php if(!empty($individual_discount)){
                                                  foreach($individual_discount as $individual_discountData){
                                                    if($individual_discountData->id == 2){
                                              ?>
                                                <option value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                              <?php } } }?>
                                              

                                              </select>
                                              </td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly name="total_full_year[]" class="totalFullYear"></td>
                                          </tr>
                                      <?php } } }?>
                                      
                                      <tr class="empty-sect">
                                        <td colspan="18"></td>
                                      </tr>
                                      <tr class="title-sect">
                                        <td colspan="18"><h4>INDIVIDUAL SERVICE</h4></td>
                                      </tr>
                                      <?php if(!empty($services)){
                                        foreach($services as $service){
                                          if($service->service_type == 'individual_service'){
                                            if($service->square_foot == 'yes'){
                                              $sizeData = $service->service_min_size;
                                             }
                                             else{
                                              $sizeData = $service->service_min_time;
                                             }
                                        ?>
                                        <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <!-- <td><?php echo $service->program_service;?></td> -->
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                             <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                                <select name="size[]" class="form-control">
                                                  <option value="">Select</option>
                                                 <option value="1">1</option>
                                                </select>
                                                  <!-- <input class="form-control" type="text"  name="size[]" value="<?php echo $sizeData;?>">   -->
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" name="system_unit_price[]" value="" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service">
                                              <select name="individual_discount[]" class="form-control">
                                              <option value="">None</option>
                                              <?php if(!empty($individual_discount)){
                                                  foreach($individual_discount as $individual_discountData){
                                                    if($individual_discountData->id == 1){
                                              ?>
                                                <option value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                              <?php } } } ?>
                                              

                                              </select>
                                              </td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly name="total_full_year[]" class="totalFullYear"></td>
                                          </tr>
                                     <?php } } }?>
                                  </table>
                                  
                                  <div class="row mb-3">
                                      <div class="col-sm-6 col-md-6">
                                          <table class="table table-bordered custom-table2">
                                              <tr>
                                                  <th>Total BEFORE Discount	</th>
                                                  <input type="hidden" name="total_before_discount" value="">
                                                  <td class="text-right totalBeforeDiscount"></td>
                                              </tr>
                                              <tr>
                                                  <th>Total AFTER ALL Discount	</th>
                                                  <input type="hidden" name="total_after_all_discount" value="">
                                                  <td class="text-right totalAfterAllDiscount"></td>
                                              </tr>
                                              <tr>
                                                  <th>Sales Tax (8.25%)	</th>
                                                  <input type="hidden" name="sales_tax" value="">
                                                  <td class="text-right salesTax"></td>
                                              </tr>
                                              <tr>
                                                  <th class="text-right">TOTAL	</th>
                                                  <input type="hidden" name="all_total" value="">
                                                  <td class="text-right allTotal"></td>
                                              </tr>
                                          </table>
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                      <input type="hidden" name="total_after_all_discount" value="">
                                      <input type="hidden" name="prepayment_discount" value="">
                                      <input type="hidden" name="sales_tax1" value="">
                                      <input type="hidden" name="total_prepaid" value="">
                                          <!-- <table class="table table-bordered custom-table2">
                                              <tr>
                                                  <th>Total AFTER ALL Discount</th>
                                                  <input type="hidden" name="total_after_all_discount" value="">
                                                  <td class="text-right totalAfterAllDiscount"></td>
                                              </tr>
                                              <tr>
                                                  <th>Prepayment Discount (5%)</th>
                                                  <input type="hidden" name="prepayment_discount" value="">
                                                  <td class="text-right prepaymentDiscount"></td>
                                              </tr>
                                              <tr>
                                                  <th>Sales Tax (8.25%)	</th>
                                                  <input type="hidden" name="sales_tax1" value="">
                                                  <td class="text-right salesTax1"></td>
                                              </tr>
                                              <tr>
                                                  <th class="text-right">TOTAL if Prepaid</th>
                                                  <input type="hidden" name="total_prepaid" value="">
                                                  <td class="text-right totalPrepaid"></td>
                                              </tr>
                                          </table> -->
                                      </div>
                                  </div>
                              </form>
                          
                          
                          </div>
                          <div class="btnsec">
                              <div class="btn-left"><a href="javascript:void(0);" class="btn back-btn firstBack">Back</a></div>
                              <div class="btn-right">
                                  <!-- <a href="javascript:void(0);" class="btn save-btn">Save</a> -->
                                <a href="javascript:void(0);" class="btn next-btn secondNext">Next</a>
                              </div>
                          </div>
                    </div>
                      <div class="tab-pane fade" id="step3">
                        <div class="thumb-pic">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check1" name="term" value="term" checked>
                              <label class="form-check-label">I would like to lock the price for <?php echo date("Y");?> and prepay (optional)</label>
                            </div>
                          </div>
                          <div class="btnsec">
                              <div class="btn-left"><a href="javascript:void(0);" class="btn back-btn lastBack">Back</a></div>
                              <div class="btn-right">
                                  <input type="hidden" name="preview_id" value="">
                                  <!-- <a href="javascript:void(0);" class="btn save-btn">Save</a> -->
                                <button type="button" class="btn next-btn previewProposal">Preview</button>
                                <button type="submit" class="btn next-btn">Submit</button>
                              </div>
                          </div>
                        </div>
                    </div>
                    </form>

        </div>
    </div>


      </section>