<?php class AdminModel extends CI_Model {
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
     
	public function deleteMember($id){
		$data1=array(
			'is_deleted'=>'Y'
		);
		$this->db->where('id', $id);
		$query=$this->db->update('tbl_member_details', $data1);
		return $query ;
		}
	public function getMemberDetails($id){
        $sql="SELECT * FROM `tbl_member_details` WHERE `id`='$id'";
		$query = $this->db->query($sql);
		return $query->row();
	    
	}
     function getApprovedMembers($post_data,$filter="")
    { 
		$column_search  =   array('a.member_name','a.user_email','a.phone_number','a.status');
		$column_order   =   array(null,'a.member_name','a.user_email','a.phone_number','a.status',null);
		$order          =   array('a.id' => 'ASC');
		$table          =   "tbl_member_details a";

		$this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
		if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}

		$this->db->select('a.id,a.member_name,a.phone_number,a.user_email,a.address,a.created_at');
		$this->db->where('a.is_deleted','N');
		$this->db->where('a.status','Approved');
		if($filter == "filter")
		{
			return $this->db->count_all_results();
		}
		return $this->db->get()->result();
    }
     
public function getMemberDetailsbyId($id)
{
    $this->db->select('a.*,e.user_name');
    $this->db->join('tbl_users e', 'a.id = e.user_id', 'LEFT');
    $this->db->where('a.is_deleted', 'N');
    $this->db->where('a.id', $id);
    $this->db->where('a.status', 'Approved');
    $query = $this->db->get('tbl_member_details a');
    return $query->row();
}
 public function save_image($file_name, $category, $description)
    {
        $data = array(
            'category_image' => $file_name,
            'category_name' => $category,
            'category_description' => $description
        );
        $this->db->insert('tbl_offerzone_categories', $data);
    }
 function getCategoryList($post_data,$filter="")
    { 
		$column_search  =   array('t3.category_image','t1.sub_category_name','t3.category_description');
		$column_order   =   array(null,'t3.category_image','t1.sub_category_name','t3.category_description',null);
		$order          =   array('id' => 'ASC');
		$table          =   "tbl_sub_categories t1";
// 		$table          =   "tbl_categories t1";

		$this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);
		if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
		$this->db->select('t2.id,t2.name,t2.category_status,t1.status,t3.category_image,t3.category_description,t1.sub_category_name,t1.id as offer_id');
        $this->db->join('tbl_categories t2', 't2.id = t1.category_id');
        $this->db->join('tbl_offerzone_categories t3', 't3.sub_category_id = t1.id');
        $this->db->where('t2.category_status', 'OFFERS');
        $this->db->where('t1.status', 'Active');
        $this->db->where('t2.status', 'Active');
        $this->db->where('t3.status', 'Active');

		if($filter == "filter")
		{
			return $this->db->count_all_results();
		}
		return $this->db->get()->result();
    }
    
    public function getMembers($id){
        
    $this->db->select('tbl_member_details.*,tbl_master_plan.id as plan_id,tbl_master_plan.plan_name,tbl_districts.districtid,tbl_districts.district_title');
    $this->db->from('tbl_member_details');
    $this->db->join('tbl_master_plan','tbl_master_plan.id = tbl_member_details.id ');
    $this->db->join('tbl_districts','tbl_districts.districtid = tbl_member_details.district_id ');
    $this->db->where('tbl_member_details.id',$id);
    $query = $this->db->get();
    $result = $query->row();
    return $result;  
    }
    
    public function editMember($id,$data){
      	$this->db->where('id',$id);
		$query = $this->db->update('tbl_member_details',$data);
		return true ;
     }

  public function editUsername($id,$username){
       $this->db->where('user_id',$id);
      $query = $this->db->update('tbl_users',$username);
      return true ;  
  }

    public function getCategories(){
        $this->db->where('is_deleted','N');
        $this->db->where('is_offer','Y');
        $result = $this->db->get('tbl_sub_categories')->result();
        return $result;
    }  
    
    public function updateUserPassword($data) {
        
      $user_id = $this->input->post('user_id');
            $data4 = array(
                'password'     => sha1($this->input->post('newPassword')),
            );
         $this->db->where('user_id',$user_id); 
        $this->db->update('tbl_users', $data4);
    return true;
        
    }
   
    public function getproductsById($id1)
    {
        $this->db->select('a.*,b.image, c.id as color_id, d.id as size_id');
        $this->db->from('tbl_offerzone_products a');
		$this->db->join('tbl_offerzone_products_gallery b','b.product_id=a.id','LEFT');
		$this->db->join('tbl_offer_colors c', 'c.product_id =a.id','LEFT');
		$this->db->join('tbl_offerzone_products_size d','d.product_id=a.id','LEFT');
		$this->db->where('a.id', $id1);
		$query = $this->db->get();
        return  $query->row();
    }

  
 
    
    public function getimages($id1)
    {
        $this->db->select('*');
        $this->db->from('tbl_offerzone_products_gallery');
        $this->db->where('product_id', $id1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    
     function countAll1(){
       // $this->db->where('status','Active');
        $this->db->from('tbl_review');
        return $this->db->count_all_results();
    }
    public function getCategoryIdByName($category_name) {
        $this->db->select('id');
        $this->db->where('name', $category_name);
        $query = $this->db->get('tbl_categories');
        $result = $query->row();
        return $result ? $result->id : null;
    }
   	public function addCategory($data){
	    $query = $this->db->insert('tbl_categories',$data);
	    return $this->db->insert_id();;
	} 
    public function getCategoryId($sub_category_id) {
        $this->db->select('category_id');
        $this->db->from('tbl_sub_categories');
        $this->db->where('id', $sub_category_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->category_id;
    }
    public function addMember($data){
        
        $query = $this->db->insert('tbl_member_details',$data);
	    return $this->db->insert_id();
    }
    public function addUser($userData){
        $query = $this->db->insert('tbl_users',$userData);
        return $this->db->insert_id();
    }
    public function userSubcription($subData){
        
      $query = $this->db->insert('tbl_subscription_details',$subData);
        return $this->db->insert_id();  
    }
    
    public function check_phoneno_exists($phone){

    $query = $this->db->get_where('tbl_member_details', array('phone_number' => $phone));
    $result= $query->num_rows() > 0;
    if($result){
        return true;
    }else{
        return false;
    }
    }
    
  

     function cns(){
         $this->db->where('status', 'Active');
        $this->db->from('tbl_shipping_methods');
        return $this->db->count_all_results();
    }
    
    	
		
		public function getorderProducts($id){
        $this->db->select('tbl_orders.id as order_id,tbl_orders.user_id,tbl_orders.order_status,tbl_order_products.product_id,tbl_order_products.colour_id,tbl_order_products.size_id,tbl_products.product_name,tbl_products_gallery.image,tbl_order_products.id,tbl_orders.total_amount,tbl_orders.order_status,tbl_orders.created_at,tbl_colours.id,tbl_colours.colors,tbl_size.id,tbl_size.size');
         $this->db->from('tbl_order_products');
       $this->db->join('tbl_orders','tbl_orders.id = tbl_order_products.order_id');
       $this->db->join('tbl_colours','tbl_colours.id = tbl_order_products.colour_id ');
        $this->db->join('tbl_size','tbl_size.id = tbl_order_products.size_id ');
      	$this->db->join('tbl_products', 'tbl_products.id = tbl_order_products.product_id');
      	$this->db->join('tbl_products_gallery ', 'tbl_products_gallery.product_id = tbl_order_products.product_id');
		$this->db->where('tbl_orders.user_id', $id);
		$this->db->where('tbl_orders.payment_status', 'PAID');
		$this->db->where('tbl_orders.is_deleted', 'N');
		$this->db->order_by('tbl_orders.id', 'desc');
// 		$this->db->group_by('tbl_order_products.id');
        return $this->db->get()->result();
     }
     	public function getcountorder($id)
		{
			$this->db->where('user_id',$id);
			$this->db->where('payment_status','PAID');
			$this->db->where('is_deleted','N');
			$query = $this->db->get('tbl_orders')->num_rows();
//			var_dump($query);die;
			return $query;
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

	}
	
   

