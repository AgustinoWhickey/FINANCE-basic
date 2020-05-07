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
                                <th width="10%">ID Buku Kas</th>
                                <th>Nama Buku Kas</th>
                                <th>Deskripsi</th>
                                <th>Saldo</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Update</th>
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
            <form method="POST" action="<?php echo base_url('settings/addkas'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="desc" placeholder="Deskripsi Buku kas"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" name="saldo" placeholder="Saldo">
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
            <form method="POST" action="<?php echo base_url('settings/editkas'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="desc" id="desc" placeholder="Deskripsi Buku kas"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" name="saldo" id="saldo" placeholder="Saldo">
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
            <form method="POST" action="<?php echo base_url('settings/hapuskas'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_hapus" name="id_hapus">
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" id="hapus_buku" name="nama" placeholder="Nama Category" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="desc" disabled id="hapus_desc" placeholder="Deskripsi Buku kas"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" name="saldo" id="hapus_saldo" placeholder="Saldo" readonly>
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
    function edit(id) {
        $('#modal-edit').modal('show');
        document.getElementById("id_edit").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('settings/datakas/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#nama_buku").val(data.nama_buku);
                $("#desc").val(data.desc_buku);
                $("#saldo").val(data.saldo_buku);
            }
        });
    }

    function hapus(id) {
        $('#modal-hapus').modal('show');
        document.getElementById("id_hapus").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('settings/datakas/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#hapus_buku").val(data.nama_buku);
                $("#hapus_desc").val(data.desc_buku);
                $("#hapus_saldo").val(data.saldo_buku);
            }
        });
    }
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('settings/kasdata/'); ?>"
        });

    });
</script>