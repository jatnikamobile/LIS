<?php foreach($list_detail as $item): ?>
  <?php if($type == 'group'): ?>
  <tr class="group-tindakan" style="cursor: pointer;" data-kode="<?= $item->KDGroup ?>" data-nama="<?= $item->NmGroup ?>">
    <td><?= $item->KDGroup ?></td>
    <td><?= $item->NmGroup ?></td>
  <?php else: ?>
  <tr class="detail-tindakan" style="cursor: pointer;" data-kode="<?= $item->KDDetail ?>" data-nama="<?= $item->NMDetail ?>">
    <td><?= $item->KDDetail ?></td>
    <td><?= $item->NMDetail ?></td>
  <?php endif; ?>
  </tr>
<?php endforeach; ?>