<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_management extends CI_Controller {

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
		$this->table_login_data = 'login';
		$this->table_course_data = 'golfersu_courses';

	}

	public function index()
	{
		if($this->session->userdata('admin_logged_in')){
			if(isset($_GET['id'])){
				$resultCount = $this->Common_model->numrowsDbQuery("Select id from $this->table_course_data WHERE id='".$_GET['id']."' ");
				}elseif (isset($_GET['date'])) {
					$resultCount = $this->Common_model->numrowsDbQuery("Select id from $this->table_course_data WHERE create_date='".$_GET['date']."' ");
				
			}else{
				$resultCount = $this->Common_model->numrows($this->table_course_data,array('status'=>'Y'));
			}
			$config = array();
	        $config["base_url"] = base_url() . "admin/course-management";
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
	        $result['Allcourse'] = $this->Common_model->getData($this->table_course_data,array('status'=>'Y'),'id');  
	        $result["links"] = $this->pagination->create_links();
	        if(isset($_GET['id'])){
	        	$result['course'] = $this->Common_model->dbQuery("Select * from $this->table_course_data WHERE id='".$_GET['id']."'");
	        }elseif (isset($_GET['date'])) {
	        	$result['course'] = $this->Common_model->dbQuery("Select * from $this->table_course_data WHERE create_date='".$_GET['date']."'");
	        }else{
	        	$result['course'] =$this->Common_model->getDatawithlimit($this->table_course_data,array('status'=>'Y'),'id',$page,10);
	        }
	        
		     
		        
		    

			
			$data['content'] = $this->load->view('admin/course-management/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			$this->load->view('admin/login');
		}
		
	}

	public function add()
	{
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('name')){
				$courseData = array('course_name'=>$this->input->post('name'),'create_date'=>$this->input->post('date'));
				 $this->Common_model->insertData($this->table_course_data,$courseData);
				 $this->session->set_flashdata('success', 'Course Added Successfully.');
				redirect('admin/course-management/');
			}else{
				$allData = '';
				$data['content'] = $this->load->view('admin/course-management/add',$allData, true);
				$this->load->view('template/admin/main',$data);

			}
			
		}else{
			$this->load->view('admin/login');
		}

	}
	public function edit()
	{
		if($this->session->userdata('admin_logged_in')){
			if($this->input->post('course_name')){
				$courseData = array('course_name'=>$this->input->post('course_name'));
				$update = $this->Common_model->dataUpdate($this->table_course_data,array('id'=> $this->input->post('resourceId') ),$courseData);
				 $this->session->set_flashdata('success', 'Course Updated Successfully.');
				 redirect('admin/course-management/');
			     
			}else{
				$id = $this->uri->segment(4);
				$result['course'] = $this->Common_model->getSingle($this->table_course_data, array('id'=> $id));
				$data['content'] = $this->load->view('admin/course-management/edit',$result, true);
				$this->load->view('template/admin/main',$data);

			}
			
		}else{
			$this->load->view('admin/login');
		}

	}
	public function delete($id)
	{
		if($this->session->userdata('logged_in')){
			$update = $this->Common_model->update_data($this->table_course_data,array('id'=> $id ),array('status' => 'N'));
			$this->session->set_flashdata('success', 'Course Delete Successfully.');
			redirect('admin/course-management/');
		}else{
			$this->load->view('admin/login');
		}

	}
}
