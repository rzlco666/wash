<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {

        if ($this->session->userdata('is_admin') == TRUE) {
            redirect('Admin/securepage', 'refresh');
        }

        $this->load->view('admin/login/form_login');
    }

//register
    public function register()
    {

        if ($this->session->userdata('is_admin') == TRUE) {
            redirect('Admin/securepage', 'refresh');
        }

        $this->load->view('admin/register/form_register');
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->AdminModel->register()) {

                $this->session->set_flashdata('success', 'Register berhasil, silahkan  Sign In.');
                redirect('Admin/', 'refresh');
            } else {

                $this->session->set_flashdata('error', 'Register admin gagal!');
                redirect('Admin/', 'refresh');
            }
        } else {

            $this->load->view('admin/register/form_register');
        }
    }

//login
    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->AdminModel->cek_mail()->num_rows() == 1) {

                $db = $this->AdminModel->cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {

                    $data_login = array(
                        'is_admin' => TRUE,
                        'email'  => $db->email,
                        'nama'   => $db->nama
                    );

                    $this->session->set_userdata($data_login);
                    redirect('Admin/securepage', 'refresh');
                } else {

                    $this->session->set_flashdata('error', 'Login gagal: password salah!');
                    redirect('Admin/', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('error', 'Login gagal: email salah!');
                redirect('Admin/', 'refresh');
            }
        } else {

            $this->load->view('admin/login/form_login');
        }
    }


    public function securepage()
    {

        if ($this->session->userdata('is_admin') == FALSE) {
            redirect('Admin/', 'refresh');
        }

        $data['title'] = 'Dashboard';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }


    public function logout()
    {

        $this->session->unset_userdata('is_admin');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');

        session_destroy();
        $this->session->set_flashdata('success', 'Sign Out Berhasil!');
        redirect('Admin/', 'refresh');
    }
}
