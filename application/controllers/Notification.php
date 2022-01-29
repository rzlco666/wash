<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-5Ruf9S0MygrZvbPtD30WXmKD', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, 'true');

		$order_id = $result['order_id'];
		$data = [
			'status_code' => $result['status_code']
		];

		if($result['status_code']==200){
			$this->db->update('transaksi', $data, array('order_id'=>$order_id));
		}elseif($result['status_code']==202){
			$this->db->update('transaksi', $data, array('order_id'=>$order_id));
		}else{
			$this->db->update('transaksi', $data, array('order_id'=>$order_id));
		}

	}
	
}
