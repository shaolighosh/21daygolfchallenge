 <div id="content-wrapper" class="d-flex flex-column">
             
             <div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Course</h1>
                         
                         <div class="date-wise-search">
                             <div class="date-wise-search-inner">
                                <div class="form-group date-picker">
                                    <select class="form-control">
                                        <option>Filter</option>
                                        <option>1</option>
                                    </select>
                                 </div>
                             </div>
                         </div>
                      </div>
                     
                     
                     
                     <div class="content-pages-inner">
                          
                         
                           <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-cards boatSec">
                                    <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                        <tr>
                                          <th>Module Name</th>
                                          <th>Status</th>
                                            <th>Date Added</th>   
                                          <th>Score</th>
                                          <th>Actions</th>
                                        </tr>
                                        </thead>
                                      <tbody>

                                        <?php if(!empty($module)){

                                            foreach ($module as $moduleValue) {
                                            
                                          ?>  

                                          <tr>                                          
                                            <td><?php echo $moduleValue->module_name;?></td>   
                                            <td class="newStatus">New</td>
                                              <td><?php echo date('Y-m-d',strtotime($moduleValue->created));?></td>
                                              <td>-</td>
                                            <td><a href="<?php echo base_url();?>courses/start/<?php echo $moduleValue->module_id;?>" class="btn btn-light btn-type1">Start</a></td>
                                          </tr>



                                          <?php  } } else{?>
                                            <tr> 
                                           
                                              <td class="alert alert-danger"  colspan="5" style="text-align: center;">No data available.</td> 
                                            
                                          </tr>

                                          <?php } ?>
                                        
                                        
                                      </tbody>
                                    </table>
                                    </div>
                                     </div>
                                </div>
                           </div>
                         
                         
                             
                         
                     </div>
                     
                     
                     
                 </div>
             </div>
          
             
          </div>
          