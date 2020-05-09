<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Data_model
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

class Data_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function category()
    {
        $table = 'category';
        $primaryKey = 'id_category';
        $columns = array(
            array('db' => 'id_category', 'dt' => 0),
            array('db' => 'name_category', 'dt' => 1),
            array('db' => 'type_category', 'dt' => 2, 'formatter' => function ($i) {
                if ($i == "pengeluaran") {
                    $label = "danger";
                } else if ($i == "pemasukan") {
                    $label = "info";
                }
                return "<span class=\"badge badge-$label\">$i</span>";
            }),
            array('db' => 'id_category',  'dt' => 3, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = '';
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function datacategory($id)
    {
        return $this->db->get_where('category', ['id_category' => $id])->row_array();
    }
    public function kas()
    {
        $table = 'buku_kas';
        $primaryKey = 'id_buku';
        $columns = array(
            array('db' => 'id_buku', 'dt' => 0),
            array('db' => 'nama_buku', 'dt' => 1),
            array('db' => 'desc_buku', 'dt' => 2),
            array('db' => 'saldo_buku', 'dt' => 3, 'formatter' => function ($i) {
                return "Rp. " . rupiah($i);
            }),
            array('db' => 'created_at', 'dt' => 4),
            array('db' => 'update_at', 'dt' => 5),
            array('db' => 'id_buku',  'dt' => 6, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = '';
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function datakas($id)
    {
        return $this->db->get_where('buku_kas', ['id_buku' => $id])->row_array();
    }
    public function cashin()
    {
        $table = 'transaction';
        $primaryKey = 'id_transcation';
        $columns = array(
            array('db' => 'id_transcation', 'dt' => 0),
            array('db' => 'id_category', 'dt' => 1, 'formatter' => function ($i) {
                $db = $this->db->get_where('category', ['id_category' => $i, 'type_category' => 'pemasukan'])->row_array();
                return $db['name_category'];
            }),
            array('db' => 'amount_transaction', 'dt' => 2, 'formatter' => function ($i) {
                return "Rp. " . rupiah($i);
            }),
            array('db' => 'desc_transcation', 'dt' => 3),
            array('db' => 'date', 'dt' => 4),
            array('db' => 'id_transcation',  'dt' => 5, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = "type='pemasukan'";
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function datain($i)
    {
        return $this->db->get_where('transaction', ['id_transcation' => $i])->row_array();
    }
    public function cashout()
    {
        $table = 'transaction';
        $primaryKey = 'id_transcation';
        $columns = array(
            array('db' => 'id_transcation', 'dt' => 0),
            array('db' => 'id_category', 'dt' => 1, 'formatter' => function ($i) {
                $db = $this->db->get_where('category', ['id_category' => $i, 'type_category' => 'pengeluaran'])->row_array();
                return $db['name_category'];
            }),
            array('db' => 'amount_transaction', 'dt' => 2, 'formatter' => function ($i) {
                return "Rp. " . rupiah($i);
            }),
            array('db' => 'desc_transcation', 'dt' => 3),
            array('db' => 'date', 'dt' => 4),
            array('db' => 'id_transcation',  'dt' => 5, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = "type='pengeluaran'";
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function dataout($i)
    {
        return $this->db->get_where('transaction', ['id_transcation' => $i])->row_array();
    }
    public function users()
    {
        $table = 'aauth_users';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'email', 'dt' => 1),
            array('db' => 'pass', 'dt' => 2),
            array('db' => 'username', 'dt' => 3),
            array('db' => 'banned', 'dt' => 4, 'formatter' => function ($i) {
                if ($i == 0) {
                    return "tidak";
                } else {
                    return "ya";
                }
            }),
            array('db' => 'last_activity', 'dt' => 5),
            array('db' => 'last_login', 'dt' => 6),
            array('db' => 'date_created', 'dt' => 7),
            array('db' => 'ip_address', 'dt' => 8),
            array('db' => 'id',  'dt' => 9, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = null;
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function debt()
    {
        $table = 'utang';
        $primaryKey = 'id_utang';
        $columns = array(
            array('db' => 'id_utang', 'dt' => 0),
            array('db' => 'date_created', 'dt' => 1),
            array('db' => 'date_tempo', 'dt' => 2),
            array('db' => 'amount', 'dt' => 3, 'formatter' => function ($i) {
                return rupiah($i);
            }),
            array('db' => 'description', 'dt' => 4),
            array('db' => 'client', 'dt' => 5),
            array('db' => 'status', 'dt' => 6, 'formatter' => function ($i) {
                if ($i == "Terbayar") {
                    $label = "success";
                } else {
                    $label = "danger";
                }
                return "<label class=\"badge badge-$label\">$i</label>";
            }),
            array('db' => 'id_utang',  'dt' => 7, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = null;
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function chart_get_out($date)
    {
        return $result = $this->db->select('date,SUM(amount_transaction) as total,type as tipe')->where('type', 'pengeluaran')->like('date', $date)->get('transaction')->result_array();
    }
    public function chart_get_in($date)
    {
        return $result = $this->db->select('date,SUM(amount_transaction) as total,type as tipe')->where('type', 'pemasukan')->like('date', $date)->get('transaction')->result_array();
    }
	public function monthly_chart_get_out()
    {
		return $result = $this->db->select('DISTINCT CONCAT(MONTH(date)) as Month, date, SUM(amount_transaction) as amount')->where('type', 'pengeluaran')->group_by('Month')->get('transaction')->result_array();
    }
    public function monthly_chart_get_in()
    {
        return $result = $this->db->select('DISTINCT CONCAT(MONTH(date)) as Month, date, SUM(amount_transaction) as amount')->where('type', 'pemasukan')->group_by('Month')->get('transaction')->result_array();
    }
	
	public function monthly_chart()
    {
        return $result = $this->db->select('DISTINCT CONCAT(MONTH(date)) as Month, date, COALESCE((SELECT SUM(amount_transaction) FROM transaction WHERE type = "pengeluaran" AND CONCAT(MONTH(date)) = Month GROUP BY Month),0) as tot_pengeluaran, COALESCE((SELECT SUM(amount_transaction) FROM transaction WHERE type = "pemasukan" AND CONCAT(MONTH(date)) = Month GROUP BY Month),0) AS tot_pemasukan')->group_by('Month')->get('transaction')->result_array();
    }
    public function datausers($i)
    {
        return $this->db->get_where('aauth_users', ['id' => $i])->row_array();
    }

    // ------------------------------------------------------------------------

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */
