<div class="row">
    <div class="col-md-12">
	
        <!-- LINE CHART -->
		<div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Chart Monthly</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id="chartmonthly" style="height: 250px;"></div>
            </div>
            <!-- /.card-body -->
        </div>
		
        <!-- /.card -->
    </div>
    <script src="<?php echo base_url('source/plugins/chart.js/Chart.min.js'); ?>"></script>
    <script>
        new Morris.Line({
		  element: 'chartmonthly',
		  data: [<?php echo $monthly; ?>  ],
		  xkey: 'month',
		  ykeys: ['pengeluaran','pemasukan'],
		  labels: ['Total Pengeluaran','Total Pemasukan'],
		  parseTime: false
		});
    </script>