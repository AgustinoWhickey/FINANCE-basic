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
                                <th style="width: 10px">#</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Username</th>
                                <th>Banned</th>
                                <th>Last Login</th>
                                <th>Last Activity</th>
                                <th>Date Created</th>
                                <th>IP Address</th>
                                <th style="width: 40px">Aksi</th>
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
            <form method="POST" action="<?php echo base_url('settings/addusers'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Masukan Password">
                        <span style="color: red">Password Minimal 5 karakter</span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" autocomplete="off">
                        <span style="color: red">Username Minimal 5 karakter</span>
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
            <form method="POST" action="<?php echo base_url('settings/editusers'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Masukan Password">
                        <span style="color: red">Password Minimal 5 karakter</span>
                        <small style="color: red">Isi bidang ini jika ingin mengganti password user ini</small>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" autocomplete="off">
                        <span style="color: red">Username Minimal 5 karakter</span>
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
            <form method="POST" action="<?php echo base_url('settings/hapususers'); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_hapus" name="id_hapus">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="hapus_email" id="email" placeholder="Masukan Email" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Masukan Password" readonly>
                        <small style="color: red">Isi bidang ini jika ingin mengganti password user ini</small>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="hapus_username" placeholder="Masukan Username" autocomplete="off" readonly>
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
            url: "<?php echo base_url('settings/datausers/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#email").val(data.email);
                $("#username").val(data.username);
            }
        });
    }

    function hapus(id) {
        $('#modal-hapus').modal('show');
        document.getElementById("id_hapus").value = id;
        $.ajax({
            type: "get",
            url: "<?php echo base_url('settings/datausers/') ?>" + id,
            dataType: "json",
            success: function(data) {
                $("#hapus_email").val(data.email);
                $("#hapus_username").val(data.username);
            }
        });
    }
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('settings/usersdata/'); ?>"
        });

    });
</script>