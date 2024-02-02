
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

   public function __construct() {

    parent::__construct();
	$this->load->model('CategoryModel');
    $this->load->helper(array('form','url'));
    $this->load->library(array('upload','encryption'));
    // $this->load->library('pagination');
    $this->load->library('Ajax_pagination');
}
public function product_view($cat_id) {
    $res_id = $this->input->get('res_id');
    
    $id = base64_decode($cat_id);
    // print_r($id);die;
    $data['category_name'] = $this->CategoryModel->getCategoryName($id);
    // $data['category'] = $this->CategoryModel->getSubCategories($id);
    $data['products'] = $this->CategoryModel->getProductsPaginated($id);
    $data['catid'] = $id;
    //  print_r($data['products'] );die;
    $this->load->view('home_pages/view_products1', $data);
}


 public function view_products($id){
     $product_id=base64_decode($id);
     $data['category']     =$this->CategoryModel->getSubCategories(($product_id));
     $data['products']     =$this->CategoryModel->getProductsDetailsById($product_id);
     $data['category_name']=$this->CategoryModel->getCategoryName($product_id);
     $data['images']       =$this->CategoryModel->getProductsImagesById($product_id);
    $this->load->view('home_pages/product_view',$data);
 }

	
     public function get_products() {
        $offset = $this->input->get('offset');
        $category_id = $this->input->get('cat_id');
        // print_r($category_id);die;
        $minPrice = $this->input->get('minPrice');
        $maxPrice = $this->input->get('maxPrice');
        $sortOption = $this->input->get('sortOption');
        $products = $this->CategoryModel->get_products_by_offset($offset, $category_id, $minPrice, $maxPrice, $sortOption);
        // print_r($this->db->last_query());die;
        $data['products'] = $products;
        $html = $this->load->view('home_pages/product_html_view', $data, true);
        echo $html;
    }
    
}
