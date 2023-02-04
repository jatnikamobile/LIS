<?php if(empty($data)): ?>
  <tr>
    <td colspan="100%" style="text-align: center; font-style: italic;">
      (Tidak ada data)
    </td>
  </tr>
<?php else: ?>
  <?php foreach ($data as $key => $l): ?>
    <tr data-notran="<?= $l->NoTran ?>">
      <td><?= $l->NoTran ?></td>
      <td><?= $l->NoLab ?></td>
      <td><?= $l->Regno ?></td>
      <td><?= $l->MedRec ?></td>
      <td><?= $l->Tanggal == null ? '' : date("d/m/Y", strtotime($l->Tanggal)) ?></td>
      <td><?= $l->Firstname ?></td>
      <td><?= $l->NMPoli ?></td>
      <td><?= $l->NmBangsal ?></td>
      <td><?= $l->NMKelas ?></td>
      <td>Rp. <?= number_format($l->TotalBiaya, 0, ',', '.') ?></td>
      <td><?= empty($l->MedRec) ? @$l->CatatanRegistrasi : $l->Address ?></td>
      <td>
        <a href="<?= site_url('billing/hapus/'.$l->NoTran) ?>" title="Hapus Billing" class="btn btn-minier btn-danger btn-round btn-delete">
          <i class="fa fa-trash"></i>
        </a>
		  <a target="_blank" href="<?php echo base_url('billing/type1/'.$l->NoTran);?>" class="btn btn-success btn-round btn-minier">
			  <i class="fa fa-print"></i>
		  </a>
		  <a target="_blank" href="<?php echo base_url('billing/type2/'.$l->NoTran);?>" class="btn btn-info btn-minier">
			  <i class="fa fa-print"></i>
		  </a>
        <a href="<?= site_url('billing/edit/'.$l->NoTran) ?>" title="Edit Billing" class="btn btn-minier btn-warning btn-round">
          <i class="fa fa-pencil"></i>
        </a>
      </td>
    </tr>
  <?php endforeach?>
<?php endif; ?>
