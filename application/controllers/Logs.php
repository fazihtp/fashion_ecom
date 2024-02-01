<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends CI_Controller {

	public function __construct() {

        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('upload','encryption'));
         	if(!$this->session->userdata('user_id'))
        {
            redirect(base_url() . 'login');
        } 
}
    function logCpuUsage() {
    $cpuUsage = sys_getloadavg(); // Get CPU load average
    $currentTime = date('Y-m-d H:i:s');

    // Log CPU usage to a file
    $logMessage = "[$currentTime] CPU Load: {$cpuUsage[0]} {$cpuUsage[1]} {$cpuUsage[2]}\n";
    file_put_contents('/path/to/cpu_usage.log', $logMessage, FILE_APPEND);
}
}