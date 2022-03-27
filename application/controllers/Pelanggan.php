<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $params = array('server_key' => 'SB-Mid-server-YRDPfLt2nLPhmaom1OdYGkWf', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');

        $this->load->model('PelangganModel');
    }

    public function index()
    {

        $data['title'] = 'Landing';
        $data['tempat_cuci'] = $this->PelangganModel->get_by_tempat_cuci6();

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }

    //tempat cuci
    public function tempat($id)
    {

        $data['title'] = 'Tempat Cuci';
        $data['tempat_cuci'] = $this->PelangganModel->get_id_tempat_cuci($id);
        $data['rekomendasi'] = $this->PelangganModel->get_rekomendasi_tempat_cuci($id);

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/tempat_cuci', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }

    public function tempat_cuci()
    {

        $data['title'] = 'Tempat Cuci';
        $data['tempat_cuci'] = $this->PelangganModel->get_tempat_cuci();

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/tempat_cuci_all', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }

    public function cari()
    {

        $kategori = $this->input->get('kategori');
        $kat = (int)$kategori;
        $nama = $this->input->get('nama');

        $data['title'] = 'Cari Tempat Cuci';

        $data['tempat_cuci'] = $this->PelangganModel->search_tempat_cuci($kat, $nama);

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/cari', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }

    //register
    public function register()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('Pelanggan/', 'refresh');
        }

        $data['title'] = 'Register';

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/register/form_register', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[pelanggan.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->PelangganModel->register()) {

                $this->session->set_flashdata('success', 'Register berhasil, silahkan  Sign In.');
                redirect('Pelanggan/login', 'refresh');
            } else {

                $this->session->set_flashdata('error', 'Register pelanggan gagal!');
                redirect('Pelanggan/register', 'refresh');
            }
        } else {

            redirect('Pelanggan/register', 'refresh');
        }
    }

    //login
    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->PelangganModel->cek_mail()->num_rows() == 1) {

                $db = $this->PelangganModel->cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {
                    if ($db->status == 1) {

                        $data_login = array(
                            'is_login' => TRUE,
                            'email'  => $db->email,
                            'nama'   => $db->nama,
                            'id'   => $db->id,
                        );

                        $this->session->set_userdata($data_login);
                        redirect('Pelanggan/index', 'refresh');
                    } else {
                        $this->session->set_flashdata('error', 'Login gagal: akun diblokir!');
                        redirect('Pelanggan/login', 'refresh');
                    }
                } else {

                    $this->session->set_flashdata('error', 'Login gagal: password salah!');
                    redirect('Pelanggan/login', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('error', 'Login gagal: email salah!');
                redirect('Pelanggan/login', 'refresh');
            }
        } else {

            redirect('Pelanggan/login', 'refresh');
        }
    }


    public function login()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('Pelanggan/', 'refresh');
        }

        $data['title'] = 'Login';

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/login/form_login', $data);
        $this->load->view('pelanggan/layout/footer', $data);
    }


    public function logout()
    {

        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');

        session_destroy();
        $this->session->set_flashdata('success', 'Sign Out Berhasil!');
        redirect('Pelanggan/login', 'refresh');
    }

    //faq
    public function faq()
    {
        $data['title'] = 'F.A.Q.';
        $data['faq'] = $this->PelangganModel->data_faq();

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/faq/index', $data);
        $this->load->view('pelanggan/layout/footer', $data);
        $this->load->view('pelanggan/faq/script', $data);
    }

    //profile
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['pelanggan'] = $this->PelangganModel->data_pelanggan();

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/profile/index', $data);
        $this->load->view('pelanggan/layout/footer', $data);
        $this->load->view('pelanggan/profile/script', $data);
    }

    public function update_profile()
    {
        $id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $data = array(
            'nama' => $nama,
            'email' => $email,
        );

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();

            $upload = $this->PelangganModel->get_by_id_profile();
            if (file_exists('uploads/pelanggan/' . $upload->image) && $upload->image) {
                if ($upload->image != 'avatar.jpg') {
                    unlink('uploads/pelanggan/' . $upload->image);
                }
            }

            $data['image'] = $image;
        }

        $this->PelangganModel->update_profile($data, $id);
        $this->session->set_flashdata('success', 'Edit Profile Berhasil!');
        redirect('Pelanggan/profile', 'refresh');
    }

    private function _do_upload()
    {
        $image_name = time() . '-' . $_FILES["image"]['name'];

        $config['upload_path']         = 'uploads/pelanggan/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('success', $this->upload->display_errors('', ''));
            redirect('Pelanggan/profile', 'refresh');
        }
        return $this->upload->data('file_name');
    }

    public function update_password()
    {
        $id = $this->session->userdata('id');
        $password = $this->input->post('password');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        $data = array(
            'password' => get_hash($password),
        );

        if ($this->form_validation->run()) {
            $this->PelangganModel->update_profile($data, $id);
            $this->session->set_flashdata('success', 'Edit Password Berhasil!');
            redirect('Pelanggan/profile', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Edit Password Gagal!');
            redirect('Pelanggan/profile', 'refresh');
        }
    }

    //transaksi
    public function transaksi()
    {
        $data['title'] = 'Transaksi';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Pelanggan/login/', 'refresh');
        } else {
            $id = $this->session->userdata('id');

            $data['transaksi'] = $this->db->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.status ,tw.kendaraan, tw.tanggal_pesan, tw.id_pelanggan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_tempat_cuci, w.nama nama_usaha, w.foto1 foto1
                FROM transaksi tw 
                JOIN tempat_cuci w 
                ON tw.id_tempat_cuci = w.id 
                WHERE tw.id_pelanggan = $id 
                ORDER BY transaction_time DESC")->result();
            //$data['profile'] = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id])->result_array();

            $this->load->view('pelanggan/layout/header', $data);
            $this->load->view('pelanggan/layout/sidebar', $data);
            $this->load->view('pelanggan/transaksi', $data);
            $this->load->view('pelanggan/layout/footer', $data);
            //$this->load->view('pelanggan/profile/script', $data);
        }
    }

    public function invoice($order_id)
    {
        $data['title'] = 'Invoice';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Pelanggan/login/', 'refresh');
        } else {

            $data['transaksi'] = $this->db->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.kendaraan, tw.tanggal_pesan, tw.id_pelanggan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_tempat_cuci, w.nama nama_usaha, w.foto1 foto1
                FROM transaksi tw 
                JOIN tempat_cuci w 
                ON tw.id_tempat_cuci = w.id 
                WHERE tw.order_id = $order_id 
                ORDER BY transaction_time DESC")->result();

            $this->load->view('pelanggan/invoice', $data);
        }
    }

    //midtrans logic
    public function token()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $id_tempat_cuci = $this->input->post('id_tempat_cuci');
        $nama_tempat_cuci = $this->input->post('nama_tempat_cuci');
        $harga_mobil = $this->input->post('harga_mobil');
        $harga_motor = $this->input->post('harga_motor');
        $kendaraan = $this->input->post('kendaraan');
        $tanggal_pesan = $this->input->post('tanggal_pesan');



        if ($kendaraan == 1) {
            $gross_convert = (int)$harga_mobil;
            $jumlah_convert = 1;
            $total = ($gross_convert * $jumlah_convert);
        } elseif ($kendaraan == 2) {
            $gross_convert = (int)$harga_motor;
            $jumlah_convert = 1;
            $total = ($gross_convert * $jumlah_convert);
        }


        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        );

        $item1_details = array(
            'id' => 'a1',
            'price' => $gross_convert,
            'quantity' => 1,
            'name' => "Pembayaran " . $nama_tempat_cuci
        );


        // Optional
        $item_details = array($item1_details);


        // Optional
        $customer_details = array(
            'first_name'    => $nama,
            //'last_name'     => "Litani",
            'email'         => $email,
            'phone'         => $no_hp,
            'billing_address'  => $alamat,
            'shipping_address' => $alamat
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'), true);

        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $id_tempat_cuci = $this->input->post('id_tempat_cuci');
        $kendaraan = $this->input->post('kendaraan');

        $tanggal_pesan = $this->input->post('tanggal_pesan');
        $fixdate = date("Y-m-d", strtotime($tanggal_pesan));

        $data = [
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_number' => $result['va_numbers'][0]['va_number'],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code'],
            'kendaraan' => $kendaraan,
            'tanggal_pesan' => $fixdate,
            'id_pelanggan' => $id_pelanggan,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'id_tempat_cuci' => $id_tempat_cuci,
        ];

        $simpan = $this->db->insert('transaksi', $data);
        if ($simpan) {
            $this->session->set_flashdata('message', 'Transaksi berhasil!');
            redirect('Pelanggan/transaksi', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal!');
            redirect('Pelanggan/transaksi', 'refresh');
        }
    }
}
