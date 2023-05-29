<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting_management extends CI_Controller {

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
		
		if($this->session->userdata('user_id')){

            $allData['userVideos'] = $this->Common_model->getAllData('golfersu_progress',array('user_id' =>$this->session->userdata('user_id') ));
			$data['content'] = $this->load->view('site/vote/voting-management',$allData, true);
			$this->load->view('template/site/main',$data);

		}	
		else{

			redirect("login");
		}
		
	}

	public function show($userId,$stepId)
	{
		//die();
		if($this->session->userdata('user_id')){
			$allData['stepId'] = $stepId;
            $allData['progress'] = $this->Common_model->getAllData('golfersu_userstep_video',array('user_id' => $userId,'step' => $stepId));
			//$allVideos =  $this->Common_model->getAllData('golfersu_userstep_video',array('user_id' =>  $userId,'step' => $stepId));
			$allVideoId = [];
			if(!empty($allData['progress'])){
				$i = 0;
				foreach($allData['progress'] as $allVideo){
					$allVideoId[$i] = $allVideo->id;
					$i++;
				}

				$allData['voteCount'] =  $this->Common_model->dbQuerynumrows("select * from golfersu_user_video_votes where user_step_video_id in (".implode(',',$allVideoId).")");

				//echo "select * from golfersu_user_video_votes where user_step_video_id in (".implode(',',$allVideoId).")";

			}
			else{
				$allData['voteCount'] = 0;
			}
			//echo $allData['voteCount'];die();
			$data['content'] = $this->load->view('site/vote/voting-management-details',$allData, true);
			$this->load->view('template/site/main',$data);

		}	
		else{

			redirect("login");
		}
		
	}


	


}
