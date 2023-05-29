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

	public function __construct()  
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->table_login_data = 'login';
		$this->table_module = 'module';
		$this->table_course_data = 'course_management';
		$this->table_content = 'content';
		$this->table_user_data = 'user';
	}

	public function index()
	{
		if($this->session->userdata('admin_logged_in')){
			$allData = [];
			// $allData['userCount'] = $this->Common_model->numrows($this->table_user_data,array());
			// $allData['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
			// $allData['course'] = $this->Common_model->getData($this->table_course_data,array('status'=>'Y'),'id');  
			$data['content'] = $this->load->view('admin/dashboard/home',$allData, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{


			$this->load->view('admin/login/login');
		}
		
	}
	public function change_password()
	{
		if($this->session->userdata('admin_logged_in')){
			$allData = [];
			// $allData['userCount'] = $this->Common_model->numrows($this->table_user_data,array());
			// $allData['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
			// $allData['course'] = $this->Common_model->getData($this->table_course_data,array('status'=>'Y'),'id');  
			$data['content'] = $this->load->view('admin/dashboard/home',$allData, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{


			$this->load->view('admin/login/login');
		}
	}

	
}
