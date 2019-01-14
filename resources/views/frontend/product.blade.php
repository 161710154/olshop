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
								<a href="login">Login</a>
							</li>

						</ul>
					</div>	


					<!-- Icon header -->
				</nav>
			</div>	
		</div>

		<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset ('assets/images/avatar/terarium2.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Product
		</h2>
	</section>	
	
	<!-- Product -->
@php
$product = App\Product::paginate(1);
$kategori = App\Kategori::all();
@endphp

	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
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

							<a href="/produk/{{$data->slug}}" data-toggle="modal" data-target="#products{{$data->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 " >
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="/produk/{{$data->slug}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" data-toggle="modal" data-target="#products">
									{{$data->nama}}
									<p>{{$data->harga}}</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div style="margin-left: 500px"> {{$product->links()}} </div>
			<!-- Load more -->
		
		
		</div>
	</section>

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
											<img src="{{ asset('assets/images/avatar/'.$data->gambar.'') }}" width="200" height="300">
											
											
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

							<p class="stext-102 cl3 p-t-23">
								{!!$data->deskripsi!!}
							</p>
							
							<!--  --><br>
							<br>
							<br>

										<a href="/custom/{{$data->slug}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
											Beli
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