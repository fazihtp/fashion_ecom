<?php class OfferzoneModel extends CI_Model {
    
    //   public function getofferzone($product_id) {
    //     $this->db->where('offer_category_id',$product_id);
    //     $query=$this->db->get('tbl_offerzone_products')->result();
    //     return $query;
    // }
    
     public function getOfferProducts($id)
      
    {
        
      $this->db->select('tbl_offerzone_products.id,tbl_offerzone_products.offer_category_id,tbl_offerzone_products.product_description,tbl_offerzone_products.product_name, tbl_offerzone_products.price, tbl_offerzone_products_size.available_size,  tbl_offer_colors.available_colors, tbl_colours.colour_code, tbl_size.size,tbl_size.id as size_id ,tbl_offerzone_products_gallery.image ');
        $this->db->from('tbl_offerzone_products');
        $this->db->join('tbl_offerzone_products_gallery', 'tbl_offerzone_products_gallery.product_id = tbl_offerzone_products.id','LEFT');
        $this->db->join('tbl_offerzone_products_size', 'tbl_offerzone_products_size.available_size = tbl_offerzone_products.id','LEFT');
        $this->db->join('tbl_offer_colors', 'tbl_offer_colors.available_colors = tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->join('tbl_colours', 'tbl_colours.id =  tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->join('tbl_size', 'tbl_size.id =  tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->where('tbl_offerzone_products.offer_category_id', $id);
        $this->db->where('tbl_offerzone_products.is_deleted', 'N');
        $this->db->where('tbl_offerzone_products.status', 'Active');
        $this->db->group_by('tbl_offerzone_products.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getColours(){
     $this->db->where('status',1);
     $result = $this->db->get('tbl_colours')->result();
     return $result;
    }
    public function getsize(){
        $this->db->where('status',1);
        //  $this->db->where('id',$id);
        $query=$this->db->get('tbl_size')->result() ;        
        return $query;

        return $query->result();
    }
    public function getimage($id){
         $this->db->where('product_id',$id);
        $query=$this->db->get('tbl_offerzone_products_gallery')->result() ;        
        return $query;
    }
    
    public function getproductname($id){
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_offerzone_categories')->row() ;        
        return $query;
    }
    public function getproduct($id){
        
    }
    public function getOfferProduct($id)
      
    {
        
      $this->db->select('tbl_offerzone_products.id,tbl_offerzone_products.offer_category_id,tbl_offerzone_products.product_description,tbl_offerzone_products.product_name, tbl_offerzone_products.price,tbl_offerzone_products.stock, tbl_offerzone_products_size.available_size,  tbl_offer_colors.available_colors, tbl_colours.colour_code,tbl_colours.id  as color_id, tbl_size.size,tbl_offerzone_products_gallery.image ');
        $this->db->from('tbl_offerzone_products');
        $this->db->join('tbl_offerzone_products_gallery', 'tbl_offerzone_products_gallery.product_id = tbl_offerzone_products.id','LEFT');
        $this->db->join('tbl_offerzone_products_size', 'tbl_offerzone_products_size.available_size = tbl_offerzone_products.id','LEFT');
        $this->db->join('tbl_offer_colors', 'tbl_offer_colors.available_colors = tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->join('tbl_colours', 'tbl_colours.id =  tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->join('tbl_size', 'tbl_size.id =  tbl_offerzone_products.offer_category_id','LEFT');
        $this->db->where('tbl_offerzone_products.id', $id);
        $this->db->where('tbl_offerzone_products.is_deleted', 'N');
        $this->db->where('tbl_offerzone_products.status', 'Active');
        $this->db->group_by('tbl_offerzone_products.id');
        $query = $this->db->get();
        return $query->result();
    }
        public function getproducts($id) {
        $this->db->select('tbl_offerzone_products.*,tbl_offerzone_categories.category_name');
        $this->db->from('tbl_offerzone_products');
        $this->db->join('tbl_offerzone_categories', 'tbl_offerzone_categories.id = tbl_offerzone_products.offer_category_id');
       
        $this->db->where('tbl_offerzone_products.status', 'Active');
        $this->db->where('tbl_offerzone_products.is_deleted', 'N');
        $this->db->where('tbl_offerzone_products.id', $id);
        $this->db->group_by('tbl_offerzone_products.id'); 
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    public function getExpiredDates($id){
           $query = $this->db->select('offer_category_id,product_name,expires_in')
                          ->from('tbl_offerzone_products')
                          ->where('id',$id )
                          ->get();
      $result = $query->row();                     
    $now = new DateTime();
    $expiry = new DateTime($result->expires_in);
    $time_difference = $now->diff($expiry);
    $result->days = $time_difference->d;
    $result->hours = $time_difference->h;
    $result->minutes = $time_difference->i;
    $result->seconds = $time_difference->s;
    return $result;
    }
   
}