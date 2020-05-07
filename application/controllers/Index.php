<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Index
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

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->aauth->is_loggedin()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $identitas = $this->web->identitas();
        $data = array(
            'title' => $identitas['title'],
            'page' => 'Dashboard',
            'user' => $this->aauth->get_user()
        );

        $this->load->view('lib/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('lib/footer', $data);
    }
}


/* End of file Index.php */
/* Location: ./application/controllers/Index.php */
