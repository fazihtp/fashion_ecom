<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
   public function __construct() {

    parent::__construct();
	
     $this->load->helper(array('form','url'));
     $this->load->library(array('upload','encryption'));
     $this->load->model('HomeModel');
}

	public function logout(){
		 $this->session->sess_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function index()
	{
        $data['product'] = $this->HomeModel->getproducts();
	     $data['new_product'] = $this->HomeModel->newproducts();
         $data['banner'] = $this->HomeModel->getBanner();
        //  $data['category'] = $this->HomeModel->getcategory();
	    $data['categories']= $this->HomeModel->getCategoriesList();
		$this->load->view('home_pages/index',$data);
	}
	
	public function category()
	{
        $cat_id = $this->input->post('id');
	    $data['product'] = $this->HomeModel->getProductsByid($cat_id);
	//    print_r($data['product']);die;
		$this->load->view('home_pages/product_view_ajax',$data);
	}
		
	public function search()
	{ 
	    $product_name = $this->input->get('search');
	    if($product_name == ""){
	        redirect(base_url().'home/index');
	    }else{
	     if($this->session->userdata('user_id')) 
	    {
      $user_id = $this->session->userdata('user_id');
      
	    }
	    
	    $data['product'] = $this->HomeModel->getsearch($product_name);
        // print_r($data['product'] );die;
	    $data['counts'] = $this->HomeModel->getcounts($product_name);
	    $this->load->view('search/search_product',$data);
	    }
	}
	public function about_us()
	{
	    $data['categories']= get_categories();
        $this->load->view('home_pages/about_us',$data);
	}
	public function contact_us()
	{
	    $data['categories']= get_categories();
		$this->load->view('home_pages/contact_us',$data);
	}
	public function enquiry_template()
	{
	    
		$this->load->view('home_pages/enquiry_template',$data);
	}
 

    	public function sendMail()
    {
    $this->load->library('email');
    
    $details['user_name'] = $this->input->post('firstname') . ' ' . $this->input->post('lastname');
    $details['user_email'] = $this->input->post('email');
    $details['user_phone'] = $this->input->post('phonenumber');
    $details['user_subject'] = $this->input->post('address');
    $details['enquiry_mail'] = $this->input->post('enquiry_mail');
    $to = "fazih.login2@gmail.com";

    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.zoho.com',
        'smtp_port' => 465,
        'smtp_user' => 'info@login2.co.in',
        'smtp_pass' => 'Teamlogin2@#',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
    );

  
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $subject = 'ENQUIRY';
    $message = $this->load->view('home_pages/enquiry_template',$details, true);
    $from = "info@login2.co.in";
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    $mail = $this->email->send();
        if($mail){
			$this->session->set_flashdata('flashSuccess','We will contact you soon!');
			redirect(base_url().'home/index');
        }else{
                 show_error($this->email->print_debugger());

	//	$this->session->set_flashdata('flashError','Something went wrong!');
			redirect(base_url().'home/index');
		}
    }
    
    


    public function subscription_plan($optionalParam = NULL) {
        if ($optionalParam !== NULL) {
            $user=base64_decode($optionalParam);
           $data['categories']= get_categories();
           $data['member_id']= $user;
        //   print_r($data['member_id']);die;
		   $this->load->view('home/subscription_plan',$data);
		  
        } else {
             
            $data['categories']= get_categories();
            $data['member_id']= "";
		    $this->load->view('home/subscription_plan',$data);
        }
    }
	public function sign_up()
	{
	    $data['categories']= get_categories();
        $data['districts'] = $this->db->get('tbl_districts')->result();
       
		$this->load->view('home/sign_up',$data);
	}
		public function log_in()
	{
	    $data['categories']= get_categories();
		$this->load->view('home/log_in',$data);
	}


    public function register(){
        $data_array=$_POST;
        // print_r($_POST);die;
        $phoneNumber= $this->input->post('phonenumber');
        $check_user=$this->HomeModel->isPhoneNumberexists($phoneNumber);
        if($check_user){

            $this->session->set_flashdata('flashPhone', '');
            redirect($_SERVER['HTTP_REFERER']);
            
        }else{
            $post_user=$this->HomeModel->postUser($data_array);
            $this->session->set_userdata('role_id', 2);
			$this->session->set_userdata('user_id', $post_user->id);
			$this->session->set_userdata('signed_in', TRUE);
            $this->session->set_flashdata('flashSuccess','Registration Success!');
			redirect(base_url() .'User/dashboard');
        }
    }



	   public function checkUser()
        {
        $url = base_url() . "MobileApi/register";
        $data = $_POST;
        // print_r($data);die;
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
       
      if ($response) {
          
          $character = json_decode($response, true); 
          //print_r($character    );die;
              if($character['status'] == true)
              {
                foreach ($character['data'] as $key => $val ) {
                  
                  if($key == "token") {
                      $token=$val;
                      $this->session->set_userdata('token', $token);
                  }
                  if($key == "user_name")
                  {
                    $name=$val;
                    $this->session->set_userdata('user', $name);
                  }
                   if($key == "user_id")
                  {
                    $user=$val;
                    $this->session->set_userdata('user_id', $user);
                  }
              } 
                    $id=base64_encode($user);
                     redirect('Home/subscription_plan/' . $id);
              }
              else
              {
                  $this->session->set_flashdata('flashError','Username or Password incorrrect!');
				  redirect('Home');
              }
         }
}
	   public function checkLoginUser()
        {
        $url = base_url() . "MobileApi/checkLoginUser";
        $data = $_POST;
        // print_r($data);die;
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        // print_r($response);die;
       
      if ($response) {
          
          $character = json_decode($response, true); 
              if($character['status'] == true)
              {
                foreach ($character['data'] as $key => $val ) {
                  
                  if($key == "token") {
                      $token=$val;
                      $this->session->set_userdata('token', $token);
                  }
                  if($key == "user_name")
                  {
                    $name=$val;
                    $this->session->set_userdata('user', $name);
                  }
                   if($key == "user_id")
                  {
                    $user_id=$val;
                    $this->session->set_userdata('user_id', $user_id);
                  }
					if($key == "role_id")
					{
						$role_id=$val;
						$this->session->set_userdata('role_id', $role_id);
					}
              } 
                    $this->session->set_flashdata('flashSuccess','Login Success!');
                    
                    redirect('User/dashboard');
              }
              else
              {
                  $this->session->set_flashdata('flashError','Something went wrong!');
				  redirect('Home/log_in');
              }
         }
}
    
    

     public function apiRequest($url,$data){
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return $response;
   }
 
    public function postPlan(){
        // print_r($_POST);die;
        $plan_id = $this->input->post('plan_id');
        $member_id = $this->input->post('member_id');
        $futureDate = date('Y-m-d', strtotime('+1 year'));
                $array_plan = array(
            'member_id'       => $member_id,
            'subscription_id' => $plan_id,
            'starting_date'   => date('Y-m-d'),
            'ending_date'     => $futureDate,
            );
        $data=$this->HomeModel->postPlan($array_plan);
        if($data > 0){
            $this->session->set_flashdata('flashSuccess','We Will Contact You Soon');
        }else {
            $this->session->set_flashdata('flashError','No Data Found!');
        }
         redirect('Home');
    }
    
    public function view_policy(){
        $this->load->view('home_pages/privacy_policy');
        
        
    }
    
    public function view_termsConsition(){
        $this->load->view('home_pages/terms$condition');
    }
  
}
