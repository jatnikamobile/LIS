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
<h4 class="rincian"><b>Rincian Biaya Pemeriksaan Laboratorium</b></h4>
<table style="width: 100%;">
	<tr><td>
		<table class="description-table" style="width: 100%;">
			<tbody>
				<tr>
					<td style="width: 1.2in;">No. RM</td>
					<td>:</td>
					<td style="width: 70%;"><?php echo $register->Medrec;?></td>
				</tr>
				<tr>
					<td>Nama Pasien</td>
					<td>:</td>
					<th><?php echo $register->Firstname;?></th>
				</tr>
				<tr>
					<td>Umur / J.Kel</td>
					<td>:</td>
					<td><?php echo $register->usia;?> <?php echo $register->KdSex == 'P' ? 'Perempuan': 'Laki-laki'?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</td><td>
		<table class="description-table" style="width: 100%; top: 0;">
			<tbody>
				<tr>
					<td style="width: 1.2in;">Penjamin</td>
					<td>:</td>
					<td style="width: 70%;"><?php echo $register->NMCbayar;?></td>
				</tr>
				<tr>
					<td>Poli/Ruang/Kelas</td>
					<td>:</td>
					<td><?php echo $register->NmBangsal;?></td>
				</tr>
				<tr>
					<td>Unit Pelayanan</td>
					<td>:</td>
					<td><?php echo $register->NMPoli;?></td>
				</tr>
			</tbody>
		</table>
	</td></tr>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>Tanggal</td>
			<td>Dokter Pengirim</td>
			<td>Nama Pemeriksa</td>
			<td>Harga</td>
		</tr>
	</thead>
	<tbody>
		<?php $total = 0;?>
		<?php foreach ($billing->list_detail as $detail):?>
			<tr>
				<td><?php echo date('d M Y', strtotime($detail->Tanggal));?></td>
				<td><?php echo $detail->NmDoc;?></td>
				<td><?php echo $detail->NmTarif?></td>
				<td class="text-right"><?php echo money_format($detail->JumlahBiaya)?></td>
			</tr>
		<?php $total += $detail->JumlahBiaya;?>
		<?php endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td class="text-right" colspan="3">Total</td>
			<td class="text-right"><?php echo money_format($total);?></td>
		</tr>
	</tfoot>
</table>
<div class="row">
	<div class="col-md-9"></div>
	<div class="col-md-3">
		<div class="tandatangan" style="text-align: center">
			<p><b>Penanggung Jawab</b></p>
			<p><b>(doktter)</b></p>
		</div>
	</div>
</div>







