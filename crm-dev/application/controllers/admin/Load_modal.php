<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_modal extends CI_Controller {

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
		$this->table_course_data = 'course_management';
		$this->table_question_data = 'question_data';
		$this->table_question_choice = 'question_choice';
		$this->table_module = 'module';
		$this->table_content = 'content';
	}
	public function image_content($content_id){
		if($this->session->userdata('logged_in')){
			$single = $this->Common_model->getSingle($this->table_content,array('content_id' => $content_id ));
			if(!empty($single)){
				?>
				<img src="<?php echo base_url();?><?php echo $single->image;?>">
				<?php
			}else{
				echo "NO data found";
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function video_modal($content_id){
		if($this->session->userdata('logged_in')){
			$single = $this->Common_model->getSingle($this->table_content,array('content_id' => $content_id ));
			if(!empty($single)){
				?>
				<video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;">
		          <source src="<?php echo base_url();?><?php echo $single->image;?>" type="video/mp4">
		          Your browser doesn't support HTML5 video tag.
		        </video>
				<?php
			}else{
				echo "NO data found";
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function audio_modal($content_id){
		if($this->session->userdata('logged_in')){
			$single = $this->Common_model->getSingle($this->table_content,array('content_id' => $content_id ));
			if(!empty($single)){
				?>
				<audio controls style="width: 100%;">
				  <source src="<?php echo base_url();?><?php echo $single->image;?>" type="audio/ogg">
				  Your browser does not support the audio element.
				</audio>
				<?php
			}else{
				echo "NO data found";
			}
		}else{
			$this->load->view('admin/login');
		}
	}

	
}
