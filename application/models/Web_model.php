<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Web_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Web_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function identitas()
  {
    return $this->db->get_where('identitas', ['id' => 1])->row_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Web_model.php */
/* Location: ./application/models/Web_model.php */
