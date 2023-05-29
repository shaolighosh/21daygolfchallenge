<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro_content extends CI_Controller {

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
		$this->table_media_data = 'golfersu_21_challenge_content'; 
		$this->table_golfersu_steps = 'golfersu_steps'; 
		//$this->table_golfersu_video_resource = 'golfersu_video_resource';
		

       
      }

	/* admin login */
	public function index()
	{
		if($this->session->userdata('admin_logged_in')){

			if(isset($_GET['step'])){

				$result['media'] = $this->Common_model->getData($this->table_media_data,array('step_id' =>$_GET['step']),'id');
			
			}
			else{
				$result['media'] = $this->Common_model->getData($this->table_media_data,array(),'id');
			}
			
	
			
			$data['content'] = $this->load->view('admin/intro/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function add(){

	
	
/* 
			if(isset($_FILES['banner_image']) && !empty($_FILES['banner_image']['name'])){
				$config['upload_path'] = $target_dir;
				$config['file_name'] = time();
                $config['allowed_types'] = 'png|jpg|jpeg';
                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('image')){
                	$error = $this->upload->display_errors();
                	$this->session->set_flashdata('error', $error);
                	$this->render_template(admin.'clinic_news/add', $this->data);
                }else{
                	$data = $this->upload->data();
                	$insertData['banner_image'] = 'public/uploads/news/'.$data['file_name'];
                }
			} */
			if($this->session->userdata('admin_logged_in')){
             if($this->input->post('video_file')){
		
			 $insertData= [

				'step_id' =>$this->input->post('step_id'),
				'video_file' =>$this->input->post('video_file'),
			 ]; 
	
			$this->Common_model->insertData($this->table_media_data,$insertData);
			$this->session->set_flashdata('success', 'Video Added Successfully.');
			redirect('admin/video-management');
		}else{
			$result['steps'] = $this->Common_model->getDataASC($this->table_golfersu_steps,array(),'id');
			$data['content'] = $this->load->view('admin/video_resource/add',$result,true);
			 
			$this->load->view('template/admin/main',$data);
		
		}
	}

	else
		{
			redirect('admin/login');
		}
		
	}

	public function edit()
	{
             
		 $video_id = ($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id');
			if($this->session->userdata('admin_logged_in')){


				if($this->input->post('content')){
					$user_id = $this->input->post('id');
				
	            	$updateData = array(
						'content' =>$this->input->post('content'),
					);

					$this->Common_model->update_data($this->table_media_data,array('id' => $this->input->post('resourceId')),$updateData);
					$this->session->set_flashdata('success', 'Content updated successfully.');
					
					redirect('admin/intro-content');
		
				}else{
		
		
		
					$allData = array();
					
					$allData['introData'] = $this->Common_model->getSingle($this->table_media_data,array('id'=> $video_id ));
				

					$data['content'] = $this->load->view('admin/intro/edit',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}
	public function delete()
	{

		if($this->session->userdata('admin_logged_in')){

			$videoId = $this->uri->segment(4);
		
			$this->Common_model->delete_data($this->table_media_data,array('id' => $videoId));

			$this->session->set_flashdata('success', 'Video Resource Deleted Successfully.');
			redirect('admin/video-management/');
		}
		else
		{


			redirect('admin/login');
		}
		
	}


	


}
