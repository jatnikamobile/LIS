<?php $total_semua = 0; ?>
<table class="table table-bordered table-striped mb-0" id="billing-pasien">
    <thead>
        <tr class="info">
            <th>No</th>
            <th>Waktu Diinput</th>
            <th>Pemeriksaan</th>
            <th>Sarana</th>
            <th>Pelayanan</th>
            <th>Biaya</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;foreach ($detail as $key => $l):?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-F-Y', strtotime(@$l->Tanggal)).' '.date('h:i', strtotime(@$l->Jam))?></td>
                <td><?=@$l->NmTarif?></td>
                <td><?=@$l->Sarana?></td>
                <td><?=@$l->Pelayanan?></td>
                <td><?=@$l->JumlahBiaya?> <?php $total_semua += @$l->JumlahBiaya ?></td>
                <td><a href="#" class="btn btn-xs btn-danger btndeletePemeriksaan" onclick="deletepemeriksaan(this.id)" id="<?= @$l->KdTarif ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
<div class="col-sm-12">
    <div class="pull-right">
        <div class="col-sm-3">
            <span>Jumlah Biaya: </span>
            <input type="text" name="jumlah_biaya" id="jumlah_biaya" readonly>
            <input type="hidden" name="total" id="total" value="<?= $total_semua?>"><br>
            <!-- <button type="button" class="btn btn-success btn-xs btn-round" id="btnSaveBilling"><i class="fa fa-save"></i>  Simpan</button> -->
            
        </div>
    </div>
        <a href="" class="btn btn-warning btn-xs btn-round"><i class="fa fa-check"></i>Baru</a>
        <button type="button" class="btn btn-primary btn-xs btn-round" id="btnPrintLabel"><i class="fa fa-print"></i>  Cetak Label</button>
        <a href="<?= base_url('hasilpemeriksaan/show_pemeriksaan/'.$notran.'') ?>" class="btn btn-success btn-xs btn-round"><i class="fa  fa-check-circle-o"></i>  Isi Pemeriksaan</a>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#jumlah_biaya').val(convertToRupiah(<?= $total_semua?>));
        if ($('#NoTran').val() != '') {
            update_total_biaya($('#NoTran').val());
        }
    });

    function deletepemeriksaan(kdtarif) {
        $.ajax({
            url:"<?=base_url('billingpemeriksaan/delete_one_billing')?>",
            type:'POST',
            data:{
                NomorTransaksi: $('#NoTran').val(), 
                Total: $('#total').val(),
                KdTarif: kdtarif
            },
            success:function(resp){
                console.log(resp);
                
                billingPemeriksaanPasien($('#NoTran').val());
                // $('#btnCari').click();
            }
        });
    }

    function update_total_biaya(notran) {
        $.ajax({
            url:"<?=base_url('billingpemeriksaan/update_total_biaya')?>",
            type:'POST',
            data:{
                NomorTransaksi:notran, 
                Total: $('#total').val()
            },
            success:function(resp){
                console.log(resp);
                
                // billingPemeriksaanPasien($('#NoTran').val());
                // $('#btnCari').click();
            }
        });
    }
</script>