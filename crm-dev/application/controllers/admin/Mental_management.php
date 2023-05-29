<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mental_management extends CI_Controller {

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
		$this->table_mental_data = 'golfersu_mental_imagery '; 
		//$this->table_user_data = 'golfersu_user';

       
      }

	/* admin login */
	public function index()
	{
		if($this->session->userdata('admin_logged_in')){
			$result['mental'] = $this->Common_model->getData($this->table_mental_data,array(),'id');
			//print_r($result['media']);die();
			$data['content'] = $this->load->view('admin/mental/list',$result, true);
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


				if($this->input->post('step_id')){
					
				//	$userId = $this->session->userdata('admin_logged_in');
              
       	
		     if(!empty($_FILES['golfers_image'])){ 
            
            // File upload configuration 
            $targetDir = FCPATH."/public/upload/"; 
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
            
            $fileName = time().rand(000,999).basename($_FILES['golfers_image']['name']); 
            $targetFilePath = $targetDir.$fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
           // if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES['golfers_image']['tmp_name'], $targetFilePath)){ 
                    $upload = base_url().'public/upload/'.$fileName; 
                   
                } 
           // } 
		
		   $golfers_image = "public/upload/".$fileName;

			 }
       
	

	
		if(!empty($_FILES['imagery_video'])){ 
            
            // File upload configuration 
            $targetDir2 = FCPATH."/public/upload/"; 
            $allowTypes2 = array('mov', 'avi', 'flv', 'wmv', 'mp3', 'mp4'); 
            
            $fileName2 = time().rand(000,999).basename($_FILES['imagery_video']['name']); 
            $targetFilePath2 = $targetDir2.$fileName2; 
            
            // Check whether file type is valid 
            $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION); 
           // if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES['imagery_video']['tmp_name'], $targetFilePath2)){ 
                    $upload2 = base_url().'public/upload/'.$fileName2; 
                   
                } 
           // } 
		   $imagery_video = "public/upload/".$fileName2;

		}
        
		
		
		$insertData = array(
								'step_id' =>$this->input->post('step_id'),
								'lesson_name' =>$this->input->post('lesson_name'),
								'golfers_name' =>$this->input->post('golfers_name'),
								'golfers_image' =>$golfers_image,
								'imagery_video' =>$this->input->post('imagery_video'),
								 );
	

		
		$this->Common_model->insertData($this->table_mental_data,$insertData);
			$this->session->set_flashdata('success', 'Data Added Successfully.');
	
					
					redirect('admin/mental-management');
		
				}else{
		
		
		
					$allData = array();
					$allData['steps'] = $this->Common_model->getData('golfersu_steps',array(),'id');
				//	$result['videoDetails'] = $this->Common_model->getData($this->table_media_data,array(),'id');
		           //print_r($allData['videoDetails']);die();

					$data['content'] = $this->load->view('admin/mental/add',$allData, true);
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


				if($this->input->post('step_id')){
					$user_id = $this->input->post('id');
				//	$userId = $this->session->userdata('admin_logged_in');
              
			  if($_FILES['golfers_image']['name'] !=""){          	
		     if(!empty($_FILES['golfers_image'])){ 
            
            // File upload configuration 
            $targetDir = FCPATH."/public/upload/"; 
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
            
            $fileName = time().rand(000,999).basename($_FILES['golfers_image']['name']); 
            $targetFilePath = $targetDir.$fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
           // if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES['golfers_image']['tmp_name'], $targetFilePath)){ 
                    $upload = base_url().'public/upload/'.$fileName; 
                   
                } 
           // } 
		
		   $golfers_image = "public/upload/".$fileName;
			if($this->input->post('golfers_image_hidden')){
				$oldfilename =$this->input->post('golfers_image_hidden');
				unlink($oldfilename);
				
			}
			 }
        } else {
			
			$golfers_image = $this->input->post('golfers_image_hidden');
		}
	
		if($_FILES['imagery_video']['name'] !=""){ 
	
		if(!empty($_FILES['imagery_video'])){ 
            
            // File upload configuration 
            $targetDir2 = FCPATH."/public/upload/"; 
            $allowTypes2 = array('mov', 'avi', 'flv', 'wmv', 'mp3', 'mp4'); 
            
            $fileName2 = time().rand(000,999).basename($_FILES['imagery_video']['name']); 
            $targetFilePath2 = $targetDir2.$fileName2; 
            
            // Check whether file type is valid 
            $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION); 
           // if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES['imagery_video']['tmp_name'], $targetFilePath2)){ 
                    $upload2 = base_url().'public/upload/'.$fileName2; 
                   
                } 
           // } 
		   $imagery_video = "public/upload/".$fileName2;
			if($this->input->post('imagery_video_hidden')){
				$oldfilename2 =$this->input->post('imagery_video_hidden');
				unlink($oldfilename2);
				
			}
		}
		//echo "1111";
		//exit;
        } else {
		
			//echo "2222";
		//exit;
			$imagery_video = $this->input->post('imagery_video_hidden');
		}
		
		
		$updateData = array(
								'step_id' =>$this->input->post('step_id'),
								'lesson_name' =>$this->input->post('lesson_name'),
								'golfers_name' =>$this->input->post('golfers_name'),
								'golfers_image' =>$golfers_image,
								'imagery_video' =>$imagery_video,
								 );
	
							$this->Common_model->update_data($this->table_mental_data,array('id' => $this->input->post('id')),$updateData);
		
		
					$this->session->set_flashdata('success', 'Data updated successfully.');
					
					redirect('admin/mental-management');
		
				}else{
		
		
		
					$allData = array();
					$allData['steps'] = $this->Common_model->getData('golfersu_steps',array(),'id');
					$allData['mental'] = $this->Common_model->getSingle($this->table_mental_data,array('id'=> $id ));
				//	$result['videoDetails'] = $this->Common_model->getData($this->table_media_data,array(),'id');
		           //print_r($allData['videoDetails']);die();

					$data['content'] = $this->load->view('admin/mental/edit',$allData, true);
					$this->load->view('template/admin/main',$data);
				}
			}
			else{
				redirect("admin/login");
			}
			
				
		
	}

}
