<?php class DashboardModel extends CI_Model {
    
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
    
    
	public function getcountUser(){
		$query = $this->db->get('tbl_users')->num_rows();
		return $query;
	}
	public function getcountAmmount(){
	  
		$currentYear = date("Y");
		$currentMonth = date("m");
		$startOfMonth = date("Y-m-01");
		$endOfMonth = date("Y-m-t");
	
		$this->db->select('amount');
		$this->db->where('datetime >=', $startOfMonth);
		$this->db->where('datetime <=', $endOfMonth);
		
		$query = $this->db->get('temp_payment')->result();
	
		$totalAmount = 0;
		foreach ($query as $row) {
			$totalAmount += $row->amount;
		}
	
		return $totalAmount;
	}
	
	public function getcountProducts(){
	  
	   $query = $this->db->get('tbl_products')->num_rows();
		return $query;  
	}
	
	public function getcountOrders(){
	   $currentYear = date("Y");
		$currentMonth = date("m");
		$startOfMonth = date("Y-m-01");
		$endOfMonth = date("Y-m-t");
		$this->db->where('created_at >=', $startOfMonth);
		$this->db->where('created_at <=', $endOfMonth);
	   $query = $this->db->get('tbl_order_products')->num_rows();
		return $query;  
	}
	
	public function getcountCategory(){
		 $this->db->where('status', 'Active');
		 $query = $this->db->get('tbl_categories')->result();
		return $query;  
	}
	
	public function getcountOrder(){
	         $this->db->where('status', 'Active');
	    	 $query = $this->db->get('tbl_shipping_methods')->result();
		return $query;  
	}
	 public function get_order_counts(){
	     
	    $this->db->select('order_status, COUNT(*) as count');
        $this->db->from('tbl_orders'); 
        $this->db->group_by('order_status');
        $query = $this->db->get();
        
        $order_counts = array(
            "PENDING" => 0,
            "Processing" => 0,
            "Shipping" => 0
        );
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $order_counts[$row->order_status] = $row->count;
            }
        }

        return $order_counts;
    }
    
    
    function getProductList($post_data, $filter = "")
    {
        
        $column_search  = array('c.product_name', 'c.sku_code');
        $column_order   = array(null, 'c.product_name', 'c.sku_code', null);
        $order          = array('a.id' => 'ASC');
        $table          = "tbl_order_products a";
    
        $this->_get_datatables_query($post_data, $table, $column_search, $column_order, $order);
    
        if ($post_data['length'] != -1 && $filter == "") {
            $this->db->limit($post_data['length'], $post_data['start']);
        }
	    if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
        $this->db->where('DATE(a.created_at) >=', $post_data['from_date']);
        } else {
         $this->db->where('DATE(a.created_at)', date('Y-m-d'));
        }
    
         if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
        $this->db->where('DATE(a.created_at) <=', $post_data['to_date']);
         } else {
         $this->db->where('DATE(a.created_at)', date('Y-m-d'));
         }

        $this->db->select('DISTINCT(a.product_id),a.size_id,a.colour_id,c.sku_code, c.product_name, d.id as sizeid, d.size, e.id as colorid, e.colors, f.id as orderID, f.payment_status');
        $this->db->join('tbl_products c', 'c.id = a.product_id', 'LEFT');
        $this->db->join('tbl_colours e', 'e.id = a.colour_id', 'LEFT');
        $this->db->join('tbl_size d', 'd.id = a.size_id', 'LEFT');
        $this->db->join('tbl_orders f', 'f.id = a.order_id', 'LEFT');
        $this->db->where('f.payment_status', 'PAID');
        $this->db->where('f.is_deleted', 'N');
        $this->db->group_by('a.product_id'); 
        $this->db->group_by('a.colour_id'); 
        $this->db->group_by('a.size_id'); 
        
        
        

    
        if ($filter == "filter") {
            return $this->db->count_all_results();
        }
    
        return $this->db->get()->result();
    }
    function getCusOrderList($post_data, $filter = "")
    {
        
        $column_search  = array('t2.member_name', 't2.member_name');
        $column_order   = array(null, 't2.member_name', 't2.member_name', null);
        $order          = array('t1.id' => 'ASC');
        $table          = "tbl_orders t1";
         if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
        $this->db->where('DATE(t1.created_at) >=', $post_data['from_date']);
        } else {
         $this->db->where('DATE(t1.created_at)', date('Y-m-d'));
        }
    
         if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
        $this->db->where('DATE(t1.created_at) <=', $post_data['to_date']);
         } else {
        $this->db->where('DATE(t1.created_at)', date('Y-m-d'));
         }
         
         
        $this->_get_datatables_query($post_data, $table, $column_search, $column_order, $order);    
        $this->db->select('t2.member_name, t4.plan_name, t1.id,t1.user_id,t3.subscription_id');
        $this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
        $this->db->join('tbl_subscription_details t3', 't3.member_id = t1.user_id','LEFT');
        $this->db->join('tbl_master_plan t4', 't4.id = t3.subscription_id','LEFT');
        // $this->db->where('DATE(t1.created_at)', date('Y-m-d'));
        $this->db->where('t1.payment_status', 'PAID');
        $this->db->where('t1.is_deleted', 'N');
        $this->db->order_by('t1.id', 'ASC');
        $this->db->group_by('t1.id');
        
        if ($filter == "filter") {
            return $this->db->count_all_results();
        }
    
        return $this->db->get()->result();
    }
    function getSumOfOrders($post_data)
    {
        $this->db->select_sum('f.total_amount', 'sumAmount');
        $this->db->join('tbl_products c', 'c.id = a.product_id', 'LEFT');
        $this->db->join('tbl_colours e', 'e.id = a.colour_id', 'LEFT');
        $this->db->join('tbl_size d', 'd.id = a.size_id', 'LEFT');
        $this->db->join('tbl_orders f', 'f.id = a.order_id', 'LEFT');
        $this->db->from('tbl_order_products a');
        $this->db->where('f.payment_status', 'PAID');
        return $this->db->get()->row();
    }
    function getUserList($post_data, $filter = "")
    {
        $column_search  = array('');
        $column_order   = array(null);
        $order          = array('a.id' => 'ASC');
        $table          = "tbl_users a";
    
        $this->_get_datatables_query($post_data, $table, $column_search, $column_order, $order);
    
        if ($post_data['length'] != -1 && $filter == "") {
            $this->db->limit($post_data['length'], $post_data['start']);
        }
        $this->db->select('a.*, d.member_name, COUNT(f.id) as order_count, SUM(f.total_amount) as total_quantity');
        $this->db->join('tbl_member_details d', 'd.id = a.user_id', 'LEFT');
        $this->db->join('tbl_orders f', 'f.user_id = a.user_id', 'LEFT');
        $this->db->where('f.payment_status', 'PAID');
        $this->db->group_by('a.user_id');
        $this->db->order_by('total_quantity', 'desc');
        		if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
            $this->db->where('DATE(f.created_at) >=',    $post_data['from_date']);
      
        		}
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
            $this->db->where('DATE(f.created_at) <=', $post_data['to_date']);
        }
        if ($filter == "filter") {
            return $this->db->count_all_results();
        }
    
        return $this->db->get()->result();
    }
    function getOrderAmount($post_data, $filter = "")
    {
        $column_search  = array('t2.member_name,t2.member_name');
        $column_order   = array(null,'t2.member_name,t2.member_name',null);
        $order          = array('a.id' => 'ASC');
        $table          = "tbl_orders t1";
    
        $this->_get_datatables_query($post_data, $table, $column_search, $column_order, $order);
    
        if ($post_data['length'] != -1 && $filter == "") {
            $this->db->limit($post_data['length'], $post_data['start']);
        }
		if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
            $this->db->where('DATE(t1.created_at) >=',    $post_data['from_date']);
        }else{
              $this->db->where('DATE(t1.created_at)', date('Y-m-d'));
        }
        
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
            $this->db->where('DATE(t1.created_at) <=', $post_data['to_date']);
        }else{
              $this->db->where('DATE(t1.created_at)', date('Y-m-d'));
        }
     $this->db->select('
    t1.id,
    t1.user_id,
    t2.member_name as name,
    t2.phone_number as mobile,
    t1.total_amount,
    t1.shipping_amount,
    t1.created_at,
    ');
    $this->db->join('tbl_member_details t2', 't2.id = t1.user_id','LEFT');
    $this->db->where('t1.payment_status','PAID');
    $this->db->where('t1.is_deleted','N');
        if ($filter == "filter") {
            return $this->db->count_all_results();
        }
    
        return $this->db->get()->result();
    }
	function countAll($table,$exclude_deleted=""){
		if($exclude_deleted == "1")
		{

			$this->db->where('is_deleted','N');

		}    

		$this->db->from($table);

		return $this->db->count_all_results();
	}
	
	
    public function getTotalQuantityForProduct($product_id,$size_id,$colour_id)
    {
        $this->db->select_sum('quantity');
        $this->db->where('product_id', $product_id);
        $this->db->where('size_id', $size_id);
        $this->db->where('colour_id', $colour_id);
        $this->db->from('tbl_order_products');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
       }
    public function getOrderProducts($order_id){
        $this->db->select('COUNT(id) AS product_count');
        $this->db->where('order_id',$order_id); 
        $query = $this->db->get('tbl_order_products');
        $result = $query->row();
        $product_count = $result->product_count;
        return $product_count;
    }
    public function getTotalProducts($user_id,$post_data) {
        $this->db->select('COUNT(product_id) as total_products');
        $this->db->from('tbl_order_products');
        $this->db->join('tbl_orders', 'tbl_orders.id = tbl_order_products.order_id');
        $this->db->where('tbl_orders.user_id', $user_id);
        $this->db->where('tbl_orders.payment_status','PAID');
    	if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
        $this->db->where('DATE(tbl_orders.created_at) >=',    $post_data['from_date']);
        }
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
        $this->db->where('DATE(tbl_orders.created_at) <=', $post_data['to_date']);
        }
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_products;
}
    public function getProductSold($product_id, $size_id, $colour_id,$post_data)
    {
    $this->db->select('COUNT(product_id) as counts');
    $this->db->from('tbl_order_products');
    $this->db->where('product_id', $product_id);
    $this->db->where('size_id', $size_id);
    $this->db->where('colour_id', $colour_id);
     $this->db->join('tbl_orders o', 'tbl_order_products.order_id = o.id','LEFT');
     $this->db->where('o.payment_status', 'Paid');
     $this->db->where('o.is_deleted', 'N');
    		if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
            $this->db->where('DATE(o.created_at) >=', $post_data['from_date']);
        }else{
            $this->db->where('DATE(o.created_at)', 'CURDATE()', FALSE);
        }
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
            $this->db->where('DATE(o.created_at) <=', $post_data['to_date']);
        }else{
            $this->db->where('DATE(o.created_at)', 'CURDATE()', FALSE);
        }
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
        return $result;
    } else {
        return 0;
    }
    }
    public function getProductPrize($product_id, $size_id, $colour_id)
    {
    $this->db->select('price_for_members');
    $this->db->from('tbl_product_variants');
    $this->db->where('product_id', $product_id);
    $this->db->where('size', $size_id);
    $this->db->where('colour', $colour_id);
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
        return $result->price_for_members   ;
    } else {
        return 0;
    }
    }
    public function getProductVariantPrize($product_id, $size_id, $colour_id)
    {
    $this->db->select('price_for_members,price_for_non_members,product_id');
    $this->db->from('tbl_product_variants');
    $this->db->where('product_id', $product_id);
    $this->db->where('size', $size_id);
    $this->db->where('colour', $colour_id);
    $query = $this->db->get();
    $result = $query->row();
    if (isset($result->product_id)) {
        return $result;
    } else {
        return 0;
    }
    }
   public function getCusProductList($order_id) {
        $this->db->select('t1.product_name,t1.sku_code,t2.product_id,t2.quantity,t2.size_id,t2.colour_id');
        $this->db->from('tbl_order_products t2');
         $this->db->join('tbl_products t1', 't2.product_id = t1.id','LEFT');
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function fetchDateSum($date) {
 $query = $this->db->select('created_at, SUM(order_amount) as total_amount_sum, SUM(shipping_amount) as shipping_charge_sum')
                     ->where('created_at', $date) 
                     ->group_by('created_at')
                     ->get('tbl_orders');
    $data = $query->result_array();
    echo json_encode($data);
}   
    // public function getTotalOrderSumByDate($date) {
    //     $sqlFormattedDate = date('Y-m-d', strtotime($date));
    //     $this->db->select_sum('order_amount', 'order_sum');
    //     $this->db->where('DATE(created_at)', $sqlFormattedDate);
    //     $result = $this->db->get('tbl_orders')->row();
    //      echo  json_encode($result->order_sum);
    // }
////////graphs
public function  getsalesPerDateDetails($fdate,$tdate){
   $f_date=date('Y-m-d',strtotime($fdate));
   $t_date=date('Y-m-d',strtotime($tdate));
   $query		=	$this->db->query("SELECT SUM(order_amount) as totalAmount, SUM(shipping_amount) as shippingAmount, DATE(created_at)as created_at FROM tbl_orders WHERE cast(created_at as Date) BETWEEN '$f_date' AND '$t_date' AND is_deleted='N' AND payment_status='PAID' GROUP BY cast(created_at as Date)");
	$result= $query->result();
	return $result;
}
public function  getsalesTotalPerDateDetails($fdate,$tdate){
    
   $f_date=date('Y-m-d',strtotime($fdate));
   $t_date=date('Y-m-d',strtotime($tdate));
   
    $query		=	$this->db->query("SELECT
    SUM(order_amount) as totalAmount,
    SUM(shipping_amount) as shippingAmount
FROM tbl_orders
WHERE
     DATE(created_at
     )BETWEEN '$f_date' AND '$t_date'
    AND is_deleted = 'N'
    AND payment_status = 'PAID'");
	$result= $query->row();
	return $result;
}
   public function getTotalProductSold($fdate,$tdate)
    {
        
         $f_date=date('Y-m-d',strtotime($fdate));
        $t_date=date('Y-m-d',strtotime($tdate));
   
    $this->db->select('COUNT(product_id) as counts');
    $this->db->from('tbl_order_products');
     $this->db->join('tbl_orders o', 'tbl_order_products.order_id = o.id','LEFT');
     $this->db->where('o.payment_status', 'Paid');
     $this->db->where('o.is_deleted', 'N');
    		if (isset($fdate) && $fdate != '') {
            $this->db->where('DATE(o.created_at) >=', $fdate);
        }else{
            $this->db->where('DATE(o.created_at)', 'CURDATE()', FALSE);
        }
        if (isset($tdate) && $tdate != '') {
            $this->db->where('DATE(o.created_at) <=', $tdate);
        }else{
            $this->db->where('DATE(o.created_at)', 'CURDATE()', FALSE);
        }
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
        return $result;
    } else {
        return 0;
    }
    }
   public function getTotalOrdersSold($fdate,$tdate)
    {
        
     $f_date=date('Y-m-d',strtotime($fdate));
     $t_date=date('Y-m-d',strtotime($tdate));
   
     $this->db->select('COUNT(id) as orders');
     $this->db->from('tbl_orders');
     $this->db->where('payment_status', 'Paid');
     $this->db->where('is_deleted', 'N');
    		if (isset($fdate) && $fdate != '') {
            $this->db->where('DATE(created_at) >=', $fdate);
        }else{
            $this->db->where('DATE(created_at)', 'CURDATE()', FALSE);
        }
        if (isset($tdate) && $tdate != '') {
            $this->db->where('DATE(created_at) <=', $tdate);
        }else{
            $this->db->where('DATE(created_at)', 'CURDATE()', FALSE);
        }
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
        return $result;
    } else {
        return 0;
    }
    }
}