<link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
<style type="text/css">
	*{
          font-family: Arial, Helvetica, sans-serif;
          font-size: 14px;
    }

    .top-header {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        text-align: left;
        width: 220pt;
        margin-bottom: 25px;
    }

    .box1 {
    	padding: 5px;
    	border-radius: 5px;
    	height: 150px;
    }

    .box2 {
    	padding: 5px;
    	border-radius: 5px;
    	height: 150px;
    }

    #tablePemeriksaan {
    	width: 95%;
    }
</style>
<div class="top-header">
    DINAS KESEHATAN PROV. KEP. RIAU<br>
    <u>RSUD RAJA AHMAD TABIB</u>
</div>
<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<center><h4><u>Rincian Biaya Pemeriksaan Laboratorium</u></h4></center>
					<div class="col-xs-6">
						<div class="box1">
							<table>
								<tr>
									<td>Nomor RM</td>
									<td>:</td>
									<td><?= @$head->MedRec ?></td>
								</tr>
								<tr>
									<td>Nama Pasien</td>
									<td>:</td>
									<td><b><?= @$head->Firstname ?></b></td>
								</tr>
								<tr>
									<td>Umur/J. Kelamin</td>
									<td>:</td>
									<td><?= @$head->UmurThn?> TH <?= @$head->UmurBln ?> BLN <?= @$head->UmurHari ?> / <?= @$head->Sex ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="box2">
							<table>
								<tr>
									<td>Penjamin</td>
									<td>:</td>
									<td><?= @$head->NmKategori ?></td>
								</tr>
								<tr>
									<td>Poli/Ruang</td>
									<td>:</td>
									<td><?= @$head->KdBangsal == '' ? @$head->NMPoli : @$head->NmBangsal.'/'.@$head->NMkelas ?></td>
								</tr>
								<tr>
									<td>Unit Pelayanan</td>
									<td>:</td>
									<td><?= @$head->KdTuju == 'RI' ? 'Rawat Inap' : 'Rawat Jalan' ?></td>
								</tr>
								<tr>
									<td>Dokter Pengirim</td>
									<td>:</td>
									<td><?= @$head->NmDoc ?> / <?= date("d-m-Y", strtotime(@$head->RegDate)) ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="top-header" style="margin-top: 25px;">
					</div>
					<div class="data-pemeriksaan">
						<table id="tablePemeriksaan">
							<thead style="border-top: 1px black solid; border-bottom: 1px black solid;">
								<tr>
									<th><b>Nama Pemeriksaan</b></th>
									<th><b>Harga</b></th>
								</tr>
							</thead>
							<tbody style="border-bottom: 1px black solid;">
								<?php foreach ($detail as $key => $l):?>
						            <tr>
						                <td><?= @$l->NmTarif ?></td>
						                <td>Rp. <?= @number_format($l->JumlahBiaya,2,',','.') ?></td>
						            </tr>
						        <?php endforeach?>
							</tbody>
							<tfoot>
								<tr>
						        	<td>Sub Total</td>
						        	<td>Rp. <?= @number_format($head->TotalBiaya,2,',','.') ?></td>
						        </tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>