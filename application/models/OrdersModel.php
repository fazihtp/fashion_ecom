<?php 
class OrdersModel extends CI_Model{
        	function _get_datatables_query($post_data,$table,$column_search,$column_order,$order)
	{
		$this->db->from($table);

		$i = 0;

		// loop searchable columns 

		foreach($column_search as $item){

			// if datatable send POST for search

			if($post_data['search']['value']){

				// first loop

				if($i===0){

					// open bracket

					$this->db->group_start();

					$this->db->like($item, $post_data['search']['value']);

				}else{

					$this->db->or_like($item, $post_data['search']['value']);

				}
                if(count($column_search) - 1 == $i){

					// close bracket

					$this->db->group_end();

				}

			}

			$i++;
		}

		if(isset($post_data['order'])){ //print_r($post_data);die;

			$this->db->order_by($column_order[$post_data['order']['0']['column']], $post_data['order']['0']['dir']);

		}else if(isset($order)){

			if(count($order)==1)

			{

				$this->db->order_by(key($order), $order[key($order)]);

			}    

			else if(count($order)>1)

			{   

				foreach($order as $key => $value)

				{   

					$this->db->order_by($key, $value);

				}

			}

		}

     }
    function getOrderList($post_data,$filter="")
    { 
         $column_search  =   array('t1.id','od_from.name','od_to.name','t1.total_amount','t1.order_status');
        $column_order   =   array(null,null,'t1.id','od_from.name','od_to.name','t1.total_amount', 't1.order_status',null);
		$order          =   array('t1.id');
// 		$order          =   array('t1.id'=>'ASC');
		$table          =   "tbl_orders t1";

		$this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
			if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
		if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
            $this->db->where('t1.created_at >=', $post_data['from_date']);
        }
        
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
            $this->db->where('t1.created_at <=', $post_data['to_date']);
        }
         if (isset($post_data['shippingId']) && $post_data['shippingId'] != '') {
        $this->db->where('shipping_method', $post_data['shippingId']);
    }
$this->db->select('
    t1.id,
    t1.user_id,
    t1.created_at,
    t2.member_name as name,
    t2.phone_number as mobile,
    t1.order_status,
    t1.payment_method,
    t1.shipping_amount,
    t1.total_amount,
    t1.order_status,
    t1.created_at,
    od_to.name as to_name,
    od_to.phone_number as to_phone,
    od_to.street_name as to_street,
');
$this->db->join('tbl_order_address od_to', 'od_to.order_id = t1.id','LEFT');
$this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
$this->db->where('t1.payment_status','PAID');
$this->db->where('t1.order_status','Processing');
$this->db->order_by('t1.id', "DESC");
	if($filter == "filter")
		{
			return $this->db->count_all_results();
		}
		return $this->db->get()->result();
    }
    public function getOrderProductsById($id)
    {
        $this->db->select('a.id, b.product_name, c.size, d.colors, a.quantity, a.price');
        $this->db->join('tbl_products b', 'b.id = a.product_id', 'LEFT');
        $this->db->join('tbl_size c', 'c.id = a.size_id', 'LEFT');
        $this->db->join('tbl_colours d', 'd.id = a.colour_id', 'LEFT');
        $this->db->where('a.order_id', $id);
        $query = $this->db->get('tbl_order_products a');
        return $query->result();
}
   function getAllOrderList($post_data, $filter = "")
{
   
    $column_search  =   array('t1.id','od_from.name','od_to.name','t1.total_amount','t1.order_status');
    $column_order   =   array(null,null,'t1.id','od_from.name','od_to.name','t1.total_amount', 't1.order_status',null);
    $order          =   array('t1.id');
// 		$order          =   array('t1.id'=>'ASC');
    $table          =   "tbl_orders t1";

    $this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
        if($post_data['length'] != -1 && $filter == "")
    {
        $this->db->limit($post_data['length'], $post_data['start']);
    }
    if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
        $this->db->where('t1.created_at >=', $post_data['from_date']);
    }
    
    if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
        $this->db->where('t1.created_at <=', $post_data['to_date']);
    }
     if (isset($post_data['shippingId']) && $post_data['shippingId'] != '') {
    $this->db->where('shipping_method', $post_data['shippingId']);
}
$this->db->select('
t1.id,
t1.user_id,
t1.created_at,
t2.member_name as name,
t2.phone_number as mobile,
t1.order_status,
t1.payment_method,
t1.shipping_amount,
t1.total_amount,
t1.order_status,
t1.created_at,
od_to.name as to_name,
od_to.phone_number as to_phone,
od_to.street_name as to_street,
');
$this->db->join('tbl_order_address od_to', 'od_to.order_id = t1.id','LEFT');
$this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
// $this->db->where('t1.payment_status','PAID');
// $this->db->where('t1.order_status','Processing');
$this->db->order_by('t1.id', "DESC");
if($filter == "filter")
    {
        return $this->db->count_all_results();
    }
    return $this->db->get()->result();
}

public function deleteOrder($id,$data1)
{
		$this->db->where('id', $id);
		$query=$this->db->update('tbl_orders', $data1);
		return $query ;
}
public function getUserDetails($order_id){
    $this->db->select('
        t1.id AS order_id,
        t1.user_id,
       
        t1.created_at,
         t1.tracking_id,
        add_from.id AS from_id,
        add_from.name AS from_name,
        add_from.phone_number AS from_phone,
        add_from.email_id AS from_mail_id,
        add_from.house_name AS from_house_name,
        add_from.street_name AS from_street_name,
        add_from.post_address AS from_post_address,
        add_from.pin_code AS from_pin,
        add_from.district AS from_district'
       
    );
    $this->db->from('tbl_orders t1');
    $this->db->join('tbl_order_address add_from', 'add_from.order_id = t1.id');
    $this->db->where('t1.id', $order_id);
    // $this->db->where('t1.order_status', 'Order Placed');
    // $this->db->where('t1.payment_status', 'PAID');
    $query = $this->db->get();
    $result = $query->row();
    return $result;
}

public function getUserProductList($order_id) {
    
        $this->db->select('t1.id, t1.user_id, t2.product_id, t3.product_name,t3.price,t3.quantity as stock, t2.quantity,t6.image as image');
    $this->db->from('tbl_orders t1');
    $this->db->join('tbl_order_products t2', 't2.order_id = t1.id', 'left');
    $this->db->join('tbl_products t3', 't2.product_id = t3.id', 'left');
    $this->db->join('tbl_products_gallery t6', 't2.product_id = t6.id', 'left');
     $this->db->where('t1.id', $order_id);
    $query = $this->db->get();
    return $query->result();
}


    function getProcessedList($post_data,$filter="")
    { 
        $column_search  =   array('t1.id','od_from.name','od_to.name','t1.total_amount','t1.order_status');
       $column_order   =   array(null,null,'t1.id','od_from.name','od_to.name','t1.total_amount', 't1.order_status',null);
       $order          =   array('t1.id');
// 		$order          =   array('t1.id'=>'ASC');
       $table          =   "tbl_orders t1";

       $this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
           if($post_data['length'] != -1 && $filter == "")
       {
           $this->db->limit($post_data['length'], $post_data['start']);
       }
       if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
           $this->db->where('t1.created_at >=', $post_data['from_date']);
       }
       
       if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
           $this->db->where('t1.created_at <=', $post_data['to_date']);
       }
        if (isset($post_data['shippingId']) && $post_data['shippingId'] != '') {
       $this->db->where('shipping_method', $post_data['shippingId']);
   }
$this->db->select('
   t1.id,
   t1.user_id,
   t1.created_at,
   t2.member_name as name,
   t2.phone_number as mobile,
   t1.order_status,
   t1.payment_method,
   t1.shipping_amount,
   t1.total_amount,
   t1.order_status,
   t1.created_at,
   od_to.name as to_name,
   od_to.phone_number as to_phone,
   od_to.street_name as to_street,
');
$this->db->join('tbl_order_address od_to', 'od_to.order_id = t1.id','LEFT');
$this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
// $this->db->where('t1.payment_status','PAID');
// $this->db->where('t1.order_status','Processing');
$this->db->order_by('t1.id', "DESC");
   if($filter == "filter")
       {
           return $this->db->count_all_results();
       }
       return $this->db->get()->result();
    }
function ChangeToDispatched($order_id,$tracking_id){
    $data=array(
          'order_status'=>'Dispatched',
          'tracking_id'=>$tracking_id
        );
    $this->db->where('id',$order_id);
    $this->db->update('tbl_orders',$data);
    return true;
}
function ChangeToProcessed($order_id){
    $data=array(
          'order_status'=>'Packing',
        );
    $this->db->where('id',$order_id);
    $this->db->update('tbl_orders',$data);
    return true;
}
function ChangeToDeliver($order_id){
    $data=array(
          'order_status'=>'Delivered',
        );
    $this->db->where('id',$order_id);
    $this->db->update('tbl_orders',$data);
    return true;
}
    
    
function changeToOrders($order_id){
    $data=array(
          'order_status'=>'Processed',
        );
    $this->db->where('id',$order_id);
    $this->db->update('tbl_orders',$data);
    return true;
}
    

  
function getDelivered($post_data,$filter="")
    { 
                    $column_search  =   array('t1.id','od_from.name','od_to.name','t1.total_amount','t1.order_status');
                $column_order   =   array(null,null,'t1.id','od_from.name','od_to.name','t1.total_amount', 't1.order_status',null);
                $order          =   array('t1.id');
            // 		$order          =   array('t1.id'=>'ASC');
                $table          =   "tbl_orders t1";

                $this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
                    if($post_data['length'] != -1 && $filter == "")
                {
                    $this->db->limit($post_data['length'], $post_data['start']);
                }
                if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
                    $this->db->where('t1.created_at >=', $post_data['from_date']);
                }
                
                if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
                    $this->db->where('t1.created_at <=', $post_data['to_date']);
                }
                    if (isset($post_data['shippingId']) && $post_data['shippingId'] != '') {
                $this->db->where('shipping_method', $post_data['shippingId']);
            }
            $this->db->select('
            t1.id,
            t1.user_id,
            t1.created_at,
            t2.member_name as name,
            t2.phone_number as mobile,
            t1.order_status,
            t1.payment_method,
            t1.shipping_amount,
            t1.total_amount,
            t1.order_status,
            t1.created_at,
            od_to.name as to_name,
            od_to.phone_number as to_phone,
            od_to.street_name as to_street,
            ');
            $this->db->join('tbl_order_address od_to', 'od_to.order_id = t1.id','LEFT');
            $this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
            // $this->db->where('t1.payment_status','PAID');
            $this->db->where('t1.order_status','Delivered');
            $this->db->order_by('t1.id', "DESC");
            if($filter == "filter")
                {
                    return $this->db->count_all_results();
                }
                return $this->db->get()->result();
    }

    public function getOrderProductList($order_id) {
        
        $this->db->select('t2.product_id, t3.product_name, t2.quantity, t3.quantity as stock,t3.price, t5.image as image');
        $this->db->from('tbl_order_products t2');
        $this->db->join('tbl_products t3', 't2.product_id = t3.id', 'left');
        $this->db->join('tbl_products_gallery t5', 't5.id = t2.product_id', 'left');
        $this->db->where('t2.order_id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
}