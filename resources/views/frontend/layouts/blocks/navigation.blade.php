@php
    $cart = Cart::content();
@endphp
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.html">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">AVIATO</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Giỏ hàng</a>
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
                            @if (Session::get('cart')==true)
                                @foreach ($cart as $key => $val)
                                @php
                                $image = json_decode($val->options->image);
                                @endphp
                                <div class="media">
                                    <a class="pull-left" href="{{ asset('uploads/products/'.$image[0]) }}">
                                        <img class="media-object" src="{{ asset('uploads/products/'.$image[0]) }}" alt="image" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#!">{{ $val->name }}</a></h4>
                                        <div class="cart-price">
                                            <span>{{ $val->qty }} x</span>
                                            <span>{{ $val->price }}</span>
                                        </div>
                                        <h5><strong>{{ $val->qty * $val->price }}</strong></h5>
                                    </div>
                                    <a href="#!" class="remove"><i class="tf-ion-close"></i></a>
                                </div><!-- / Cart Item -->

                                @endforeach
                            @endif
							<!-- Cart Item -->
							<div class="cart-summary">
								<span>Tổng :</span>
								<span class="total-price">{{ Cart::pricetotal() }} <sup>đ</sup> </span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="{{ route('home.show-cart') }}" class="btn btn-small">Chi tiết</a></li>
								<li><a href="{{ route('home.checkout') }}" class="btn btn-small btn-solid-border">Thanh Toán</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Tìm kiếm</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->

						@if (Auth::check())
                        <li class="dropdown dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span
                                    class="tf-ion-ios-arrow-down"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('home.account.index') }}">Cài đặt</a></li>
                                <li><a href=" {{ route('home.logout') }} ">Đăng xuất</a></li>
                            </ul>
                        </li><!-- / Blog -->
                        @else
                        <li class="dropdown">
                            <a href="{{ route('home.login') }}" class="dropdown-toggle"><i
                                    class=""></i> Đăng nhập</a>
                        </li><!-- / Search -->
                        @endif
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="{{ route('home.index') }}">Trang chủ</a>
					</li><!-- / Home -->

                    <li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Dịch vụ <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('home.book.index') }}">Đặt lịch dọn dẹp</a></li>
							<li><a href="">Đặt hàng sản phẩm</a></li>
						</ul>
					</li><!-- / Blog -->
					<!-- Shop -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Bài viết <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{  route('home.Blog.index')}}">Bài viết</a></li>
						</ul>
					</li><!-- / Blog -->

                    <li class="dropdown ">
						<a href="{{ route('home.index') }}">Hợp tác với chúng tôi</a>
					</li><!-- / Home -->
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>
