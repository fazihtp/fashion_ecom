<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_Model extends CI_Model {

	public function addCategory($data){
	    $query = $this->db->insert('tbl_categories',$data);
	    return true;
	}
	
	public function getcategory_Lists($post_data,$filter=""){

		$column_search  =   array('a.id','a.name','a.status');
        $column_order   =   array(null,'a.name','a.status',null);
        $order          =   array('a.id' => 'DESC');
        $table          =   "tbl_categories a";
	    $this->get_datatables_query($post_data,$table,$column_search,$column_order,$order);
        if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
		$this->db->where('a.is_deleted','N');
		
        $this->db->order_by('a.id', 'DESC');
        if($filter == "filter")
		{
		return $this->db->count_all_results();
		}
		$res1 = $this->db->get()->result();
        return $res1;
	}
	   function countAll(){
        $this->db->where('status','Active');
        $this->db->from('tbl_categories');
        return $this->db->count_all_results();
    }
	  function get_datatables_query($post_data,$table,$column_search,$column_order,$order)
		{
		 $this->db->from($table);
         $i = 0;
        foreach($column_search as $item){
			 if($post_data['search']['value']){
				  if($i===0){
					 $this->db->group_start();
                     $this->db->like($item, $post_data['search']['value']);
				  }else{
					 $this->db->or_like($item, $post_data['search']['value']);
				  }
				  if(count($column_search) - 1 == $i){
                    $this->db->group_end();
			 }
		}
			$i++;
		}
	   if(isset($post_data['order'])){ 
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
 
  public function edit_category($id,$data){
      	$this->db->where('id',$id);
		$query = $this->db->update('tbl_categories',$data);
		return true ;
   }
  
  	public function delete_category($id,$data){
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_categories',$data); 
		return $query ;
		}
		
    public function get_category () {
	      $query = $this->db->select('*')
                  ->from('tbl_categories')
                  ->where('status', 'Active')
                  ->order_by('name', 'ASC')
                  ->get(); 
			return $query->result();
	 }  
	 
	 public function Sub_Category($data){
	    $query = $this->db->insert('tbl_sub_categories',$data);
	    return $this->db->insert_id();
	 }
	 
	 	public function get_Subcategory_Lists($post_data,$filter=""){

		$column_search  =   array('a.name','b.sub_category_name');
        $column_order   =   array(null,'a.name','b.sub_category_name',null);
        $order          =   array('b.id' => 'DESC');
        $table          =   "tbl_categories a";
	    $this->_get_datatables($post_data,$table,$column_search,$column_order,$order);
        if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
       $this->db->select('a.*,a.name,b.sub_category_name,b.status,b.created_at,b.id ,b.is_deleted');
		$this->db->join('tbl_sub_categories b','b.category_id=a.id','LEFT');
		$this->db->where('b.is_deleted','N');
		$this->db->where('a.is_deleted','N');
        $this->db->order_by('b.id', 'DESC');
        if($filter == "filter")
		{
		return $this->db->count_all_results();
		}
		$res1 = $this->db->get()->result();
        return $res1;
	}
	   function countAll1(){
        $this->db->where('status','Active');
        $this->db->from('tbl_sub_categories');
        return $this->db->count_all_results();
    }
	  function _get_datatables($post_data,$table,$column_search,$column_order,$order)
		{
		 $this->db->from($table);
         $i = 0;
        foreach($column_search as $item){
			 if($post_data['search']['value']){
				  if($i===0){
					 $this->db->group_start();
                     $this->db->like($item, $post_data['search']['value']);
				  }else{
					 $this->db->or_like($item, $post_data['search']['value']);
				  }
				  if(count($column_search) - 1 == $i){
                    $this->db->group_end();
			 }
		}
			$i++;
		}
	   if(isset($post_data['order'])){ 
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
   public function edit_Subcategory($id,$data){
      	$this->db->where('id',$id);
		$query = $this->db->update('tbl_sub_categories',$data);
		return true ;
   }
   	public function delete_subcategory($id,$data){
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_sub_categories',$data); 
		return $query ;
	}
	
	
		public function get_Banner_Lists($post_data,$filter=""){

		$column_search  =   array('a.id','a.image','a.heading','a.sub_heading','a.shot_description','a.shop_link','a.status');
        $column_order   =   array(null,'a.image','a.heading','a.sub_heading','a.shot_description','a.shop_link','a.status',null);
        $order          =   array('a.id' => 'DESC');
        $table          =   "tbl_banner a";
	    $this->_datatables_query($post_data,$table,$column_search,$column_order,$order);
        if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
		$this->db->where('a.is_deleted','N');
        $this->db->order_by('a.id', 'DESC');
        if($filter == "filter")
		{
		return $this->db->count_all_results();
		}
		$res1 = $this->db->get()->result();
        return $res1;
	}
	   function countAll2(){
        $this->db->where('status','Active');
        $this->db->from('tbl_banner');
        return $this->db->count_all_results();
    }
	  function _datatables_query($post_data,$table,$column_search,$column_order,$order)
		{
		 $this->db->from($table);
         $i = 0;
        foreach($column_search as $item){
			 if($post_data['search']['value']){
				  if($i===0){
					 $this->db->group_start();
                     $this->db->like($item, $post_data['search']['value']);
				  }else{
					 $this->db->or_like($item, $post_data['search']['value']);
				  }
				  if(count($column_search) - 1 == $i){
                    $this->db->group_end();
			 }
		}
			$i++;
		}
	   if(isset($post_data['order'])){ 
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
  	public function addBanner_model($data){
		$query = $this->db->insert('tbl_banner',$data);
		return true;
	}
	public function editBanner_Model($id,$data){
	    $this->db->where('id',$id);
		$query = $this->db->update('tbl_banner',$data);
		return true ;
	}
	
  	public function deleteBanner_model($id,$data){
	$this->db->where('id',$id);
	$query = $this->db->update('tbl_banner',$data); 
	return $query ;
	}
	
	
	
	  ///////////////////////// offer zone category/////////////////////////////////////////////////////
	
	public function editofferzone_Model($id,$data){
	    $this->db->where('id',$id);
		$query = $this->db->update('tbl_offerzone_categories',$data);
		return true ;
	}
	
	public function deletecategory_model($id,$data){
	    
	$this->db->where('id',$id);
	$query = $this->db->update('tbl_offerzone_categories',$data); 
	return $query ;
	}
       
    }
