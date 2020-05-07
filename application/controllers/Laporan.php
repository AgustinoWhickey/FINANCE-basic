<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Laporan
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

class Laporan extends CI_Controller
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

  public function daily()
  {
    $identitas = $this->web->identitas();
    $data = array(
      'title' => $identitas['title'],
      'page' => 'Grafik Harian',
      'user' => $this->aauth->get_user(),
      'pengeluaran' => $this->dmod->chart_get_out(date('Y-m')),
      'pemasukan' => $this->dmod->chart_get_in(date('Y-m'))
    );
    $this->load->view('lib/header', $data);
    $this->load->view('view_chart', $data);
    $this->load->view('lib/footer', $data);
  }
}


/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
