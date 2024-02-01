
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
		$this->load->view('admin/member_list/requested_membership');
	}
	public function approved_list()
	{
		$this->load->view('admin/member_list/approved_members');
	}
	public function rejected_list()
	{
		$this->load->view('admin/member_list/rejected_list');
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
			    $style='#FFD700';
			}else if($vend->subscription_id==2){
			    $icon='fa-solid fa-medal';
			     $style='#C0C0C0';
			}else{
			    $icon='fas fa-gem';
			     $style='#b9f2ff';
			}
			$row_data[]   =   "<i class='".$icon."' style='font-size: 24px;color:".$style.";'></i>";
			$row_data[]   =   $vend->member_name;
			$row_data[]   =   $vend->user_email;
			$row_data[]   =   $vend->phone_number;
			$row_data[]   =   $vend->status;
			$btn		  =	  "";
			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#showModal' onclick='approve_member(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";

			$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='reject_member(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
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
    public function approve_member($id){
    	$member=$id;
		$data=$this->AdminModel->activateMember($member);
// 		$data1=$this->AdminModel->getMemberDetails($member);
// 	    $whatsapp_settings=$this->db->get("tb_whatsapp_settings")->row();
// 			$instance_id=$whatsapp_settings->instance_id;
// 			$access_token=$whatsapp_settings->acess_token;
// 			$url=$whatsapp_settings->url;
//             $customer_phone_number     =    $data->phone_number;
//             $customer_name             =    $data->user_name;
//           $url_link=''.base_url().'home/payment/'.$id;
// 		$message    =    'Dear '.$customer_name.',
// We hope this email finds you well. We are writing to request your payment of INR 200 for the approval of your membership. The payment is required in order to complete the process and grant you access to all the benefits of being a member.
// You can easily make the payment by clicking the link below: '.$url_link.'
// Thank you for your prompt attention to this matter. We look forward to receiving your payment and welcoming you as a member.
// Best regards,Malabar Agro Digital Farmers Producers Company';
// 			$arrContextOptions=array(
//     "ssl"=>array(
//          "verify_peer"=>false,
//          "verify_peer_name"=>false,
//     ),
// );
// $url = "https://login2.online/api/send.php?number=91".$customer_phone_number."&type=text&message=".urlencode($message)."&instance_id=".$instance_id."&access_token=".$access_token;
// 			$data = file_get_contents($url, false, stream_context_create($arrContextOptions));
// if( $data){
// 	$this->session->set_flashdata('flashSuccess','Message Sent.');
//             redirect(base_url() . 'siteadmin/pending');
// }else{
// 	$this->session->set_flashdata('flashError','Something went wrong!');
//             redirect(base_url() . 'siteadmin/memberView'.$id);
// }
	 }
  public function reject_member($id){
    	$member=$id;
		$data=$this->AdminModel->rejectMember($member);
// 		$data1=$this->AdminModel->getMemberDetails($member);
// 	    $whatsapp_settings=$this->db->get("tb_whatsapp_settings")->row();
// 			$instance_id=$whatsapp_settings->instance_id;
// 			$access_token=$whatsapp_settings->acess_token;
// 			$url=$whatsapp_settings->url;
//             $customer_phone_number     =    $data->phone_number;
//             $customer_name             =    $data->user_name;
//           $url_link=''.base_url().'home/payment/'.$id;
// 		$message    =    'Dear '.$customer_name.',
// We hope this email finds you well. We are writing to request your payment of INR 200 for the approval of your membership. The payment is required in order to complete the process and grant you access to all the benefits of being a member.
// You can easily make the payment by clicking the link below: '.$url_link.'
// Thank you for your prompt attention to this matter. We look forward to receiving your payment and welcoming you as a member.
// Best regards,Malabar Agro Digital Farmers Producers Company';
// 			$arrContextOptions=array(
//     "ssl"=>array(
//          "verify_peer"=>false,
//          "verify_peer_name"=>false,
//     ),
// );
// $url = "https://login2.online/api/send.php?number=91".$customer_phone_number."&type=text&message=".urlencode($message)."&instance_id=".$instance_id."&access_token=".$access_token;
// 			$data = file_get_contents($url, false, stream_context_create($arrContextOptions));
// if( $data){
// 	$this->session->set_flashdata('flashSuccess','Message Sent.');
//             redirect(base_url() . 'siteadmin/pending');
// }else{
// 	$this->session->set_flashdata('flashError','Something went wrong!');
//             redirect(base_url() . 'siteadmin/memberView'.$id);
// }
	 }
  public function delete_member($id){
    	$member=$id;
		$data=$this->AdminModel->deleteMember($member);
// 		$data1=$this->AdminModel->getMemberDetails($member);
// 	    $whatsapp_settings=$this->db->get("tb_whatsapp_settings")->row();
// 			$instance_id=$whatsapp_settings->instance_id;
// 			$access_token=$whatsapp_settings->acess_token;
// 			$url=$whatsapp_settings->url;
//             $customer_phone_number     =    $data->phone_number;
//             $customer_name             =    $data->user_name;
//           $url_link=''.base_url().'home/payment/'.$id;
// 		$message    =    'Dear '.$customer_name.',
// We hope this email finds you well. We are writing to request your payment of INR 200 for the approval of your membership. The payment is required in order to complete the process and grant you access to all the benefits of being a member.
// You can easily make the payment by clicking the link below: '.$url_link.'
// Thank you for your prompt attention to this matter. We look forward to receiving your payment and welcoming you as a member.
// Best regards,Malabar Agro Digital Farmers Producers Company';
// 			$arrContextOptions=array(
//     "ssl"=>array(
//          "verify_peer"=>false,
//          "verify_peer_name"=>false,
//     ),
// );
// $url = "https://login2.online/api/send.php?number=91".$customer_phone_number."&type=text&message=".urlencode($message)."&instance_id=".$instance_id."&access_token=".$access_token;
// 			$data = file_get_contents($url, false, stream_context_create($arrContextOptions));
// if( $data){
// 	$this->session->set_flashdata('flashSuccess','Message Sent.');
//             redirect(base_url() . 'siteadmin/pending');
// }else{
// 	$this->session->set_flashdata('flashError','Something went wrong!');
//             redirect(base_url() . 'siteadmin/memberView'.$id);
// }
	 }
     function get_rejected_members()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getRejectedMembers($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			if($vend->subscription_id==1){
			    $icon='fa-solid fa-award';
			    $style='#FFD700';
			}else if($vend->subscription_id==2){
			    $icon='fa-solid fa-medal';
			     $style='#C0C0C0';
			}else{
			    $icon='fas fa-gem';
			     $style='#b9f2ff';
			}
			$row_data[]   =   "<i class='".$icon."' style='font-size: 24px;color:".$style.";'></i>";
			$row_data[]   =   $vend->member_name;
			$row_data[]   =   $vend->user_email;
			$row_data[]   =   $vend->phone_number;
			$row_data[]   =   $vend->status;
			$btn		  =	  "";
			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#showModal' onclick='approve_member(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";

		
		$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_member(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminModel->getRejectedMembers($_POST,"filter"),
			"recordsFiltered" => $this->AdminModel->getRejectedMembers($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }
    function get_approved_members()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getApprovedMembers($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			if($vend->subscription_id==1){
			    $icon='fa-solid fa-award';
			    $style='#FFD700';
			}else if($vend->subscription_id==2){
			    $icon='fa-solid fa-medal';
			     $style='#C0C0C0';
			}else{
			    $icon='fas fa-gem';
			     $style='#b9f2ff';
			}
			$row_data[]   =   "<i class='".$icon."' style='font-size: 24px;color:".$style.";'></i>";
			$row_data[]   =   $vend->member_name;
			$row_data[]   =   $vend->phone_number;
			$row_data[]   =   30000;
			$storedDate = $vend->ending_date;
            $currentDate = date("Y-m-d");
            
            // Create DateTime objects for the stored date and current date
            $storedDateTime = new DateTime($storedDate);
            $currentDateTime = new DateTime($currentDate);
            $interval = $currentDateTime->diff($storedDateTime);
            $days = $interval->days;
            if($days <30){
			     $style='deactivate-button';
			}else if($days <60){
			     $style='warning-button';
			}else{
			      $style='active-button';
			}
			$row_data[] = "<span class='$style'>$days Days</span>";
           
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
	   // print_r($data['member_details']);die;
		$this->load->view('admin/member_list/member_view',$data);
	}
	public function offerZone()
	{
		$this->load->view('admin/offerzone/category_list');
	}
    public function add_offerzone_category()
    {
          if($this->input->post() && !empty($_FILES['file2']['name'])){
            $file_name = strtotime(date('Y-m-d H:i:s'));
            $config['upload_path']   = "assets/uploads/offerzone_category"; 
    		$config['file_name']     = 'offerzone_'.$file_name; 
    		$config['allowed_types'] = 'jpg|png|jpeg';
    		$config['max_size']      = 1024;
    		$config['max_width']     = '800';
            $config['max_height']    = '800';
            $config['min_width']     = '800';
            $config['min_height']    = '800';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if($_FILES){
    		    
    		    print_r($uploadedImage);die;
    // 			$this->resizeImage($uploadedImage['file2']);
    		} 
    		
    		
            if (!$this->upload->do_upload('file2')) {
                
              $error = array('error' => $this->upload->display_errors()); 
              echo $error['error'];
              redirect("Admin/offerZone"); 
            } else {
                              print_r("hao");die;
                  
            $this->session->set_flashdata('flashSuccess', 'Data inserted successfully');
            redirect("Admin/offerZone"); 
             }
            }
        
        }
    function upload() {
        $file_name = strtotime(date('Y-m-d H:i:s'));
            $config['upload_path']   = "assets/uploads/offerzone_category"; 
    		$config['file_name']     = 'offerzone_'.$file_name; 
    		$config['allowed_types'] = 'jpg|png|jpeg';
    		$config['max_size']      = 1024;
    		$config['max_width']     = '800';
            $config['max_height']    = '800';
            $config['min_width']     = '800';
            $config['min_height']    = '800';
           
   $this->load->library('upload', $config);
   $this->upload->initialize($config);
    if (!$this->upload->do_upload('file2')) {
        
         $this->session->set_flashdata('flashError',$this->upload->display_errors() );
         redirect("Admin/offerZone");
    } else {
        $uploadedImage = $this->upload->data();
			$data1 = array(  
				'category_name'         => $this->input->post('category_address'),  
				'category_image'        => $uploadedImage['file_name'],
				'category_description'  => $this->input->post('category_description'),  
				'status'                => 'Active',  
				'is_deleted'            => 'N',  
				'created_at'            => date('Y-m-d H:i:s'),
			);  
			$var=$this->db->insert('tbl_offerzone_categories',$data1);
			if($var){
// 			print_r("hduhidhu");die;
			$this->session->set_flashdata('flashSuccess', 'Offer Category Added successfully');
			
            redirect("Admin/offerZone"); 
			}
    }
}
    function getCategoryList()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getCategoryList($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			if($vend->status==1){
			    $icon='fa-solid fa-award';
			    $style='#FFD700';
			}else if($vend->status==2){
			    $icon='fa-solid fa-medal';
			     $style='#C0C0C0';
			}else{
			    $icon='fas fa-gem';
			     $style='#b9f2ff';
			}
			
        	$row_data[] = "<img class='vendor-thumb' src='" . base_url() . "assets/uploads/offerzone_category/".$vend->category_image."' alt='Category image'>";
        	$row_data[]   =   $vend->sub_category_name;
        	$row_data[]   =   $vend->category_description;
			$btn		  =	  "";
// 			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#showModal' onclick='approve_member(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";

// 			$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='reject_member(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
// 		$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_member(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
         	$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#modal-edit-contact' onclick='getCategory_list(".$vend->id.")'  class='edit-item-btn'><i class='mdi mdi-pencil-circle' style='font-size: 24px;color:##88aaf3;';></i></a>&nbsp";
	    
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
//     public function add_offer_products()
// 	{
//         $data['categories']=$this->AdminModel->getCategories();
//         $data['size']=$this->AdminModel->getsize();
//         $data['colours']=$this->AdminModel->getColours();
//         // print_r($data['categories']);die;
// 		$this->load->view('admin/offerzone/offer_products',$data);
// 	}
//    public function post_offer_products(){
//     // print_r("hashsdhj");die;
//     $product_name = $this->input->post('product_name');
//     $uploadedImage = $this->upload->data();
//     $data1 = array(  
//         'offer_category_id'    => $this->input->post('categories'),  
//         'product_name'         => $this->input->post('product_name'), 
//         'product_description'  => $this->input->post('full_details'),  
//         'price'                =>$this->input->post('prize'),  
//         'quantity'             =>$this->input->post('quantity'),  
//         'other_details'        => $this->input->post('other_details'),  
//         'product_description'             => $this->input->post('group_tag'),  
//         'modified_at'          => date('Y-m-d H:i:s'),
//         'created_at'           => date('Y-m-d H:i:s'),
//     );  
//     $product_id = $this->AdminModel->insertOfferProductDetails($data1);

//     $this->load->library('upload');
//     $images = $_FILES['product_images'];
//     $uploaded_images = array();
//     $file_name = strtotime(date('Y-m-d H:i:s'));
//     // Loop through each uploaded image
//     foreach ($images['name'] as $key => $image_name) {
//         $_FILES['image']['name']     = $images['name'][$key];
//         $_FILES['image']['type']     = $images['type'][$key];
//         $_FILES['image']['tmp_name'] = $images['tmp_name'][$key];
//         $_FILES['image']['error']    = $images['error'][$key];
//         $_FILES['image']['size']     = $images['size'][$key];
        
//         // Configure upload settings
//         $config['upload_path']   = "assets/uploads/offerzone_products"; 
//     		$config['file_name']     = 'offerzone_products'.$file_name; 
//     		$config['allowed_types'] = 'jpg|png|jpeg';
//     		$config['max_size']      = 1024;
//     		// $config['max_width']     = '765';
//             // $config['max_height']    = '850';
//             // $config['min_width']     = '765';
//             // $config['min_height']    = '765';

//         $this->upload->initialize($config);
//         // Perform file upload
//         if ($this->upload->do_upload('image')) {
//             $uploaded_images[] = $this->upload->data('file_name');
//         } else {
//             $this->session->set_flashdata('flashError',$this->upload->display_errors() );
//             redirect("Admin/add_offer_products");
//         }
//         $image=$this->AdminModel->insertOfferGalleryImages($product_id, $uploaded_images);
//         $selected_colors = $this->input->post('offer_colors');
//         $color=$this->Product_colors_model->insertOfferProductColors($product_id, $selected_colors);
//         $selected_sizes = $this->input->post('offer_size');
//         $size=$this->Product_colors_model->insertOfferProductsizes($product_id, $selected_sizes);
//         if($color || $size || $image){
//             $this->session->set_flashdata('flashSuccess','Product Added.');
//             redirect(base_url() . 'Admin/add_offer_products');
//         }else{
//         	$this->session->set_flashdata('flashError','Something went wrong!');
//             redirect(base_url() . 'Admin/add_offer_products');
//         }
 
// }
//    }
public function add_offer_products()
{
 //   $data['img'] = $this->db->get_where('tbl_offerzone_products_gallery',array('product_id'=>$id1))->result();
   // $data['img'] = $this->db->AdminModel->getimages($id1);
    $data['categories'] = $this->AdminModel->getCategories();
    $data['size'] = $this->AdminModel->getsize();
    $data['colours'] = $this->AdminModel->getColours();
    $this->load->view('admin/offerzone/add_offer_products', $data);
}

 public function getCategory(){
    $id = $this->input->post('id');
	$this->db->where('id',$id);
	$result = $this->db->get('tbl_offerzone_categories')->row();
	echo json_encode($result);
 }

public function post_offer_products()
{
    // $this->load->library('upload');

    $product_name = $this->input->post('product_name');
    $product_description = $this->input->post('product_description');
    $price = $this->input->post('prize');
    $quantity = $this->input->post('quantity');
    $other_details = $this->input->post('other_details');
    $group_tag = $this->input->post('group_tag');
    $categories = $this->input->post('categories');
    $expiring_at = $this->input->post('expiring_time');
    $selected_sizes = $this->input->post('size');
    // $images = $_FILES['product_images'];

    $data = array(
        'offer_category_id' => $categories,
        'product_name' => $product_name,
        'product_description' => $group_tag,
        'price' => $price,
        'quantity' => $quantity,
        'stock' => $quantity,
        'other_details' => $other_details,
        'expires_in' => $expiring_at,
        'modified_at' => date('Y-m-d H:i:s'),
        'created_at' => date('Y-m-d H:i:s'),
        'status' => 'Active'
    );

    $product_id = $this->AdminModel->insertOfferProductDetails($data);

    if ($product_id) {
        $file_name = strtotime(date('Y-m-d H:i:s'));
        $files = $_FILES;
        $countt = count($_FILES['product_images']['name']);
        for($i=0; $i<$countt; $i++){   	 

        if($_FILES['product_images']['name'][$i]){						

        $filename 	= basename($_FILES['product_images']['name'][$i]);

        $tmp = explode('.', $filename);

        $file_extension = end($tmp);

        $ext 		= strtolower($file_extension);			

        $image       = "product_images".time().$i.'.'.$ext;		

        $uploadfile 	= "assets/uploads/offerzone_products";

        move_uploaded_file($_FILES["product_images"]["tmp_name"][$i],  $uploadfile."/".$image);

        $data1		=array(
            'product_id' => $product_id,
            'image' => $image,
            'modified_at'          => date('Y-m-d H:i:s'),
            'modified_at'           => date('Y-m-d H:i:s'),

        );

        $image_inserted=$this->db->insert('tbl_offerzone_products_gallery',$data1);

        }
        
        }
        $countt = count($_FILES['offer_colors']['name']);
        for($i=0; $i<$countt; $i++){   	 

        if($_FILES['product_images']['name'][$i]){						

        $filename 	= basename($_FILES['product_images']['name'][$i]);

        $tmp = explode('.', $filename);

        $file_extension = end($tmp);

        $ext 		= strtolower($file_extension);			

        $image       = "product_images".time().$i.'.'.$ext;		

        $uploadfile 	= "assets/uploads/offerzone_products";

        move_uploaded_file($_FILES["product_images"]["tmp_name"][$i],  $uploadfile."/".$image);

        $data1		=array(
            'product_id' => $product_id,
            'image' => $image,
            'modified_at'          => date('Y-m-d H:i:s'),
            'modified_at'           => date('Y-m-d H:i:s'),

        );

        $image_inserted=$this->db->insert('tbl_offerzone_products_gallery',$data1);
        }
        }
        $selected_colors = $this->input->post('colour');
        for ($i=0; $i < sizeof($selected_colors); $i++) 
        { 
        $data4 = array('product_id' => $product_id,
                      'available_colors'=>$selected_colors[$i]
                    );
        $color_inserted=$this->db->insert('tbl_offer_colors',$data4);
                }
        $selected_size = $this->input->post('size');
        for ($i=0; $i < sizeof($selected_size); $i++) 
        { 
        $data5 = array('product_id' => $product_id,
                        'available_size'=>$selected_size[$i]
                    );
        $size_inserted=$this->db->insert('tbl_offerzone_products_size',$data5);
        }
        

        if ($image_inserted || $color_inserted || $size_inserted) {
            $this->session->set_flashdata('flashSuccess', 'Product Added.');
            redirect(base_url() . 'Admin/add_offer_products');
        } else {
            $this->session->set_flashdata('flashError', 'Something went wrong!');
            redirect(base_url() . 'Admin/add_offer_products');
        }
       } else {
        $this->session->set_flashdata('flashError', 'Something went wrong!');
        redirect(base_url() . 'Admin/add_offer_products');
        }
    }
    public function offer_products_list(){
		$this->load->view('admin/offerzone/product_list');
     }
    function getofferProductList()
    {
    $data = $row = array();
    $user   =   $this->AdminModel->getofferProductList($_POST);

    $i = $_POST['start'];
    foreach($user as $vend){

        $i++;
        $row_data[]   =   $i;
        $row_data[] = "<img class='vendor-thumb' src='" . base_url() . "assets/uploads/offerzone_products/".$vend->image."' alt='Product image'>";
        $row_data[]   =   $vend->product_name;
        $row_data[]   =   $vend->quantity;
        $row_data[]   =   $vend->stock;
        $row_data[]   =   $vend->expires_in;
        $row_data[]   =   $vend->status;

        
        $btn		  =	  "";
       $btn .= '<a href="' . base_url() . 'Admin/view_product_list/' . base64_encode($vend->id) . '" class="edit-item-btn"><i class="fa fa-eye" style="font-size: 24px;"></i></a>&nbsp;';
        // $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='reject_member(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
       	if($vend->status == 'Active'){
                $btn		 .=	  "<label class='switch' style='width: 47px;height: 25px;color:#34c997;' >
                                    <input data-bs-target='#' data-bs-toggle='modal' type='checkbox'  checked id='ID'onchange='deactive_banner(".$vend->id.")'>
                                    <span class='slider round'></span>
                                    </label>&nbsp;";
        		}else{
        		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                                    <input data-bs-target='# data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_banner(".$vend->id.")' >
                                    <span class='slider round'></span>
                                    </label>&nbsp;";
        		}
        $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_offer_product(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

        $row_data[]   =   $btn;
        $data[]       =   $row_data;   
        $row_data     =   array();
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->AdminModel->countAll($_POST,"filter"),
        "recordsFiltered" => $this->AdminModel->getofferProductList($_POST,"filter"),
        "data" => $data,
    );
    echo json_encode($output);
    }
    public function list_colour()
	{
		$this->load->view('admin/settings/list_colours');
	} 
    public function add_colour()
    {
        $color_name = $this->input->post('color_name');
        $color_code = $this->input->post('color_code');
        $color_data = array(
            'colors' => $color_name,
            'colour_code' => $color_code
        );
        $ins=$this->AdminModel->insertColor($color_data);
        if($ins > 0){
            $this->session->set_flashdata('flashSuccess','Colour Added.');
        }else{
            $this->session->set_flashdata('flashError','Something went wrong!');
        }
        redirect('Admin/list_colour');
    }
    public function list_size()
	{
		$this->load->view('admin/settings/list_sizes');
	} 
    public function add_size()
    {
        $size = $this->input->post('size');
        $size_data = array(
            'size' => $size,
        );
        $ins=$this->AdminModel->insertSize($size_data);
        if($ins){
            $this->session->set_flashdata('flashSuccess','Size Added.');
        }else{
            $this->session->set_flashdata('flashError','Something went wrong!');
        }
        redirect('Admin/list_size');
    }
    function getColourList()
    {
		$data = $row = array();
		$user   =   $this->AdminModel->getColourList($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[]   =   $i;
			$row_data[]   =   $vend->colors;
            $row_data[]   =   "<input type='color' class='form-control form-control-color' id='exampleColorInput4' value='$vend->colour_code' title='Choose your color' style='width: 65px;  border-radius:0px;}' name='color_code'> "  ;
			$btn		  =	  "";
		
   	          $btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#edited_modal-add-contact' onclick='get_color_data(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-edit' style='font-size: 24px;'></i></a>&nbsp";

	       	$btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_color(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";


			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminModel->getColourList($_POST,"filter"),
			"recordsFiltered" => $this->AdminModel->getColourList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }
public function getColorData()
    {
         $id = $this->input->post('id'); // Retrieve the provided ID
         $data = $this->AdminModel->getColorDataById($id);
         $this->output->set_content_type('application/json');
         echo json_encode($data);
    }
public function editColour(){
    $data=$_POST;
    
    $data1=$this->AdminModel->editColour($data);
    if($data1){
        $this->session->set_flashdata('flashSuccess','Updated Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
     redirect(base_url() . 'Admin/list_colour');
    // redirect('Admin/list_colour');
    // print_r($color_name);die;
}
public function deletedColour(){
    $data=$_POST;
    
    $data1=$this->AdminModel->deletedColour($data);
    if($data1){
        $this->session->set_flashdata('flashSuccess','Deleted Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
     redirect(base_url() . 'Admin/list_colour');
    // redirect('Admin/list_colour');
    // print_r($color_name);die;
}
function getSizeList()
{
    $data = $row = array();
    $user   =   $this->AdminModel->getSizeList($_POST);

    $i = $_POST['start'];
    foreach($user as $vend){

        $i++;
        $row_data[]   =   $i;
        $row_data[]   =   $vend->size;
        // $row_data[]   =   $vend->id;
        $btn		  =	  "";
       $btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#edited_modal-add-contact' onclick='get_size_data(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-edit' style='font-size: 24px;'></i></a>&nbsp";

    $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_size(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

        $row_data[]   =   $btn;
        $data[]       =   $row_data;   
        $row_data     =   array();
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->AdminModel->getSizeList($_POST,"filter"),
        "recordsFiltered" => $this->AdminModel->getSizeList($_POST,"filter"),
        "data" => $data,
    );
    echo json_encode($output);
}
public function getSizeData()
    {
         $id = $this->input->post('id'); // Retrieve the provided ID
         $data = $this->AdminModel->getSizeDataById($id);
         $this->output->set_content_type('application/json');
         echo json_encode($data);
    }
public function editSize(){
    $data=$_POST;
    
    $data1=$this->AdminModel->editSize($data);
    if($data1){
        $this->session->set_flashdata('flashSuccess','Updated Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
     redirect(base_url() . 'Admin/list_size');
    }
    public function deletedSize(){
    $data=$_POST;
    
    $data1=$this->AdminModel->deletedSize($data);
    if($data1){
        $this->session->set_flashdata('flashSuccess','Deleted Successfully');
    }else{
        $this->session->set_flashdata('flashError','Something Went Wrong!!');
    }
     redirect(base_url() . 'Admin/list_size');
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

	     $data['counter'] = [];
//  print_r( $data['product']);die;
	   
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
		$result = $this->db->query("select id , status FROM tbl_offerzone_products WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_offerzone_products',$array);
	    	}else  {
		    	$data = array(
				'status'=>'Active',
				'is_deleted'=>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_offerzone_products',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
		redirect(base_url() . 'Admin/offer_products_list');
    }
    
}
