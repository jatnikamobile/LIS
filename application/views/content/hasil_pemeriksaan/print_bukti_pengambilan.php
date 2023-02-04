<link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
<style type="text/css">
	*{
          font-family: Arial, Helvetica, sans-serif;
          font-size: 18px;
    }

    .top-header {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        text-align: left;
        width: 300pt;
        margin-bottom: 25px;
    }

    .box1 {
    	border: 1px solid black;
    	padding: 5px;
    	border-radius: 5px;
    }
</style>
<div class="top-header">
    <p>DINAS KESEHATAN PROV. KEP. RIAU<br>
    <u>RSUD RAJA AHMAD TABIB</u></p>
</div>
<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12" style="border-top: 1px solid black;">
					<center><h2><b>BUKTI PENGAMBILAN HASIL LABORATORIUM</b></h2></center>
					<div class="col-xs-12">
						<div class="box1">
							<table style="width: 100%; margin: 1px;">
								<tr>
									<td style="border-right: 1px solid black; width: 20%;">1. Benar Pasien</td>
									<td style="padding-left: 10px; width: 20%;">No. RM/No.Lab</td>
									<td>:  <?= @$data->MedRec ?> / <?= @$data->NoLab ?></td>
								</tr>
								<tr>
									<td style="border-right: 1px solid black;">2. Benar Dokter</td>
									<td style="padding-left: 10px; width: 20%;">Nama Pasien</td>
									<td>:  <b><?= @$data->Firstname ?></b></td>
								</tr>
								<tr>
									<td style="border-right: 1px solid black;">3. Benar Sample</td>
									<td style="padding-left: 10px; width: 20%;">Tanggal Pemeriksaan</td>
									<td>:  <?= date("d-m-Y", strtotime(@$data->Tanggal)) ?>/<?= date("H:i", strtotime(@$data->Jam)) ?></td>
								</tr>
								<tr>
									<td style="border-right: 1px solid black;">4. Benar Hasil</td>
									<td style="padding-left: 10px; width: 20%;">Dokter Pengirim</td>
									<td>:  <b><?= @$data->NmDoc ?></b></td>
								</tr>
							</table>
						</div>
					</div>
					<p><b><i>*  Mohon serahkan bukti pengambilan hasil ini pada saat pengambilan hasil Laboratorium <br>
					*  Kami tidak bertanggung jawab atas kehilangan hasil yang tidak diambil dalam waktu 1 bulan sejak<br>
					tanggal pemeriksaan</i></b></p>
				</div>
			</div>
		</div>
	</div>
</div>