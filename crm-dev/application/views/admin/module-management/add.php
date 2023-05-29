 <div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Add Module</h1>
                         
                         <div class="date-wise-search">
                             
                         </div>
                      </div>
                     
                     
                     
                     <div class="content-pages-inner">
                         
                           <div class="drillviewSec addModule">
                            <div class="settingsSec">
                                <?php 
                                  $attributes = array('class' => 'form', 'id' => 'module-management-form');
                                  echo form_open_multipart('admin/module-management/add', $attributes);
                                ?>
                                                          
                                    <div class="form-group">
                                      <label>Module Name</label>
                                      <input type="text" name="moduleName" class="form-control" placeholder="Module 1" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Course Name</label>
                                        <select class="form-control" name="courseName" required="">
                                            <option value="">Select Course</option>
                                            <?php foreach ($course as $courseValue) { ?>
                                             <option value="<?php echo $courseValue->id; ?>"><?php echo $courseValue->course_name; ?> </option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group radioSec">
                                      <label>Content</label>
                                        <div class="checkBox">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Video">Video
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Audio">Audio
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Document">Document
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Image">Image
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Add Content with Question Answer</h3>
                                    <div class="contentRow">
                                        <div class="form-group">
                                          <label>File</label>
                                          <div class="custom-file">
                                            <!-- <input type="file" name="file_0" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile">Choose file</label> -->
                                            <div class="addContent" id="addContent_0"></div>
                                            <button type="button" data-pk="0" class="btn customBtn uploadPopup">Upload</button>
                                          </div>
                                        </div>
                                         <!-- <div class="form-group">
                                          <label></label>
                                          <div class="custom-file">
                                            <button type="button" class="btn customBtn uploadPopup">Upload</button>
                                          </div>
                                         </div> -->
                                        <div class="form-group">
                                          <label>Question</label>
                                          <input type="text" name="question_0" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group radioSec">
                                      <label>Content</label>
                                        <div class="checkBox">
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_0[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="correct_0[0]" type="checkbox" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_0[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="correct_0[1]" type="checkbox" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_0[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="correct_0[2]" type="checkbox" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_0[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="correct_0[3]" type="checkbox" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="rowId" type="hidden" name="rowId[]" value="0">
                                    <div class="addBtnSec addNewRow" data-id="0"><a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                                     <div class="addBtnSec removeContent" style="display: none;"><a href="javascript:void(0)" ><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="appendAdd"></div>
                                    
                                    
                                    <button type="submit" name="submit" value="submit" class="btn customBtn" data-toggle="modal" data-target="#exampleModal">Submit</button>
                                </form>
                            </div>
                        </div>

                     </div>
                     
                     
                     
                 </div>
             </div>