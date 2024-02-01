<?php if (!defined('BASEPATH'))

    exit('No direct script access allowed');

    // require APPPATH . '/libraries/CreatorJwt.php';
class MobileApi extends CI_Controller

{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array('CreatorJwt','JWT'));
         $this->load->helper(array('form','url'));
        $this->load->model('MobileApiModel');
        $this->objOfJwt = new CreatorJwt();//Genarate tocken
        // ini_set('display_errors', 1);
        
        date_default_timezone_set("Asia/Kolkata");

    }
    public function register(){
        $data_array=$_POST;
        // print_r($_POST);die;
        $phoneNumber= $this->input->post('phonenumber');
        $check_user=$this->MobileApiModel->isPhoneNumberexists($phoneNumber);
        if($check_user){
            $this->response(array('message'=>'Phone number already exists','data'=>[],'status'=>false));
        }else{
            $post_user=$this->MobileApiModel->postUser($data_array);
            if($post_user){
                $user=$this->MobileApiModel->checkUser($post_user);
                if(!empty($user)){
        			$tokenId    = base64_encode(random_bytes(16));
        			$issuedAt   = new DateTimeImmutable();
        // 			$expire     = $issuedAt->modify('+10000000 minutes')->getTimestamp();
                    //  $expire = null;
                     $expire = "";
        			$serverName = "https://hakcollections.com/";
        			$user_id   	= $user->user_id;
        			$user_name  = $user->member_name;
        			$token =[
        			'iat'  => $issuedAt->getTimestamp(),    
        			'jti'  => $tokenId, 
        			'iss'  => $serverName,                  
        			'nbf'  => $issuedAt->getTimestamp(),
        			'exp'  => $expire,
        			'data' =>[
        				'user_id'  => $user_id,
        				'user_name'  => $user_name,
        			]];
        			$objOfJwt = new CreatorJwt();
        			$jwtToken = $objOfJwt->GenerateToken($token);
        			$tkn['token'] 		= $jwtToken;
        			$tkn['user_name']=$user_name;
        			$tkn['user_id']=$user_id;
        			$data['status'] = true;
        			$data['message'] = 'Login Successful.';
        			$data['data'] = $tkn;
        		}else{
        		    $tkn['token'] 			= "";
        		    $tkn['user_name'] 		= "";
        		    $tkn['user_id']         = "";
                	$data['status'] = false;
        			$data['message'] = 'Invalid Username or Password!';
        			$data['data'] = $tkn;
        		}
        		$this->response($data);
               }else{
                $this->response(array('message'=>'Something Went Wrong!!','data'=>[],'status'=>false));
            }
        }
    }

	public function login($post_user)
    {
		$user=$this->MobileApiModel->checkUser($post_user);
		if(!empty($user)){
			$tokenId    = base64_encode(random_bytes(16));
			$issuedAt   = new DateTimeImmutable();
			$expire     = $issuedAt->modify('+10000000 minutes')->getTimestamp();
			$serverName = "https://hakcollections.com/";
			$user_id   	= $user->user_id;
			$user_name  = $user->member_name;
			$token =[
			'iat'  => $issuedAt->getTimestamp(),    
			'jti'  => $tokenId, 
			'iss'  => $serverName,                  
			'nbf'  => $issuedAt->getTimestamp(),
			'exp'  => $expire,
			'data' =>[
				'user_id'  => $user_id,
				'user_name'  => $user_name,
			]
			];
			$objOfJwt = new CreatorJwt();
			$jwtToken = $objOfJwt->GenerateToken($token);
				
			//print_r($this->db->last_query());die;
				$tkn['token'] 		= $jwtToken;
				$tkn['user_name']=$user_name;
				$data['status'] = true;
				$data['message'] = 'Login Successful.';
				$data['data'] = $tkn;
		}else{
		    $tkn['token'] 			= "";
		    $tkn['user_name'] 		= "";
        	$data['status'] = false;
			$data['message'] = 'Invalid Username or Password!';                                                                                                                                                                                                                                                                                                         
			$data['data'] = $tkn;
		}
		
		$this->response($data);
	}
	public function checkLoginUser(){
	    $result=$_POST;
	   	$user=$this->MobileApiModel->checkLoginUser($result);
	   
		// print_r($this->db->last_query());die;
		if(!empty($user)){
			$tokenId    = base64_encode(random_bytes(16));
			$issuedAt   = new DateTimeImmutable();
			$expire     = $issuedAt->modify('+10000000 minutes')->getTimestamp();
			$serverName = "https://localhost/fashion_store/";
			$user_id   	= $user->user_id;
			$user_name  = $user->member_name;
			$role_id     = $user->role_id;
			$token =[
			'iat'  => $issuedAt->getTimestamp(),    
			'jti'  => $tokenId, 
			'iss'  => $serverName,                  
			'nbf'  => $issuedAt->getTimestamp(),
			'exp'  => $expire,
			'data' =>[
				'user_id'  => $user_id,
				'user_name'  => $user_name,
				'role_id'  => $role_id,
			]
			];
			$objOfJwt = new CreatorJwt();
			$jwtToken = $objOfJwt->GenerateToken($token);
				
			//print_r($this->db->last_query());die;
				$tkn['token'] 		= $jwtToken;
				$tkn['user_name']   =$user_name;
				$tkn['user_id']     =$user_id;
			    $tkn['role_id']     =$role_id;
				$data['status']     = true;
				$data['message']    = 'Login Successful.';
				$data['data']       = $tkn;
		}else{
		    $tkn['token'] 			= "";
		    $tkn['user_name'] 		= "";
		    $tkn['user_id']         ="";
			$tkn['role_id']         ="";
        	$data['status']         = false;
			$data['message']        = 'Invalid Username or Password!';
			$data['data']           = $tkn;
		}
		
		$this->response($data);
	}
    function getClientDetailsById(){
        $token = $this->input->post('token');
        $objOfJwt = new CreatorJwt();
        $jwtData = $objOfJwt->DecodeToken($token);
         if($jwtData=='invalid')
        {
            $message = "invalid token";
            $status = false;
            $data['data'] = NULL;
        }
        else
        {
            $user_data=$jwtData['data'];
            $user_id=$user_data->user_id;
            $clientDetailsbyId   =   $this->MobileApiModel->getclientDetailsbyId($user_id);
            if($clientDetailsbyId){
                $data['status']     = true;
                $data['message']    = "Data Found";
                $data['data']       = $clientDetailsbyId;
            }else{
                $data['status']     = false;
                $data['message']    = "No Data Found";
                $data['data']       = false;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function updateMemberDetails()
    {
		$result=$_POST;
       	$token=$this->input->post('token');
        // print_r($token);die;
        $objOfJwt = new CreatorJwt();
        $jwtData = $objOfJwt->DecodeToken($token);
        if($jwtData=='invalid'){
            $data['status'] = false;
            $data['message'] = 'Invalid token';
            $data['data'] = false;
        }else{
            $user_data=$jwtData['data'];
            $user_id=$user_data->user_id;
            $res_array=$this->MobileApiModel->updateMemberDetails($result);
            if($res_array){
                $data['status'] = true;
                $data['message'] = 'Details updated.';
                $data['data'] = true;
            }else{
                $data['status'] = false;
                $data['message'] = 'Something went wrong. Try again later!';
                $data['data'] = false;
            }

        }
        $this->response($data);
    }
     public function OfferProductCategory(){
            $data2['category']            =             $this->MobileApiModel->OfferProductCategory();
            
        if($data2){
            $data['status'] =            true;
            $data['message']=             '';
            $data['data']     =            $data2;    
            }else{
            $data['status'] =            false;
            $data['message']=             'No Data Found';
            $data['data']     =            $data2;
            }
        
      $this->response($data);    
    }
 public function getOfferProducts(){
            $id=$this->input->post('category_id');
            $data2['products']            =             $this->MobileApiModel->getOfferProducts($id);
            // print_r($data2['products']);die;
        if($data2){
            $data['status'] =            true;
            $data['message']=             '';
            $data['data']     =            $data2;    
            }else{
            $data['status'] =            false;
            $data['message']=             'No Data Found';
            $data['data']     =            $data2;
            }
        
      $this->response($data);    
    }
      public function response($result){
            header('Content-Type: application/json');
            echo json_encode($result);
        }
}
