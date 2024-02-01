<?php class ProductsModel extends CI_Model {
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
    public function getCategories(){
    $this->db->where('is_deleted','N');
    $result = $this->db->get('tbl_categories')->result();
    return $result;
}
	public function getSubCategoryList($id){
		$sql="SELECT category_id,id,sub_category_name FROM `tbl_sub_categories` WHERE category_id=$id AND status='Active' AND is_deleted='N'";
	    $query = $this->db->query($sql);
		return $query->result();
	}
    public function insertProducts($data) {
        $this->db->insert('tbl_products', $data);
        $product_id = $this->db->insert_id();
        return $product_id;
    }
function getProductList($post_data,$filter="")
    { 
	
		$column_search  =   array('a.product_name');

		$column_order   =   array(null,'b.image','a.product_name','c.total_quantity','c.in_stock','a.status',null);

		$order          =  array('a.id' => 'desc');
	

		$table          =  "tbl_products a";

		$this->_get_datatables_query($post_data,$table,$column_search,$column_order,$order);

		if($post_data['length'] != -1 && $filter == "")
		{
			$this->db->limit($post_data['length'], $post_data['start']);
		}
        if (isset($post_data['from_date']) && $post_data['from_date'] != '') {
        $this->db->where('DATE(a.created_at) >=', $post_data['from_date']);
        }
    
        if (isset($post_data['to_date']) && $post_data['to_date'] != '') {
            $this->db->where('DATE(a.created_at) <=', $post_data['to_date']);
        }
    	$this->db->select('a.*,c.image,e.name');
		$this->db->join('tbl_products_gallery c','c.product_id = a.id','LEFT');
		$this->db->join('tbl_categories e','a.category_id = e.id','LEFT');
		$this->db->group_by('a.id');
 		$this->db->order_by('a.modified_at','desc');
		$this->db->where('a.is_deleted','N');
		if($filter == "filter")
		{
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

    public function getproductsById($product_id)
    {
        $this->db->from('tbl_products');
		$this->db->where('id', $product_id);
		$query = $this->db->get();
        return  $query->row();
    }
    public function getproductById($product_id)
    {
		$this->db->where('id', $product_id);
		$query = $this->db->get('tbl_products')->result();
		return $query;
		
    }
        public function getSubCategoriesById($category_id)
    {
        $this->db->from('tbl_sub_categories');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
        return  $query->result();
    }
 public function getproductsSizeeById($product_id) {
    $this->db->select('id, size');
    $this->db->select('(CASE WHEN EXISTS (
        SELECT * FROM tbl_products_size t1
        WHERE t1.available_size = tbl_size.id AND t1.product_id ='.$product_id.'
      ) THEN TRUE ELSE FALSE END) AS Isselected', FALSE);
    $this->db->from('tbl_size');
    $this->db->where('status', 1);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}
 public function getproductsImagesById($product_id) {
     $id=intval($product_id);
    $this->db->from('tbl_products_gallery');
    $this->db->where('product_id', $id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}

 public function getvarientsImagesById($product_id) {
     $id=intval($product_id);
    $this->db->from('tbl_product_variants');
    $this->db->where('product_id', $id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}
public function getProductsColourById($product_id) {
    $this->db->select('id, colors, colour_code');
    $this->db->select('(CASE WHEN EXISTS (
        SELECT * FROM tbl_products_colors t1
        WHERE t1.available_colors = tbl_colours.id AND t1.product_id = '.$product_id.'
      ) THEN TRUE ELSE FALSE END) AS Isselected', FALSE);
    $this->db->from('tbl_colours');
    $this->db->where('status', 1);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}
 public function getSubCategories($category_id) {
    $this->db->from('tbl_sub_categories');
    $this->db->where('category_id', $category_id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}
  public function updateProductDetails($product_id,$data) {
    $this->db->trans_start();
    $this->db->where('id', $product_id);
    $this->db->update('tbl_products',$data);
    if ($product_id >0) {
        $image1 = $this->input->post('image_id[]');
        $cpt = count($_FILES['product_images']['name']);
        for($i=0; $i<$cpt; $i++)
        {  
            if($_FILES['product_images']['size'][$i]>0){
                $ext = pathinfo($_FILES['product_images']['name'][$i], PATHINFO_EXTENSION);
    
                $image       = "product_images".$i.time().'.'.$ext;		
                
                $uploadfile 	= "assets/uploads/products_images/";
                
                move_uploaded_file($_FILES["product_images"]["tmp_name"][$i],  $uploadfile."/".$image);
                
                if($image1[$i]=='0'){
                    $data1		=array(
                    'product_id' => $product_id,
                    'image' => $image,
                    'created_at'          => date('Y-m-d H:i:s'),
                    );
                    $image_inserted=$this->db->insert('tbl_products_gallery',$data1);
                    
                }else{
                    $data1		=array(
                    'product_id' => $product_id,
                    'image' => $image,
                    'modified_at'           => date('Y-m-d H:i:s'),
                    
                    );
                    $this->db->where('id',$image1[$i]);
                    $image_inserted=$this->db->Update('tbl_products_gallery',$data1);
                }
            }
        }

    }
    $this->db->trans_complete();
    return $this->db->trans_status();

  }
    public function updateProduct($productId, $product)
{
    print_r($product);die;
    $this->db->where('product_id', $productId);
    $this->db->update('tbl_products_gallery', $product);
    return true;
}
    public function getproductsImage() {
    // $id=intval($product_id);
    $this->db->from('tbl_products_gallery');
    //$this->db->where('product_id', $id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
}
    public function getExpiryDetailsById($product_id)
    {
        $this->db->from('tbl_offer_expiry');
        $this->db->where('product_id', $product_id);
		$query = $this->db->get();
        return  $query->row();
    }
    public function getsize(){
        $this->db->where('status',1);
        $result = $this->db->get('tbl_size')->result_array();
        return $result;
    }
    public function getColours(){
        $this->db->where('status',1);
        $result = $this->db->get('tbl_colours')->result_array();
        return $result;
    }  
    public function getproductsVarientById($product_id)
    {
        $this->db->from('tbl_product_variants');
		$this->db->where('product_id', $product_id);
		$query = $this->db->get();
        return  $query->result();
    }
    
    public function updateProductDetail($product_id,$data){
        // print_r($data);die;
      $this->db->where  ('id',$product_id);
     $query =  $this->db->update('tbl_product_variants',$data);
     return $query;
        
    }
    public function deleteProductVarient($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_product_variants');
        return array('success' => true, 'message' => 'Product details deleted successfully!');
    }
    public function getProductPrice($id) {
        $this->db->where('product_id', $id);
        $result=$this->db->get('tbl_product_variants')->row();
        return $result;
    }
  	public function delete_product($id,$data){
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_products',$data); 
		return $query ;
	}
  	public function changeToOffer($id,$data,$data1){
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_products',$data); 
		$this->db->where('product_id',$id);
		$query1 = $this->db->update('tbl_product_variants',$data1); 
		return true ;
	}
	public function checkProductExists($product_id, $size, $color) {
        $this->db->from('tbl_product_variants');
        $this->db->where('product_id', $product_id);
        $this->db->where('size', $size);
        $this->db->where('colour', $color);
        $result = $this->db->get();
        return $result->num_rows();
    }
	
}