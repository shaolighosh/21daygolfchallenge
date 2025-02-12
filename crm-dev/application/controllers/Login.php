<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->helper('cookie');
		$this->load->helper('string');
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->load->library('user_agent');
		$this->table_login_data = 'golfersu_user'; 
		$this->load->library('user_agent');
		$this->table_login_data = 'golfersu_user';
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('logged_in')){
			
			redirect('challenge');
		}
		
		if($this->input->post('email')){
			
			$where = array('user_email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) );
			$rows = $this->Common_model->numrows($this->table_login_data,$where);


			
			//print_r($_POST); die();
		
			if($rows > 0){

				$single = $this->Common_model->getSingle($this->table_login_data,$where);

				if($single->status == 'Y'){

					if($this->input->post('password')){

					$cookie = array(
						'name'   => 'remember_email',
						'value'  => $this->input->post('email'),
						'expire' => time()+86500,
						);
					$this->input->set_cookie($cookie);

					$cookie1 = array(
							'name'   => 'remember_password',
							'value'  => $this->input->post('password'),
							'expire' => time()+86500,
							);
						$this->input->set_cookie($cookie1);
					}

					
					//print_r($single);die();
					$newdata = array(
					        'user_id'  => $single->id,
					        'id'     => $single->id,
					        'role' => $single->user_email,
					        'logged_in' => TRUE
					);

					$this->session->set_userdata($newdata);
					redirect('challenge');


				}
				else{

					$this->session->set_flashdata('error', 'User is disabled by Administrator');
					redirect('login');
				}
				
			}else{
				
				$this->session->set_flashdata('error', 'Email or password is worng.');
				redirect('login');
			}
		}else{
			$this->load->view('site/login/login');
		}
		
	}
	

	public function forget_password()
	{
		
		
		
		if($this->input->post('email')){
			
			$where = array('user_email' => $this->input->post('email'));
			$rows = $this->Common_model->numrows($this->table_login_data,$where);
		
			if($rows > 0){

				

				$single = $this->Common_model->getSingle($this->table_login_data,$where);

				$password = random_string('alnum', 8);
				$updateArray = array(
					'password' => md5($password),
				);

				$this->Common_model->update_data($this->table_login_data,array('id' => $single->id),$updateArray);
						
						


				$config = array(
						'protocol' =>  'smtp',//'smtp',  'mail', 'sendmail', or 'smtp'
						'smtp_host' => 'smtp.gmail.com', 
						'smtp_port' => 465,
						'smtp_user' => 'golfersu2023@gmail.com',
						//'smtp_pass' => 'Option1234@',
						'smtp_pass' => 'zfgpvksesrylpvdf',
						'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
						'mailtype' => 'HTML', //plaintext 'text' mails or 'html'
						'smtp_timeout' => '4', //in seconds
						'charset' => 'UTF-8',
						'wordwrap' => TRUE
					);
					//$this->load->config('email');
					$this->load->library('email');
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");  

						


					$userDataEmail = array(
						'user_email' => $this->input->post('email'),
						'first_name' => $single->first_name,
						'last_name' => $single->first_name,
						'password' => $password,
					);


					$from_email = "golfersu2023@gmail.com";
					$to_email_client = $this->input->post('email');
					$message_client = $this->load->view('forget-email.php',$userDataEmail,TRUE);
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					$this->email->from($from_email,'golfersu');
					$this->email->to($this->input->post('email'));
					$this->email->subject('Reset Password');
					$this->email->message($message_client);
					$this->email->set_mailtype("html");
					//$this->email->message('Vetnexus class.');
					$this->email->send();

				
				// $newdata = array(
				//         'user_id'  => $single->id,
				//         'id'     => $single->id,
				//         'role' => $single->user_email,
				//         'logged_in' => TRUE
				// );

				// $this->session->set_userdata($newdata);
				//print_r($_SESSION);die();

				$this->session->set_flashdata('success', 'Please check your email for new password.');
				redirect('login/forget-password');
			}else{
				
				$this->session->set_flashdata('error', 'Email is worng.');
				redirect('login');
			}
		}else{
			$this->load->view('site/login/forget-password');
		}
		
	}

	public function logout()
	{	

		$this->session->sess_destroy();
		redirect("/");
	}





}
