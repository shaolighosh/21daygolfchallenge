 <div class="content">
   <div class="container-fluid">       
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800 page-title">Edit Module</h1>           
          <div class="date-wise-search"></div>
      </div>
      <div class="content-pages-inner">                         
        <div class="drillviewSec addModule">
          <div class="settingsSec">
            <?php $attributes = array('class' => 'form', 'id' => 'module-management-form');
                    echo form_open_multipart('admin/module-management/edit', $attributes); ?>
                        <div class="form-group">
                          <label>Module Name</label>
                          <input type="text" name="moduleName" class="form-control" placeholder="Module 1" value="<?= $module->module_name ?>" required>
                        </div>
                        <div class="form-group">
                          <label>Course Name</label>
                            <select class="form-control" name="courseName" required="">
                                <option value="">Select Course</option>
                                <?php foreach ($course as $courseValue) { ?>
                                 <option <?=($module->course_id==$courseValue->id)? 'selected' :'' ?> value="<?=$courseValue->id ?>"><?= $courseValue->course_name; ?> </option>
                                <?php } ?>                                  
                            </select>
                        </div>
                        <input type="hidden" name="moduleId" value="<?= $module->module_id ?>">
                        <div class="form-group radioSec">
                          <label>Content</label>
                            <div class="checkBox">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="Video" <?=($module->content=="Video") ? 'checked' :'' ?> >Video
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="Audio" <?=($module->content=="Audio")? 'checked' : ''?>>Audio
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="Document" <?php if($module->content=="Document"){echo 'checked';} ?>>Document
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="Image" <?php if($module->content=="Image"){echo 'checked';} ?>>Image
                                  </label>
                                </div>
                            </div>
                        </div>
                        <h3>Add Content with Question Answer</h3>
                        <?php $i=0; foreach ($question as $questionValue) {
                        	$choice = $this->Common_model->getData($this->table_question_choice, array('question_id'=> $questionValue->question_id),'');
                          $image = $this->Common_model->getSingle($this->table_content, array('content_id'=> $questionValue->content_id));
                         ?>         
                        <div class="contentRow">
                          <div class="form-group">
                            <label>File <?php if(!empty($image)){?><a target="_blank" href="<?php echo base_url().$image->image; ?>"> <i class="fa fa-eye" aria-hidden="true"></i></a> <?php } ?></label>

                            <div class="custom-file">

                              <!-- <input type="file" name="file_<?=$i?>" class="custom-file-input">
                              <label class="custom-file-label" for="customFile">Choose file</label> -->
                              <div class="addContent" id="addContent_<?=$i?>"></div>
                              <button type="button" data-pk="<?=$i?>" class="btn customBtn uploadPopup">Upload</button>


                            </div>
                          </div> 
                          <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question_<?=$i?>" class="form-control" placeholder="" value="<?php echo $questionValue->question; ?>" required>
                          </div>
                          <input type="hidden" name="questionId_<?=$i?>" value="<?php echo $questionValue->question_id; ?>">
                          <div class="form-group radioSec">
                                      <label>Content</label>
                                        <div class="checkBox">
                                            <div class="row">
                                            	<?php $j=0; foreach ($choice as $choiceValue) { ?>

                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_<?=$i?>[]" class="form-control" placeholder="" value="<?= $choiceValue->choice; ?>">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="correct_<?=$i?>[<?=$j?>]" type="checkbox" class="" value="Y" <?=($choiceValue->correct=='Y') ? 'checked' :''?> ></span>
                                                        </div>
                                                      </div>
                                                </div>

                                                <input type="hidden" name="choiceId_<?=$i?>[]" value="<?php echo $choiceValue->choice_id; ?>">
                                                <?php $j++; } ?>
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($i==(count($question)-1)){ ?>
                                    <div class=" addNewRow" data-id="<?=$i+1?>"><a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                                    <div class=" addNewRow" data-id="<?=$i+1?>" style="display: none;"><a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                               		 <?php } ?>
                                     <div class="addBtnSec removeContent" data-question="<?=$questionValue->question_id?>"><a href="javascript:void(0)" ><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                    </div>
                                    <input type="hidden" name="rowId[]" value="<?=$i?>">
                                    <?php $i++;  } ?>
                                    <div class="appendAdd"></div>
                                    
                                    
                                    <button type="submit" name="submit" value="submit" class="btn customBtn" data-toggle="modal" data-target="#exampleModal">Submit</button>
                                </form>
                            </div>
                        </div>

                     </div>
                     
                     
                     
                 </div>
             </div>