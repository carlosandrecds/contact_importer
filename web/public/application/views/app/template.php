<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Importer | Ultimate importer tool</title>
		<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
		<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
		<meta name="author" content="colorlib" />
		<!-- Favicon icon -->
		<link rel="icon" href="<?php echo base_url();?>assets/sysAssets/favicon.png" type="image/x-icon"> 
		<!-- Google font-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
		<!-- Required Fremwork -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<!-- waves.css -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/waves.min.css" type="text/css" media="all">
		
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themify-icons.css">

    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icofont.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/feather.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/simple-line-icons.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sweetalert.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<!-- Required Jquery -->
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

	     <!-- Masking js -->
		<script src="<?php echo base_url();?>assets/js/inputmask.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.inputmask.js"></script>
		<script src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.maskMoney.min.js"></script>
	
	    <!-- waves js -->
	    <script src="<?php echo base_url();?>assets/js/waves.min.js"></script>
	    <!-- jquery slimscroll js -->
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
	    <script src="<?php echo base_url();?>assets/js/pcoded.min.js"></script>
	    <script src="<?php echo base_url();?>assets/js/vertical-layout.min.js"></script>

	    <style type="text/css">
			.btn-group, .btn-group-vertical {
			    display: flex;
			}

			.pcoded .pcoded-header[header-theme="themelight1"] .navbar-logo a {
			    color: #807777 !important;
			}

			.header-navbar .navbar-wrapper .navbar-logo[logo-theme="theme6"] {
			    background: #ffffff;
			}

			.header-navbar .navbar-wrapper .navbar-container .header-notification .profile-notification a {
				font-size: 15px;
				padding-left: 0;
				padding: 11.2px 10px;
			}
			.pcoded-navbar[navbar-theme="theme1"] .pcoded-inner-navbar 
			{
				background-color: black;
			}
			.card{
				border-radius: 25px;
			}
	    </style>
	    
	</head>

	<body>
		<!-- [ Pre-loader ] start -->
		<div class="loader-bg">
			<div class="loader-bar"></div>
		</div>
		<!-- [ Pre-loader ] end -->
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper" style="background: white !important;">
				<!-- [ Header ] start -->
				<nav class="navbar header-navbar pcoded-header">
					<div class="navbar-wrapper">
						<div class="navbar-logo">
							<!-- Redirect to the main page -->
							<a href="/">
								<img class="img-fluid" src="<?php echo base_url();?>assets/sysAssets/logo_transparent.png" alt="Theme-Logo" style="height: 100px;" />
							</a>

							<a class="mobile-menu" id="mobile-collapse" href="#!">
								<i class="feather icon-menu icon-toggle-right"></i>
							</a>
							<a class="mobile-options waves-effect waves-light">
								<i class="feather icon-more-horizontal"></i>
							</a>
						</div>
						<div class="navbar-container container-fluid">
							<ul class="nav-left">


								<li>
									<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
										<i class="full-screen feather icon-maximize"></i>
									</a>
								</li>

							</ul>
							<ul class="nav-right">
								
                            <li class="user-profile header-notification">
								<div class="dropdown-primary dropdown">
									<div class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url(); ?>files/fotouser/<?php $iduser = $this->session->userdata('id');
																							$a = $this->db->query("select fotoperfil from usuarios where idusuario = {$iduser}")->result(); foreach ($a as $amostra) 
																							{echo $paciente_img = $amostra->fotoperfil;}?>" class="img-radius">
										<span><?=$this->session->userdata('nome'); ?></span>
										<i class="feather icon-chevron-down"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">	

										<li>
											<a href="<?php echo base_url(); ?>perfil/editar/<?php $iduser = $this->session->userdata('id'); print $iduser;?>">
												<i class="feather icon-user"></i>User Settings
											</a>
											
											<a href="<?php echo base_url();?>app/logout">
												<i class="feather icon-log-out"></i> Log Out
											</a>
										</li>

									</ul>
								</div>
							</li>

							</ul>
						</div>
					</div>
				</nav>
				<!-- [ Header ] end -->

				<div class="pcoded-main-container" style="background: white !important;">
					<div class="pcoded-wrapper">

						<!-- [ navigation menu ] start -->
						<nav class="pcoded-navbar">
							<div class="nav-list">
								<div class="pcoded-inner-navbar main-menu" style="background-color: #2d71b8;">
								
								<?php 
									// PEGO O NIVEL DO USUÁRIO ATRAVÉS DO ID
									$consulta_nivel = $this->db->query("select nivel from usuarios where idusuario = {$iduser}")->result();

									?>

									<div class="pcoded-navigation-label">Principal</div>
										<ul class="pcoded-item pcoded-left-item">
											
											<li>
												<a href="<?=base_url().'Dashboard'; ?>" class="waves-effect waves-dark">
													<span class="pcoded-micon">
														<i class="fa fa-dashboard"></i>
													</span>
													<span class="pcoded-mtext">Dashboard</span>
												</a>
											</li>
											
											<li>
												<a href="<?=base_url().'CategoryImport'; ?>" class="waves-effect waves-dark">
													<span class="pcoded-micon">
														<i class="fa fa-archive"></i>
													</span>
													<span class="pcoded-mtext">Importer Categories</span>
												</a>
											</li>
											
											<li>
												<a href="<?=base_url().'Import'; ?>" class="waves-effect waves-dark">
													<span class="pcoded-micon">
														<i class="fa fa-file-excel-o"></i>
													</span>
													<span class="pcoded-mtext">Contacts Import</span>
												</a>
											</li>			

											<li>
												<a href="<?=base_url().'ContactList'; ?>" class="waves-effect waves-dark">
													<span class="pcoded-micon">
														<i class="fa fa-group"></i>
													</span>
													<span class="pcoded-mtext">Contact List</span>
												</a>
											</li>		

											<li>
												<a href="<?=base_url().'Logs'; ?>" class="waves-effect waves-dark">
													<span class="pcoded-micon">
														<i class="fa fa-user-times"></i>
													</span>
													<span class="pcoded-mtext">Error Log</span>
												</a>
											</li>	
																
										</ul>
							</div>
						</nav>						
						<!-- [ navigation menu ] end -->

						<div class="pcoded-content" style="background: white!important;">
							<?php if(isset($view)){ $this->load->view($view); }?>
          					<?php if(isset($conteudoP) and @$conteudoP != ''){ echo $conteudoP; }?>
							
						</div>
						<!-- [ style Customizer ] start -->
						<style type="text/css">
						</style>
						<!-- [ style Customizer ] end -->
					</div>
				</div>
			</div>
		</div>
    
		<!-- Custom js -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.min.js"></script>   

		<script> $('a[href="<?= $this->menuativo; ?>"]').parent('li').addClass('active') </script>

	</body>

</html>
