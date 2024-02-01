<?php class CheckoutModel extends CI_Model {
    public function postOrder($user_id,$total_amount){
        
        $total_amount  =$this->input->post('total_amount');
        $shipment  =$this->input->post('shipment_method');
        $order_array= array();
         $order_array=array(
             'user_id'             => $user_id,
             'total_amount'        => $total_amount,
             'order_status'        => 'Processing',	
             'created_at'          => date('Y-m-d H:i:s'),
             'modified_at'         => date('Y-m-d H:i:s')
             );
        $this->db->insert('tbl_orders',$order_array);
        $order_id=$this->db->insert_id();
        return $order_id;
    }
     public function updateCartItemStatus($cartItemId, $status, $isBuyed) {
        $data = array(
            'status' => $status,
            'is_buyed' => $isBuyed
        );

        $this->db->where('id', $cartItemId);
        $this->db->update('tbl_cart', $data);
        return true;
    }
     public function insertOrderProducts($data) {
         
        //  print_r($data);die;
        $this->db->insert_batch('tbl_order_products', $data);
        return $this->db->affected_rows();
    }
    public function insertOrderAddress($user_id,$order_id) {
        // print_r($this->input->post('name'));die;
        $to_name                  =$this->input->post('name');
        $to_phone_number          =$this->input->post('phone');
        $house_name          =$this->input->post('house_name');
        $to_streetname                =$this->input->post('street_name');
        $to_postaddress    =$this->input->post('alter_na_no');
        $to_pin_code           =$this->input->post('pin_code');
        $to_state        =$this->input->post('state');
        $to_district        =$this->input->post('district');
        
        $data_to_address=array();
        $data_to_address=array(
            'order_id'      => $order_id,
             'name'          => $to_name,
             'phone_number'  => $to_phone_number,
             'house_name'     => $house_name,
             'street_name'  => $to_streetname,
             'post_address'  => $to_postaddress,
             'pin_code'  => $to_pin_code,
             'state'  => $to_state,
             'district'  => $to_district,	
             'status'        => '',
             'created_at'    => date('Y-m-d H:i:s'),
             'modified_at'   => date('Y-m-d H:i:s')
            );
        $this->db->insert('tbl_order_address',$data_to_address);
        return $this->db->affected_rows();
    }
     public function reduceProductVariantQuantity($product_id, $colour_id, $size_id, $quantity) {
        $this->db->where('product_id', $product_id);
        $this->db->where('size', $size_id);
        $this->db->where('colour', $colour_id);
        $this->db->where('in_stock >=', $quantity);
        $this->db->set('in_stock', 'in_stock - ' . $quantity, false);
        $this->db->update('tbl_product_variants'); 
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTempDetails($temp_id){
        $this->db->where('temp_id',$temp_id);
        $result = $this->db->get('temp_payment')->row();
        return $result;
    }
    public function getUserDetails($user_id){
        $this->db->where('id',$user_id);
        $result = $this->db->get('tbl_member_details')->row();
        return $result;
    }
      public function updateOrderStatus($order_id) {
        $data = array(
            'payment_status' => 'PAID',
        );

        $this->db->where('id', $order_id);
        $this->db->update('tbl_orders', $data);
        return true;
    } 
    public function updateOrderStatusNew($order_id,$amount) {
        $data = array(
            'total_amount' => $amount,
            'payment_status' => 'PAID',
        );

        $this->db->where('id', $order_id);
        $this->db->update('tbl_orders', $data);
        return true;
    }  

}