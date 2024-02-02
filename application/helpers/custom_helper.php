<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . "./third_party/vendor/autoload.php";
function get_categories()
{
    $ci =& get_instance();
    $ci->load->database();

    $ci->db->where('status', 'Active');
    $ci->db->where('category_status !=', 'OFFERS');
    $ci->db->where('is_deleted', 'N');
    $query = $ci->db->get('tbl_categories');
     return $query->result();
}
function getCartStockProducts($product_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('id',$product_id);
	$query = $ci->db->get('tbl_products');
	return $result = $query->row();
}
function get_offer_categories()
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('tbl_categories t1');
    $ci->db->join('tbl_sub_categories t2', 't2.category_id = t1.id');
    $ci->db->join('tbl_offerzone_categories t3', 't3.sub_category_id = t2.id');
    $ci->db->where('t1.category_status', 'OFFERS');
    $ci->db->where('t1.status', 'Active');
    $ci->db->where('t1.is_deleted', 'N');
    $query = $ci->db->get();
    return $query->result_array();
    
}
function get_sub_categories($category_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->where('status', 'Active');
    $ci->db->where('is_deleted', 'N');
    $ci->db->where('category_id', $category_id);
    $query = $ci->db->get('tbl_sub_categories');
     return $query->result();
}
function get_available_colours($product_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('t1.*, t2.colour_code');
    $ci->db->from('tbl_products_colors t1');
    $ci->db->join('tbl_colours t2', 't2.id = t1.available_colors');
    $ci->db->where('t1.product_id', $product_id);
    $query =$ci->db->get();
     return $query->result();
}
function get_offer_zone_colours($product_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('t1.*, t2.colour_code');
    $ci->db->from('tbl_offer_colors t1');
    $ci->db->join('tbl_colours t2', 't2.id = t1.available_colors');
    $ci->db->where('t1.product_id', $product_id);
    $query =$ci->db->get();
     return $query->result();
}
function get_available_sizes($product_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('t1.*, t2.size');
    $ci->db->from('tbl_products_size t1');
    $ci->db->join('tbl_size t2', 't2.id = t1.available_size');
    $ci->db->where('t1.product_id', $product_id);
    $query =$ci->db->get();
  //  print_r($query);die;
    return $query->result();
}
function get_offerzone_sizes($product_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('t1.*, t2.size,t2.id as sizeid');
    $ci->db->from('tbl_offerzone_products_size t1');
    $ci->db->join('tbl_size t2', 't2.id = t1.available_size');
    $ci->db->where('t1.product_id', $product_id);
    $query =$ci->db->get();
  //  print_r($query);die;
    return $query->result();
}
function getCartCount($user_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->where('status', 'Active');
    $ci->db->where('is_buyed', 'N');
    $ci->db->where('user_id', $user_id);
    $ci->db->from('tbl_cart');
    return $ci->db->count_all_results();
}
 function getsize(){
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->where('status',1);
        $result = $ci->db->get('tbl_size')->result_array();
        return $result;
    }
 function getColours(){
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->where('status',1);
        $result = $ci->db->get('tbl_colours')->result_array();
        return $result;
    }
function getProductVariantSize($product_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('t1.*, t2.size as size_name');
	$ci->db->from('tbl_product_variants t1');
	$ci->db->join('tbl_size t2', 't2.id = t1.size');
	$ci->db->where('product_id',$product_id);
	$ci->db->group_by('t1.size');
	$query =$ci->db->get();
	return $query->result();
}
function getProductVariantColour($product_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('t1.*, t2.colour_code');
	$ci->db->from('tbl_product_variants t1');
	$ci->db->join('tbl_colours t2', 't2.id = t1.colour');
	$ci->db->group_by('t1.colour');
	$ci->db->where('product_id',$product_id);
		$query =$ci->db->get();
		return $query->result();
}
function getProductPrize($product_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('price_for_non_members,price_for_members,in_stock');
	$ci->db->limit(1);
	$ci->db->where('product_id',$product_id);
	$query =$ci->db->get('tbl_product_variants');
	return $query->row();
}
function getProductStock($product_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('in_stock');
	$ci->db->where('product_id',$product_id);
	$query =$ci->db->get('tbl_product_variants');
	return $query->result();
}
function getCountOfOrders() {
    $ci = &get_instance();
    $ci->load->database();
    $query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getOrderOrderPlacedDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Processing');
	$ci->db->where('payment_status','PAID');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getOrderDispatchedDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Dispatched');
	$ci->db->where('payment_status','PAID');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}

function getOrderDeliveredDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Delivered');
	$ci->db->where('payment_status','PAID');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}


function getRefundOrderDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Refunded');
	
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getProcessedOrderDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Packing');
	$ci->db->where('payment_status','PAID');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getOrderPrintedDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('payment_status','PAID');
	$ci->db->where('order_status','Print');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getOrderFreezedDetails(){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('order_status','Freezed');
	$ci->db->where('payment_status','PAID');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getfailedOrderDetails(){
	$ci = &get_instance();
	$ci->load->database();
// 	$ci->db->where('payment_status','PAID');
$ci->db->where('payment_status','Pending');
	$ci->db->where('is_deleted','N');
	$query = $ci->db->get('tbl_orders');
    return $query->num_rows();
}
function getCartStock($product_id,$size_id,$colour_id){
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->where('product_id',$product_id);
	$ci->db->where('colour',$colour_id);
	$ci->db->where('size',$size_id);
	$query = $ci->db->get('tbl_product_variants');
	return $result = $query->row();
}
function get_order_list1($order_id){
    $ci = &get_instance();
	$ci->load->database();
    $ci->db->select('
        t1.id AS order_id,
        t1.user_id,
        t1.shipping_method,
        t1.created_at,
        add_from.id AS from_id,
        add_from.name AS from_name,
        add_from.phone_number AS from_phone,
        add_from.email_id AS from_mail_id,
        add_from.house_name AS from_house_name,
        add_from.street_name AS from_street_name,
        add_from.post_address AS from_post_address,
        add_from.pin_code AS from_pin,
        d1.state_title AS from_state,
        add_from.district AS from_district'
       
       
    );
    $ci->db->from('tbl_orders t1');
    $ci->db->join('tbl_order_address add_from', 'add_from.order_id = t1.id ');
    $ci->db->join('tbl_states d1', 'add_from.state = d1.state_id', 'left');
    $ci->db->where('t1.id', $order_id);
    $query = $ci->db->get();
    $result = $query->row();
    return $result;
}
function get_order_list($order_id){
    $ci = &get_instance();
	$ci->load->database();
    $ci->db->select('
        t1.id AS order_id,
        t1.user_id,
        t1.shipping_method,
        t1.created_at,
        add_from.id AS from_id,
        add_from.name AS from_name,
        add_from.phone_number AS from_phone,
        add_from.email_id AS from_mail_id,
        add_from.house_name AS from_house_name,
        add_from.street_name AS from_street_name,
        add_from.post_address AS from_post_address,
        add_from.pin_code AS from_pin,
        d1.state_title AS from_state,
        add_from.district AS from_district,
        add_to.id AS to_id,
        add_to.name AS to_name,
        add_to.phone_number AS to_phone,
        add_to.pin_code AS to_pin,
        add_to.email_id AS to_mail_id,
        add_to.house_name AS to_house_name,
        add_to.street_name AS to_street_name,
        add_to.post_address AS to_post_address,
        add_to.pin_code AS to_pin,
         d2.state_title AS to_state,
        add_to.district AS to_district,
        tbl_shipping_methods.name AS shipping_method_name'
       
    );
    $ci->db->from('tbl_orders t1');
    $ci->db->join('tbl_shipping_methods', 't1.shipping_method = tbl_shipping_methods.id');
    $ci->db->join('tbl_order_address add_from', 'add_from.order_id = t1.id AND add_from.status = "FROM"');
    $ci->db->join('tbl_order_address add_to', 'add_to.order_id = t1.id AND add_to.status = "TO"');
    $ci->db->join('tbl_states d1', 'add_from.state = d1.state_id', 'left');
    $ci->db->join('tbl_states d2', 'add_to.state = d2.state_id', 'left');
    $ci->db->where('t1.id', $order_id);
    $query = $ci->db->get();
    $result = $query->row();
    return $result;
}
function get_barcode_img($code){
    $ci = &get_instance();
    $ci->load->library('zend');
	$ci->zend->load('Zend/Barcode');
	$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();
	imagepng($imageResource, 'assets/uploads/barcodes/'.$code.'.png');
	return  'assets/uploads/barcodes/'.$code.'.png';
}
 function getUserProductList($order_id){
        $ci = &get_instance();
	   $ci->load->database();
        $ci->db->select('t1.id, t1.user_id, t2.product_id, t3.product_name, t3.sku_code, t2.size_id, t2.colour_id, t2.quantity, t4.size, t5.colors, t6.product_images as image');
    $ci->db->from('tbl_orders t1');
    $ci->db->join('tbl_order_products t2', 't2.order_id = t1.id', 'left');
    $ci->db->join('tbl_products t3', 't2.product_id = t3.id', 'left');
    $ci->db->join('tbl_size t4', 't2.size_id = t4.id', 'left');
    $ci->db->join('tbl_colours t5', 't5.id = t2.colour_id', 'left');
    $ci->db->join('tbl_product_variants t6', 't6.product_id = t2.product_id AND t2.size_id = t6.size AND t2.colour_id = t6.colour', 'left');
     $ci->db->where('t1.id', $order_id);
        $query = $ci->db->get();
        $result = $query->result();
        return $result;
}
     function getUserRank($user_id) {
        $CI = &get_instance(); // Get the CodeIgniter instance
        $CI->load->database();

        // Execute the SQL query to get the user's rank
        $query = $CI->db->query("SELECT user_id, SUM(order_amount) AS total_amount
                              FROM orders
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

        return $rank;
    }
 function getInstock($product_id){
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('in_stock');
        $ci->db->where('product_id',$product_id);
        $result = $ci->db->get('tbl_product_variants')->result();
        return $result;
    }