<table class="table table-bordered">
	<thead>
		<tr class="info">
			<!-- <th style="text-align:center;">No</th> -->
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
    <?php $totalTagihan = 0;foreach($dataDetail as $key=>$d): 
    if(isset($d['JumlahBiaya'])){
        $totalTagihan += $d['JumlahBiaya'];
    }else{
        $totalTagihan += $d['Tarif'];
    }
    ?>
        <tr>
            <td class="no-p"><?= @$d['KdTarif'] ?></td>
            <td class="no-p"><?= @$d['NmTarif'] ?></td>
            <td class="no-p"><?= @$d['KdDoc'] ?></td>
            <td class="no-p"><?= @$d['KdPoli'] ?></td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Qty'],1,',','.') ?></td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Sarana'],2,',','.') ?> </td>
            <td class="no-p" style="text-align:right;"><?= @number_format($d['Pelayanan'],2,',','.') ?> </td>
            <td class="no-p" style="text-align:right;"><?= @number_format(isset($d['JumlahBiaya']) ? $d['JumlahBiaya'] : $d['Tarif'],2,',','.') ?></td>
            <td class="no-p">
                <button id="btnRemove" class="btn btn-danger btn-sm" onclick="removeDataBiling(this,'<?=$key?>','removeDetail')"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    <?php endforeach;?>
	</tbody>
</table>
<input type="hidden" name="totalRincian" id="totalRincian" value="<?=$totalTagihan?>">

<script type="text/javascript">
    $(document).ready(function(){
        $("#JumlahBiaya").val($("#totalRincian").val());
        $("#TotalTagihan").val($("#totalRincian").val());
        // terbilang($("#TotalTagihan").val());
    });

</script>