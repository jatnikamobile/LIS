<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login | <?=(APP_NAME() ?? '')?></title>

		<meta name="description" content="User login page"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!--<link rel="icon" href="<?=base_url('assets/images/thumb/'.(INST_LOGO ?? ''))?>" type="image/png" sizes="16x16">-->
		<link rel="icon" href="<?= APP_INST_LOGO()?>" sizes="16x16">
        <!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('assets/new/font-awesome/4.5.0/css/font-awesome.min.css')?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/fonts.googleapis.com.css')?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/ace.min.css')?>" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url('assets/new/css/ace-rtl.min.css')?>" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout" style="background-image: url('<?=base_url('assets/images/bg.jpeg')?>'); background-size: cover;">
		<div class="main-container">
			<div class="main-content">
				<div class="row" style="margin-top:5%;">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<!-- <i class="ace-icon fa fa-book green"></i> -->
                                    <!--<img src="<?= APP_INST_LOGO() ?>" style="width: 100px"/><br/>-->
									<span class="blue" id="id-text2"><?=(APP_NAME() ?? '')?></span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy;<?=(APP_INST_NAME() ?? '')?><br></h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h3 class="header blue lighter bigger center">LOGIN</h3>
											<h4 class="header blue lighter bigger"> <i class="ace-icon fa fa-user green"></i> Please Enter Your Information </h4>

											<div class="space-6"></div>
                                            <form action="<?php echo base_url('login')?>" method="post" id="formLogin">
                                                <div class="form-group has-feedback">
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <select name="shift" id="shift" class="form-control">
                                                        <option value="">-= Shift =-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                    <span class="glyphicon glyphicon-clock form-control-feedback"></span>
                                                </div>
                                                <div class="row">
                                                    <!-- /.col -->
                                                    <div class="col-xs-4">
                                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In <i class="fa fa-sign-in"></i>&emsp;</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

						<!-- 	<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div> -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?=base_url('assets/new/js/jquery-2.1.4.min.js')?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
            $('#username').keyup(function () {
                $('#username').val(this.value.toUpperCase());
            })
            $('#password').keyup(function () {
                $('#password').val(this.value.toUpperCase());
            })
            $('#formLogin').submit(function(e){
                e.preventDefault();
                uname = $('#username').val();
                pass = $('#password').val();
                shift = $('#shift').val();
                if(uname != '' && pass != ''){
                    $.ajax({
                        type:'POST',
                        url:'<?=base_url('login/cek_login')?>',
                        data:{uname:uname,pass:pass,shift:shift,"<?=$csrf['name']?>":"<?=$csrf['hash']?>"},
                        dataType:'JSON',
                        beforeSend(){

                        },
                        success(data){
                            if(data.stat){
                                // if(window.referrer != ""){
                                //     history.back();
                                // }else{
                                    window.location = '<?=base_url('Beranda')?>';
                                // }
                            }else{
                                swal({
                                    type:'error',
                                    title:'Error!',
                                    text:'Username atau Password Anda salah!',
                                });
                                $('#username').focus();
                            }
                        }
                    });
                }else if(uname==''){
                    swal({
                        type:'warning',
                        title:'Peringatan!',
                        text:'Username Anda tidak boleh dikosongkan!',
                    });
                    $('#username').focus();
                }else if(pass==''){
                    swal({
                        type:'warning',
                        title:'Peringatan!',
                        text:'Password Anda tidak boleh dikosongkan!',
                    });
                    $('#password').focus();
                }else if(shift==''){
                    swal({
                        type:'warning',
                        title:'Peringatan!',
                        text:'Shift Anda tidak boleh dikosongkan!',
                    });
                    $('#shift').focus();
                }
            });
		</script>
        
	</body>
</html>
