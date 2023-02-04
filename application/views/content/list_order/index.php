<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="row">
      <div class="col-md-12">
        <h4>List Order</h4>
      </div>
      <div class="row">
      <div id="cetak_order"  class="col-md-12 pull-right">
          <button class="btn btn-md btn-primary" id="btn_download" onclick="download_order()" ><i class="fa fa-print"></i> Download Order</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="searchForm" class="form-inline">
          <div class="pull-left">
            <label class="inline">
              <span class="lbl"> Tanggal Sample: </span>
            </label>
            <div class="input-daterange input-group">
              <input type="text" name="from_date" id="from_date" class="input-sm date-picker" value="<?= html_escape($input['from_date']->format('d/m/Y')) ?>">
              <span class="input-group-addon">
                <i class="fa fa-exchange"></i>
              </span>
              <input type="text" name="to_date" id="to_date" class="input-sm date-picker" value="<?= html_escape($input['to_date']->format('d/m/Y')) ?>">
            </div>


    			  <span id="tanda">
                  <label class="inline" style="margin-left: 15px;">
                    <span class="lbl"> Status Billing </span>
                  </label>
                  <select name="tanda">
                <?php $selected = '' == $input['tanda'] ? 'selected="selected"' : ''; ?>
                    <option value="" <?= $selected ?>>Semua</option>
                <?php $selected = 0 == $input['tanda'] ? 'selected="selected"' : ''; ?>
      					<option value="0" <?= $selected ?>>Sudah</option>
                <?php $selected = 1 == $input['tanda'] ? 'selected="selected"' : ''; ?>
                <option value="1" <?= $selected ?>>Belum</option>
                  </select>
            </span>

            <span id="filterInstalasi">
              <label class="inline" style="margin-left: 15px;">
                <span class="lbl"> Instalasi </span>
              </label>
              <select name="instalasi">
                <?php $selected = 2 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="2" <?= $selected ?>>Rawat Inap</option>
                <?php $selected = 1 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="1" <?= $selected ?>>Rawat Jalan</option>
                <?php $selected = 3 == $input['instalasi'] ? 'selected="selected"' : ''; ?>
                <option value="3" <?= $selected ?>>IGD</option>
              </select>
            </span>
            <span id="cari">
                  <label class="inline" style="margin-left: 15px;">
                    <span class="lbl"> Cari Data  </span>
                  </label>
                  <input type="text" name="term" placeholder="..." class="input-sm" value="<?= html_escape($input['term']) ?>">
            </span>
              <label class="inline" style="margin-left: 15px;">
                <button type="submit" class="btn btn-xs btn-info"> Cari </button>
              </label>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="row" style="margin-top: 14px;">
      <div class="col-md-12">
        <table class="table table-bordered table-striped mb-0" id="list-order">
          <thead>
            <tr>
              <th style="width: 110px;">No. Transaksi</th>
              <th style="width: 110px;">No. Lab</th>
              <th style="width: 110px;">No. Registrasi</th>
              <th style="width: 70px;">No. RM</th>
              <th>Tgl. Ambil Sample</th>
              <th>Nama (Umur)</th>
              <th>Kategori</th>
              <th>Instalasi</th>
              <th>Poli / Ruang</th>
              <th>Kelas</th>
              <th>Alamat</th>
              <th>Catatan</th>
              <th>Status</th>
              <th style="width: 180px;">#</th>
            </tr>
          </thead>
          <tbody>
            <?php $this->load->view($content.'.table-rows.php', ['data' => $order_page->data]); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div id="pagination" class="col-md-12">
        <?php $this->load->view($content.'.pagination.php', array_merge((Array) $order_page->pagination, compact('input'))); ?>
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
        url: '<?= site_url('list_order/index__table_part') ?>',
        data: data,
        beforeSend: function() {
          $('#list-order tbody').html(loadingText);
        },
        success: function(res) {

          let pushUrl = '<?= site_url('list_order/index') ?>';
          if(this.url.indexOf('?') !== -1) {
            pushUrl += this.url.substr(this.url.indexOf('?'));
          }

          window.history.replaceState(null, $('title').text(), pushUrl);
          location.reload();

          $('#list-order tbody').html(res.html_table_rows);
          $('#pagination').html(res.html_pagination);
        },
        error: function() {
          $('#list-order tbody').html(errorText);
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
      ev.preventDefault();
      debounceSubmitSearch($(this).serialize());
    });

    // $('#searchForm :input').on('input change', function () {
    //   $('#searchForm').submit();
    // });

    $('#pagination').on('click', 'a', function(ev) {
      ev.preventDefault();
      debounceSubmitSearch($(this).data('serialization'));
    });
  });

  function download_order(){
    var tglawal = $('#from_date').val();
    var tglakhir = $('#to_date').val();
    var instalasi = $('[name=instalasi]').val();
    var tanda = $('[name=tanda]').val();
    // $.ajax({
    //     method: 'POST',
    //     url: '<?= site_url('list_order/export') ?>',
    //     data: {'tglawal' : tglawal, 'tglakhir' : tglakhir},
    //     beforeSend: function() {
    //       $('#btn_download').html('<i class="fa fa-spinner fa-spin"></i> Memuat..</td>');
    //     },
    //     success: function(res) {

    //       $('#btn_download').html('<i class="fa fa-spinner fa-print"></i> Download</td>');        
    //     },
    //     error: function() {
    //       $('#btn_download').html('<i class="fa fa-spinner fa-print"></i> Download Ulang</td>');
    //     }
    //   });
    window.open('<?= site_url('list_order/export?tglawal=')?>'+tglawal+'&tglakhir='+tglakhir+'&instalasi='+instalasi+'&tanda='+tanda);
  }
  
  function hapus(notran){
    $.ajax({
        method: 'POST',
        url: '<?= site_url('list_order/hapus') ?>',
        data: {'notran' : notran},
        success: function(res) {
          alert('Data Berhasil dihapus');
          location.reload();
        },
        error: function() {
          alert('Gagal Menghapus');
        }
      });
  }
</script>
