<?php class CategoryModel extends CI_Model {
    public function getSubCategories($category_id) {
        $this->db->where('category_id',$category_id);
        $query=$this->db->get('tbl_sub_categories')->result();
        return $query;
    }
    public  function getProductSize(){
        $this->db->where('status',1);
        $query=$this->db->get('tbl_size')->result() ;                                                   
        return $query;
    }
    public  function getProductsColor(){
        $this->db->where('status',1);
        $query=$this->db->get('tbl_colours')->result();
        return $query;
    }
    public function getProductsById($id) {
        $this->db->select('tbl_products.sub_category_Id as subcategory_ID, tbl_products.product_name,tbl_products.id,tbl_products.product_description,tbl_products_gallery.image,tbl_product_variants.price_for_non_members,tbl_product_variants.price_for_members');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_gallery', 'tbl_products_gallery.product_id = tbl_products.id');
        $this->db->join('tbl_product_variants', 'tbl_product_variants.product_id = tbl_products.id');
        // $this->db->limit(1);
        $this->db->where('tbl_products.status', 'Active');
        $this->db->where('tbl_products.is_deleted', 'N');
        //$this->db->where('tbl_products.category_id', $category_id);
        $this->db->where('tbl_products.category_id',$id);
        $this->db->group_by('tbl_products.id'); // Group by product ID
        $this->db->limit(12);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

   public function getCategoryName($category_id)
{
    $this->db->where('id', $category_id);
    $query = $this->db->get('tbl_categories');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->name;
    } else {
        return null;
    }
}
 public function getMemberStatus($user_id)
{
    $this->db->select('subscription_id');
    $this->db->from('tbl_subscription_details');
    $this->db->where('member_id', $user_id);
    $query = $this->db->get();
    $result = $query->row();
    if (isset($result->subscription_id) && $result->subscription_id !== null) {
    $member_subscription = $result->subscription_id;
    return $member_subscription;
        }
    else {
        return 0;
    }
}

public function getMember($user_id){
//	$this->db->select('tbl_member_details.*,tbl_districts.districtid,tbl_districts.district_title');
//	 $this->db->from('tbl_member_details');
//	$this->db->join('tbl_districts','tbl_districts.districtid = tbl_member_details.district_id');
      $this->db->where('id',$user_id);
      $query=$this->db->get('tbl_member_details')->row() ;                                                                                                          
      return $query;
}
    public function getProductsDetailsById($product_id) {
        $this->db->select('tbl_products.*, tbl_products_gallery.image,tbl_categories.name as category_name');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_gallery', 'tbl_products_gallery.product_id = tbl_products.id');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_products.category_id');
        // $this->db->where('tbl_products.status', 'Active');
        // $this->db->where('tbl_products.is_deleted', 'N');
        $this->db->where('tbl_products.id', $product_id);
        $this->db->group_by('tbl_products.id'); // Group by product ID
        $query = $this->db->get();
        //  print_r($query);die;
        // var_dump($query);die;
        $result = $query->row();
       
        return $result;
    }
    public  function getProductsSizeById($product_id){
        $this->db->select('tbl_products_size.*,tbl_size.size');
        $this->db->from('tbl_products_size');
        $this->db->join('tbl_size', 'tbl_size.id = tbl_products_size.available_size');
        $this->db->where('tbl_products_size.product_id', $product_id);
        $query = $this->db->get();
        $result = $query->result();                                                                                                         
        return $result;
    }
    public  function getProductsColorById($product_id){
        $this->db->select('tbl_products_colors.*,tbl_colours.colour_code');
        $this->db->from('tbl_products_colors');
        $this->db->join('tbl_colours', 'tbl_colours.id = tbl_products_colors.available_colors');
        $this->db->where('tbl_products_colors.product_id', $product_id);
        $query = $this->db->get();
        $result = $query->result();                                                                                                         
        return $result;
    }
    public  function getProductsImagesById($product_id){    
        $this->db->select('tbl_products_gallery.*,tbl_products.id');
        $this->db->from('tbl_products_gallery');
        $this->db->join('tbl_products', 'tbl_products.id = tbl_products_gallery.product_id');
        $this->db->where('tbl_products_gallery.product_id', $product_id);
        $query = $this->db->get();
        $result = $query->result();                                                                                                         
        return $result;
    }
