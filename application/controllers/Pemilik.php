<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemilikModel');
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('is_pemilik') == TRUE) {
            redirect('Pemilik/securepage', 'refresh');
        }

        $this->load->view('pemilik/login/form_login');
    }

    //register
    public function register()
    {

        if ($this->session->userdata('is_pemilik') == TRUE) {
            redirect('Pemilik/securepage', 'refresh');
        }

        $this->load->view('pemilik/register/form_register');
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[pemilik.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => get_hash($this->input->post('password')),
                'hp' => $this->input->post('hp'),
                'nama_usaha' => $this->input->post('nama_usaha'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'date_created' => date('Y-m-d H:i:s'),
                'status' => 0,
                'foto' => 'avatar.jpg',
            );

            if (!empty($_FILES['ktp']['name'])) {
                $ktp = $this->_do_upload();
                $data['ktp'] = $ktp;
            }

            if ($this->PemilikModel->register($data)) {

                $this->session->set_flashdata('success', 'Register berhasil, tunggu akun diverifikasi max 2 hari kerja.');
                redirect('Pemilik/', 'refresh');
            } else {

                $this->session->set_flashdata('error', 'Register pemilik gagal!');
                redirect('Pemilik/', 'refresh');
            }
        } else {

            $this->load->view('pemilik/register/form_register');
        }
    }

    private function _do_upload()
    {
        $image_name = time() . '-' . $_FILES["ktp"]['name'];

        $config['upload_path']         = 'uploads/pemilik/ktp/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ktp')) {
            $this->session->set_flashdata('success', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    //login
    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->PemilikModel->cek_mail()->num_rows() == 1) {

                $db = $this->PemilikModel->cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {
                    if ($db->status == 1) {

                        $data_login = array(
                            'is_pemilik' => TRUE,
                            'email'  => $db->email,
                            'nama'   => $db->nama,
                            'id'   => $db->id
                        );

                        $this->session->set_userdata($data_login);
                        redirect('Pemilik/securepage', 'refresh');
                    } else {
                        $this->session->set_flashdata('error', 'Login gagal: akun belum terverifikasi!');
                        redirect('Pemilik/', 'refresh');
                    }
                } else {

                    $this->session->set_flashdata('error', 'Login gagal: password salah!');
                    redirect('Pemilik/', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('error', 'Login gagal: email salah!');
                redirect('Pemilik/', 'refresh');
            }
        } else {

            $this->load->view('pemilik/login/form_login');
        }
    }


    public function securepage()
    {

        if ($this->session->userdata('is_pemilik') == FALSE) {
            redirect('Pemilik/', 'refresh');
        }

        $data['title'] = 'Dashboard';
        $data['pemilik'] = $this->PemilikModel->data_pemilik();

		$data['saldo_bulan'] = $this->PemilikModel->saldo_bulan();
		$data['saldo_total'] = $this->PemilikModel->saldo_total();
		$data['perbandingan'] = $this->PemilikModel->perbandingan();
		$data['perbandingan_pendapatan'] = $this->PemilikModel->perbandingan_pendapatan();
		$data['pendapatan_mobil'] = $this->PemilikModel->pendapatan_mobil();
		$data['pendapatan_motor'] = $this->PemilikModel->pendapatan_motor();
		$data['pendapatan_bulan_ini'] = $this->PemilikModel->pendapatan_bulan_ini();
		$data['pendapatan_bulan_lalu'] = $this->PemilikModel->pendapatan_bulan_lalu();

		$this->db->select('r.id_rating, r.rating, r.feedback, r.order_id, k.id_pelanggan id_pelanggan, k.nama nama_pelanggan, k.id_tempat_cuci, d.id id_tempat, d.nama nama_tempat');
		$this->db->from('rating r');
		$this->db->join('transaksi k', 'r.order_id = k.order_id');
		$this->db->join('tempat_cuci d', 'k.id_tempat_cuci = d.id');
		$this->db->where('d.id_pemilik', $this->session->userdata('id'));
		$this->db->order_by('r.id_rating', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		$data['rating'] = $query->result();

		$data['transaksi'] = $this->db->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.kendaraan, tw.tanggal_pesan, tw.id_pelanggan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_tempat_cuci, w.nama nama_usaha, w.foto1 foto1
                FROM transaksi tw 
                JOIN tempat_cuci w 
                ON tw.id_tempat_cuci = w.id
				WHERE tw.status_code != 202 AND w.id_pemilik = ".$this->session->userdata('id')."
                ORDER BY transaction_time DESC LIMIT 5")->result();

        $this->load->view('pemilik/layout/header', $data);
        $this->load->view('pemilik/layout/sidebar', $data);
        $this->load->view('pemilik/index', $data);
        $this->load->view('pemilik/layout/footer', $data);
		$this->load->view('pemilik/layout/script', $data);
    }

    public function logout()
    {

        $this->session->unset_userdata('is_pemilik');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');

        session_destroy();
        $this->session->set_flashdata('success', 'Sign Out Berhasil!');
        redirect('Pemilik/', 'refresh');
    }

    //profile
    function profile()
    {
        if ($this->session->userdata('is_pemilik') == FALSE) {
            redirect('Pemilik/', 'refresh');
        }

        $data['title'] = 'Profile';
        $data['pemilik'] = $this->PemilikModel->data_pemilik();

        $this->load->view('pemilik/layout/header', $data);
        $this->load->view('pemilik/layout/sidebar', $data);
        $this->load->view('pemilik/profile/index', $data);
        $this->load->view('pemilik/layout/footer', $data);
        $this->load->view('pemilik/profile/script', $data);
    }

    function get_data()
    {
        $data = $this->PemilikModel->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function get_single($id)
    {
        $data = $this->PemilikModel->getById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function _validate()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'trim|required|min_length[2]');
        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'Foto', 'required');
        }
    }

    function _config()
    {
        $config['upload_path']      = "./uploads/pemilik";
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
    }

    function do_upload()
    {
        $this->_validate();
        $this->_config();

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $nama_usaha = $this->input->post('nama_usaha');
        $alamat_usaha = $this->input->post('alamat_usaha');

        if ($this->form_validation->run() == FALSE || $this->upload->do_upload("file") == FALSE) {
            $errors = array(
                'file'            => form_error('file'),
                'nama'         => form_error('nama'),
                'email'         => form_error('email'),
                'hp'         => form_error('hp'),
                'nama_usaha'         => form_error('nama_usaha'),
                'alamat_usaha'         => form_error('alamat_usaha'),
                'fail_upload'     => $this->upload->display_errors('', '')
            );
            $data = array(
                'errors' => $errors,
                'status' => false
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    function edit()
    {
        $id = $this->input->post('id');
        $img_data = $this->PemilikModel->getById($id);
        $img_src = FCPATH . 'uploads/pemilik/' . $img_data->foto;

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $nama_usaha = $this->input->post('nama_usaha');
        $alamat_usaha = $this->input->post('alamat_usaha');

        if ($_FILES['file']['name'] == '') {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('hp', 'Hp', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'trim|required|min_length[2]');

            if ($this->form_validation->run()) {
                $this->PemilikModel->update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, null);
                $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
            } else {
                $errors['nama'] = form_error('nama');
                $errors['email'] = form_error('email');
                $errors['hp'] = form_error('hp');
                $errors['nama_usaha'] = form_error('nama_usaha');
                $errors['alamat_usaha'] = form_error('alamat_usaha');
                $data = array(
                    'errors' => $errors,
                    'status' => false
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            $this->_validate();
            $this->_config();
            if ($this->form_validation->run() == FALSE || $this->upload->do_upload("file") == FALSE) {
                $errors = array(
                    'file'            => form_error('file'),
                    'nama'         => form_error('nama'),
                    'email'         => form_error('email'),
                    'hp'         => form_error('hp'),
                    'nama_usaha'         => form_error('nama_usaha'),
                    'alamat_usaha'         => form_error('alamat_usaha'),
                    'fail_upload'     => $this->upload->display_errors('', '')
                );
                $data = array(
                    'errors' => $errors,
                    'status' => false
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $data = array('upload_data' => $this->upload->data());
                $image = $data['upload_data']['file_name'];

                if ($img_data->foto == 'avatar.jpg') {
                    $this->PemilikModel->update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, $image);
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
                } else {

                    if (unlink($img_src)) {
                        $this->PemilikModel->update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, $image);
                        $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
                    }
                }
            }
        }
    }

    //password

    function edit_password()
    {
        $id = $this->session->userdata('id');

        $password = $this->input->post('password');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run()) {
            $this->PemilikModel->updatePassword($id, $password);
            redirect('Pemilik/profile', 'refresh');
        } else {
            redirect('Pemilik/profile', 'refresh');
        }
    }

    //data tempat cuci
    function tempat_cuci()
    {
        if ($this->session->userdata('is_pemilik') == FALSE) {
            redirect('Pemilik/', 'refresh');
        }

        $data['title'] = 'Tempat Cuci';
        $data['tempat_cuci'] = $this->PemilikModel->data_tempat_cuci();
        $data['cuci'] = $this->PemilikModel->data_tempat_cuci();
        $data['cucii'] = $this->PemilikModel->data_tempat_cuci();
        $data['pemilik'] = $this->PemilikModel->data_pemilik();

        $this->load->view('pemilik/layout/header', $data);
        $this->load->view('pemilik/layout/sidebar', $data);
        $this->load->view('pemilik/tempat_cuci/index', $data);
        $this->load->view('pemilik/layout/footer', $data);
        $this->load->view('pemilik/tempat_cuci/script', $data);
    }

    public function update_tempat_cuci()
    {
        $id_pemilik = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $maps = $this->input->post('maps');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $harga_mobil = $this->input->post('harga_mobil');
        $harga_motor = $this->input->post('harga_motor');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'hp' => $hp,
            'email' => $email,
            'maps' => $maps,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori,
            'harga_mobil' => $harga_mobil,
            'harga_motor' => $harga_motor,
        );

        //foto1
        if (!empty($_FILES['foto1']['name'])) {
            $foto1 = $this->_do_upload_foto1();

            $upload = $this->PemilikModel->get_by_tempat_cuci();
            if (file_exists('uploads/tempat_cuci/foto1/' . $upload->foto1) && $upload->foto1) {
                if ($upload->foto1 != 'avatar.jpg') {
                    unlink('uploads/tempat_cuci/foto1/' . $upload->foto1);
                }
            }

            $data['foto1'] = $foto1;
        }
        //foto2
        if (!empty($_FILES['foto2']['name'])) {
            $foto2 = $this->_do_upload_foto2();

            $upload = $this->PemilikModel->get_by_tempat_cuci();
            if (file_exists('uploads/tempat_cuci/foto2/' . $upload->foto2) && $upload->foto2) {
                if ($upload->foto2 != 'avatar.jpg') {
                    unlink('uploads/tempat_cuci/foto2/' . $upload->foto2);
                }
            }

            $data['foto2'] = $foto2;
        }
        //foto3
        if (!empty($_FILES['foto3']['name'])) {
            $foto3 = $this->_do_upload_foto3();

            $upload = $this->PemilikModel->get_by_tempat_cuci();
            if (file_exists('uploads/tempat_cuci/foto3/' . $upload->foto3) && $upload->foto3) {
                if ($upload->foto3 != 'avatar.jpg') {
                    unlink('uploads/tempat_cuci/foto3/' . $upload->foto3);
                }
            }

            $data['foto3'] = $foto3;
        }

        $this->PemilikModel->update_tempat_cuci($data, $id_pemilik);
        $this->session->set_flashdata('success', 'Edit Profile Berhasil!');
        redirect('Pemilik/tempat_cuci', 'refresh');
    }

    private function _do_upload_foto1()
    {
        $image_name = time() . '-' . $_FILES["foto1"]['name'];

        $config['upload_path']         = 'uploads/tempat_cuci/foto1/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto1')) {
            $this->session->set_flashdata('success', $this->upload->display_errors('', ''));
            redirect('Pemilik/tempat_cuci', 'refresh');
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_foto2()
    {
        $image_name = time() . '-' . $_FILES["foto2"]['name'];

        $config['upload_path']         = 'uploads/tempat_cuci/foto2/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto2')) {
            $this->session->set_flashdata('success', $this->upload->display_errors('', ''));
            redirect('Pemilik/tempat_cuci', 'refresh');
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_foto3()
    {
        $image_name = time() . '-' . $_FILES["foto3"]['name'];

        $config['upload_path']         = 'uploads/tempat_cuci/foto3/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto3')) {
            $this->session->set_flashdata('success', $this->upload->display_errors('', ''));
            redirect('Pemilik/tempat_cuci', 'refresh');
        }
        return $this->upload->data('file_name');
    }

	public function tutup_sementara()
	{
		$id_pemilik = $this->session->userdata('id');

		$data = array(
			'status' => 0,
		);

		$this->PemilikModel->update_tempat_cuci($data, $id_pemilik);
		$this->session->set_flashdata('success', 'Tutup Sementara Berhasil!');
		redirect('Pemilik/tempat_cuci', 'refresh');
	}

	public function buka_lagi()
	{
		$id_pemilik = $this->session->userdata('id');

		$data = array(
			'status' => 1,
		);

		$this->PemilikModel->update_tempat_cuci($data, $id_pemilik);
		$this->session->set_flashdata('success', 'Buka Lagi Tempat Cuci Berhasil!');
		redirect('Pemilik/tempat_cuci', 'refresh');
	}

    //transaksi
    function transaksi()
    {
        if ($this->session->userdata('is_pemilik') == FALSE) {
            redirect('Pemilik/', 'refresh');
        }

        $id = $this->session->userdata('id');

        $data['title'] = 'Data Transaksi';
        $data['pemilik'] = $this->PemilikModel->data_pemilik();
        $data['transaksi'] = $this->db->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.status, tw.kendaraan, tw.tanggal_pesan, tw.id_pelanggan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_tempat_cuci, w.nama nama_usaha, w.foto1 foto1, w.id_pemilik id_pemilik
                FROM transaksi tw 
                JOIN tempat_cuci w 
                ON tw.id_tempat_cuci = w.id
                WHERE w.id_pemilik = $id
                ORDER BY transaction_time DESC")->result();

        $this->load->view('pemilik/layout/header', $data);
        $this->load->view('pemilik/layout/sidebar', $data);
        $this->load->view('pemilik/transaksi/index', $data);
		$this->load->view('pemilik/transaksi/script', $data);
        $this->load->view('pemilik/layout/footer', $data);
    }

	function transaksi_aktif()
	{
		if ($this->session->userdata('is_pemilik') == FALSE) {
			redirect('Pemilik/', 'refresh');
		}

		$id = $this->session->userdata('id');

		$data['title'] = 'Data Transaksi Aktif';
		$data['pemilik'] = $this->PemilikModel->data_pemilik();
		$data['transaksi'] = $this->db->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.status, tw.kendaraan, tw.tanggal_pesan, tw.id_pelanggan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_tempat_cuci, w.nama nama_usaha, w.foto1 foto1, w.id_pemilik id_pemilik
                FROM transaksi tw 
                JOIN tempat_cuci w 
                ON tw.id_tempat_cuci = w.id
                WHERE w.id_pemilik = $id AND tw.status_code != 202 AND tw.status != 3
                ORDER BY transaction_time DESC")->result();

		$this->load->view('pemilik/layout/header', $data);
		$this->load->view('pemilik/layout/sidebar', $data);
		$this->load->view('pemilik/transaksi/index_aktif', $data);
		$this->load->view('pemilik/transaksi/script', $data);
		$this->load->view('pemilik/layout/footer', $data);
	}

    function proses_transaksi($order_id)
    {
        $data = $this->PemilikModel->proses_transaksi($order_id);
        redirect('Pemilik/transaksi_aktif', 'refresh');
    }

    function batal_transaksi($order_id)
    {
        $data = $this->PemilikModel->batal_transaksi($order_id);
        redirect('Pemilik/transaksi_aktif', 'refresh');
    }

    function selesai_transaksi($order_id)
    {
        $data = $this->PemilikModel->selesai_transaksi($order_id);
        redirect('Pemilik/transaksi_aktif', 'refresh');
    }

	//rating
	public function rating()
	{
		if ($this->session->userdata('is_pemilik') == FALSE) {
			redirect('Pemilik/', 'refresh');
		}

		$data['title'] = 'Data Rating';
		$data['pemilik'] = $this->PemilikModel->data_pemilik();

		$this->db->select('r.id_rating, r.rating, r.feedback, r.order_id, k.id_pelanggan id_pelanggan, k.nama nama_pelanggan, k.id_tempat_cuci, d.id id_tempat, d.nama nama_tempat, z.id id_pemilik');
		$this->db->from('rating r');
		$this->db->join('transaksi k', 'r.order_id = k.order_id');
		$this->db->join('tempat_cuci d', 'k.id_tempat_cuci = d.id');
		$this->db->join('pemilik z', 'd.id_pemilik = z.id');
		$this->db->where('z.id', $this->session->userdata('id'));
		$this->db->where('r.status', '1');
		$query = $this->db->get();
		$data['rating'] = $query->result();

		$this->load->view('pemilik/layout/header', $data);
		$this->load->view('pemilik/layout/sidebar', $data);
		$this->load->view('pemilik/rating/index', $data);
		$this->load->view('pemilik/layout/footer', $data);
		$this->load->view('pemilik/rating/script', $data);
	}
}
