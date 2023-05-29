<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			$data['content'] = $this->load->view('site/dashboard/dashboard',$allData, true);
			$this->load->view('template/site/main',$data);
		}

		}	
		else{

			redirect("login");
		}
		
	}


	


}
