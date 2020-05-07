<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <?php echo $page; ?>
                </h3>
            </div>
            <form action="<?php echo base_url('settings/saveaccount'); ?>" method="POST">
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>" id="user_id" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Lama</label>
                        <input class="form-control" type="password" name="old" placeholder="Masukan Password Lama" id="old">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Baru</label>
                        <input class="form-control" type="password" name="new" placeholder="Masukan Password Baru" id="new">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                        <input class="form-control" type="password" name="cnew" placeholder="Masukan Konfirmasi Password Baru" id="new_confirm">
                    </div>
                </div>
                <div class="card-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>