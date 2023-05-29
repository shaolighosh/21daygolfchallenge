<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_management extends CI_Controller {

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
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->table_login_data = 'login';
		$this->table_user_data = 'user';
	}

	public function index()
	{
		if($this->session->userdata('admin_logged_in')){
			$allData = [];
			$allData['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
			$data['content'] = $this->load->view('admin/sales-management/list',$allData, true);
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
			 $this->form_validation->set_rules('first_name', 'First Name', 'required');
             $this->form_validation->set_rules('last_name', 'Last Name', 'required');
			 $this->form_validation->set_rules('email', 'Email Id', 'required');
			 $this->form_validation->set_rules('pass', 'Password', 'required');
             $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			 
			if($this->form_validation->run() == false) {
				$allData = '';
				$data['content'] = $this->load->view('admin/sales-management/add',$allData, true);
				$this->load->view('template/admin/main',$data);
			} else {
				$pass = md5($this->input->post('pass'));
				$date = date('Y-m-d h:m:s');
				$userData = array('first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'user_email'=>$this->input->post('email'),'password'=>$pass,'create_date'=> $date);
				 $this->Common_model->insertData($this->table_user_data,$userData);
				 $this->session->set_flashdata('success', 'Sales Rep Added Successfully.');
				redirect('admin/sales-management/');
			}	
		}else{
			$this->load->view('admin/login');
		}
	}

	public function view()
	{
		if($this->session->userdata('admin_logged_in')){
			
				$id = $this->uri->segment(4);
				$result['rep'] = $this->Common_model->getSingle($this->table_user_data, array('id'=> $id));
				
				
				$data['content'] = $this->load->view('admin/sales-management/view',$result, true);
				$this->load->view('template/admin/main',$data);
			
		} else {
			$this->load->view('admin/login');
		}
	}

	public function edit()
	{
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('first_name')){
				$userData = array(
					'user_email'=>$this->input->post('email'),
					'first_name '=>$this->input->post('first_name'),
					'last_name '=>$this->input->post('last_name'),
					'password'=>$this->input->post('pass'),
				);

			//	print_r($userData);die();
				$update = $this->Common_model->dataUpdate($this->table_user_data,array('id'=> $this->input->post('id') ),$userData);
				
				 $this->session->set_flashdata('success', 'Sales Rep has been Updated Successfully.');
				 redirect('admin/sales-management');
				 
			}else{
				$id = $this->uri->segment(4);
				$result['rep'] = $this->Common_model->getSingle($this->table_user_data, array('id'=> $id));
				
				
				$data['content'] = $this->load->view('admin/sales-management/edit',$result, true);
				$this->load->view('template/admin/main',$data);
			}
		}else{
			$this->load->view('admin/login');
		}
	}

	public function delete($id)
	{
		
		if($this->session->userdata('admin_logged_in')){
			
			$update = $this->Common_model->delete_data($this->table_user_data,array('id'=> $id ));
			
			$this->session->set_flashdata('success', 'Sales Rep has been Deleted Successfully.');
			redirect('admin/sales-management');
		}else{
			redirect('admin/login');
		}

	}
	
}
