
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

   public function __construct() {

        parent::__construct();
		$this->load->model('ProductsModel');
        $this->load->helper(array('form','url'));
        $this->load->library(array('upload','encryption'));
       	if(!$this->session->userdata('user_id'))
        {
            redirect(base_url() . 'login');
        } 
    }
	public function index()
	{   
	    $this->load->model('AdminModel');
	    $data['categories'] = $this->ProductsModel->getCategories();
        $data['size']       = $this->ProductsModel->getsize();
        $data['colours']    = $this->ProductsModel->getColours();
        $this->load->view('admin/products/add_products',$data);
	}
   	public function get_sub_category_list(){
		$id=$_POST['category'];
		$data=$this->ProductsModel->getSubCategoryList($id);
		echo json_encode($data);
   	}
  
    public function post_products()
    {
    //   print_r($_POST) ;die;
    $product_name        = $this->input->post('product_name');
    $category_id         = $this->input->post('categories');
    $quantity            = $this->input->post('quantity');
    $price               = $this->input->post('price');
    $product_description = $this->input->post('full_details');
    $other_details       = $this->input->post('other_details');
    // $images = $_FILES['product_images'];
    $data = array(
        'category_id' => $category_id,
        'product_name' => $product_name,
        'product_description' => $product_description,
        'quantity' => $quantity,
        'price' => $price,
        'status' =>'Active',
        'other_details' => $other_details,
        'modified_at' => date('Y-m-d H:i:s'),
        'created_at' => date('Y-m-d H:i:s'),
    );
    $product_id = $this->ProductsModel->insertProducts($data);
      $user_id = $this->session->userdata('user_id');
      if ($product_id > 0) {
        $files = $_FILES;
        $countt = count($_FILES['product_images']['name']);
        for ($i = 0; $i < $countt; $i++) {
            if ($_FILES['product_images']['name'][$i]) {
                $filename = basename($_FILES['product_images']['name'][$i]);
                $tmp = explode('.', $filename);
                $file_extension = end($tmp);
                $ext = strtolower($file_extension);
                $image = "product_images" . time() . $i . '.' . $ext;
                $uploadfile = "assets/uploads/products_images";
                move_uploaded_file($_FILES["product_images"]["tmp_name"][$i], $uploadfile . "/" . $image);
                $image_data = array(
                    'product_id' => $product_id,
                    'image' => $image,
                    'modified_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('tbl_products_gallery', $image_data);
            }
        }
        if ($product_id > 0) {
            $this->session->set_flashdata('flashSuccess', 'Product Added.');
             redirect(base_url() . 'Products');
        } else {
            $this->session->set_flashdata('flashError', 'Something went wrong!');
            redirect(base_url() . 'Products');
        }
       } else {
        $this->session->set_flashdata('flashError', 'Something went wrong!');
        redirect(base_url() . 'Products');
        }
      
    }
 	public function list_products()
	{   
		$this->load->view('admin/products/list_products');
	}  
    
    function getProductList()
    { 
		$data = $row = array();
		$records   =  $this->ProductsModel->getProductList($_POST);
		$i = $_POST['start'];
		$filterValue = isset($_POST['stock_update']) ? $_POST['stock_update'] : 'all'; 
		foreach($records as $vend){
			$i++;
			$row_data[]   =   $i;
			$row_data[]   = "<img class='vendor-thumb' src='" . base_url() . "assets/uploads/products_images/".$vend->image."' alt='Product image'>";
			$row_data[]   =   $vend->product_name;
			$row_data[]   =   $vend->name;
            $row_data[]   =   $vend->quantity;
            $row_data[]   =   $vend->price;                                   
             $row_data[]   =   $vend->status;
		    $btn		   =	  "";
        $btn .= '<a href="' . base_url() . 'Products/view_product/' . base64_encode($vend->id) . '" class="edit-item-btn"><i class="fa fa-eye" style="font-size: 24px;"></i></a>&nbsp;';
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
        $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_product(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>&nbsp";
        $row_data[]   =   $btn;
        $data[]       =   $row_data;   
        $row_data     =   array();
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" =>$this->ProductsModel->getProductList($_POST,"filter"),
			"recordsFiltered" => $this->ProductsModel->getProductList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);

    }
    
    public function view_product($id)
	{ // print_r($_POST);die;
	     $product_id               = base64_decode($id);
	     $this->load->model('AdminModel');
	     $data['categories']       = $this->ProductsModel->getCategories();
         $data['size']             = $this->AdminModel->getsize();
         $data['colours']          = $this->AdminModel->getColours();
         $data['product_colour']   =$this->ProductsModel->getproductsColourById($product_id);
         $data['product_size']     =$this->ProductsModel->getproductsSizeeById($product_id);
         $data['product_images']   =$this->ProductsModel->getproductsImagesById($product_id);
         $data['varient_images']   =$this->ProductsModel->getvarientsImagesById($product_id);
	     $data['products']         =$this->ProductsModel->getproductsById($product_id);
	     $data['products_varients']=$this->ProductsModel->getproductsVarientById($product_id);
	     $data['sub_categories']   =$this->ProductsModel->getSubCategoriesById($data['products']->category_id);
         
	     $data['products']         = is_object($data['products']) ? (array) $data['products'] : $data['products'];
	     $data['img_id'] = $this->ProductsModel->getproductsImage();
	     $this->load->view('admin/products/edit_product.php',$data);
	}
 public function update_products()
{
    $product_id = $this->input->post('updated_product_id');
    $product_name = $this->input->post('updated_product_name');
    $category_id = $this->input->post('updated_category');
    $product_description = $this->input->post('updated_full_details');
    $other_details = $this->input->post('updated_other_details');
    $price = $this->input->post('updated_price');
    $quantity = $this->input->post('updated_product_quantity');
    
   

    $data = array(
        'category_id' => $category_id,
        'price' => $price,
        'product_name' => $product_name,
        'product_description' => $product_description,
        'quantity' => $quantity,
        'other_details' => $other_details,
        'modified_at' => date('Y-m-d H:i:s'),
    );
    $updated=$this->ProductsModel->updateProductDetails($product_id, $data);
    if($updated){
    $this->session->set_flashdata('flashSuccesss', 'Product Updated.');
        }else{
            $this->session->set_flashdata('flashError', 'Something Went Wrong');
        }
    redirect($_SERVER['HTTP_REFERER']);
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
		redirect(base_url() . 'Products/list_products');
    }
     public function deleteProductVarient($id) {
        $result = $this->ProductsModel->deleteProductVarient($id);
        echo json_encode($result);
    }
     public function getProductPrice() {
         $id= $this->input->post('id');
        $result = $this->ProductsModel->getProductPrice($id);
        // print_r($result);die;
        echo json_encode($result);
    }
    
      public function deleteProduct(){
        $id = $this->input->post('product_id');
        $data = array(
            'status'=>'Deactive',
            'is_deleted'=>'Y',
            );
	    $status = $this->ProductsModel->delete_product($id,$data);
		if($status>0){
			 $this->session->set_flashdata('flashSuccess', 'Deleted successfully');
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     redirect(base_url() . 'Products/list_products');
        }
      public function changeToOffer(){
        $id = $this->input->post('product_id_offer');
        // print_r($id);die;
        $data = array(
            'if_offer'=>'Y',
            );
        $data1 = array(
            'price_for_non_members'=>$this->input->post('non_members'),
            'price_for_members'=>$this->input->post('member_price'),
            );
	    $status = $this->ProductsModel->changeToOffer($id,$data,$data1);
		if($status){
			 $this->session->set_flashdata('flashSuccess', 'Updated successfully');
		}else{
			    $this->session->set_flashdata('flashError', 'Something Went Wrong');
		}
	     	redirect($_SERVER['HTTP_REFERER']);
        }
        
}
