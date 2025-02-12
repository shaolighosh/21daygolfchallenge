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
		$this->table_login_data = 'user'; 
		$this->load->library('user_agent');

       
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('user_id')){


		if($this->input->post('first_name')){

			$userId = $this->session->userdata('user_id');


			 
			if(isset($_FILES['profile']) && !empty($_FILES['profile']['name'])){
				$config['upload_path'] =  'public/upload/profile/';
				$config['file_name'] = time();
                $config['allowed_types'] = 'png|jpg|jpeg';
                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('profile')){
                	$error = $this->upload->display_errors();

                	
                }else{
                	$data = $this->upload->data();
                	//print_r($data );
                	$insertData['banner_image'] = 'public/upload/profile/'.$data['file_name'];

                	$updateData = array(
						'user_image' => $insertData['banner_image']
					);
					$this->Common_model->update_data('golfersu_user',array('id' => $userId),$updateData);

					

                }
			} 



			if($this->input->post('confirm_password')){

				$updateData = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					//'hk_id' => $this->input->post('hk_id'),
					'email_settings' => $this->input->post('email_settings'),
					'phone_no_communication' => $this->input->post('phone_no_communication'),
					//'rank' => $this->input->post('rank'),
					'password' => md5($this->input->post('password')),
					'phone' => $this->input->post('phone'),
					'country_id' => $this->input->post('country_id'),
					
					'street_address' => $this->input->post('street_address'),
					'street_address1' => $this->input->post('street_address1'),
					'city' => $this->input->post('city'),
					//'video_file' => $this->input->post('stripeToken'),
					'post_code' => $this->input->post('post_code'),
					

				 );


				$this->Common_model->update_data('golfersu_user',array('id' => $userId),$updateData);



			}
			else{
					

					$updateData = array(

						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),

						'email_settings' => $this->input->post('email_settings'),

						'phone_no_communication' => $this->input->post('phone_no_communication'),
						'phone' => $this->input->post('phone'),
						//'hk_id' => $this->input->post('hk_id'),
						
						//'rank' => $this->input->post('rank'),
						'country_id' => $this->input->post('country_id'),
					
						'street_address' => $this->input->post('street_address'),
						'street_address1' => $this->input->post('street_address1'),
						'city' => $this->input->post('city'),
						//'video_file' => $this->input->post('stripeToken'),
						'post_code' => $this->input->post('post_code'),
						
							
						 );


					$this->Common_model->update_data('golfersu_user',array('id' => $userId),$updateData);

			}
			 

			

			$this->session->set_flashdata('success', 'Data updated successfully.');
			redirect('settings');

		}else{



			$allData = array();
			$allData['userDetails'] = $this->Common_model->getSingle('golfersu_user',array('id'=> $this->session->userdata('user_id') ));
			$allData['countries'] = $this->Common_model->getAllDataOrder('golfersu_signup_countries', array(),'country_name','ASC');
			$data['content'] = $this->load->view('site/settings/edit',$allData, true);
			$this->load->view('template/site/main',$data);
		}

		}	
		else{

			redirect("login");
		}
		
	}


	


}
