<?php class CartModel extends CI_Model{
	function addToCart($user_id, $data) {
	    $this->db->trans_start();
		$product_id = $data['product_id'];
		$quantity = $data['quantity'];
		
		
		$this->db->select('quantity');
        $this->db->where('id', $product_id);
        $query = $this->db->get('tbl_products');
         $variant = $query->row();
        $in_stock = $variant->quantity;
         if ($quantity > $in_stock) {
        echo "<script>alert('Selected quantity is out of stock. Available in stock: $in_stock');</script>";
    } else {
        if($product_id!='' && $quantity!=''  && $user_id!="") {
		    $this->db->where('user_id', $user_id);
			$this->db->where('product_id', $product_id);
            $this->db->where('is_buyed','N');
			$this->db->where('status','Active');
			$query = $this->db->get('tbl_cart');
			$row = $query->row();
			if ($query->num_rows() > 0) {
			    $row_id=$row->id;
			    $new_qty=$row->quantity + $quantity;
				$data12 = array(
					'quantity' => $new_qty
				);
				$this->db->where('id', $row_id);
				$this->db->update('tbl_cart', $data12);
			} else {
				$data1 = array(
					'product_id' => $product_id,
					'user_id' => $user_id,
					'quantity' => $quantity,
                    'status' => 'Active',
					'is_buyed' => 'N',
					'created_at' => date('Y-m-d H:i:s'),
					'modified_at' => date('Y-m-d H:i:s'),
				);
				$this->db->insert('tbl_cart', $data1);
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{
			return false;
		}
    }
	}


	function getCartProducts($user_id) {
        $this->db->select('t1.quantity,t1.id, t1.product_id,t2.product_name,t2.price,t2.quantity as in_stock,t6.image');
        $this->db->from('tbl_cart t1');
        $this->db->join('tbl_products t2', 't2.id = t1.product_id');
        $this->db->join('tbl_products_gallery t6', 't6.product_id = t1.product_id');
        $this->db->where('t1.user_id',$user_id);
        $this->db->where('t1.status', 'Active');
        $this->db->where('t1.is_buyed', 'N');
        $this->db->group_by('t1.id');
         return $this->db->get()->result();
}

  public function deleteCart($id,$data){
	$this->db->where('product_id',$id);
	$query = $this->db->update('tbl_cart',$data); 
	return $query ;
	}
	
	public function getDistricts(){
		$this->db->select('tbl_districts.district_title,tbl_districts.districtid,tbl_member_details.district_id,tbl_member_details.id');
		$this->db->from("tbl_districts");
		$this->db->join('tbl_member_details','tbl_member_details.district_id == tbl_districts.districtid ');
		return $this->db->get()->result();
	}
public function checkAndUpdateCartQty($cart_id, $product_id, $quantity) {
    // Fetch in_stock quantity from product_variant_table for the given product_id
    $productVariant = $this->db->get_where('tbl_product_variants', array('product_id' => $product_id))->row();
    if ($productVariant) {
        if ($quantity <= $productVariant->in_stock) {
            $data = array('quantity' => $quantity);
            $this->db->where('id', $cart_id);
            $this->db->update('tbl_cart', $data);
            return 'success';
        } else {
            return 'Error: Quantity exceeds available stock';
        }
    } else {
        return 'Error: Product variant not found';
    }
}

public function getCartItemById($cart_id) {
    return $this->db->get_where('tbl_cart', array('id' => $cart_id))->row();
}

 public function deleteFromCart($id,$data)
 {
     $this->db->where('id',$id);
	$query = $this->db->update('tbl_cart',$data); 
	return $query ;
 }
  public function getOldAddress($user_id) {
        $this->db->select('id,phone_number,member_name,address, city, pin_code, t1.district_id');
        $this->db->from('tbl_member_details t1');
        // $this->db->join('tbl_districts t2', 't1.district_id = t2.districtid','LEFT');
        $this->db->where('t1.id', $user_id);
        // $this->db->where('status', 'Approved');
        $query = $this->db->get();
        return $query->row();
    }
	function getCartStockProducts($user_id) {

        
		$this->db->select('t1.id,t1.product_id,t1.quantity,t2.product_name,t2.quantity as stock,t2.price,t4.image');
		$this->db->from('tbl_cart t1');
		$this->db->join('tbl_products t2', 't2.id = t1.product_id');
		$this->db->join('tbl_products_gallery t4', 't4.product_id = t1.product_id');
		$this->db->where('t1.is_buyed', 'N');
		$this->db->where('t1.status', 'Active');
		$this->db->where('t1.user_id', $user_id);
		$this->db->where('t1.quantity <= t2.quantity');
		$this->db->group_by('t1.id');
        return $this->db->get()->result();
}

public function getorderProducts($user_id){
      $this->db->select('tbl_orders.id as order_id,tbl_orders.user_id,tbl_orders.order_status,tbl_order_products.product_id,tbl_products.product_name,tbl_products_gallery.image,tbl_order_products.id,tbl_orders.total_amount,tbl_orders.order_status,tbl_orders.created_at,tbl_order_products.colour_id,tbl_order_products.size_id,tbl_colours.id,tbl_colours.colors,tbl_size.id,tbl_size.size');
      $this->db->from('tbl_order_products');
       $this->db->join('tbl_orders','tbl_orders.id = tbl_order_products.order_id');
       $this->db->join('tbl_colours','tbl_colours.id = tbl_order_products.colour_id');
        $this->db->join('tbl_size','tbl_size.id = tbl_order_products.size_id');
      	$this->db->join('tbl_products', 'tbl_products.id = tbl_order_products.product_id');
      	$this->db->join('tbl_products_gallery ', 'tbl_products_gallery.product_id = tbl_order_products.product_id');
		$this->db->where('tbl_orders.user_id', $user_id);
		$this->db->group_by('tbl_order_products.id');
        return $this->db->get()->result();
}
  public function getShippingMethods()
    {
        $this->db->where('status','Active');
        $result = $this->db->get('tbl_shipping_methods')->result();
        return $result;
    }
    
    	public function getcountProducts($user_id)
		{
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('tbl_orders')->num_rows();
//			var_dump($query);die;
			
			return $query;
		}
		
		public function getPlanOrder($user_id)
		{
			$this->db->where('member_id',$user_id);
			$query = $this->db->get('tbl_subscription_details')->result();
//			var_dump($query);die;
			
			return $query;
		}
		
		public function getTotalAmount($user_id)
		{ 
		       $this->db->select('id, total_amount');
            $this->db->where('user_id', $user_id);
            $this->db->where('payment_status','PAID');
            $query = $this->db->get('tbl_orders')->result();
        
            $totalAmount = 0;
            foreach ($query as $row) {
                $totalAmount += $row->total_amount;
            }
        
            return $totalAmount;
		}
		public function getStates()
		{
		     $query = $this->db->get('tbl_states')->result();
		     return $query;
		     
		}
		public function getShippingDetails($id)
		{
		    $this->db->where('id',$id);
		 $result =   $this->db->get('tbl_shipping_methods')->row();
		 return $result;
		}
		function getCartQuantity($user_id) {
		$this->db->select('SUM(t1.quantity) as ttquantity');
		$this->db->from('tbl_cart t1');
		$this->db->join('tbl_products t2', 't2.id = t1.product_id','LEFT');
		$this->db->where('t1.is_buyed', 'N');
		$this->db->where('t1.status', 'Active');
		$this->db->where('t1.user_id', $user_id);
        $res =  $this->db->get()->row();
        // var_dump($this->db->last_query());die;
        if(!empty($res)){
            return $res->ttquantity;
        }else{
            return 0;
        }
}
public function getUserOrders($user_id) {
    $this->db->select('*');
    $this->db->from('tbl_orders');
    $this->db->where('user_id', $user_id);
    $this->db->where('payment_status', 'PAID'); 
    $this->db->order_by('id', 'desc'); 
    $query = $this->db->get();
    $result = $query->result(); 
    return $result;
}

public function getUserProductList($order_id){
      $this->db->select('tbl_orders.id as order_id,tbl_orders.user_id,tbl_orders.order_status,tbl_order_products.product_id,tbl_order_products.quantity,tbl_products.product_name,tbl_products_gallery.image,tbl_order_products.id,tbl_orders.total_amount,tbl_orders.order_status,tbl_orders.created_at');
      $this->db->from('tbl_order_products');
       $this->db->join('tbl_orders','tbl_orders.id = tbl_order_products.order_id');
      
      	$this->db->join('tbl_products', 'tbl_products.id = tbl_order_products.product_id');
      	$this->db->join('tbl_products_gallery ', 'tbl_products_gallery.product_id = tbl_order_products.product_id');
		$this->db->where('tbl_orders.id', $order_id);
		$this->db->group_by('tbl_order_products.id');
        return $this->db->get()->result();
}

//     public function getUserProductList($order_id){
//         $this->db->select('t1.id,t1.user_id,t3.product_name,t3.sku_code, t2.quantity, t4.size, t5.colors, t6.image');
//         $this->db->from('tbl_orders t1');
//         $this->db->join('tbl_order_products t2', 't2.order_id = t1.id');
//         $this->db->join('tbl_products t3', 't2.product_id = t3.id');
//         $this->db->join('tbl_size t4', 't2.size_id = t4.id');
//         $this->db->join('tbl_colours t5', 't5.id = t2.colour_id');
//         $this->db->join('tbl_products_gallery t6', 't6.product_id = t2.product_id');
//         $this->db->where('t1.id',$order_id);
//         $this->db->group_by('t6.product_id');
//         $query = $this->db->get();
//         $result = $query->result();
//         return $result;
// }
public function getUserDetails1($order_id){
    $this->db->select('
        t1.id AS order_id,
        t1.user_id,
        t1.shipping_method,
        t1.created_at,
        t1.tracking_id,
        add_from.name AS from_name,
        add_from.phone_number AS from_phone,
        add_from.email_id AS from_mail_id,
        add_from.house_name AS from_house_name,
        add_from.street_name AS from_street_name,
        add_from.post_address AS from_post_address,
        add_from.pin_code AS from_pin,
         d1.state_title AS from_state,
        add_from.district AS from_district,
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
    $this->db->from('tbl_orders t1');
    $this->db->join('tbl_shipping_methods', 't1.shipping_method = tbl_shipping_methods.id');
    $this->db->join('tbl_order_address add_from', 'add_from.order_id = t1.id AND add_from.status = "FROM"');
    $this->db->join('tbl_order_address add_to', 'add_to.order_id = t1.id AND add_to.status = "TO"');
    $this->db->join('tbl_states d1', 'add_from.state = d1.state_id', 'left');
    $this->db->join('tbl_states d2', 'add_to.state = d2.state_id', 'left');
    $this->db->where('t1.id', $order_id);
    // $this->db->where('t1.order_status', 'Order Placed');
    // $this->db->where('t1.payment_status', 'PAID');
    $query = $this->db->get();
    $result = $query->row();
    return $result;
}
public function getUserDetails($order_id){
    $this->db->select('
        t1.id AS order_id,
        t1.user_id,
        t1.shipping_method,
        t1.created_at,
        t1.tracking_id,
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
    $this->db->from('tbl_orders t1');
    $this->db->join('tbl_order_address add_from', 'add_from.order_id = t1.id ');
    $this->db->join('tbl_states d1', 'add_from.state = d1.state_id', 'left');
    $this->db->where('t1.id', $order_id);
    // $this->db->where('t1.order_status', 'Order Placed');
    // $this->db->where('t1.payment_status', 'PAID');
    $query = $this->db->get();
    $result = $query->row();
    return $result;
}
public function getProductsByOrderId($order_id){
    $this->db->select('*');
    $this->db->where('order_id',$order_id);
    $query=$this->db->get('tbl_order_products');
    $result = $query->result();
    return $result;
}

public function updateProductStock($product_id,$quantity) {
    $this->db->where('id', $product_id);
    $this->db->where('quantity >=', $quantity);
    $this->db->set('quantity', 'quantity - ' . $quantity, false);
    $this->db->update('tbl_products');
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
public function markCartItemsAsBought($product_id) {
    $this->db->where('product_id', $product_id);    
    $data = array(
        'is_buyed' => 'Y',
        'status' =>'Deactive'
    );
    
    $this->db->update('tbl_cart', $data);
    return true;
}
public function getColoursBySizeAndProductId($product_id, $size_id) {
    $this->db->where('product_id', $product_id);
    $this->db->where('size', $size_id);
    $query = $this->db->get('tbl_product_variants');

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return null;
    }
}
 
}
