<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="row">
      <div class="col-md-12">
        <h4>Daftar Pasien</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="searchForm" class="form-inline" action="<?php echo base_url('list_pasien/print_pasien');?>">
          <div class="pull-left">
            <label class="inline">
              <span class="lbl"> Tanggal: </span>
            </label>
            <div class="input-daterange input-group">
              <input type="text" name="from_date" class="input-sm date-picker" value="<?= html_escape($input['from_date']->format('d/m/Y')) ?>">
              <span class="input-group-addon">
                <i class="fa fa-exchange"></i>
              </span>
              <input type="text" name="to_date" class="input-sm date-picker" value="<?= html_escape($input['to_date']->format('d/m/Y')) ?>">
            </div>

            <span id="filterInstalasi">
              <label class="inline" style="margin-left: 15px;">
                <span class="lbl"> Instalasi </span>
              </label>
              <select name="instalasi">
                <option value="">Semua</option>
                <?php $selected = 1 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="1" <?= $selected ?>>Rawat Jalan</option>
                <?php $selected = 2 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="2" <?= $selected ?>>Rawat Inap</option>
                <?php $selected = 3 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="3" <?= $selected ?>>IGD</option>
                <?php $selected = 4 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="4" <?= $selected ?>>Rawat Inap (Dalam Perawatan)</option>
              </select>
            </span>

            <span id="filterPoli" style="display: none;">
              <label class="inline" style="margin-left: 15px;">
                <span class="lbl"> Poli </span>
              </label>
              <select name="poli">
                <option value="">Semua</option>
                <?php foreach($poli_list as $item): ?>
                  <?php $selected = $item->KdPoli == $input['poli'] ? 'selected="selected"' : '' ?>
                  <option value="<?= $item->KdPoli ?>" <?= $selected ?>><?= $item->NmPoli ?></option>
                <?php endforeach; ?>
              </select>
            </span>

		  <span id="print" >
			    <label class="inline" style="margin-left: 15px;">
                 <button type="submit" class="btn btn-success btn-minier btn-print"><i class="fa fa-print"></i></button>
              </label>

            </span>
			  <input type="hidden" name="print">
            <span id="filterRuangan" style="display: none;">
              <label class="inline" style="margin-left: 15px;">
                <span class="lbl"> Ruangan </span>
              </label>
              <select name="ruangan">
                <option value="">Semua</option>
                <?php foreach($bangsal_list as $item): ?>
                  <?php $selected = $item->KdBangsal == $input['ruangan'] ? 'selected="selected"' : '' ?>
                  <option value="<?= $item->KdBangsal ?>" <?= $selected ?>><?= $item->NmBangsal ?></option>
                <?php endforeach; ?>
              </select>
            </span>
          </div>

          <div class="pull-right">
            <span>Cari:</span>
            <input type="text" name="term" placeholder="..." class="input-sm" value="<?= html_escape($input['term']) ?>">
          </div>
        </form>
      </div>
    </div>
    <div class="row" style="margin-top: 14px;">
      <div class="col-md-12">
        <table class="table table-bordered table-striped mb-0" id="list-pasien">
          <thead>
            <tr>
              <th style="width: 110px;">No. Registrasi</th>
              <th style="width: 70px;">No. RM</th>
              <th>Tgl. Registrasi</th>
              <th>Nama (Umur)</th>
              <th>Kategori</th>
              <th>Instalasi</th>
              <th>Poli / Ruang</th>
              <th>Kelas</th>
              <th>Alamat</th>
              <th>Catatan</th>
              <th style="width: 180px;">#</th>
            </tr>
          </thead>
          <tbody>
            <?php $this->load->view($content.'.table-rows.php', ['data' => $page_list->data]); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div id="pagination" class="col-md-12">
        <?php $this->load->view($content.'.pagination.php', array_merge((Array) $page_list->pagination, compact('input'))); ?>
      </div>
    </div>
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

<div class="modal fade" id="modalPrintSuratList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="targetPrintList"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function() {

    $('.input-daterange').datepicker({autoclose:true, format: 'dd/mm/yyyy'});

    $('[name=instalasi]').on('change', function() {
      let instalasi = $(this).val();
      if(instalasi == 1) {
        $('#filterPoli').show();
        $('#filterRuangan').hide();
        $('[name=from_date], [name=to_date]').prop('disabled', false);
      }
      else if(instalasi == 2) {
        $('#filterRuangan').show();
        $('#filterPoli').hide();
        $('[name=from_date], [name=to_date]').prop('disabled', false);
      }
      else if(instalasi == 3) {
        $('#filterRuangan, #filterPoli').hide();
        $('[name=from_date], [name=to_date]').prop('disabled', false);
      }
      else if(instalasi == 4) {
        $('#filterRuangan').show();
        $('#filterPoli').hide();
        $('[name=from_date], [name=to_date]').prop('disabled', true);
      }
    })
    .trigger('change');

    let searchAjax;

    function submitSearch(data) {

      let loadingText = '<tr><td colspan="100%" style="text-align: center;"><i class="fa fa-spinner fa-spin"></i> Memuat..</td></tr>';
      let errorText = '<tr><td colspan="100%" style="text-align: center;"><i class="fa fa-times"></i> Gagal memuat data</td></tr>';

      if(typeof searchAjax !== 'undefined') {
        searchAjax.abort();
      }

      searchAjax = $.ajax({
        method: 'GET',
        url: '<?= site_url('list_pasien/table_part') ?>',
        data: data,
        beforeSend: function() {
          $('#list-pasien tbody').html(loadingText);
        },
        success: function(res) {

          let pushUrl = '<?= site_url('list_pasien/index') ?>';
          if(this.url.indexOf('?') !== -1) {
            pushUrl += this.url.substr(this.url.indexOf('?'));
          }

          window.history.replaceState(null, $('title').text(), pushUrl);

          $('#list-pasien tbody').html(res.html_table_rows);
          $('#pagination').html(res.html_pagination);
        },
        error: function() {
          $('#list-pasien tbody').html(errorText);
          let params = this;
          setTimeout(function() {
            $.ajax(params);
          }, 1000);
        }
      });
    }

    let debounceSubmitSearch = debounce(function(data) {
      submitSearch(data);
    });

    $('#searchForm').on('submit', function (ev) {
    	if($('[name="print"]').val() == ''){
			ev.preventDefault();
		}
      debounceSubmitSearch($(this).serialize());
    });

    $('#searchForm :input').on('input change', function () {
      $('#searchForm').submit();
    });

    $('.btn-print').on('click', function () {
		$('[name="print"]').val('1');
		$('#searchForm').trigger('submit');
	});
    $('#pagination').on('click', 'a', function(ev) {
      ev.preventDefault();
      debounceSubmitSearch($(this).data('serialization'));
    });

    $('#list-pasien tbody').on('click', '.btn-print-sep', function() {
      let btn = $(this);
      let row = btn.parents('tr');
      let regno = row.data('regno');

      let loadingText = '<i class="fa fa-spin fa-spinner"></i> SEP';
      let oldHtml = btn.html();
      $.ajax({
        url:"<?= base_url('registrasi/print_sep') ?>",
        type: "GET",
        dataType: "html",
        data:{
          Regno: regno,
        },
        beforeSend: function() {
          btn.html(loadingText).attr('disabled', true);
        },
        success:function(data) {
          $('#modalPrintSuratList').modal('show');
          $('#targetPrintList').html(data);
          setTimeout(function () {
            $('#targetPrintList').printElement();
            btn.html(oldHtml).attr('disabled', false);
          }, 1000);
        }
      });
    });
  });
</script>
