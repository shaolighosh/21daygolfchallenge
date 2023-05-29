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
		$this->table_login_data = 'user';
      }

	/* admin login */
	public function index()
	{
		
		if($this->session->userdata('logged_in')){
			
			redirect('proposal');
		}
		
		if($this->input->post('email')){
			
			$where = array('user_email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) );
			$rows = $this->Common_model->numrows($this->table_login_data,$where);
			
		
			if($rows > 0){
				$single = $this->Common_model->getSingle($this->table_login_data,$where);
				//print_r($single);die();
				$newdata = array(
				        'user_id'  => $single->id,
				        'id'     => $single->id,
				        'role' => $single->user_email,
				        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				//print_r($_SESSION);die();
				redirect('proposal');
			}else{
				
				$this->session->set_flashdata('error', 'Email or password is worng.');
				redirect('/');
			}
		}else{
			$this->load->view('site/login/login');
		}
		
	}
	


	public function logout()
	{	

		$this->session->sess_destroy();
		redirect("login");
	}

    public function calculate_price(){

        //print_r($_POST);die();
        if(isset($_POST['checked_service_id'])){
            $checked_service_id = $_POST['checked_service_id'];
        }
        else{
            $checked_service_id = [];
        }
        
        $response = array("cost" => '',"total_cost" => '');
        $serviceId =  $_POST['service_id'];
        
        //$service_type =  $_POST['service_type'];
        $service_number_service =  $_POST['service_number_service'];
        $discount =  $_POST['discount'];
        $individual_discount =  $_POST['individual_discount'];
        $serviceData = $this->Common_model->getSingle('core_services',array('id' => $serviceId));
        if($serviceData->square_foot == 'yes'){
            $size =  $_POST['size'] * $serviceData->service_min_size;
        }
        else{
            $size =  $_POST['size'];
        }
        
        $unitPrice = 0;
        $basePrice = 0;
        //print_r($serviceData);die();
        if(!empty($serviceData)){
            if($serviceData->square_foot == 'yes'){
                if($size <= $serviceData->service_min_size ){
                    
                   // $unitPrice = $serviceData->service_min_price;
                   if($discount != '' || $individual_discount != ''){
                    
                        $discountData = '';
                        $individualData = '';
                        $total = '';
                        $fullYear = '';
                        

                        if($individual_discount != ''){
                            $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                            if($individualData->id == 2){
                                if(in_array($serviceData->related_service_id,$checked_service_id)){
                                    if($service_number_service != ''){
                                        $total = ($serviceData->with_service_price - $individualData->amount ) * $service_number_service;
                                    }
                                    else{
                                        $total = 0;
                                    }
                                    
                                    $basePrice = ($serviceData->with_service_price);
                                    $fullYear = $serviceData->total_service * $basePrice;
                                    $unitPrice = $serviceData->with_service_price - $individualData->amount;
                                }
                                else{
                                    if($service_number_service != ''){
                                        $total = ($serviceData->service_min_price - $individualData->amount ) * $service_number_service;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($serviceData->service_min_price);
                                    $fullYear = $serviceData->total_service * $basePrice;
                                    $unitPrice = $serviceData->service_min_price - $individualData->amount;

                                }
                                
                                //$unitPrice = $serviceData->service_min_price - 
                                //echo "here". $serviceData->total_service;
                            }   
                            else{
                                if(in_array($serviceData->related_service_id,$checked_service_id)){
                                    if($service_number_service !=''){
                                        $total = (($serviceData->with_service_price - (($serviceData->with_service_price * $individualData->percentage) /100 )) * 1) + ($serviceData->with_service_price * ($service_number_service - 1) ) ;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($serviceData->with_service_price );
                                    $unitPrice = $basePrice;
                                    $fullYear = $serviceData->total_service * $serviceData->with_service_price;

                                }
                                else{
                                    if($service_number_service != ''){
                                        $total = (($serviceData->service_min_price - (($serviceData->service_min_price * $individualData->percentage) /100 )) * 1) + ($serviceData->service_min_price * ($service_number_service - 1) ) ;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($serviceData->service_min_price );
                                    $unitPrice = $basePrice;
                                    $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                                }
                               
                            }
                            
                        }
                        
                       // echo "basePrice ". $total." unitPrice ".$unitPrice;die();
                        if($discount != ''){
                            if($individual_discount != ''){
                                
                                $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                                if($individualData->id == 2){

                                    if(in_array($serviceData->related_service_id,$checked_service_id)){
                                        if($service_number_service != ''){
                                            $total = ($serviceData->with_service_price - $individualData->amount ) * $service_number_service;
                                        }
                                        else{
                                            $total = '';
                                        }
                                        
                                        $basePrice = ($serviceData->with_service_price);
                                        $fullYear = $serviceData->total_service * $basePrice;
                                        $unitPrice = $serviceData->with_service_price - $individualData->amount;
                                    }
                                    else{
                                        if($service_number_service != ''){
                                            $total = ($serviceData->service_min_price - $individualData->amount ) * $service_number_service;
                                        }
                                        else{
                                            $total = '';
                                        }
                                        
                                        $basePrice = ($serviceData->service_min_price);
                                        $fullYear = $serviceData->total_service * $basePrice;
                                        $unitPrice = $serviceData->service_min_price - $individualData->amount;

                                    }
                                    
                                    //$unitPrice = $serviceData->service_min_price - 
                                    //echo "here". $serviceData->total_service;
                                }   
                                else{
                                    
                                    if(in_array($serviceData->related_service_id,$checked_service_id)){
                                        if($service_number_service != ''){
                                            $total = (($serviceData->with_service_price - (($serviceData->with_service_price * $individualData->percentage) /100 )) * 1) + ($serviceData->with_service_price * ($service_number_service - 1) ) ;
                                        }
                                        else{
                                            $total = '';
                                        }
                                        
                                        $basePrice = ($serviceData->with_service_price );
                                        $unitPrice = $basePrice;
                                        $fullYear = $serviceData->total_service * $serviceData->with_service_price;

                                    }
                                    else{
                                        if($service_number_service != ''){
                                            $total = (($serviceData->service_min_price - (($serviceData->service_min_price * $individualData->percentage) /100 )) * 1) + ($serviceData->service_min_price * ($service_number_service - 1) ) ;
                                        }
                                        else{
                                            $total = '';
                                        }
                                        
                                        $basePrice = ($serviceData->service_min_price );
                                        $unitPrice = $basePrice;
                                        $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                                    }
                                    
                                }

                                $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                $unitPrice = $unitPrice - (($unitPrice * $discountData->percentage)/100); 
                              // echo  $basePrice = $basePrice;die();
                                if($service_number_service != ''){
                                    $total = $unitPrice * $service_number_service;
                                }
                                else{
                                    $total = '';
                                }
                                
                                $fullYear = $serviceData->total_service *  $unitPrice;

                               
                                

                            }
                            else{
                                if(in_array($serviceData->related_service_id,$checked_service_id)){
                                    $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                    $total = ($serviceData->with_service_price - (($serviceData->with_service_price * $discountData->percentage)/100)) * $service_number_service;
                                    $basePrice = ($serviceData->with_service_price);
                                    $fullYear = $serviceData->total_service * ($serviceData->with_service_price - (($serviceData->with_service_price * $discountData->percentage)/100));
                                    $unitPrice = $serviceData->with_service_price - (($serviceData->with_service_price * $discountData->percentage)/100);
                                }
                                else{
                                    $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                    $total = ($serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100)) * $service_number_service;
                                    $basePrice = ($serviceData->service_min_price);
                                    $fullYear = $serviceData->total_service * ($serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100));
                                    $unitPrice = $serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100);

                                }
                                
                               // echo $unitPrice; die();

                            }
                           // echo "THere";
                            $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));

                        }

                        
                       // echo "here";
                        $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;
                    }
                    else{

                        if(in_array($serviceData->related_service_id,$checked_service_id)){

                            $total = $serviceData->with_service_price * $service_number_service;
                            $basePrice = ($serviceData->with_service_price);
                            $fullYear = $serviceData->total_service * $serviceData->with_service_price;
                            $unitPrice = $serviceData->with_service_price;

                        }
                        else{
                            if($service_number_service != ''){
                                $total = $serviceData->service_min_price * $service_number_service;
                            }
                            else{
                                $total = '';
                            }
                            
                            $basePrice = ($serviceData->service_min_price);
                            $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                            $unitPrice = $serviceData->service_min_price;

                        }
                        
                        $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;
                    }
                    
                }
                else{

                    
                    
                    if(in_array($serviceData->related_service_id,$checked_service_id)){
                        $newBasePrice = $serviceData->with_service_price + ((($size - $serviceData->service_min_size)/ $serviceData->service_incremental) * $serviceData->service_incremental_price);
                    }
                    else{
                        $newBasePrice = $serviceData->service_min_price + ((($size - $serviceData->service_min_size)/ $serviceData->service_incremental) * $serviceData->service_incremental_price);
                    }
                   

                   // die();
                    
                    if($discount != '' || $individual_discount != ''){
                        $discountData = '';
                        $individualData = '';
                        

                        if($individual_discount != ''){
                            $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                            if($individualData->id == 2){
                                if(in_array($serviceData->related_service_id,$checked_service_id)){
                                    if($service_number_service != ''){
                                        $total = ($newBasePrice - $individualData->amount ) * $service_number_service;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($newBasePrice - $individualData->amount );
                                    $fullYear = $serviceData->total_service * $basePrice;
                                    $unitPrice = $newBasePrice;
                                }
                                else{

                                    if($service_number_service != ''){
                                        $total = ($newBasePrice - $individualData->amount ) * $service_number_service;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($newBasePrice - $individualData->amount );
                                    $fullYear = $serviceData->total_service * $basePrice;
                                    $unitPrice = $newBasePrice;
                                }
                                
                                //echo "here". $serviceData->total_service;
                            }   
                            else{
                                if(in_array($serviceData->related_service_id,$checked_service_id)){
                                    if($service_number_service != ''){
                                        $total = (($newBasePrice - (($newBasePrice * $individualData->percentage) /100 )) * 1) + ($newBasePrice * ($service_number_service - 1) ) ;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($newBasePrice );
                                    $fullYear = $serviceData->total_service * $newBasePrice;
                                    $unitPrice = $newBasePrice;
                                }
                                else{

                                    if($service_number_service != ''){
                                        $total = (($newBasePrice - (($newBasePrice * $individualData->percentage) /100 )) * 1) + ($newBasePrice* ($service_number_service - 1) ) ;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($newBasePrice );
                                    $fullYear = $serviceData->total_service * $newBasePrice;
                                    $unitPrice = $newBasePrice;
                                }
                                
                            }
                            
                        }
                        //echo "basePrice ". $basePrice;die();
                        if($discount != ''){
                            if($individual_discount != ''){
                                $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                                if($individualData->id == 2){
                                    if(in_array($serviceData->related_service_id,$checked_service_id)){

                                        if($service_number_service != ''){
                                            $total = ($newBasePrice - $individualData->amount ) * $service_number_service;
                                        }
                                        else{
                                            $total = 0;
                                        }
                                        
                                        $basePrice = ($newBasePrice - $individualData->amount );
                                        $fullYear = $serviceData->total_service * $basePrice;
                                        $unitPrice = $newBasePrice;
                                    }
                                    else{
                                        if($service_number_service != ''){
                                            $total = ($newBasePrice - $individualData->amount ) * $service_number_service;
                                        }
                                        else{
                                            $total = 0;
                                        }
                                        
                                        $basePrice = ($newBasePrice - $individualData->amount );
                                        $fullYear = $serviceData->total_service * $basePrice;
                                        $unitPrice = $newBasePrice;
                                    }
                                    
                                    //echo "here". $serviceData->total_service;
                                }   
                                else{
                                  //  print_r($individualData);die();
                                    if($service_number_service != ''){
                                        $total = (($newBasePrice - (($newBasePrice * $individualData->percentage) /100 )) * 1) + ($newBasePrice * ($service_number_service - 1) ) ;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($newBasePrice );
                                    $fullYear = $serviceData->total_service * $newBasePrice;
                                    $unitPrice = $newBasePrice;
                                }

                                $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                
                                $basePrice = $basePrice - (($basePrice * $discountData->percentage)/100);
                                if($service_number_service != ''){
                                    $total = $basePrice * $service_number_service;
                                }
                                else{
                                    $total = '';
                                }
                                
                                $fullYear = $serviceData->total_service *  $basePrice;


                                

                            }
                            else{

                                $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                $unitPrice = $newBasePrice;
                                $basePrice = $newBasePrice - (($newBasePrice * $discountData->percentage)/100);
                               // die();
                                if($service_number_service != ''){
                                    $total = $newBasePrice * $service_number_service;
                                }
                                else{
                                    $total = '';
                                }
                                
                                $fullYear = $serviceData->total_service *  $newBasePrice;

                            }
                           // echo "Here";
                           // $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));

                        }

                        $response = array("system_price_unit" =>$basePrice,"cost" => $unitPrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;

                        //$response = array("system_price_unit" =>$system_price_unit ,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear);
                    }
                    else{
                    //     echo "size ".$size;
                    //     echo "serviceData->service_min_price ".($size );
                    //     echo  "service_min_time ".$serviceData->id;
                    //   echo  
                    //     die();
                        $unitPrice = $serviceData->service_min_price + ((($size - $serviceData->service_min_size)/ $serviceData->service_incremental));
                        if($service_number_service != ''){
                            $total = $service_number_service * $unitPrice;
                        }
                        else{
                            $total = '';
                        }
                        
                        $basePrice = ($unitPrice );
                        $fullYear = $serviceData->total_service * $unitPrice;
                        //$unitPrice = $newBasePrice;


                        
                        //die();
                        $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;
                    }


                   
                }
            }
            else{
                 if($serviceData->service_min_time <= $size){
                   // $unitPrice = $serviceData->service_min_price;

                    
                   // $unitPrice = $serviceData->service_min_price;
                   if($discount != '' || $individual_discount != ''){
                        $discountData = '';
                        $individualData = '';
                        $total = '';
                        $fullYear = '';
                        

                        if($individual_discount != ''){
                            $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                            if($individualData->id == 2){
                                if($service_number_service != ''){
                                    $total = ($serviceData->service_min_price - $individualData->amount ) * $service_number_service;
                                }
                                else{
                                    $total = '';
                                }
                                
                                $basePrice = ($serviceData->service_min_price);
                                $fullYear = $serviceData->total_service * $basePrice;
                                $unitPrice = $serviceData->service_min_price - $individualData->amount;
                                //$unitPrice = $serviceData->service_min_price - 
                                //echo "here". $serviceData->total_service;
                            }   
                            else{
                                if($service_number_service != ''){
                                     $total = (($serviceData->service_min_price - (($serviceData->service_min_price * $individualData->percentage) /100 )) * 1) + ($serviceData->service_min_price * ($service_number_service - 1) ) ;
                                }
                                else{
                                     $total = '';
                                }
                               
                                $basePrice = ($serviceData->service_min_price );
                                $unitPrice = $basePrice;
                                $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                            }
                            
                        }
                       // echo "basePrice ". $total." unitPrice ".$unitPrice;die();
                        if($discount != ''){
                            if($individual_discount != ''){
                                $individualData = $this->Common_model->getSingle('individual_discount',array('id' => $individual_discount ));
                                if($individualData->id == 2){
                                    if($service_number_service != ''){
                                        $total = ($serviceData->service_min_price - $individualData->amount ) * $service_number_service;
                                    }
                                    else{
                                        $total = '';
                                    }
                                    
                                    $basePrice = ($serviceData->service_min_price);
                                    $fullYear = $serviceData->total_service * $basePrice;
                                    $unitPrice = $serviceData->service_min_price - $individualData->amount;
                                    //$unitPrice = $serviceData->service_min_price - 
                                    //echo "here". $serviceData->total_service;
                                }   
                                else{
                                    $total = (($serviceData->service_min_price - (($serviceData->service_min_price * $individualData->percentage) /100 )) * 1) + ($serviceData->service_min_price * ($service_number_service - 1) ) ;
                                    $basePrice = ($serviceData->service_min_price );
                                    $unitPrice = $basePrice;
                                    $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                                }

                                $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                $unitPrice - (($unitPrice * $discountData->percentage)/100);
                              // echo  $basePrice = $basePrice;die();
                                if($service_number_service != ''){
                                    $total = $basePrice * $service_number_service;
                                }
                                else{
                                    $total = '';
                                }
                                
                                $fullYear = $serviceData->total_service *  $basePrice;


                                

                            }
                            else{
                                $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));
                                $total = ($serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100)) * $service_number_service;
                                $basePrice = ($serviceData->service_min_price);
                                $fullYear = $serviceData->total_service * ($serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100));
                                $unitPrice = $serviceData->service_min_price - (($serviceData->service_min_price * $discountData->percentage)/100);
                               // echo $unitPrice; die();

                            }
                           // echo "Here";
                            $discountData = $this->Common_model->getSingle('discount',array('id' => $discount ));

                        }

                        

                        $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;
                    }
                    else{

                        $total = $serviceData->service_min_price * $service_number_service;
                        $basePrice = ($serviceData->service_min_price);
                        $fullYear = $serviceData->total_service * $serviceData->service_min_price;
                        $unitPrice = $serviceData->service_min_price;
                         $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;

                    }



                }
                else{
                    //echo 'service_min_time '.$serviceData->service_min_time.'size '.$size;
                     $unitPrice = $serviceData->service_min_price + ((($size - $serviceData->service_min_time)/ $serviceData->service_incremental) * $serviceData->service_incremental_price);
                    //die();
                     $response = array("system_price_unit" =>$unitPrice,"cost" => $basePrice,"total_cost" => $total,'full_year' => $fullYear,'total_service' => $serviceData->total_service);
                        echo json_encode($response);
                        return;

                }
            }
        }
        echo "unitPriceaaa ".$unitPrice." size ".$size." service_min_size ".$serviceData->service_min_size;
        //echo json_encode($serviceData);
         die();

       

        echo json_encode($response);



    }

    public function userName(){
		$clinicDetails =  $this->Common_model->numrows('golfersu_user',array('username' => $_GET['user_name']));
		if ($clinicDetails == 0) { 
            echo "true";
        } else {
            echo "false";
        }
	}

    public function emailCheck(){
		$clinicDetails =  $this->Common_model->numrows('golfersu_user',array('user_email' => $_GET['email']));
		if ($clinicDetails == 0) { 
            echo "true";
        } else {
            echo "false";
        }
	}

    public function fileUploadVideo(){
        // print_r($_FILES);
        // print_r($_POST);
        $upload = 'err'; 
        if(!empty($_FILES['file'])){ 
            
            // File upload configuration 
            $targetDir = FCPATH."/public/upload/"; 
            $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif'); 
            
            $fileName = time().rand(000,999).basename($_FILES['file']['name']); 
            $targetFilePath = $targetDir.$fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
           // if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){ 
                    $upload = base_url().'public/upload/'.$fileName; 

                    $this->Common_model->insertData('golfersu_user_rewards',array('user_id' => $this->session->userdata('user_id'),'reward_type' => 'Step '.$_POST['step'],'reward_point' => reward_point ));

                    $row = $this->Common_model->numrows('golfersu_progress',array('user_id' => $this->session->userdata('user_id'), 'step_id' =>  $_POST['step']));
                    if($row == 0){
                        $this->Common_model->insertData('golfersu_progress',array('user_id' => $this->session->userdata('user_id'),'step_id' => $_POST['step'],'video_url' => 'public/upload/'.$fileName ));
                    }
                    else{
                         $singleDetails = $this->Common_model->getSingle('golfersu_progress',array('user_id' => $this->session->userdata('user_id'), 'step_id' =>  $_POST['step']));
                        $this->Common_model->dataUpdate('golfersu_progress',array('id' => $singleDetails->id),array('video_url' => 'public/upload/'.$fileName));                

                    }
                    $this->Common_model->insertData('golfersu_userstep_video',array('user_id' => $this->session->userdata('user_id'),'step' => $_POST['step'],'video_file' => 'public/upload/'.$fileName ));
                    $lastId = $this->db->insert_id();
                    echo json_encode(array('status' => true,'message' => 'File uploaded successfully.','video_url' => $upload,'id' =>$lastId ));
                } 
                else{
                    echo json_encode(array('status' => false,'message' => 'There is an error.Please try again.'));
                }
           // } 
        } 
        else{

              echo json_encode(array('status' => false,'message' => 'There is an error.Please try again.'));  
        }
        //echo $upload; 


    }

    public function promo_check(){

       // print_r($_POST);
		$clinicDetails =  $this->Common_model->numrows('golfersu_promo_codes',array('promo_code' => $_POST['coupon_code']));
		if ($clinicDetails > 0) { 

          

            $promoDetails =  $this->Common_model->getSingle('golfersu_promo_codes',array('promo_code' => $_POST['coupon_code']));

             $promoUsed = $this->Common_model->numrows('golfersu_promo_code_used',array('promo_id' => $_POST['coupon_code']));
             if($promoDetails->quantity <= $promoUsed && strtotime(date('Y-m-d')) == strtotime($promoDetails->expiry_date) ){

                 //print_r($promoDetails);
                $users = $this->Common_model->numrowsDbQuery("SELECT * FROM `golfersu_user`");
                // if($users > 100){
                //     $amount = class_amount - ((class_amount * $promoDetails->discount_percentage ) / 100);
                // }
                // else{
                //     $amount = class_amount_100 - ((class_amount_100 * $promoDetails->discount_percentage ) / 100);
                // }
                
                 $amount = class_amount - ((class_amount * $promoDetails->discount_percentage ) / 100);
               echo json_encode(array('success' => true,'amount' => $amount,'id' => $promoDetails->id));

             }
             else{
                echo json_encode(array('success' => false,'amount' => '','message' => 'Invalid Promo Code'));
             }
           
          //  echo "true";
        } else {
             echo json_encode(array('success' => false,'amount' => '','message' => 'Invalid Promo Code'));
        }
	}

    public function addRewardsPoint(){

       // print_r($_POST);
		if($this->session->userdata('user_id')){

            
            $this->Common_model->insertData('golfersu_user_rewards',array('user_id' => $this->session->userdata('user_id'),'reward_type' => $_POST['share_data'],'reward_point' => reward_point ));
        }
	}


    public function submit_without_video(){

       // print_r($_POST);
		if($this->session->userdata('user_id')){

            $row = $this->Common_model->numrows('golfersu_progress',array('user_id' => $this->session->userdata('user_id'), 'step_id' =>  $_POST['step']));
            if($row == 0){

                

                $this->Common_model->insertData('golfersu_progress',array('user_id' => $this->session->userdata('user_id'),'step_id' => $_POST['step'] ));
            }

            $userData = $this->Common_model->getSingle('golfersu_user',array('id' => $this->session->userdata('user_id')));
                $config = array(
                        'protocol' =>  'smtp',//'smtp',  'mail', 'sendmail', or 'smtp'
                        'smtp_host' => 'smtp.gmail.com', 
                        'smtp_port' => 465,
                        'smtp_user' => 'golfersu2023@gmail.com',
                        //'smtp_pass' => 'Option1234@',
                        'smtp_pass' => 'zfgpvksesrylpvdf',
                        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                        'mailtype' => 'HTML', //plaintext 'text' mails or 'html'
                        'smtp_timeout' => '4', //in seconds
                        'charset' => 'UTF-8',
                        'wordwrap' => TRUE
                    );
                    //$this->load->config('email');
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");  

                    if($_POST['step'] == 1){
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on successfully completing Step 1 - "Day 1 Intro: The Grip\'s Affect on Club Face" of the 21-Day Challenge Masterclass! You\'ve taken an important step towards improving your golf game, and we\'re delighted to see your progress.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">By understanding the impact of the grip on the club face, you\'ve gained valuable insights into one of the fundamental aspects of a successful swing. We hope you found the exercises and resources provided helpful in developing a solid foundation for your golfing journey.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">As you move forward, we want to share a few key points to keep in mind:</p>
';
    $bodyText = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Celebrate Your Milestone: Take a moment to acknowledge and celebrate your accomplishment. Completing Step 1 demonstrates your commitment to improving your game and sets the stage for further progress.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Step 2 - "Day 4: Taking the Club Away from the Ball": In this next step, we\'ll dive into the crucial technique of taking the club away from the ball. You\'ll learn techniques and drills that will refine your swing motion and enhance your overall consistency.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Stay Engaged and Share: Continue to engage with the GolfersU community and share your progress. Your journey inspires others and creates a supportive environment for all participants. We encourage you to share your experience using the hashtag #GolfersUChallenge.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Ongoing Support: Keep an eye on your email inbox for updates, tips, and exclusive content tailored to your learning journey. Our team is here to provide ongoing guidance and support to help you reach your goals.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Remember, each step brings you closer to becoming a better golfer. Embrace the process, stay focused, and enjoy the learning experience.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">If you have any questions or need assistance, please don\'t hesitate to reach out. We\'re here to ensure your success throughout the 21-Day Challenge Masterclass.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations once again on completing Step 1! We\'re excited to continue this journey with you.</p>
';
                    }
                    elseif ($_POST['step'] == 2) {
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on completing Step 2 - "Day 4: Taking the Club Away from the Ball" of the 21-Day Challenge Masterclass! You\'re making great progress and demonstrating a true commitment to improving your golf game. Well done!</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">In this step, you learned the essential techniques and drills to refine your swing motion and enhance your overall consistency. By focusing on taking the club away from the ball, you\'ve taken another crucial step toward developing a more effective and powerful swing.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Here are a few key points to consider as you continue your journey:</p>
';


$bodyText = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Celebrate Your Achievement: Take a moment to celebrate your dedication and the progress you\'ve made. Each step brings you closer to reaching your golfing goals, and your commitment is commendable.</p>
Step 3 - "Day 8: Shoulder Movement in Takeaway Affecting Weight Transfer": As you progress to Step 3, you\'ll explore the role of shoulder movement in the takeaway and how it affects weight transfer. Understanding this connection will further enhance the fluidity and power of your swing.</p>

<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Share Your Progress: We encourage you to share your progress with the GolfersU community. By sharing your experience, you inspire others and foster a supportive environment. Remember to use the hashtag #GolfersUChallenge when posting on social media.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Stay Engaged: Stay connected with us and be on the lookout for additional resources, tips, and insights. Our team is dedicated to supporting your golfing journey and providing you with the tools you need to succeed.</p>

<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Your commitment and effort are truly commendable. Keep up the excellent work, and remember that consistent practice and determination will lead you to the results you desire.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">If you have any questions or need assistance along the way, please don\'t hesitate to reach out. We\'re here to help you succeed in the 21-Day Challenge Masterclass.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations once again on completing Step 2! We\'re excited to see you continue to grow and improve as a golfer.</p>
';
                    
                    }
                     elseif ($_POST['step'] == 3) {
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on completing Step 3 - "Day 8: Shoulder Movement in Takeaway Affecting Weight Transfer" of the 21-Day Challenge Masterclass! You\'re making remarkable progress in your golfing journey, and we\'re thrilled to be a part of your success.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">In this step, you learned about the critical role of shoulder movement in the takeaway and how it affects weight transfer during the swing. By understanding and applying these principles, you\'re developing a more fluid and powerful swing motion.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Here are a few highlights and reminders as you continue your path to golfing excellence:</p>
';
$bodyText = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Celebrate Your Progress: Take a moment to acknowledge your dedication and the strides you\'ve made. Each step brings you closer to reaching your golfing goals, and your commitment is truly inspiring.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Step 4 - "Day 12: Downward Transfer of Weight": As you move forward to Step 4, you\'ll dive into the concept of the downward transfer of weight and its impact on your swing. Mastering this aspect will help you generate more power and consistency in your shots.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Share Your Journey: We encourage you to share your progress and insights with the GolfersU community. By sharing your experiences, you inspire others and contribute to a vibrant and supportive golfing community. Remember to use the hashtag #GolfersUChallenge when sharing on social media.</p>
<p>Stay Engaged: Stay connected with us as we continue to provide you with valuable resources, tips, and guidance. Our team is committed to supporting your growth as a golfer and ensuring you have an exceptional learning experience.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Your dedication and perseverance are truly admirable. Keep up the fantastic work, and remember that consistent practice and a growth mindset are key to unlocking your full potential on the golf course.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">If you have any questions or need assistance at any point during the 21-Day Challenge Masterclass, please don\'t hesitate to reach out. We\'re here to help you succeed and enjoy the journey.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations once again on completing Step 3! We\'re excited to see your continued progress and the positive impact it will have on your game.</p>
';
                    }
                     elseif ($_POST['step'] == 4) {
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on completing Step 4 - "Day 12: Downward Transfer of Weight" of the 21-Day Challenge Masterclass! Your dedication and commitment to improving your golf game are truly commendable. We\'re thrilled to see you progress through each step and witness the positive impact it\'s having on your swing.<p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">In this step, you focused on the downward transfer of weight and its crucial role in generating power and consistency in your shots. By mastering this technique, you\'re developing a more controlled and impactful swing that will contribute to your overall performance on the course.</p>
<p>Here are a few important points to remember as you continue your journey:</p>
';
$bodyText = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Celebrate Your Growth: Take a moment to acknowledge your growth and the progress you\'ve made so far. Each step brings you closer to becoming the golfer you aspire to be. Your commitment and determination are inspiring!</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Step 5 - "Day 15: Golf Swing Finish Position": As you move forward, Step 5 awaits you, where you\'ll explore the importance of the golf swing finish position. This aspect plays a crucial role in maintaining balance, control, and follow-through. By refining your finish position, you\'ll enhance your overall swing dynamics.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Share Your Success: We encourage you to share your success and milestones with the GolfersU community. Your journey can inspire and motivate fellow golfers who are also striving to improve their game. Remember to use the hashtag #GolfersUChallenge when sharing on social media.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Stay Engaged: Keep engaging with the course materials, practice drills, and community discussions. We\'re here to support your growth and provide you with the resources and guidance you need to succeed. Should you have any questions or need assistance, please don\'t hesitate to reach out to us.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Your progress and dedication are a testament to your commitment to becoming a better golfer. Keep up the fantastic work, and continue to embrace the learning process. Remember, it\'s the small, consistent steps that lead to significant improvements.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">We\'re excited to see you thrive in Step 5 and beyond. Should you have any questions or need any assistance along the way, please feel free to contact us. We\'re here to support you on your golfing journey.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations once again on completing Step 4! Your dedication and determination are truly commendable. Keep up the excellent work!</p>
';
                    }
                     elseif ($_POST['step'] == 5) {
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on completing Step 5 - "Day 15: Golf Swing Finish Position" of the 21-Day Challenge Masterclass! You\'re making remarkable progress in your golf journey, and we\'re thrilled to be a part of your success. Your commitment to refining your technique and improving your swing is truly commendable.</br></p></br>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">In Step 5, you focused on the crucial aspect of the golf swing finish position. By paying attention to your finish position, you\'re enhancing your balance, control, and follow-through. These elements contribute to the overall effectiveness and consistency of your swing.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Here are a few key points to keep in mind as you move forward:</p></br>
';

$bodyText = '<p><ul><li>Celebrate Your Achievements: Take a moment to celebrate your accomplishments and the strides you\'ve made in your golf game. Your dedication and perseverance are paying off, and we\'re proud of your progress.</li>
<li>Step 6 - "Day 18: Creating Speed in the Golf Swing": Get ready for the final step of the 21-Day Challenge! In Step 6, you\'ll delve into creating speed in your golf swing. Discover techniques and drills that will help you generate more power and distance with your shots.</li>
<li>Share Your Journey: We encourage you to share your journey with fellow golfers in the GolfersU community. Your experience and insights can inspire and motivate others who are also on their quest for improvement. Don\'t forget to use the hashtag #GolfersUChallenge when sharing your progress on social media.</li>
<li>Stay Engaged: Continue to engage with the course materials, practice drills, and the GolfersU community. Remember, consistent practice and learning are essential to further enhancing your golf skills. If you have any questions or need guidance, we\'re here to support you every step of the way.</li></ul></p></br>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Your dedication and progress are a testament to your passion for the game. Keep up the excellent work, and embrace the learning process. Every day brings you closer to achieving your golfing goals.</p></br>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">As you embark on the final step of the 21-Day Challenge, remember to enjoy the journey. Golf is a lifelong pursuit of improvement and enjoyment. We\'re excited to see you excel in Step 6 and beyond.</p></br>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Should you have any questions or need assistance, please don\'t hesitate to reach out to us. We\'re here to provide you with the support and guidance you need to succeed.</p></br>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations once again on completing Step 5! Your determination and effort are truly admirable. Keep up the fantastic work!</p></br>
';
                    }
                     elseif ($_POST['step'] == 6) {
                        $tilte = '<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Congratulations on completing the final step of the 21-Day Challenge Masterclass! You\'ve reached a significant milestone in your golf journey, and we couldn\'t be prouder of your dedication and progress. Your commitment to improving your golf game has paid off, and we hope you\'re thrilled with the results.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Throughout the 21-Day Challenge, you\'ve explored various aspects of your golf swing and developed essential skills to enhance your performance on the course. From analyzing your grip\'s impact on the club face to mastering the art of creating speed in your swing, each step has contributed to your growth as a golfer.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Now that you\'ve completed the challenge, it\'s time to reflect on your accomplishments and set new goals for the future. Take a moment to appreciate how far you\'ve come and the improvements you\'ve made to your game. Your dedication and hard work have laid a strong foundation for continued success.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">As you wrap up the 21-Day Challenge, we encourage you to explore the other offerings available at GolfersU. We have a range of courses and resources designed to further enhance your golfing skills. Whether you\'re interested in perfecting your putting, mastering your short game, or exploring advanced techniques, we have courses tailored to your needs.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Additionally, as a valued member of GolfersU, you\'re eligible for exclusive rewards and discounts. Don\'t forget to check out the rewards section on our website to see how you can take advantage of these benefits. We appreciate your loyalty and want to reward you for your ongoing commitment to your golfing journey.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Remember to stay connected with the GolfersU community and continue sharing your progress, insights, and achievements. Your experience can inspire and motivate fellow golfers who are also striving for improvement. We encourage you to keep using the hashtag #GolfersUChallenge when posting about your golfing journey on social media.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Thank you for choosing GolfersU as your partner in improving your golf game. We\'re honored to be a part of your success and look forward to supporting you in your future golfing endeavors. Should you have any questions, require assistance, or simply want to share your progress, please don\'t hesitate to reach out to our dedicated support team.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Once again, congratulations on completing the 21-Day Challenge! You\'ve demonstrated remarkable dedication and perseverance, and we\'re excited to see what lies ahead for you on your golfing journey.</p>
<p style="padding:10px; color:#111; font-size:16px; line-height:24px;">Wishing you continued success and enjoyment on the golf course!</p>
';
                    }
                     elseif ($_POST['step'] == 7) {
                        $tilte = '';
                    }
                    else{

                    }

                    $userDataEmail = array(
                        'step' => $_POST['step'],
                        'first_name' => $userData->first_name,
                        'last_name' =>$userData->last_name,
                        'tilte' => $tilte,
                        'bodyText' => $bodyText
                    );


                    $from_email = "golfersu2023@gmail.com";
                    $to_email_client = $this->input->post('email');
                    $message_client = $this->load->view('step-email.php',$userDataEmail,TRUE);
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    $this->email->from($from_email,'golfersu');
                    $this->email->to($userData->user_email);
                    $this->email->subject("Congratulations on Completing Step ".$_POST['step']." of the 21-Day Challenge!");
                    $this->email->message($message_client);
                    $this->email->set_mailtype("html");
                    //$this->email->message('Vetnexus class.');
                    $this->email->send();
            
        }
	}

     public function addUserVote(){

       // print_r($_POST);
		if($this->session->userdata('user_id')){

            $row = $this->Common_model->numrows('golfersu_user_video_votes',array('user_id' => $this->session->userdata('user_id'), 'user_step_video_id' =>  $_POST['video_id']));
            if($row  == 0){
                $this->Common_model->insertData('golfersu_user_video_votes',array('user_id' => $this->session->userdata('user_id'),'user_step_video_id' => $_POST['video_id'] ));
                echo json_encode(array('status' => true,'message' => 'Voted Successfully.'));
            }
            else{
                echo json_encode(array('status' => false,'message' => 'Already voted.'));
            }
            
        }
	}


     public function addUserVoteExternal(){

       // print_r($_POST);
		if(isset($_POST['video_id'])){

           $this->Common_model->insertData('golfersu_user_video_votes',array('user_step_video_id' => $_POST['video_id'] ));
             echo json_encode(array('status' => true,'message' => 'Thank you for your vote.'));
            // if($this->Common_model->insertData('golfersu_user_video_votes',array('user_step_video_id' => $_POST['video_id'] ))){
                
            //     echo json_encode(array('status' => true,'message' => 'Voted Successfully.'));
            // }
            // else{
            //     echo json_encode(array('status' => false,'message' => 'Already voted.'));
            // }
            
        }
        else{
            echo json_encode(array('status' => false,'message' => 'There is an error. Please try again.'));
        }
	}

     public function delete_video(){

       // print_r($_POST);
		if(isset($_POST['video_id'])){
           $this->Common_model->delete_data('golfersu_userstep_video',array('id' => $_POST['video_id'] ));
             echo json_encode(array('status' => true,'message' => 'Deleted Successfully.'));
        }
        else{
            echo json_encode(array('status' => false,'message' => 'There is an error. Please try again.'));
        }
	}


     public function internal_share(){

       // print_r($_POST);
		if(isset($_POST['step_id'])){
           $row = $this->Common_model->numrows('golfersu_user_rewards',array('user_id' => $this->session->userdata('user_id'), 'reward_type' => 'gu_share_step'.$_POST['step_id']));
           if($row == 0){
            $this->Common_model->insertData('golfersu_user_rewards',array('user_id' => $this->session->userdata('user_id'),'reward_type' => 'gu_share_step'.$_POST['step_id'],'reward_point' => share_video_gu_reward_point ));
           }
           

            $this->Common_model->update_data('golfersu_userstep_video',array('user_id' => $this->session->userdata('user_id'),'step' => $_POST['step_id']),array('internal_share' => 1));
             echo json_encode(array('status' => true,'message' => 'Shared Successfully.'));
        }
        else{
            echo json_encode(array('status' => false,'message' => 'There is an error. Please try again.'));
        }
	}


    

    
    




}
