<?php //$konf = $this->konfigurasi_model->listing();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?=isset($title)?$title:''?> | <?=(APP_NAME ?? '')?></title>
		<!-- Favicon-->
		<link rel="icon" href="<?=base_url('assets/images/thumb/'.(INST_LOGO ?? ''))?>" type="image/png" sizes="16x16">
    	<!-- <link rel="icon" href="<?php //echo $this->konfigurasi_model->listing()->logo;?>" type="image/x-icon"> -->

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/new/font-awesome/4.5.0/css/font-awesome.min.css')?>" />

		<!-- page specific plugin styles -->

		<!-- Google Fonts -->
	    <link href="<?=base_url('assets/googlefont/googlefont.css')?>" rel="stylesheet" type="text/css">
	    <link href="<?=base_url('assets/googlefont/material-icon.css')?>" rel="stylesheet" type="text/css">

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/fonts.googleapis.com.css')?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/ace.min.css')?>" class="ace-main-stylesheet" id="main-ace-style" />

		<link href="<?php echo base_url('assets/datepicker/dist/css/bootstrap-datepicker.css')?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/new/css/bootstrap-timepicker.min.css')?>" rel="stylesheet" />
	    <!-- fancybox -->
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css')?>">

	    <!-- DataTables -->
	    <link rel="stylesheet" href="<?php echo base_url('assets/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

	     <!-- HighChart -->
	    <link href="<?php echo base_url('assets/highchart/code/css/highcharts.css')?>" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatables.net-bs/css/buttons.dataTables.min.css')?>">

	    <!-- SELECT 2 -->
	    <link href="<?php echo base_url('assets/select2/dist/css/select2.min.css')?>" rel="stylesheet" />
	    <!-- <link href="<?php echo base_url('assets/sweetalert/css/sweetalert2.min.css')?>" rel="stylesheet"/> -->

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/ace-skins.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/new/css/ace-rtl.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/new/css/chosen.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/styles/select2-fix.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/new/css/custom-aing.css')?>" />

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?=base_url('assets/new/js/ace-extra.min.js')?>"></script>
	    <!-- Core Jquery -->
	    <!-- <script src="<?=base_url('assets/jquery.min.js')?>"></script> -->
		<script src="<?=base_url('assets/new/js/jquery-2.1.4.min.js')?>"></script>
	    <!-- SELECT 2 -->
	    <script src="<?php echo base_url()?>assets/select2/dist/js/select2.min.js"></script>

	    <!-- Highchart -->
	    <script type="text/javascript" src="<?php echo base_url('assets/highchart/code/js/highcharts.js')?>"></script>

	    <script type="text/javascript" src="<?php echo base_url('assets/PrintEl/print.min.js')?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/PrintEl/jquery.printElement.js')?>"></script>
	    <!-- DataTables -->
	    <script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js')?>"></script>
	    <script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/jszip.min.js')?>" type="text/javascript"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/pdfmake.min.js')?>" type="text/javascript"></script>
	    <!-- <script src="<?=base_url('assets/datatables.net-bs/js/fvs_fonts.js')?>" type="text/javascript"></script> -->
	    <script src="<?php echo base_url('assets/datepicker/dist/js/bootstrap-datepicker.js')?>"></script>
	    <script src="<?php echo base_url('assets/new/js/bootstrap-timepicker.min.js')?>"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/dataTables.buttons.min.js')?>" type="text/javascript"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/buttons.flash.min.js')?>" type="text/javascript"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/buttons.html5.min.js')?>" type="text/javascript"></script>
	    <script src="<?=base_url('assets/datatables.net-bs/js/buttons.print.min.js')?>"></script>
	    <!-- <script src="<?php echo base_url('assets/sweetalert2/js/sweetalert2.all.min.js')?>"></script> -->
	    <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.16/api/sum().js"></script> -->
	    <!-- fancybox -->
	    <script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js')?>"></script>
	    <script src="<?php echo base_url('assets/jquery.inputmask.bundle.js')?>"></script>
	    <script src="<?php echo base_url('assets/scripts/debounce.js')?>"></script>
		<script>
		$(function($) {
			// this script needs to be loaded on every page where an ajax POST may happen
			$.ajaxSetup({
				data: {
					'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				}
			});
			// now write your ajax script
		});
		</script>
	</head>

	<body class="skin-2">
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div class="main-content">
				<div class="main-content-inner">
					<!-- <div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
							<li><a href="#">Other Pages</a></li>
							<li class="active">Blank Page</li>
						</ul>
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>
					</div> -->

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php if(isset($content) && $content != ''){
									$this->load->view($content);
								} ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<!--
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"><?=(INST_NAME ?? '')?></span> &copy; <?=date('Y')?>
						</span>
					</div>
				</div>
			</div> -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<!-- <script src="<?=base_url('assets/new/js/jquery-2.1.4.min.js')?>"></script> -->

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=base_url('assets/new/js/jquery.mobile.custom.min.js')?>'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url('assets/new/js/bootstrap.min.js')?>"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?= base_url('assets/new/js/ace-elements.min.js')?>"></script>
		<script src="<?= base_url('assets/new/js/ace.min.js')?>"></script>
		<script src="<?= base_url('assets/new/js/bootbox.js') ?>"></script>
		<!-- inline scripts related to this page -->
		<script>
			window.print();
		</script>
	</body>
</html>
