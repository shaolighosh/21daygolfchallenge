<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

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
		$this->table_golfersu_user = 'golfersu_user';
		$this->table_question_choice = 'question_choice';
		$this->table_user_data = 'golfersu_user';



	}

	public function index()
	{
		if($this->session->userdata('admin_logged_in')){

			if(isset($_GET['name']) || isset($_GET['email'])){

				if($_GET['name'] != '' || $_GET['email'] != '' || $_GET['city'] != '' || $_GET['country_id'] != ''){

					$joinSql = '';
					if($_GET['name'] != ''){
						$joinSql .= "  (first_name = '".$_GET['name']."' or last_name = '".$_GET['name']."')";
					}
					if ( $_GET['email'] != '') {
						if($joinSql != ''){
							$joinSql .= " AND ";
						}
						$joinSql .= "  user_email = '".$_GET['email']."'";
					}
					if ( $_GET['city'] != '') {
						if($joinSql != ''){
							$joinSql .= " AND ";
						}
						$joinSql .= "  city = '".$_GET['city']."'";
					}
					if ( $_GET['country_id'] != '') {
						if($joinSql != ''){
							$joinSql .= " AND ";
						}
						$joinSql .= "  country_id = '".$_GET['country_id']."'";
					}

					if($joinSql != ''){
						//echo "select * from golfersu_user where  $joinSql  order by id desc"; die();
						$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where  $joinSql  order by id desc");
					}
					else{

						$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
					}
					// if($_GET['name'] != '' && $_GET['email'] != '' && $_GET['city'] != '' && $_GET['country_id'] != ''){
					// 	$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where (first_name = '".$_GET['name']."' or last_name = '".$_GET['name']."') AND user_email = '".$_GET['email']."'   order by id desc");
					// }
					// elseif ($_GET['email'] != '') {
					// 	$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where user_email = '".$_GET['email']."'   order by id desc");
					// }
					// elseif ($_GET['name'] != '') {
					// 	$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where (first_name = '".$_GET['name']."' or last_name = '".$_GET['name']."') order by id desc");
					// }
					// else{
					// 	$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
					// }
					
				}
				else{

					$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
				}

			}
			else{
				$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');

			}
			$result['countries'] = $this->Common_model->getAllDataOrder('golfersu_signup_countries', array(),'country_name','ASC');
			$result['countries'] = $this->Common_model->getAllDataOrder('golfersu_signup_countries', array(),'country_name','ASC');
			//$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
			$data['content'] = $this->load->view('admin/user-management/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			redirect('admin/login');
		}
		
	}
	public function status($status,$id){
		if($this->session->userdata('logged_in')){
			$this->Common_model->update_data($this->table_user_data,array('id' => $id ),array('status' =>$status));
			$this->session->set_flashdata('success', 'Updated Successfully.');
			redirect('admin/user-management');
		}else{
			$this->load->view('admin/login');
		}
	}
/* 	public function delete($id){
		if($this->session->userdata('logged_in')){
			$this->Common_model->delete_data($this->table_user_data,array('id' => $id));
			$this->session->set_flashdata('success', 'Deleted Successfully.');
			redirect('admin/user-management');
		}else{
			$this->load->view('admin/login');
		}

	} */

	public function edit()
	{
             
		 $user_id = ($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id');
			if($this->session->userdata('admin_logged_in')){


				if($this->input->post('first_name')){
					$user_id = $this->input->post('id');
				//	$userId = $this->session->userdata('admin_logged_in');
                        	$updateData = array(
		
								'first_name' => $this->input->post('first_name'),		
								'last_name' => $this->input->post('last_name'),		
								'user_email' => $this->input->post('email'),		
								'street_address' => $this->input->post('street_address'),		
								'city' => $this->input->post('city'),	
								'post_code' => $this->input->post('post_code'),	
								'username' => $this->input->post('username'),	

								'country_id' => $this->input->post('country_id'),
								'username' => $this->input->post('username'),
								'password' => md5($this->input->post('confirm_password')),
															
								 );
		
		//print_r($updateData);die();
							$this->Common_model->update_data('golfersu_user',array('id' => $user_id),$updateData);
		
					
					 
		
					/*$where = array('user_email' => $this->input->post('email') );
					$rows = $this->Common_model->numrows($this->table_login_data,$where);
					if($rows == 0){
						//$single = $this->Common_model->getSingle($this->table_login_data,$where);
						$newdata = array(
								'first_name'  => $this->input->post('first_name'),
								'last_name'  => $this->input->post('last_name'),
								'hk_id'  => $this->input->post('hk_id'),
								'email'  => $this->input->post('email'),
								'rank'  => $this->input->post('rank'),
								'password'  => $this->input->post('confirm_password')
						);
		
						$this->session->set_userdata($newdata);
						redirect('registration/step2');
					}else{
						$this->session->set_flashdata('error', 'Email Already exists.');
						redirect($this->agent->referrer());
						
					}*/
		
					$this->session->set_flashdata('success', 'Data updated successfully.');
					redirect('admin/user-management');
		
				}else{
		
		
		
					$allData = array();
					$allData['userDetails'] = $this->Common_model->getSingle('golfersu_user',array('id'=> $user_id ));
		//print_r($allData['userDetails']);die();
					$allData['countries'] = $this->Common_model->getAllDataOrder('golfersu_signup_countries', array(),'country_name','ASC');
					$data['content'] = $this->load->view('admin/user-management/edit',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}


	public function show()
	{
             
		 $user_id = ($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id');
			if($this->session->userdata('admin_logged_in')){


				if($this->input->post('first_name')){

					$user_id = $this->input->post('id');
                	$updateData = array(
						'first_name' => $this->input->post('first_name'),		
						'last_name' => $this->input->post('last_name'),		
						'user_email' => $this->input->post('email'),		
						'street_address' => $this->input->post('street_address'),		
						'city' => $this->input->post('city'),	
						'post_code' => $this->input->post('post_code'),	
						'username' => $this->input->post('username'),	
													
						 );
					$this->Common_model->update_data('golfersu_user',array('id' => $user_id),$updateData);	
					$this->session->set_flashdata('success', 'Data updated successfully.');
					redirect('admin/user-management');
		
				}else{
		
		
		
					$allData = array();
					$allData['userDetails'] = $this->Common_model->getSingle('golfersu_user',array('id'=> $user_id ));

					$allData['userVideos'] = $this->Common_model->getAllData('golfersu_userstep_video',array('user_id'=> $user_id ));
					$allData['userProgress'] = $this->Common_model->dbQuery("select * from golfersu_progress where user_id = '".$user_id."' order by id desc limit 0,1 ");
					//print_r($allData['userVideos']);die();

					$data['content'] = $this->load->view('admin/user-management/show',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}


	public function delete()
	{

		if($this->session->userdata('admin_logged_in')){

			$userId = $this->uri->segment(4);
		
			$this->Common_model->delete_data($this->table_golfersu_user,array('id' => $userId));

			$this->session->set_flashdata('success', 'User Data Deleted Successfully.');
			redirect('admin/user-management/');
		}
		else
		{


			redirect('admin/login');
		}
		
	}

	public function inactiveStatus()
	{

		if($this->session->userdata('admin_logged_in')){

			$userId = $this->uri->segment(4);
		
			$this->Common_model->update_data($this->table_golfersu_user,array('id' => $userId),array('status' => 'N'));

			$this->session->set_flashdata('success', 'User Disabled Successfully.');
			redirect('admin/user-management/');
		}
		else
		{


			redirect('admin/login');
		}
		
	}

	public function activeStatus()
	{

		if($this->session->userdata('admin_logged_in')){

			$userId = $this->uri->segment(4);
		
			$this->Common_model->update_data($this->table_golfersu_user,array('id' => $userId),array('status' => 'Y'));

			$this->session->set_flashdata('success', 'User Enabled Successfully.');
			redirect('admin/user-management/');
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
