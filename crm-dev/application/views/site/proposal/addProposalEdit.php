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
                    <form method="POST" action="<?php echo site_url();?>/proposal/edit/<?php echo $proposal->id;?>">
                    <input type="hidden" name="proposal_id" value="<?php echo $proposal->id;?>">
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="step1">

                          <div class="thumb-pic">
                         
                              
                              <div class="row">
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <div class="form-inner">
                                          <label for="fname">Customer No :</label>
                                          <input type="text" id="customer_no" class="form-control" name="customer_no" value="<?php echo $proposal->customer_no;?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="lname">Customer's First Name:</label>
                                        <input type="text" id="customer_name" name="customer_first_name" class="form-control" value="<?php echo $proposal->first_name;?>">
                                    </div>
                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="lname">Customer's Last Name:</label>
                                        <input type="text" id="customer_last_name" name="customer_last_name" class="form-control" value="<?php echo $proposal->last_name;?>">
                                    </div>
                                    <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Customer No :</label>
                                        <input type="text" class="form-control" id="customer_no" name="customer_no" value="">
                                    </div> -->
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Phone Number :</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $proposal->phone;?>">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Email :</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $proposal->email;?>">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Address :</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $proposal->address;?>">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Street Address :</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address" value="<?php echo $proposal->street_address;?>">
                                    </div>
                                  <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Street Address Line 2 :</label><br>
                                        <input type="text" class="form-control" id="street_address2" name="street_address2" value="">
                                    </div> -->
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">City :</label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $proposal->city;?>">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">State / Province :</label>
                                    <input type="text" class="form-control" id="state" name="state" value="<?php echo $proposal->state;?>">
                                    </div>
                                  <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Postal / Zip Code :</label>
                                        <input type="text" class="form-control" id="postal" name="postal" value="<?php echo $proposal->zip_code;?>">
                                    </div>
                                  <!-- <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Lawn Size (kilo sq. ft.) :</label>
                                    <input type="text" class="form-control" id="lawn_size" name="lawn_size" value="">
                                    </div> -->

                                    <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Account Level Discount:</label> 
                                      <select name="individual_discount" class="form-control">
                                      <option value="">None</option>
                                        <?php if(!empty($individual_discount)){
                                            foreach($individual_discount as $individual_discountData){
                                        ?>
                                          <option <?php if($individual_discountData->id == $proposal->individual_discount_id){ echo "selected";}?> value="<?php echo $individual_discountData->id;?>"><?php echo $individual_discountData->discount_name;?></option>
                                        <?php } } ?>
                                      </select>

                                    </div>

                                      <div class="col-sm-6 col-md-6 mb-3">
                                      <label for="fname">Service Level Discount:</label> 
                                      <select name="discount" class="form-control">
                                        <option value="">None</option>
                                        <?php if(!empty($discount)){
                                            foreach($discount as $discountData){
                                        ?>
                                        <option <?php if($discountData->id == $proposal->discount_id){ echo "selected";}?> value="<?php echo $discountData->id;?>"><?php echo $discountData->discount_name;?></option>
                                        <?php } } ?>
                                        

                                        </select>

                                    </div>

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
                              <form>
                                  <table class="table table-bordered custom-table">
                                      <tr>
                                          <th></th>
                                          <th>Program/ Service</th>
                                          <th>Service</th>
                                          <th>Code</th>
                                          <th>Recommended</th>
                                          <th>Optional</th>
                                          <th>Size (ksf) Time (min)</th>
                                          <th>Number of Services (EOY)</th>
                                          <th>Number of Services (FY)</th>
                                          <th>System Unit Price</th>
                                          <th>Overwrite Price</th>
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

                                             $serviceAddData = $this->Common_model->getSingle('proposal_additional',array('proposal_id' => $proposal->id,'service_id' => $service->id ));
                                           
                                        ?>
                                         <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" <?php if(!empty($serviceAddData)){ if($serviceAddData->service_id == $service->id){ echo "checked";}}?> value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <td><?php echo $service->program_service;?></td>
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->recommended == 'yes'){ echo "checked";} }?>  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->optional == 'yes'){ echo "checked";} }?> name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                                  <input class="form-control" type="text"  name="size[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->size_time; } else{echo $sizeData;}?>">  
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->service_number_service; }?>">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="<?php echo $service->total_service;?>">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" readonly name="system_unit_price[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->system_price_unit; } else{ echo $service->service_min_price; }?>" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service"></td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->unit_price; }?>"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_this_year; }?>"  name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_full_year; }?>"  name="total_full_year[]" class="totalFullYear"></td>
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
                                             $serviceAddData = $this->Common_model->getSingle('proposal_additional',array('proposal_id' => $proposal->id,'service_id' => $service->id ));
                                            //$serviceData = $this->Common_model->getSingle('',array('id' => $service->id));
                                        ?>
                                        <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" <?php if(!empty($serviceAddData)){ if($serviceAddData->service_id == $service->id){ echo "checked";}}?> value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <td><?php echo $service->program_service;?></td>
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->recommended == 'yes'){ echo "checked";} }?>  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->optional == 'yes'){ echo "checked";} }?> name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                                  <input class="form-control" type="text"  name="size[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->size_time; } else{echo $sizeData;}?>">  
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->service_number_service; }?>">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="<?php echo $service->total_service;?>">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" name="system_unit_price[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->system_price_unit; } else{ echo $service->service_min_price; }?>" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service"></td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->unit_price; }?>"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_this_year; }?>"  name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_full_year; }?>"  name="total_full_year[]" class="totalFullYear"></td>
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
                                             $serviceAddData = $this->Common_model->getSingle('proposal_additional',array('proposal_id' => $proposal->id,'service_id' => $service->id ));
                                        ?>
                                        <tr>
                                            <td>
                                            <input type="checkbox" name="service_id[]" <?php if(!empty($serviceAddData)){ if($serviceAddData->service_id == $service->id){ echo "checked";}}?> value="<?php echo $service->id;?>">
                                            <input type="hidden" name="all_service_id[]" value="<?php echo $service->id;?>">
                                            </td>
                                              <td><?php echo $service->program_service;?></td>
                                              <td><?php echo $service->service_name;?></td>
                                              <td><?php echo $service->service_code;?></td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->recommended == 'yes'){ echo "checked";} }?>  name="recommended[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" <?php if(!empty($serviceAddData)){ if($serviceAddData->optional == 'yes'){ echo "checked";} }?> name="optional[]" value="<?php echo $service->id;?>">
                                                    </div>
                                              </td>
                                              <td>
                                                  <input class="form-control" type="text"  name="size[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->size_time; } else{echo $sizeData;}?>">  
                                              </td>
                                              <td>
                                                  <input class="form-control" type="number" min="1" max="<?php echo $service->total_service;?>" name="number_of_services[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->service_number_service; }?>">
                                              </td>
                                              <td>
                                                  
                                                    <input class="form-control" type="number" readonly   name="number_of_services_fy[]" value="<?php echo $service->total_service;?>">
                                                  
                                              </td>
                                              <td>
                                                  <input type="text" class="form-control" name="system_unit_price[]" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->system_price_unit; } else{ echo $service->service_min_price; }?>" placeholder="">
                                              </td>
                                              <td class="text-center">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="check1" name="price_over_write" value="">
                                                    </div>
                                              </td>
                                              <td class="discount"></td>
                                              
                                              <td class="discount_service"></td>
                                              
                                              <td class="unitPrice"><input type="text" class="form-control" value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->unit_price; }?>"  readonly name="unit_price[]" class="unitPrice"></td>
                                              <td class="totalThisYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_this_year; }?>"  name="total_this_year[]" class="totalThisYear"></td>
                                              <td class="totalFullYear"><input type="text" class="form-control"  readonly value="<?php if(!empty($serviceAddData)){ echo $serviceAddData->total_full_year; }?>"  name="total_full_year[]" class="totalFullYear"></td>
                                          </tr>
                                     <?php } } }?>
                                  </table>
                                  
                                  <div class="row mb-3">
                                      <div class="col-sm-6 col-md-6">
                                          <table class="table table-bordered custom-table2">
                                              <tr>
                                                  <th>Total BEFORE Discount	</th>
                                                  <input type="hidden" name="total_before_discount" value="<?php echo $proposal->total_before_discount;?>">
                                                  <td class="text-right totalBeforeDiscount"><?php echo $proposal->total_before_discount;?></td>
                                              </tr>
                                              <tr>
                                                  <th>Total AFTER ALL Discount	</th>
                                                  <input type="hidden" name="total_after_all_discount" value="<?php echo $proposal->total_after_all_discount;?>">
                                                  <td class="text-right totalAfterAllDiscount"><?php echo $proposal->total_after_all_discount;?></td>
                                              </tr>
                                              <tr>
                                                  <th>Sales Tax (8.25%)	</th>
                                                  <input type="hidden" name="sales_tax" value="<?php echo $proposal->sales_tax;?>">
                                                  <td class="text-right salesTax"><?php echo $proposal->sales_tax;?></td>
                                              </tr>
                                              <tr>
                                                  <th class="text-right">TOTAL	</th>
                                                  <input type="hidden" name="all_total" value="<?php echo $proposal->all_total;?>">
                                                  <td class="text-right allTotal"><?php echo $proposal->all_total;?></td>
                                              </tr>
                                          </table>
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                          <table class="table table-bordered custom-table2">
                                              <tr>
                                                  <th>Total AFTER ALL Discount</th>
                                                  <input type="hidden" name="total_after_all_discount" value="<?php echo $proposal->total_after_all_discount;?>">
                                                  <td class="text-right totalAfterAllDiscount"><?php echo $proposal->total_after_all_discount;?></td>
                                              </tr>
                                              <tr>
                                                  <th>Prepayment Discount (5%)</th>
                                                  <input type="hidden" name="prepayment_discount" value="<?php echo $proposal->prepayment_discount;?>">
                                                  <td class="text-right prepaymentDiscount"><?php echo $proposal->prepayment_discount;?></td>
                                              </tr>
                                              <tr>
                                                  <th>Sales Tax (8.25%)	</th>
                                                  <input type="hidden" name="sales_tax1" value="<?php echo $proposal->sales_tax1;?>">
                                                  <td class="text-right salesTax1"><?php echo $proposal->sales_tax1;?></td>
                                              </tr>
                                              <tr>
                                                  <th class="text-right">TOTAL if Prepaid</th>
                                                  <input type="hidden" name="total_prepaid" value="<?php echo $proposal->total_prepaid;?>">
                                                  <td class="text-right totalPrepaid"><?php echo $proposal->total_prepaid;?></td>
                                              </tr>
                                          </table>
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
                                  <!-- <a href="javascript:void(0);" class="btn save-btn">Save</a> -->
                                <button type="submit" class="btn next-btn">Submit</a>
                              </div>
                          </div>
                        </div>
                    </div>
                    </form>

        </div>
    </div>


      </section>