<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Form_model
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

class Form_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function saveweb($input)
    {
        if (empty($input['title'])) {
            return array('error' => true, 'message' => 'Data input kosong harap isi data yang dibutuhkan');
        } else {
            $update = array(
                'title' => $input['title']
            );
            $aksi = $this->db->where('id', '1')->update('identitas', $update);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil disimpan');
            } else {
                return array('error' => true, 'message' => 'Data gagal disimpan');
            }
        }
    }
    public function addcategory($input)
    {
        if (empty($input['nama']) || empty($input['type'])) {
            return array('error' => true, 'message' => 'Data kosong harap isi data yang dibutuhkan');
        } else {
            $data = array(
                'name_category' => $input['nama'],
                'type_category' => $input['type']
            );
            $aksi = $this->db->insert('category', $data);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil disimpan');
            } else {
                return array('error' => true, 'message' => 'Data gagal disimpan');
            }
        }
    }
    public function editcategory($input)
    {
        if (empty($input['nama']) || empty($input['type'])) {
            return array('error' => true, 'message' => 'Data kosong harap isi data yang dibutuhkan');
        } else {
            $db = $this->db->get_where('category', ['id_category' => $input['id']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data yang dipilih tidak ada, mohon cek kembali data yang dipilih');
            } else {
                $data = array(
                    'name_category' => $input['nama'],
                    'type_category' => $input['type']
                );
                $aksi = $this->db->where('id_category', $input['id'])->update('category', $data);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil diupdate');
                } else {
                    return array('error' => true, 'message' => 'Data gagal diupdate');
                }
            }
        }
    }
    public function hapuscategory($input)
    {
        if (empty($input['id'])) {
            return array('error' => true, 'message' => 'Data tidak ada atau tidak ditemukan');
        } else {
            $db = $this->db->get_where('category', ['id_category' => $input['id']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data tidak ada atau tidak ditemukan');
            } else {
                $aksi = $this->db->where('id_category', $input['id'])->delete('category');
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil dihapus');
                } else {
                    return array('error' => true, 'message' => 'Data gagal dihapus');
                }
            }
        }
    }
    public function addkas($input)
    {
        if (empty($input['nama']) || empty($input['desc']) || empty($input['saldo'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi bagian yang dibutuhkan');
        } else {
            $data = array(
                'nama_buku' => $input['nama'],
                'desc_buku' => $input['desc'],
                'saldo_buku' => $input['saldo'],
                'created_at' => tanggal(),
                'update_at' => tanggal()
            );
            $aksi = $this->db->insert('buku_kas', $data);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil disimpan');
            } else {
                return array('error' => true, 'message' => 'Data gagal disimpan');
            }
        }
    }
    public function editkas($input)
    {
        if (empty($input['nama']) || empty($input['desc']) || empty($input['saldo'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi bagian yang dibutuhkan');
        } else {
            $db = $this->db->get_where('buku_kas', ['id_buku' => $input['id']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data tidak ada');
            } else {
                $data = array(
                    'nama_buku' => $input['nama'],
                    'desc_buku' => $input['desc'],
                    'saldo_buku' => $input['saldo'],
                    'update_at' => tanggal()
                );
                $aksi = $this->db->where('id_buku', $input['id'])->update('buku_kas', $data);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil diedit');
                } else {
                    return array('error' => true, 'message' => 'Data gagal diedit');
                }
            }
        }
    }
    public function hapuskas($input)
    {
        if (empty($input['id'])) {
            return array('error' => true, 'message' => 'Data yang dibutuhkan kosong');
        } else {
            $db = $this->db->get_where('buku_kas', ['id_buku' => $input['id']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data tidak ada');
            } else {
                $aksi = $this->db->where('id_buku', $input['id'])->delete('buku_kas');
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil dihapus');
                } else {
                    return array('error' => true, 'message' => 'Data gagal dihapus');
                }
            }
        }
    }
    public function saveaccount($input)
    {
        if (empty($input['user']) || empty($input['old']) || empty($input['new']) || empty($input['cnew'])) {
            return array('error' => true, 'message' => 'Data input masih kosong, harap isi semua bidang yang dibutuhkan');
        } else {
            if ($input['new'] !== $input['cnew']) {
                return array('error' => true, 'message' => 'Data password baru tidak sesuai harap sesuaikan data yang anda input');
            } else {
                $aksi = $this->aauth->update_user($input['user'], false, $input['new']);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data password sudah diganti');
                } else {
                    return array('error' => true, 'message' => 'Aksi Rubah password gagal');
                }
            }
        }
    }
    public function addin($input)
    {
        if (empty($input['category']) || empty($input['saldo']) || empty($input['desc']) || empty($input['tanggal'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi semua bidang yang dibutuhkan');
        } else {
            $data = array(
                'id_category' => $input['category'],
                'amount_transaction' => $input['saldo'],
                'desc_transcation' => $input['desc'],
                'date' => $input['tanggal'],
                'type' => 'pemasukan'
            );
            $aksi = $this->db->insert('transaction', $data);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil ditambahkan');
            } else {
                return array('error' => true, 'message' => 'Data gagal ditambahkan');
            }
        }
    }
    public function editin($input)
    {
        if (empty($input['category']) || empty($input['saldo']) || empty($input['desc']) || empty($input['tanggal'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi semua bidang yang dibutuhkan');
        } else {
            $db = $this->db->get_where('transaction', ['id_transcation' => $input['id_edit']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data tidak ada atau tidak ditemukan');
            } else {
                $data = array(
                    'amount_transaction' => $input['saldo'],
                    'desc_transcation' => $input['desc'],
                    'date' => $input['tanggal']
                );
                $aksi = $this->db->where('id_transcation', $input['id_edit'])->update('transaction', $data);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil diedit');
                } else {
                    return array('error' => true, 'message' => 'Data gagal diedit');
                }
            }
        }
    }
    public function hapusin($id)
    {
        if (empty($id)) {
            return array('error' => true, 'message' => 'Data kosong');
        } else {
            $aksi = $this->db->where('id_transcation', $id)->delete('transaction');
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil dihapus');
            } else {
                return array('error' => true, 'message' => 'Data gagal dihapus');
            }
        }
    }
    public function addout($input)
    {
        if (empty($input['category']) || empty($input['saldo']) || empty($input['desc']) || empty($input['tanggal'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi semua bidang yang dibutuhkan');
        } else {
            $data = array(
                'id_category' => $input['category'],
                'amount_transaction' => $input['saldo'],
                'desc_transcation' => $input['desc'],
                'date' => $input['tanggal'],
                'type' => 'pengeluaran'
            );
            $aksi = $this->db->insert('transaction', $data);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil ditambahkan');
            } else {
                return array('error' => true, 'message' => 'Data gagal ditambahkan');
            }
        }
    }
    public function editout($input)
    {
        if (empty($input['category']) || empty($input['saldo']) || empty($input['desc']) || empty($input['tanggal'])) {
            return array('error' => true, 'message' => 'Data masih kosong, harap isi semua bidang yang dibutuhkan');
        } else {
            $db = $this->db->get_where('transaction', ['id_transcation' => $input['id_edit']])->row_array();
            if (empty($db)) {
                return array('error' => true, 'message' => 'Data tidak ada atau tidak ditemukan');
            } else {
                $data = array(
                    'amount_transaction' => $input['saldo'],
                    'desc_transcation' => $input['desc'],
                    'date' => $input['tanggal']
                );
                $aksi = $this->db->where('id_transcation', $input['id_edit'])->update('transaction', $data);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil diedit');
                } else {
                    return array('error' => true, 'message' => 'Data gagal diedit');
                }
            }
        }
    }
    public function search($input)
    {
        $this->db->like('desc_transcation', $input['desc']);
        $this->db->group_start();
        $this->db->where('type', $input['type']);
        $this->db->where('date', $input['tanggal']);
        $this->db->group_end();
        $aksi = $this->db->get('transaction')->result_array();
        return $aksi;
    }
    public function addusers($input)
    {
        if (empty($input['email']) || empty($input['pass']) || empty($input['username'])) {
            return array('error' => true, 'message' => 'Data kosong harap isi datang yang dibutuhkan');
        } else {
            $aksi = $this->aauth->create_user($input['email'], $input['pass'], $input['username']);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil ditambahkan');
            } else {
                return array('error' => true, 'message' => 'Data gagal ditambahkan', 'error' => $aksi);
            }
        }
    }
    public function editusers($input)
    {
        if (empty($input['email']) ||  empty($input['username'])) {
            return array('error' => true, 'message' => 'Data kosong harap isi datang yang dibutuhkan');
        } else {
            if (empty($input['pass'])) {
                $pass = false;
            } else {
                $pass = $input['pass'];
            }
            $aksi = $this->aauth->update_user($input['id'], $input['email'], $pass, $input['username']);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil dirubah');
            } else {
                return array('error' => true, 'message', 'Data gagal dirubah');
            }
        }
    }
    public function hapususers($id)
    {
        $aksi = $this->aauth->delete_user($id['id']);
        if ($aksi) {
            return array('error' => false, 'message' => 'Data berhasil dihapus');
        } else {
            return array('error' => true, 'message', 'Data gagal dihapus');
        }
    }
    public function adddebt($input)
    {
        if (empty($input['date']) || empty($input['tempo']) || empty($input['client']) || empty($input['description']) || empty($input['amount'])) {
            return array('error' => true, 'message' => 'Data masih kosong harap isi bidang yang dibutuhkan');
        } else {
            if ($input['copy'] == "Tidak") {
                $data = array(
                    'date_created' => $input['date'],
                    'date_tempo' => $input['tempo'],
                    'amount' => $input['amount'],
                    'description' => $input['description'],
                    'client' => $input['client'],
                    'status' => 'Belum Terbayar',
                    'type' => 'utang'
                );
                $aksi = $this->db->insert('utang', $data);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil ditambahkan');
                } else {
                    return array('error' => true, 'message' => 'Data gagal ditambahkan');
                }
            } else {
                $data1 = array(
                    'id_category' => $input['copy'],
                    'amount_transaction' => $input['amount'],
                    'desc_transcation' => 'Utang Baru Kepada Client ' . $input['client'] . ' Sejumlah Rp.' . $input['amount'] . '',
                    'date' => $input['date'],
                    'type' => 'pemasukan',
                );
                $aksi1 = $this->db->insert('transaction', $data1);
                $data = array(
                    'date_created' => $input['date'],
                    'date_tempo' => $input['tempo'],
                    'amount' => $input['amount'],
                    'description' => $input['description'],
                    'client' => $input['client'],
                    'status' => 'Belum Terbayar',
                    'type' => 'utang'
                );
                $aksi = $this->db->insert('utang', $data);
                if ($aksi && $aksi1) {
                    return array('error' => false, 'message' => 'Data berhasil ditambahkan');
                } else {
                    return array('error' => true, 'message' => 'Data gagal ditambahkan');
                }
            }
        }
    }
    // ------------------------------------------------------------------------

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */
