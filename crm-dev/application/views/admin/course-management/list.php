 <div class="content">
     <div class="container-fluid">
         
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 page-title">Course Management</h1>
             
             <div class="date-wise-search">
                 <!-- <div class="addsection"><a href="<?php echo base_url();?>admin/course-management/add" class="addBtn">Add Course</a></div> -->
                 <!-- <div class="filterSec">
                 <div class="date-wise-search-inner">
                    <label>Filter</label>
                    <div class="form-group date-picker">
                        <select class="form-control filterName">
                            <option value="">Select Name</option>
                            <?php foreach ($Allcourse as $AllValue) {?>
                               <option value="<?php echo $AllValue->id; ?>" <?php  if(isset($_GET['id'])){ if($_GET['id'] == $AllValue->id){ echo " Selected";} } ?>><?php echo $AllValue->course_name; ?></option>
                            <?php } ?>
                           
                        </select>
                     </div>
                 </div>
                     </div> -->
                <!--  <div class="dateSection">
                     <div class="form-group ">
                        <input type="date" name="date" class="form-control filterDate" value="<?php  if(isset($_GET['date'])){ echo $_GET['date']; } ?>">
                     </div>
                 </div> -->
             </div>
          </div>
          <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success">
                  <strong><?php echo $this->session->flashdata('success');?></strong> 
                </div>
          <?php } ?>
          <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger">
              <strong><?php echo $this->session->flashdata('error');?></strong>
            </div>

        <?php } ?>
         
        
         
         <div class="content-pages-inner">
              
             
               <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="custom-cards coursesSec innerTable">
                            <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                <tr>
                                  <th>Name</th>
                                    
                                  <th width="100px">Setting</th>
                                </tr>
                                </thead>
                              <tbody>
                                <?php if(!empty($course)){
                                  foreach ($course as $key => $courseValue) {
                                 ?>
                                <tr>                                          
                                  <td><?php echo $courseValue->course_name; ?></td>   
                                 
                                    <td>
                                        <ul class="settingBtnSec">
                                            <li><a href="<?php echo site_url().'/'.admin;?>course-management/edit/<?=$courseValue->id?>" class="editBtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                                            <!-- <li><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo site_url().'/'.admin;?>course-management/delete/<?=$courseValue->id?>" class="deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></li> -->
                                        </ul>
                                    </td>
                                </tr>
                              <?php } }else{ ?>
                                <tr>
                                  <td colspan="4">No. Data Found</td>
                                </tr>
                                
                                <?php } ?>
                                 
                                 
                              </tbody>
                            </table>
                            <?php echo $links;?>
                            </div>
                         </div>
                    </div>
                   
               </div>

         </div>
         
         
         
     </div>
 </div>
          
             
         