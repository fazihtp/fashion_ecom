<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	   public function __construct() {

        parent::__construct();
		$this->load->model('LoginModel');
        $this->load->helper(array('form','url'));
        $this->load->library(array('upload','encryption'));
    }
	public function index(){
		$this->load->view('auth/login-form/index');
	}
	public function verifyUser(){
        $data=$_POST;
    	$login=$this->LoginModel->checkUser($data);
		
		if($login){
			$this->session->set_userdata('role_id', $login->role_id);
			$this->session->set_userdata('user_id', $login->id);
			$this->session->set_userdata('signed_in', TRUE);\
			// print_r("yes");die;
			redirect(base_url() .'Admin/approved_list');
		}else{
			print_r("No");die;
			$this->session->set_flashdata('error','Email or Password Incorrect');
			redirect(base_url() . 'login');
		}
    }
// 	public function logout(){
// 		 $this->session->sess_destroy();
// 		redirect($_SERVER['HTTP_REFERER']);
// 	}
}