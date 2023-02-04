<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <p><i><u>Data Transaksi</u></i></p>
      <div class="col-sm-12">
        <form id="formCariTransaksi">
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">No Transaksi</label>
            <div class="input-group col-sm-9">
              <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
              <input type="text" name="NoTransaksi" id="NoTransaksi" class="input-sm" value="<?= @$notran ?>" />
              <button type="submit" class="btn btn-info btn-sm" id="btnCari" style="margin-left: 10px;">
                <i class="ace-icon fa fa-search"></i>Cari
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">No Laboratorium</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="NoLaboratorium" id="NoLaboratorium" class="input-sm" />
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Tgl. Hasil</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <input type="date" name="TglHasil" class="form-control input-sm" id="TglHasil" value="<?=date('Y-m-d')?>" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <p><i><u>Data Pasien</u></i></p>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-right">No Registrasi</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Regno" id="Regno" class="input-sm" readonly />
            <input type="hidden" name="KdDokter" id="KdDokter" class="input-sm" readonly />
            <span class="input-group-addon" id="" style="border:none;background-color:white;">Tgl Permintaan</span>
            <input type="date" name="Regdate" class="form-control input-sm col-sm-3" id="Regdate" readonly />
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-right">No Rekam Medis</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Medrec" id="Medrec" class="form-control input-sm" readonly />

            <span class="input-group-addon" id="" style="border:none;background-color:white;">Nama Pasien</span>
            <input type="text" name="Firstname" id="Firstname" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-3">
          <div class="form-group">
            <div class="input-group col-sm-12">
              <div class="radio">
                <label>
                  <input disabled="disabled" name="KdSex" type="radio" class="ace" value="L"/>
                  <span class="lbl">&nbsp; Laki - Laki</span>
                </label>
                <label>
                  <input disabled="disabled" name="KdSex" type="radio" class="ace" value="P"/>
                  <span class="lbl">&nbsp; Perempuan</span>
                </label>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="input-group col-sm-12">
              <input type="text" name="UmurThn" id="UmurThn" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
              <!-- Input Umur Bulan -->
              <span class="input-group-addon no-border-right no-border-left" id="">/</span>
              <input type="text" name="UmurBln" id="UmurBln" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
              <!-- Input Umur Hari -->
              <span class="input-group-addon no-border-right no-border-left" id="">/</span>
              <input type="text" name="UmurHari" id="UmurHari" class="form-control input-sm col-xs-6 col-sm-3" readonly/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <button class="btn btn-info btn-sm" type="button" id="search_tindakan"><i class="fa fa-plus"></i> Tindakan Baru</button>
  <form id="formTindakan">
    <div class="form-group">
      <label class="col-sm-1 control-label no-padding-right">Kode Tindakan</label>
      <div class="input-group col-sm-3">
        <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
        <input type="text" name="KodeTindakan" id="KodeTindakan" class="input-sm" />
        <button type="submit" class="btn btn-success btn-sm" id="btnTindakan" style="margin-left: 10px;">
          <i class="ace-icon fa fa-plus"></i>  Cari
        </button>
      </div>
    </div>
  </form> -->
  <form id="formInputHasil" method="POST" action="POST">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    <input type="hidden" name="NoTran" id="NoTran" class="input-sm"/>
    <input type="hidden" name="UmurThn_input" id="UmurThn_input" />
    <input type="hidden" name="UmurBln_input" id="UmurBln_input" />
    <input type="hidden" name="UmurHari_input" id="UmurHari_input" />
    <div class="col-sm-12 col-md-12" style="margin-top: 25px;">
      <div class="col-sm-12">
        <center><h4>Hasil Pemeriksaan</h4></center>
        <div id="tableTindakan"></div>
      </div>
    </div>
    <div class="col-sm-12 col-md-12" style="margin-top: 25px;">
      <div class="col-sm-12">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right">Catatan</label>
            <textarea class="form-control input-sm" id="Kesan" name="Kesan"></textarea>
            <br/>
            <label class="col-sm-2 control-label no-padding-right">Kesan</label>
            <textarea class="form-control input-sm" id="Kesan-1" name="Kesan_1"></textarea>
            <br/>
            <label class="col-sm-2 control-label no-padding-right">Saran</label>
            <textarea class="form-control input-sm" id="Saran" name="Saran"></textarea>

            <br>
            <p id="HasilKesan"></p><br>
            <input type="radio" id="show" name="infocvd19" value="show">
            <label for="show">Tampilkan</label>
            <input type="radio" id="hide" name="infocvd19" value="hide" checked>
            <label for="hide">Sembunyikan</label><br>
            <p><i>Keterangan Hasil Rapid Test Covid-19: <br><br>
            1. Hasil Non-Reaktif belum dapat menyingkirkan kemungkinan adanya infeksi, sehingga masih beresiko menularkan ke orang lain.
            Hasil Non-Reaktif dapat terjadi karena beberapa kondisi : Window period ( terinfeksi namun antibody belum terbentuk ), 
            terdapat gangguan pembentukan antibody (immunocompromised) atau kadar antibody dibawah deteksi alat. <br>
            2. Lakukan pemeriksaan ulang anti SARS-CoV-2 10 Hari kemudian apabila baru pertama kali melakukan pemeriksaan. <br>
            3. Hasil pemeriksaan antibody tidak digunakan sebagai dasar untuk mendiagnosa infeksi SARS-CoV-2, Status Pasien, atau keputusan klinis. <br>
            4. Lakukan karantina mandiri dengan menuggunakan masker, cuci tangan sesering mungkin menggunakan sabun, jaga jarak dan hindari keramaian serta berperilaku hidup sehat.</i></p>
          </div>
        </div>
        <div class="col-sm-6">
          <!--
          <div class="form-group">
            <input type="hidden" name="Saran" id="Saran">
          </div>
          -->
        </div><br>
        <div class="col-sm-6">
          <div class="pull-right">
            <div class="form-group">

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="pull-right">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="modal fade" id="modal-tindakan" tabindex="-1" role="dialog" aria-labelledby="ModalGroupTindakan">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalGroupTindakan">Pemeriksaan</h4>
      </div>
      <div class="modal-body">
        <div id="target-pemeriksaan"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-print-custom" role="dialog" aria-labelledby="ModalPrintCustom">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalPrintCustom">Print Custom</h4>
      </div>
      <div class="modal-body">
        <form>
          <div style="display: none;" id="detail-pems">
            
          </div>
          <table class="table table-bordered" id="table-list-custom">
            <thead>
              <tr>
                <th style="width: 50px; text-align: center;">#</th>
                <th style="width: 240px;">Tanggal / Jam</th>
                <th>Nama Tindakan</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Close
        </button>
        <button id="btnPrintCustom" type="button" class="btn btn-primary">
          <i class="fa fa-print"></i> Print
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var kdgroup = '';
  $(document).ready(function(){
    console.log('Have a nice day :) by Mediantara');
    if ($('#NoTransaksi').val() != '') $('#formCariTransaksi').submit();
  });

  $('#formCariTransaksi').submit(function(ev) {
    ev.preventDefault();
    searchHeadHasil($('#NoTransaksi').val());
    searchDetailHasil($('#NoTransaksi').val());
  });

  $('#formInputHasil').submit(function(ev) {
    ev.preventDefault();
    let btn = $('#btnSaveHasil');
    var tgl_hasil = $('#TglHasil').val();
    let oldText = btn.html();
    btn.html('<i class="fa fa-spin fa-spinner"></i> ' + 'tunggu...');
    btn.prop('disabled', true);
    $.ajax({
      url: "<?= base_url('hasilpemeriksaan/post_hasil_pemeriksaan') ?>",
      type: 'POST',
      data: $(this).serialize(this)+"&tgl_hasil="+tgl_hasil,
      datatype: 'json',
      success: function(resp){
        console.log(resp);
        // alert(resp.message);
        scrollTo({top: 0});
        btn.prop('disabled', false);
        btn.html(oldText);
        // searchDetailHasil($('#NoTransaksi').val());

      }
    });
  });

  $('#table-list-custom tbody').on('click', 'tr', function() {
    $(this).find('input[type=checkbox]').trigger('click');
  });

  $('#table-list-custom tbody').on('click', 'tr input[type=checkbox]', function() {
    console.log('#detail-pems [kode-detail="' + $(this).val() + '"]');
    $('#detail-pems [kode-detail="' + $(this).val() + '"]').prop('checked', $(this).prop('checked'));
  });



  function searchHeadHasil(notransaksi) {
    $.ajax({
      url:"<?=base_url('hasilpemeriksaan/get_pasien_by_notran')?>",
      type:'POST',
      data:{notransaksi:notransaksi},
      success:function(resp){
        console.log(resp.NoLab);
        $('#NoLaboratorium').val(resp.Nolab);
        $('#NoTran').val(resp.Notran);
        $('#TglHasil').val(resp.Tglhasil);
        $('#Regno').val(resp.Regno);
        $('#Medrec').val(resp.MedRec);
        $('#Firstname').val(resp.Firstname);
        $('#KdDokter').val(resp.KdDoc);
        $('#Regdate').val(resp.RegDate.substring(0,10));
        $("input[name=KdSex][value=" + resp.KdSex + "]").attr('checked', 'checked');
        // $('#UmurThn').val(resp.Umurthn);
        // $('#UmurBln').val(resp.Umurbln);
        // $('#UmurHari').val(resp.Umurhari);
        // update usia setiap saat pengisian hasil
        sum_birth_day(resp.Bod);
        $('#Kesan').val(resp.Catatan);
        $('#Kesan-1').val(resp.Kesan);
        $('#Saran').val(resp.Saran);
      }
    });
  }

  function sum_birth_day(birth){
    var today = new Date();
    var bod = birth;
    var age = "";
    var month = Number(bod.substr(5,2));
    var day = Number(bod.substr(8,2));

    // Get Year
    age = today.getFullYear() - bod.substring(0,4);
    if (today.getMonth() < (month - 1)) {
      age--;
    }
    if (((month - 1) == today.getMonth()) && (today.getDate() < day)) {
      age--;
    }
    $('#UmurThn').val(age);
    $('#UmurThn_input').val(age);

    // Get Month
    var calMonth = (today.getMonth()+1)-month;
    if ( calMonth < 0) {
      if (calMonth < 0) {
        var generateMonth = calMonth+12;
        $('#UmurBln').val(generateMonth);
        $('#UmurBln_input').val(generateMonth);
      }else{
        $('#UmurBln').val(calMonth);
        $('#UmurBln_input').val(calMonth);
      }
    }else{
      // var valMonth = today.getMonth() - month;
      
      $('#UmurBln').val(calMonth);
      $('#UmurBln_input').val(calMonth);
    }

    // Get Day
    var callDay = today.getDate()-day;
    if ( callDay < 0) {
      if (callDay < 0) {
        var generateDay = callDay+30;
        $('#UmurHari').val(generateDay);
        $('#UmurHari_input').val(generateDay);
      }else{
        $('#UmurHari').val(callDay);
        $('#UmurHari_input').val(callDay);
      }
    }else{
      // var valMonth = today.getMonth() - month;
      $('#UmurHari').val(callDay);
      $('#UmurHari_input').val(callDay);
    }
  };

  function searchDetailHasil(notransaksi) {
    let btn = $('#btnCari');
    let oldText = btn.html();
    btn.html('<i class="fa fa-spin fa-spinner"></i> ' + 'tunggu...');
    btn.prop('disabled', true);
    $.ajax({
      url:"<?=base_url('hasilpemeriksaan/get_pasien_by_notran_table_detail')?>",
      type:'POST',
      data:{notransaksi:notransaksi},
      beforeSend:function(){
        $('#tableTindakan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
      },
      success:function(resp){
        $('#tableTindakan').html(resp);
        btn.prop('disabled', false);
        btn.html(oldText);
      }
    });
  }

  $('#search_tindakan').on('click', function(ev) {
    ev.preventDefault();
    var xhr = $.ajax({
      url:"<?=base_url('hasilpemeriksaan/show_group_pemeriksaan_lab')?>",
      type:'POST',
      data:{kdgroup:kdgroup},
      beforeSend:function(){
        $('#modal-tindakan').modal('show');
        $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
      },
      success:function(resp){
        $('#target-pemeriksaan').html(resp);
      }
    });
  });

  $('#formTindakan').submit(function(ev) {
    ev.preventDefault();
    let btn = $('#btnTindakan');
    let oldText = btn.html();
    btn.html('<i class="fa fa-spin fa-spinner"></i> ' + 'tunggu...');
    btn.prop('disabled', true);
    if ($('#Regno').val() == '') {
      alert('Isi terlebih dahulu no registrasi terlebih dahulu');
    } else {
      $.ajax({
        url:"<?=base_url('hasilpemeriksaan/post_new_pemeriksaan')?>",
        type:'POST',
        data:{
          kdmapping: $('#KodeTindakan').val(), 
          notran: $('#NoTransaksi').val(), 
          regno: $('#Regno').val(),
          KdPengirim: $('#KdDokter').val(),
          kdlab: $('#NoLaboratorium').val()
        },
        success:function(resp){
          console.log(resp);
          $('#KodeTindakan').val('');
          $('#btnCari').click();
        }
      });
    }
    btn.prop('disabled', false);
    btn.html(oldText);
  });

  $('#btnPrintCustom').click(function(ev) {
    ev.preventDefault();
    if ($('#NoTransaksi').val() == '') {
      alert('Nomor Transaksi Kosong');
    } else {
      var xhr = $.ajax({
        url:"<?=base_url('hasilpemeriksaan/print_hasil_pemeriksaan')?>",
        data: $('#modal-print-custom form input').serialize() +'&'+ 'notransaksi='+$('#NoTransaksi').val(),
        type:'get',
        // data:{notransaksi: $('#NoTransaksi').val()},
        beforeSend:function(){
          $('#modal-tindakan').modal('show');
          $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
        },
        success:function(resp){
          $('#target-pemeriksaan').html(resp);
          setTimeout(function () {
            $('#target-pemeriksaan').printElement();
          }, 1000);
        }
      });
    }
  });
</script>