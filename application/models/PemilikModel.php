<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemilikModel extends CI_Model
{

    //auth
    public function register($data)
    {
        return $this->db->insert('pemilik', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('pemilik', array('email' => $this->input->post('email')));
    }

    public function data_pemilik()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $pemilik = $this->db->get('pemilik');

        return $pemilik->result();
    }

    public function data_tempat_cuci()
    {
        $this->db->where('id_pemilik', $this->session->userdata('id'));
        $pemilik = $this->db->get('tempat_cuci');

        return $pemilik->result();
    }

    //profile
    function getData()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $pemilik = $this->db->get('pemilik');

        return $pemilik->result();
    }

    function getById($id)
    {
        $query = $this->db->get_where('pemilik', array('id' => $id));
        return $query->row();
    }

    function update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, $gambar)
    {
        if ($gambar == null) {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
            );
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'foto' => $gambar,
            );
        }
        $this->db->where('id', $id);
        $result = $this->db->update('pemilik', $data);
        return $result;
    }

    //password

    function updatePassword($id, $password)
    {
        $data = array(
            'password' => get_hash($password),
        );

        $this->db->where('id', $id);
        $result = $this->db->update('pemilik', $data);
        return $result;
    }

    //tempat cuci
    public function update_tempat_cuci($data, $id_pemilik)
    {
        $this->db->where('id_pemilik', $id_pemilik);
        $this->db->update('tempat_cuci', $data);

        return $this->db->affected_rows();
    }

    public function get_by_tempat_cuci()
    {
        $this->db->from('tempat_cuci');
        $this->db->where('id_pemilik', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->row();
    }

    //transaksi
    function proses_transaksi($order_id)
    {
        $id_pemilik = $this->session->userdata('id');
        $status = 2;

        $this->db->set('status', $status);
        $this->db->where('order_id', $order_id);

        $result = $this->db->update('transaksi');
        return $result;
    }

    function batal_transaksi($order_id)
    {
        $id_pemilik = $this->session->userdata('id');
        $status = 4;

        $this->db->set('status', $status);
        $this->db->where('order_id', $order_id);

        $result = $this->db->update('transaksi');
        return $result;
    }

    function selesai_transaksi($order_id)
    {
        $id_pemilik = $this->session->userdata('id');
        $status = 3;

        $this->db->set('status', $status);
        $this->db->where('order_id', $order_id);

        $result = $this->db->update('transaksi');
        return $result;
    }

	//chart
	function saldo_bulan()
	{
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) as jumlah, DATE_FORMAT(transaction_time,'%M-%Y') as bulan
									FROM transaksi JOIN tempat_cuci tc on transaksi.id_tempat_cuci = tc.id
									WHERE status_code = 200 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(transaction_time,'%M-%Y')
									ORDER BY transaction_time ASC")
			->result();

		return $result;
	}

	function saldo_total()
	{
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) saldo from transaksi JOIN tempat_cuci tc on tc.id = transaksi.id_tempat_cuci WHERE status_code = 200 AND transaksi.status = 3 AND tc.id_pemilik = $id_pemilik")
			->result();

		return $result;
	}

	function perbandingan(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT
									IFNULL((SELECT count(gross_amount) as jumlah_motor FROM transaksi WHERE kendaraan = 2 AND status_code=200 AND DATE_FORMAT(transaction_time,'%M-%y') = DATE_FORMAT(tw.transaction_time,'%M-%y') GROUP BY DATE_FORMAT(transaction_time,'%M-%y')), 0) AS jumlah_motor,
									IFNULL((SELECT count(gross_amount) as jumlah_mobil FROM transaksi WHERE kendaraan = 1 AND status_code=200 AND DATE_FORMAT(transaction_time,'%M-%y') = DATE_FORMAT(tw.transaction_time,'%M-%y') GROUP BY DATE_FORMAT(transaction_time,'%M-%y')), 0) AS jumlah_mobil,
									DATE_FORMAT(tw.transaction_time,'%M-%y') as bulan
									FROM
									transaksi tw JOIN tempat_cuci tc on tc.id = tw.id_tempat_cuci
									WHERE tw.status_code = 200 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(tw.transaction_time,'%M-%y')
									ORDER BY tw.transaction_time ASC")
			->result();

		return $result;
	}

	function perbandingan_pendapatan(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT
									IFNULL((SELECT sum(gross_amount) as jumlah_motor FROM transaksi WHERE kendaraan = 2 AND status_code=200 AND DATE_FORMAT(transaction_time,'%M-%y') = DATE_FORMAT(tw.transaction_time,'%M-%y') GROUP BY DATE_FORMAT(transaction_time,'%M-%y')), 0) AS jumlah_motor,
									IFNULL((SELECT sum(gross_amount) as jumlah_mobil FROM transaksi WHERE kendaraan = 1 AND status_code=200 AND DATE_FORMAT(transaction_time,'%M-%y') = DATE_FORMAT(tw.transaction_time,'%M-%y') GROUP BY DATE_FORMAT(transaction_time,'%M-%y')), 0) AS jumlah_mobil,
									DATE_FORMAT(tw.transaction_time,'%M-%y') as bulan
									FROM
									transaksi tw JOIN tempat_cuci tc on tc.id = tw.id_tempat_cuci
									WHERE tw.status_code = 200 AND MONTH(transaction_time) = MONTH(CURRENT_DATE()) AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(tw.transaction_time,'%M')
									ORDER BY tw.transaction_time ASC")
			->result();

		return $result;
	}

	function pendapatan_mobil(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) as jumlah, COUNT(order_id) as pencucian, DATE_FORMAT(transaction_time,'%M %Y') as bulan
									FROM transaksi JOIN tempat_cuci tc on tc.id = transaksi.id_tempat_cuci
									WHERE status_code = 200 AND MONTH(transaction_time) = MONTH(CURRENT_DATE()) AND transaksi.status = 3 AND kendaraan = 1 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(transaction_time,'%M')
									ORDER BY transaction_time ASC")
			->result();
		return $result;
	}

	function pendapatan_motor(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) as jumlah, COUNT(order_id) as pencucian, DATE_FORMAT(transaction_time,'%M %Y') as bulan
									FROM transaksi JOIN tempat_cuci tc on tc.id = transaksi.id_tempat_cuci
									WHERE status_code = 200 AND MONTH(transaction_time) = MONTH(CURRENT_DATE()) AND transaksi.status = 3 AND kendaraan = 2 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(transaction_time,'%M')
									ORDER BY transaction_time ASC")
			->result();
		return $result;
	}

	function pendapatan_bulan_ini(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) as jumlah, DATE_FORMAT(transaction_time,'%M %Y') as bulan
									FROM transaksi JOIN tempat_cuci tc on tc.id = transaksi.id_tempat_cuci
									WHERE status_code = 200 AND MONTH(transaction_time) = MONTH(CURRENT_DATE()) AND transaksi.status = 3 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(transaction_time,'%M')
									ORDER BY transaction_time ASC")
			->result();
		return $result;
	}

	function pendapatan_bulan_lalu(){
		$id_pemilik = $this->session->userdata('id');
		$result = $this->db->query("SELECT SUM(gross_amount) as jumlah, COUNT(order_id) as pencucian, DATE_FORMAT(transaction_time,'%M %Y') as bulan
									FROM transaksi JOIN tempat_cuci tc on tc.id = transaksi.id_tempat_cuci
									WHERE status_code = 200 AND MONTH(transaction_time) = MONTH(CURRENT_DATE())-1 AND transaksi.status = 3 AND tc.id_pemilik = $id_pemilik
									GROUP BY DATE_FORMAT(transaction_time,'%M')
									ORDER BY transaction_time ASC")
			->result();
		return $result;
	}
}
