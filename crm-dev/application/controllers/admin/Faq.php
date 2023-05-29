<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

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
		$this->table_mental_data = 'golfersu_faq'; 

       
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('admin_logged_in')){
			$result['mental'] = $this->Common_model->getData($this->table_mental_data,array(),'id');
			//print_r($result['media']);die();
			$data['content'] = $this->load->view('admin/faq/list',$result, true);
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


				if($this->input->post('title')){
       			
						$insertData = array(
							'title' =>$this->input->post('title'),
							'content' =>$this->input->post('content'),
							
						 );
						$this->Common_model->insertData($this->table_mental_data,$insertData);
						$this->session->set_flashdata('success', 'Faq Added Successfully.');					
						redirect('admin/faq');
		
				}else{
		
		
		
					$allData = array();
					$data['content'] = $this->load->view('admin/faq/add',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}
	
	
	public function edit()
	{
             
		 $id = ($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id');
			if($this->session->userdata('admin_logged_in')){


				if($this->input->post('title')){

		
		
						$updateData = array(
							'title' =>$this->input->post('title'),
							'content' =>$this->input->post('content'),
						);
	
						$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
		
		
					$this->session->set_flashdata('success', 'Faq updated successfully.');
					
					redirect('admin/faq');
		
				}else{
		
		
		
					$allData = array();
					$allData['steps'] = $this->Common_model->getData('golfersu_steps',array(),'id');
					$allData['mental'] = $this->Common_model->getSingle($this->table_mental_data,array('id'=> $id ));
				//	$result['videoDetails'] = $this->Common_model->getData($this->table_media_data,array(),'id');
		           //print_r($allData['videoDetails']);die();

					$data['content'] = $this->load->view('admin/faq/edit',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}

	public function delete($id)
	{

		if($id){

			$this->Common_model->delete_data($this->table_mental_data,array('id' => $id));
			$this->session->set_flashdata('success', 'Faq Delete successfully.');
			redirect('admin/faq');
		}
		else{

			redirect('admin/faq');
		}
		

	}



	


}
