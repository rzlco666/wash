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

                if (unlink($img_src)) {
                    $this->PemilikModel->update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, $image);
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
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
}
