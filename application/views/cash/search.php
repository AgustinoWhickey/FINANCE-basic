<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?php echo $page; ?></h3>
            </div>
            <form role="form" method="POST" action="<?php echo base_url('kas/dosearch'); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Transaksi</label>
                        <input type="text" class="form-control" name="desc" placeholder="Masukan Deskripsi Transaksi yang dicari" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Type Category</label>
                        <select class="form-control" name="type">
                            <option>Silahkan Pilih Category</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <small style="color: red">Deskripsi wajib di-isi untuk tanggal opsional</small>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>