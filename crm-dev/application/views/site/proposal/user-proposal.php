<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>lawn Doctor</title>
  <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/custom-style.css">
  <style>
h1 {
    text-align: center;
}
h2 {
    margin: 0;
}
#multi-step-form-container {
    margin-top: 5rem;
}
.text-center {
    text-align: center;
}
.mx-auto {
    margin-left: auto;
    margin-right: auto;
}
.pl-0 {
    padding-left: 0;
}
.button {
    padding: 0.7rem 1.5rem;
    border: 1px solid #007836;
    background-color: #007836;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.submit-btn {
    border: 1px solid #0e9594;
    background-color: #0e9594;
}
.mt-3 {
    margin-top: 2rem;
}
.d-none {
    display: none;
}
.form-step {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    padding: 3rem;
}
.font-normal {
    font-weight: normal;
}
ul.form-stepper {
    counter-reset: section;
    margin-bottom: 3rem;
}
ul.form-stepper .form-stepper-circle {
    position: relative;
}
ul.form-stepper .form-stepper-circle span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
}
.form-stepper-horizontal {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}
ul.form-stepper > li:not(:last-of-type) {
    margin-bottom: 0.625rem;
    -webkit-transition: margin-bottom 0.4s;
    -o-transition: margin-bottom 0.4s;
    transition: margin-bottom 0.4s;
}
.form-stepper-horizontal > li:not(:last-of-type) {
    margin-bottom: 0 !important;
}
.form-stepper-horizontal li {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: start;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
.form-stepper-horizontal li:not(:last-child):after {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    height: 1px;
    content: "";
    top: 32%;
}
.form-stepper-horizontal li:after {
    /* background-color: #dee2e6; */
    border-bottom: 1px dashed #ffffff;
}
.form-stepper-horizontal li.form-stepper-completed:after {
    background-color: #4da3ff;
}
.form-stepper-horizontal li:last-child {
    flex: unset;
}
ul.form-stepper li a .form-stepper-circle {
    display: inline-block;
    width: 40px;
    height: 40px;
    margin-right: 0;
    line-height: 1.7rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.38);
    border-radius: 50%;
}
.form-stepper .form-stepper-active .form-stepper-circle {
    font-family: 'Poppins', sans-serif;
    border: 1px solid #ffffff;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
}
.form-stepper .form-stepper-active .label {
    color: #ffffff !important;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}
.form-stepper .form-stepper-active .form-stepper-circle:hover {
    background-color: #4361ee !important;
    color: #fff !important;
}
.form-stepper .form-stepper-unfinished .form-stepper-circle {
    background-color: #d9ebe199;
}
.form-stepper .form-stepper-completed .form-stepper-circle {
    background-color: #a3a3a3 !important;
    color: #fff;
}
.form-stepper .form-stepper-completed .label {
    color: #cac9c9 !important;
}
.form-stepper .form-stepper-completed .form-stepper-circle:hover {
    background-color: #0e9594 !important;
    color: #fff !important;
}
.form-stepper .form-stepper-active span.text-muted {
    color: #fff !important;
}
.form-stepper .form-stepper-completed span.text-muted {
    color: #fff !important;
}
.form-stepper .label {
    margin-top: 0.5rem;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: #cccccc;
}
.form-stepper a {
    cursor: default;
}
/* #SignatureController
{
	width: 500px;
  height: 150px;
  border: 1px solid black;
} */
#signatureparent {
		color: black;
		background-color: white;
		/*max-width:600px;*/
		/* padding:20px; */
		margin-bottom: 20px;
		float: left;
		width: 100%;
		font-family: 'Poppins', sans-serif;
		font-size: 13px;
	}
	
	/*This is the div within which the signature canvas is fitted*/
	#signature {
		border: 2px dotted black;
		background-color: white;
		margin-top: 6px;
		padding: 10px;
        min-height: 350px;
	}
   

</style>
</head>
<body>
<div class="top_wap">

    <img src="<?php echo base_url(); ?>/public/assets/img/logo33.png">
    <h1>Service Proposal</h1>


    <div id="multi-step-form-container">
        <!-- Form Steps / Progress Bar -->
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <!-- Step 1 -->
            <li class="form-stepper-active text-center form-stepper-list" step="1">
                <a class="mx-2">
                    <span class="form-stepper-circle">
                        <span>1</span>
                    </span>
                    <div class="label">Select Services</div>
                </a>
            </li>
            <!-- Step 2 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                    <div class="label text-muted">Confirm Details</div>
                </a>
            </li>
            <!-- Step 3 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                    <div class="label text-muted">Terms & Conditions</div>
                </a>
            </li>

            <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                    <div class="label text-muted">Order Summary</div>
                </a>
            </li>

          

        </ul>
        <!-- Step Wise Form Content -->
       <section id="step-1" class="form-step">
        <div class="top_wap">

    
        <div class="table_wap">
        <h2>YOUR LAWN CARE SERVICES PROPOSAL</h2>

