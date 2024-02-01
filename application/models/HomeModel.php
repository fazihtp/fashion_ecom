<?php class HomeModel extends CI_Model {


    public function isPhoneNumberexists($phoneNumber) {
            $this->db->where('user_name', $phoneNumber);
            $query = $this->db->get('tbl_users');
             if ($query->num_rows() > 0) {
                 return true;
            } else {
                 return false;
            }
        }
        public function postUser($data) {
            $this->db->trans_start();
               $firstName = urldecode($this->input->post('firstname'));
               $lastName = urldecode($this->input->post('lastname'));
               $fullName = $firstName.' '.$lastName;
               $address         = $this->input->post('address');
               $phoneNumber     = $this->input->post('phonenumber');
               $pincode         = $this->input->post('postalcode');
               $district        = $this->input->post('district_id');
               $city            = $this->input->post('city');
               $email           = urldecode($this->input->post('email'));
               $password        = $this->input->post('password');
             $array = array(
                 'member_name' => $fullName,
                 'user_email' => $email,
                 'phone_number' => $phoneNumber,
                 'address' => $address,
                 'city	' => $city,
                 'pin_code' => $pincode,
                 'district_id' => $district,
                 'status	' => "Approved",
                 'is_deleted' => "N",
                 'created_at' => date('Y-m-d-h:i:s'),
                 'updated_at' =>  date('Y-m-d-h:i:s'),
             );
             $this->db->insert('tbl_member_details', $array);
             $user_id=$this->db->insert_id();
             $hashedPassword = sha1($password);
                     $array_user = array(
                 'user_id' => $user_id,
                 'user_name' => $phoneNumber,
                 'password' => $hashedPassword,
                 'role_id' => 2,
                 'status' => 1,
                 'created_at' =>  date('Y-m-d-h:i:s'),
                 'modified_at' =>  date('Y-m-d-h:i:s'),
             );
             $this->db->insert('tbl_users', $array_user);
             $this->db->trans_complete();
             $this->db->trans_status();
             return $user_id;
         }
      public function getOfferProducts($id)
    {
        // $this->db->select('tbl_offerzone_products.product_name, tbl_offerzone_products.price, tbl_offerzone_products.offer_category_id, tbl_offerzone_products_gallery.product_id, tbl_offerzone_products_gallery.image');
        $this->db->select('tbl_offerzone_products.product_name, tbl_offerzone_products.price, tbl_offerzone_products.offer_category_id, tbl_offerzone_products_gallery.product_id,tbl_offerzone_products_size.product_id,tbl_offerzone_products_size.available_size,tbl_offer_colors.product_id,tbl_offer_colors.available_colors,tbl_colours.id,tbl_colours.colour_code, MIN(tbl_offerzone_products_gallery.image) AS image');
        $this->db->from('tbl_offerzone_products');
        $this->db->join('tbl_offerzone_products_gallery', 'tbl_offerzone_products_gallery.product_id = tbl_offerzone_products.offer_category_id');
        $this->db->join('tbl_offerzone_products_size', 'tbl_offerzone_products_size.product_id = tbl_offerzone_products.offer_category_id');
        $this->db->join('tbl_offer_colors', 'tbl_offer_colors.product_id = tbl_offerzone_products.offer_category_id');
        $this->db->join('tbl_colours', 'tbl_colours.id = tbl_offer_colors.product_id');
        $this->db->where('tbl_offerzone_products.offer_category_id', $id);
        $query = $this->db->get();

        return $query->result();
    }
    public function getproducts()
    {
        $this->db->select('a.id, a.product_name,a.price,a.quantity,g.image as image');
        $this->db->join('tbl_products_gallery g', 'g.product_id = a.id', 'LEFT');
        $this->db->where('a.status', 'Active');
        $this->db->group_by('a.id');
        $this->db->order_by('a.modified_at','desc');
        $this->db->limit(12);
        $query = $this->db->get('tbl_products a');
        return $query->result();
    }
    
    public function newproducts()
    {
        $this->db->select('a.id, a.product_name,a.price,a.quantity,g.image as image');
        $this->db->join('tbl_products_gallery g', 'g.product_id = a.id', 'LEFT');
        $this->db->where('a.status', 'Active');
        $this->db->group_by('a.id');
         $this->db->order_by('a.id', 'RANDOM');
        $this->db->limit(12); 
        
       
        $query = $this->db->get('tbl_products a');
        return $query->result();
    }

    
    public function getsize(){
        $this->db->select('id,size');
        $this->db->where('status',1);
        $this->db->order_by('id');
        $result = $this->db->get('tbl_size')->result();
        return $result;
    }
    public function getColours(){
        $this->db->select('id,colors,colour_code');
        $this->db->where('status',1);
        $this->db->order_by('id');
        $result = $this->db->get('tbl_colours')->result();
        return $result;
    }  
   public function getcount()
    {
    $this->db->select('a.id, a.product_name,  g.price_for_non_members, g.price_for_members, b.image, e.size, f.available_size, c.available_colors, d.colour_code');
        $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
        $this->db->join('tbl_products_colors c', 'c.product_id = a.id', 'LEFT');
        $this->db->join('tbl_colours d', 'd.id = c.available_colors', 'LEFT');
        $this->db->join('tbl_products_size f', 'f.product_id = a.id', 'LEFT');
         $this->db->join('tbl_product_variants g', 'g.product_id = a.id', 'LEFT');
         $this->db->join('tbl_size e', 'e.id = g.size', 'LEFT');
        $this->db->where('a.is_deleted', 'N');
        $this->db->where('a.status', 'Active');
        $this->db->group_by('a.id');
        $query = $this->db->get('tbl_products a');
        $count = $query->num_rows();
        
        return $count;

    }
    public function getuser()
    {
        $this->db->select('subscription_id');
        $this->db->from('tbl_subscription_details');
       // $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->row();
        $subscription = $result->subscription_id;
    //    print_r($result);die;
        return 1;
    
    }
    public function getsearch($product_name)
    {
        $this->db->select('a.id,a.product_name,a.quantity,a.price, b.image');
        $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
        $this->db->where('a.is_deleted', 'N');
        $this->db->where('a.status', 'Active');
        $this->db->group_by('a.id');
        
      
      if (!empty($product_name)) {
        $this->db->group_start();
        $this->db->like('a.product_name', $product_name);
        $this->db->group_end();
    }
        
        $query = $this->db->get('tbl_products a');
        $results = $query->result();
        return $results;
    }


        public function getcounts($product_name)
        {
            $this->db->select('COUNT(id) as count');
            $this->db->from('tbl_products');
            $this->db->where('is_deleted', 'N');
            $this->db->where('status', 'Active');
            
            if (!empty($product_name)) {
                $this->db->group_start();
                $this->db->like('product_name', $product_name);
                $this->db->group_end();
            }
        
            $query = $this->db->get();
            $result = $query->row();
            $count = $result->count;
            return $count;
        }
public function getreview()
{
    $this->db->where('status',1); 
    $result =  $this->db->get('tbl_review')->result();
  return $result;
} 
public function getcategory()
{
    $this->db->select('a.id, a.product_name,  h.price_for_non_members, h.price_for_members, b.image, e.size, f.available_size, c.available_colors, d.colour_code ,a.category_id');
    $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
    $this->db->join('tbl_products_colors c', 'c.product_id = a.id', 'LEFT');
    $this->db->join('tbl_colours d', 'd.id = c.available_colors', 'LEFT');
    $this->db->join('tbl_products_size f', 'f.product_id = a.id', 'LEFT'); // Add the alias 'f' to the join statement
    $this->db->join('tbl_size e', 'e.id = f.available_size', 'LEFT');
    $this->db->join('tbl_categories g', 'g.id = a.category_id');
    $this->db->join('tbl_product_variants h', 'h.product_id = a.id', 'LEFT');
    $this->db->where('a.is_deleted', 'N');
    $this->db->where('a.status', 'Active');
    $this->db->group_by('a.id');
  //  $this->db->group_by('c.product_id'); // Group by c.product_id colors
 //   $this->db->group_by('f.product_id'); // Group by f.product_id sizes
    $result = $this->db->get('tbl_products a');
    return $result->result();
}
public function getBanner()
{
  $this->db->where('is_deleted','N');
  $this->db->where('status','Active');
  $result =  $this->db->get('tbl_banner')->result();
  return $result;
} 
public function postPlan($data){
    $this->db->insert('tbl_subscription_details',$data);
    return $this->db->insert_id();
}
public function getProductsByid($cat_id)
{
  $this->db->select('a.id, a.product_name,g.price_for_non_members, g.price_for_members, b.image, e.size, c.available_colors, d.colour_code');
    $this->db->join('tbl_products_gallery b', 'a.id = b.product_id', 'LEFT');
    $this->db->join('tbl_products_colors c', 'c.product_id = a.id', 'LEFT');
    $this->db->join('tbl_colours d', 'd.id = c.available_colors', 'LEFT');
    $this->db->join('tbl_product_variants g', 'g.product_id = a.id', 'LEFT');
    $this->db->join('tbl_size e', 'e.id = g.size', 'LEFT');
    $this->db->where('a.is_deleted', 'N');
    $this->db->where('a.status', 'Active');
    $this->db->where('a.category_id', $cat_id);
    $this->db->group_by('a.id');
       $this->db->order_by('a.id', 'RANDOM');

    $this->db->limit(12);

    $query = $this->db->get('tbl_products a');
    return $query->result();
}
public function getCategoriesList()
    {
    
    $this->db->where('status', 'Active');
    $this->db->where('category_status !=', 'OFFERS');
    $this->db->where('is_deleted', 'N');
    $query = $this->db->get('tbl_categories');
     return $query->result();
    }


}