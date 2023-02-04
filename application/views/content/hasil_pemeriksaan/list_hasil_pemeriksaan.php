<style type="text/css">
  #hasil-pemeriksaan td {
    border: 1px solid #00000037;
  }
</style>
<div class="row">
  <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
    <div class="row">
      <div class="col-md-12">
        <h4>List Pemeriksaan</h4>
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

			  <label class="inline" style="margin-left: 15px;">
				  <span class="lbl">Ruangan : </span>
			  </label>
			  <select name="ruangan">
				  <option value="">--Semua Raungan--</option>
				  <?php foreach ($bangsals as $bangsal):?>
					  <option value="<?php echo $bangsal->NmBangsal;?>"
					  <?php echo $input['ruangan'] == $bangsal->NmBangsal ? 'selected' : ''?>
					  ><?php echo $bangsal->NmBangsal;?></option>
				  <?php endforeach;?>
			  </select>

            <label class="inline" style="margin-left: 15px;">
              <span class="lbl"> Status Hasil: </span>
            </label>
            <select name="status_hasil">
              <option value="">Semua</option>
              <?php $selected = 1 == $input['status_hasil'] ? 'selected="selected"' : ''; ?>
              <option value="1">Belum Terisi</option>
              <?php $selected = 2 == $input['status_hasil'] ? 'selected="selected"' : ''; ?>
              <option value="2">Sebagian Terisi</option>
              <?php $selected = 3 == $input['status_hasil'] ? 'selected="selected"' : ''; ?>
              <option value="3">Terisi Lengkap</option>
            </select>
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
        <table class="table table-bordered table-striped mb-0" id="hasil-pemeriksaan">
          <thead>
            <tr>
              <th style="width: 110px;">No. Transaksi</th>
              <th style="width: 70px;">No. Lab</th>
              <th style="width: 110px;">No. Registrasi</th>
              <th style="width: 70px;">No. RM</th>
              <th style="width: 90px;">Tgl. Hasil</th>
              <th>Nama (Umur)</th>
              <th>Kategori</th>
              <th>Catatan</th>
              <th>Poli</th>
              <th>Ruang</th>
              <th>Kelas</th>
              <th>Alamat / Catatan</th>
              <th style="width: 50px;">Print</th>
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
        url: '<?= site_url('hasilpemeriksaan/list__table_part') ?>',
        data: data,
        beforeSend: function() {
          $('#hasil-pemeriksaan tbody').html(loadingText);
        },
        success: function(res) {

          let pushUrl = '<?= site_url('hasilpemeriksaan/list_hasil_pemeriksaan') ?>';
          if(this.url.indexOf('?') !== -1) {
            pushUrl += this.url.substr(this.url.indexOf('?'));

		}
          window.history.replaceState(null, $('title').text(), pushUrl);

          $('#hasil-pemeriksaan tbody').html(res.html_table_rows);
          $('#pagination').html(res.html_pagination);
        },
        error: function() {
          $('#hasil-pemeriksaan tbody').html(errorText);
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

    $('#searchForm :input').on('input change', function () {
      $('#searchForm').submit();
    });

    $('#pagination').on('click', 'a', function(ev) {
      ev.preventDefault();
      debounceSubmitSearch($(this).data('serialization'));
    });
  });
</script>
