<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_management extends CI_Controller {

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
		$this->table_media_data = 'golfersu_userstep_video'; 
		$this->table_user_data = 'golfersu_user';

       
      }

	/* admin login */
	public function index()
	{
		if($this->session->userdata('admin_logged_in')){

			if(isset($_GET['name']) || isset($_GET['email'])){

				$word= $_GET['name'];
				 $where = '( ';
				if (strpos($word, ' ') !== FALSE) {
				    $wordArr = explode(' ', $word);
				   
				    foreach ($wordArr AS $word) {
				        $where .= " first_name LIKE '%{$word}%' OR";
				        $where .= " last_name LIKE '%{$word}%' OR";
				    }
				    $where = trim($where, 'OR');
				} else {
				    $where .= " first_name LIKE '%{$word}%' OR";
				     $where .= " last_name LIKE '%{$word}%'";
				}
				$where .= ' )';

				if($_GET['name'] != '' || $_GET['email'] != ''){

					if($_GET['name'] != '' && $_GET['email'] != ''){
						$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where $where AND user_email = '".$_GET['email']."'   order by id desc");
						
					}
					elseif ($_GET['email'] != '') {
						$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where user_email = '".$_GET['email']."'   order by id desc");
					}
					elseif ($_GET['name'] != '') {
						$result['users'] = $this->Common_model->dbQuery("select * from golfersu_user where $where  order by id desc");
					}
					else{
						$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
					}
					
				}
				else{

					$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');
				}

			}
			else{

				$result['users'] = $this->Common_model->getData($this->table_user_data,array(),'id');

			}
			

			$result['media'] = $this->Common_model->getData($this->table_media_data,array(),'id');
			
			//print_r($result['media']);die();
			$data['content'] = $this->load->view('admin/media/list',$result, true);
			$this->load->view('template/admin/main',$data);
		}
		else
		{
			redirect('admin/login');
		}
	}

	/*public function view()
	
	{
	
	$allData = array();
	$allData['userDetails'] = $this->Common_model->getSingle('golfersu_login',array('id'=> $this->session->userdata('admin_logged_in') ));

	$data['content'] = $this->load->view('admin/settings/edit',$allData, true);
	$this->load->view('template/admin/main',$data);

	}*/
	
	public function view()
	{
		if($this->session->userdata('admin_logged_in')){
			
				$id = $this->uri->segment(4);
				
				
				$result['userDetails'] = $this->Common_model->getAllData($this->table_media_data, array('user_id'=> $id));
				
				
				$data['content'] = $this->load->view('admin/media/media-management',$result, true);
				$this->load->view('template/admin/main',$data);
			
		} else {
			$this->load->view('admin/login');
		}
	}

}
