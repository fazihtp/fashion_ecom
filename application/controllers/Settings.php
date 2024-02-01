<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Settings extends CI_Controller {

	   public function __construct() {
        parent::__construct();
		$this->load->model('Settings_Model');
        $this->load->helper(array('form','url','spreadsheet'));
        $this->load->library(array('upload','encryption'));
      
	   }
        public function add_category(){
            
         $data = array(
             'name'       =>ucfirst($this->input->post('new_category')),
             'status'     =>'Active',
             'is_deleted' =>'N',
             'created_at' =>date("Y-m-d H:i:s"),
             );   
       
        $response = $this->Settings_Model->addCategory($data);
        if ($response) {
         $this->session->set_flashdata('flashSuccess', 'category Created!');
         redirect(base_url() . 'Admin/category');
       } else {
         $this->session->set_flashdata('flashError', 'category Creation Failed!');
         redirect(base_url() . 'Admin/category');
       }
       }
       
       public function getCategoryList(){
         $data =$row = array() ;
         $user = $this->Settings_Model->getcategory_Lists($_POST);
         $i = $_POST['start'];
         foreach($user as $row){
		$i++;
		$row_data[]   =   $i;
		$row_data[]   =   $row->name;
		$btn		  =	  "";
		$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#editModal' onclick='getCategory(".$row->id.")'  class='edit-item-btn'><i class='mdi mdi-pencil-circle' style='font-size: 24px;color:##88aaf3;';></i></a>&nbsp";
		if($row->status == 'Active'){
        $btn		 .=	  "<label class='switch' style='width: 47px;height: 25px;color:#34c997;' >
                            <input data-bs-target='#deactivaecategoryModal' data-bs-toggle='modal'type='checkbox'  checked id='ID'onchange='deactive_category(".$row->id.")'>
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}else{
		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                            <input data-bs-target='#activecategoryModal' data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_category(".$row->id.")' >
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}
		$btn		 .=	  "<a data-bs-target='#deleteModal' data-bs-toggle='modal' onclick='delete_category(".$row->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
		
		$row_data[]   =$btn;
		$data[]       =   $row_data;   
		$row_data     =   array();
        }
        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->Settings_Model->countAll(),
        "recordsFiltered" => $this->Settings_Model->getcategory_Lists($_POST,"filter"),
        "data" => $data,
        );
        echo json_encode($output);
        }
        
        public function get_category(){
            
	   $id = $this->input->post('id');
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_categories')->row();
		echo json_encode($result);
        }
        
    	public function edit_category(){
	    $id = $this->input->post('id');
		$data = array('name'=>$this->input->post('newcategory'),
	                	'modified_at'=>date("Y-m-d H:i:s"),	
					  );
		$result = $this->Settings_Model->edit_category($id,$data);
		if($result==true){
			$this->session->set_flashdata('flashSuccess','Category Updated!');
		 redirect(base_url() . 'Admin/category');
		}else{
			 $this->session->set_flashdata('flashError','Category Updated Failed!');
             redirect(base_url() . 'Admin/category');
		}
    	}
        public function delete_category(){
        $id = $this->input->post('id');
        $data = array(
            'status'=>'Deactive',
            'is_deleted'=>'Y',
            );
	    $status = $this->Settings_Model->delete_category($id,$data);
		if($status>0){
			 $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	    redirect(base_url() . 'Admin/category');
        }
        
        public function checkCategory(){
        $id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_categories WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
				
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_categories',$array);
	    	}else  {
		    	$data = array(
				'status'=>'Active',
				'is_deleted'=>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_categories',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
		redirect(base_url() . 'Admin/category');
    }
        
        public function sub_category(){
            $data['category']=$this->Settings_Model->get_category();
            $this->load->view('admin/category/sub_category',$data);
        }
        
        public function Add_Subcategory(){
        // print_r($_POST);die;
         $select_category = $this->input->post('category');
         $data = array(
             'sub_category_name'      =>ucfirst($this->input->post('sub_category')),
             'category_id'            =>$select_category,
             'status'                 =>'Active',
             'is_deleted'             =>'N',
             'created_at'             =>date('Y-m-d H:i:s'),
             );   
        $response = $this->Settings_Model->Sub_Category($data);
        if ($response) {
         $this->session->set_flashdata('flashSuccess', 'Sub category Created!');
         redirect(base_url() . 'Settings/sub_category');
       } else {
         $this->session->set_flashdata('flashError', 'Sub Category Creation Failed!');
         redirect(base_url() . 'Settings/sub_category');
       }
       }
       
      public function get_SubCategoryList(){
         $data =$row = array() ;
         $user = $this->Settings_Model->get_Subcategory_Lists($_POST);
         $i = $_POST['start'];
         foreach($user as $row){
		$i++;
		$row_data[]   =   $i;
		$row_data[]   =   $row->name;
		$row_data[]   =   $row->sub_category_name;
		$btn		  =	  "";
		$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#editModal' onclick='get_SubCategory(".$row->id.")'  class='edit-item-btn'><i class='mdi mdi-pencil-circle' style='font-size: 24px;color:##88aaf3;';></i></a>&nbsp";
		if($row->status == 'Active'){
        $btn           .= "<label class='switch' style='width: 47px;height: 25px;color:#34c997;'>
                            <input data-bs-target='#deactivasubcategoryModal' data-bs-toggle='modal' type='checkbox' checked id='ID' onclick='deactive_sub(".$row->id.")' readonly>
                            <span class='slider round'></span>
                             </label>&nbsp;";
		}else{
		$btn	      .=	"<label class='switch'style='width: 47px;height: 25px;'>
                            <input data-bs-target='#activasubcategoryModal' data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_sub(".$row->id.")'readonly >
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}
		$btn		  .=	  "<a data-bs-target='#deletesubModal' data-bs-toggle='modal' onclick='delete_subcategory(".$row->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
		
		$row_data[]   =$btn;
		$data[]       =   $row_data;   
		$row_data     =   array();
        }
        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->Settings_Model->countAll1(),
        "recordsFiltered" => $this->Settings_Model->get_Subcategory_Lists($_POST,"filter"),
        "data" => $data,
        );
        echo json_encode($output);
        }
        
        public function get_Subcategory(){
        $id = $this->input->post('id');
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_sub_categories')->row();
		echo json_encode($result);
        }
        
        public function edit_Subcategory(){
    //   print_r($_POST);die; // 
	    $id = $this->input->post('id');
	    $select_category = $this->input->post('Maincategory');
		$data = array(
		    'sub_category_name'     =>$this->input->post('subcategory'),
		    'category_id'           =>$select_category,
		    'modified_at'           =>date("Y-m-d H:i:s"),
					  );
		$result = $this->Settings_Model->edit_Subcategory($id,$data);
		if($result==true){
			$this->session->set_flashdata('flashSuccess','Category Updated!');
		 redirect(base_url() . 'Settings/sub_category');
		}else{
			 $this->session->set_flashdata('flashError','Category Updated Failed!');
           redirect(base_url() . 'Settings/sub_category');
		}

	}
	   public function delete_subcategory(){
        $id = $this->input->post('id');
        $data = array(
            'status'=>'Deactive',
            'is_deleted'=>'Y',
            );
	    $status = $this->Settings_Model->delete_subcategory($id,$data);
		if($status>0){
			 $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     redirect(base_url() . 'Settings/sub_category');
        }
        
        public function checksubCategory(){
        $id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_sub_categories WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'     =>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_sub_categories',$array);
	    	}else  {
		    	$data = array(
				'status'       =>'Active',
				'is_deleted'   =>'N',
				'modified_at'  =>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_sub_categories',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
		redirect(base_url() . 'Settings/sub_category');
    }

 
        public function view_Banner(){
            $this->load->view('admin/settings/banner');
        }
        
        public function getBannerlist(){
        $data =$row = array() ;
        $user = $this->Settings_Model->get_Banner_Lists($_POST);
        $i = $_POST['start'];
        foreach($user as $row){
		$i++;
		$row_data[]   =   $i;
		$row_data[]   =   "<img class='vendor-thumb' src='" . base_url() . "assets/uploads/banner_image/".$row->image."' >";
		$row_data[]   =   $row->heading;
		$row_data[]   =   $row->sub_heading;
	    $row_data[]   =   $row->shot_description;
	    $row_data[]   =   $row->shop_link;
		$btn		  =	  "";
		$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#editBanner' onclick='getBanner_list(".$row->id.")'  class='edit-item-btn'><i class='mdi mdi-pencil-circle' style='font-size: 24px;color:##88aaf3;';></i></a>&nbsp";
		if($row->status == 'Active'){
        $btn		 .=	  "<label class='switch' style='width: 47px;height: 25px;color:#34c997;' >
                            <input data-bs-target='#' data-bs-toggle='modal' type='checkbox'  checked id='ID'onchange='deactive_banner(".$row->id.")'>
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}else{
		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                            <input data-bs-target='# data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_banner(".$row->id.")' >
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}
		$btn		 .=	  "<a data-bs-target='#deletebanner' data-bs-toggle='modal' onclick='delete_banner(".$row->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
		
		$row_data[]   =$btn;
		$data[]       =   $row_data;   
		$row_data     =   array();
        }
        $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->Settings_Model->countAll2(),
        "recordsFiltered" => $this->Settings_Model->get_Banner_Lists($_POST,"filter"),
        "data" => $data,
        );
        echo json_encode($output);   
        }
        
        public function add_Banner(){
            //   print_r($_POST);die; 
        $file_name = strtotime(date('Y-m-d H:i:s'));
        $config['upload_path']   = "assets/uploads/banner_image"; 
		$config['file_name']     = 'bannerimage_'.$file_name; 
		$config['allowed_types'] = 'jpg|png|jpeg';
    // 	$config['max_size'] = 1024;
        $config['max_width'] = 1920;
        $config['max_height'] = 800;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $this->session->set_flashdata('flashError',$this->upload->display_errors() );
              redirect(base_url() . 'Settings/view_Banner');
        } else {
        $uploadedImage = $this->upload->data();
			$data = array(  
				 'image'             =>  $uploadedImage['file_name'],
                'heading'            => $this->input->post('heading'),
                'Sub_heading'        => $this->input->post('Sub_heading'),
                'shot_description'   => $this->input->post('shot_description'),
                'shop_link'          => $this->input->post('shop_link'),
                'status'             =>'Active',
                'is_deleted'         =>'N',
				'created_at'         => date('Y-m-d H:i:s'),
			);  
			 $response = $this->Settings_Model->addBanner_model($data);
			if($response){

			$this->session->set_flashdata('flashSuccess', 'Banner Added successfully');
			 redirect(base_url() . 'Settings/view_Banner');
			}
        }
     }
      
        public function get_Banner(){
          
        $id = $this->input->post('id');
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_banner')->row();
		echo json_encode($result);
      }

	
    	public function edit_Banner()
        {
        $id = $this->input->post('id');
        $data = array(
            'heading'          =>      $this->input->post('heading'),
            'Sub_heading'      =>      $this->input->post('Sub_heading'),
            'shot_description' =>      $this->input->post('shot_description'),
            'shop_link'        =>      $this->input->post('shop_link'),
            'status'           =>     'Active',
            'is_deleted'       =>      'N',
            'modified_at'      =>      date('Y-m-d H:i:s'),
        );
            $this->load->library('upload');
            $file_name = strtotime(date('Y-m-d H:i:s'));
            $config['upload_path'] = FCPATH . 'assets/uploads/banner_image';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name']     = 'bannerimage_'.$file_name;
            $config['max_size'] = 1024;
            $config['max_width'] = 1920;
            $config['max_height'] = 800;
           
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('image')) {
                $uploadedImage = $this->upload->data();
                $data['image'] = $uploadedImage['file_name'];
                echo "File uploaded successfully.";
            } else {
                $error = $this->upload->display_errors();
                echo "File upload failed: " . $error;
            }
            
        
        $result = $this->Settings_Model->editBanner_Model($id, $data);
        if ($result == true) {
            $this->session->set_flashdata('flashSuccess', 'Banner Updated!');
            redirect(base_url() . 'Settings/view_Banner');
        } else {
            $this->session->set_flashdata('flashError', 'Banner Update Failed!');
            redirect(base_url() . 'Settings/view_Banner');
        }
      }
      
	    public function delete_banner(){
        $id = $this->input->post('id');
        $data = array(
            'status'=>'Deactive',
            'is_deleted'=>'Y',
        );
	    $status = $this->Settings_Model->deleteBanner_model($id,$data);
		if($status>0){
	    $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
		}else{
	    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     redirect(base_url() . 'Settings/view_Banner');
        }
        
        public function checkbannerActive(){
        $id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_banner WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_banner',$array);
	    	}else  {
		    	$data = array(
				'status'     =>'Active',
				'is_deleted' =>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_banner',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
		redirect(base_url() . 'Settings/view_Banner');
    }
    
    
    ///////////////////////// offer zone category/////////////////////////////////////////////////////
    
     
       public function edit_offer_products(){
        //  print_r($_POST);die;
        $id = $this->input->post('id');
        $data = array(
            // 'category_name'         =>ucfirst($this->input->post('category_name')) ,
            'category_description'  => ucfirst($this->input->post('category_description')),
            'status'                => 'Active',
            'is_deleted'            => 'N',
            'modified_at'           => date('Y-m-d H:i:s'),
        );
        $data5 = array(
            'sub_category_name'     =>ucfirst($this->input->post('category_name')) ,
             );
         $this->db->where('id',$id);
         $this->db->update('tbl_sub_categories',$data5);
        $this->load->library('upload');
        $file_name = strtotime(date('Y-m-d H:i:s'));
        $config['upload_path'] = FCPATH . 'assets/uploads/offerzone_category';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name']     = 'offerzone_'.$file_name;
        $config['max_size'] = 1024;
        $config['max_width'] = 800;
        $config['max_height'] = 800;
        $config['min_width'] = 800;
        $config['min_height'] = 800;
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('file3')) {
            $uploadedImage = $this->upload->data();
            $data['category_image'] = $uploadedImage['file_name'];
            echo "File uploaded successfully.";
        } else {
            $error = $this->upload->display_errors();
            echo "File upload failed: " . $error;
        }
        
        $result = $this->Settings_Model->editofferzone_Model($id, $data);
        if ($result == true) {
            $this->session->set_flashdata('flashSuccess', 'Offer Category Updated successfully');
            redirect("Admin/offerZone");
        } else {
            $this->session->set_flashdata('flashError', 'Offer Category Update Failed!');
            redirect("Admin/offerZone");
        }
   }
  
        public function delete_offerzonecategory(){
        $id = $this->input->post('id');
        $data = array(
            'status'     =>'Deactive',
            'is_deleted' =>'Y',
        );
        $status = $this->Settings_Model->deletecategory_model($id,$data);
        if($status>0){
        	 $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
        
        }else{
        	    $this->session->set_flashdata('flashError', 'Something Went Wrong');
        }
         redirect(base_url() . 'Admin/offerZone');
        }

  
       public function checkofferzone_category(){
        $id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_offerzone_categories WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'     =>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
    		$this->db->where('id',$id);
    		$data = $this->db->update('tbl_offerzone_categories',$array);
	    	}else  {
		    	$data = array(
				'status'     =>'Active',
				'is_deleted' =>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_offerzone_categories',$data);
		}
		if($data){
		    $this->session->set_flashdata('flashSuccess', 'updated successfully'); 
		}else{
		     $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	    redirect(base_url() . 'Admin/offerZone');
    }
public function uploadExcelFile() {
        require_once FCPATH  . 'vendor/autoload.php';
        $config['upload_path']   = "./assets/uploads/offerzone_category"; 
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('excel_file')) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
             $upload_data = $this->upload->data();
            $filePath = $upload_data['full_path'];

            $reader = new Xlsx();
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestDataRow();

            for ($row = 2; $row <= $highestRow; $row++) {
                $column1Value = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $column2Value = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $column3Value = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $column4Value = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $column5Value = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $column6Value = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $column7Value = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $column8Value = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                
                $string = $column6Value;
                $results = array();
                preg_match_all('#\d{2}/\d{2}/\d{4}#', $string, $results);
                $date1 = $results[0][0];
                $approved_on=date('Y-m-d',strtotime($date1));

                
                // $string = $column6Value;
                // $pattern = "/\d{2}-\d{2}-\d{4}/"; // Regular expression pattern for YYYY-MM-DD format
                // if (preg_match($pattern, $string, $matches)) {
                //     $date = $matches[0];
                //     $approved_on=date('Y-m-d',strtotime($date));
                // } else {
                //     $approved_on="0000-00-00";
                // }

                $array = array(
					'member_name' => $column3Value,
					'user_email' => $column4Value,
					'status' => 'Approved',
					'approved_at' => $approved_on
				);
				$this->db->insert('tbl_member_details', $array);
				$insert_id=$this->db->insert_id();
                 $array1 = array(
					'user_id' => $insert_id,
					'user_name' => $column2Value,
					'password' => sha1($column8Value),
					'role_id' => 2
				);
				$this->db->insert('tbl_users', $array1);
				
                if($column5Value == 'SILVER'){
                    $subscription_id='1';
                }else if($column5Value == 'GOLD'){
                     $subscription_id='2';
                }else if($column5Value == 'PLATINUM'){
                     $subscription_id='3';
                }else{
                     $subscription_id='4';
                }
                
                $numericDate =$column7Value;
                $excelEpoch = strtotime('1900-01-01'); // Excel's epoch date

                $unixTimestamp = ($numericDate - 1) * 24 * 60 * 60 + $excelEpoch;
                $formattedDate = date('Y-m-d', $unixTimestamp);
                
                $startDate = new DateTime($formattedDate);
                $endDate = $startDate->modify('+1 year');
                $formattedEndDate = $endDate->format('Y-m-d');
                

                $array2 = array(
					'member_id' => $insert_id,
					'subscription_id' => $subscription_id,
			     	 'starting_date' => $formattedDate, 
					'ending_date' =>$formattedEndDate
				);
				$this->db->insert('tbl_subscription_details', $array2);
            }

            
            
            // Delete the uploaded file
            unlink($filePath);

            echo "Data inserted successfully!";
        }
 }
 public function post(){
   	    require_once FCPATH  . 'vendor/autoload.php';
		$array=$_POST;
		if($_FILES['stock_file']['name']){
		    $data_id=$this->StockModel->postStock($array);
		    
			$filename 	= basename($_FILES['excel_file']['name']);
			$tmp = explode('.', $filename);
			$file_extension = end($tmp);
			$ext 		= strtolower($file_extension);			
			$new_file       = time().'.'.$ext;		
			$uploadfile 	= "assets/uploads/offerzone_category";
			move_uploaded_file($_FILES["excel_file"]["tmp_name"],  $uploadfile."/".$new_file);
			$filePath='assets/uploads/offerzone_category/'.$new_file;
			$reader = new Xlsx();
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestDataRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $column1Value = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $column2Value = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $column3Value = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $column4Value = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $column5Value = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $column6Value = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $column1Data[] = $column1Value;
                $column2Data[] = $column2Value;
                $column3Data[] = $column3Value;
                $column4Data[] = $column4Value;
                $column5Data[] = $column5Value;
                $column6Data[] = $column6Value;
            }
            $insert_data = [];
            for ($i = 0; $i < $highestRow - 1; $i++) {
                if($column1Data[$i]!=''){
                       $rowData = array(
                            'sim_stock_id'=>$data_id,
                            'primary_iccid' => $column1Data[$i],
                            'primary_imsi' => $column2Data[$i],
                            'primary_msisdn' => $column3Data[$i],
                            'fallback_iccid' => $column4Data[$i],
                            'fallback_imsi' => $column5Data[$i],
                            'fallback_msisdn' => $column6Data[$i]
                        );
                        $insert_data[] = $rowData;
                }
            }
            unlink($filePath);
            if(!empty($insert_data)){
               $data_insert=$this->StockModel->postStockLists($insert_data); 
            }else{
                $this->session->set_flashdata('flashError','Entries already exists!');
                redirect(base_url() . 'stock/upload');
            }
            
            if($data_insert){
		        $this->session->set_flashdata('flashSuccess','Stock uploaded!');
			    redirect(base_url() . 'stock/upload');
    		}else{
    			$this->session->set_flashdata('flashError','oops! something went wrong.');
                redirect(base_url() . 'stock/upload');
    		}
            
		}else{
		    $this->session->set_flashdata('flashError','file not found!');
            redirect(base_url() . 'stock/upload');
		}
	}
}
  
 

 

 
