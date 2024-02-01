<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {

   public function __construct() {

    parent::__construct();
	$this->load->model('CartModel');
    $this->load->helper(array('form','url'));
    $this->load->library(array('upload','encryption','form_validation'));
     	if(!$this->session->userdata('user_id')){
            redirect(base_url() . 'Home/log_in');
        } 
}

 public function index(){
     $this->load->model('CategoryModel');
     if ($this->session->userdata('user_id')) {
      $user_id = $this->session->userdata('user_id');
      $data['cart']    =$this->CartModel->getCartProducts($user_id);
    //   print_r($this->db->last_query());die;
      $data['user']    =$this->CategoryModel->getMember($user_id);
      $data['position']    =$this->CategoryModel->getMemberStatus($user_id);
      $this->load->view('cart/view_cart',$data);
      } else {
      $this->session->set_flashdata('flashError','Login required to view cart!');
	  redirect(base_url('Home/log_in'));
     }
 }
 public function postCart(){  
     $this->load->model('CategoryModel');
    $user_id = $this->session->userdata('user_id');
    if($user_id==""){
       redirect(base_url().'Home');
    }else{
    $id = $this->input->post('id');
    $data3['quantity'] = $_GET;
    $cart=$this->CartModel->getCartProducts($user_id);
    $payingAmount=0;
    foreach ($cart as $rec){		
		$variant = getCartStockProducts($rec->product_id);
		$stock = $variant->quantity;
		if($variant) {
            $stock = $variant->quantity;
            if ($rec->quantity <= $stock) {
                $payingAmount=$payingAmount+$rec->price*$rec->quantity;
            }
        }
        
    }
    if($payingAmount == 0){
        redirect(base_url() . 'cart/index');
    }else{
        $data3['paying_amount']=$payingAmount;
        $data3['cartqtybutton']=$this->CartModel->getCartQuantity($user_id);
        $user_id = $this->session->userdata('user_id');
        // $data3['cart']    =$this->CartModel->getCartStockProducts($user_id);
        $this->load->model('CategoryModel');
    	$data3['old_address']=$this->CartModel->getOldAddress($user_id);
        $data3['shipping'] = $this->CartModel->getShippingMethods();
        $data3['states'] = $this->CartModel->getStates();
        // $data3['order_id'] = $this->db->select('id')->from('tbl_orders')->where('user_id',$user_id)->get()->row()->id;
        // $data3['to_addres'] = $this->db->where('user_id',$user_id)->get('tbl_order_address')->result();
        $this->load->view('checkout/checkout_view',$data3);
        
    }
    
    }
}

public function shippingMethods()
{
     $state = $this->input->post('state');
     $qty = $this->input->post('qty');
     $amount = $this->input->post('amount');
     $id = $this->input->post('id');
     $result = $this->CartModel->getShippingDetails($id);
     $base_price = $result->base_price;
     $per_item_price = $result->per_item_price;
     $other_state_amount = $result->other_state_amount;
     $Other_State_item_price = $result->Other_State_item_price;
     if($state == 18 ){
         if($qty == 1){
             $total['amount']                = $amount + $base_price;
         }else{
         $total['amount']                = $amount + $base_price + (($qty-1) * $per_item_price);
         }
         $total['shipping_charge'] = $base_price + (($qty-1) * $per_item_price);
     }
     else
     {
         if($qty==1){
              $total['amount']                = $amount + $base_price;
         }else{
             $total['amount']         = $amount + $other_state_amount + (($qty-1) * $Other_State_item_price);
         }
         $total['shipping_charge']  = $other_state_amount +  (($qty-1)*$Other_State_item_price) ;
     }
     echo json_encode($total);
}

 function addToCart(){
    $data=$_POST;
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    if ($this->session->userdata('user_id') && $this->session->userdata('role_id') == 2) {
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('flashError','Field required!');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
        $user_id = $this->session->userdata('user_id');
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');
        $this->db->select('quantity');
        $this->db->from('tbl_products');
        $this->db->where('id', $product_id);
        $query = $this->db->get();
        $result = $query->row();
        $inStock = $result->quantity ;
        
         if($quantity > $inStock){
          
              $this->session->set_flashdata('flashQuantity', 'Sorry ! Selected Quantity is Out of Stock');
               redirect($_SERVER['HTTP_REFERER']);
         }else{
              $result     =$this->CartModel->addToCart($user_id,$data);
            if($result){
                $this->session->set_flashdata('flashSuccess', 'Cart Added successfully');
            }else{
                $this->session->set_flashdata('flashError','Something Went Wrong!');
            }
            redirect($_SERVER['HTTP_REFERER']);
         }
          }
        
    }else{
        $this->session->set_flashdata('flashError','Login required to add products to cart!');
		redirect($_SERVER['HTTP_REFERER']);
    }
 }
 	   public function delete_cart(){
        $id = $this->input->post('id');
        $data = array(
            'status'=>'Deactive',
         
            );
	    $status = $this->CartModel->deleteCart($id,$data);
		if($status){
			 $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
			
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     $this->load->view('cart/view_cart');
        }

public function updateCartQty() {
    if ($this->input->is_ajax_request()) {
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        // Fetch product_id from the cart using $id
        $cartItem = $this->CartModel->getCartItemById($id);
        if ($cartItem) {
            $product_id = $cartItem->product_id;
            $response = $this->CartModel->checkAndUpdateCartQty($id, $product_id, $value);
            echo $response;
        } else {
            echo 'Error: Cart item not found';
        }
    }
}

	
	public function deleteFromCart()
	{
	     $id = $this->input->post('id');
	     $data = array('status' =>'Deactive');
	      $result = $this->CartModel->deleteFromCart($id,$data);
	      if($result)
	      {
	           $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
			
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     
       	redirect(base_url().'Cart');
	      
	}
 public function getColoursBySizeAndProductId(){
     if ($this->input->is_ajax_request()) {
			 $product_id=$this->input->post('product_id');
            $size_id=$this->input->post('size_id');
			$product_colours = $this->Cartmodel->getColoursBySizeAndProductId($product_id,$size_id);
// 			print_r($product_colours);die;
            if ($product_colours) {
				$response = array('success' => true, 'product_details' => $product_colours);
			} else {
				$response = array('success' => false, 'message' => 'Product not found.');
			}
			echo json_encode($response);
		}
    }	

}
