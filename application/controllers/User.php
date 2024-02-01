<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct() {

    parent::__construct();
	
     $this->load->helper(array('form','url'));
     $this->load->library(array('upload','encryption'));
           	if(!$this->session->userdata('token'))
        {
            redirect(base_url() . 'Home/log_in');
        } 
}

	public function index1()
	{
	   
	   // print_r($this->session->userdata('token'));die;
		$this->load->view('user/user_dashboard');
	}
    public function dashboard(){
        $this->load->model('CartModel');
        $url = base_url() . "MobileApi/getClientDetailsById";
        $data['token'] = $this->session->userdata('token');
        $user_id = $this->session->userdata('user_id');
        // print_r( $data['token']);die;
        $response = $this->apiRequest($url,$data);
      if ($response) {
          $character = json_decode($response, true); 
        //   print_r($character);die;
              if($character['status'] == true)
              {
                $data_array['records']=$character['data'];
                $this->load->model('HomeModel');   
                $data_array['districts'] = $this->db->get('tbl_districts')->result();
                $data_array['plans']     =$this->CartModel->getPlanOrder($user_id);
                $data_array['amount']     =$this->CartModel->getTotalAmount($user_id);
                //   print_r( $data_array['position'] );die;
                // $data_array['plan']     =$this->db->get('tbl_master_plan')->result();
                 
                //   $this->db->where('your_column', 'your_value');
                  $data_array['count'] = $this->CartModel->getcountProducts($user_id);
                //   $data_array['count'] = $count;
                //  print_r( $data_array['count'] );die;
                $query = $this->db->query("SELECT user_id, SUM(total_amount) AS total_amount
                              FROM tbl_orders WHERE order_status != 'Failed' AND payment_status='PAID' AND is_deleted='N'
                              GROUP BY user_id
                              ORDER BY total_amount DESC");

    $rank = 0;
    foreach ($query->result_array() as $row) {
        $rank++;
        if ($row['user_id'] === $user_id) {
            // Found the user's rank
            break;
        }
    }

    // Pass the rank value to the view
    $data_array['user_rank'] = $rank;
    // print_r( $data['user_rank']);die;
                $this->load->view('user/user_dashboard',$data_array);
              }
              else
              {
                  $this->session->set_flashdata('flashError','No Data Found!');
				  redirect('Home/log_in');
              }
         }
  }
  public function updateMemberDetails(){
    $url = base_url() . "MobileApi/updateMemberDetails";
    $data= $_POST;
    $response = $this->apiRequest($url,$data);
    
    // print_r($response);die;
     if ($response) {
      $character = json_decode($response, true); 
          if($character['status'] == true)
          {
            $this->session->set_flashdata('flashSuccess','Data Updated!');
            redirect('User/dashboard');
          }
          else
          {
              $this->session->set_flashdata('flashError','No Data Found!');
              redirect('User/dashboard');
          }
     }

}
  //   Start Code (Common Function) Donot change this
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
   

    public function view_myorder(){
       	$this->load->model('CartModel');
       
        if ($this->session->userdata('user_id')) {
      
      $user_id = $this->session->userdata('user_id');
      $data['orders']    =$this->CartModel->getUserOrders($user_id);
    //   print_r($data['orders']);die;
    //   $data['orders']    =$this->CartModel->getorderProducts($user_id);
    //   print_r($this->db->last_query());die;
	  
     $this->load->view('user/my_orders',$data);
     } else {
         
       	$this->session->set_flashdata('flashError','Login required to view cart!');
		   redirect(base_url('Home/log_in'));
     }
       
   }
      public function my_order($order_id){
          $order=base64_decode($order_id);
        //   echo $order; die;
       	$this->load->model('CartModel');
        if ($this->session->userdata('user_id')) {
      
      $user_id = $this->session->userdata('user_id');
    //   $data['orders']    =$this->CartModel->getorderProducts($order_id);
    
    $data['product_list']=$this->CartModel->getUserProductList($order);
      $data['order_list']=$this->CartModel->getUserDetails($order);
        //   print_r($data['product_list']);die;
	  
     $this->load->view('user/my_order_products',$data);
     } else {
         
       	$this->session->set_flashdata('flashError','Login required to view cart!');
		   redirect(base_url('Home/log_in'));
     }
       
   }
}
