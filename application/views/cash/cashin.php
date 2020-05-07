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
                                <th width="10%">ID Transaksi</th>
                                <th>Category</th>
                                <th>Jumlah Transaksi</th>
                                <th>Deskripsi Transaksi</th>
                                <th>Tanggal Transaksi</th>
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
            <form method="POST" action="<?php echo base_url('kas/addin'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option>Pilih Category....</option>
                            <?php foreach ($category as $dcat) { ?>
                                <option value="<?php echo $dcat['id_category']; ?>"><?php echo $dcat['name_category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Transaksi</label>
                        <input type="text" class="form-control" name="saldo" placeholder="Saldo">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="desc" placeholder="Deskripsi Transaksi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal">
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
            <form method="POST" action="<?php echo base_url('kas/editin'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="edit_category" id="category">
                            <option>Pilih Category....</option>
                            <?php foreach ($category as $dcat) { ?>
                                <option value="<?php echo $dcat['id_category']; ?>"><?php echo $dcat['name_category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Transaksi</label>
                        <input type="text" class="form-control" id="saldo" name="edit_saldo" placeholder="Saldo">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="edit_desc" id="desc" placeholder="Deskripsi Transaksi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="date" name="edit_tanggal">
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
            <form method="POST" action="<?php echo base_url('kas/hapusin'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_hapus" name="id_hapus">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="edit_category" id="hapus_category" disabled>
                            <option>Pilih Category....</option>
                            <?php foreach ($category as $dcat) { ?>
                                <option value="<?php echo $dcat['id_category']; ?>"><?php echo $dcat['name_category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Transaksi</label>
                        <input type="text" class="form-control" id="hapus_saldo" name="edit_saldo" placeholder="Saldo" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="edit_desc" id="hapus_desc" disabled placeholder="Deskripsi Transaksi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="hapus_date" name="edit_tanggal" disabled>
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
            url: "<?php echo base_url('kas/datain/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#category").val(data.id_category);
                $("#saldo").val(data.amount_transaction);
                $("#desc").val(data.desc_transcation);
                $("#date").val(data.date);
            }
        });
    }

    function hapus(id) {
        $('#modal-hapus').modal('show');
        document.getElementById("id_hapus").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('kas/datain/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#hapus_category").val(data.id_category);
                $("#hapus_saldo").val(data.amount_transaction);
                $("#hapus_desc").val(data.desc_transcation);
                $("#hapus_date").val(data.date);
            }
        });
    }
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "ajax": "<?php echo base_url('kas/indata/'); ?>"
        });

    });
</script>