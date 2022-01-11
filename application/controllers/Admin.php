<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');

        $this->load->library('form_validation');
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
                        'nama'   => $db->nama,
                        'id'   => $db->id
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
        $data['admin'] = $this->AdminModel->data_admin();

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
        $this->session->unset_userdata('id');

        session_destroy();
        $this->session->set_flashdata('success', 'Sign Out Berhasil!');
        redirect('Admin/', 'refresh');
    }


    //faq
    function faq()
    {
        if ($this->session->userdata('is_admin') == FALSE) {
            redirect('Admin/', 'refresh');
        }

        $data['title'] = 'F.A.Q.';
        $data['admin'] = $this->AdminModel->data_admin();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/faq/index', $data);
        $this->load->view('admin/layout/footer', $data);
        $this->load->view('admin/faq/script', $data);
    }

    function faq_data()
    {
        $data = $this->AdminModel->faq_list();
        echo json_encode($data);
    }

    function save_faq()
    {
        $data = $this->AdminModel->save_faq();
        echo json_encode($data);
    }

    function update_faq()
    {
        $data = $this->AdminModel->update_faq();
        echo json_encode($data);
    }

    function delete_faq()
    {
        $data = $this->AdminModel->delete_faq();
        echo json_encode($data);
    }


    //profile
    function profile()
    {
        if ($this->session->userdata('is_admin') == FALSE) {
            redirect('Admin/', 'refresh');
        }

        $data['title'] = 'Profile';
        $data['admin'] = $this->AdminModel->data_admin();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('admin/layout/footer', $data);
        $this->load->view('admin/profile/script', $data);
    }

    function get_data()
    {
        $data = $this->AdminModel->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function get_single($id)
    {
        $data = $this->AdminModel->getById($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function hapus($id)
    {
        $data = $this->AdminModel->getById($id);
        $img_src = FCPATH . 'uploads/admin/' . $data->foto;

        if (unlink($img_src)) {
            $this->AdminModel->hapus($id);
        }
    }

    function _validate()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'Foto', 'required');
        }
    }

    function _config()
    {
        $config['upload_path']      = "./uploads/admin";
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

        if ($this->form_validation->run() == FALSE || $this->upload->do_upload("file") == FALSE) {
            $errors = array(
                'file'            => form_error('file'),
                'nama'         => form_error('nama'),
                'email'         => form_error('email'),
                'fail_upload'     => $this->upload->display_errors('', '')
            );
            $data = array(
                'errors' => $errors,
                'status' => false
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data     = array('upload_data' => $this->upload->data());
            $image    = $data['upload_data']['file_name'];
            $result    = $this->AdminModel->simpan_upload($nama, $email, $image);
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
        }
    }

    function edit()
    {
        $id = $this->input->post('id');
        $img_data = $this->AdminModel->getById($id);
        $img_src = FCPATH . 'uploads/admin/' . $img_data->foto;

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        if ($_FILES['file']['name'] == '') {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');

            if ($this->form_validation->run()) {
                $this->AdminModel->update($id, $nama, $email, null);
                $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
            } else {
                $errors['nama'] = form_error('nama');
                $errors['email'] = form_error('email');
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
                    $this->AdminModel->update($id, $nama, $email, $image);
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => true)));
                }
            }
        }
    }
}
