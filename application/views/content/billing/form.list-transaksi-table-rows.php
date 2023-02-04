<?php if(empty($list_transaksi)): ?>
  <tr>
    <td colspan="100%" style="font-style: italic; text-align: center;">(Belum ada Transaksi)</td>
  </tr>
<?php else: ?>
<?php foreach($list_transaksi as $item): ?>
  <tr style="cursor: pointer;" data-notran="<?= $item->NoTran ?>">
    <td><?= $item->NoTran ?></td>
    <td><?= date('d/m/Y', strtotime($item->Tanggal)) ?></td>
    <td><?= date('H:i:s', strtotime($item->Jam)) ?></td>
  </tr>
<?php endforeach; ?>
<tr style="cursor: pointer;" data-notran="">
  <td colspan="100%" style="font-style: italic; text-decoration: underline;">Transaksi baru</td>
</tr>
<?php endif; ?>