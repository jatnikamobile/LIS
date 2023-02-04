<?php if(empty($list_detail)): ?>
  <tr>
    <td style="font-style: italic; text-align: center;" colspan="100%">
      (Tidak ada data)
    </td>
  </tr>
<?php else: ?>
  <?php $no = $last_number ?? 0; foreach($list_detail as $item): ?>
    <tr data-kode_tarif="<?= $item->KdTarif ?>" data-nomor="<?= ++$no ?>">
      <td><?= $no ?>.</td>
      <td><?= date('d/m/Y - H:i:s', strtotime($item->Tanggal)) ?></td>
      <td><?= $item->NmTarif ?></td>
      <td>Rp. <?= number_format($item->Sarana, 0, ',', '.') ?></td>
      <td>Rp. <?= number_format($item->Pelayanan, 0, ',', '.') ?></td>
      <td>Rp. <?= number_format($item->JumlahBiaya, 0, ',', '.') ?></td>
      <td>
        <button class="btn btn-minier btn-danger btn-round btn-delete">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
  <?php endforeach; ?>
<?php endif; ?>