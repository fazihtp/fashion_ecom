<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	   public function __construct() {
        parent::__construct();
		$this->load->model('Settings_Model');
        $this->load->helper(array('form','url'));
        $this->load->library(array('upload','encryption'));
      
	   }
        public function add_category(){
            
         $data = array(
             'name'=>$this->input->post('new_category'),
             'status'=>'Active',
             'is_deleted'=>'N',
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
                            <input type='checkbox'  checked id='ID'onchange='active_status(".$row->id.")'>
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}else{
		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                            <input type='checkbox' class='style' id='ID'  onchange='active_status(".$row->id.")' >
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
        
        public function checkActive(){
		$id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_categories WHERE id = $id  ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d"),	
			);
			$this->db->where('id',$id);
			$data = $this->db->update('tbl_categories',$array);
	    	}else  {
		    	$data = array(
				'status'=>'Active',
				'is_deleted'=>'N',
				'modified_at'=>date("Y-m-d"),	
			);
			 $this->db->where('id', $id);
			$data = $this->db->update('tbl_categories',$data);
		}
		echo json_encode($data);
        }
        
        public function sub_category(){
            $data['category']=$this->Settings_Model->get_category();
            $this->load->view('admin/category/sub_category',$data);
        }
        
        public function Add_Subcategory(){
        // print_r($_POST);die;
         $select_category = $this->input->post('category');
         $data = array(
             'sub_category_name'=>$this->input->post('sub_category'),
             'category_id'=>$select_category,
             'status'=>'Active',
             'is_deleted'=>'N',
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
        $btn		 .=	  "<label class='switch' style='width: 47px;height: 25px;color:#34c997;' >
                            <input data-bs-target='#deactivaesubModal' data-bs-toggle='modal'type='checkbox'  checked id='ID'onchange='active_substatus(".$row->id.")'>
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}else{
		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                            <input data-bs-target='#activaesubModal' data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_substatus(".$row->id.")' >
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}
		$btn		 .=	  "<a data-bs-target='#deletesubModal' data-bs-toggle='modal' onclick='delete_banner(".$row->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
		
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
        // $id = $this->input->post('id');
        // $this->db->select('a.*, b.sub_category_name,a.name');
        // $this->db->from('tbl_categories a');
        // $this->db->join('tbl_sub_categories b', 'b.category_id = a.id', 'left');
        // $this->db->where('b.id', $id);
        // $result = $this->db->get()->row();
        // echo json_encode($result);
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
		    'sub_category_name'=>$this->input->post('subcategory'),
		    'category_id'=>$select_category,
		    'modified_at'=>date("Y-m-d H:i:s"),
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
        
      public function checksubActive(){
            
		$id = $this->input->post('ID');
		$date =date("Y-m-d");
		$result = $this->db->query("select id , status FROM tbl_sub_categories WHERE id = $id ")->row();
		if (isset($result->id) && $result->status == 'Active'){
			$array = array(
				'status'=>'Deactive',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			$this->db->where('id',$id);
			$data = $this->db->update('tbl_sub_categories',$array);
			 $this->session->set_flashdata('message', 'Status changed to Deactive');
	    	}else  {
		    	$data = array(
				'status'=>'Active',
				'is_deleted'=>'N',
				'modified_at'=>date("Y-m-d H:i:s"),	
			);
			 $this->db->where('id', $id);
		   	$data = $this->db->update('tbl_sub_categories',$data);
			 $this->session->set_flashdata('message', 'Status changed to Active');
		}
		echo json_encode($data);
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
                            <input data-bs-target='#deactivaesubModal' data-bs-toggle='modal'type='checkbox'  checked id='ID'onchange='active_substatus(".$row->id.")'>
                            <span class='slider round'></span>
                            </label>&nbsp;";
		}else{
		$btn		 .=	  "<label class='switch'style='width: 47px;height: 25px;'>
                            <input data-bs-target='#activaesubModal' data-bs-toggle='modal' type='checkbox' class='style' id='ID'  onchange='active_substatus(".$row->id.")' >
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
            
        if ($_SERVER['REQUEST_METHOD']=="POST") {
        $this->load->library('upload');
        
        $config['upload_path'] = FCPATH .'assets/uploads/banner_image'; 
        	$config['allowed_types'] = 'gif|jpg|jpeg|png';
        // 	$config['max_size'] = 2048;
        	$config['max_width'] = 1200; 
            $config['max_height'] = 800;
        	$this->upload->initialize($config);
        
        if ($this->upload->do_upload('image')) {
        		$fileData = $this->upload->data();
        		$filename = $fileData['file_name'];
        		echo "File uploaded successfully.";
        	} else {
        		$error = $this->upload->display_errors();
        		echo "File upload failed: " . $error;
        	}
          }

        $data =array(
            'image' => $filename ,
            'heading' => $this->input->post('heading'),
            'Sub_heading' => $this->input->post('Sub_heading'),
            'shot_description'=> $this->input->post('shot_description'),
            'shop_link'=> $this->input->post('shop_link'),
            'status'=>'Active',
            'is_deleted'=>'N',
            );

        $response = $this->Settings_Model->addBanner_model($data);
        if ($response) {
            $this->session->set_flashdata('flashSuccess', 'Banner Created!');
            redirect(base_url() . 'Settings/view_Banner');
        } else {
            $this->session->set_flashdata('flashError', 'Banner Creation Failed!');
            redirect(base_url() . 'Settings/view_Banner');
        }
      }	
      
      public function get_Banner(){
          
        $id = $this->input->post('id');
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_banner')->row();
		echo json_encode($result);
      }
      
        public function edit_Banner(){
    //   print_r($_POST);die; // 
	    $id = $this->input->post('id');
	    
	        $data =array(
            'image' => $filename ,
            'heading' => $this->input->post('heading'),
            'Sub_heading' => $this->input->post('Sub_heading'),
            'shot_description'=> $this->input->post('shot_description'),
            'shop_link'=> $this->input->post('shop_link'),
            'status'=>'Deactive',
            'is_deleted'=>'Y',
            );
		$result = $this->Settings_Model->editBanner_Model($id,$data);
	
		if($result==true){
			$this->session->set_flashdata('flashSuccess','Banner Updated!');
		  redirect(base_url() . 'Settings/view_Banner');
		}else{
			 $this->session->set_flashdata('flashError','Banner Updated Failed!');
           redirect(base_url() . 'Settings/view_Banner');
		}

	}

    
    }

 
  
 

 

 
