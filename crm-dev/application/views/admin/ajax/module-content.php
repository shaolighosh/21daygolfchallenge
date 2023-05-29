<div class="contentRow">
  <?php $q_id=$this->input->post('rows');?>
                                        <div class="form-group">
                                          <label>File</label>
                                          <div class="custom-file">
                                            <!-- <input type="file" name="fileup[]" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label> -->
                                            <div class="addContent" id="addContent_<?php echo $this->input->post('rows'); ?>"></div>
                                            <button type="button" class="btn customBtn uploadPopup" data-pk="<?php echo $this->input->post('rows'); ?>">Upload</button>
                                          </div>
                                        </div>
                                        <div class="form-group"> 
                                          <label>Question</label>
                                          <input type="text" name="question_<?=$q_id?>" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group radioSec">
                                      <label>Content</label>
                                        <div class="checkBox">
                                            <div class="row"> 
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_<?=$q_id?>[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" name="correct_<?=$q_id?>[0]" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_<?=$q_id?>[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" name="correct_<?=$q_id?>[1]" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_<?=$q_id?>[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" name="correct_<?=$q_id?>[2]" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="text" name="choice_<?=$q_id?>[]" class="form-control" placeholder="">
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"><input type="checkbox" name="correct_<?=$q_id?>[3]" class="" value="Y"></span>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="hidden" name="rowId[]" value="<?php echo $this->input->post('rows'); ?>">
                                    <div class="addBtnSec addNewRow" data-id="<?php echo $this->input->post('rows'); ?>"><a href="javascript:void(0)"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                                    <div class="addBtnSec removeContent"  style="display: none;"><a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>