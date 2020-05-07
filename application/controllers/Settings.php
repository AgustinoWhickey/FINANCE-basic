<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Settings
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

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model', 'form');
        $this->load->model('Data_model', 'dmod');
        $this->load->library('pagination');
        if (!$this->aauth->is_loggedin()) {
            redirect('auth/login');
        }
    }

    public function web()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Website',
            'user' => $this->aauth->get_user(),
            'config' => $identitas
        );

        $this->load->view('lib/header', $data);
        $this->load->view('settings/web', $data);
        $this->load->view('lib/footer', $data);
    }
    public function saveweb()
    {
        $post = $this->input->post();
        $data = array(
            'title' => $post['title']
        );
        $aksi = $this->form->saveweb($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/web');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/web');
        }
    }
    public function category()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Category',
            'user' => $this->aauth->get_user(),
        );

        $this->load->view('lib/header', $data);
        $this->load->view('settings/category', $data);
        $this->load->view('lib/footer', $data);
    }
    public function categorydata()
    {
        echo json_decode($this->dmod->category());
    }
    public function addcategory()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'type' => $post['type']
        );
        $aksi = $this->form->addcategory($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        }
    }
    public function datacategory($id)
    {
        $id = $this->uri->segment(3);
        if ($this->input->is_ajax_request()) {
            $data = $this->dmod->datacategory($id);
            echo json_encode($data, TRUE);
        } else {
            show_404();
        }
    }
    public function editcategory()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['edit_nama'],
            'type' => $post['edit_type'],
            'id' => $post['id_edit']
        );
        $aksi = $this->form->editcategory($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        }
    }
    public function hapuscategory()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id_hapus']
        );
        $aksi = $this->form->hapuscategory($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/category');
        }
    }
    public function kas()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Buku Kas',
            'user' => $this->aauth->get_user(),
        );

        $this->load->view('lib/header', $data);
        $this->load->view('settings/kas', $data);
        $this->load->view('lib/footer', $data);
    }
    public function addkas()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'desc' => $post['desc'],
            'saldo' => $post['saldo']
        );
        $aksi = $this->form->addkas($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        }
    }
    public function kasdata()
    {
        echo json_decode($this->dmod->kas());
    }
    public function datakas($id)
    {
        $id = $this->uri->segment(3);
        if ($this->input->is_ajax_request()) {
            $data = $this->dmod->datakas($id);
            echo json_encode($data, TRUE);
        } else {
            show_404();
        }
    }
    public function editkas()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id_edit'],
            'nama' => $post['nama'],
            'desc' => $post['desc'],
            'saldo' => $post['saldo']
        );
        $aksi = $this->form->editkas($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        }
    }
    public function hapuskas()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id_hapus'],
        );
        $aksi = $this->form->hapuskas($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/kas');
        }
    }
    public function account()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Akun',
            'user' => $this->aauth->get_user(),
        );

        $this->load->view('lib/header', $data);
        $this->load->view('settings/account', $data);
        $this->load->view('lib/footer', $data);
    }
    public function saveaccount()
    {
        $post = $this->input->post();
        $data = array(
            'user' => $post['user_id'],
            'old' => $post['old'],
            'new' => $post['new'],
            'cnew' => $post['cnew']
        );
        $aksi = $this->form->saveaccount($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/account');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/account');
        }
    }
    public function users()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Users',
            'user' => $this->aauth->get_user(),
        );
        $this->load->view('lib/header', $data);
        $this->load->view('settings/users', $data);
        $this->load->view('lib/footer', $data);
    }
    public function usersdata()
    {
        echo json_decode($this->dmod->users());
    }
    public function addusers()
    {
        $post = $this->input->post();
        $data = array(
            'email' => $post['email'],
            'pass' => $post['pass'],
            'username' => $post['username']
        );
        $aksi = $this->form->addusers($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/users');
        }
    }
    public function datausers($id)
    {
        $id = $this->uri->segment(3);
        if ($this->input->is_ajax_request()) {
            $data = $this->dmod->datausers($id);
            echo json_encode($data, TRUE);
        } else {
            show_404();
        }
    }
    public function editusers()
    {
        $post = $this->input->post();
        $data = array(
            'email' => $post['email'],
            'pass' => $post['pass'],
            'username' => $post['username'],
            'id' => $post['id_edit']
        );
        $aksi = $this->form->editusers($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            
            </div>
            ' . print_r($aksi['error']) . '
            ');
            redirect('settings/users');
        }
    }
    public function hapususers()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id_hapus']
        );
        $aksi = $this->form->hapususers($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('settings/users');
        }
    }
}


/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */
