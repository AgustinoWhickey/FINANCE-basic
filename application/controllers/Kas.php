<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Kas
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

class Kas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model', 'form');
        $this->load->model('Data_model', 'dmod');
        if (!$this->aauth->is_loggedin()) {
            redirect('auth/login');
        }
    }
    public function cashin()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Cash In',
            'user' => $this->aauth->get_user(),
            'category' => $this->db->where('type_category', 'pemasukan')->get('category')->result_array()
        );
        $this->load->view('lib/header', $data);
        $this->load->view('cash/cashin', $data);
        $this->load->view('lib/footer', $data);
    }
    public function indata()
    {
        echo json_decode($this->dmod->cashin());
    }
    public function addin()
    {
        $post = $this->input->post();
        $data = array(
            'category' => $post['category'],
            'saldo' => $post['saldo'],
            'desc' => $post['desc'],
            'tanggal' => $post['tanggal']
        );
        $aksi = $this->form->addin($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        }
    }
    public function datain($id)
    {
        $id = $this->uri->segment(3);
        if ($this->input->is_ajax_request()) {
            $data = $this->dmod->datain($id);
            echo json_encode($data, TRUE);
        } else {
            show_404();
        }
    }
    public function editin()
    {
        $post = $this->input->post();
        $data = array(
            'id_edit' => $post['id_edit'],
            'category' => $post['edit_category'],
            'saldo' => $post['edit_saldo'],
            'desc' => $post['edit_desc'],
            'tanggal' => $post['edit_tanggal']
        );
        $aksi = $this->form->editin($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        }
    }
    public function hapusin()
    {
        $aksi = $this->form->hapusin($this->input->post('id_hapus'));
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashin');
        }
    }
    public function cashout()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pengaturan Cash Out',
            'user' => $this->aauth->get_user(),
            'category' => $this->db->where('type_category', 'pengeluaran')->get('category')->result_array()
        );
        $this->load->view('lib/header', $data);
        $this->load->view('cash/cashout', $data);
        $this->load->view('lib/footer', $data);
    }
    public function outdata()
    {
        echo json_decode($this->dmod->cashout());
    }
    public function addout()
    {
        $post = $this->input->post();
        $data = array(
            'category' => $post['category'],
            'saldo' => $post['saldo'],
            'desc' => $post['desc'],
            'tanggal' => $post['tanggal']
        );
        $aksi = $this->form->addout($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        }
    }
    public function dataout($id)
    {
        $id = $this->uri->segment(3);
        if ($this->input->is_ajax_request()) {
            $data = $this->dmod->dataout($id);
            echo json_encode($data, TRUE);
        } else {
            show_404();
        }
    }
    public function editout()
    {
        $post = $this->input->post();
        $data = array(
            'id_edit' => $post['id_edit'],
            'category' => $post['edit_category'],
            'saldo' => $post['edit_saldo'],
            'desc' => $post['edit_desc'],
            'tanggal' => $post['edit_tanggal']
        );
        $aksi = $this->form->editout($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        }
    }
    public function hapusout()
    {
        $aksi = $this->form->hapusin($this->input->post('id_hapus'));
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('kas/cashout');
        }
    }
    public function search()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Pencarian Transaksi',
            'user' => $this->aauth->get_user(),
        );
        $this->load->view('lib/header', $data);
        $this->load->view('cash/search', $data);
        $this->load->view('lib/footer', $data);
    }
    public function dosearch()
    {
        $post = $this->input->post();
        $data = array(
            'desc' => $post['desc'],
            'tanggal' => $post['tanggal'],
            'type' => $post['type']
        );
        $aksi = $this->form->search($data);
        print_r($data);
    }
}


/* End of file Kas.php */
/* Location: ./application/controllers/Kas.php */
