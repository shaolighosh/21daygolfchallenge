<?php
use Dompdf\Dompdf;

use Dompdf\Options;
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_proposal extends CI_Controller {

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
		//$this->load->library('session');
		$this->load->database();
		$this->load->model(array('Common_model'));
		$this->load->library('user_agent');
		$this->table_login_data = 'user'; 
		$this->load->library('user_agent');
		$this->load->helper("url");
       	$this->load->library("pagination");
        $this->load->library('form_validation');
     

       
      }

	/* admin login */
	public function index()
	{

        $id = $this->uri->segment(2);
        $rows = $this->Common_model->numrows('proposals',array('id' => $id));
        if($rows >  0){

            $allData["proposal"] = $this->Common_model->getSingle('proposals',array('id' => $id));
            $allData["proposalAdditional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id,'recommended'=>'yes'));
            $allData["proposalAdditional_optional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id,'optional'=>'yes'));
            $allData["proposalCore_services"] = $this->Common_model->getSingle('core_services',array('id' => $id));
            $allData["termsdata"] = $this->Common_model->dbQuery('SELECT * FROM `terms_condition`');
        // echo "<pre>";print_r($allData["proposal"]);
        // print_r($mowing_data=explode(",",$allData["proposal"]->mowing_day));die();
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
           // $this->load->view('template/site/main-new',$data);
        }
        else{
            redirect("login");
        }
        

		
	}

    public function submitproposal(){
        $id = $this->uri->segment(2);
        $this->form_validation->set_rules('term', 'Term & Condition', 'required');
        $file = '';
      //  echo $_POST['customer_signature'];die();
        if($_POST['customer_signature'] != ''){
            $base64string = '';
            $uploadpath   = 'public/upload/signature/';
            $parts        = explode(";base64,", $_POST['customer_signature']);
            $imageparts   = explode("image/", @$parts[0]);
            $imagetype    = $imageparts[1];
            $imagebase64  = base64_decode($parts[1]);
            $file         = $uploadpath . uniqid() . '.png';
         file_put_contents($file, $imagebase64);
        }
        
        $id = $_POST['id'];

         $allData["proposal"] = $this->Common_model->getSingle('proposals',array('id' => $id));
      //   echo "<pre>";print_r($allData["proposal"]);die();
            $allData["proposalAdditional"] = $this->Common_model->getAllData('proposal_additional',array('proposal_id' => $id));
            $allData["proposalCore_services"] = $this->Common_model->getSingle('core_services',array('id' => $id));
            $allData["termsdata"] = $this->Common_model->dbQuery('SELECT * FROM `terms_condition`');
         // echo "<pre>";print_r($allData);die();
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
          



       
        $file_name = 'public/upload/signature/'.rand(000,999).time().'.pdf';
        $this->load->library('pdf');
         $dompdf = new Dompdf();
        //  // To Setup the paper size and orientation
        //  $dompdf->setPaper('A4', 'portrait');
       echo $html =  $this->load->view('site/proposal/user-proposal-pdf',$allData,TRUE); 
        $dompdf->setBasePath(realpath(FCPATH.'public/assets/css/'));
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->loadHtml('
        <link rel="stylesheet" type="text/css" href="custom-style.css">
        '.$html);


        // (Optional) Setup the paper size and orientation portrait landscape
        $dompdf->setPaper('a3', 'landscape');

         // Render the HTML as PDF
         $dompdf->render();
         // Get the generated PDF file contents
         $pdf = $dompdf->output();
         // Output the generated PDF to Browser
        // $dompdf->stream($file_name.".pdf", array("Attachment" => true));
         file_put_contents($file_name, $pdf);

        $mowing_day = $this->input->post('mowing_day');
        if(!empty($mowing_day)){
        $mowing_day = implode(',',$mowing_day);
       }

      /*  $payment_go = $this->input->post('payment_go');
       if(!empty($payment_go)){
        $payment_go = implode(',',$payment_go);
       } */
       if ($this->form_validation->run() == TRUE){
        $data=[
            'locked_gate'=> $this->input->post('locked_gate'),
          'gated_community' => $this->input->post('gated_community'),
         'locked_gate_code'=> $this->input->post('gate_code'),
         'gated_community_code' => $this->input->post('gate_code1'),
         'mowing_day' => $mowing_day,
        'mowing_frequency' => $this->input->post('mowing_frequency'),
        'watering_method' => $this->input->post('watering_method'),
        'watering_method_duration' => $this->input->post('watering_method'),
        'watering_method_duration' => $this->input->post('duration'),
        'watering_method_frequency' => $this->input->post('frequency'),
        'instruction' => $this->input->post('instruction'),
        'signature' => $file,
        'pdf_file' =>$file_name,
        'payment_go'=>$this->input->post('pay'),
        'status'=>'closed',
    ];

   // echo "<pre>";print_r($data);die();
        
         $update = $this->Common_model->dataUpdate('proposals',array('id'=> $this->input->post('id') ),$data);

        
         $emailData = array(
            'user_id'  => $this->input->post('id'),
            'customer_no'  => $this->input->post('fname'),
            'customer_name'  => $this->input->post('lname')
            
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
    $message_client = $this->load->view('email/finalproposal-email.php',$emailData,TRUE);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $this->email->from($from_email,'Lawn Doctor');
    $this->email->to($to_email_client);
    $this->email->subject('Proposal');
    $this->email->message($message_client);
    $this->email->set_mailtype("html");
    $this->email->attach($file_name);
    //$this->email->message('Vetnexus class.');
    $this->email->send();

    redirect('Check_proposal/thank_you');
  // $this->load->view('site/proposal/user-proposal-pdf');
				
				// $this->session->set_flashdata('success', 'Terms & Condition has been Updated Successfully.');
				 
               
       }

    }

    public function thank_you(){

        $this->load->view('site/thank-you');

    }

    public function generatePdf()
    {

        $id = $this->uri->segment(3);
        $rows = $this->Common_model->numrows('proposals',array('id' => $id));
        if($rows >  0){

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
          // $this->load->view('site/proposal/user-proposal-pdf',$allData);
          $this->load->library('pdf');
          $dompdf = new Dompdf();
         //  // To Setup the paper size and orientation
         //  $dompdf->setPaper('A4', 'portrait');
       // echo $html =  $this->load->view('site/proposal/user-proposal-pdf',$allData,TRUE); die();
            $html =  $this->load->view('site/proposal/user-proposal-pdf',$allData,TRUE);
         $dompdf->setBasePath(realpath(FCPATH.'public/assets/css/'));
         $dompdf->set_option('isRemoteEnabled', TRUE);
         $dompdf->loadHtml('
         <link rel="stylesheet" type="text/css" href="custom-style.css">
         '.$html);
 
 
         // (Optional) Setup the paper size and orientation portrait landscape
         $dompdf->setPaper('a3', 'landscape');
 
          // Render the HTML as PDF
          $dompdf->render();
          // Get the generated PDF file contents
          $pdf = $dompdf->output();
          $dompdf->stream("", array("Attachment" => false));
          exit(0);
           // $this->load->view('template/site/main-new',$data);
        }
        else{
            redirect("login");
        }
        

        
    }

}
