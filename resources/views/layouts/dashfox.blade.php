<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Admin Dashboard Bootstrap HTML template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin, dashboard, premium, admin html, dash admin, best admin, admin theme, admin portal, simple admin, admin layout, new dashboard, html template for web application, simple dashboard template bootstrap, bootstrap 4 sidebar collapse, bootstrap 4 collapse sidebar, bootstrap dashboard template, simple bootstrap 4 template, simple admin panel template, admin dashboard bootstrap 4, bootstrap 4 admin template, bootstrap collapse sidebar, bootstrap simple dashboard, dashboard website template, bootstrap backend template, template admin bootstrap 4, bootstrap 4 admin template, bootstrap admin dashboard, ecommerce admin panel template"/>

		<!-- Title -->
		<title> SIPSU - Sistem Informasi Prasarana, Sarana, dan Utilitas </title>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Icons css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

		<!--  Owl-carousel css-->
		<link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

		<!--  Right-sidemenu css -->
		<link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- Sidemenu css -->
		<link rel="stylesheet" href="{{asset('assets/css/sidemenu.css')}}">

		<!-- Maps css -->
		<link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

		<!-- Jvectormap css -->
        <link href="{{asset('assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

		<!-- style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/style-dark.css')}}" rel="stylesheet">

        <!-- Internal Data table css -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
        
		<!--- Color css-->
		<link id="theme" href="{{asset('assets/css/colors/color4.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

	</head>
	<body class="main-body light-theme app sidebar-mini active leftmenu-color">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loader-2.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
            <div style="margin-top:10px;margin-left:10px">Hai, {{Auth::user()->name}} !</div>
				
            <div class="main-sidebar-header active">
                <a class="desktop-logo active" href="index.html">
					<img  src="{{asset('images/logo.png')}}" class="main-logo " alt="logo"/>
                    
				</a>
                
				<div class="app-sidebar__toggle" data-toggle="sidebar">
					<a class="open-toggle" href="#"><i class="header-icon fe fe-chevron-left"></i></a>
					<a class="close-toggle" href="#"><i class="header-icon fe fe-chevron-right"></i></a>
				</div>
			</div>
			<div class="main-sidemenu sidebar-scroll">
				<ul class="side-menu ">
                    <li><br></li>
					<li class="slide">
						<a class="side-menu__item 
                        @if($active=='dashboard')
                        active
                        @endif
                        " href="/home"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20" width="20"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg>
						<span class="side-menu__label">Dashboard</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item
                        @if($active=='new')
                        active
                        @endif
                        " href="/perumahans/create"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 20 20" width="20">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                        </svg>
						<span class="side-menu__label" >Buat Permohonan Baru</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Permohonan Baru')
                        active
                        @endif
                        " href="/dokumen/permohonan_baru"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M4.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-7Z"/>
                                <path d="M3.5 1a1 1 0 0 0 1-1h1a1 1 0 0 0 2 0h1a1 1 0 0 0 2 0h1a1 1 0 1 0 2 0H15v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1h-1.5a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0H1v-1a1 1 0 1 0 0-2v-1a1 1 0 1 0 0-2V9a1 1 0 1 0 0-2V6a1 1 0 0 0 0-2V3a1 1 0 0 0 0-2V0h1.5a1 1 0 0 0 1 1ZM3 3v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1Z"/>
                              </svg>
						<span class="side-menu__label">Permohonan Baru</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Pembahasan')
                        active
                        @endif
                        " href="/dokumen/pembahasan_narsum"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path fill-rule="evenodd" d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6H.5ZM13 12.5a2.01 2.01 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5Z"/>
                                <path d="m4.4.8-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 3.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8Zm3 0-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 6.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8Zm3 0-.003.004-.014.019a4.077 4.077 0 0 0-.204.31 2.337 2.337 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.198 3.198 0 0 1-.202.388 5.385 5.385 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 9.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8Z"/>
                            </svg>
						<span class="side-menu__label">Perlu Pembahasan Narsum</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Administrasi')
                        active
                        @endif
                        " href="/dokumen/bast_administrasi"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0zm-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                            </svg>
						<span class="side-menu__label">BAST Administrasi</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Fisik')
                        active
                        @endif
                        " href="/dokumen/bast_fisik"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                            </svg>
						<span class="side-menu__label">BAST Fisik</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Replanning')
                        active
                        @endif
                        " href="/dokumen/replanning"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2h5z"/>
                             </svg>
						<span class="side-menu__label">Replanning</span></a>
					</li>

                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Warga')
                        active
                        @endif
                        " href="/dokumen/penyerahan_warga"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
						<span class="side-menu__label">Penyerahan Warga</span></a>
					</li>

                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Tidak wajib')
                        active
                        @endif
                        " href="/dokumen/tidak_ada_kewajiban"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M14 13.292A8 8 0 0 0 8.5.015v7.778l5.5 5.5zm-.708.708L8.5 9.206v6.778a7.967 7.967 0 0 0 4.792-1.986zM7.5 15.985V9.207L2.708 14A7.967 7.967 0 0 0 7.5 15.985zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5z"/>
                            </svg>
						<span class="side-menu__label">Tidak ada Kewajiban</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item
                        @if($active=='Lainlain')
                        active
                        @endif
                        " href="/dokumen/lainlain"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16">
                                <path d="M7.293.707A1 1 0 0 0 7 1.414V2H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h5v1H2.5a1 1 0 0 0-.8.4L.725 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4H7v5h2v-5h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H9V6h4.5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.3 2.4a1 1 0 0 0-.8-.4H9v-.586A1 1 0 0 0 7.293.707z"/>
                            </svg>
						<span class="side-menu__label">Lain-lain</span></a>
					</li>

				
				</ul>
				<div class="app-sidefooter">
					<a class="side-menu__item" href=""><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg> <span class="side-menu__label">Logout</span></a>
				</div>
			</div>
		</aside>
		<!-- main-sidebar -->

		<!-- main-content -->
		<div class="main-content app-content">

			<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left">
						<div class="responsive-logo">
							<a href="index.html"><img src="{{asset('images/logo.png')}}" class="logo-1 logo-color4" alt="logo"></a>
						
						</div>
                        
						<div class="app-sidebar__toggle d-md-none" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<i class="fe fe-search"></i>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="main-header-search ml-0 d-sm-none d-none d-lg-block">
								<input class="form-control" id="search-input"  placeholder="Search for anything..." type="text"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->

			<!-- container -->
			<div class="container-fluid mg-t-20">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								@yield("breadcrumb")
							</ol>
						</nav>
					</div>
					
				</div>
				<!-- /breadcrumb -->

				<div class="row" id="utama">
					@yield("utama")
				</div>
				
				<!-- row close -->
			</div>
			<!-- /Container -->
		</div>
		<!-- /main-content -->

		
		<!-- Footer opened -->
		<div class="main-footer">
			<div class="container-fluid pd-t-0-f ht-100p">
				<span>Copyright © 2022 <a href="#">DPRKPP Kota Surabaya</a>. </span>
			</div>
		</div>
		<!-- Footer closed -->


        <div class="modal" id="modal_detail_perumahan">
			<div class="modal-dialog modal-width" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header" style="background-color:lightskyblue;">
						<h6 style="color:black" class="modal-title" id="modaldet_judul"></h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" id="modaldet_body">
					</div>
					<div class="modal-footer">
						<button class="btn orange btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQuery min js -->
		<script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Internal  Chart.bundle js -->
		<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

		<!-- Ionicons js -->
		<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

		<!--Internal Sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!-- Moment js -->
		<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>

		<!--Internal  Flot js-->
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>

        

		<!-- Chart-circle js -->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
		<script src="{{asset('assets/js/chart-circle.js')}}"></script>


		<!-- Suggestion js-->
		<!--<script src="{{asset('assets/plugins/suggestion/jquery.input-dropdown.js')}}"></script>-->
		<!--<script src="{{asset('assets/js/search.js')}}"></script>-->

		<!--Internal  Perfect-scrollbar js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!-- Eva-icons js -->
		<script src="{{asset('assets/js/eva-icons.min.js')}}"></script>

		<!-- right-sidebar js -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>

		<!-- Sticky js -->
		<script src="{{asset('assets/js/sticky.js')}}"></script>
		<script src="{{asset('assets/js/modal-popup.js')}}"></script>

		<!-- Left-menu js-->
		<script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>


		<!-- custom js -->
		<script src="{{asset('assets/js/custom.js')}}"></script>


        <!-- Internal Data tables -->
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>


        <Script>
            $( document ).ready(function() {
                @yield("javasc")
            });


            var pubdir="{{asset('')}}";

            function show_detail_perumahan(id,judul){
                $("#modaldet_judul").html(judul)
                $("#modaldet_body").html('<img src="{{asset('assets/img/loader-2.svg')}}" class="loader-img" alt="Loader">');	
                var act =pubdir+'perumahans/'+id;
                $.ajax({
                    url: act,
                    success: function(data){
                        $("#modaldet_body").html(data);	
                    }
                });
            }
        </Script>



	</body>
</html>