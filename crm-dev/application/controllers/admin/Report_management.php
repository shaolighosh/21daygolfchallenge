<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_management extends CI_Controller {

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
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->table_login_data = 'login';
		$this->table_question_data = 'question_data';
		$this->table_question_choice = 'question_choice';




	}

	public function index()
	{

		if($this->session->userdata('logged_in')){


			$allData['question'] = $this->Common_model->getAllDataOrder($this->table_question_data, '','question_id','DESC');
			$data['content'] = $this->load->view('admin/report/list',$allData, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{


			redirect('admin/login');
		}
		
	}

	public function edit()
	{

		if($this->session->userdata('logged_in')){



			if($this->input->post('question_id')){

				echo "<pre>";
					print_r($_FILES);

					$choiceId = $this->input->post('choiceid');
					$choice = $this->input->post('choice');
					$choiceCheck = $this->input->post('choice_check');
					


					$config['upload_path']          = './public/uploads/module/';
	                $config['allowed_types']        = 'gif|jpg|png|jpeg|mov|avi|flv|wmv|mp3|mp4';
	               /* $config['max_size']             = 100;
	                $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('userfile'))
	                {
	                        
	                        $this->Common_model->dataUpdate($this->table_question_data,array('question_id' => $this->input->post('question_id') ),array('question' => $this->input->post('question_text') ));

	                }
	                else
	                {
	                        $imageData  = $this->upload->data();


	                         $this->Common_model->dataUpdate($this->table_question_data,array('question_id' => $this->input->post('question_id') ),array('question' => $this->input->post('question_text'), 'question_image' => '/public/uploads/module/'.$imageData['file_name'] ));




	                        //print_r($imageData);
	                        //$this->load->view('upload_success', $data);


	                }





					


					if(!empty($choiceId)){

						$i = 0;
						foreach ($choiceId as $choiceIdVal) {

							echo $choice[$i];
							if( $this->input->post('choice_check'.$i)){

								$check = "Y";
							}
							else
							{
								$check =  "N";
							}

							$this->Common_model->dataUpdate($this->table_question_choice,array('question_id' => $this->input->post('question_id'), 'choice_id' =>  $choiceIdVal ),array('choice' => $choice[$i],'correct' => $check ));




							$i++;
						}

						
					}


				 $this->session->set_flashdata('success', 'Data updated Successfully.');
				 redirect('admin/image-audio-video-managment/');



			}
			else{

				$questionId = $this->uri->segment(4);
				$allData['question'] = $this->Common_model->getSingle($this->table_question_data,array('question_id' => $questionId));
				$allData['question_choice'] = $this->Common_model->getAllData($this->table_question_choice, array('question_id' => $questionId)); 
				$data['content'] = $this->load->view('admin/image-video/edit',$allData, true);
				$this->load->view('template/admin/main',$data);
			}
			
		}
		else
		{


			redirect('admin/login');
		}
		
	}


	public function delete()
	{

		if($this->session->userdata('logged_in')){

			$questionId = $this->uri->segment(4);
			$this->Common_model->delete_data($this->table_question_data,array('question_id' => $questionId));
			$this->Common_model->delete_data($this->table_question_choice,array('question_id' => $questionId));

			$this->session->set_flashdata('success', 'Data Deleted Successfully.');
			redirect('admin/image-audio-video-managment/');
		}
		else
		{


			redirect('admin/login');
		}
		
	}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
