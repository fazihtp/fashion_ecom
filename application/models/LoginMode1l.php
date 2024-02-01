<?php class LoginModel extends CI_Model {
    public function insertMember($data) {
        $this->db->insert('tbl_member_details', $data);
    }
}
