<table class="table table-bordered">
	<thead>
		<tr class="info">
			<th style="text-align:center;">NoTran</th>
            <th style="text-align:center;">Regno</th>
			<th style="text-align:center;">Tanggal</th>
			<th style="text-align:center;">Firstname</th>
			<th style="text-align:center;">NoLab</th>
			<th style="text-align:center;">Kelas</th>
			<th style="text-align:center;">Ruang</th>
			<th style="text-align:center;">Poli</th>
            <th style="text-align:center;">Jumlah Biaya</th>
            <th style="text-align:center;">User</th>
            <th style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
    <?php foreach($list as $key=> $d):?>
        <tr>
            <td class="no-p"><?= @$d->NoTran ?></td>
            <td class="no-p"><?= @$d->Regno ?></td>
            <td class="no-p"><?= date('d-F-Y', strtotime(@$d->Tanggal)) ?></td>
            <td class="no-p"><?= @$d->Firstname ?></td>
            <td class="no-p"><?= @$d->NoLab ?></td>
            <td class="no-p"><?= @$d->NmKelas ?></td>
            <td class="no-p"><?= @$d->NmBangsal ?></td>
            <td class="no-p"><?= @$d->NMPoli ?></td>
            <td class="no-p">Rp. <?= @number_format($d->TotalBiaya,2,',','.') ?></td>
            <td class="no-p"><?= @$d->ValidUser ?></td>
            <td class="no-p">
                <button id="btnRemove" class="btn btn-danger btn-xs btn-round" onclick="removeTransaksi('<?=@$d->NoTran?>')"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    <?php endforeach;?>
	</tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        console.log('Have a nice day:) by Mediantara');
    });

    function removeTransaksi(notran) {
        $.ajax({
            url:"<?= base_url('billingpemeriksaan/delete_transaksi')?>",
            type:'POST',
            data:{notran: notran},
            success:function(response){
                console.log(response);
                $('#searchList').submit();
            }
        });
    }
</script>