 <div class="pagetitle">
      <h1>Revenue Metrics</h1>
      
   <!--   <iframe  src="https://lookerstudio.google.com/embed/reporting/1a7d7c01-2656-4bfd-a4ec-d14f95654ce0/page/1M" frameborder="0" style="border:0" allowfullscreen></iframe> -->

     <div>
       <canvas id="myChart"></canvas>
     </div>

     <h1>Subscription Metrics</h1>
      <div>
       <canvas id="myChart1"></canvas>
     </div>

    </div><!-- End Page Title -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
$i = 1;
$j = 0;
$paymentData = [];
$userData = [];
foreach ($month_names as $value) {
    
   $data =  $this->Common_model->dbQuery("select  date(created),count(*) as payCount from golfersu_user_payments where MONTH(created) = ".$i." and YEAR(created) = YEAR(now()) group by MONTH(created)");

   $data1 =  $this->Common_model->dbQuery("select  date(create_date),count(*) as payCount from golfersu_user where MONTH(create_date) = ".$i." and YEAR(create_date) = YEAR(now()) group by MONTH(create_date)");

   if(!empty($data)){
     $paymentData[$j] = $data[0]->payCount;
   }
   else{
     $paymentData[$j] = 0;
   }

   if(!empty($data1)){
     $userData[$j] = $data1[0]->payCount;
   }
   else{
     $userData[$j] = 0;
   }
   
   $i++;
   $j++;
}



?>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php echo "'" . implode ( "', '", $month_names ) . "'";?>],
      datasets: [{
        label: 'Revenue Metrics',
        data: [<?php echo implode(',',$paymentData);?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: [<?php echo "'" . implode ( "', '", $month_names ) . "'";?>],
      datasets: [{
        label: 'Subscription Metrics',
        data: [<?php echo implode(',',$userData);?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

</script>