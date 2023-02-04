<?php
	$base_serialization  = form_serialize($this->input->get(['from_date', 'to_date', 'term', 'filter_type']));
	$base_serialization .= $base_serialization ? '&' : '';
?>
<ul class="pagination" data-serialization="<?= $base_serialization ?>">
  <?php
    $serialization = $base_serialization.'&page='.$previous_page;
    $link = $previous_page
      ? site_url('hasilpemeriksaan/list_hasil_laboratorium?'.$serialization)
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
    $serialization = $base_serialization.'&page='.$paging;
    $link = site_url('hasilpemeriksaan/list_hasil_laboratorium?'.$serialization);
    $active = $current_page == $paging ? 'active' : '';
  ?>

  <li class="<?= $active ?>">
    <a href="<?= $link ?>" data-serialization="<?= $serialization ?>"><?= $paging ?></a>
  </li>
  <?php endforeach; ?>

  <?php

    $serialization = $base_serialization.'&page='.$next_page;
    $link = $next_page
      ? site_url('hasilpemeriksaan/list_hasil_laboratorium?'.$serialization)
      : 'javascript:;';
    $disabled = $next_page === FALSE ? 'disabled' : '';
  ?>
  <li class="<?= $disabled ?>">
    <a href="<?= $link ?>" data-serialization="<?= $serialization ?>">
      <i class="ace-icon fa fa-chevron-right"></i>
    </a>
  </li>
</ul>

<script type="text/javascript">
	
</script>