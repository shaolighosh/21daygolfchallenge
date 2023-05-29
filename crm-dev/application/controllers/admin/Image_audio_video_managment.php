<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_audio_video_managment extends CI_Controller {

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
		$this->table_question_data = 'question_data';
		$this->table_question_choice = 'question_choice';
		$this->table_content = 'content';

	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$allData['image'] = $this->Common_model->getData($this->table_content,array('status'=>'Y'),'content_id');
			$data['content'] = $this->load->view('admin/image-video/list',$allData, true);
			$this->load->view('template/admin/main',$data);
		}else{
			redirect('admin/login');
		}
		
	}

	public function edit()
	{

		if($this->session->userdata('logged_in')){



			if($this->input->post('question_id')){

				echo "<pre>";
					print_r($_FILES);

					$choiceId = $this->input->post('choiceid');
					$choice = $this->input->post('choice');
					$choiceCheck = $this->input->post('choice_check');
					


					$config['upload_path']          = './public/uploads/module/';
	                $config['allowed_types']        = 'gif|jpg|png|jpeg|mov|avi|flv|wmv|mp3|mp4';
	               /* $config['max_size']             = 100;
	                $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('userfile'))
	                {
	                        
	                        $this->Common_model->dataUpdate($this->table_question_data,array('question_id' => $this->input->post('question_id') ),array('question' => $this->input->post('question_text') ));

	                }
	                else
	                {
	                        $imageData  = $this->upload->data();


	                         $this->Common_model->dataUpdate($this->table_question_data,array('question_id' => $this->input->post('question_id') ),array('question' => $this->input->post('question_text'), 'question_image' => '/public/uploads/module/'.$imageData['file_name'] ));




	                        //print_r($imageData);
	                        //$this->load->view('upload_success', $data);


	                }





					


					if(!empty($choiceId)){

						$i = 0;
						foreach ($choiceId as $choiceIdVal) {

							echo $choice[$i];
							if( $this->input->post('choice_check'.$i)){

								$check = "Y";
							}
							else
							{
								$check =  "N";
							}

							$this->Common_model->dataUpdate($this->table_question_choice,array('question_id' => $this->input->post('question_id'), 'choice_id' =>  $choiceIdVal ),array('choice' => $choice[$i],'correct' => $check ));




							$i++;
						}

						
					}


				 $this->session->set_flashdata('success', 'Data updated Successfully.');
				 redirect('admin/image-audio-video-managment/');



			}
			else{

				$questionId = $this->uri->segment(4);
				$allData['question'] = $this->Common_model->getSingle($this->table_question_data,array('question_id' => $questionId));
				$allData['question_choice'] = $this->Common_model->getAllData($this->table_question_choice, array('question_id' => $questionId)); 
				$data['content'] = $this->load->view('admin/image-video/edit',$allData, true);
				$this->load->view('template/admin/main',$data);
			}
			
		}
		else
		{


			redirect('admin/login');
		}
		
	}


	public function delete($id=NULL)
	{

		if($this->session->userdata('logged_in')){
			$this->Common_model->delete_data($this->table_content,array('content_id' => $id));
			$this->session->set_flashdata('success', 'Data Deleted Successfully.');
			redirect('admin/image-audio-video-managment/');
		}
		else
		{


			redirect('admin/login');
		}
		
	}
	public function add(){
		if($this->session->userdata('logged_in')){
			if (isset($_FILES['images']['name']) && $_FILES['images']['name'] != '') {
					$date = time();
					$configVideo['upload_path']          = './public/uploads/images/';
	                $configVideo['allowed_types']        = 'gif|jpg|png|jpeg|mov|avi|flv|wmv|mp3|mp4';
		            $configVideo['max_size'] = '10240';
		            $configVideo['overwrite'] = FALSE;
		            $configVideo['remove_spaces'] = TRUE;
		            $video_name = $date.rand(000,99999);
		            $configVideo['file_name'] = $video_name;

		            $this->load->library('upload', $configVideo);
		            $this->upload->initialize($configVideo);
		            if (!$this->upload->do_upload('images')) {
		            	$this->session->set_flashdata('error', $this->upload->display_errors());
		            }else{
		            	$imageData = $this->upload->data();
		            	if($imageData['is_image']){
		            		$image = 'public/uploads/images/'.$imageData['file_name'];
		            		$thumbFile = $this->resizeImage($imageData['file_path'],$imageData['file_name'],$imageData['raw_name'],$imageData['file_ext']);
		            		$imageThumbnail = 'public/uploads/images/thumbnail/'. $thumbFile;
		         		}else{
		         			$image = 'public/uploads/images/'.$imageData['file_name'];
			         		$thumbFile = time().rand(0000,9999).'.jpg';
			               	$imageThumbnail = 'public/uploads/images/'.$thumbFile;
		         			// shell command [highly simplified, please don't run it plain on your script!]
		         			shell_exec("ffmpeg -i $image -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $imageThumbnail 2>&1");

		         		}
		         			$fileType = current(explode("/",$imageData['file_type']));	
		         			$insertData = array('content_name'=> $this->input->post('imageName') ,'content_type' =>$fileType,'image' =>$image,'image_thumbnail' =>$imageThumbnail, 'status' =>'Y','created' => date('Y-m-d H:i:s'));
		         			$this->Common_model->insertData($this->table_content,$insertData);
		         			$message = ucfirst($fileType).' Added successfully';
		         			$this->session->set_flashdata('success', $message);

		            }
		            redirect('admin/image-audio-video-managment');
			}else{
				$allData ='';
				$data['content'] = $this->load->view('admin/image-video/add',$allData, true);
				$this->load->view('template/admin/main',$data);
			}
			
		}else{
			redirect('admin/login');
		}
	}
	public function resizeImage($file_path,$filename,$raw,$file_ext){
      $source_path = $file_path . $filename;
      $target_path = $file_path . 'thumbnail/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );
      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          //echo $this->image_lib->display_errors();
      }else{
      	return  $raw.'_thumb'.$file_ext;
      }
      $this->image_lib->clear();
   	}


}
