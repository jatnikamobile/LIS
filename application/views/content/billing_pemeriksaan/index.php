<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <p><i><u>Data Pasien</u></i></p>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">No Transaksi</label>
          <div class="input-group col-sm-6">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="NoTran" id="NoTran" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <form id="formCariRegistrasi">
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">No Registrasi</label>
            <div class="input-group col-sm-9">
              <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
              <input type="text" name="Regno" id="Regno" class="input-sm" value="<?= @$regno ?>"/>
              <button type="submit" class="btn btn-info btn-sm" id="btnCari" style="margin-left: 10px;">
                <i class="ace-icon fa fa-search"></i> Cari
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Tgl. Transaksi</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <input type="date" name="TglTransaksi" class="form-control input-sm" id="TglTransaksi" value="<?= date('Y-m-d') ?>" />
            <!-- Tgl Daftar -->
            <span class="input-group-addon" id="" style="border:none;background-color:white;">Jam</span>
            <input type="time" name="JamTransaksi" id="JamTransaksi" class="form-control input-sm col-xs-6 col-sm-6" value="<?= date('H:i') ?>" />
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">No Rekam Medis</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <input type="text" name="Medrec" class="form-control input-sm" id="Medrec" readonly />
            <!-- Tgl Daftar -->
            <span class="input-group-addon" id="" style="border:none;background-color:white;">Tgl Regis</span>
            <input type="date" name="Regdate" id="Regdate" class="form-control input-sm col-xs-6 col-sm-6" readonly/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Nama Pasien</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Firstname" id="Firstname" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-6">
          <div class="form-group">
            <div class="input-group col-sm-12">
              <div class="radio">
                <label>
                  <input name="KdSex" type="radio" class="ace" value="L"/>
                  <span class="lbl">&nbsp; Laki - Laki</span>
                </label>
                <label>
                  <input name="KdSex" type="radio" class="ace" value="P"/>
                  <span class="lbl">&nbsp; Perempuan</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
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
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <p><i><u>Status Perawatan</u></i></p>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-md-3 control-label no-padding-right">Dokter Pengirim</label>
          <div class="input-group col-md-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <select name="DokterPengirim" id="DokterPengirim" style="width:100%;" class="form-control input-sm select2">
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-md-3 control-label no-padding-right">Pemeriksa</label>
          <div class="input-group col-md-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <select name="DokterPemeriksa" id="DokterPemeriksa" style="width:100%;" class="form-control input-sm select2">
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">No Laboratorium</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="NoLab" id="NoLab" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Tgl Selesai</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:white;">:</span>
            <input type="date" name="TglSelesai" class="form-control input-sm" id="TglSelesai"/>
            <!-- Tgl Daftar -->
            <span class="input-group-addon" id="" style="border:none;background-color:white;">Jam</span>
            <input type="time" name="JamSelesai" id="JamSelesai" class="form-control input-sm col-xs-6 col-sm-6"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Status</label>
          <div class="radio">
            <label>
              <input name="Status" type="radio" class="ace" value="0" checked />
              <span class="lbl">&nbsp; Normal</span>
            </label>
            <label>
              <input name="Status" type="radio" class="ace" value="1"/>
              <span class="lbl">&nbsp; Cito</span>
            </label>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">J. Pemeriksaan</label>
          <div class="radio">
            <label>
              <input name="JenisPemeriksaan" type="radio" class="ace" value="1"/>
              <span class="lbl">&nbsp; Sederhana</span>
            </label>
            <label>
              <input name="JenisPemeriksaan" type="radio" class="ace" value="2" checked />
              <span class="lbl">&nbsp; Sedang</span>
            </label>
            <label>
              <input name="JenisPemeriksaan" type="radio" class="ace" value="3"/>
              <span class="lbl">&nbsp; Canggih</span>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <p><i><u>Ruang Rawat / Poli (Asal)</u></i></p>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">R. Rawat</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Rawat" id="Rawat" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdRawat" id="KdRawat"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Kelas</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Kelas" id="Kelas" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdKelas" id="KdKelas"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Nama Poli</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Poli" id="Poli" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdPoli" id="KdPoli"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Cara Bayar</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="CaraBayar" id="CaraBayar" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdCaraBayar" id="KdCaraBayar"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Jaminan</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Jaminan" id="Jaminan" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdJaminan" id="KdJaminan"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Kategori</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="Kategori" id="Kategori" class="form-control input-sm col-xs-10 col-sm-5" readonly/>
            <input type="hidden" name="KdKategori" id="KdKategori"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-12" style="margin-top: 25px;">
    <div class="col-sm-6">
      <button class="btn btn-info btn-sm" type="button" id="search_tindakan"><i class="fa fa-search"></i> Pilih Tindakan</button>
      <form id="formTindakan" style="margin-top: 10px;">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">Kode Tindakan</label>
          <div class="input-group col-sm-9">
            <span class="input-group-addon" id="" style="border:none;background-color:transparent;">:</span>
            <input type="text" name="KodeTindakan" id="KodeTindakan" class="input-sm" />
            <button type="submit" class="btn btn-success btn-sm" id="btnTindakan" style="margin-left: 10px;">
              <i class="ace-icon fa fa-plus"></i>Cari
            </button>
            <button type="button" class="btn btn-success btn-sm" id="btnRefresh" style="margin-left: 10px;">
              <i class="ace-icon fa fa-check"></i>Cek
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-sm-12">
      <div id="tableTindakan"></div>
      <!-- <table class="table table-bordered" id="detail_pemeriksaan">
        <thead>
          <tr class="info">
            <th style="text-align:center;">Kode</th>
            <th style="text-align:center;">Keterangan Pemeriksaan</th>
            <th style="text-align:center;">Sarana</th>
            <th style="text-align:center;">Pelayanan</th>
            <th style="text-align:center;">Biaya</th>
            <th style="text-align:center; width: 5%;">Action</th>
          </tr>
        </thead>
      </table> -->
    </div>
    <!-- <div class="col-sm-12">
      <div class="pull-right">
        <div class="col-sm-3">
          <span>Jumlah Biaya: </span>
          <input type="text" name="jumlah_biaya" id="jumlah_biaya" readonly>
          <input type="hidden" name="total" id="total"><br>
          <button type="button" class="btn btn-success btn-xs btn-round" id="btnSaveBilling"><i class="fa fa-save"></i>  Simpan</button>
          <button type="button" class="btn btn-primary btn-xs btn-round" id="btnPrintLabel"><i class="fa fa-print"></i>  Cetak Label</button>
          <a href="" class="btn btn-warning btn-xs btn-round"><i class="fa fa-check"></i>Baru</a>
        </div>
      </div>
    </div> -->
  </div>
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
<div class="modal fade" id="modal-choose" tabindex="-1" role="dialog" aria-labelledby="Modalchoose">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="Modalchoose">Pilih Print</h4>
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
<div class="modal fade" id="modalPrintLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Pilih Print</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <div id="targetPrintLabel">
      <div class="radio">
        <label>
          <input name="choosePrint" type="radio" class="ace" value="3" checked />
          <span class="lbl">&nbsp; 3</span>
        </label>
        <label>
          <input name="choosePrint" type="radio" class="ace" value="6"/>
          <span class="lbl">&nbsp; 6</span>
        </label>
        <label>
          <input name="choosePrint" type="radio" class="ace" value="9"/>
          <span class="lbl">&nbsp; 9</span>
        </label>
        <label>
          <input name="choosePrint" type="radio" class="ace" value="12"/>
          <span class="lbl">&nbsp; 12</span>
        </label>
      </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary btn-xs btn-round" id="btn_print_label"><i class="fa fa-print"></i> Print</button>
    <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Tutup</button>
    </div>
  </div>
  </div>
