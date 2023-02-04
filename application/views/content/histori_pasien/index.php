<style type="text/css">

</style>
<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; margin-bottom: 15px; border-radius: 5px;">
    <div class="row">
      <div class="col-md-12">
        <h4>Histori Pemeriksaan Pasien</h4>
      </div>
    </div>
    <div class="row" style="margin-bottom: 5px;">
        <form id="searchForm">
          <div class="col-md-12">
            <p style="color: blue; background: lightblue; margin-right: 10px;"> Cari Berdasarkan </p>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-md-3 col-form-label">Rekam Medis</label>
                <div class="col-md-7">
                    <input type="text" id="medrec" name="medrec" class="form-control col-5" >
                </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-md-3 col-form-label">Nama Pasien</label>
                <div class="col-md-7">
                    <input type="text" id="nama" name="nama" class="form-control" >
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <button class="btn btn-block btn-xs btn-info" type="button" id="cari"><i class="fa fa-search"></i> Cari</button>
          </div>
        </form>
      </div>
      <!-- </div> -->
    </div>
  </div>
    <div class="row" style="margin-top: 14px;">
      <div class="col-md-12 table-responsive">
        <table class="table table-bordered " id="histori-pasien" width="100%">
          <thead>
            <tr>
              <th >No. Transaksi</th>
              <th >No. Lab</th>
              <th >No. Registrasi</th>
              <th >No. RM</th>
              <th >Tgl. Hasil</th>
              <th >Nama (Umur)</th>
              <th>Kategori</th>
              <th>Catatan</th>
              <th>Poli</th>
              <th>Ruang</th>
              <th>Kelas</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-loading" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-loading">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-info">Memuat Data.. <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>
                </div>
            </div>
        </div>
    </div>

<script>
  var tabel_view;
  var loading = $('.modal-loading');
  $(function() {
    tabel_view = $('#histori-pasien').DataTable({
      dom : "fltrip",
      ajax: {
        "url": '<?php echo site_url('Histori_pasien/show_list')?>',
        "type": 'POST',
        
        "data": function ( d ) {
         return $('#searchForm').serialize();
        },
      },
      "processing": true,
      "serverside" : false,
      "language": {
        "loadingRecords": "&nbsp;",
        "processing": "data Loading..."
      },  
      columns: [
        { data: "Notran" },
        { data: "Nolab" },
        { data: "Regno" },
        { data: "MedRec" },
        { data: "Tglhasil" },
        { data: "Firstname" },
        { data: "NmKategori" },
        { data: "Catatan" },
        { data: "NMPoli" },
        { data: "NmBangsal" },
        { data: "NMKelas" },
        { data: "aksi" }
      ]
    });

    $('#cari').on('click', function () {
        tabel_view.ajax.reload();
    });

  });


</script>