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
</style>
<div class="header-title">
	<img class="logo" src="<?=base_url('assets/images/logobpjs1.png')?>" alt="LOGO BPJS">
	<div style="display: inline-block; vertical-align: top; text-align: center; padding-left: 50px;">
		<b>SURAT ELEGIBILITAS PESERTA</b><br>
		<b>RSAU ESNAWAN ANTARIKSA</b><br>
	</div>
</div>
<table style="width: 100%;">
	<tr><td>
		<table class="description-table" style="width: 100%;">
			<tbody>
				<tr>
					<td style="width: 1.2in;">No. SEP</td>
					<td>:</td>
					<td style="width: 70%;"><?= $data->NoSep ?></td>
				</tr>
				<tr>
					<td>Tgl. SEP</td>
					<td>:</td>
					<td><?= date('d/m/Y',strtotime($data->Regdate)) ?></td>
				</tr>
				<tr>
					<td>No. Kartu</td>
					<td>:</td>
					<td><?= $data->NoPeserta ?></td>
				</tr>
				<tr>
					<td>Nama Peserta</td>
					<td>:</td>
					<td><?= $data->Firstname ?></td>
				</tr>
				<tr>
					<td>Tgl. Lahir</td>
					<td>:</td>
					<td><?= date('d/m/Y',strtotime($data->Bod)) ?> Kelamin: <?= $data->Sex ?></td>
				</tr>
				<tr>
					<td>No. Telepon</td>
					<td>:</td>
					<td><?= $data->phone ?></td>
				</tr>
				<tr>
					<td>Poli Tujuan</td>
					<td>:</td>
					<td><?= $data->NMPoli ?></td>
				</tr>
				<tr>
					<td>Faskes Perujuk</td>
					<td>:</td>
					<td><?= $data->NmRujukan ?></td>
				</tr>
				<tr>
					<td>Diagnosa Awal</td>
					<td>:</td>
					<td><?= $data->KdIcd ?> <?= $data->DIAGNOSA ?></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td>:</td>
					<td><?= $data->Catatan ?></td>
				</tr>
			</tbody>
		</table>
	</td><td>
		<table class="description-table" style="width: 100%; top: 0;">
			<tbody>
				<tr>
					<td style="width: 1.2in;">Peserta</td>
					<td>:</td>
					<td style="width: 70%;"><?= $data->NmRefPeserta ?></td>
				</tr>
				<tr>
					<td><?= $data->Prolanis ?></td>
				</tr>
				<tr>
					<td style="width: 1.2in;">COB</td>
					<td>:</td>
					<td style="width: 70%;"><?= $data->kdcob == '0' ? 'Tidak': 'Ya' ?></td>
				</tr>
				<tr>
					<td>Jns Rawat</td>
					<td>:</td>
					<td><?= $data->NMTuju == 'Rawat Inap' ? 'Rawat Inap': 'Rawat Jalan' ?></td>
				</tr>
				<tr>
					<td>Kls Rawat</td>
					<td>:</td>
					<td><?= $data->NmKelas ?></td>
				</tr>
				<tr>
					<td>Penjamin</td>
					<td>:</td>
					<td><?= $data->NMJaminan ?></td>
				</tr>
				<tr>
					<td>*No Urut Poli</td>
					<td>:</td>
					<td><?= $data->NomorUrut ?></td>
				</tr>
				<tr>
					<td>*No.Reg/No.RM</td>
					<td>:</td>
					<td><?= $data->Regno ?> / <?= $data->Medrec ?></td>
				</tr>
				<tr>
					<td>*Nama Dokter</td>
					<td>:</td>
					<td><?= $data->NmDoc ?></td>
				</tr>
				<tr>
					<td>*Admin</td>
					<td>:</td>
					<td><?= $data->ValidUser ?></td>
				</tr>
			</tbody>
		</table>
	</td></tr>
</table>
<table style="width: 50%; text-align: center; position: absolute; right: 0;">
	<tbody>
		<tr>
			<td>Pasien / Keluarga Pasien</td>
			<td>Petugas BPJS Kesehatan</td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
<p style="padding-top: 20px;">* Saya Menyetujui BPJS Kesehatan Informasi Medis<br> Pasien jika diperlukan<br>
* SEP bukan sebagai bukti jaminan peserta</p>
<h5>CETAKAN KE : <?= $data->Nomor == '' ? '1' : $data->Nomor  ?> / <?= date("H:i j F Y") ?></h5>







