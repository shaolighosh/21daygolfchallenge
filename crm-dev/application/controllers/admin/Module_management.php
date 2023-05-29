<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_management extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()  
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library("pagination");
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->table_login_data = 'login';
		$this->table_course_data = 'course_management';
		$this->table_question_data = 'question_data';
		$this->table_question_choice = 'question_choice';
		$this->table_module = 'module';
		$this->table_content = 'content';
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
			if(isset($_GET['id'])){
				$resultCount = $this->Common_model->numrowsDbQuery("Select * from $this->table_module WHERE module_id='".$_GET['id']."' ");
				}elseif (isset($_GET['date'])) {
					$resultCount = $this->Common_model->numrowsDbQuery("Select * from $this->table_module WHERE created='".$_GET['date']."' ");
				
			}else{
				$resultCount = $this->Common_model->numrowsDbQuery("SELECT * FROM $this->table_module");
			}
			$config = array();
	        $config["base_url"] = base_url() . "admin/module-management";
	        $config["total_rows"] = $resultCount;
	        $config["per_page"] = 10;
	         if(isset($_GET['id'])){
	        	 $config['reuse_query_string'] = TRUE;
	   		}
	        $config['enable_query_strings'] = TRUE;
	        $config["uri_segment"] = 3;
	        /*$config['cur_tag_open'] = '<strong>';
		    $config['cur_tag_close'] = '</strong>';*/
		    $config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$config['num_links'] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $result['page'] = $page;
	        $result['Allmodule'] = $this->Common_model->getData($this->table_module,array(),'module_id');  
	        $result["links"] = $this->pagination->create_links();
	        if(isset($_GET['id'])){
	        	$result['module'] = $this->Common_model->dbQuery("Select * from $this->table_module WHERE module_id='".$_GET['id']."'");
	        }elseif (isset($_GET['date'])) {
	        	$result['module'] = $this->Common_model->dbQuery("Select * from $this->table_module WHERE created='".$_GET['date']."'");
	        }else{
	        	$result['module'] = $this->Common_model->getDatawithlimit($this->table_module,array(),'module_id',$page,10);
	        }
	        
			$data['content'] = $this->load->view('admin/module-management/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			$this->load->view('admin/login');
		}
		
	}

	public function add()
	{
		if($this->session->userdata('logged_in')){
			if($this->input->post('moduleName')){
				
				
				$courseId = $this->input->post('courseName');
				$content = $this->input->post('optradio');
				$rowId = $this->input->post('rowId');
				$moduleData = array('module_name'=>$this->input->post('moduleName'),'course_id'=>$courseId,'content'=>$content,'created'=>date('Y-m-d H:i:s'));
				$this->Common_model->insertData($this->table_module,$moduleData);
				$moduleId = $this->db->insert_id();
				$i=0;
				foreach ($rowId as $value) {
					 if($this->input->post('file_'.$value)){
					 	$contentId = $this->input->post('file_'.$value);
					 }else{
					 	$contentId = '';
					 }
					 $question = $this->input->post('question_'.$value);
					$choice = $this->input->post('choice_'.$value);
					$correct = $this->input->post('correct_'.$value);
					$questionData = array('module_id'=>$moduleId,'course_id'=>$courseId,'content'=>$content,'content_id'=>$contentId,'question'=> $question,'created' => date('Y-m-d H:i:s'));
					$this->Common_model->insertData($this->table_question_data,$questionData);
					
					$questionId = $this->db->insert_id();
					$j = 0;
					foreach ($choice as $choice ) {
						
							if(!empty($correct[$j])){
								$choiceData = array('question_id'=>$questionId,'choice'=>$choice,'correct'=>$correct[$j],'created'=>date('Y-m-d H:i:s'));
								$this->Common_model->insertData($this->table_question_choice,$choiceData);
							}else{
								$choiceData = array('question_id'=>$questionId,'choice'=>$choice,'created'=>date('Y-m-d H:i:s'));
								$this->Common_model->insertData($this->table_question_choice,$choiceData);
							}
						

						$j++;
						

					}
					 
					
				$i++;
				}
				$this->session->set_flashdata('success', 'Module Data Insert Successfully.');
				 redirect('admin/module-management/');
				
			}else{
				$result['course'] =$this->Common_model->getData($this->table_course_data,array('status'=>'Y'),'id');
				$data['content'] = $this->load->view('admin/module-management/add',$result, true);
				$this->load->view('template/admin/main',$data);

			}
			
		}else{
			$this->load->view('admin/login');
		}

	}
	public function edit()
	{
		if($this->session->userdata('logged_in')){
			if($this->input->post('moduleName')){
				$rowId = $this->input->post('rowId');
					foreach ($rowId as $i) {
					$question = $this->input->post('question_'.$i);
					$choice = $this->input->post('choice_'.$i);
					$correct = $this->input->post('correct_'.$i);
					$questionId = $this->input->post('questionId_'.$i);
					$choiceId = $this->input->post('choiceId_'.$i);
					$file = $this->input->post('file_'.$i);
					$moduleData = array('module_name'=>$this->input->post('moduleName'),'course_id'=>$this->input->post('courseName'),'content'=>$this->input->post('optradio'));
					$this->Common_model->dataUpdate($this->table_module,array('module_id' =>$this->input->post('moduleId')),$moduleData);
					if(!empty($choiceId)){
						if(!empty($file)){
							
					        $this->Common_model->dataUpdate($this->table_question_data,array('question_id' =>$questionId),array('content_id'=>$file));
					         
						}
						 
						$questionData = array('course_id'=>$this->input->post('courseName'),'content'=>$this->input->post('optradio'),'question'=> $question,'modified' => date('Y-m-d H:i:s'));
						$this->Common_model->dataUpdate($this->table_question_data,array('question_id' =>$questionId),$questionData);
						$j = 0;
						foreach ($choice as $choiceValue ) {
						if(!empty($correct[$j])){
							$choiceData = array('choice'=>$choice[$j],'correct'=>$correct[$j]);
							$this->Common_model->dataUpdate($this->table_question_choice,array('choice_id' =>$choiceId[$j]),$choiceData);
						}else{
							$choiceData = array('choice'=>$choice[$j]);
							$this->Common_model->dataUpdate($this->table_question_choice,array('choice_id' =>$choiceId[$j]),$choiceData);
						}

						$j++;

					}

					}else{
						$j = 0;

				         if($this->input->post('file_'.$i)){
						 	$contentId = $this->input->post('file_'.$i);
						 }else{
						 	$contentId = '';
						 }


						$questionData = array('module_id'=>$this->input->post('moduleId'),'course_id'=>$this->input->post('courseName'),'content'=>$this->input->post('optradio'),'content_id'=>$contentId,'question'=> $question,'created' => date('Y-m-d H:i:s'));
						$this->Common_model->insertData($this->table_question_data,$questionData);
						$questionId = $this->db->insert_id();
						foreach ($choice as $choiceValue ) {
						if(!empty($correct[$j])){
							$choiceData = array('question_id'=>$questionId,'choice'=>$choice[$j],'correct'=>$correct[$j],'created'=>date('Y-m-d H:i:s'));
							$this->Common_model->insertData($this->table_question_choice,$choiceData);
						}else{
							$choiceData = array('question_id'=>$questionId,'choice'=>$choice[$j],'created'=>date('Y-m-d H:i:s'));
							$this->Common_model->insertData($this->table_question_choice,$choiceData);
						}

						$j++;

					}

					}
					


				}
				$this->session->set_flashdata('success', 'Module Updated Successfully.');
				 redirect('admin/module-management/');
				
			}else{
				$id = $this->uri->segment(4);
				$result['course'] =$this->Common_model->getData($this->table_course_data,array('status'=>'Y'),'id');
				$result['module'] = $this->Common_model->getSingle($this->table_module, array('module_id'=> $id));
 
				$result['question'] = $this->Common_model->dbQuery("Select * from $this->table_question_data WHERE module_id='".$result['module']->module_id."'");

				$data['content'] = $this->load->view('admin/module-management/edit',$result, true);
				$this->load->view('template/admin/main',$data);

			}
			
		}else{
			$this->load->view('admin/login');
		}

	}
	public function delete($id)
	{
		if($this->session->userdata('logged_in')){
			$module_id = $id;
			//$moduleDelete = $this->Common_model->delete_data($this->table_module,array('module_id'=> $module_id));
			$questionData = $this->Common_model->getData($this->table_question_data,array('module_id'=>$module_id),'question_id');
			foreach ($questionData as $questionValue) {
				$questionDelete = $this->Common_model->delete_data($this->table_question_data,array('question_id'=> $questionValue->question_id ));
				$choiceDelete = $this->Common_model->delete_data($this->table_question_choice,array('question_id'=> $questionValue->question_id ));
			}
			$this->session->set_flashdata('success', 'Module Delete Successfully.');
			redirect('admin/module-management/');
		}else{
			$this->load->view('admin/login');
		}

	}
	public function singleQuestionDelete(){
		$questionId = $this->input->post('questionId');
		$questionDelete = $this->Common_model->delete_data($this->table_question_data,array('question_id'=> $questionId ));
		$choiceDelete = $this->Common_model->delete_data($this->table_question_choice,array('question_id'=> $questionId ));
	}
}
