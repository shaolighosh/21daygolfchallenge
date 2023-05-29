<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>public/assets/img/fav.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="<?php echo base_url();?>public/assets/css/style.css" rel="stylesheet"> -->
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
    border: 1px solid #4361ee;
    background-color: #4361ee;
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
    background-color: #dee2e6;
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
    background-color: #4361ee !important;
    color: #fff;
}
.form-stepper .form-stepper-active .label {
    color: #4361ee !important;
}
.form-stepper .form-stepper-active .form-stepper-circle:hover {
    background-color: #4361ee !important;
    color: #fff !important;
}
.form-stepper .form-stepper-unfinished .form-stepper-circle {
    background-color: #f8f7ff;
}
.form-stepper .form-stepper-completed .form-stepper-circle {
    background-color: #0e9594 !important;
    color: #fff;
}
.form-stepper .form-stepper-completed .label {
    color: #0e9594 !important;
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
    font-size: 1rem;
    margin-top: 0.5rem;
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
		color:darkblue;
		background-color:darkgrey;
		/*max-width:600px;*/
		padding:20px;
	}
	
	/*This is the div within which the signature canvas is fitted*/
	#signature {
		border: 2px dotted black;
		background-color:lightgrey;
	}
</style>
</head>

<body>

  

  

<main id="main" class="main">
<?php echo $content;?>
</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="<?php echo base_url();?>public/site/js/jquery.min.js"></script> 
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>public/assets/js/main.js"></script>
  <script src="<?php echo base_url();?>public/assets/js/jSignature.js"></script>
  <script>

  /**
 * Define a function to navigate betweens form steps.
 * It accepts one parameter. That is - step number.
 */
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
/**
 * Select all form navigation buttons, and loop through them.
 */
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




