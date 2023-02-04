<table class="table table-bordered table-striped mb-0" id="detail-pemeriksaan">
    <thead>
        <tr class="info">
            <th>No Reg</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Asal Poli/Ruang</th>
            <th>Kategori</th>
            <th>Cara Bayar</th>
            <th>No Sep</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <td>LABORATORIUM</td>
        <?php foreach ($list['lab'] as $key => $l):?>
            <tr>
                <td><?=@$l->Regno?></td>
                <td><?=@$l->Medrec?></td>
                <td><?=@$l->Firstname?></td>
                <td><?=@$l->NMPoli?></td>
                <td><?=@$l->NmKategori?></td>
                <td><?=@$l->NMCbayar?></td>
                <td><?=@$l->NoSep?></td>
                <td><?=@$l->ValidUser?></td>
                <td>
                    <button class="btn btn-success btn-xs btn-round btn-print-sep" onclick="print_sep('<?=@$l->Regno?>')"><i class="fa fa-print"></i><br>SEP</button>
                    <a href="<?=base_url('registrasi/index?regno='.$l->Regno.'')?>" class="btn btn-warning btn-xs btn-round"><i class="fa fa-pencil"></i><br>Edit</a>
                    <a href="<?=base_url('billing/baru/'.$l->Regno.'')?>" class="btn btn-primary btn-xs btn-round"><i class="fa fa-folder"></i><br>Billing</a>
                </td>
            </tr>
        <?php endforeach?>
        <tr>
            <td>UGD</td>
        </tr>
        <?php foreach ($list['ugd'] as $key => $l):?>
            <tr>
                <td><?=@$l->Regno?></td>
                <td><?=@$l->Medrec?></td>
                <td><?=@$l->Firstname?></td>
                <td><?=@$l->NMPoli?></td>
                <td><?=@$l->NmKategori?></td>
                <td><?=@$l->NMCbayar?></td>
                <td><?=@$l->NoSep?></td>
                <td><?=@$l->ValidUser?></td>
                <td>
                    <button class="btn btn-success btn-xs btn-round btn-print-sep" onclick="print_sep('<?=@$l->Regno?>')"><i class="fa fa-print"></i><br>SEP</button>
                    <a href="<?=base_url('billing/baru/'.$l->Regno.'')?>" class="btn btn-primary btn-xs btn-round"><i class="fa fa-folder"></i><br>Billing</a>
                </td>
            </tr>
        <?php endforeach?>
        <td>RAWAT INAP</td>
        <?php foreach ($list['rawat_inap'] as $key => $l):?>
            <tr>
                <td><?=@$l->Regno?></td>
                <td><?=@$l->Medrec?></td>
                <td><?=@$l->Firstname?></td>
                <td><?=@$l->NmBangsal?>/<?=@$l->NMKelas?></td>
                <td><?=@$l->NmKategori?></td>
                <td><?=@$l->NMCbayar?></td>
                <td><?=@$l->nosep?></td>
                <td><?=@$l->ValidUser?></td>
                <td>
                    <a href="<?=base_url('billing/baru/'.$l->Regno.'')?>" class="btn btn-primary btn-xs btn-round"><i class="fa fa-folder"></i><br>Billing</a>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
<div class="modal fade modal-loading-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-loading-list">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-info">Memuat Data.. <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>
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
    function print_sep(regno) {
        let loading = $('.modal-loading');
        $.ajax({
            url:"<?=base_url('registrasi/print_sep')?>",
            type:"get",
            dataType:"html",
            data:{
                Regno: regno,
            },
            beforeSend(){
                loading.modal('show');
            },error: function(response){
                alert('Gagal, Silahkan coba lagi');
                loading.modal('hide');
            },
            success:function(data)
            { 
                loading.modal('hide');   
                $('#modalPrintSuratList').modal('show');
                $('#targetPrintList').html(data);
                setTimeout(function () {
                    $('#targetPrintList').printElement();
                }, 1000);
            }
        });
    }
</script>