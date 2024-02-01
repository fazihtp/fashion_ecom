<?php class LoginModel extends CI_Model {
    
    	public function checkUser($data){
    // 	 print_r($data);die;
		$email=$this->input->post('useremail');
        $password=sha1($this->input->post('password'));
		//print_r($password);die;
        $sql="SELECT * FROM tbl_users WHERE user_name='$email' AND password='$password' AND status='1' AND role_id='1' ";
		$query = $this->db->query($sql);
		$result=$query->row();
        if(!empty($result)) {
            return $result;
        }else{
            return false;
        }

    }
}