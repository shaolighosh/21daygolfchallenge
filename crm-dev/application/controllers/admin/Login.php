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
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->load->library('user_agent');
		$this->table_login_data = 'golfersu_login'; 

       
      }

	/* admin login */
	public function index()
	{
		if($this->session->userdata('admin_logged_in')){
			redirect('admin/dashboard');
		}
		if($this->input->post('email')){
			$where = array('email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) );
			$rows = $this->Common_model->numrows($this->table_login_data,$where);
			
			
			if($rows > 0){
				$single = $this->Common_model->getSingle($this->table_login_data,$where);
				$newdata = array(
				        'admin_username'  => $single->username,
				        'admin_id'     => $single->id,
				        'admin_role' => $single->role,
				        'admin_logged_in' => TRUE,
				       	'user_manage' => $single->user_manage,
								'student_manage' => $single->student_manage,
								'media_manage' => $single->media_manage,
								'video_manage' => $single->video_manage,
								'promo_manage' => $single->promo_manage,
								'payment_manage' => $single->payment_manage,
				);

				$this->session->set_userdata($newdata);
				
				// remember me
                    if(!empty($this->input->post("remember"))) {
                      setcookie ("loginId", $single->username, time()+ (10 * 365 * 24 * 60 * 60));  
                      setcookie ("loginPass", $this->input->post('password'),  time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                      setcookie ("loginId",""); 
                      setcookie ("loginPass","");
                    }      
					
				redirect('admin/user-management');
			}else{
				$this->session->set_flashdata('error', 'Email or password is worng.');
				redirect('admin/login');
			}
		}else{
			$this->load->view('admin/login/login');
		}
		
	}
	
	/// forget password
	public function forgetpassword()
	{
	if($this->input->post('email'))
		{
			$email=$this->input->post('email');
			$where = array('email' => $this->input->post('email') );
			$rows = $this->Common_model->numrows($this->table_login_data,$where);
			
			$single = $this->Common_model->getSingle($this->table_login_data,$where);
			
			
			
			if($rows > 0){
			$passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass = md5($passwordplain);
        $userData = array('password'=>$newpass);
		$update = $this->Common_model->dataUpdate($this->table_login_data,array('id'=> $single->id ),$userData);


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
						'first_name' => $this->input->post('email'),
						'last_name' => '',
						'password' => $passwordplain,
					);


					$from_email = "golfersu2023@gmail.com";
					$to_email_client = $this->input->post('email');
					$message_client = $this->load->view('forget-email-admin.php',$userDataEmail,TRUE);
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					$this->email->from($from_email,'testdev');
					$this->email->to($this->input->post('email'));
					$this->email->subject('Reset Password');
					$this->email->message($message_client);
					$this->email->set_mailtype("html");
					//$this->email->message('Vetnexus class.');
					$this->email->send();

	
				/*Mail Code*/
				/*$to = $email;
				$subject = "New Password";
				$txt = "Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b> $passwordplain .";
				$headers = "From: password@example.com" . "\r\n";

				mail($to,$subject,$txt,$headers);*/
				$this->session->set_flashdata('success', 'The password has been sent to this email '.$email);
				
			} else {
				$this->session->set_flashdata('success', 'Invalid Email ID !');
			
			}
		
	}
		$this->load->view('admin/login/forgetpassword');
	
	}
	public function change_password()
	{
		if($this->session->userdata('admin_logged_in')){
			
		 $this->load->library('form_validation');

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if($this->form_validation->run() == false) {
				$allData = [];
			$data['content'] = $this->load->view('admin/login/changepassword',$allData, true);
			$this->load->view('template/admin/main',$data);
			}
			else {
	
				$id = $this->session->userdata('id');
	
				$newpass = md5($this->input->post('newpass'));
	
				
				$userData = array('password'=>$newpass);
				$update = $this->Common_model->dataUpdate($this->table_login_data,array('id'=> $id ),$userData);
	
				redirect('admin/logout');
			}
		}
		else
		{


			$this->load->view('admin/login/login');
		}
	}
	 public function password_check($oldpass)
    {
        $id = $this->session->userdata('id');
        $where = array('id' => $id );
        $admin = $this->Common_model->getSingle($this->table_login_data,$where);
        if($admin->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
	
	public function logout()
	{	

		$this->session->sess_destroy();
		redirect("admin");
	}

	
	
} // End Class


