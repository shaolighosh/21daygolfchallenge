<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_video_share extends CI_Controller {

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

       
      }

	/* admin login */
	public function index()
	{
        $userId = $this->uri->segment(2);
        $videoId  = $this->uri->segment(3);
		//die();
		$allData['userDetails'] = $this->Common_model->getSingle('golfersu_user',array('id' => $userId));
        $allData['userVideos'] = $this->Common_model->getSingle('golfersu_userstep_video',array('id' =>$videoId ));
        if(empty($allData['userVideos'])){
            redirect('/');
        }
        $data['content'] = $this->load->view('site/share/share-video',$allData, true);
        $this->load->view('template/site/front-share-main',$data);
	}
}
