<style type="text/css">
	* {
		font-size: 10pt;
	}
	.header-title {
		padding: 5pt;
		font-family: Helvetica;
	}

	.logo {
		text-align: left;
		display: inline-block;
		vertical-align: top;
		padding: 0 1pt;
		width: 30%;
		height: 30px;
		display:visible;
	}

	.qrcode{
		display: inline-block;
		vertical-align: top;
		width: 100px;
		height: 100px;
	}

	.bold-center {
		font-weight: bold;
		text-align: center;
	}

	.bold-center {
		font-weight: bold;
		text-align: center;
	}

	.description-table td {
		margin: 0;
		padding: 0;
		vertical-align: top;
	}

	.half-split {
		display: inline-block;
		width: 45%;
	}

	.detail-table {
		width: 100%;
		border-collapse: collapse;
	}

	.detail-table th {
		border: 1pt solid black;
		text-align: center;
	}

	.detail-table td {
		border-bottom: 1pt dotted black;
		border-left: 1pt solid black;
		border-right: 1pt solid black;
	}

	.detail-table th,
	.detail-table td {
		padding: 3pt 5pt;
	}

	.signature {
		display: inline-block;
		text-align: center;
		vertical-align: top;
		padding: 0;
		margin: 0;
	}
	h4{
		margin: 20px 0px 10px 200px;
		font-size: 10px;
	}
	table{
		margin-top: 20px;
		font-size: 10px;
	}

</style>
<div class="row">
	<div class="col-md-12">
		<div class="header-title">
			<div style="display: inline-block; vertical-align: top; text-align: center; padding-left: 50px;">
				<b>DINAS KESEHATAN PROV. KEP. RIAU</b><br>
				<b><?php echo INST_NAME?></b><br>
			</div>
		</div>
	</div>
</div>

<h4 class="rincian"><b>Laporan Dari <?php echo $input['from_date']->format('d M Y');?> Sampai <?php echo $input['to_date']->format('d M Y');?></b></h4>
<table class="table table-bordered">
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
		</tr>
	</thead>
	<tbody>
	<?php foreach ($page_list->data as $item): ?>
		<tr data-regno="<?= $item->Regno ?>">
			<td><?= $item->Regno ?></td>
			<td><?= $item->Medrec ?></td>
			<td><?= date('d/m/Y', strtotime($item->Regdate)) ?></td>
			<td><?= $item->Firstname ?></td>
			<td><?= $item->NmKategori ?></td>
			<td><?= $item->Instalasi ?></td>
			<td>
				<?php if(!empty($item->NmPoli) && !empty($item->NmBangsal)): ?>
					<?= $item->NmPoli ?> / <?= $item->NmBangsal ?>
				<?php elseif(!empty($item->NmPoli)): ?>
					<?= $item->NmPoli ?>
				<?php elseif(!empty($item->NmBangsal)): ?>
					<?= $item->NmBangsal ?>
				<?php endif; ?>
			</td>
			<td><?= $item->NmKelas ?></td>
			<td><?= $item->Address ?></td>
			<td><?= $item->Catatan ?></td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>







