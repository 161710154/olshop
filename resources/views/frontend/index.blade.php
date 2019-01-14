@include('frontend.header')
@yield('css')
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
				
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="" class="logo">
						<img src="{{asset('images/MOKUZAI-01.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="/">Home</a>
							
							</li>

							<li>
								<a href="profile">Profile</a>
							</li>

							<li>
								<a href="product">Product</a>
							</li>

							<li>
								<a href="customorder">Custom Order</a>
							</li>

							<li>
								<a href="login">Login</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						@php
							if(\Auth::check()){
								$cart = \App\Cart::where('user_id', \Auth::user()->id);
							}
						@endphp
						@if(Auth::check() && $cart->count() > 0)
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$cart->count()}}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						@endif
						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			@if(Auth::check())
			@php
			$total_all = 0;
			@endphp
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					@foreach(\App\cart::with('Product')->get() as $data)
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{asset('assets/images/avatar/'.$data->product->gambar)}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{$data->product->nama}}
							</a>

							<span class="header-cart-item-info">
								{{$data->jumlah_brg}} x Rp. {{ number_format($data->product->harga,2,',','.')}}
								@php 
									$t_s = $data->jumlah_brg * $data->product->harga;
									$total_all = $total_all + $t_s;
								@endphp
							</span>
						</div>
					</li>
					@endforeach
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: Rp. {{number_format($total_all,2,',','.')}}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{url('cart', Auth::user()->id)}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="{{url('cart', Auth::user()->id)}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
</header>

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('assets/images/avatar/terarium1.jpg')}});" data-thumb="images/thumb-01.jpg')}}" data-caption="Women’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Latest from Mokuzai
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Souvenir Kayu & Terarium
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url({{asset('assets/images/avatar/gantungan2.jpg')}});" data-thumb="images/thumb-02.jpg')}}" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-true" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									All Product
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Discont up to 30%
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url({{asset('assets/images/avatar/gantungan1.jpg')}});" data-thumb="images/thumb-03.jpg')}}" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Souvenir Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Souvenir Pernikahan
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</section>

<!-- Banner -->
	<div class="sec-banner bg0">
		<div class="flex-w flex-c-m">
			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="{{asset('assets/images/avatar/gantungan.jpg')}}" alt="IMG-BANNER" width="300" height="250">

					<a href="product" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								<center>Kayu</center>
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="{{asset('assets/images/avatar/terarium.jpg')}}" alt="IMG-BANNER" width="300" height="250">

					<a href="product" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Terarium
							</span>

							<span class="block1-info stext-102 trans-04">
								
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="{{asset('assets/images/avatar/souvenir.jpg')}}" alt="IMG-BANNER" width="300" height="250">

					<a href="product" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Souvenir
							</span>

							<span class="block1-info stext-102 trans-04">
								
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

@php
$product = App\Product::all();
$kategori = App\Kategori::all();
@endphp

	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<h5 class="ltext-105 cl5 txt-center respon1">
					Product
				</h5>
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>&nbsp&nbsp&nbsp&nbsp&nbsp
					@foreach($kategori as $data)
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".product{{$data->id}}">
						{{ $data->nama_kategori }}
					</button>
					@endforeach
					
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach ($product as $data)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item product{{$data->Kategori->id}}">

					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('assets/images/avatar/'.$data->gambar.'') }}" width="300" height="300">

							<a href="/produk/{{$data->slug}}" data-toggle="modal" data-target="#products{{$data->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
									Quick View
							</a>

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="/produk/{{$data->slug}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" data-toggle="modal" data-target="#products{{$data->id}}">

									<h4>{{  $data->nama  }}</h4>
									<p>Rp. {{ number_format($data->harga,2,',','.')}}</p>
								</a>
								<span class="stext-105 cl3">
									
								</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</body>

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

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						<center>Mitra</center>
					</h4>

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

	<!-- Modal1 -->
	@foreach ($product as $data)
	<div class="modal fade p-t-60 p-b-20" id="products{{$data->id}}" tabindex="-1" role="dialog" >
	<div class="modal-dialog">

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
									<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
										<div class="wrap-pic-w pos-relative">
											<img src="{{ asset('assets/images/avatar/'.$data->gambar.'') }}" width="300" height="300">
										</div>
									</div>
								</div>
							</div>
					
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-50000 cl2 js-name-detail p-b-14">
								{{$data->nama}}
							</h4>

							<span class="mtext-106 cl2">
								Deskripsi:
							</span>

								{!!$data->deskripsi!!}
								<p>
							
							<span class="mtext-106 cl2">
								Harga:
							</span>
							
								Rp. {{ number_format($data->harga,2,',','.')}}
							</p>
							<!--  --><br>
							<br>
							<br>

										
											<a href="{{url('add-cart',$data->id)}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
											Masukkan keranjang
											</a>
										
									</div>
								</div>	
							</div>
		</div>	
	</div>	
</div>
						</div>
					</div>@endforeach
	

@yield('content')
@include('frontend.footer')