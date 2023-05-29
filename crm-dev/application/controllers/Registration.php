<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
			redirect('dashboard');
		}
		if($this->input->post('first_name')){


		

			$where = array('user_email' => $this->input->post('email') );
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
				
			}


		}else{



			$allData = '';
			$data['content'] = $this->load->view('site/registration/step1',$allData, true);
			$this->load->view('template/site/main',$data);
		}
		
	}


	public function step2()
	{
		if($this->session->userdata('user_id')){
			redirect('dashboard');
		}
		if($this->input->post('image_data')){


			//print_r($_POST);	
			
			define('UPLOAD_DIR', FCPATH.'/public/uploads/userimages/');

			//define('UPLOAD_DIR', 'images/');
			$img = $_POST['image_data'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$imageName = uniqid() . '.png';
			$file = UPLOAD_DIR . $imageName;
			$success = file_put_contents($file, $data);
			//print $success ? $file : 'Unable to save the file.';

			if($success){


				
				$insertData = array('first_name' => $this->session->userdata('first_name'),

					'last_name' => $this->session->userdata('last_name'),

					'hk_id' => $this->session->userdata('hk_id'),

					'user_email' => $this->session->userdata('email'),

					'rank' => $this->session->userdata('rank'),

					'password' => md5($this->input->post('password')),
					'user_image' => '/public/uploads/userimages/'.$imageName

				 );


				$this->Common_model->insertData('user',$insertData);

				//$this->session->set_userdata($newdata);
				$this->session->sess_destroy();
				
				redirect('registration/success');

			}
			else{

				redirect('registration/step2');
			}


			

			


		}else{


			//print_r($_SESSION);

			$allData = '';
			$data['content'] = $this->load->view('site/registration/step2',$allData, true);
			$this->load->view('template/site/main',$data);
		}
		
	}

	public function success()
	{
		if($this->session->userdata('user_id')){
			redirect('dashboard');
		}

		$allData = '';
		$data['content'] = $this->load->view('site/registration/success',$allData, true);
		$this->load->view('template/site/main',$data);


	}



}