public function getfilter($_id,$cat_id) {
    $category = $this->input->post('category[]');
    $category_size = $this->input->post('category_size[]');
    $category_color = $this->input->post('category_color[]');
    $filterPrice1 = $this->input->post('filterPrice1');
    $filterPrice = $this->input->post('filterPrice');
//print_r($filterPrice);die;
    $this->db->select('a.id as product_id, a.product_name, i.price_for_non_members, i.price_for_members, b.image, i.size, f.available_size, c.available_colors, d.colour_code, g.category_id, g.sub_category_name, g.id, h.id');
    $this->db->from('tbl_products a');
    $this->db->join('tbl_categories h', 'h.id = a.category_id','LEFT');
    $this->db->join('tbl_sub_categories g', 'g.id = a.sub_category_Id', 'LEFT');
    $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
    $this->db->join('tbl_products_colors c', 'c.product_id = a.id', 'LEFT');
    $this->db->join('tbl_colours d', 'd.id = c.available_colors', 'LEFT');
    $this->db->join('tbl_products_size f', 'f.product_id = a.id', 'LEFT');
    $this->db->join('tbl_size q', 'q.id = f.available_size', 'LEFT');
    $this->db->join('tbl_product_variants i', 'i.product_id = a.id', 'LEFT');
    $this->db->join('tbl_size e', 'e.id = i.size', 'LEFT');
    $this->db->where('a.is_deleted', 'N');
    $this->db->where('a.category_id', $cat_id);
    $this->db->where('a.status', 'Active');
    

    if(!empty($category)){
    $this->db->group_start();
        for($i=0;$i<count($category);$i++){
            $this->db->or_where('a.sub_category_Id', $category[$i]);
        }
    $this->db->group_end();
    }
    if(!empty($category_size)){
    $this->db->group_start();
        for($i=0;$i<count($category_size);$i++){
            $this->db->or_where('i.size', $category_size[$i]);
        }
    $this->db->group_end();
    }
    
    if(!empty($category_color)){
     $this->db->group_start();
        for($i=0;$i<count($category_color);$i++){
            $this->db->or_where('i.colour', $category_color[$i]);
        }
    $this->db->group_end();
    }
    
    $membership = $this->session->userdata('user_id');
    if($membership){
        $this->db->where('user_id',$membership);
       $query = $this->db->get('tbl_users')->row();
       $role_id = $query->role_id;
     if($role_id == 1)
     {
         if(!empty($filterPrice1)){
         if(!empty($filterPrice)){
    $this->db->group_start();
           $this->db->or_where('i.price_for_non_members <= ', $filterPrice1);
            $this->db->or_where('i.price_for_non_members >=', $filterPrice);
    $this->db->group_end();
    }
    }
     }
     else{
          if(!empty($filterPrice1)){
         if(!empty($filterPrice)){
    $this->db->group_start();
            $this->db->or_where('i.price_for_members', $filterPrice1);
            $this->db->or_where('i.price_for_members', $filterPrice);
    $this->db->group_end();
    }
    }
         
     }
    }
    // $this->db->where('a.category_id', $category_id); 
    $this->db->group_by('a.id');
    
    $query = $this->db->get();
    $results = $query->result();
    return $results;
}
    public function getExpiredDates($product_id){
           $query = $this->db->select('tbl_offer_expiry.*,tbl_products.id')
                          ->from('tbl_offer_expiry')
                          ->join('tbl_products', 'tbl_products.id = tbl_offer_expiry.product_id')
                          ->where('product_id',$product_id )
                          ->get();
      $result = $query->row();                     
    $now = new DateTime();
    $expiry = new DateTime($result->expiry_date);
    $time_difference = $now->diff($expiry);
    $result->days = $time_difference->d;
    $result->hours = $time_difference->h;
    $result->minutes = $time_difference->i;
    $result->seconds = $time_difference->s;
    return $result;
    }
    function getProductsAvailableColor(){
    $this->db->select('t1.*, t2.colour_code');
    $this->db->from('tbl_product_variants t1');
    $this->db->join('tbl_colours t2', 't2.id = t1.colour');
    $this->db->group_by('t1.colour');
    $query =$this->db->get();
     return $query->result();
    }
    function getProductsAvailableSize(){
    $this->db->select('t1.*, t2.size');
    $this->db->from('tbl_product_variants t1');
    $this->db->join('tbl_size t2', 't2.id = t1.size');
    $this->db->group_by('t1.size');

    $query =$this->db->get();
     return $query->result();
    }
    function getProductsVariants(){
    $this->db->limit(1);    
    $query =$this->db->get('tbl_product_variants');
     return $query->result();
    }
	public function getProductStockById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_product_variants');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}    
	public function totalrecords($cat_id)
	{
	     $this->db->where('category_id', $cat_id);
        $this->db->where('status', 'Active');
        $count = $this->db->from('tbl_products')->count_all_results();
        return $count;
	}
	public function get_records($per_page,$category_id1)
{
    $this->db->where('category_id',$category_id1);
    $this->db->limit(1);
    return $this->db->get('tbl_products')->result();
    
}
public function sortproducts($selectedValue,$category_id)
{
    $this->db->select('a.id as product_id, a.product_name, i.price_for_non_members, i.price_for_members, b.image, i.size, f.available_size, c.available_colors, d.colour_code, g.category_id, g.sub_category_name, g.id, h.id');
    $this->db->from('tbl_products a');
    $this->db->join('tbl_categories h', 'h.id = a.category_id', 'LEFT');
    $this->db->join('tbl_sub_categories g', 'g.id = a.sub_category_Id', 'LEFT');
    $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
    $this->db->join('tbl_products_colors c', 'c.product_id = a.id', 'LEFT');
    $this->db->join('tbl_colours d', 'd.id = c.available_colors', 'LEFT');
    $this->db->join('tbl_products_size f', 'f.product_id = a.id', 'LEFT');
    $this->db->join('tbl_size q', 'q.id = f.available_size', 'LEFT');
    $this->db->join('tbl_product_variants i', 'i.product_id = a.id', 'LEFT');
    $this->db->join('tbl_size e', 'e.id = i.size', 'LEFT');
    $this->db->where('a.is_deleted', 'N');
    $this->db->where('a.status', 'Active');
    $this->db->where('a.category_id', $category_id);

    if ($selectedValue == 2) {
        $this->db->order_by('a.product_name', 'asc');
    } elseif ($selectedValue == 3) {
        $this->db->order_by('a.product_name', 'desc');
    } elseif ($selectedValue == 4) {
        $this->db->order_by('i.price_for_non_members', 'asc');
    } elseif ($selectedValue == 5) {
        $this->db->order_by('i.price_for_non_members', 'desc');
    }

    $query = $this->db->get();
    return $query->result();
}
public function getProductsPaginated($id) {
    $this->db->select('tbl_products.*, tbl_products_gallery.image');
    $this->db->from('tbl_products');
    $this->db->join('tbl_products_gallery', 'tbl_products_gallery.product_id = tbl_products.id');
    
    $this->db->where('tbl_products.status', 'Active');
    $this->db->where('tbl_products.is_deleted', 'N');
    $this->db->order_by('a.id', 'RANDOM');
    $this->db->where('tbl_products.category_id', $id);
    $this->db->group_by('tbl_products.id');
    $this->db->order_by('tbl_products.modified_at','desc');
     $this->db->limit(12);
     $query = $this->db->get();
    return $query->result();
}

