<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout extends CI_Controller {

   public function __construct() {

    parent::__construct();
	$this->load->model('CheckoutModel');
    $this->load->helper(array('form','url'));
    $this->load->library(array('upload','encryption'));
      date_default_timezone_set('Asia/Kolkata');
    	if(!$this->session->userdata('user_id'))
        {
            redirect(base_url() . 'Home/log_in');
        } 
}
    public function index(){
       $data['districts'] = $this->db->get('tbl_districts')->result();
       $this->load->view('checkout/checkout_view',$data);
    }

    public function postCheckout(){
         $this->db->trans_start();
         $this->db->trans_strict(false);
    
        $user_id = $this->session->userdata('user_id');
        $total_amount=$this->input->post('total_values');
        if (empty($total_amount)) {
            $this->session->set_flashdata('flashError','oops! something went wrong.');
            redirect(base_url().'cart/index');
        } else {
            
            if($this->session->userdata('user_id')){
                $order_id=$this->CheckoutModel->postOrder($user_id,$total_amount);
                $order_products = array(); 
                $this->load->model('CategoryModel');
                $this->load->model('CartModel');
               
                $cart   =$this->CartModel->getCartStockProducts($user_id);
                $position    =$this->CategoryModel->getMemberStatus($user_id);
                 foreach ($cart as $rec){
                    
                    $order_products[] = array(
                        'order_id'   =>$order_id,
                        'product_id' => $rec->product_id,
                        'quantity' => $rec->quantity,
                        'price' => $rec->price,
                        'total_price' => $rec->price * $rec->quantity,
                        'created_at'    =>date('Y-m-d H:i:s'),
                        'modified_at'    =>date('Y-m-d H:i:s')
                    );
                }
                $res= $this->CheckoutModel->insertOrderProducts($order_products);
                // print_r($this->db->last_query());die;
                $addr=$this->CheckoutModel->insertOrderAddress($user_id,$order_id);

                $ordered_products   =$this->CartModel->getProductsByOrderId($order_id);
                foreach ($ordered_products as $ordered_product) {
                    $product_id = $ordered_product->product_id;
                    $quantity = $ordered_product->quantity;
                    $updateStocl=$this->CartModel->updateProductStock($product_id, $quantity);
                    $cartUpdate=$this->CartModel->markCartItemsAsBought($product_id);
                    $update_status=$this->CheckoutModel->updateOrderStatusNew($order_id,$total_amount);
                }
                $this->db->trans_complete();
                    $this->db->trans_status();
                if($addr > 0){
                    $this->session->set_flashdata('flashSuccess', 'Order Placed');
                    redirect(base_url().'Home/index');
                }else{
                    $this->session->set_flashdata('flashError','Login required to add products to cart!');
                    redirect(base_url()); 
                }
            }else{
                $this->session->set_flashdata('flashError','Please Try Again !');
                redirect(base_url()); 
            }
        }
    }

}