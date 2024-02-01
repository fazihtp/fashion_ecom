<?php class MobileApiModel extends CI_Model {
    
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

    //   $firstName       = $this->input->post('firstName');
    //     $lastName        = $this->input->post('lastname');
    //     $fullName        = $firstName . ' ' . $lastName;
        $address         = $this->input->post('address');
        $phoneNumber     = $this->input->post('phonenumber');
        $pincode         = $this->input->post('postalcode');
        $district        = $this->input->post('district_id');
        // $subscriptionPlan = $this->input->post('select_plan');
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
            'status	' => "New",
            'is_deleted' => "N",
            'created_at' => date('Y-m-d-h:i:s'),
            'updated_at' =>  date('Y-m-d-h:i:s'),
        );
        $this->db->insert('tbl_member_details', $array);
        $user_id=$this->db->insert_id();
        // $futureDate = date('Y-m-d', strtotime('+1 year'));
        //         $array_plan = array(
        //     'member_id'       => $user_id,
        //     'subscription_id' => $subscriptionPlan,
        //     'starting_date'   => date('Y-m-d'),
        //     'ending_date'     => $futureDate,
        //     );
        // $this->db->insert('tbl_subscription_details', $array_plan);
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
	function checkUser($user_id){
		$query = $this->db->query("SELECT t1.*,t2.member_name FROM tbl_users t1 JOIN tbl_member_details t2 ON t2.id=t1.user_id  WHERE t1.user_id=$user_id AND t1.status=1 AND t1.role_id=2");
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}
	public function checkLoginUser($data){
		$email=$this->input->post('user_name');
		$password=$this->input->post('password');
        $hashedPassword = sha1($password);
// 		print_r($email);die;
        $sql="SELECT t1.user_id,t2.member_name,t1.role_id FROM tbl_users t1 JOIN tbl_member_details t2 ON t2.id=t1.user_id WHERE t1.user_name='$email' AND t1.password='$hashedPassword' AND t1.status='1' AND t1.role_id='2' ";
		$query = $this->db->query($sql);
		$result=$query->row();
        if(!empty($result)) {
            return $result;
        }else{
            return false;
        }
    }
	function getclientDetailsbyId($user_id){
		$this->db->select('a.*, c.plan_name, b.subscription_id,c.plan_name,b.ending_date,d.role_id');
        $this->db->join('tbl_subscription_details b', 'a.id = b.member_id', 'LEFT');
        $this->db->join('tbl_master_plan c', 'b.subscription_id = c.id', 'LEFT');
		$this->db->join('tbl_users d', 'a.id = d.user_id', 'LEFT');
        $this->db->where('a.is_deleted', 'N');
        $this->db->where('a.id', $user_id);
        $query = $this->db->get('tbl_member_details a');
        return $query->row();
	}
    public function updateMemberDetails($details){
		$member_id=$this->input->post('user_id');
        // var_dump($member_id);die;
    
        $array = array(
            'member_name' => $this->input->post('member_name'),
            'user_email' => $this->input->post('user_email'),
            'phone_number' => $this->input->post('phone_number'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'pin_code' =>$this->input->post('pin_code'),
            'district_id' =>$this->input->post('district_id'),
            
            'updated_at' =>  date('Y-m-d-h:i:s'),
        );
        $this->db->where('id',$member_id);
	    $this->db->update('tbl_member_details',$array);

        $array_user = array(
            'user_name' => $this->input->post('phone_number'),
            'modified_at' =>  date('Y-m-d-h:i:s'),
        );
        $this->db->where('user_id',$member_id);
	    return $this->db->update('tbl_users',$array_user);
	}
    public function OfferProductCategory() {
        
        $category_details = $this->getCategoryDetails();
        // print_r();die;
        $new_array=[];

        if(!empty($category_details)){
			foreach($category_details as $key=>$res){
               
                $temp[$key]['id']=$res['id'];
				$temp[$key]['sub_category_name']=$res['sub_category_name'];
				$temp[$key]['category_id']=$res['category_id'];
				$temp[$key]['category_description']=$res['category_description'];
				$temp[$key]['photo']=base_url().'assets/uploads/offerzone_category/'.$res['category_image'];
				// $temp[$key]['photo']="".base_url()."assets/uploads/offerzone_category/".$res['category_image'];
				
				array_push($new_array, $temp); 
			}
			$result1=end($new_array);
			}else{
				$result1=[];
			}


        return $result1;
    }	
    public function getCategoryDetails() {
        $sql = 'SELECT * FROM tbl_categories t1 JOIN tbl_sub_categories t2 ON t2.category_id=t1.id JOIN tbl_offerzone_categories t3 ON t3.sub_category_id=t2.id WHERE t1.category_status="OFFERS" AND t1.status="Active" AND t1.is_deleted="N"';
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
     public function getOfferProducts($id) {
        
        $offer_details = $this->getOfferProductsById($id);
        // print_r($this->db->last_query());die;
        $new_array=[];

        if(!empty($offer_details)){
			foreach($offer_details as $key=>$res){
                $temp[$key]['photo']=base_url().'assets/uploads/offerzone_products/'.$res['first_photo'];
                $temp[$key]['id']=$res['id'];
				$temp[$key]['product_name']=$res['product_name'];
				$temp[$key]['price']=$res['price'];
				// $temp[$key]['']=$res['price'];
				
				// $temp[$key]['photo']="".base_url()."assets/uploads/offerzone_category/".$res['category_image'];
				
				array_push($new_array, $temp); 
			}
			$result1=end($new_array);
			}else{
				$result1=[];
			}


        return $result1;
    }	
    // public function getOfferProductsById($id) {
    //     $sql = "SELECT * FROM tbl_offerzone_products t1 JOIN tbl_offerzone_products_size t2 ON t1.id=t2.product_id JOIN tbl_offer_colors t3 ON t1.id=t3.product_id JOIN tbl_offerzone_products_gallery t4 ON t1.id=t4.product_id WHERE t1.offer_category_id=$id";
    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // } 
    public function getOfferProductsById($id) {
        $sql = "SELECT t1.*, SUBSTRING_INDEX(GROUP_CONCAT(t4.image), ',', 1) AS first_photo
        FROM tbl_offerzone_products t1
        JOIN tbl_offerzone_products_gallery t4 ON t1.id = t4.product_id
        WHERE t1.offer_category_id = $id
        GROUP BY t1.id
        HAVING t1.expires_in > CURRENT_TIMESTAMP AND t1.is_expired='N' AND t1.is_deleted='N'";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
}