public function getColoursBySizeAndProductId($data) {
     $product_id=$this->input->post('product_id');
	$size_id=$this->input->post('size_id');
	$this->db->select('t1.colour,t2.colour_code,t1.in_stock,t1.price_for_non_members,t1.price_for_members');
	$this->db->join('tbl_colours t2', 't2.id = t1.colour');
    $this->db->where('t1.product_id', $product_id);
    $this->db->where('t1.size', $size_id);
    $query = $this->db->get('tbl_product_variants t1');
    return $query->row();
}
public function getSizeByColoursAndProductId($data) {
     $product_id=$this->input->post('product_id');
	$colour_id=$this->input->post('colour_id');
	$this->db->select('t1.size,t2.size as size_name');
	$this->db->join('tbl_size t2', 't2.id = t1.size');
    $this->db->where('t1.product_id', $product_id);
    $this->db->where('t1.colour', $colour_id);
    $query = $this->db->get('tbl_product_variants t1');
    return $query->result();
}
public function get_products_by_offset($offset, $id, $minPrice, $maxPrice, $sortOption) {
    $conditions = array();

    if ($minPrice != '') {
        $conditions[] = 'tbl_products.price >= ' . $minPrice;
    }

    if ($maxPrice != '') {
        $conditions[] = 'tbl_products.price <= ' . $maxPrice;
    }

    $orderBy = '';
    switch ($sortOption) {
        case 1:
        case 2:
            $orderBy = 'tbl_products.product_name ASC';
            break;
        case 3:
            $orderBy = 'tbl_products.product_name DESC';
            break;
        case 4:
            $orderBy = 'tbl_products.price ASC';
            break;
        case 5:
            $orderBy = 'tbl_products.price DESC';
            break;
        default:
            $orderBy = 'tbl_products.modified_at DESC';
    }

    $limit = ' LIMIT 12 OFFSET ' . $offset;

    $sql = "SELECT tbl_products.*, tbl_products_gallery.image
            FROM tbl_products
            JOIN tbl_products_gallery ON tbl_products_gallery.product_id = tbl_products.id
            WHERE tbl_products.status = 'Active' AND tbl_products.is_deleted = 'N' AND tbl_products.category_id=  '$id'  GROUP BY tbl_products.id";

    if (!empty($conditions)) {
        $sql .= ' AND ' . implode(' AND ', $conditions);
    }

    $sql .= ' ORDER BY ' . $orderBy . $limit;

    $query = $this->db->query($sql);
    return $query->result();
}


}
