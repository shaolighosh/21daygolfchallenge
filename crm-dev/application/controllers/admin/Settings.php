<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
		$this->table_login_data = 'login'; 
		$this->load->library('user_agent');

       
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('admin_logged_in')){


		if($this->input->post('username')){

			$userId = $this->session->userdata('admin_logged_in');

			if($this->input->post('confirm_password')){

				$updateData = array(
					'username' => $this->input->post('username'),
					
					'password' => md5($this->input->post('password')),					

				 );

				// print_r($updateData);die();
				$this->Common_model->update_data('golfersu_login',array('id' => $userId),$updateData);



			}
			else{
					

					$updateData = array(

						'username' => $this->input->post('username'),
					
						'password' => md5($this->input->post('password')),			
													
						 );


					$this->Common_model->update_data('golfersu_login',array('id' => $userId),$updateData);

			}
			 

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
			redirect('admin/settings');

		}else{



			$allData = array();
			$allData['userDetails'] = $this->Common_model->getSingle('golfersu_login',array('id'=> $this->session->userdata('admin_logged_in') ));

			$data['content'] = $this->load->view('admin/settings/edit',$allData, true);
			$this->load->view('template/admin/main',$data);
		}

		}	
		else{

			redirect("admin/login");
		}
		
	}


	


}
