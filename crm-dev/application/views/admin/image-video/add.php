<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Image Audio Video Managment</h1>
                         <div class="date-wise-search">
                              <?php if($this->session->flashdata('success')){?>
                                 <div class="alert alert-success">
                                  <?php echo $this->session->flashdata('success');?>
                                </div>
                              <?php } ?>
                         </div>
                      </div>                     
                     <div class="content-pages-inner">
                           <div class="drillviewSec addModule">
                            <div class="settingsSec">
                                <?php  echo form_open_multipart();?>                                    
                                    <h3>Add Managment</h3>
                                    <div class="contentRow">
                                      <div class="form-group">
                                          <label>Image Name</label>
                                          <input type="text" class="form-control" name="imageName" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                          <label>File</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="images">
                                            <label class="custom-file-label" for="images">Choose file</label>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <button type="submit" class="btn customBtn" data-toggle="modal" data-target="#exampleModal">Submit</button>
                                </form>
                            </div>
                        </div>

                     </div>
                     
                     
                     
                 </div>
             </div>