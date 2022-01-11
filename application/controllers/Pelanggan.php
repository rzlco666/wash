<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
    }

    public function index()
    {

        $data['title'] = 'Dashboard';

        $this->load->view('pelanggan/layout/header', $data);
        $this->load->view('pelanggan/layout/sidebar', $data);
        $this->load->view('pelanggan/index', $data);
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
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

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
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->PelangganModel->cek_mail()->num_rows() == 1) {

                $db = $this->PelangganModel->cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {

                    $data_login = array(
                        'is_login' => TRUE,
                        'email'  => $db->email,
                        'nama'   => $db->nama
                    );

                    $this->session->set_userdata($data_login);
                    redirect('Pelanggan/index', 'refresh');
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

        session_destroy();
        $this->session->set_flashdata('success', 'Sign Out Berhasil!');
        redirect('Pelanggan/login', 'refresh');
    }
}
