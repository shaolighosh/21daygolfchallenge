<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_condition extends CI_Controller {

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
		$this->load->library("pagination");
		
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->load->library('form_validation');
		$this->table_login_data = 'login';
		$this->table_individual_services = 'individual_services';
		$this->table_terms_condition  = 'terms_condition';
		$this->table_service_round_description = 'service_round_description';
		

	}

	public function index()
	{
		
		if($this->session->userdata('admin_logged_in')){
			if(isset($_GET['id'])){
				$resultCount = $this->Common_model->numrowsDbQuery("Select id from $this->table_individual_services WHERE id='".$_GET['id']."' ");
				}elseif (isset($_GET['date'])) {
					$resultCount = $this->Common_model->numrowsDbQuery("Select id from $this->table_individual_services WHERE create_date='".$_GET['date']."' ");
				
			}else{
				$resultCount = $this->Common_model->numrows($this->table_individual_services,array());
			}
			$config = array();
	        $config["base_url"] = base_url() . "admin/individual-service-management";
	        $config["total_rows"] = $resultCount;
	        $config["per_page"] = 10;
	         if(isset($_GET['id'])){
	        	 $config['reuse_query_string'] = TRUE;
	   		}
	        $config['enable_query_strings'] = TRUE;
	        $config["uri_segment"] = 3;
	        /*$config['cur_tag_open'] = '<strong>';
		    $config['cur_tag_close'] = '</strong>';*/
		    $config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$config['num_links'] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $result['page'] = $page;
	        $result['Allcourse'] = $this->Common_model->getData($this->table_individual_services,array(),'id');  
	        $result["links"] = $this->pagination->create_links();
	        
	        	$result['services'] =$this->Common_model->getDatawithlimit($this->table_terms_condition,array(),'id',$page,10);
	       
	        
		     
		        
		    

			
			$data['content'] = $this->load->view('admin/terms-condition/list',$result, true);
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
			/*  $this->form_validation->set_rules('service_name', 'Service Name', 'required');
			 $this->form_validation->set_rules('square_foot', 'Service Type', 'required');
			 
			 $this->form_validation->set_rules('service_min_price', 'Min Price', 'required'); */
			 $this->form_validation->set_rules('description', 'description', 'required');
			 
        
			if($this->form_validation->run() == false) {
				$allData = '';
				$data['content'] = $this->load->view('admin/terms-condition/add',$allData, true);
				$this->load->view('template/admin/main',$data);
			} else {
				//$date = date('Y-m-d h:m:s');
				$allData = '';
				$userData = array('description'=>$this->input->post('description'));
				//print_r($userData);die();
				 $insert_id = $this->Common_model->insertData($this->table_terms_condition,$userData);
				 $this->session->set_flashdata('success', 'Terms and Conditions Added Successfully.');
				 redirect('admin/terms-condition');
				//redirect('admin/individual-service-management/addservicedescription/'.$insert_id);
			}	
		}else{
			redirect('admin/login');
		}
	}
	public function addservicedescription()
	{
		
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('roundservice')){
				$total_service = $this->input->post('roundservice');
				for( $i = 1; $i<=$total_service;  $i++){ 
				$round_content = $this->input->post('round_content'.$i);
				$round_application = $this->input->post('round_application'.$i);
				$round_period = $this->input->post('round_period'.$i);
				$round_des = $this->input->post('round_des'.$i);
				
				$userData = array('service_type'=>3,'service_id'=>$this->input->post('service_id'),'round_content'=>$round_content,
				'round_application'=>$round_application,'round_period'=>$round_period,'round_des'=>$round_des);
				
				$this->Common_model->insertData($this->table_service_round_description,$userData);
				}
				
				 $this->session->set_flashdata('success', 'Individual Service Updated Successfully.');
				 redirect('admin/individual-service-management/');
				 
			}else{
				$id = $this->uri->segment(4);
				$result['service'] = $this->Common_model->getSingle($this->table_individual_services, array('id'=> $id));
				$data['content'] = $this->load->view('admin/individual-service-management/addservicedescription',$result, true);
				$this->load->view('template/admin/main',$data);
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function edit()
	{
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('description')){
				$termsData = array('description'=>$this->input->post('description'));
				$update = $this->Common_model->dataUpdate($this->table_terms_condition,array('id'=> $this->input->post('id') ),$termsData);
				
				 $this->session->set_flashdata('success', 'Terms & Condition has been Updated Successfully.');
				 redirect('admin/terms-condition');
				 
			}else{
				$id = $this->uri->segment(4);
				$result['terms'] = $this->Common_model->getSingle($this->table_terms_condition, array('id'=> $id));
				
				
				$data['content'] = $this->load->view('admin/terms-condition/edit',$result, true);
				$this->load->view('template/admin/main',$data);
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function editservicedescription()
	{
		
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('roundservice')){
				$total_service = $this->input->post('roundservice');
				for( $i = 1; $i<=$total_service;  $i++){ 
				$service_round_id = $this->input->post('service_round_id'.$i);
				$round_content = $this->input->post('round_content'.$i);
				$round_application = $this->input->post('round_application'.$i);
				$round_period = $this->input->post('round_period'.$i);
				$round_des = $this->input->post('round_des'.$i);
				
				$serviceData = array('round_content'=>$round_content,
				'round_application'=>$round_application,'round_period'=>$round_period,'round_des'=>$round_des);
				
				$update = $this->Common_model->dataUpdate($this->table_service_round_description,array('service_round_id'=> $service_round_id),$serviceData);
				}
				
				 $this->session->set_flashdata('success', 'Individual Service Updated Successfully.');
				 redirect('admin/individual-service-management/');
				 
			}else{
				$id = $this->uri->segment(4);
				$result['rounds'] = $this->Common_model->getAllData($this->table_service_round_description, array('service_id'=> $id, 'service_type'=> 3));
				$result['service'] = $this->Common_model->getSingle($this->table_individual_services, array('id'=> $id));
				$data['content'] = $this->load->view('admin/individual-service-management/editservicedescription',$result, true);
				$this->load->view('template/admin/main',$data);
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	
	public function view()
	{
		if($this->session->userdata('admin_logged_in')){
			
				$id = $this->uri->segment(4);
				$result['service'] = $this->Common_model->getSingle($this->table_individual_services, array('id'=> $id));
				
				
				$data['content'] = $this->load->view('admin/individual-service-management/view',$result, true);
				$this->load->view('template/admin/main',$data);
			
		} else {
			$this->load->view('admin/login');
		}
	}
	public function delete($id)
	{
		
		if($this->session->userdata('admin_logged_in')){
			
			$update = $this->Common_model->delete_data($this->table_terms_condition,array('id'=> $id ));
			
			$this->session->set_flashdata('success', 'Terms and Condition has been Deleted Successfully.');
			redirect('admin/terms-condition');
		}else{
			redirect('admin/login');
		}

	}
}
