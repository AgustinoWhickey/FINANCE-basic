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
  
  public function monthly()
  {
    $identitas = $this->web->identitas();
	$pengeluaran = '';
	$pemasukan = '';
	$monthly = '';
	$data_pengeluaran = $this->dmod->monthly_chart_get_out();
	foreach($data_pengeluaran as $row){
		$month = date("m-Y",strtotime($row["date"]));
		$pengeluaran .= "{ amount:'".$row["amount"]."',
					date:'".$month."',
					bulan:'".$row["Month"]."'}, ";
	}
	$pengeluaran = substr($pengeluaran, 0, -2);
	
	$data_pemasukan = $this->dmod->monthly_chart_get_in();
	foreach($data_pemasukan as $row){
		$month = date("m-Y",strtotime($row["date"]));
		$pemasukan.= "{ amount:'".$row["amount"]."',
					date:'".$month."',
					bulan:'".$row["Month"]."'}, ";
	}
	$pemasukan = substr($pemasukan, 0, -2);
	
	$data_monthly = $this->dmod->monthly_chart();
	foreach($data_monthly as $row){
		$month = date("m-Y",strtotime($row["date"]));
		$monthly.= "{ month:'".$month."',
					pengeluaran:'".$row["tot_pengeluaran"]."',
					pemasukan:'".$row["tot_pemasukan"]."'}, ";
	}
	$monthly = substr($monthly, 0, -2);
	
    $data = array(
      'title' => $identitas['title'],
      'page' => 'Grafik Bulanan',
      'user' => $this->aauth->get_user(),
      'pengeluaran' => $pengeluaran,
      'pemasukan' => $pemasukan,
      'monthly' => $monthly
    );
    $this->load->view('lib/header', $data);
    $this->load->view('monthly_chart', $data);
    $this->load->view('lib/footer', $data);
  }
}


/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
