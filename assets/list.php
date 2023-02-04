<!-- DATEPICKER -->
    <link href="<?php echo base_url()?>assets/picker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<!-- DATEPICKER -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/picker/build/js/bootstrap-datetimepicker.min.js"></script>
<style>
    th{
        text-align: center;
    }
    td{
        padding: 0px !important;
        text-align: center;
    }
</style>
<link href="<?php echo base_url()?>assets/highchart/code/css/themes/sand-signika.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url()?>assets/highchart/code/modules/exporting.js"></script>
<div class="row">
<div class="card">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#graf" data-toggle="tab"> <i class="material-icons">show_chart</i> GRAFIK</a></li>
        <li role="presentation"><a href="#all" data-toggle="tab"><i class="material-icons">view_list</i> DAFTAR JUMLAH PASIEN</a></li>
    </ul>
    <div class="body">
     <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="graf">
            <form action ="<?php echo base_url('poliklinikrj')?>" method="post">
                <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="form-line">
                            <input type="text" name="tgl_awal" class="form-control"  id="tgl_awal" placeholder="Format : Tahun-bulan-hari Misal : 2018-01-01">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label >Sampai Tanggal</label>
                        <div class="form-line">
                            <input type="text" name="tgl_akhir" class="form-control" id="tgl" placeholder="Format : Tahun-bulan-hari Misal : 2018-01-20">
                        </div>
                    </div>  
                </div>
                        
               <div class="form-group">
                    <input type="submit" name="carigraph" value="Cari data" class="btn btn-primary btn-block">
                </div>
                </div>
                       
            </form>
            <?php if(isset($_POST['carigraph'])):?>
                <?php
                    $tgl_awal   = $_POST['tgl_awal'];
                    $tgl_akhir  = $_POST['tgl_akhir'];
                ?>
                <?php if(count($graph) > 0):?>
                    <h3 align="center">DATA PASIEN RAWAT JALAN PER POLI DARI TANGGAL <?php echo date("d-m-Y",strtotime($tgl_awal)). " SAMPAI DENGAN ".date("d-m-Y",strtotime($tgl_akhir))?> </h3>
                    <div id="graph">
                                <?php
                                    foreach ($graph as $result){
                                        $nama[]   = $result->NMPoli;
                                        $jumlah[]  = $result->jumlah;
                                    }
                                ?>
                    </div>
                <?php else:?>
                <h3 align="center">DATA TIDAK DI TEMUKAN MOHON PERIKSA INPUTAN ANDA</h3>
                <?php endif;?> 
            <?php else:?>
                <h5>Silahkan cari data pasien rawat jalan per poli dengan format tanggal (tahun-bulan-hari) misal : 2018-01-10</h5>
            <?php endif;?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="all">
            <div class="row clearfix">
               
                
                <div class="header bg-<?php echo substr($this->konfigurasi_model->listing()->tema,6,100)?>">
                    <h2>
                        <i class="fa fa-medkit"></i><span> Data Poliklinik Rawat Jalan </span>
                    </h2>
                </div>
                <div class="body">
                <!-- <div style="color:red">
                    <h1 align="center">Under Construction</h1>
                </div> -->
                   <!--  <form id="form-filter">
                        <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Kode Obat</label>
                                <div class="form-line">
                                    <input type="text" id="kodeobat" class="form-control" placeholder="Masukan Kode Obat Yang Ingin Dicari">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label >Nama Obat</label>
                                <div class="form-line">
                                    <input type="text" id="namaobat" class="form-control" placeholder="Masukan Nama Obat Yang Ingin Dicari">
                                </div>
                            </div>  
                        </div> -->
                        
                       <!-- <div class="form-group">
                            <button type="button" id="stakhir" class="btn btn-primary" name="submit1">Filter</button>
                        </div> -->
                       <!--  </div>
                    </form>
                    <div class="table-responsive">
                    <div class="row clearfix">
                        <div class="col-md-12 col-lg-12">
                        <h4>Keterangan : </h4>
                        <span class="text-info">Klik Button Jika Ingin Memfilter Sesuai Keterangan</span>
                        </div>
                        <span class="col-md-4 col-lg-3">
                        <button class="btn btn-info btn-sm btn-block" id="tersedia">Stock Tersedia</button>
                            
                        </span>
                       
                        <span class="col-md-4 col-lg-3">
                        <button class="btn bg-orange btn-sm btn-block" id="mendekati">Mendekati Stock Minimum</button>
                        </span>

                         <span class="col-md-4 col-lg-3">
                        <button class="btn btn-danger btn-sm btn-block" id="habis">Sudah Habis</button>
                        </span>

                        <span class="col-md-4 col-lg-3">
                        <button  class="btn bg-indigo btn-sm btn-block" id=reset><i class="fa fa-refresh"></i> Reset Filter</button>
                        </span>
                    </div>
                    
                    -->   
                    
                     <div style="color:red">
                        <h1 align="center">Under Construction</h1>
                    </div>
                   <!--  <table class="table" class="table table-bordered table-striped" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Reg Date</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody> 
                    </table>-->
                    </div> 
                </div>
                
                    <!-- /.box-body -->
                  <!-- /.box -->
           
            </div>
        </div>
    </div>   
    </div>
    
</div>
</div>

  

<!-- page script -->
<script type="text/javascript">

var table;

$(document).ready(function() {
    // $('#tgl_awal').datepicker({
    //     format: "dd-mm-yyyy",
    //     autoclose:true
    // });

    table = $('.table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "language": {
            "processing": '<i class="fa fa-refresh fa-spin fa-3x fa-fw" style="color:#2980b9"></i><span>Mohon Tunggu...</span>',
            "paginate": {
              "first"   : "Pertama",
              "previous": "<span class='fa fa-arrow-left'></span>",
              "next"    : "<span class='fa fa-arrow-right'></span>",
              "last"    : "Terakhir",
            },
            "zeroRecords": "Tidak ada data yang dapat ditampilkan"
        },
        // "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        // "dom": '<"bottom"fp<"clear">>',
        "pageLength": 5,
        "pagingType": "full_numbers",
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('poliklinikrj/ajax_list')?>"
            // "type": "POST"
            // "data": function ( data ) {
            //     data.kdobat  = $('#kodeobat').val();
            //     data.nmobat  = $('#namaobat').val();
            //     data.sminimum = $('#tersedia').val();
            //     data.stakhir = $('#mendekati').val();
            //     data.stawal = $('#habis').val();
            // }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    // GRAFIK
    $('#graph').highcharts({
        chart: {
            renderTo: 'chart',
            type: 'column',
            // margin: 0,
            // defaultSeriesType: 'line'
            // margin: 150,
            // options3d: {
            //     enabled: false,
            //     alpha: 10,
            //     beta: 25,
            //     depth: 70
            // }
        },
        title: {
            text: 'DATA POLIKLINIK RAWAT JALAN',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: 'PASIEN',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($nama);?>
        },
        exporting: { 
            enabled: true 
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'Jumlah Pasien <b>' + this.x + '</b> adalah <b>' + Highcharts.numberFormat(this.y,0) + '</b>, dari '+ this.series.name;
             }
          },
        series: [{
            showInLegend: false,
            name: 'Laporan Jumlah Pasien',
            data: <?php echo json_encode($jumlah);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }],
    });
    // Highcharts.setOptions(Highcharts.theme);
     
});
   
</script>