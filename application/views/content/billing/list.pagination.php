<?php
  $_input = $input;
  $_input['from_date'] = $input['from_date']->format('Y-m-d');
  $_input['to_date'] = $input['to_date']->format('Y-m-d');

	$base_serialization  = form_serialize($_input);
	$base_serialization .= $base_serialization ? '&' : '';
?>
<div class="pull-right">
  <ul class="pagination" data-serialization="<?= $base_serialization ?>">
    <?php
      $serialization = $base_serialization.'page='.$previous_page;
      $link = $previous_page
        ? site_url('billing?'.$serialization)
        : 'javascript:;';
      $disabled = $previous_page === FALSE ? 'disabled' : '';
    ?>
    <li class="<?= $disabled ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>">
        <i class="ace-icon fa fa-chevron-left"></i>
      </a>
    </li>

    <?php foreach($paging as $paging): ?>
    <?php
      $serialization = $base_serialization.'page='.$paging;
      $link = site_url('billing?'.$serialization);
      $active = $current_page == $paging ? 'active' : '';
    ?>

    <li class="<?= $active ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>"><?= $paging ?></a>
    </li>
    <?php endforeach; ?>

    <?php

      $serialization = $base_serialization.'page='.$next_page;
      $link = $next_page
        ? site_url('billing?'.$serialization)
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