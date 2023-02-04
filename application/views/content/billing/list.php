<style type="text/css">
  #billing-pemeriksaan td {
    border: 1px solid #00000037;
  }
</style>
<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="row">
      <div class="col-md-12">
        <h4>List Billing</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="searchForm" class="form-inline">
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
          </div>

          <div class="pull-right">
            <span>Cari:</span>
            <input type="text" name="term" placeholder=". . . ." class="input-sm" value="<?= html_escape($input['term']) ?>">
          </div>
        </form>
      </div>
    </div>
    <div class="row" style="margin-top: 14px;">
      <div class="col-md-12">
        <table class="table table-bordered table-striped mb-0" id="billing-pemeriksaan">
          <thead>
            <tr>
              <th style="width: 110px;">No. Transaksi</th>
              <th style="width: 70px;">No. Lab</th>
              <th style="width: 110px;">No. Registrasi</th>
              <th style="width: 70px;">No. RM</th>
              <th style="width: 90px;">Tanggal</th>
              <th>Nama</th>
              <th>Poli</th>
              <th>Ruang</th>
              <th>Kelas</th>
              <th>Jumlah Biaya</th>
              <th>Alamat / Catatan</th>
              <th style="width: 100px;">#</th>
            </tr>
          </thead>
          <tbody>
            <?php $this->load->view($content.'.table-rows.php', ['data' => $page_hasil->data]); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div id="pagination" class="col-md-12">
        <?php $this->load->view($content.'.pagination.php', array_merge((Array) $page_hasil->pagination, compact('input'))); ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
  	$('.btn-print-sep-1').on('click', function (e) {
		e.preventDefault();
		var win = window.open('<?php echo base_url('billing/type1');?>/'+$(this).data('notran'), '_blank');
		if (win) {
			//Browser has allowed it to be opened
			win.focus();
		} else {
			//Browser has blocked it
			alert('Please allow popups for this website');
		}
	});

	  $('.btn-print-sep-2').on('click', function (e) {
		  e.preventDefault();
		  console.log('1234');
		  var win = window.open('<?php echo base_url('billing/type2');?>/'+$(this).data('notran'), '_blank');
		  if (win) {
			  //Browser has allowed it to be opened
			  win.focus();
		  } else {
			  //Browser has blocked it
			  alert('Please allow popups for this website');
		  }
	  });

    $('.input-daterange').datepicker({autoclose:true, format: 'dd/mm/yyyy'});

    let searchAjax;

    function submitSearch(data) {

      let loadingText = '<tr><td colspan="100%" style="text-align: center;"><i class="fa fa-spinner fa-spin"></i> Memuat..</td></tr>';
      let errorText = '<tr><td colspan="100%" style="text-align: center;"><i class="fa fa-times"></i> Gagal memuat data</td></tr>';

      if(typeof searchAjax !== 'undefined') {
        searchAjax.abort();
      }

      searchAjax = $.ajax({
        method: 'GET',
        url: '<?= site_url('billing/index__table_part') ?>',
        data: data,
        beforeSend: function() {
          $('#billing-pemeriksaan tbody').html(loadingText);
        },
        success: function(res) {

          let pushUrl = '<?= site_url('billing') ?>';
          if(this.url.indexOf('?') !== -1) {
            pushUrl += this.url.substr(this.url.indexOf('?'));
          }

          window.history.replaceState(null, $('title').text(), pushUrl);

          $('#billing-pemeriksaan tbody').html(res.html_table_rows);
          $('#pagination').html(res.html_pagination);
        },
        error: function() {
          $('#billing-pemeriksaan tbody').html(errorText);
          let params = this;
          setTimeout(function() {
            $.ajax(params);
          }, 1000);
        }
      });
    }

    let debounceSubmitSearch = debounce(function(data) { submitSearch(data); });

    $('#billing-pemeriksaan tbody').on('click', '.btn-delete', function(ev) {
      ev.preventDefault();

      let btn = $(this);
      let row = btn.parents('tr');
      let no_tran = row.data('notran');

      let loadingText = '<i class="fa fa-spin fa-spinner"></i>';
      let errorText = '<i class="fa fa-times"></i>';
      btn.attr('original-content', btn.html());

      bootbox.confirm('Apakah anda yakin akan menghapus data ini?', function(confirm) {
        if(confirm) {
          $.ajax({
            method: 'POST',
            url: '<?= site_url('ajax/hapus_billing/') ?>' + no_tran,
            beforeSend: function() {
              btn.html(loadingText).attr('disabled', true);
            },
            success: function(res) {
              if(res && res.success) {
                row.remove();
              }
            },
            complete: function() {
              btn.html(btn.attr('original-content')).attr('disabled', false);
            },
          });
        }
      });
    });

    $('#searchForm').on('submit', function (ev) {
      ev.preventDefault();
      submitSearch($(this).serialize());
    });

    $('#searchForm :input').on('input', function () {
      $('#searchForm').submit();
    });

    $('#searchForm .date-picker').on('change', function() {
      $('#searchForm').submit();
    });

    $('#pagination').on('click', 'a', function(ev) {
      ev.preventDefault();
      submitSearch($(this).data('serialization'));
    });
  });
</script>
