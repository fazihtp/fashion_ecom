
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	   public function __construct() {

        parent::__construct();
		$this->load->model('AdminModel');
        $this->load->helper(array('form','url'));
        $this->load->library(array('upload','encryption'));
       	if(!$this->session->userdata('user_id'))
        {
            redirect(base_url() . 'login');
        } 
    }
	public function index()
	{
	   //   $data['districts'] = $this->db->get('tbl_districts')->result();
	      $data['plans']     =$this->db->get('tbl_master_plan')->result();
		$this->load->view('admin/member_list/requested_membership',$data);
	}
	public function logout(){
		 $this->session->sess_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function dashboard(){
	     
	      $data_array['count'] = $this->AdminModel->getcountUser();
	      $data_array['count1'] = $this->AdminModel->getcountAmmount();
	      $data_array['count2'] = $this->AdminModel->getcountProducts();
	      $data_array['count3'] = $this->AdminModel->getcountOrders();
	      $this->load->view('admin/dashboard/dashboard',$data_array);
	}
	public function approved_list()
	{
		$this->load->view('admin/member_list/approved_members');
	}

    function get_requested_members()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getRequestedMembers($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			if($vend->subscription_id==1){
			    $icon='fa-solid fa-award';
			    $style='#C0C0C0';
			}else if($vend->subscription_id==2){
			    $icon='fa-solid fa-medal';
			     $style='#FFD700';
			
			}else if($vend->subscription_id==3){
			    $icon='fas fa-gem';
			     $style='#b9f2ff';
			}else{
			    $icon='fas fa-user-tie';
			    $style='#007FFF';
			}
			$row_data[]   =   "<i class='".$icon."' style='font-size: 24px;color:".$style.";'></i>";
			$row_data[]   =   $vend->plan_name;
			$row_data[]   =   $vend->member_name;
			$row_data[]   =   $vend->user_email;
			$row_data[]   =   $vend->phone_number;
			$row_data[]   =   $vend->status;
			$btn		  =	  "";
			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#viewModal' onclick='getmember(".$vend->id.")' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp";
			
			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#approvedModal' onclick='approve_member(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";

			$btn		 .=	  "<a data-bs-target='#rejectedModal' data-bs-toggle='modal' onclick='reject_member(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
		$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_member(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminModel->getRequestedMembers($_POST,"filter"),
			"recordsFiltered" => $this->AdminModel->getRequestedMembers($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }
    public function approve_member(){
    // 	$member=$id;
        $id = $this->input->post('approved');
		$data=$this->AdminModel->activateMember($id);
		if ($data) {
            $this->session->set_flashdata('flashSuccess', 'Approved ');
            redirect(base_url() . 'Admin/index');
        } else {
            $this->session->set_flashdata('flashError', 'Approved  Failed!');
            redirect(base_url() . 'Admin/index');
        }
	 }
    public function getmemberDetails(){
    $id = $this->input->post('id');
    $this->db->select('tbl_member_details.*, tbl_subscription_details.member_id,tbl_subscription_details.subscription_id');
    $this->db->from('tbl_member_details');
     $this->db->join('tbl_subscription_details', 'tbl_subscription_details.member_id = tbl_member_details.id');
    $this->db->where('tbl_member_details.id', $id);
    $result = $this->db->get()->row();
// 	    $id = $this->input->post('id');
// 		$this->db->where('id',$id);
// 		$result = $this->db->get('tbl_member_details')->row();
// 		$result =$this->AdminModel->getMember($id);
// // 		$res= $this->db->last_query();
// // 		print_r($res);die;
// // 		print_r($result);die;
		
		echo json_encode($result);
	 }
	 
	 public function editUsermember()
{
    $id = $this->input->post('id');
    $selectdistrict = $this->input->post('district');
    $selectplan = $this->input->post('plan');

    $data = array(
        'member_name' => $this->input->post('username'),
        'user_email' => $this->input->post('useremail'),
        'phone_number' => $this->input->post('phone_number'),
        'address' => $this->input->post('useraddress'),
        'city' => $this->input->post('usercity'),
        'pin_code' => $this->input->post('userpincode'),
        'district_id' => $selectdistrict,
        'status' => 'Active',
        'updated_at' => date("Y-m-d H:i:s"),
        'is_deleted' => 'N',
    );

    $result = $this->AdminModel->editMember($id, $data);

    if ($result) {
        $subData = array(
            'subscription_id' => $selectplan,
        );
        $subresult = $this->AdminModel->editSubcription($id, $subData); 

        if ($subresult) {
            $username= array(
                'user_name' =>  $this->input->post('phone_number'),
                );
                $userresult = $this->AdminModel->editUsername($id, $username);
               if ($userresult) { 
            $this->session->set_flashdata('flashSuccess', 'Member  Updated!');
            redirect(base_url() . 'Admin/index');
        } else {
            $this->session->set_flashdata('flashError', 'Subscription Update Failed!');
            redirect(base_url() . 'Admin/index');
        }
    } else {
        $this->session->set_flashdata('flashError', 'Member  Updated Failed!');
        redirect(base_url() . 'Admin/index');
    }
    }
}

	public function addMembers(){
// 	$this->load->library('form_validation');
//   $this->form_validation->set_rules('Phone_number', 'phone', 'trim|required|is_unique[tbl_member_detail.phone_number]|max_length[10]');
  
//     if ($this->form_validation->run() == FALSE) {
//          $this->session->set_flashdata("error", validation_errors());
      
//     } else {
    $selectplan = $this->input->post('plan');
    $selectdistrict = $this->input->post('district');
    $fullName = $this->input->post('fname') . ' ' . $this->input->post('lname');
    $password = $this->input->post('password');
    $confirmPassword = $this->input->post('confirmpassword');

    $hashedPassword=sha1($password);

    $data = array(
        'member_name' => ucfirst($fullName),
        'user_email' => $this->input->post('email'),
        'phone_number' => $this->input->post('phone_number'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'pin_code' => $this->input->post('postcode'),
        'district_id' => $selectdistrict,
        'status' => 'Active',
        'created_at' => date("Y-m-d H:i:s"),
        'is_deleted' => 'N',
    );

    $result = $this->AdminModel->addMember($data);
    
    if ($result) {
        $lastInsertID = $this->db->insert_id();
        $userData = array(
            'user_id' => $lastInsertID,
            'user_name' => $this->input->post('phone_number'), 
            'password' => $hashedPassword,
            'role_id' => '2', 
        );

        $userResult = $this->AdminModel->addUser($userData);
        if ($userResult) {
            $futureDate = date('Y-m-d', strtotime('+1 year'));
            $subData = array(
                'member_id' => $lastInsertID,
                'subscription_id' => $selectplan,
                'starting_date' => date('Y-m-d'),
                'ending_date' => $futureDate,
            );
            $subresult = $this->AdminModel->userSubcription($subData);
            if ($subresult) {
                $this->session->set_flashdata('flashSuccess', 'Member Created!');
                redirect(base_url() . 'Admin/index');
            } else {
                $this->session->set_flashdata('flashError', 'Subscription Creation Failed!');
                redirect(base_url() . 'Admin/index');
            }
        } else {
            $this->session->set_flashdata('flashError', 'User Creation Failed!');
            redirect(base_url() . 'Admin/index');
        }
    } else {
        $this->session->set_flashdata('flashError', 'Member Creation Failed!');
        redirect(base_url() . 'Admin/index');
    }
    }
// }

  
  public function delete_member(){
    	$id = $this->input->post('delete');
		$data=$this->AdminModel->deleteMember($id);
		if ($data) {
        $this->session->set_flashdata('flashSuccess', 'Deleted ');
            redirect(base_url() . 'Admin/index');
        } else {
            $this->session->set_flashdata('flashError', 'Deleted  Failed!');
            redirect(base_url() . 'Admin/index');
        }
	 }
    
    
    
    function get_approved_members()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getApprovedMembers($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			$row_data[]   =   $vend->member_name;
			$row_data[]   =   $vend->user_email;
			$row_data[]   =   $vend->address;
			$row_data[]   =   $vend->phone_number;
            $row_data[] = date('d M y h:i A', strtotime($vend->created_at));
        	$btn		  =	  "";
			$btn		 .=	  "<a href='" . site_url('admin/member_view/'.$vend->id.'') . "' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp";
            $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_member(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 24px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminModel->getApprovedMembers($_POST,"filter"),
			"recordsFiltered" => $this->AdminModel->getApprovedMembers($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }
	public function member_view($id)
	{
	    $data['member_details']=$this->AdminModel->getMemberDetailsbyId($id);
	     
	    $data['orders']    =$this->AdminModel->getorderProducts($id);
	   // print_r($this->db->last_query());die;
	     $data['count'] = $this->AdminModel->getcountorder($id);
	    
	    $data['districts'] = $this->db->get('tbl_districts')->result();
	    $data['plans']     =$this->db->get('tbl_master_plan')->result();
	   // print_r($data['orders']);die;
		$this->load->view('admin/member_list/member_view',$data);
	}

    function getCategoryList()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getCategoryList($_POST);
		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
        	$row_data[] = "<img class='vendor-thumb' src='" . base_url() . "assets/uploads/offerzone_category/".$vend->category_image."' alt='Category image'>";
        	$row_data[]   =   $vend->sub_category_name;
        	$row_data[]   =   $vend->category_description;
			$btn		  =	  "";
// 			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#showModal' onclick='approve_member(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";

// 			$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='reject_member(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
// 		$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_member(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
         	$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#modal-edit-contact' onclick='getCategory_list(".$vend->offer_id.")'  class='edit-item-btn'><i class='mdi mdi-pencil-circle' style='font-size: 24px;color:##88aaf3;';></i></a>&nbsp";
	    
    		if($vend->status == 'Active'){
            $btn		 .=	  "<label class='switch' style='width: 47px;height: 25px;color:#34c997;' >
                                <input data-bs-target='#' data-bs-toggle='modal' type='checkbox'  checked id='ID'onchange='deactive_category(".$vend->id.")'>
                                <span class='slider round'></span>
                                </label>&nbsp;";
    		}else{
    		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                                <input data-bs-target='# data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_category(".$vend->id.")' >
                                <span class='slider round'></span>
                                </label>&nbsp;";
    		}
    		$btn		 .=	  "<a data-bs-target='#deletecategory' data-bs-toggle='modal' onclick='delete_category(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminModel->getCategoryList($_POST,"filter"),
			"recordsFiltered" => $this->AdminModel->getCategoryList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }


 public function getCategory(){
    $id = $this->input->post('id');
    
    $this->db->select('*');
    $this->db->from('tbl_sub_categories t1');
    $this->db->join('tbl_offerzone_categories t2', 't2.sub_category_id = t1.id');
    $this->db->where('t1.id',$id);
    $query = $this->db->get();
    $result = $query->row();
	echo json_encode($result);
 }

     
     
 
    
 
   
   
 



public function updateUserPassword(){
    $data=$_POST;
    
    $data1=$this->AdminModel->updateUserPassword($data);
    if($data1){
        $this->session->set_flashdata('flashSuccess','Updated Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
    redirect($_SERVER['HTTP_REFERER']);

    }
  
     
    public function category()
	{
		$this->load->view('admin/category/main_category');
	}
	
	public function view_product_list($id)
	{ 
	     $id1 = base64_decode($id);
         $data['categories'] = $this->AdminModel->getCategories();
         $data['size'] = $this->AdminModel->getsize();
         $data['colours'] = $this->AdminModel->getColours();
	     $data['product']=$this->AdminModel->getproductsById($id1);
	     $data['img'] = $this->db->get_where('tbl_offerzone_products_gallery',array('product_id'=>$id1))->result(); 
	     $data['clr'] = $this->AdminModel->getofferColours($id1);
	     $data ['sze'] = $this->AdminModel->getofferSize($id1);
         //print_r($this->db->last_query());die;
	     $data['counter'] = [];
         //print_r( $data['sze']);die;
	   
	     $this->load->view('admin/offerzone/view_product_list',$data);
	}
	public function updateProducts()
	{
	  
// 	 $selected_sizes = $this->input->post('size');
// 	 $product_id = $this->input->post('id');
//  //print_r($selected_sizes);die;
//  //$this->db->where('id',$sze->id);
//  $id=intval($product_id);
//  $this->db->where('product_id', $id);
// // print_r($product_id);die;
//     $res=$this->db->delete('tbl_offerzone_products_size');
    
  
//     if (!empty($selected_sizes)) {
//         foreach ($selected_sizes as $size) {
//             $data = array(
//                 'product_id' => $id,
//                 'available_size' => $size
//             );
//          $result=   $this->db->insert('tbl_offerzone_products_size', $data);
//         }
//     }
    // print_r($this->db->last_query());die;

	   $result = $this->AdminModel->updateProducts();

	    if($result){
        $this->session->set_flashdata('flashSuccess','Updated Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
     redirect(base_url() . 'Admin/offer_products_list');
    }
    
    public function checkbannerActive(){
        $id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_products WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_products',$array);
	    	}else  {
		    	$data = array(
				'status'=>'Active',
				'is_deleted'=>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_products',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
		redirect(base_url() . 'Admin/offer_products_list');
    }
   

    
    
   
  public function check_phoneno_exists(){
        $phone=$_POST['phone_number'];
        $result =$this->AdminModel->check_phoneno_exists($phone);
//var_dump($result);die;
    echo json_encode($result);
  
  }
    public function edit_phoneno_exists(){
    $phone=$_POST['phone_number'];
    $result =$this->AdminModel->check_phoneno_exists($phone);
    //var_dump($result);die;
    echo json_encode($result);
        
   }
public function updateMembersDetails(){

    $id = $this->input->post('id');
    $selectplan = $this->input->post('plan');
    $selectdistrict = $this->input->post('district');

    $data = array(
        'member_name' => $this->input->post('firstname'),
        'user_email' => $this->input->post('firstemail'),
        'phone_number' => $this->input->post('firstphone'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'pin_code' => $this->input->post('pincode'),
        'district_id' => $selectdistrict,
        'status' => 'Active',
        'updated_at' => date("Y-m-d H:i:s"),
        'is_deleted' => 'N',
    );

    $result = $this->AdminModel->editMember($id,$data);

    if ($result) {
        $lastInsertID = $result;
        $futureDate = date('Y-m-d', strtotime('+1 year'));
        $subData = array(
            'member_id' => $lastInsertID,
            'subscription_id' => $selectplan,
            'starting_date' => date('Y-m-d'),
            'ending_date' => $futureDate,
        );
        $subresult = $this->AdminModel->editSubcription($id, $subData);

        if ($subresult) {
            $this->session->set_flashdata('flashSuccess', 'Updated sucessfull!');
            redirect(base_url() . 'Admin/member_view');
        } else {
            $this->session->set_flashdata('flashError', 'Something Went Wrong!!');
            redirect(base_url() . 'Admin/member_view');
        }
    } 
  }
  
    
    
       
   
   
}

