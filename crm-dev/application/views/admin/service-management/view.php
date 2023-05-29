 <div class="pagetitle">
      <h1>Price Table</h1>
     <div class="pull-right">
         <a href="<?php echo site_url();?>/admin/service-management/" style="float: right;" class="propesalbnt">Back</a>
      </div> 
    </div><!-- End Page Title -->

<section class="section transcriber_management">
      



<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mt-5">



<div class="card">
            <div class="card-body">
      <div class="m-4">
    <table class="table table-primary">
    
   
        <tbody>
        <tr>
                <td colspan="3" align="center" ><strong><?php echo $service->service_name; ?></strong></td>
            </tr>
            <tr>
                <td colspan="3" align="center" ><strong><?php echo $service->total_service; ?> Rounds</strong></td>
            </tr>
            <tr>
                <td colspan="3" align="center" >
				<strong><?php 
				for($i = 1; $i<=$service->total_service; $i++){
					echo $service->service_prefix.$i.", ";
					
				}
				
				?></strong></td>
            </tr>
        <tr>
                <th><?php if($service->square_foot =="yes") { echo "Size (SF)"; } else { echo "Service Time (minutes)"; } ?> </th>
                <th>Price</th>
                <th><?php if($service->service_prefix =="LW") { echo "--"; } else {  ?>Price with LFW<?php } ?></th>
               
            </tr>
            <?php 
			$price = $service->service_min_price;
				for($j = 1; $j<=9; $j++){
					$size = 1000*$j;
					
					?>
            <tr>
                <td><?php echo $size; ?></td>
                <td>$<?php echo $price; ?></td>
                <td><?php if($service->service_prefix =="LW") { echo "--"; } else {  echo "$"; echo $price-15; } ?></td>
               
            </tr>
            <?php 
			$price = $price + $service->service_incremental;
			}
			 ?>
            <tr bgcolor="#666666">
                <td> <strong><?php if($service->square_foot =="yes") { echo "> 9,000)"; } else { echo "> 120)"; } ?> </strong></td>
                <td><strong><?php if($service->square_foot =="yes") { echo "Add".$service->service_min_price."per 1000 sf"; } else { echo "Add".$service->service_min_price."per 15 min"; } ?></strong></td>
                <td></td>
            </tr>
            
        </tbody>
    </table>

    

    

    

    

    

    
</div>
            
            </div>
          </div>

</div>
</div>


      </section>