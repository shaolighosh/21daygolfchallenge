<div class="content">
                 <div class="container-fluid">
                     
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 page-title">Edit Question</h1>
                         
                         <div class="date-wise-search">
                              
                              <?php if($this->session->flashdata('success')){
                                ?>

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
                                    
                                    
                                    <h3>Add Content with Question Answer</h3>
                                    <div class="contentRow">
                                        <div class="form-group">
                                          <label>File</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="userfile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Question</label>
                                          <input type="hidden" name="question_id" value="<?php echo $question->question_id;?>">
                                          <input type="text" class="form-control" name="question_text" placeholder="" value="<?php echo $question->question;?>" required>
                                        </div>
                                        <div class="form-group radioSec">
                                      <label>Content</label>
                                        <div class="checkBox">
                                            <div class="row">

                                              <?php if(!empty($question_choice)){

                                                  $i =0;
                                                  foreach ($question_choice as $question_choiceVal) {
                                                    ?>
                                                   
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                      <input type="hidden" name="choiceid[]" value="<?php echo $question_choiceVal->choice_id;?>">
                                                        <input type="text" class="form-control" name="choice[]" placeholder="" value="<?php echo $question_choiceVal->choice;?>">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input name="choice_check<?php echo  $i;?>"  type="checkbox" class="" <?php if($question_choiceVal->correct == 'Y'){ echo "checked";} ?> ></span>
                                                        </div>
                                                      </div>
                                                </div>

                                                <?php $i++; }  } ?>
                                               <!--  <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" class=""></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" class=""></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" class=""></span>
                                                        </div>
                                                      </div>
                                                </div> -->
                                            </div>
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