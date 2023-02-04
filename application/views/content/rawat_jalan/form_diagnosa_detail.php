<table class="table table-bordered">
	<thead>
		<tr class="info">
			<!-- <th style="text-align:center;">No</th> -->
			<th style="text-align:center;">Kode ICD</th>
			<th style="text-align:center;">Kode DTD</th>
			<th style="text-align:center;width:30%">Diganosa</th>
			<th style="text-align:center;">Kode TDK</th>
			<th style="text-align:center;width:30%">Tindakan</th>
			<th style="text-align:center;">Kasus</th>
			<th style="text-align:center;"></th>
		</tr>
	</thead>
	<tbody>
    <?php $totalTagihan = 0;foreach($dataDetail as $key=>$d): 
        $label = $key == 0 ? 'warning' : '';
    ?>
        <tr class="<?=$label?>">
            <td class="no-p"><?= @$d['KdICD'] ?></td>
            <td class="no-p"><?= @$d['KdDTD'] ?></td>
            <td class="no-p"><?= @$d['Diagnosa'] ?></td>
            <td class="no-p"><?= @$d['KdTDK'] ?></td>
            <td class="no-p"><?= @$d['Tindakan'] ?></td>
            <td class="no-p"><?= @$d['Kasus'] ?> </td>
            <td class="no-p">
                <button id="btnRemove" class="btn btn-danger btn-sm" onclick="removeDataDiagnosa(this,'<?=$key?>','removeDetail')"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    <?php endforeach;?>
	</tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
    });

</script>