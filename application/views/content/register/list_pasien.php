<div class="row">
    <div class="col-sm-12 col-md-12">
    	<span>Tanggal:</span>
        <input type="date" name="datelist1" id="datelist1" value="<?=date('Y-m-d')?>">
        <span>S/D</span>
        <input type="date" name="datelist2" id="datelist2" value="<?=date('Y-m-d')?>">
        <span>Cari:</span>
        <input type="text" name="search_medrec" id="search_medrec" placeholder=". . . .">
        <button type="button" class="btn btn-success btn-xs btn-round" id="btnShowList"><i class="fa fa-search"></i>Cari</button>
        <div id="halaman" class="col-sm-12 col-md-12"></div>
    </div>
</div>
<div class="modal fade" id="modalPrintSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="targetPrint"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnShowList').click();
    });
	$('#btnShowList').on('click', function(ev) {
        ev.preventDefault();
        $.ajax({
            url:"<?= base_url('registrasi/list_pasien_penunjang_klinik')?>",
            type:'POST',
            data:{
                date1: $('#datelist1').val(),
                date2: $('#datelist2').val(),
                medrec: $('#search_medrec').val(),
            },
            beforeSend:function(){
                $('#halaman').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(response){
                $('#halaman').html(response);
            }
        });
    });

    $('#search_medrec').keyup(function(ev) {
        ev.preventDefault();
        $('#btnShowList').click();
    });
</script>