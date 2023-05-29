<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

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

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->load->library('user_agent');
		$this->table_login_data = 'user'; 
		$this->load->library('user_agent');
		$this->table_mental_data = 'golfersu_login'; 

       
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('admin_logged_in')){
			$result['mental'] = $this->Common_model->getData($this->table_mental_data,array(),'id');
			//print_r($result['media']);die();
			$data['content'] = $this->load->view('admin/admin-user/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			redirect('admin/login');
		}
		
	}

	public function add()
	{
             
	
			if($this->session->userdata('admin_logged_in')){


				if($this->input->post('email')){
       					
       					



						if($this->input->post('user_manage')){

							$user_manage = 'Y';
						}
						else{
							$user_manage = 'N';
						}
						

						if($this->input->post('student_manage')){

							$student_manage = 'Y';
						}
						else{
							$student_manage = 'N';
						}


						if($this->input->post('media_manage')){

							$media_manage = 'Y';
						}
						else{
							$media_manage = 'N';
						}


						if($this->input->post('video_manage')){
								$video_manage = 'Y';
						}
						else{
							$video_manage = 'N';
						}


						if($this->input->post('promo_manage')){
							$promo_manage = 'Y';
						}
						else{
							$promo_manage = 'N';
						}

						if($this->input->post('payment_manage')){
							$payment_manage = 'Y';
						}
						else{
							$payment_manage = 'N';
						}

						

						
						






						$insertData = array(
							'email' =>$this->input->post('email'),
							'username' =>$this->input->post('email'),
							'password' => md5($this->input->post('password')),

							'user_manage' => $user_manage,
							'student_manage' => $student_manage,
							'media_manage' => $media_manage,
							'video_manage' => $video_manage,
							'promo_manage' => $promo_manage,
							'payment_manage'=> $payment_manage,
						 );
						$this->Common_model->insertData($this->table_mental_data,$insertData);
						$this->session->set_flashdata('success', 'Data Added Successfully.');					
						redirect('admin/admin-user');
		
				}else{
		
		
		
					$allData = array();
					$data['content'] = $this->load->view('admin/admin-user/add',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}
	
	
	public function edit()
	{
             
		 $id = ($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id');
			if($this->session->userdata('admin_logged_in')){
				//print_r($_POST);

				if($this->input->post('id')){

						//print_r($_POST); die();

						if($this->input->post('user_manage')){

							$updateData = array(
								'user_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'user_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						

						if($this->input->post('student_manage')){

							$updateData = array(
								'student_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'student_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}


						if($this->input->post('media_manage')){

							$updateData = array(
								'media_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'media_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}


						if($this->input->post('video_manage')){

							$updateData = array(
								'video_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'video_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}


						if($this->input->post('promo_manage')){

							$updateData = array(
								'promo_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'promo_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}

						if($this->input->post('payment_manage')){

							$updateData = array(
								'payment_manage' => 'Y'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}
						else{
							$updateData = array(
								'payment_manage' => 'N'
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}


						


						if($this->input->post('password') != ''){

							$updateData = array(
								'password' => md5($this->input->post('password'))
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}


						if($this->input->post('email') != ''){

							$updateData = array(
								'email' => $this->input->post('email')
							);
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
						}



						
		
		
					$this->session->set_flashdata('success', 'Data updated successfully.');
					
					redirect('admin/admin-user');
		
				}else{
		
		
		
					$allData = array();
					$allData['steps'] = $this->Common_model->getData('golfersu_steps',array(),'id');
					$allData['mental'] = $this->Common_model->getSingle($this->table_mental_data,array('id'=> $id ));
				//	$result['videoDetails'] = $this->Common_model->getData($this->table_media_data,array(),'id');
		           //print_r($allData['videoDetails']);die();

					$data['content'] = $this->load->view('admin/admin-user/edit',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}

	public function delete($id)
	{

		if($id){

			$this->Common_model->delete_data($this->table_mental_data,array('id' => $id));
			$this->session->set_flashdata('success', 'Data Delete successfully.');
			redirect('admin/admin-user');
		}
		else{

			redirect('admin/admin-user');
		}
		

	}



	


}
