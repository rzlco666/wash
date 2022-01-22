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
}
