<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Ajax extends CI_Controller {

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
		$this->load->library('user_agent');
		$this->table_content = 'content';

	}

	public function addContentRow()
	{
		if($this->session->userdata('logged_in')){
				$allData []= '';
				echo $this->load->view('admin/ajax/module-content',$allData, true);			
		}
		else
		{
			$this->load->view('admin/login');
		}
		
	}
	public function get_all_content(){
		if($this->session->userdata('logged_in')){ 
			$allData['image'] = $this->Common_model->getData($this->table_content,array('content_type'=>'image','status'=>'Y'),'content_id');
			$allData['video'] = $this->Common_model->getData($this->table_content,array('content_type'=>'video','status'=>'Y'),'content_id');
			$allData['audio'] = $this->Common_model->getData($this->table_content,array('content_type'=>'audio','status'=>'Y'),'content_id');
			echo  $this->load->view('admin/ajax/popup-content',$allData, true);
		}else{
			$this->load->view('admin/login');
		}

	}
	public function select_content(){
		if($this->session->userdata('logged_in')){
			$output ='';
			$content_id = $this->input->post('content_id');
			$order = $this->input->post('order');
			$single = $this->Common_model->getSingle($this->table_content,array('content_id'=> $content_id));
			$output .='<input type="hidden" name="file_'.$order.'" value="'.$content_id.'">';
			$output .='<img src="'.base_url().$single->image_thumbnail.'" alt="" width="60px;">';
			print_r($output);
		}else{
			$this->load->view('admin/login');
		}
	}


}
