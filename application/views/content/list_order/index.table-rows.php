<?php if(empty($data)): ?>
  <tr>
    <td colspan="100%" style="text-align: center; font-style: italic;">
      (Tidak ada data)
    </td>
  </tr>
<?php else: ?>
  <?php foreach ($data as $item): ?>
    <tr data-notran="<?= $item->NoTran ?>">
      <td><?= $item->NoTran ?></td>
      <td><?= $item->NoLab ?></td>
      <td><?= $item->Regno ?></td>
      <td><?= $item->Medrec ?></td>
      <td><?= date('d/m/Y', strtotime($item->TglSampel)) ?></td>
      <td><?= $item->Firstname ?></td>
      <td><?= $item->NmKategori ?></td>
      <td><?= $item->Instalasi ?></td>
      <td>
        <?php if(!empty($item->NmPoli) && !empty($item->NmBangsal)): ?>
          <?= $item->NmPoli ?> / <?= $item->NmBangsal ?>
        <?php elseif(!empty($item->NmPoli)): ?>
          <?= $item->NmPoli ?>
        <?php elseif(!empty($item->NmBangsal)): ?>
          <?= $item->NmBangsal ?> (<?= $item->nokamar?> - <?= $item->NoTTidur?>)
        <?php endif; ?>
      </td>
      <td><?= $item->NmKelas ?></td>
      <td><?= $item->Address ?></td>
      <td><?= $item->Catatan ?></td>
      <td><?php if($item->Tanda != 1){echo 'Sudah Billing';} ?></td>
      <td>
        <div class="pull-right">
        	<button class="btn btn-round btn-minier btn-danger btn-delete" onclick="hapus('<?=$item->NoTran?>')">
        		<i class="fa fa-trash"></i> Hapus
        	</button>
        	<a class="btn btn-round btn-minier btn-primary" href="<?= site_url('billing/edit/'.$item->NoTran) ?>">
        		<i class="fa fa-folder-open"></i> Billing
        	</a>
          <button class="btn btn-round btn-minier btn-warning" onclick="print_order('<?=$item->NoTran?>')">
            <i class="fa fa-print"></i> Print Order
          </button>
        </div>
      </td>
    </tr>
  <?php endforeach?>
<?php endif; ?>

<script>
  function print_order(notrans){
    window.open("<?= site_url('list_order/print_order?notrans=')?>"+notrans);
  }
</script>