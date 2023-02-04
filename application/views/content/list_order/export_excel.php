<?php 
// header("Content-type: application/vnd-ms-excel");

// header("Content-Disposition: attachment; filename=OrderLab".$tgl_awal."-".$tgl_akhir.".xls");

// header("Pragma: no-cache");

// header("Expires: 0");
 ?>



 <link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
<style type="text/css">
  *{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
  }

  .top-header {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-align: left;
    width: 220pt;
    margin-bottom: 15px;
  }

  .box1 {
    padding: 5px;
    border: 1px solid black;
    border-radius: 5px;
    height: 135px;
  }

  .box2 {
    padding: 5px;
    border: 1px solid black;
    border-radius: 5px;
    height: 135px;
  }

  #tablePemeriksaan {
    width: 95%;
    border-bottom: 1px black solid;
  }

  .data-tambahan {
    height: 300px;
  }

  .data-tambahan2 {
    height: 100px;
  }

  .desc-table td {
    vertical-align: top;
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
        </div>
        <div class="col-lg-12" style="margin-top: 50px;">
          	<div style="text-align: center;">
	            <h3>LIST ORDER LAB</h3>
	            <h5><?=$tgl_awal?> - <?=$tgl_akhir?></h5>
	            <?php if ($instalasi == 2): ?>
	             	<h5>RAWAT INAP</h5>
	            <?php else: ?>
	             	<h5>RAWAT JALAN</h5>
	            <?php endif ?>
            </div>
    <?php if ($instalasi == 2): ?>
    		<div class="data-pemeriksaan">
             <table class="table table-bordered table-striped mb-0">
			 		<thead>
			            <tr>
			              <th style="width: 110px;">No. Registrasi</th>
			              <th style="width: 70px;">No. RM</th>
			              <th>Tgl. Order</th>
			              <th>Tgl. Ambil Sampel</th>
			              <th>Pengambil Sampel</th>
			              <th>Nama (Umur)</th>
			              <th>Ruang</th>
			              <th>Diagnosa</th>
			              <th>Dokter</th>
			              <th>Alamat</th>
			              <th>Catatan</th>
			              <th style="width: 150px;">Tindakan</th>
			              <th >User dan Jam Order</th>
			              <th >KET</th>
			            </tr>
		          </thead>
			 	<tbody>
			 		<?php if(empty($data)): ?>
					  <tr>
					    <td colspan="100%" style="text-align: center; font-style: italic;">
					      (Tidak ada data)
					    </td>
					  </tr>
					<?php else: ?>
    					<?php $ruang=''; foreach ($data as $item): ?>
    						<?php if ($ruang != $item->ruang) { ?>
								<tr><td colspan="13" style="color: red; font-weight: bold;"><?=$item->ruang?></td></tr>	
    						<?php } ?>
							    <tr data-notran="<?= $item->NoTran ?>">
							      <!-- <td><?= $item->NoTran ?></td> -->
							      <td><?= $item->Regno ?></td>
							      <td><?= $item->Medrec ?></td>
							      <td><?= date('d/m/Y', strtotime($item->Tanggal)) ?></td>
							      <td><?= (isset($item->TglSampel)) ? date('d/m/Y', strtotime($item->TglSampel)) : '' ?></td>
							      <td><?= (isset($item->Pengambil_sampel)) ? $item->Pengambil_sampel : '' ?></td>
							      <td><?= $item->Firstname ?></td>
							      <!-- <td>R. Inap</td> -->
							      <td>
							          <?= $item->NmBangsal ?> (<?= $item->nokamar?> - <?= $item->NoTTidur?>)
							      </td>
							      <!-- <td><?= $item->NmKelas ?></td> -->
							      <td><?= $item->Diagnosa ?></td>
							      <td><?= $item->NmDocRS ?></td>
							      <td><?= $item->Address ?></td>
							      <td><?= $item->Catatan ?></td>
							      <td>
							      	<table>
							      		<?php foreach ($item->detail as $row ) {?>
							      			<tr><td><?=$row->NmTarif?></td></tr>
							      		<?php } ?>
							      	</table>
							      </td>
							      <td><?= substr($item->Validuser, 0, strlen($item->Validuser) - 20) ?> (<?= substr($item->Tanggal,0,10) ?> <?= substr($item->Jam,11,8) ?> )</td>
							      <td><?php if($item->Tanda != 1){
							      	echo 'SUDAH BILLING'; 
							      } ?> <br> Cetak Order pada <?= substr($item->TglCetakOrder,0,19) ?> </td>
							    </tr>
							    <?php $ruang = $item->ruang ?>
					  <?php endforeach?>
					<?php endif; ?>
			 	</tbody>	
			 </table>
          	</div>
    <?php else: ?>
    	<div class="data-pemeriksaan">
            <table class="table table-bordered table-striped mb-0">
			 		<thead>
			            <tr>
			              <th style="width: 110px;">No. Registrasi</th>
			              <th style="width: 70px;">No. RM</th>
			              <th>Tgl. Order</th>
			              <th>Nama </th>
			              <th>Poli</th>
			              <th>Diagnosa</th>
			              <th>Dokter</th>
			              <th>Alamat</th>
			              <th>Catatan</th>
			              <th style="width: 150px;">Tindakan</th>
			              <th >User dan Jam Order</th>
			              <th >KET</th>
			            </tr>
		          </thead>
			 	<tbody>
			 		<?php if(empty($data)): ?>
					  <tr>
					    <td colspan="100%" style="text-align: center; font-style: italic;">
					      (Tidak ada data)
					    </td>
					  </tr>
					<?php else: ?>
    					<?php $poli=''; foreach ($data as $item): ?>
    						<?php if ($poli != $item->poli) { ?>
								<tr><td colspan="13" style="color: red; font-weight: bold;"><?=$item->poli?></td></tr>	
    						<?php } ?>
							    <tr data-notran="<?= $item->NoTran ?>"> 
							      <!-- <td><?= $item->NoTran ?></td> -->
							      <td><?= $item->Regno ?></td>
							      <td><?= $item->Medrec ?></td>
							      <td><?= date('d/m/Y', strtotime($item->Tanggal)) ?></td>
							      <td><?= $item->Firstname ?></td>
							      <!-- <td>R. Jalan</td> -->
							      <td>
							          <?= $item->NmPoli ?>
							      </td>
							      <td><?= $item->Diagnosa ?></td>
							      <td><?= $item->NmDoc ?></td>
							      <td><?= $item->Address ?></td>
							      <td><?= $item->Catatan ?></td>
							      <td>
							      	<table>
							      		<?php foreach ($item->detail as $row ) {?>
							      			<tr><td><?=$row->NmTarif?></td></tr>
							      		<?php } ?>
							      	</table>
							      </td>
							      <td><?= substr($item->Validuser, 0, strlen($item->Validuser) - 20) ?> (<?= substr($item->Tanggal,0,10) ?> <?= substr($item->Jam,11,8) ?> )</td>
							      <td><?php if($item->Tanda != 1){
							      	echo 'SUDAH BILLING'; 
							      } ?> <br> Cetak Order pada <?= substr($item->TglCetakOrder,0,19) ?> </td>
							    </tr>
							    <?php $poli = $item->poli ?>
					  <?php endforeach?>
					<?php endif; ?>
			 	</tbody>	
			</table>
        </div>
    <?php endif ?>
          
        </div>
      </div>
    </div>
  </div>
</div>
