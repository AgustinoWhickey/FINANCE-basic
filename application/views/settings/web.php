<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?php echo $page; ?></h3>
            </div>
            <form role="form" method="POST" action="<?php echo base_url('settings/saveweb'); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Website</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $config['title']; ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>