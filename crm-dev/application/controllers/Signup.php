<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		$this->load->helper('cookie');
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
		
		// if($this->session->userdata('user_id')){
		// 	redirect('challenge');
		// }
		// get cookie

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
			//$this->load->view('site/login/login');
			$allData['users'] = $this->Common_model->numrowsDbQuery("SELECT * FROM `golfersu_user`");
            $allData['countries'] = $this->Common_model->getAllDataOrder('golfersu_signup_countries', array(),'country_name','ASC');
            $data['content'] = $this->load->view('site/signup/signup',$allData, true);
			$this->load->view('template/site/front-main',$data);
		}
		
	}
	
	public function thank_you()
	{	

		$this->load->view('site/thank-you');
	}

	public function logout()
	{	

		$this->session->sess_destroy();
		redirect("login");
	}

	public function handlePayment()
    {
		//$this->session->sess_destroy();
        require_once('application/libraries/stripe-php/init.php');
		//print_r($_POST);
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

			$users = $this->Common_model->numrowsDbQuery("SELECT * FROM `golfersu_user`");
           
		   

			if($this->input->post('applied_discount') != ''){
				$promoDetails =  $this->Common_model->getSingle('golfersu_promo_codes',array('id' => $this->input->post('applied_discount')));



				
				if(!empty($promoDetails)){

					// if($users > 100){
	    //             	$amountTotal = class_amount - ((class_amount * $promoDetails->discount_percentage ) / 100);
		   //          }
		   //          else{
		   //              $amountTotal = class_amount_100 - ((class_amount_100 * $promoDetails->discount_percentage ) / 100);
		   //          }


					$amountTotal = class_amount - ((class_amount * $promoDetails->discount_percentage ) / 100);

					//$amount = $amountTotal - (($amountTotal * $promoDetails->discount_percentage ) / 100);

				}
				else{
					// if($users > 100){
	    //             	$amountTotal = class_amount;
		   //          }
		   //          else{
		   //              $amountTotal = class_amount_100;
		   //          }

					$amountTotal = class_amount;

				}
				
			}
			else{
				//$amount = $amountTotal;

				// if($users > 100){
	   //              	$amountTotal = class_amount;
	   //          }
	   //          else{
	   //              $amountTotal = class_amount_100;
	   //          }

				$amountTotal = class_amount;
				
			}
            

            


			// Set API key 
    
     
    // Add customer to stripe 
    $customer = \Stripe\Customer::create(array( 
        'email' => $this->input->post('email'), 
        'source'  => $this->input->post('stripeToken') 
    )); 
     
    // Convert price to cents 
    $priceCents = round($amountTotal*100); 
     
    // Create a plan 
    try { 
        $plan = \Stripe\Plan::create(array( 
            "product" => [ 
                "name" => '21 Days Challenge' 
            ], 
            "amount" => $priceCents, 
            "currency" => 'usd', 
            "interval" => 'year', 
            "interval_count" => 1 
        )); 
    }catch(Exception $e) { 
       $api_error = $e->getMessage(); 
    } 
     //echo "======================";
    if(empty($api_error) && $plan){ 
        // Creates a new subscription 
        try { 
            $subscription = \Stripe\Subscription::create(array( 
                "customer" => $customer->id, 
                "items" => array( 
                    array( 
                        "plan" => $plan->id, 
                    ), 
                ), 
            )); 
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        } 
        // print_r($api_error );die();
        if(empty($api_error) && $subscription){ 
            // Retrieve subscription data 
            $subsData = $subscription->jsonSerialize(); 
			//echo "<pre>";
			//print_r($subsData);die();
            // Check whether the subscription activation is successful 
            if($subsData['status'] == 'active'){ 
                // Subscription info 
                $subscrID = $subsData['id']; 
                $custID = $subsData['customer']; 
                $planID = $subsData['plan']['id']; 
                $planAmount = ($subsData['plan']['amount']/100); 
                $planCurrency = $subsData['plan']['currency']; 
                $planinterval = $subsData['plan']['interval']; 
                $planIntervalCount = $subsData['plan']['interval_count']; 
                $created = date("Y-m-d H:i:s", $subsData['created']); 
                $current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']); 
                $current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']); 
                $status = $subsData['status']; 
                     
                                 
                $ordStatus = 'success'; 
                $statusMsg = 'Your Subscription Payment has been Successful!'; 
				$this->session->set_flashdata('success', $statusMsg);

				$statusMsg = 'Your Payment has been Successful!'; 

						$userData = array(
						'username' => $this->input->post('user_name'),
						'user_email' => $this->input->post('email'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'password' => md5($this->input->post('password')),
						'name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
						'country_id' => $this->input->post('country'),
						'status' => 'Y',
						'street_address' => $this->input->post('street_address'),
						'street_address1' => $this->input->post('street_address1'),
						'city' => $this->input->post('city'),
						//'video_file' => $this->input->post('stripeToken'),
						'post_code' => $this->input->post('post_code'),
						'phone' => $this->input->post('phone'),
					);
					$this->Common_model->insertData('golfersu_user',$userData);
					$insert_id = $this->db->insert_id();

					if($this->input->post('applied_discount') != ''){

						$this->Common_model->insertData('golfersu_promo_code_used',array('user_id' => $insert_id,'promo_id' => $this->input->post('applied_discount')));
					}
					//  echo "<pre>";
					// print_r($chargeJson);

					$paymentData = array(
						'user_id' => $insert_id,
						'item_price_currency' => $planCurrency,
						'paid_amount' => $planAmount,
						'paid_amount_currency' => $planCurrency,
						'txn_id' => $subscrID,
						'stripe_subscription_id' => $subscrID,
						'stripe_customer_id' => $custID,
						'stripe_plan_id' => $planID,
						'plan_amount_currency' => $planCurrency,
						'plan_interval' => $planinterval,
						'plan_interval_count' => $planIntervalCount,
						'payer_email' => $this->input->post('email'),
						'plan_period_start' => $current_period_start,
						'plan_period_end' => $current_period_end,
						'payment_status' => $status,
						'status' => $status,

						
					);
					$this->Common_model->insertData('golfersu_user_payments',$paymentData);


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


					$userDataEmail = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'password' => $this->input->post('password'),
						'user_email' => $this->input->post('email'),
					);


					$from_email = "golfersu2023@gmail.com";
					$to_email_client = $this->input->post('email');
					$message_client = $this->load->view('registration-email.php',$userDataEmail,TRUE);
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					$this->email->from($from_email,'golfersu');
					$this->email->to($this->input->post('email'));
					$this->email->subject('Registration');
					$this->email->message($message_client);
					$this->email->set_mailtype("html");
					//$this->email->message('Vetnexus class.');
					$this->email->send();



					$this->session->set_flashdata('success', $statusMsg);
					
					$newdata = array(
							'user_id'  => $insert_id,
							'id'     => $insert_id,
							'role' => $this->input->post('email'),
							'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);

					$cookie = array(
						'name'   => 'payment_success',
						'value'  => 'yes',
						'expire' => time()+86500,
						);
					$this->input->set_cookie($cookie);

					redirect('signup');



            }else{ 
                $statusMsg = "Subscription activation failed!"; 
				$this->session->set_flashdata('error', $statusMsg);
					redirect('signup');
            } 
        }else{ 
            $statusMsg = "Subscription creation failed! ".$api_error; 
			$this->session->set_flashdata('error', $statusMsg);
				redirect('signup');
        } 
    }else{ 
       $statusMsg = "Plan creation failed! ".$api_error; 
	   $this->session->set_flashdata('error', $statusMsg);
				redirect('signup');
    } 


	
    }

    public function sendTestmail(){


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


						$userDataEmail = array(
						'first_name' => 'ddddddddd',
						'last_name' =>'ddddddddd',
						'password' => 'ddddddddd',
						'user_email' => 'ddddddddd',
					);


					$from_email = "golfersu2023@gmail.com";
					$to_email_client = 'avijit.micronixsystem@gmail.com';
					$message_client = $this->load->view('test-email.php',$userDataEmail,TRUE); 
					//$message_client = $this->load->view('registration-email.php',$userDataEmail,TRUE);
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					$this->email->from($from_email,'testdev');
					$this->email->to($to_email_client);
					$this->email->subject('Registration');
					$this->email->message($message_client);
					$this->email->set_mailtype("html");
					//$this->email->message('Vetnexus class.');
					$this->email->send();

    }





}
