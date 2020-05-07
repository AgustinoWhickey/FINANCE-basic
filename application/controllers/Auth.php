<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->aauth->is_loggedin()) {
            redirect('auth/login');
        }
    }
    public function login()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Login',
        );
        $this->load->view('auth/login', $data);
    }
    public function actlogin()
    {
        $post = $this->input->post();
        $aksi = $this->aauth->login($post['email'], $post['password'], $post['remember']);
        if ($aksi) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> SUKSES!</h5>
            Selamat Datang
            </div>
            ');
            redirect('');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            Email / Password Salah
            </div>
            ');
            redirect('auth/login');
        }
    }
    public function logout()
    {
        $this->aauth->logout();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> SUKSES!</h5>
            Sukses Logout
            </div>
        ');
        redirect('auth');
    }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
