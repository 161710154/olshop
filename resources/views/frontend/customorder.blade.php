<!DOCTYPE html>
<html lang="en">
<head>
	<title>Custom Order</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/MOKUZAI-01.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/MOKUZAI-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="profile">Profile</a>
							</li>

							<li>
								<a href="product">Product</a>
							</li>

							<li>
								<a href="custom">Custom Order</a>
							</li>

 <li class="nav-item">
        <a class="nav-link" data-widget="Logout" data-slide="true" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
            class="fa fa-th-large"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      </li>
						</ul>
					</div>	

					<!-- Icon header -->
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset ('assets/images/avatar/terarium2.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Custom Order
		</h2>
		<br>
	</section>	


	<!-- Content page -->
	@php
	$product=App\Product::all();
	@endphp
	<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('customorder.index') }}" class="btn-outline-warning"><i class="">&nbsp</i></a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('customorder.store') }}" method="post" enctype="multipart/form-data" >
			  		{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">alamat</label>	
			  			<input type="text" name="alamat" class="form-control"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_tlp') ? ' has-error' : '' }}">
			  			<label class="control-label">no_tlp</label>	
			  			<input type="text" name="no_tlp" class="form-control"  required>
			  			@if ($errors->has('no_tlp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_tlp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('product_id') ? ' has-error' : '' }}">
			  			<label class="control-label">product</label>	
			  			<select name="product_id" class="form-control">
			  				@foreach($product as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('product_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('ukuran') ? ' has-error' : '' }}">
			  			<label class="control-label">ukuran</label>	
			  			<input type="text" name="ukuran" class="form-control" placeholder="masukan panjang x lebar x tinggi(10x10x10)"required>
			  			</input>
			  			@if ($errors->has('ukuran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ukuran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<label class="control-label">Jumlah barang yang dipesan</label>
			  		<div class="wrap-num-product flex-w m-r-20 m-tb-10{{ $errors->has('jumlah_brg') ? ' has-error' : '' }}">

											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah_brg" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
											@if ($errors->has('jumlah_brg'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_brg') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group {{ $errors->has('pembayaran') ? ' has-error' : '' }}">
			  			<label class="control-label">pembayaran</label>
			  			<select class="form-control" name="pembayaran" required>
												<option>Bayar ditempat</option>
												<option>Transfer</option>
											</select>
			  			@if ($errors->has('pembayaran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pembayaran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('pengiriman') ? ' has-error' : '' }}">
			  			<label class="control-label">pengiriman</label>
			  			<select class="form-control" name="pengiriman" required>
												<option>JNE</option>
												<option>J&T</option>
												<option>Indah Cargo</option>
												<option>Lega Paket</option>
											</select>
			  			@if ($errors->has('pengiriman'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pengiriman') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('cek_pembayaran') ? ' has-error' : '' }}">
			  			<label class="control-label">cek transfer</label>
			  			<td>
							<a class="btn btn-primary" href="https://www.jne.co.id/"><i class="">&nbsp</i>JNE</a>
						</td>
						<td>
							<a class="btn btn-primary" href="https://www.jet.co.id/"><i class="">&nbsp</i>J&T</a>
						</td>
						<td>
							<a class="btn btn-primary" href="https://indahonline.com/"><i class="">&nbsp</i>Indah Cargo</a>
						</td>
						<td>
							<a class="btn btn-primary" href="http://www.legapaket.com/"><i class="">&nbsp</i>Lega Paket</a>
						</td>
			  		</div>

			  		</div>

			  		
			  		<div class="form-group">
			  			<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
			  			<i class="fa fa-save">&nbsp</i>Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
</div>	
	
	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>



	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contact<br><br>
					</h4>

						<div class="p-t-27">
						<a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" >
							<img src="images/line.png" width="33" height="33"> line
						</a>
						<br><br>

						<a href="https://www.instagram.com/mokuzai.craft" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="images/ig.png" width="30" height="30"> mokuzai.craft
						</a>
						<br><br>

						<a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="images/wa.png" width="27" height="27"> whatsapp
						</a>
					</div>
				</div>


			</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>