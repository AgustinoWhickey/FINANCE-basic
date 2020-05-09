<div class="row">
    <div class="col-md-12">
        <!-- LINE CHART -->
		<div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Chart Pemasukan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="chartpemasukan" style="height: 250px;"></div>
            </div>
            <!-- /.card-body -->
        </div>
		
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Chart Pengeluaran</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="chartpengeluaran" style="height: 250px;"></div>
            </div>
            <!-- /.card-body -->
        </div>
		
        <!-- /.card -->
    </div>
    <script src="<?php echo base_url('source/plugins/chart.js/Chart.min.js'); ?>"></script>
    <script>
        new Morris.Line({
		  element: 'chartpengeluaran',
		  data: [<?php echo $pengeluaran; ?>  ],
		  xkey: 'date',
		  ykeys: ['amount'],
		  labels: ['Amount'],
		  parseTime: false
		});
		
		new Morris.Line({
		  element: 'chartpemasukan',
		  data: [<?php echo $pemasukan; ?>  ],
		  xkey: 'date',
		  ykeys: ['amount'],
		  labels: ['Amount'],
		  parseTime: false
		});
    </script>