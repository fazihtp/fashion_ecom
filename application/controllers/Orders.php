<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "./third_party/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Orders extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->model('OrdersModel');
        $this->load->helper(array('form','url'));
        $this->load->library('upload');
         	if(!$this->session->userdata('user_id'))
        {
            redirect(base_url() . 'login');
        } 
}
    public function index(){
         $id = $this->input->post('order_id1');
         $data['products'] =   $this->OrdersModel->getOrderProductsById($id);
         $this->load->view('admin/orders/list_orders',$data);
    }
        function getOrderList()
    {
		$data = $row = array();
		$user   =   $this->OrdersModel->getOrderList($_POST);
		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[] = '<div style="color:#000;"><input type="checkbox" class="cus_class" id="custom" name="custom[]" value="' . $vend->id . '" style="height: 20px;width: 22px;}"></div>';
			$row_data[]   =   $i;
			if($vend->order_status=='Processing'){
			    $style='secondary';
			}else if($vend->order_status=='Packing'){
			     $style='warning';
			
			}else if($vend->order_status=='Dispatched'){
			     $style='info';
			}else if($vend->order_status=='Failed'){
			     $style='danger';
			}else {
			     $style='success';
			}
			$row_data[]   =   $vend->id;
			$row_data[]   =   "<strong>{$vend->name}</strong><br>{$vend->mobile}";
			$row_data[] = date('d M y h:i A', strtotime($vend->created_at));

			$row_data[] = "<strong>{$vend->to_name}</strong>";
			$row_data[] = "<strong>{$vend->to_phone}</strong>";
			$row_data[]   =   $vend->to_street;
			$row_data[]   =   $vend->total_amount;
			$row_data[]   =   "<span class='mb-2 mr-2 badge badge-{$style}'>{$vend->order_status}</span>";
			$btn		  =	  "";
			
			$btn .= "<a href='" . base_url('Orders/viewOrders/'. $vend->id) . "' target='_blank' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp";
// 			$btn		 .=	  "<a target='_blank' href='" . base_url('Orders/changeToProce/' .$vend->id) . "' class='='btn btn-soft-warning'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";
			$btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#approvedModal' onclick='change_status(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";
			$btn		 .=	  "<a target='_blank' href='" . base_url('Orders/generatePdf/' .$vend->id) . "' class='='btn btn-soft-warning'><i class='fas fa-print' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
		
			
		    $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_order(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OrdersModel->getOrderList($_POST,"filter"),
			"recordsFiltered" => $this->OrdersModel->getOrderList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }

public function getOrderProductsById()
{
   $id = $this->input->post('order_id1');
   $data =   $this->OrdersModel->getOrderProductsById($id);
   echo json_encode($data);
}

public function deleteOrderProduct()
{
    	$id = $this->input->post('deleteorder');
    		$data1=array(
			'is_deleted'=>'Y'
		);
		$data=$this->OrdersModel->deleteOrder($id,$data1);
		if ($data) {
        $this->session->set_flashdata('flashSuccess', 'Deleted ');
            	redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flashError', 'Deleted  Failed!');
            	redirect($_SERVER['HTTP_REFERER']);
        }
}
public function viewOrders($order_id){
    //   print_r($order_id);die;
         $data=[];
    	 $data['order_list']=$this->OrdersModel->getUserDetails($order_id);
    	//  echo $this->db->last_query();die;
    	   //print_r($data['order_list']);die;
    	 $code =$order_id;
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();
		imagepng($imageResource, 'assets/uploads/barcodes/'.$code.'.png');
		 $data['barcodeImage'] = 'assets/uploads/barcodes/'.$code.'.png';
         $data['product_list']=$this->OrdersModel->getUserProductList($order_id);
         $data['lists']=$this->OrdersModel->getOrderProductList($order_id);
        //   print_r($this->db->last_query());die;
         $this->load->view('admin/orders/view_orders',$data);
}
    public function processed(){
	    $this->load->view('admin/orders/processed_orders');
	}

        function getProcessedList()
    {
		$data = $row = array();
		$user   =   $this->OrdersModel->getProcessedList($_POST);

		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
// 			$row_data[] = '<div style="color:#000;"><input type="checkbox" class="cus_class" id="custom" name="custom[]" value="' . $vend->id . '" style="height: 20px;width: 22px;}"></div>';
			$row_data[]   =   $i;
			if($vend->order_status=='Order Placed'){
			    $style='secondary';
			}else if($vend->order_status=='REDY TO SHIP'){
			     $style='warning';
			
			}else if($vend->order_status=='ON THE WAY'){
			     $style='info';
			}else {
			     $style='success';
			}
			$row_data[]   =   $vend->id;
			$row_data[]   =   "<strong>{$vend->name}</strong><br>{$vend->mobile}";
			$row_data[] = date('d M y h:i A', strtotime($vend->created_at));

			$row_data[] = "<strong>{$vend->to_name}</strong>";
			$row_data[] = "<strong>{$vend->to_phone}</strong>";
			$row_data[]   =   $vend->to_street;
			$row_data[]   =   $vend->total_amount;

			$row_data[]   =   "<span class='mb-2 mr-2 badge badge-{$style}'>{$vend->order_status}</span>";
			$btn		  =	  "";
			
			$btn .= "<a href='" . base_url('Orders/viewOrders/'. $vend->id) . "' target='_blank' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp";
            $btn		 .=	  "<a data-bs-toggle='modal' data-bs-target='#tracking_modal' onclick='change_status(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp";
	        $btn		 .=	  "<a data-bs-target='#rejectedModal' data-bs-toggle='modal' onclick='change_to_pending(".$vend->id.")' class='='btn btn-soft-warning'><i class='fas fa-times-circle' style='font-size: 24px;color:#EEC900'></i></a>&nbsp";
	        $btn		 .=	  "<a data-bs-target='#freeze_model' data-bs-toggle='modal' onclick='change_to_freeze(".$vend->id.")' class='='btn btn-soft-primary'><i class='fas fa-stopwatch-20' style='font-size: 26px;color:#a58e92'></i></a>&nbsp";
       
			
		    $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_order(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OrdersModel->getProcessedList($_POST,"filter"),
			"recordsFiltered" => $this->OrdersModel->getProcessedList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }
	public function shippedOrders(){
	    $this->load->view('admin/orders/shipped_orders');
	}


  public function ChangeToPrint(){
    // 	$member=$id;
        $id = $this->input->post('order_id');
		$data=$this->OrdersModel->ChangeToPrint($id);
		if ($data) {
            $this->session->set_flashdata('flashSuccess', 'Procecced ');
            	redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flashError', 'Processing  Failed!');
           	redirect($_SERVER['HTTP_REFERER']);
        }
	 }
         
 	public function newOrders(){
 	    
	    $this->load->view('admin/orders/new_orders');
	}
        function getAllOrderList()
    {
		$data = $row = array();
		$user   =   $this->OrdersModel->getAllOrderList($_POST);
		$tt_product=0;
		$tt_shipping=0;
		$tt_amount=0;
		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[] = '<div style="color:#000;"><input type="checkbox" class="cus_class" id="custom" name="custom[]" value="' . $vend->id . '" style="height: 20px;width: 22px;}"></div>';
			$row_data[]   =   $i;
		if($vend->order_status=='Processing'){
			    $style='secondary';
			}else if($vend->order_status=='Packing'){
			     $style='warning';
			
			}else if($vend->order_status=='Dispatched'){
			     $style='info';
			}else if($vend->order_status=='Failed'){
			     $style='danger';
			}else {
			     $style='success';
			}
			$row_data[]   =   $vend->id;
			$row_data[]   =   "<strong>{$vend->name}</strong><br>{$vend->mobile}"; 
			$row_data[] = date('d - m - Y h:i A', strtotime($vend->created_at));
			$row_data[] = "<strong>{$vend->from_name}</strong><br>{$vend->from_phone}";
			$row_data[] = "<strong>{$vend->to_name}</strong><br>{$vend->to_phone}";
			$this->load->model('DashboardModel');
			$total_products=$this->DashboardModel->getOrderProducts($vend->id);
			$row_data[]   =   $vend->shipping_amount; 
			$tt_shipping+= $vend->shipping_amount;
			$row_data[]   =   $total_products; 
			$tt_product += $total_products;
			$row_data[]   =   $vend->order_amount; 
			$tt_amount+=$vend->order_amount; 
			$row_data[]   =   "<span class='mb-2 mr-2 badge badge-{$style}'>{$vend->order_status}</span>";

			$btn = "<a href='" . base_url('Orders/viewOrders/'. $vend->id) . "' target='_blank' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp<a data-bs-toggle='modal' data-bs-target='#approvedModal' onclick='change_status(".$vend->id.")'  class='edit-item-btn'><i class='fas fa-check-circle' style='font-size: 24px;'></i></a>&nbsp;<a target='_blank' href='" . base_url('Orders/generatePdf/' .$vend->id) . "' class='='btn btn-soft-warning' title='Print'><i class='fas fa-print' style='font-size: 24px;color:#EEC900'></i></a>&nbsp<a   data-bs-toggle='modal' data-bs-target='#refundModal' onclick='refund_modal(".$vend->id.")'  ' class='btn btn-soft-warning 1' style='padding=0px' title='Refund'><span class='mdi mdi-cash-refund' style='font-size: 29px;'></span></a>&nbsp;<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_order(".$vend->id.")' class='='btn btn-soft-danger' title='Delete'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";
			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OrdersModel->getAllOrderList($_POST,"filter"),
			"recordsFiltered" => $this->OrdersModel->getAllOrderList($_POST,"filter"),
			"data" => $data,
			"totalShipping"=> number_format($tt_shipping),
			"totalProducts"=> number_format($tt_product),
			"totalAmount"=> number_format($tt_amount),
		);
		echo json_encode($output);
    }
	public function failedOrders(){
	    $this->load->view('admin/orders/failed_orders');
	}

       

    
  	public function PrintedOrders(){
 	    
	    $this->load->view('admin/orders/printed_orders');
	}
        function getPrintedOrderList()
    {
		$data = $row = array();
		$user   =   $this->OrdersModel->getPrintedOrderList($_POST);
		$i = $_POST['start'];
		foreach($user as $vend){

			$i++;
			$row_data[] = '<div style="color:#000;"><input type="checkbox" class="cus_class" id="custom" name="custom[]" value="' . $vend->id . '" style="height: 20px;width: 22px;}"></div>';
			$row_data[]   =   $i;
			if($vend->order_status=='Processing'){
			    $style='secondary';
			}else if($vend->order_status=='Packing'){
			     $style='warning';
			}else if($vend->order_status=='Dispatched'){
			     $style='info';
			}else {
			     $style='success';
			}
			$row_data[]   =   $vend->id;
			$row_data[]   =   "<strong>{$vend->name}</strong><br>{$vend->mobile}";
			$row_data[] = date('d M y h:i A', strtotime($vend->created_at));

			$row_data[] = "<strong>{$vend->to_name}</strong>";
			$row_data[] = "<strong>{$vend->to_phone}</strong>";
			$row_data[]   =   $vend->to_street;
			$row_data[]   =   $vend->total_amount;
			$row_data[]   =   "<span class='mb-2 mr-2 badge badge-{$style}'>Shipped</span>";
			$btn		  =	  "";
			
			$btn .= "<a href='" . base_url('Orders/viewOrders/'. $vend->id) . "' target='_blank' class='edit-item-btn'><i class='fas fa-eye' style='font-size: 24px;'></i></a>&nbsp;&nbsp";
			
		
			
		    $btn		 .=	  "<a data-bs-target='#deleteRecordModal' data-bs-toggle='modal' onclick='delete_order(".$vend->id.")' class='='btn btn-soft-danger'><i class='fa fa-trash-o' style='font-size: 20px;color:#f06548'></i></a>";

			$row_data[]   =   $btn;
			$data[]       =   $row_data;   
			$row_data     =   array();
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OrdersModel->getPrintedOrderList($_POST,"filter"),
			"recordsFiltered" => $this->OrdersModel->getPrintedOrderList($_POST,"filter"),
			"data" => $data,
		);
		echo json_encode($output);
    }

}