$(window).load(function () {
    $("#step-4").addClass('d-none');
});
  $(document).ready(function(){

      var $sigdiv = $("#signature").jSignature({'UndoButton':false})
      $('.lastBack').click(function(){
          $('#step2_tab').tab('show');
      });
      $('.firstBack').click(function(){
          $('#step1_tab').tab('show');
      });

     $('.firstNext').click(function(){
          $('#step2_tab').tab('show');
      });

      $('.secondNext').click(function(){
          $('#step3_tab').tab('show');
      });

      $("#customer_no").keyup(function(e){
            $('.customer_no_data').text($(this).val());   
      });

      $("#customer_name").keyup(function(e){
           $('.customer_name_data').text($(this).val());    
      });

      $("#phone_number").keyup(function(e){
            $('.customer_contact_data').text($(this).val());  
      });

      $("#email").keyup(function(e){
            $('.customer_email_data').text($(this).val());    
      });

      $("#address").keyup(function(e){
            $('.customer_address_data').text($(this).val());    
      });

      $("#lawn_size").keyup(function(e){
            $('.customer_lwan_size_data').text($(this).val());   
      });

      $("input[name='core_service[]']").click( function () {
        
          if( $(this).prop('checked') ){
            $('.service_price_'+$(this).val()).show();
            $('.core_service_'+$(this).val()).show();
          }
          else{
            $('.service_price_'+$(this).val()).hide();
            $('.core_service_'+$(this).val()).hide();
          }
      });

       $("input[name='individual_service[]']").click( function () {
        
          if( $(this).prop('checked') ){
            $('.individual_service_price_'+$(this).val()).show();
            $('.individual_service_'+$(this).val()).show();
          }
          else{
            $('.individual_service_price_'+$(this).val()).hide();
            $('.individual_service_'+$(this).val()).hide();
          }
      });

      
      $("input[name='core_service_optional[]']").click( function () {
          if( $(this).prop('checked') ){
            $('.core_service_optional_'+$(this).val()).show();
          }
          else{
            $('.core_service_optional_'+$(this).val()).hide();
          }
      });

      $("input[name='outdoor_pest_control[]']").click( function () {
          if( $(this).prop('checked') ){
            $('.outdoor_pest_price_'+$(this).val()).show();
            $('.outdoor_service_'+$(this).val()).show();
          }
          else{
            $('.outdoor_pest_price_'+$(this).val()).hide();
            $('.outdoor_service_'+$(this).val()).hide();
          }
      });

       $("input[name='outdoor_pest_control_optional[]']").click( function () {
          if( $(this).prop('checked') ){
            $('.outdoor_service_optional_'+$(this).val()).show();
          }
          else{
            $('.outdoor_service_optional_'+$(this).val()).hide();
          }
      });

       $(".service_size").change( function () {

          var ref = $(this).closest('.step2-form');
          var service_id = $('input[name="hidden_core_service[]"]',ref).val();
          var service_type = $('input[name="service_type[]"]',ref).val();
          var discount = $('select[name="discount[]"] option:selected',ref).val();
          var individual_discount = $('select[name="individual_discount[]"] option:selected',ref).val();
          var service_number_service = $('select[name="service_number_service[]"] option:selected',ref).val();
          //alert(discount);
          var sizeData = $(this).val();

             $.ajax({
                  type: 'POST',
                  url: "<?php echo site_url();?>/ajax/calculate_price",
                  data: {
                      "service_id":service_id,
                      size:sizeData,
                      service_type:service_type,
                      discount:discount,
                      individual_discount:individual_discount,
                      service_number_service:service_number_service,
                    },
                  success: function(resultData) { 
                   // alert(resultData);
                    var result = JSON.parse(resultData);
                    console.log("Save Complete"+result.cost);
                    $('input[name="system_price_unit[]"]',ref).val(result.system_price_unit);
                    $('input[name="unit_price[]"]',ref).val(result.cost);
                    $('input[name="total_this_year[]"]',ref).val(result.total_cost);
                    $('input[name="total_full_year[]"]',ref).val(result.full_year);

                     if(service_type == 'core_services'){

                       $('body .core_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .core_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('.core_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else if(service_type == 'outdoor_pest_controls'){
                       $('body .outdoor_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .outdoor_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .outdoor_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else{
                       $('body .individual_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .individual_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .individual_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    } 

                  }
            });


        });

        $(".service_number_service").change( function () {

          var ref = $(this).closest('.step2-form');
          var service_id = $('input[name="hidden_core_service[]"]',ref).val();
          var service_type = $('input[name="service_type[]"]',ref).val();

          var discount = $('select[name="discount[]"] option:selected',ref).val();
          var individual_discount = $('select[name="individual_discount[]"] option:selected',ref).val();

            //alert($(this).val());
           // $('#aioConceptName :selected')
          var sizeData = $('select[name="size[]"] option:selected',ref).val(); 
          var service_number_service = $(this).val();

             $.ajax({
                  type: 'POST',
                  url: "<?php echo site_url();?>/ajax/calculate_price",
                  data: {
                        "service_id":service_id,
                        size:sizeData,
                        service_type:service_type,
                        discount:discount,
                        individual_discount:individual_discount,
                        service_number_service:service_number_service,

                  },
                  success: function(resultData) { 
                    //alert(resultData);
                    var result = JSON.parse(resultData);
                    console.log("Save Complete"+result.cost);
                     $('input[name="system_price_unit[]"]',ref).val(result.system_price_unit);
                    $('input[name="unit_price[]"]',ref).val(result.cost);
                    $('input[name="total_this_year[]"]',ref).val(result.total_cost);
                    $('input[name="total_full_year[]"]',ref).val(result.full_year);

                     if(service_type == 'core_services'){

                       $('body .core_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .core_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('.core_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else if(service_type == 'outdoor_pest_controls'){
                       $('body .outdoor_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .outdoor_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .outdoor_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else{
                       $('body .individual_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .individual_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .individual_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    } 

                  }
            });


        });


         $(".individual_discount").change( function () {

          var ref = $(this).closest('.step2-form');
          var service_id = $('input[name="hidden_core_service[]"]',ref).val();
          var service_type = $('input[name="service_type[]"]',ref).val();
          var discount = $('select[name="discount[]"] option:selected',ref).val();
          var individual_discount = $('select[name="individual_discount[]"] option:selected',ref).val();
          var service_number_service = $('select[name="service_number_service[]"] option:selected',ref).val();
            //alert($(this).val());
          var sizeData = $(this).val();

             $.ajax({
                  type: 'POST',
                  url: "<?php echo site_url();?>/ajax/calculate_price",
                  data: {
                      "service_id":service_id,
                      size:sizeData,
                      service_type:service_type,
                      discount:discount,
                      individual_discount:individual_discount,
                      service_number_service:service_number_service,
                    },
                  success: function(resultData) { 
                    //alert(resultData);
                    var result = JSON.parse(resultData);
                    console.log("Save Complete"+result.cost);
                     $('input[name="system_price_unit[]"]',ref).val(result.system_price_unit);
                    $('input[name="unit_price[]"]',ref).val(result.cost);
                    $('input[name="total_this_year[]"]',ref).val(result.total_cost);
                    $('input[name="total_full_year[]"]',ref).val(result.full_year);

                     if(service_type == 'core_services'){

                       $('body .core_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .core_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('.core_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else if(service_type == 'outdoor_pest_controls'){
                       $('body .outdoor_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .outdoor_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .outdoor_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else{
                       $('body .individual_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .individual_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .individual_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    } 

                  }
            });


        });


         $(".discount").change( function () {

          var ref = $(this).closest('.step2-form');
          var service_id = $('input[name="hidden_core_service[]"]',ref).val();
          var service_type = $('input[name="service_type[]"]',ref).val();
           var discount = $('select[name="discount[]"] option:selected',ref).val();
          var individual_discount = $('select[name="individual_discount[]"] option:selected',ref).val();
          var service_number_service = $('select[name="service_number_service[]"] option:selected',ref).val();
            //alert($(this).val());
          var sizeData = $(this).val();

             $.ajax({
                  type: 'POST',
                  url: "<?php echo site_url();?>/ajax/calculate_price",
                  data: {
                      "service_id":service_id,
                      size:sizeData,
                      service_type:service_type,
                      discount:discount,
                      individual_discount:individual_discount,
                      service_number_service:service_number_service,
                    },
                  success: function(resultData) { 
                    //alert(resultData);
                    var result = JSON.parse(resultData);
                    console.log("Save Complete"+result.cost);
                     $('input[name="system_price_unit[]"]',ref).val(result.system_price_unit);
                    $('input[name="unit_price[]"]',ref).val(result.cost);
                    $('input[name="total_this_year[]"]',ref).val(result.total_cost);
                    $('input[name="total_full_year[]"]',ref).val(result.full_year);

                     if(service_type == 'core_services'){

                       $('body .core_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .core_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('.core_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else if(service_type == 'outdoor_pest_controls'){
                       $('body .outdoor_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .outdoor_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .outdoor_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    }
                    else{
                       $('body .individual_service_'+service_id).find('.pricePerApplication').html(result.cost);
                       $('body .individual_service_'+service_id).find('.totalThisYear').html(result.total_cost);  
                       $('body .individual_service_'+service_id).find('.totalFullYear').html(result.full_year);
                    } 
                    
                  }
            });


        });

  

    <?php /* if(!empty($services)){
              foreach($services as $serviceData){
          ?>

            $(".service_size_<?php echo $serviceData->id;?>").change( function () {

                
                if($(this).val() == 1){
                  console.log("service id : ",$(this).val());
                }
                else{
                  console.log("service id : ",$(this).val());
                }
                // if( $(this).prop('checked') ){
                //   $('.outdoor_service_optional_'+$(this).val()).show();
                // }
                // else{
                //   $('.outdoor_service_optional_'+$(this).val()).hide();
                // }
            });
          
           $(".service_number_service_<?php echo $serviceData->id;?>").change( function () {

               
                if($(this).val() == 1){
                  console.log("service id : ",$(this).val());
                }
                else{
                  console.log("service id : ",$(this).val());
                }
          });


    <?php  } } */?>

  });
  </script>

</body>

</html>