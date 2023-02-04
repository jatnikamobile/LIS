<?php if(empty($data)): ?>
  <tr>
    <td colspan="100%" style="text-align: center; font-style: italic;">
      (Tidak ada data)
    </td>
  </tr>
<?php else: ?>
  <?php foreach ($data as $item): ?>
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
      <td>
        <div class="pull-right">
          <?php if(in_array($item->Instalasi, ['R. Jalan', 'IGD'])): ?>
          <button class="btn btn-success btn-minier btn-round btn-print-sep">
            <i class="fa fa-print"></i> SEP
          </button>
          <?php endif; ?>
          <?php if($item->Instalasi == 'R. Jalan'): ?>
          <a href="<?= base_url('registrasi/index?regno='.$item->Regno) ?>" class="btn btn-warning btn-minier btn-round">
            <i class="fa fa-pencil"></i> Edit
          </a>
          <?php endif; ?>
          <?php if(empty($item->NoTran)): ?>
          <a href="<?= base_url('billing/baru/'.$item->Regno) ?>" class="btn btn-primary btn-minier btn-round">
            <i class="fa fa-folder"></i> Billing
          </a>
          <?php else: ?>
          <a href="<?= base_url('billing/edit/'.$item->NoTran) ?>" class="btn btn-primary btn-minier btn-round">
            <i class="fa fa-folder"></i> Billing
          </a>
          <?php endif; ?>
        </div>
      </td>
    </tr>
  <?php endforeach?>
<?php endif; ?>