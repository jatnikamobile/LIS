<div class="pull-left">
  <div>
    <?php
      $first_row = array_key_exists(0, $data) ? $data[0]->row_number : NULL;
      $base_serialization  = form_serialize($this->input->get(['from_date', 'to_date', 'tanda','instalasi','term']));
      $base_serialization .= $base_serialization ? '&' : '';
    ?>
    <?php if(empty($first_row)): ?>
      Show 0 item
    <?php else: ?>
      Show <?= $first_row ?> to <?= $first_row - 1 + count($data) ?>
    <?php endif; ?>
    from <?= $count ?> items
  </div>
</div>
<div class="pull-right">
  <ul class="pagination" style="margin: 0;" data-serialization="<?= $base_serialization ?>">
    <?php
      $serialization = $base_serialization.'page='.$previous_page;
      $link = $previous_page
        ? site_url('list_order/index?'.$serialization)
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
      $link = site_url('list_order/index?'.$serialization);
      $active = $current_page == $page ? 'active' : '';
    ?>

    <li class="<?= $active ?>">
      <a href="<?= $link ?>" data-serialization="<?= $serialization ?>"><?= $page ?></a>
    </li>
    <?php endforeach; ?>

    <?php

      $serialization = $base_serialization.'page='.$next_page;
      $link = $next_page
        ? site_url('list_order/index?'.$serialization)
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