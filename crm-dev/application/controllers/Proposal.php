<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

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
		$this->load->helper("url");
       	$this->load->library("pagination");

       
      }

	/* admin login */
	public function index()
	{
		// echo $this->session->userdata('user_id');
		// die();
	
		if($this->session->userdata('user_id')){


		if($this->input->post('email')){

			 //echo "<pre>";
				//print_r($_POST);die();
			 	if($this->input->post('preview_id') != ''){
					$this->Common_model->update_data('proposals',array('id' =>$this->input->post('preview_id') ),array('status' => 'reviewed'));

					$emailData = array(
				        'user_id'  => $this->session->userdata('user_id'),
				        'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				        'address'  => $this->input->post('address'),
						'lastId'  => $lastId,
						
				);

				$config = array(
					'protocol' =>  'smtp',//'smtp',  'mail', 'sendmail', or 'smtp'
					'smtp_host' => 'smtp.gmail.com', 
					'smtp_port' => 465,
					'smtp_user' => 'lawndoctor12345@gmail.com',
					//'smtp_pass' => 'Option1234@',
					'smtp_pass' => 'ixzeuwxopldwmpga',
					'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
					'mailtype' => 'HTML', //plaintext 'text' mails or 'html'
					'smtp_timeout' => '4', //in seconds
					'charset' => 'UTF-8',
					'wordwrap' => TRUE
				);
			
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");  

				$from_email = "lawndoctor12345@gmail.com";
				$to_email_client = $this->input->post('email'); //$account_detailsForm['email'];
				$message_client = $this->load->view('email/registration-email.php',$emailData,TRUE);
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				$this->email->from($from_email,'Lawn Doctor');
				$this->email->to($to_email_client);
				$this->email->subject('Proposal');
				$this->email->message($message_client);
				$this->email->set_mailtype("html");
				$this->email->send();
				redirect('proposal');

				
			 	}
				else{
					$newdata = array(
				        'user_id'  => $this->session->userdata('user_id'),
				        'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_first_name').' '.$this->input->post('customer_last_name'),
						'first_name'  => $this->input->post('customer_first_name'),
						'last_name'  => $this->input->post('customer_last_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				       // 'address'  => $this->input->post('address'),					
						'street_address'  => $this->input->post('street_address2'),
						//'street_address2'  => $this->input->post('street_address2'),
						'city'  => $this->input->post('city'),
						'state'  => $this->input->post('state'),
						'zip_code'  => $this->input->post('postal'),
						'individual_discount_id'  => $this->input->post('individual_discount'),
						'discount_id'  => $this->input->post('discount'),
						'total_before_discount' => $this->input->post('total_before_discount'),

						'total_after_all_discount' => $this->input->post('total_after_all_discount'),
						'sales_tax' => $this->input->post('sales_tax'),
						'all_total' => $this->input->post('all_total'),
						'prepayment_discount' => $this->input->post('prepayment_discount'),
						'sales_tax1' => $this->input->post('sales_tax1'),
						'total_prepaid' => $this->input->post('total_prepaid'),
						'lawn_size'  => $this->input->post('lawn_size'),

						'internal_comment'  => $this->input->post('internal_comments'),
						'external_comment'  => $this->input->post('external_comments'),
						'status' => 'reviewed'
				);
				$this->Common_model->insertData('proposals',$newdata);
				 $lastId = $this->db->insert_id();
				$this->session->set_flashdata('success', 'Form submitted successful');


				$service_id = $this->input->post('service_id');
				$all_service_ids = $this->input->post('all_service_id');
				$size = $this->input->post('size');
				
				if($this->input->post('recommended')){
					$recommended = $this->input->post('recommended');
				}
				else{
					$recommended = [];
				}

				if($this->input->post('optional')){
					$optional = $this->input->post('optional');
				}
				else{
					$optional = [];
				}

				$number_of_services = $this->input->post('number_of_services');
				$number_of_services_fy = $this->input->post('number_of_services_fy');
				$system_unit_price = $this->input->post('system_unit_price');
				$unit_price = $this->input->post('unit_price');
				$total_this_year = $this->input->post('total_this_year');
				$total_full_year = $this->input->post('total_full_year');
				$total_before_discount = $this->input->post('total_before_discount');
				$total_after_all_discount = $this->input->post('total_after_all_discount');
				$sales_tax = $this->input->post('sales_tax');
				$all_total = $this->input->post('all_total');
				$prepayment_discount = $this->input->post('prepayment_discount');
				$sales_tax1 = $this->input->post('sales_tax1');
				$total_prepaid = $this->input->post('total_prepaid');
				
				if(!empty($service_id)){

					foreach($service_id as $serviceId){
						$i = 0;
						foreach($all_service_ids as $all_service_id){

							if($all_service_id == $serviceId){
								//echo " serviceId ".$serviceId;
								//echo "<br>";
								
								if(in_array($serviceId,$recommended)){
									$recommendedData = 'yes';
								}
								else{
									$recommendedData = '';
								}

								if(in_array($serviceId,$optional)){
									$optionalData = 'yes';
								}
								else{
									$optionalData = '';
								}


								$addData = array(
										'proposal_id'  => $lastId,
										'service_id'  => $serviceId,
										
										'size_time'  => $size[$i],

										'system_price_unit'  => $system_unit_price[$i],

										'service_number_service'  => $number_of_services[$i],
										
										'unit_price'  => $unit_price[$i],
										'total_this_year'  => $total_this_year[$i],
										'total_full_year'  => $total_full_year[$i],
										'recommended' => $recommendedData,
										'optional' => $optionalData
										
										
								);
								$this->Common_model->insertData('proposal_additional',$addData);

							}
							$i++;
						}
					}

				}
				
				$emailData = array(
				        'user_id'  => $this->session->userdata('user_id'),
				        'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				        'address'  => $this->input->post('address'),
						'lastId'  => $lastId,
						
				);

				$config = array(
					'protocol' =>  'smtp',//'smtp',  'mail', 'sendmail', or 'smtp'
					'smtp_host' => 'smtp.gmail.com', 
					'smtp_port' => 465,
					'smtp_user' => 'lawndoctor12345@gmail.com',
					//'smtp_pass' => 'Option1234@',
					'smtp_pass' => 'ixzeuwxopldwmpga',
					'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
					'mailtype' => 'HTML', //plaintext 'text' mails or 'html'
					'smtp_timeout' => '4', //in seconds
					'charset' => 'UTF-8',
					'wordwrap' => TRUE
				);
			
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");  

				$from_email = "lawndoctor12345@gmail.com";
				$to_email_client = $this->input->post('email'); //$account_detailsForm['email'];
				$message_client = $this->load->view('email/registration-email.php',$emailData,TRUE);
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				$this->email->from($from_email,'Lawn Doctor');
				$this->email->to($to_email_client);
				$this->email->subject('Proposal');
				$this->email->message($message_client);
				$this->email->set_mailtype("html");
				$this->email->send();
				redirect('proposal');
			


				}
			
				


		}else{

			//print_r($_SESSION);
			$fname = '';
			if(isset($_GET['customer_name'])){
				$fname = $_GET['customer_name'];
			}
			
			$config = array();
			$config["base_url"] = base_url() . "proposal";
			$config["total_rows"] = $this->Common_model->numrowsProposal('proposals',array('user_id' => $this->session->userdata('user_id'),'status !=' => 'Draft'),$fname);
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			// $config['use_page_numbers'] = TRUE;
			// $config['reuse_query_string'] = TRUE;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$allData["results"] = $this->Common_model->fetch_paginationDataSearch('proposals',array('user_id' => $this->session->userdata('user_id'),'status !=' => 'Draft'),$config["per_page"], $page,$fname);
			$allData["links"] = $this->pagination->create_links();


			$data['content'] = $this->load->view('site/proposal/proposal',$allData, true);
			$this->load->view('template/site/main',$data);
		}

		}	
		else{

			redirect("login");
		}
		
	}


	public function order()
	{
			
		if($this->session->userdata('user_id')){

			$fname = '';
			if(isset($_GET['customer_name'])){
				$fname = $_GET['customer_name'];
			}
			$config = array();
			$config["base_url"] = base_url() . "proposal/order";
			$config["total_rows"] = $this->Common_model->numrowsProposal('proposals',array('user_id' => $this->session->userdata('user_id'),'status !=' => 'Draft','status' => 'closed' ),$fname);
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			// $config['use_page_numbers'] = TRUE;
			// $config['reuse_query_string'] = TRUE;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$allData["results"] = $this->Common_model->fetch_paginationDataSearch('proposals',array('user_id' => $this->session->userdata('user_id'),'status !=' => 'Draft','status' => 'closed'),$config["per_page"], $page,$fname);
			$allData["links"] = $this->pagination->create_links();


			$data['content'] = $this->load->view('site/proposal/proposal',$allData, true);
			$this->load->view('template/site/main',$data);

		}	
		else{

			redirect("login");
		}
		
	}



	public function save_preview(){

		//print_r();

		if($this->input->post('email')){

			 
			 
				
			
				$newdata = array(
				        'user_id'  => $this->session->userdata('user_id'),
				       // 'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_first_name').' '.$this->input->post('customer_last_name'),
						'first_name'  => $this->input->post('customer_first_name'),
						'last_name'  => $this->input->post('customer_last_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				       // 'address'  => $this->input->post('address'),					
						'street_address'  => $this->input->post('street_address2'),
						//'street_address2'  => $this->input->post('street_address2'),
						'city'  => $this->input->post('city'),
						'state'  => $this->input->post('state'),
						'zip_code'  => $this->input->post('postal'),
						//'individual_discount_id'  => $this->input->post('individual_discount'),
						//'discount_id'  => $this->input->post('discount'),
						'total_before_discount' => $this->input->post('total_before_discount'),

						'total_after_all_discount' => $this->input->post('total_after_all_discount'),
						'sales_tax' => $this->input->post('sales_tax'),
						'all_total' => $this->input->post('all_total'),
						'prepayment_discount' => $this->input->post('prepayment_discount'),
						'sales_tax1' => $this->input->post('sales_tax1'),
						'total_prepaid' => $this->input->post('total_prepaid'),
						'lawn_size'  => $this->input->post('lawn_size'),

						'internal_comment'  => $this->input->post('internal_comments'),
						'external_comment'  => $this->input->post('external_comments'),
						'status' => 'Draft'
				);

				//print_r($newdata);
				//die();
				$this->Common_model->insertData('proposals',$newdata);
				 $lastId = $this->db->insert_id();
				$this->session->set_flashdata('success', 'Form submitted successful');


				$service_id = $this->input->post('service_id');
				$all_service_ids = $this->input->post('all_service_id');
				$size = $this->input->post('size');
				
				if($this->input->post('recommended')){
					$recommended = $this->input->post('recommended');
				}
				else{
					$recommended = [];
				}

				if($this->input->post('optional')){
					$optional = $this->input->post('optional');
				}
				else{
					$optional = [];
				}

				$number_of_services = $this->input->post('number_of_services');
				$number_of_services_fy = $this->input->post('number_of_services_fy');
				$system_unit_price = $this->input->post('system_unit_price');
				$unit_price = $this->input->post('unit_price');
				$total_this_year = $this->input->post('total_this_year');
				$total_full_year = $this->input->post('total_full_year');
				$total_before_discount = $this->input->post('total_before_discount');
				$total_after_all_discount = $this->input->post('total_after_all_discount');
				$sales_tax = $this->input->post('sales_tax');
				$all_total = $this->input->post('all_total');
				$prepayment_discount = $this->input->post('prepayment_discount');
				$sales_tax1 = $this->input->post('sales_tax1');
				$total_prepaid = $this->input->post('total_prepaid');
				
				if(!empty($service_id)){

					foreach($service_id as $serviceId){
						$i = 0;
						foreach($all_service_ids as $all_service_id){

							if($all_service_id == $serviceId){
								//echo " serviceId ".$serviceId;
								//echo "<br>";
								
								if(in_array($serviceId,$recommended)){
									$recommendedData = 'yes';
								}
								else{
									$recommendedData = '';
								}

								if(in_array($serviceId,$optional)){
									$optionalData = 'yes';
								}
								else{
									$optionalData = '';
								}


								$addData = array(
										'proposal_id'  => $lastId,
										'service_id'  => $serviceId,
										
										'size_time'  => $size[$i],

										'system_price_unit'  => $system_unit_price[$i],

										'service_number_service'  => $number_of_services[$i],
										
										'unit_price'  => $unit_price[$i],
										'total_this_year'  => $total_this_year[$i],
										'total_full_year'  => $total_full_year[$i],
										'recommended' => $recommendedData,
										'optional' => $optionalData
										
										
								);
								$this->Common_model->insertData('proposal_additional',$addData);

							}
							$i++;
						}
					}

				}
				
				
			echo $lastId;
				
				

			


		}

	}
	

    public function addProposal(){
		// $allData = '';
		// 	$data['content'] = $this->load->view('site/proposal/addProposal',$allData, true);
		// 	$this->load->view('template/site/main',$data);
		if($this->session->userdata('user_id')){
			// $allData = '';
			// $data['content'] = $this->load->view('site/proposal/addProposal',$allData, true);
			// $this->load->view('template/site/main',$data);
				
				$allData["discount"] = $this->Common_model->getValueall('discount');
				$allData["individual_discount"] = $this->Common_model->getValueall('individual_discount');
				$allData["individual_services"] = $this->Common_model->getValueall('individual_services');
				$allData["services"] = $this->Common_model->dbQuery("Select * from core_services where id not IN (18,19)"); //$this->Common_model->getValueall('core_services');
				// $allData["service_optionals"] = $this->Common_model->getValueall('core_optional_services');
				// $allData["outdoor_pest_controls"] = $this->Common_model->getValueall('outdoor_pest_controls');
				// $allData["outdoor_pest_optional_controls"] = $this->Common_model->getValueall('outdoor_pest_optional_controls');
				$data['content'] = $this->load->view('site/proposal/addProposalNew',$allData, true);
				$this->load->view('template/site/main',$data);
			
		}else{

			redirect("login");
		}
	}

	public function show($id){
		// $allData = '';
		// 	$data['content'] = $this->load->view('site/proposal/addProposal',$allData, true);
		// 	$this->load->view('template/site/main',$data);
		if($this->session->userdata('user_id')){

			$allData["proposal"] = $this->Common_model->getSingle('proposals',array('id' => $id));
            $allData["proposalAdditional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id));
            $allData["proposalCore_services"] = $this->Common_model->getSingle('core_services',array('id' => $id));
            $allData["termsdata"] = $this->Common_model->dbQuery('SELECT * FROM `terms_condition`');
         // echo "<pre>";print_r($allData["proposalAdditional"]);die();
            $coreService = [];
            $outdoorPetService = [];
            $individualService = [];

            if(!empty($allData["proposalAdditional"])){
                foreach($allData["proposalAdditional"] as $proposalAdditional){
                    if($proposalAdditional->service_type == 'core_services'){
                        array_push($coreService,$proposalAdditional->service_id);
                    }

                    if($proposalAdditional->service_type == 'outdoor_pest_controls'){
                        array_push($outdoorPetService,$proposalAdditional->service_id);
                    }

                    if($proposalAdditional->service_type == 'individual_services'){
                        array_push($individualService,$proposalAdditional->service_id);
                    }
                    
                }
            }
            
            $allData["coreService"] = $coreService;
            $allData["outdoorPetService"] = $outdoorPetService;
            $allData["individualService"] = $individualService;
            
            $allData["discount"] = $this->Common_model->getValueall('discount');
            $allData["individual_discount"] = $this->Common_model->getValueall('individual_discount');
            $allData["individual_services"] = $this->Common_model->getValueall('individual_services');
            $allData["services"] = $this->Common_model->getValueall('core_services');
            $allData["service_optionals"] = $this->Common_model->getValueall('core_optional_services');
            $allData["outdoor_pest_controls"] = $this->Common_model->getValueall('outdoor_pest_controls');
            $allData["outdoor_pest_optional_controls"] = $this->Common_model->getValueall('outdoor_pest_optional_controls');
           $this->load->view('site/proposal/user-proposal',$allData);

				// $allData["proposal"] = $this->Common_model->getSingle('proposals',array('id' => $id));
				// $allData["proposalAdditional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id));
				// $allData["discount"] = $this->Common_model->getValueall('discount');
				// $allData["individual_discount"] = $this->Common_model->getValueall('individual_discount');
				// $allData["individual_services"] = $this->Common_model->getValueall('individual_services');
				// $allData["services"] = $this->Common_model->dbQuery("Select * from core_services where id not IN (18,19)"); //$this->Common_model->getValueall('core_services');
				// $data['content'] = $this->load->view('site/proposal/addProposalShow',$allData, true);
				// $this->load->view('template/site/main',$data);
			
		    }
			else{

			redirect("login");
		}
	}

	public function edit($id){
		
		if($this->session->userdata('user_id')){
			
			if($this->input->post('proposal_id')){

				$newdata = array(
				        'user_id'  => $this->session->userdata('user_id'),
				        'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_first_name').' '.$this->input->post('customer_last_name'),
						'first_name'  => $this->input->post('customer_first_name'),
						'last_name'  => $this->input->post('customer_last_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				        'address'  => $this->input->post('address'),					
						'street_address'  => $this->input->post('street_address2'),
						//'street_address2'  => $this->input->post('street_address2'),
						'city'  => $this->input->post('city'),
						'state'  => $this->input->post('state'),
						'zip_code'  => $this->input->post('postal'),
						'individual_discount_id'  => $this->input->post('individual_discount'),
						'discount_id'  => $this->input->post('discount'),
						'total_before_discount' => $this->input->post('total_before_discount'),

						'total_after_all_discount' => $this->input->post('total_after_all_discount'),
						'sales_tax' => $this->input->post('sales_tax'),
						'all_total' => $this->input->post('all_total'),
						'prepayment_discount' => $this->input->post('prepayment_discount'),
						'sales_tax1' => $this->input->post('sales_tax1'),
						'total_prepaid' => $this->input->post('total_prepaid'),
						//'lawn_size'  => $this->input->post('lawn_size'),
						'status' => 'Pending'
				);
				$lastId = $this->input->post('proposal_id');
				$this->Common_model->dataUpdate('proposals',array('id' =>$lastId),$newdata);
				
				$this->session->set_flashdata('success', 'Form updated successful');

				$this->Common_model->delete_data('proposal_additional',array('proposal_id' => $lastId));
				$service_id = $this->input->post('service_id');
				$all_service_ids = $this->input->post('all_service_id');
				$size = $this->input->post('size');
				
				if($this->input->post('recommended')){
					$recommended = $this->input->post('recommended');
				}
				else{
					$recommended = [];
				}

				if($this->input->post('optional')){
					$optional = $this->input->post('optional');
				}
				else{
					$optional = [];
				}

				$number_of_services = $this->input->post('number_of_services');
				$number_of_services_fy = $this->input->post('number_of_services_fy');
				$system_unit_price = $this->input->post('system_unit_price');
				$unit_price = $this->input->post('unit_price');
				$total_this_year = $this->input->post('total_this_year');
				$total_full_year = $this->input->post('total_full_year');
				$total_before_discount = $this->input->post('total_before_discount');
				$total_after_all_discount = $this->input->post('total_after_all_discount');
				$sales_tax = $this->input->post('sales_tax');
				$all_total = $this->input->post('all_total');
				$prepayment_discount = $this->input->post('prepayment_discount');
				$sales_tax1 = $this->input->post('sales_tax1');
				$total_prepaid = $this->input->post('total_prepaid');
				
				if(!empty($service_id)){

					foreach($service_id as $serviceId){
						$i = 0;
						foreach($all_service_ids as $all_service_id){

							if($all_service_id == $serviceId){
								//echo " serviceId ".$serviceId;
								//echo "<br>";
								
								if(in_array($serviceId,$recommended)){
									$recommendedData = 'yes';
								}
								else{
									$recommendedData = '';
								}

								if(in_array($serviceId,$optional)){
									$optionalData = 'yes';
								}
								else{
									$optionalData = '';
								}


								$addData = array(
										'proposal_id'  => $lastId,
										'service_id'  => $serviceId,
										
										'size_time'  => $size[$i],

										'system_price_unit'  => $system_unit_price[$i],

										'service_number_service'  => $number_of_services[$i],
										
										'unit_price'  => $unit_price[$i],
										'total_this_year'  => $total_this_year[$i],
										'total_full_year'  => $total_full_year[$i],
										'recommended' => $recommendedData,
										'optional' => $optionalData
										
										
								);
								$this->Common_model->insertData('proposal_additional',$addData);

							}
							$i++;
						}
					}

				}		
				
				$emailData = array(
				        'user_id'  => $this->session->userdata('user_id'),
				        'customer_no'  => $this->input->post('customer_no'),
				        'customer_name'  => $this->input->post('customer_name'),
				        'phone'  => $this->input->post('phone_number'),
				        'email'  => $this->input->post('email'),
				        'address'  => $this->input->post('address'),
						'lastId'  => $lastId,
						
				);

				$config = array(
					'protocol' =>  'smtp',//'smtp',  'mail', 'sendmail', or 'smtp'
					'smtp_host' => 'smtp.gmail.com', 
					'smtp_port' => 465,
					'smtp_user' => 'lawndoctor12345@gmail.com',
					//'smtp_pass' => 'Option1234@',
					'smtp_pass' => 'ixzeuwxopldwmpga',
					'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
					'mailtype' => 'HTML', //plaintext 'text' mails or 'html'
					'smtp_timeout' => '4', //in seconds
					'charset' => 'UTF-8',
					'wordwrap' => TRUE
				);
			
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");  

				$from_email = "lawndoctor12345@gmail.com";
				$to_email_client = $this->input->post('email'); //$account_detailsForm['email'];
				$message_client = $this->load->view('email/registration-email.php',$emailData,TRUE);
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				$this->email->from($from_email,'Lawn Doctor');
				$this->email->to($to_email_client);
				$this->email->subject('Proposal');
				$this->email->message($message_client);
				$this->email->set_mailtype("html");
				//$this->email->message('Vetnexus class.');
				$this->email->send();
				//echo $this->email->print_debugger();
				redirect('proposal');
			}
			else{

				$allData["proposal"] = $this->Common_model->getSingle('proposals',array('id' => $id));
				$allData["proposalAdditional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id));
				$allData["discount"] = $this->Common_model->getValueall('discount');
				$allData["individual_discount"] = $this->Common_model->getValueall('individual_discount');
				$allData["individual_services"] = $this->Common_model->getValueall('individual_services');
				$allData["services"] = $this->Common_model->dbQuery("Select * from core_services where id not IN (18,19)"); //$this->Common_model->getValueall('core_services');
				$data['content'] = $this->load->view('site/proposal/addProposalEdit',$allData, true);
				$this->load->view('template/site/main',$data);

			}
			
			
		    }else{

			redirect("login");
		}
	}

	public function delete($id){
		
		if($this->session->userdata('user_id')){
			// $allData = '';
			// $data['content'] = $this->load->view('site/proposal/addProposal',$allData, true);
			// $this->load->view('template/site/main',$data);

			$this->Common_model->delete_data('proposals',array('id' => $id,'user_id' => $this->session->userdata('user_id')));
			redirect("proposal");
		    }else{

			redirect("login");
		}
	}

	public function addProposalNew(){
			// $allData = '';
			// $data['content'] = $this->load->view('site/proposal/addProposalNew',$allData, true);
			// $this->load->view('template/site/main',$data);
			if($this->session->userdata('user_id')){
				$allData["services"] = $this->Common_model->getValueall('core_services');
				$allData["service_optionals"] = $this->Common_model->getValueall('core_optional_services');
				$allData["outdoor_pest_controls"] = $this->Common_model->getValueall('outdoor_pest_controls');
				$allData["outdoor_pest_optional_controls"] = $this->Common_model->getValueall('outdoor_pest_optional_controls');
				$data['content'] = $this->load->view('site/proposal/addProposalNew',$allData, true);
				$this->load->view('template/site/main',$data);
			
		    }
			else{

				redirect("login");
			}
	}
	


}
