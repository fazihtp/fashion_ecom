<?php class Offer_cart_Model extends CI_Model{
    

function getCartProducts($user_id) {
    $this->db->select('t1.*, t2.product_name, t2.product_description, t2.price,t2.id, t3.image');
    $this->db->from('tbl_cart t1');
    $this->db->join('tbl_offerzone_products t2', 't1.product_id = t2.id', 'LEFT');
    $this->db->join('(SELECT product_id, MIN(image) AS image FROM tbl_offerzone_products_gallery GROUP BY product_id) t3', 't1.product_id = t3.product_id', 'LEFT');
    $this->db->where('t1.user_id', $user_id);
    $this->db->where('t1.status', 'Active');
    $this->db->where('t1.is_buyed', 'N');
    return $this->db->get()->result();
}

function addToCart($user_id){
    $user=$user_id;
    $offer_size =$this->input->post('offer_size');
    $product_id=$this->input->post('product_id');
    $quantity=$this->input->post('quantity');
    $offer_color=$this->input->post('offer_color');
    $data1 = array(  
        
				'product_id'          => $product_id,  
				'color'               =>$offer_color,
				'user_id'             =>$user,
				'quantity'            =>$quantity, 
				'size'                =>$offer_size,
				'status'              => 'Active',  
				'is_buyed'            => 'N',  
				'created_at'          => date('Y-m-d H:i:s'),
				'modified_at'         => date('Y-m-d H:i:s'),	
			);  
	$var=$this->db->insert('tbl_cart',$data1);
	return $this->db->insert_id();

}
	public function deleteCart($id,$data){
		$this->db->where('product_id',$id);
		$query = $this->db->update('tbl_cart',$data); 
		return $query ;
		}
		
}