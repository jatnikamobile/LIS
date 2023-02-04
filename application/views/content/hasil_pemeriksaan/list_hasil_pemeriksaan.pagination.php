<?php
  $_input = $input;
  $_input['from_date'] = $input['from_date']->format('Y-m-d');
  $_input['to_date'] = $input['to_date']->format('Y-m-d');

	$base_serialization  = form_serialize($_input);
	$base_serialization .= $base_serialization ? '&' : '';
?>
<div class="pull-left">
  <ul class="pagination" data-serialization="<?= $base_serialization ?>">
    <?php
      $serialization = $base_serialization.'page='.$previous_page;
      $link = $previous_page
        ? site_url('hasilpemeriksaan/list_hasil_pemeriksaan?'.$serialization)
        : 'javascript:;';
      $disabled = $previous_page === FALSE ? 'disabled' : '';
    ?>
    <li class="<?= $disabled ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>">
        <i class="ace-icon fa fa-chevron-left"></i>
      </a>
    </li>

    <?php foreach($paging as $page): ?>
    <?php
      $serialization = $base_serialization.'page='.$page;
      $link = site_url('hasilpemeriksaan/list_hasil_pemeriksaan?'.$serialization);
      $active = $current_page == $page ? 'active' : '';
    ?>

    <li class="<?= $active ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>"><?= $page ?></a>
    </li>
    <?php endforeach; ?>

    <?php

      $serialization = $base_serialization.'page='.$next_page;
      $link = $next_page
        ? site_url('hasilpemeriksaan/list_hasil_pemeriksaan?'.$serialization)
        : 'javascript:;';
      $disabled = $next_page === FALSE ? 'disabled' : '';
    ?>
    <li class="<?= $disabled ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>">
        <i class="ace-icon fa fa-chevron-right"></i>
      </a>
    </li>
  </ul>
</div>
<div class="pull-right">
  <b style="margin: 20px 0; display: block;">Jumlah Pasien: <?= $count ?></b>
</div>