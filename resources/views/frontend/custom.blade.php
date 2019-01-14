@include('frontend.header')
@yield('css')
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
						<img src="{{asset('images/MOKUZAI-01.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="/">Home</a>
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
			Custom
		</h2>
		<br>
	</section>	


	<!-- Content page -->

	<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('custom.index') }}" class="btn-outline-warning"><i class="">&nbsp</i></a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('custom.store') }}" method="post" enctype="multipart/form-data" >
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
							<a href="https://www.jne.co.id" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/jne.jpg')}}" width="70" height="40">
						</a>
						</td>
						<td>
							<a href="https://www.jet.co.id/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/j&t1.png')}}" width="65" height="30">
						</a>
						</td>
						<td>
							<a href="https://indahonline.com/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/indah-cargo.png')}}" width="80" height="50">
						</td>
						<td>
							<a href="https://legapaket.com/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/legapaket.png')}}" width="80" height="50">
						</td>
			  		</div>
			  		<!-- <div class="form-group {{ $errors->has('cek_pembayaran') ? ' has-error' : '' }}">
			  			<label class="control-label">cek_pembayaran</label>	
			  			<input type="text" name="cek_pembayaran" class="form-control"  required>
			  			@if ($errors->has('cek_pembayaran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cek_pembayaran') }}</strong>
                            </span>
                        @endif
			  		</div> -->

			  		<div class="form-group">
			  			<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
			  			<i class="fa fa-save">&nbsp</i>Beli</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
</div>	

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contact
					</h4>
						<div class="p-t-27">
						<br>
						<a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" >
							<img src="{{asset('images/line.png')}}" width="33" height="33"> line
						</a>
						<br><br>

						<a href="https://www.instagram.com/mokuzai.craft" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/ig.png')}}" width="30" height="30"> mokuzai.craft
						</a>
						<br><br>

						<a href="" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<img src="{{asset('images/wa.png')}}" width="27" height="27"> whatsapp
						</a>
					</div>
				</div>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.559674074804!2d107.72921521431742!3d-6.943108369897047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c31e59b73baf%3A0x7b805f2c7c0b3010!2sJl.+Permata+Biru+Blok+w+No.166%2C+Cinunuk%2C+Cileunyi%2C+Bandung%2C+Jawa+Barat+40624!5e0!3m2!1sid!2sid!4v1541058133538" width="800" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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

@yield('content')
@include('frontend.footer')