<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Utang
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

class Utang extends CI_Controller
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

    public function debt()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Buku Utang Debit',
            'user' => $this->aauth->get_user(),
            'kas' => $this->db->get_where('category', ['type_category' => 'pemasukan'])->result_array()
        );
        $this->load->view('lib/header', $data);
        $this->load->view('utang/debit', $data);
        $this->load->view('lib/footer', $data);
    }
    public function debtdata()
    {
        echo json_decode($this->dmod->debt());
    }
    public function adddebt()
    {
        $post = $this->input->post();
        $data = array(
            'date' => $post['date'],
            'tempo' => $post['datetempo'],
            'client' => $post['client'],
            'description' => $post['desc'],
            'amount' => $post['nom'],
            'copy' => $post['copy']
        );
        $aksi = $this->form->adddebt($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> GAGAL!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('utang/debt');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> SUKSES!</h5>
            ' . $aksi['message'] . '
            </div>
            ');
            redirect('utang/debt');
        }
    }
}


/* End of file Utang.php */
/* Location: ./application/controllers/Utang.php */
