<div class="col-sm-12 col-md-12 col-lg-12">
    <hr style="margin:10px 0;padding:0;">
    <b>Riwayat Tindakan</b>
    <hr style="margin-bottom:10px 0;padding:0;clear:both">
</div>
<table class="table table-bordered">
	<thead>
		<tr class="info">
			<th style="text-align:center;">No. Transaksi</th>
			<th style="text-align:center;">Kode Tarif</th>
			<th style="text-align:center;width:40%">Ketrangan</th>
			<th style="text-align:center;">Dokter</th>
			<th style="text-align:center;">Poli</th>
			<th style="text-align:center;">Qty</th>
			<th style="text-align:center;">Sarana</th>
			<th style="text-align:center;">Pelayanan</th>
			<th style="text-align:center;">Jumlah Biaya</th>
			<th style="text-align:center;"></th>
		</tr>
	</thead>
	<tbody>
    <?php $cek = '';$totalTagihan = 0;foreach($detailRiwayat as $key=>$d):
    if(isset($d['JumlahBiaya'])){
        $totalTagihan += $d['JumlahBiaya'];
    }else{
        $totalTagihan += $d['Tarif'];
    }
    ?>
        <tr>
            <td class="no-p"><?= @$d['Notran'] ?></td>
            <td class="no-p"><?= @$d['KdTarif'] ?></td>
            <td class="no-p"><?= @$d['NmTarif'] ?></td>
            <td class="no-p"><?= @$d['KdDoc'] ?></td>
            <td class="no-p"><?= @$d['KdPoli'] ?></td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Qty'],1,',','.') ?></td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Sarana'],2,',','.') ?> </td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Pelayanan'],2,',','.') ?> </td>
            <td class="no-p" style="text-align:right;"><?= @number_format(isset($d['JumlahBiaya']) ? $d['JumlahBiaya'] : $d['Tarif'],2,',','.') ?></td>
            <td>
                <?php if ($d['StatusKasir'] > 0):?>
                    <span class="no-p alert alert-success">Sudah Dibayar<span>
                <?php else:?>
                    <?php if($cek != $d['Notran']):
                        $cek = $d['Notran'];
                    ?>
                        <button id="btnEditTrnBiling" class="btn btn-info btn-sm" onclick="get_form_biling('<?=$regno?>','<?=$d['Kategori']?>','<?=$d['Notran']?>')"><i class="fa fa-pencil"></i></button>
                        <button id="btnHapusTrnBiling" class="btn btn-danger btn-sm" onclick="hapusDataTindakan('<?=$regno?>','<?=$d['Notran']?>')"><i class="fa fa-trash"></i></button>
                    <?php endif?>
                <?php endif;?>
            </td>
        </tr>
    <?php endforeach;?>
	</tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
    });

</script>
<div class="col-sm-12 col-md-12 col-lg-12">
    <hr style="margin:10px 0;padding:0;">
</div>