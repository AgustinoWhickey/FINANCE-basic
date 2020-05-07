<?php echo $this->session->flashdata('message'); ?>
<button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-lg">
    <i class="fas fa-plus"></i> Tambah Data
</button>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h5 class="card-title"><?php echo $page; ?></h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">ID Utang</th>
                                <th>Tanggal Utang</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Jumlah</th>
                                <th>Deskripsi</th>
                                <th>Nama Client</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('utang/adddebt'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Utang</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Jatuh Tempo Utang</label>
                        <input type="date" class="form-control" name="datetempo">
                    </div>
                    <div class="form-group">
                        <label>Nama Client</label>
                        <input type="text" class="form-control" name="client" placeholder="Masukan nama client">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="desc" placeholder="Deskripsi Utang"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                        <label>Copy Ke Buku Kas</label>
                        <select class="form-control" name="copy">
                            <option>Tidak</option>
                            <?php foreach ($kas as $datakas) { ?>
                                <option value="<?php echo $datakas['id_category']; ?>"><?php echo $datakas['name_category']; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah -->
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('settings/editcategory'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <div class="form-group">
                        <label>Nama Category</label>
                        <input type="text" class="form-control" name="edit_nama" id="nama" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <label>Type Category</label>
                        <select class="form-control" name="edit_type" id="type">
                            <option>Silahkan Pilih Category</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('settings/hapuscategory'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_hapus" name="id_hapus">
                    <div class="form-group">
                        <label>Nama Category</label>
                        <input type="text" class="form-control" name="hapus_nama" id="hapus_nama" placeholder="Nama Category" readonly>
                    </div>
                    <div class="form-group">
                        <label>Type Category</label>
                        <select class="form-control" name="hapus_type" id="hapus_type" disabled>
                            <option>Silahkan Pilih Category</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Hapus -->
<script>
    function showHide(id) {
        var jtempo = document.getElementById("jatuh_tempo");
        if (elm.id == 'setJatuh') {
            phone.classList.remove('hide');
            email.classList.add('hide');
        } else {
            phone.classList.add('hide');
            email.classList.remove('hide');
        }
    }

    function edit(id) {
        $('#modal-edit').modal('show');
        document.getElementById("id_edit").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('settings/datacategory/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#nama").val(data.name_category);
                $("#type").val(data.type_category);
            }
        });
    }

    function hapus(id) {
        $('#modal-hapus').modal('show');
        document.getElementById("id_hapus").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('settings/datacategory/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#hapus_nama").val(data.name_category);
                $("#hapus_type").val(data.type_category);
            }
        });
    }
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('utang/debtdata/'); ?>"
        });

    });
</script>