<table style="width:100%">

<tr>
    <td>Proposal No.</td>
    <td><?php echo $proposal->id;?></td>
</tr>
<tr>
    <td>Name</td>
    <td><?php echo $proposal->customer_name;?></td>
</tr>
<tr>
    <td>Contact</td>
    <td><?php echo $proposal->phone;?></td>
</tr>
<tr>
    <td>email</td>
    <td><?php echo $proposal->email;?></td>
</tr>
<tr>
    <td>Service Address</td>
    <td><?php echo $proposal->address;?></td>
</tr>
<tr>
    <td>Lawn Size</td>
    <td><?php echo $proposal->lawn_size;?> sqft (estimated)</td>
</tr>

</table>
    </div>

<div class="vete_ran">
    <div class="part_1">
        <h2><img src="<?php echo base_url();?>public/assets/img/check.png"> Military/Veteran 10% Discount Applied</h2>
        <h2><img src="<?php echo base_url();?>public/assets/img/check.png">   Senior Citizen 10% Discount Applied</h2>
    </div>


<div class="part_2"><h2>You save $<?php echo $proposal->total_before_discount-$proposal->total_after_all_discount ?> per year</h2></div>
</div>

<?php foreach($proposalAdditional as $proposalAdditionals) {?>
<div class="progr_wapam">
    
    <a href="#" class="recom_endet"><?php echo ($proposalAdditionals->recommended)?'Recommended':'Optional' ?></a>
    <div class="progr_inner">
        <div class="part_1">
            <?php  $proposalCore_service = $this->Common_model->getSingle('core_services',array('id' => $proposalAdditionals->service_id)); ?>
             <h2><?php echo $proposalCore_service->service_name; ?></h2>
              <p>Yearlong lawn fertilization and weed control program.   </p>
             <ul>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Micronutrients</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Macronutrients (NPK)</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Pre-emergent weed control</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Carbon</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Post-emergent weed control</br>
             
             <img src="<?php echo base_url();?>public/assets/img/check.png">Micronutrients
             <div class="su_b showdetails"><input type="button" value="+Details"></div>
              
             </ul>
            <p><?php //echo $proposalCore_service->description; ?></p>

        </div>

        <div class="part_2">
            <h2>Enroll</h2> 
            <label class="switch switch-left-right">
    <input name="enroll" class="switch-input" type="checkbox" />
    <span class="switch-label" data-on="Yes" data-off="No"></span> 
    <span class="switch-handle"></span> 
</label>

            <table style="width:100%; text-align: left;" border="1">

<tr>
    <td>50% off First Application:</td>
    <td><?php echo $proposalCore_service->service_min_price*0.9; ?></td>
</tr>
<tr>
    <td>Price per application:</td>
    <td><?php echo $proposalCore_service->service_min_price; ?></td>
</tr>
<tr>
    <td>Full year applications:</td>
    <td><?php echo $proposalCore_service->total_service; ?></td>
</tr>
<tr>
    <td>Remaining Applications:</td>
    <td><?php echo $proposalAdditionals->service_number_service?></td>
</tr>


</table>
        </div>
   

</div>


 <div class="con_ten" class="description" style="display:none">
  <!--  <div class="vd-1"><img src="<?php echo base_url();?>public/assets/img/pic-1.png"></div>
    <div class="vd-1"><img src="<?php echo base_url();?>public/assets/img/pic-1.png"></div>-->
    <p><?php echo $proposalCore_services->description; ?></p>
</div> 


</div>


<?php } ?>
<?php foreach($proposalAdditional_optional as $proposalAdditional_optional) {?>
<div class="progr_wapam">
    
    <a href="#" class="recom_endet"><?php echo ($proposalAdditional_optional->recommended)?'Recommended':'Optional' ?></a>
    <div class="progr_inner">
        <div class="part_1">
            <?php  $proposalCore_service = $this->Common_model->getSingle('core_services',array('id' => $proposalAdditional_optional->service_id)); ?>
             <h2><?php echo $proposalCore_service->service_name; ?></h2>
              <p>Yearlong lawn fertilization and weed control program.   </p>
             <ul>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Micronutrients</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Macronutrients (NPK)</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Pre-emergent weed control</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Carbon</br>
             <img src="<?php echo base_url();?>public/assets/img/check.png">Post-emergent weed control</br>
             
             <img src="<?php echo base_url();?>public/assets/img/check.png">Micronutrients
             <div class="su_b showdetails"><input type="button" value="+Details"></div>
              
             </ul>
            <p><?php //echo $proposalCore_service->description; ?></p>

        </div>

        <div class="part_2">
            <h2>Enroll</h2> 
            <label class="switch switch-left-right">
    <input name="enroll" class="switch-input" type="checkbox" />
    <span class="switch-label" data-on="Yes" data-off="No"></span> 
    <span class="switch-handle"></span> 
</label>

            <table style="width:100%; text-align: left;" border="1">

<tr>
    <td>50% off First Application:</td>
    <td><?php echo $proposalCore_service->service_min_price*0.9; ?></td>
</tr>
<tr>
    <td>Price per application:</td>
    <td><?php echo $proposalCore_service->service_min_price; ?></td>
</tr>
<tr>
    <td>Full year applications:</td>
    <td><?php echo $proposalCore_service->total_service; ?></td>
</tr>
<tr>
    <td>Remaining Applications:</td>
    <td><?php echo $proposalAdditionals->service_number_service?></td>
</tr>


</table>
        </div>
   

</div>


 <div class="con_ten" class="description" style="display:none">
  <!--  <div class="vd-1"><img src="<?php echo base_url();?>public/assets/img/pic-1.png"></div>
    <div class="vd-1"><img src="<?php echo base_url();?>public/assets/img/pic-1.png"></div>-->
    <p><?php echo $proposalCore_services->description; ?></p>
</div> 


</div>


<?php } ?>
<div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                </div>
 </section>


<section id="step-2" class="form-step d-none">
<div class="drp_warp">
  <div class="drp_mi">
  <form method="post" id="submitProposal" action="<?php echo site_url(); ?>/Check_proposal/submitproposal">  
    <input type="hidden" name="id" value="<?php echo $proposal->id;?>">
  <label for="fname">Proposal No.</label>
  <input type="text" id="fname" name="fname" value="<?php echo $proposal->id;?>">
  <label for="lname">Name</label>
  <input type="text" id="lname" name="lname" value="<?php echo $proposal->customer_name;?>">

  <label for="lname">Contact</label>
  <input type="text" id="phone" name="phone" value="<?php echo $proposal->phone;?>">
 
<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> Phone</label>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Phone">
  <label for="vehicle2"> Mobail</label>

 <label for="lname">email</label>
  <input type="email" id="email" name="email" value="<?php echo $proposal->email;?>">

  <label for="lname">Service Address</label>
  <input type="text" id="address" name="address" value="<?php echo $proposal->address;?>">

  <h2><img src="<?php echo base_url();?>public/assets/img/icon-1.png"> Access</h2>

 <input type="checkbox" id="locked_gate" name="locked_gate" value="Y">
  <label for="vehicle1"> Do you have a locked gate?</label>
  <input type="checkbox" id="gated_community" name="gated_community" value="Y">
  <label for="vehicle2"> Do live in gated community?</label>

<label for="lname">Gate code</label>
  <input type="text" id="gate_code" name="gate_code" value="">

  <label for="lname">Gate code</label><br>
  <input type="text" id="gate_code1" name="gate_code1" value="">

<h2><img src="<?php echo base_url();?>public/assets/img/icon-2.png"> Lawn Mowing</h2>
<h3>Mowing Day</h3>


  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Mon">
  <label for="vehicle1"> Mon</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Tue">
  <label for="vehicle2"> Tue</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Wed">
  <label for="vehicle3"> Wed</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Thu">
  <label for="vehicle1"> Thu</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Fri">
  <label for="vehicle2"> Fri</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Sat">
  <label for="vehicle3"> Sat</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="Sun">
  <label for="vehicle3"> Sun</label>
  <input type="checkbox" id="mowing_day" name="mowing_day[]" value="not">
  <label for="vehicle3"> Not fixed</label>

<h2>Mowing frequency</h2>
<p>
<select name="mowing_frequency">
    <option value="once a week">once a week</option>
    <option value="once every two weeks">once every two weeks</option>
    <option value="once a month">once a month</option>
    <option value="as needed">as needed</option>
</select>
</p>


<h2><img src="<?php echo base_url();?>public/assets/img/icon-3.png"> Lawn Watering</h2>
<h3>Watering Method </h3>

<select name="watering_method">
    <option value="in-ground sprinkler (spray)">in-ground sprinkler (spray)</option>
    <option value="once every two weeks">inground sprinkler (rotating head)</option>
    <option value="once a month">above ground sprinkler</option>
    <option value="as needed">spray hose</option>
    <option value="as needed">rain only</option>
</select>
 <label for="lname">Duration  </label>
  <input type="text" id="duration" name="duration" value="">
  <p>minutes per zone</p>

 <label for="lname">Frequency  </label>
  <input type="text" id="frequency" name="frequency" value="">
  <p>times a week</p>

<label for="w3review">Special Instruction : </label>
  <textarea id="instruction" name="instruction" rows="4" cols="50"></textarea>
 <!--  <input type="submit" value="Submit"> -->


 <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                </div>
  </div>

   <div class="drp_mi-2"><img src="<?php echo base_url();?>public/assets/img/pic-3.png"></div>

</div>







</div>

</div>

</section>
<section id="step-3" class="form-step d-none">
<div class="top_wap">
    
    <div class="table_wap cde_r">
        <h2>We want you to know some important information with regards to the services:</h2>
         
            <?php $i=1; 
            foreach($termsdata as $term) {?>
            <input type="checkbox" id="term" name="term[]" value="term">
                <label for="vehicle1"><?php echo $term->description;?>  </label></br/>
                <span class="text-red"><?=form_error('term'); ?></span>
        
<?php } ?>
        
        
     <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                    <button class="button btn-navigate-form-step" type="button" step_number="4">Next</button>
                </div> 
    </div>

</section>


 <section id="step-4" class="form-step">
<div class="top_wap">
    
    <div class="table_wap cde_r">
        <h2>PAYMENT OPTION</h2>
        


        <div class="ve_o">
          <h2>Pay As You Go </h2>

          <table style="width:100%" border="1">
  <tr>
    <th>Program/Service</th>
    <th>Price per Application</th>
    <th>Application per Year</th>
  </tr>
  <?php foreach($proposalAdditional as $proposalAdditionals) {    
    $proposalCore_service = $this->Common_model->getSingle('core_services',array('id' => $proposalAdditionals->service_id)); ?>
  <tr>
    <td><?php echo $proposalCore_service->service_name?></td>
    <td>$<?php echo $proposalCore_service->service_min_price?></td>
    <td><?php echo $proposalCore_service->total_service?></td>
  </tr>
  <?php } ?>
  
</table>

<div class="tota_l">

  <h2>Payment Method: </h2>
  

  <label for="vehicle1"> Prepay for 2022 </label>
  <input type="radio" id="Prepay" name="pay" value="Prepay"><br/>

 
  <label for="vehicle1">Pay as You Go  </label>
  <input type="radio" id="Pay" name="pay" value="Pay">
 
</div>
 <div id="content">
                        <div id="signatureparent">
                        Signature 
                        <div id="signature"></div>
                        </div>
                    </div> 
                    <input type="hidden" name="customer_signature" value="">
                  
  <input type="submit" id="submitProposal" name="submitProposal" value="Submit" class="sub_mit">


  <!-- <p>Thank you for your submission. We appreciate your business. Someone from the office will contact you for payment and discuss the service and to setup account as soon as possible.</p>

  <p>If you need immediate support, please contact us @ 832-831-6181 or send an email to <a href="#">group1214@lawndoctor.com.</a> </p>
 -->

        </div>

    </div>

    </form>







</div>

  </div>

</section>


<div class="pad_in"></div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='<?php echo base_url();?>public/assets/js/jSignature.js'></script>

<script>
const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        /**
         * Check if the element exist. If yes, then proceed.
         */
        if (formStepCircle) {
            /**
             * Mark the form step as completed.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});

</script>

<script src="<?php echo base_url(); ?>public/assets/js/jSignature.js"></script>

<script>
    $(document).ready(function() {
        var $sigdiv = $("#signature").jSignature({'UndoButton':false});
    });
    $(window).load(function () {
        $("#step-4").addClass('d-none');
    });
</script>
<script>
$(document).ready(function(){
    $('#description').hide();
  $(".showdetails").click(function(){
    //alert("here");
    var ref = $(this).closest('.progr_wapam');
    $(".con_ten",ref).toggle();
  });

  $("#submitProposal").submit(function(){
          //  alert("dd");
           var dataString = $("#signature").jSignature("getData");
              //  alert(dataString);
              $('input[name="customer_signature"]').val(dataString);  

            return true;
        });
});


</script>
</body>
</html>