</div>
<script type="text/javascript">
  var kdgroup = '';
  var length_row = 1;
  var total = parseInt('0');
  $(document).ready(function(){
    console.log('Have a nice day :) by Mediantara')
    if ($('#Regno').val() != '') {
      $('#formCariRegistrasi').submit();
    }
  });

  $('#btnSaveBilling').on('click', function(ev) {
    ev.preventDefault();
    var arrData = [];
    $('#detail_pemeriksaan tr').each(function() {
      var currentRow=$(this);
      var col1_value = currentRow.find("td:eq(0)").text();
      var obj = {};
      obj.col1=col1_value;
      arrData.push(obj);
    });
    var value = {
      Regno: $('#Regno').val(),
      Medrec: $('#Medrec').val(),
      Regdate: $('#Regdate').val(),
      KdPoli: $('#KdPoli').val(),
      KdPengirim: $('#DokterPengirim').val(),
      KdPemeriksa: $('#DokterPemeriksa').val(),
      KdKelas: $('#KdKelas').val(),
      KdBangsal: $('#KdRawat').val(),
      KdSex: $('input[name=KdSex]:checked').val(),
      Kategori: $('#KdKategori').val(),
      KdCBayar: $('#KdCaraBayar').val(),
      KdJaminan: $('#KdJaminan').val(),
      Status: $('input[name=Status]:checked').val(),
      Jenis: $('input[name=JenisPemeriksaan]:checked').val(),
      UmurThn: $('#UmurThn').val(),
      UmurBln: $('#UmurBln').val(),
      UmurHari: $('#UmurHari').val(),
      TglTransaksi: $('#TglTransaksi').val(),
      JamTransaksi: $('#JamTransaksi').val(),
      TglSelesai: $('#TglSelesai').val(),
      JamSelesai: $('#JamSelesai').val(),
      Pemeriksaan: arrData,
      JumlahBiaya: $('#total').val()
    };

    $.ajax({
      url:"<?=base_url('billingpemeriksaan/post_transaksi')?>",
      type: 'POST',
      data: value,
      success:function(resp){
        console.log(resp);
        $('#NoLab').val(resp.NoLab);
        $('#NoTran').val(resp.NoTran);
        alert(resp.message);
      }
    });
    // alert('Mohon maaf, sedang dalam pengerjaan. Terima kasih');
    console.log(arrData);
  });

  $('#formCariRegistrasi').submit(function(ev) {
    ev.preventDefault();
    let btn = $('#btnCari');
    let oldText = btn.html();
    btn.html('<i class="fa fa-spin fa-spinner"></i> ' + 'tunggu...');
    btn.prop('disabled', true);

    $.ajax({
      url:"<?=base_url('billingpemeriksaan/get_pasien_by_regno')?>",
      type:'POST',
      data:{ regno : $('#Regno').val()},
      success:function(resp){
        console.log(resp);
        if (resp.status) {
          $('#Firstname').val(resp.data.Firstname);
          $('#Medrec').val(resp.data.Medrec);
          $('#Regdate').val(resp.data.Regdate.substring(0,10));
          $("input[name=KdSex][value=" + resp.data.KdSex.toUpperCase() + "]").attr('checked', 'checked');

          if (resp.data.KdDoc != '') {
            var $dokter = $("<option selected></option>").val(resp.data.KdDoc).text(resp.data.NmDoc);
            $('#DokterPengirim').append($dokter).trigger('change');
          } else {
            var $dokter = $("<option selected></option>").val(resp.data.KdDokterPengirim).text(resp.data.NmDokterPengirim);
            $('#DokterPengirim').append($dokter).trigger('change');
          }

          $('#Rawat').val(resp.data.NmBangsal);
          $('#KdRawat').val(resp.data.KdBangsal);
          $('#Kelas').val(resp.data.NMKelas);
          $('#KdKelas').val(resp.data.KdKelas);
          $('#Poli').val(resp.data.NMPoli);
          $('#KdPoli').val(resp.data.KdPoli);
          $('#CaraBayar').val(resp.data.NMCbayar);
          $('#KdCaraBayar').val(resp.data.KdCBayar);
          $('#Jaminan').val(resp.data.NMJaminan);
          $('#KdJaminan').val(resp.data.KdJaminan);
          $('#Kategori').val(resp.data.NmKategori);
          $('#KdKategori').val(resp.data.Kategori);

          var $dokterPemeriksa = $("<option selected></option>").val(resp.data.KdDokter).text(resp.data.NmDokterPemeriksa);
          $('#DokterPemeriksa').append($dokterPemeriksa).trigger('change');

          $('#NoTran').val(resp.NoTransaksi);
          $('#NoLab').val(resp.NomorLaboratorium);
          $('#UmurThn').val(resp.UmurThn);
          $('#UmurBln').val(resp.UmurBln);
          $('#UmurHari').val(resp.UmurHari);
          billingPemeriksaanPasien(resp.NoTransaksi);
          // sum_birth_day(resp.data.Bod);
          btn.prop('disabled', false);
          btn.html(oldText);
        } else {
          alert('No Registrasi tidak ditemukan');
          btn.prop('disabled', false);
          btn.html(oldText);
        }
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
        url:"<?=base_url('billingpemeriksaan/post_new_pemeriksaan')?>",
        type:'POST',
        data:{
          kdmapping: $('#KodeTindakan').val(), 
          NomorTransaksi: $('#NoTran').val(), 
          Regno: $('#Regno').val(),
          KdPengirim: $('#DokterPengirim').val(),
          NomorLab: $('#NoLab').val(),
          TglTransaksi: $('#TglTransaksi').val(),
          JamTransaksi: $('#JamTransaksi').val(),
          TglSelesai: $('#TglSelesai').val(),
          JamSelesai: $('#JamSelesai').val(),
          Medrec: $('#Medrec').val(),
          KdSex: $('input[name=KdSex]:checked').val(),
          UmurThn: $('#UmurThn').val(),
          UmurBln: $('#UmurBln').val(),
          UmurHari: $('#UmurHari').val(),
          KdBangsal: $('#KdRawat').val(),
          KdKelas: $('#KdKelas').val(),
          KdPoli: $('#KdPoli').val(),
          KdCBayar: $('#KdCaraBayar').val(),
          KdJaminan: $('#KdJaminan').val(),
          JumlahBiaya: $('#total').val(),
          Kategori: $('#KdKategori').val(),
          Status: $('input[name=Status]:checked').val(),
          Jenis: $('input[name=JenisPemeriksaan]:checked').val(),
          Regdate: $('#Regdate').val(),
          KdPemeriksa: $('#DokterPemeriksa').val(),
        },
        success:function(resp){
          console.log(resp);
          if (!resp.status) {
            alert($('#KodeTindakan').val()+ ' - ' +resp.message);
          }
          billingPemeriksaanPasien($('#NoTran').val());
          update_dokter_pengirim($('#NoTran').val());
          // $('#btnCari').click();
          btn.prop('disabled', false);
          btn.html(oldText);
        }
      });
    }
    $('#KodeTindakan').val('');
  });

  $('#search_tindakan').on('click', function(ev) {
    ev.preventDefault();
    var xhr = $.ajax({
      url:"<?=base_url('billingpemeriksaan/show_group_pemeriksaan_lab')?>",
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

  $('#btnRefresh').on('click', function(ev) {
    ev.preventDefault();
    if ($('#NoTran').val() == '') {
      alert('Data tidak lengkap');
    } else {
      billingPemeriksaanPasien($('#NoTran').val());
      update_dokter_pengirim($('#NoTran').val());
    }
  });

  $('#btnPrintLabel').on('click', function(ev) {
    ev.preventDefault();
    $('#modalPrintLabel').modal('show');
  });

  $('#btn_print_label').on('click', function(ev) {
    ev.preventDefault();
    if ($('#NoTran').val() == '') {
      alert('Nomor Transaksi kosong');
    } else {
      $.ajax({
        url:"<?=base_url('billingpemeriksaan/print_label_billing')?>",
        type:"get",
        dataType:"html",
        data:{
          notransaksi: $('#NoTran').val(),
          cetak: $('input[name=choosePrint]:checked').val(),
        },error: function(response){
          alert('Gagal, Silahkan coba lagi');
        },
        success:function(data)
        {
          // $('#modalPrintLabel').modal('show');
          $('#targetPrintLabel').html(data);
          setTimeout(function () {
            $('#targetPrintLabel').printElement();
          }, 1000);
        }
      });
    }
  });

  function update_dokter_pengirim(notran) {
    $.ajax({
      url:"<?=base_url('billingpemeriksaan/update_dokter_pengirim')?>",
      type:'POST',
      data:{
        DokterPengirim: $('#DokterPengirim').val(), 
        DokterPemeriksa: $('#DokterPemeriksa').val(),
        Notran: notran
      },
      success:function(resp){
        console.log(resp);
      }
    });
  }

  function billingPemeriksaanPasien(notran) {
    $.ajax({
      url:"<?=base_url('billingpemeriksaan/detail_billing_pasien')?>",
      type:'get',
      data:{notran: $('#NoTran').val()},
      beforeSend:function(){
        $('#tableTindakan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
      },
      success:function(resp){
        $('#tableTindakan').html(resp);
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

    // Get Month
    var calMonth = (today.getMonth()+1)-month;
    if ( calMonth < 0) {
      if (calMonth < 0) {
        var generateMonth = calMonth+12;
        $('#UmurBln').val(generateMonth);
      }else{
        $('#UmurBln').val(calMonth);
      }
    }else{
      // var valMonth = today.getMonth() - month;
      
      $('#UmurBln').val(calMonth);
    }

    // Get Day
    var callDay = today.getDate()-day;
    if ( callDay < 0) {
      if (callDay < 0) {
        var generateDay = callDay+30;
        $('#UmurHari').val(generateDay);
      }else{
        $('#UmurHari').val(callDay);
      }
    }else{
      // var valMonth = today.getMonth() - month;
      
      $('#UmurHari').val(callDay);
    }
  };

  $('#detail_pemeriksaan').on('click', '.btn-delete', function(ev) {
    // var customerId = $(this).parents('td').eq(2).html();
    // console.log(customerId);
    // alert(customerId);
    $(this).parents('tr').remove();
  });

  function convertToRupiah(angka)
  {
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
  }

  // Select 2 function
  $('[name=DokterPengirim]').select2({
    ajax: {
      url:"<?=base_url('api/dokter')?>",
      type:'post',
      dataType: 'json',
      data: function(params) {
        return {
          q: params.term,
          offset: (params.page || 0) * 20,
          kdpoli:''
        };
      },
      processResults: function(data, params) {
        return {
          results: data.data.map(function(item){
            item.id = item.KdDoc;
            item.text = item.NmDoc;
            return item;
          }),
          pagination: {
            more: data.has_next
          }
        }
      },
    },

    templateResult: function(item) {
      if(item.loading) {
        return item.text;
      }

      return `
        <p>
           ${item.NmDoc} - ${item.KdDPJP ? item.KdDPJP : ''} 
        </p>
      `;
    },
    escapeMarkup: function(markup) {
      return markup;
    },
    templateSelection: function(item) {
      return item.text;
    },
  });

  $('[name=DokterPemeriksa]').select2({
    ajax: {
      url:"<?=base_url('api/dokter')?>",
      type:'post',
      dataType: 'json',
      data: function(params) {
        return {
          q: params.term,
          offset: (params.page || 0) * 20,
          kdpoli:'30'
        };
      },
      processResults: function(data, params) {
        return {
          results: data.data.map(function(item){
            item.id = item.KdDoc;
            item.text = item.NmDoc;
            return item;
          }),
          pagination: {
            more: data.has_next
          }
        }
      },
    },

    templateResult: function(item) {
      if(item.loading) {
        return item.text;
      }

      return `
        <p>
           ${item.NmDoc} - ${item.KdDPJP ? item.KdDPJP : ''} 
        </p>
      `;
    },
    escapeMarkup: function(markup) {
      return markup;
    },
    templateSelection: function(item) {
      return item.text;
    },
  });
</script>