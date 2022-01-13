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

        $this->load->view('pemilik/layout/header', $data);
        $this->load->view('pemilik/layout/sidebar', $data);
        $this->load->view('pemilik/index', $data);
        $this->load->view('pemilik/layout/footer', $data);
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
}
