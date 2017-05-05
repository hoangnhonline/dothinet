<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="en-US" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<meta name="description" content="">	
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<!-- ===== Style CSS Common ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
	<!-- ===== Responsive CSS ===== -->
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='{{ URL::asset('assets/css/animations-ie-fix.css') }}' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
		<script src="https://oss.maxcdn.com/libs/respond.{{ URL::asset('assets/js/1.4.2/respond.min.js') }}"></script>
	<![endif]-->
</head>
<body>
	
	<header id="header" class="header">
		<!-- <div class="header-register">
			<div class="container">
				<div class="logon">
		            <a href="/dang-nhap.htm" rel="nofollow" title="Đăng nhập">
		                <span>Đăng nhập</span>
		            </a>
		        </div>
		        <div class="register">
		            <a href="/dang-ky.htm" rel="nofollow" title="Đăng ký">
		                <span>Đăng ký</span>
		            </a>
		        </div>
		        <div id="pnBxh">
	          		<div class="bxh">
		                <a href="#" rel="nofollow" title="Banxehoi.com" target="_blank">
		                    <span>Banxehoi.com</span>
		                </a>
		            </div>
				</div>
			</div>
		</div> -->
		<div class="header-logo">
	        <div class="container">
	            <div class="logo">
	                <a href="/" title="Đô thị">
	                    <img src="https://imgholder.ru/204x90/0082D5/fff.jpg&text=My+Logo&font=tahoma&fz=27" alt="">
	                </a>
	            </div>
	            <div class="banner_adv" id="Banner_dothi" style="display: none;">
	               <a href="#" target="_blank">
	                    <img src="{{ URL::asset('assets/images/adv/Banxehoi.com_Bannertop_728x90.gif') }}"></a>
	            </div>
	            <div class="banner_adv" id="Banner_tet" style="display: block;">
	                <a href="#" target="_blank">
	                    <img src="{{ URL::asset('assets/images/adv/Banxehoi.com_Bannertop_728x90.gif') }}"></a>
	            </div>
	        </div>
	    </div>
	</header><!-- /header -->

	<nav id="mainNav" class="navbar navbar-default navbar-custom fix-header">
        <div class="container" id="main-menu">
        	<!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	              <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
	            </button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
				<div class="text-center logo-menu">
					<a title="Logo" href="home.html"><img src="https://imgholder.ru/204x90/0082D5/fff.jpg') }}&text=My+Logo&font=tahoma&fz=27" alt=""></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li class="level0 active"><a class="" href="#">Trang chủ</a></li><!-- END MENU HOME -->
					<li class="level0 parent">
						<a href="#">BĐS bán</a>
						<ul class="level0 submenu">
							@foreach($banList as $ban)
							<li class="level1"><a href="#">{{ $ban->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU SHOP -->
					<li class="level0"><a href="#">BĐS cho thuê</a>
						<ul class="level0 submenu">
							@foreach($thueList as $thue)
							<li class="level1"><a href="#">{{ $thue->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU BLOG -->
					<li class="level0"><a href="#">Thông tin thị trường</a></li>
					<li class="level0"><a href="#">Thiết kế kiến trúc</a></li><!-- END MENU BLOG -->
					<li class="level0"><a href="#">Không gian sống</a></li>
					<li class="level0"><a href="#">Phong thủy</a></li>
					<li class="level0"><a href="#">Tư vấn luật</a></li>
					<li class="level0"><a href="#">Dự án</a></li>
					<li class="level0 postnew"><a href="#"><img src="{{ URL::asset('assets/images/icon-postnews.png') }}" alt=""> Đăng tin</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
        </div>
	</nav><!-- /navigation -->

	<section class="block-slider-home">
		<div class="owl-carousel dotsData owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="false" data-loop="true">
				<div class="item-slide" data-dot="1">
					<a href="" title=""><img src="{{ URL::asset('assets/images/slide-home/1.jpg') }}" alt="slide1"></a>
				</div><!-- item-slide1 -->
				<div class="item-slide" data-dot="2">
					<a href="" title=""><img src="{{ URL::asset('assets/images/slide-home/2.jpg') }}" alt="slide1"></a>
				</div><!-- item-slide2 -->
			</div>
	</section><!-- /block-slider -->

	<section class="block-search">
		<div class="container">
			<div class="block-title block-tab-customize">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">BẤT ĐỘNG SẢN BẢN</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">BẤT ĐỘNG SẢN CHO THUÊ</a></li>
				</ul>
			</div>
			<div class="block-contents">
				<!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
				    	<form action="#" method="get" accept-charset="utf-8" class="search-content-input selectpicker-cus">
					    	<div class="form-group">
					    		<input type="text" name="" class="input-search" placeholder="Nhập địa điểm, vd: The Manor">
					    	</div>
					    	<div class="row-select">
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option selected="selected">Loại bất động sản</option>
											<option class="option-lv1" value="bchcc">Bán căn hộ chung cư</option>
											<option class="option-lv1" value="tccln">Tất cả các loại nhà bán</option>
											<option class="option-lv2" value="bnr1">Bán nhà riêng</option>
											<option class="option-lv2" value="bnr2">Bán nhà riêng</option>
											<option class="option-lv2" value="bnr3">Bán nhà riêng</option>
											<option class="option-lv1" value="tccldb">Tất cả các loại đất bán</option>
											<option class="option-lv2" value="bdnda">Bán đất nền dự án</option>
											<option class="option-lv2" value="bd">Bán đất</option>
											<option class="option-lv1" value="bttknd">Bán trang trại, khu nghỉ dưỡng</option>
											<option class="option-lv1" value="bknx">Bán kho, nhà xưởng</option>
											<option class="option-lv1" value="blbdsk">Bán loại bất động sản khác</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Tỉnh/Thành phố --</option>
											<option class="option-lv0" value="HCM">Hồ Chí Minh</option>
											<option class="option-lv0" value="HN">Hà Nội</option>
											<option class="option-lv0" value="BD">Bình Dương</option>
											<option class="option-lv0" value="DDN">Đà Nẵng</option>
											<option class="option-lv0" value="HP">Hải Phòng</option>
											<option class="option-lv0" value="LA">Long An</option>
											<option class="option-lv0" value="BRVT">Bà Rịa Vũng Tàu</option>
											<option class="option-lv0" value="AG">An Giang</option>
											<option class="option-lv0" value="DNA">Đồng Nai</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Quận/Huyện --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Diện tích</option>
											<option class="option-lv0" value="1">Không xác định</option>
											<option class="option-lv0" value="2"><= 30 m2</option>
											<option class="option-lv0" value="3">30-50 m2</option>
											<option class="option-lv0" value="4">50-80 m2</option>
											<option class="option-lv0" value="5">80-100 m2</option>
											<option class="option-lv0" value="6">100-150 m2</option>
											<option class="option-lv0" value="7">150-200 m2</option>
											<option class="option-lv0" value="7">200-250 m2</option>
											<option class="option-lv0" value="9">250-300 m2</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Mức giá</option>
											<option class="option-lv0" value="1">Thỏa thuận</option>
											<option class="option-lv0" value="2">< 500 triệu</option>
											<option class="option-lv0" value="3">500 - 800 triệu</option>
											<option class="option-lv0" value="4">800 - 1 tỷ</option>
											<option class="option-lv0" value="5">1 - 2 tỷ</option>
											<option class="option-lv0" value="6">2 - 3 tỷ</option>
											<option class="option-lv0" value="7">3 - 5 tỷ</option>
											<option class="option-lv0" value="7">5 - 7 tỷ</option>
											<option class="option-lv0" value="9">7 - 10 tỷ</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Phường/Xã</option>
											<option class="option-lv0" value="1">Bàu Hàm 2</option>
											<option class="option-lv0" value="2">Dầu Giây</option>
											<option class="option-lv0" value="3">Gia Kiệm</option>
											<option class="option-lv0" value="4">Gia Tân 1</option>
											<option class="option-lv0" value="5">Gia Tân 2</option>
											<option class="option-lv0" value="6">Gia Tân 3</option>
											<option class="option-lv0" value="7">Hưng Lộc</option>
											<option class="option-lv0" value="7">Lộ 25</option>
											<option class="option-lv0" value="9">Quang Trung</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row-select">
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Đường/Phố --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Hướng nhà</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Số phòng ngủ</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Dự án --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2 col-button">
									<div class="form-group">
										<button type="button" class="btn btn-success btn-search-home"><i class="fa fa-search"></i> Tìm Kiếm</button>
									</div>
								</div>
							</div>
				    	</form>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="profile">
				    	<form action="#" method="get" accept-charset="utf-8" class="search-content-input selectpicker-cus">
					    	<div class="form-group">
					    		<input type="text" name="" class="input-search" placeholder="Nhập địa điểm, vd: The Manor">
					    	</div>
					    	<div class="row-select">
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option selected="selected">Loại bất động sản</option>
											<option class="option-lv1" value="bchcc">Bán căn hộ chung cư</option>
											<option class="option-lv1" value="tccln">Tất cả các loại nhà bán</option>
											<option class="option-lv2" value="bnr1">Bán nhà riêng</option>
											<option class="option-lv2" value="bnr2">Bán nhà riêng</option>
											<option class="option-lv2" value="bnr3">Bán nhà riêng</option>
											<option class="option-lv1" value="tccldb">Tất cả các loại đất bán</option>
											<option class="option-lv2" value="bdnda">Bán đất nền dự án</option>
											<option class="option-lv2" value="bd">Bán đất</option>
											<option class="option-lv1" value="bttknd">Bán trang trại, khu nghỉ dưỡng</option>
											<option class="option-lv1" value="bknx">Bán kho, nhà xưởng</option>
											<option class="option-lv1" value="blbdsk">Bán loại bất động sản khác</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Tỉnh/Thành phố --</option>
											<option class="option-lv0" value="HCM">Hồ Chí Minh</option>
											<option class="option-lv0" value="HN">Hà Nội</option>
											<option class="option-lv0" value="BD">Bình Dương</option>
											<option class="option-lv0" value="DDN">Đà Nẵng</option>
											<option class="option-lv0" value="HP">Hải Phòng</option>
											<option class="option-lv0" value="LA">Long An</option>
											<option class="option-lv0" value="BRVT">Bà Rịa Vũng Tàu</option>
											<option class="option-lv0" value="AG">An Giang</option>
											<option class="option-lv0" value="DNA">Đồng Nai</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Quận/Huyện --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Diện tích</option>
											<option class="option-lv0" value="1">Không xác định</option>
											<option class="option-lv0" value="2"><= 30 m2</option>
											<option class="option-lv0" value="3">30-50 m2</option>
											<option class="option-lv0" value="4">50-80 m2</option>
											<option class="option-lv0" value="5">80-100 m2</option>
											<option class="option-lv0" value="6">100-150 m2</option>
											<option class="option-lv0" value="7">150-200 m2</option>
											<option class="option-lv0" value="7">200-250 m2</option>
											<option class="option-lv0" value="9">250-300 m2</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Mức giá</option>
											<option class="option-lv0" value="1">Thỏa thuận</option>
											<option class="option-lv0" value="2">< 500 triệu</option>
											<option class="option-lv0" value="3">500 - 800 triệu</option>
											<option class="option-lv0" value="4">800 - 1 tỷ</option>
											<option class="option-lv0" value="5">1 - 2 tỷ</option>
											<option class="option-lv0" value="6">2 - 3 tỷ</option>
											<option class="option-lv0" value="7">3 - 5 tỷ</option>
											<option class="option-lv0" value="7">5 - 7 tỷ</option>
											<option class="option-lv0" value="9">7 - 10 tỷ</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Phường/Xã</option>
											<option class="option-lv0" value="1">Bàu Hàm 2</option>
											<option class="option-lv0" value="2">Dầu Giây</option>
											<option class="option-lv0" value="3">Gia Kiệm</option>
											<option class="option-lv0" value="4">Gia Tân 1</option>
											<option class="option-lv0" value="5">Gia Tân 2</option>
											<option class="option-lv0" value="6">Gia Tân 3</option>
											<option class="option-lv0" value="7">Hưng Lộc</option>
											<option class="option-lv0" value="7">Lộ 25</option>
											<option class="option-lv0" value="9">Quang Trung</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row-select">
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Đường/Phố --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Hướng nhà</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">Số phòng ngủ</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<select class="selectpicker form-control">
											<option class="option-lv0" selected="selected">-- Chọn Dự án --</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2 col-button">
									<div class="form-group">
										<button type="button" class="btn btn-success btn-search-home"><i class="fa fa-search"></i> Tìm Kiếm</button>
									</div>
								</div>
							</div>
				    	</form>
				    </div>
				  </div>
			</div>
		</div>
	</section><!-- /block-search -->

	<section class="main" id="site-main">
		<section class="container">
			<section class="row">
				<section class="col-sm-8 col-xs-12 block-sitemain">
					<article class="block block-news-default row">
						<div class="block-news-default-left">
							<div class="col-sm-7 col-xs-12">
								<div class="block-news-default-item" style="height:346px">
									<div class="block-thumb">
										<a href="#" title="">
											<img src="{{ $tinThiTruong[0]['image_url'] ? Helper::showImage($tinThiTruong[0]['image_url']) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="">
										</a>
									</div>
									<h2 class="block-title">
							            <a href="#" title="">{{ $tinThiTruong[0]['title'] }}</a>
							        </h2>
						        </div><!-- /block-news-default-item -->
							</div>
						</div><!-- /block-news-default-left -->
						<div class="block-news-default-right">
							<div class="col-sm-5 col-xs-12 block-pl0">
								<ul class="block-news-list-right">
								<?php $i =0; ?>
									@foreach($tinThiTruong as $tin)
									<?php $i++; 
									?>
									@if($i > 1)
									<li><h3><a href="#" title="">{{ $tin['title'] }}</a></h3></li>
									@endif
									@endforeach
								</ul>
							</div>
						</div><!-- /block-news-default-right -->
					</article><!-- /block-news-default -->

					<article class="block block-news-new clearfix">
						<div class="col-sm-12 col-xs-12">
							<div class="row">
								<div class="block-title block-title-common">
									<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> TIN RAO MỚI NHẤT</h3>
								</div>
								<div class="block-contents">
									<ul>
										@foreach($hotProduct as $product)
										<li class="news-new-item">											
											<div class="news-new-item-head"><a id="" href=""><img id="" title="" src="{{ $product->image_urls ? Helper::showImage($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt=""></a></div>
											<div class="news-new-item-description">
												<h4><a class="description-title vip1" title="" href="">{{ $product->title }}</a></h4>
                        						<div class="description-info">
                        							<div class="price"><label>Giá<span>:</span></label>{{ $product->price }} {{ Helper::getName($product->price_unit_id, 'price_unit')}}</div>
						                            <div class="area"><label>Diện tích<span>:</span></label>{{ $product->area }}</div>
						                            <div class="location"><label>Vị trí<span>:</span></label>{{ Helper::getName($product->district_id, 'district')}} - {{ Helper::getName($product->city_id, 'city')}}</div>
                        						</div>
                        						<span class="date">{{ date('d/m/Y', strtotime($product->updated_at)) }}</span>
											</div>
										</li>	
										@endforeach									
									</ul>
									<div class="extra">
										<a title="" href="">&gt;&gt; Xem thêm các tin rao nhà đất tương tự</a>
									</div>
									<div class="extra-news clearfix">
										<div class="extra-news-l">
											Tin Nhà đất bán mới nhất:
											<span>
												<a href="/nha-dat-ban.htm" title="Trang 1">1</a>
												<a rel="nofollow" href="/nha-dat-ban/p2.htm" title="Trang 2">2</a>
												<a rel="nofollow" href="/nha-dat-ban/p3.htm" title="Trang 3">3</a>
												<a rel="nofollow" href="/nha-dat-ban/p4.htm" title="Trang 4">4</a>
												<a rel="nofollow" href="/nha-dat-ban/p5.htm" title="Trang 5">5</a>
											</span>
										</div>
										<div class="extra-news-r">
											Tin Nhà đất cho thuê mới nhất:
											<span>
												<a href="/nha-dat-cho-thue.htm" title="Trang 1">1</a>
												<a rel="nofollow" href="/nha-dat-cho-thue/p2.htm" title="Trang 2">2</a>
												<a rel="nofollow" href="/nha-dat-cho-thue/p3.htm" title="Trang 3">3</a>
												<a rel="nofollow" href="/nha-dat-cho-thue/p4.htm" title="Trang 4">4</a>
												<a rel="nofollow" href="/nha-dat-cho-thue/p5.htm" title="Trang 5">5</a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</article><!-- /block-news-new -->

					<article class="block block-fengshui clearfix">
						<div class="col-sm-12 col-xs-12">
							<div class="row">
								<div class="block-title block-title-common">
									<h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-fengshui.png') }}" alt=""> Phong thủy</h3>
								</div>
								<div class="block-contents">
									<div class="news-fengshui clearfix">
										<div class="fengshui-news-hot">
								            <a href="#" title=""><img src="{{ URL::asset('assets/images/news-fengshui/1.jpg') }}" alt=""></a>
								            <h4><a href="#">Cách chọn vật phẩm phong thủy cho người mệnh Thủy</a></h4>
								        </div>
								        <div class="fengshui-news-list">
								        	<ul>
								        		<li><a href="#" title="">Lỗi phong thủy nghiêm trọng khiến thần tài không bao giờ ghé thăm nhà bạn</a></li>
								        		<li><a href="#" title="">Treo ảnh cưới trong phòng ngủ, tưởng treo đúng hóa ra lại là sai lầm</a></li>
								        		<li><a href="#" title="">Cách bố trí bàn ăn chuẩn, hợp phong thủy để khỏe mạnh, hạnh phúc</a></li>
								        		<li><a href="#" title="">Nhà đã "khó" mà hay đặt những vật này ở ban công thì muôn đời vẫn nghèo</a></li>
								        		<li><a href="#" title="">Cách bài trí gương phong thủy giúp tăng lợi nhuận kinh doanh và hạnh phúc cho mọi gia đình</a></li>
								        	</ul>
								        </div>
									</div>
								</div>
							</div>
						</div>
					</article><!-- /block block-fengshui -->

					<article class="block block-fengshui clearfix">
						<div class="col-sm-12 col-xs-12">
							<div class="row">
								<div class="block-title block-title-common">
									<h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-living.png') }}" alt=""> Không gian sống</h3>
								</div>
								<div class="block-contents">
									<div class="news-fengshui clearfix">
										<div class="fengshui-news-hot">
								            <a href="#" title=""><img src="{{ URL::asset('assets/images/news-fengshui/1.jpg') }}" alt=""></a>
								            <h4><a href="#">Lý do tuyệt đối không nên sơn toàn bộ bếp màu trắng</a></h4>
								        </div>
								        <div class="fengshui-news-list">
								        	<ul>
								        		<li><a href="#" title="">Thiết kế biệt thự sân golf trên khu đất 1.000m2</a></li>
								        		<li><a href="#" title="">Biệt thự kính xinh đẹp tràn ngập ánh sáng tự nhiên ở Hà Lan</a></li>
								        		<li><a href="#" title="">Ngôi nhà Hà Nội có mặt tiền hình chiếc khiên</a></li>
								        		<li><a href="#" title="">Ngôi nhà 2 tầng thiết kế theo phong cách "resort" nghỉ dưỡng đẹp như tranh vẽ</a></li>
								        	</ul>
								        </div>
									</div>
								</div>
							</div>
						</div>
					</article><!-- /block-fengshui -->

					<article class="block block-inews row">
						<div class="block-advisory">
							<div class="col-sm-6 col-xs-6">
								<div class="block-title block-title-common">
									<h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-tvl.png') }}" alt=""> Tư vấn luật</h3>
								</div>
								<div class="block-contents">
									<div class="inews-advisory-hot">
			                            <a href=""><img src="{{ URL::asset('assets/images/news-advisory/1.jpg') }}" alt=""></a>
			                            <h3><a href="" title="">Thủ tục, chi phí cấp sổ đỏ</a></h3>
			                        </div>
			                        <div class="advisory-list">
			                        	<ul>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        	</ul>
			                        </div>
								</div>
							</div>
						</div>
						<div class="block-architectural">
							<div class="col-sm-6 col-xs-6">
								<div class="block-title block-title-common">
									<h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-tkkt.png') }}" alt=""> Thiết kế kiến trúc</h3>
								</div>
								<div class="block-contents">
									<div class="inews-architectural-hot">
			                            <a href=""><img src="{{ URL::asset('assets/images/news-architectural/1.jpg') }}" alt=""></a>
			                            <h3><a href="" title="">Thủ tục, chi phí cấp sổ đỏ</a></h3>
			                        </div>
			                        <div class="architectural-list">
			                        	<ul>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        		<li><a href="" title="">Nhà đất chưa có sổ đỏ có được thế chấp?</a></li>
			                        	</ul>
			                        </div>
								</div>
							</div>
						</div>
					</article><!-- /block-inews -->

				</section><!-- /block-site-left -->

				<section class="col-sm-4 col-xs-12 block-sitebar">
					<article class="block-sidebar block-news-sidebar">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-star"></i></span> Tin xem nhiều</h3>
						</div>
						<div class="block-contents">
							<ul class="block-list-sidebar block-icon-title">
								<li><h4><a href="#" title="">Sập bẫy 'mua nhà giá cao'</a></h4></li>
								<li><h4><a href="#" title="">Mua nhà Hà Nội phải lên Sơn La lấy sổ đỏ</a></h4></li>
								<li><h4><a href="#" title="">Nhà giàu Sài Gòn săn căn hộ cao cấp vì an ninh và nơi đỗ ôtô</a></h4></li>
								<li><h4><a href="#" title="">Giá đất Đà Nẵng tăng lên ngang mặt bằng phố cổ</a></h4></li>
								<li><h4><a href="#" title="">"Nóng" chỗ để xe tại nhiều chung cư</a></h4></li>
							</ul>
						</div>
					</article><!-- /block-news-sidebar -->

					<article class="block-sidebar block-news-sidebar">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-building-o"></i></span> Dự án nổi bật</h3>
						</div>
						<div class="block-contents block-contents2">
							<ul class="block-list-sidebar block-slide-sidebar">
								<div class="bxslider">
									<div class="large-item">
		                                <a href="#" title=""><img src="{{ URL::asset('assets/images/news-slide/large1.jpg') }}" alt="" /></a>
		                                <h4><a href="#" title="">Monada Khang Điền</a></h4>
		                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
		                            </div>
									<div class="large-item">
		                                <a href="#" title=""><img src="{{ URL::asset('assets/images/news-slide/large2.jpg') }}" alt="" /></a>
		                                <h4><a href="#" title="">Monada Khang Điền</a></h4>
		                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
		                            </div>
		                            <div class="large-item">
		                                <a href="#" title=""><img src="{{ URL::asset('assets/images/news-slide/large3.jpg') }}" alt="" /></a>
		                                <h4><a href="#" title="">Monada Khang Điền</a></h4>
		                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
		                            </div>
		                            <div class="large-item">
		                                <a href="#" title=""><img src="{{ URL::asset('assets/images/news-slide/large4.jpg') }}" alt="" /></a>
		                                <h4><a href="#" title="">Monada Khang Điền</a></h4>
		                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
		                            </div>
								</div>
								<div id="bx-pager" class="bx-thumbnail">
									<div class="item">
										<div class="item-child">
				                            <a data-slide-index="0" class="slide_title" href="#" title=""><img class="avatar" src="{{ URL::asset('assets/images/news-slide/thumb1.jpg') }}" alt="" /></a>
				                            <div class="slide_info">
				                                <a href="#" title="">Monada Khang Điền</a>
				                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
				                            </div>
			                            </div>
			                        </div>
			                        <div class="item">
			                        	<div class="item-child">
				                            <a data-slide-index="1" class="slide_title" href="#" title=""><img class="avatar" src="{{ URL::asset('assets/images/news-slide/thumb2.jpg') }}" alt="" /></a>
				                            <div class="slide_info">
				                                <a href="#" title="">Monada Khang Điền</a>
				                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
				                            </div>
			                            </div>
			                        </div>
			                        <div class="item">
			                        	<div class="item-child">
				                            <a data-slide-index="2" class="slide_title" href="#" title=""><img class="avatar" src="{{ URL::asset('assets/images/news-slide/thumb3.jpg') }}" alt="" /></a>
				                            <div class="slide_info">
				                                <a href="#" title="">Monada Khang Điền</a>
				                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
				                            </div>
				                        </div>
			                        </div>
			                        <div class="item">
			                        	<div class="item-child">
				                            <a data-slide-index="3" class="slide_title" href="#" title=""><img class="avatar" src="{{ URL::asset('assets/images/news-slide/thumb4.jpg') }}" alt="" /></a>
				                            <div class="slide_info">
				                                <a href="#" title="">Monada Khang Điền</a>
				                                <p>Đường 990, phường Phú Hữu, quận 9, Tp.HCM</p>
				                            </div>
			                           	</div>
			                        </div>
								</div>
							</ul>
						</div>
					</article><!-- /block-news-sidebar -->

					<article class="block-sidebar block-news-sidebar">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> Liên kết nổi bật</h3>
						</div>
						<div class="block-contents">
							<ul class="block-list-sidebar block-icon1-title">
								<li><h4><a href="#" title="">Bán đất nền Quận Phú Nhuận</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền Quận 9</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền phường An Phú Đông</a></h4></li>
								<li><h4><a href="#" title="">Bán Đất nền Phú Quốc</a></h4></li>
								<li><h4><a href="#" title="">Bán chung cư Goldsilk Complex</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền Bình Dương</a></h4></li>
								<li><h4><a href="#" title="">Bán chung cư Quận Bắc Từ Liêm</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền Huyện Bến Cát</a></h4></li>
								<li><h4><a href="#" title="">Bán liền kề phường Phú Hữu</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền Quận 2</a></h4></li>
								<li><h4><a href="#" title="">Bán chung cư quận Bình Tân</a></h4></li>
							</ul>
							<div class="clearfix block-viewall">
								<a href="#" title=""><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Xem tất cả</a>
							</div>
						</div>
					</article><!-- /block-news-sidebar -->

					<article class="block-sidebar block-features-support">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-database"></i></span> Tính năng hỗ trợ</h3>
						</div>
						<div class="block-contents">
							<ul>
								<li>
									<a href="#" title="">
										<i class="fa fa-compass"></i>
										<span>XEM PHONG THỦY THEO TUỔI</span>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-file-text-o"></i>
										<span>TÍNH LÃI SUẤT VAY NGÂN HÀNG</span>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-building-o"></i>
										<span>VĂN BẢN NGÀNH XÂY DỰNG</span>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-newspaper-o"></i> 
										<span>NHẬN TIN QUA EMAIL</span><span class="btn-new">NEW</span>
									</a>
								</li>
							</ul>
						</div>
					</article><!-- /block-news-sidebar -->

					<article class="block-sidebar block-news-sidebar">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> bạn quan tâm tới xe hơi</h3>
						</div>
						<div class="block-contents">
							<ul class="block-list-sidebar block-icon1-title">
								<li><h4><a href="#" title="">Ford Ecosport 2016</a></h4></li>
								<li><h4><a href="#" title="">Ford Transit 2017</a></h4></li>
								<li><h4><a href="#" title="">Kia Hải Phòng</a></h4></li>
								<li><h4><a href="#" title="">Toyota Altis</a></h4></li>
								<li><h4><a href="#" title="">Toyota Hiace</a></h4></li>
								<li><h4><a href="#" title="">Bán đất nền Bình Dương</a></h4></li>
							</ul>
						</div>
					</article><!-- /block-news-sidebar -->
				</section><!-- /block-site-right -->
			</section>
		</section>
	</section><!-- /main -->

	<section class="block block-get-news">
		<div class="container">
			<div class="block-contents">
				<form action="" method="get" >
					<input type="text" name="" value="" placeholder="Nhập địa chỉ email">
					<button type="button" class="btnConfirm">Đăng ký</button>
				</form>
			</div>
		</div>
	</section><!-- /block-get-news -->

	<footer class="footer">
		<div class="block-menu-bottom">
	        <ul class="container">
	            <li><a href="#" rel="nofollow">Giới thiệu</a></li>
	            <li><a href="#" rel="nofollow">Hướng dẫn sử dụng</a></li>
	            <li><a href="#" rel="nofollow">Quy định</a></li>
	            <li><a href="#" rel="nofollow">Liên hệ</a></li>
	            
	            <li><a href="#" rel="nofollow">Điều khoản thỏa thuận</a></li>
	            <li><a href="#" rel="nofollow">Báo giá</a></li>
	        </ul>
	    </div>
	    <div class="container">
	    	<div class="block-footer row">
	    		<div class="block-logo-footer col-sm-3">
	                <a href="/" title="Đô thị">
	                	<img src="https://imgholder.ru/204x90/0082D5/fff.jpg') }}&text=My+Logo&font=tahoma&fz=27" alt="">
	                </a>
	            </div>
	            <div class="block-footer-address col-sm-9">
	                <address>
	                	Copyright DO THI MEDIA<br>
	                	Dothi.net 3.1 đang trong quá trình hoàn thiện<br>
						<strong>Hotline: 0903 236 862 - 0969 980 365</strong><br>
						Thứ 2 đến thứ 6:<strong> 8h00 - 17h15 | Thứ 7: 8h00 - 12h00</strong><br>
						<strong>Email: </strong>
						<a href="mailto:joe@example.com?subject=feedback" "email me">abc.abc@mail.vn</a>
						<strong>|</strong>
						<strong>Skype: </strong>
						<a href="#" "email me">abc.abc</a>
					</address>
	            </div>
	    	</div>
	    	<!-- <div class="block-share">
	    		<a href="" title="">++++++++</a>
	    	</div> -->
	    </div>
	</footer><!-- /footer -->

	<div id="advLeft">
		<div class="banner_scroll" id="banner_left">
			<div class="item">
				<a id="ban_l16" href="#" rel="nofollow" target="_blank" style="width: 100px; display: block;">
                    <img src="{{ URL::asset('assets/images/adv/banner-dothi-apps-100x300.gif') }}">
                </a>
				<a id="ban_l17" href="#" rel="nofollow" target="_blank" style="width: 100px; display: block;">
                    <img src="{{ URL::asset('assets/images/adv/Banxehoi.com_Baner truot_100x300.gif') }}">
                </a>
			</div>
		</div>
	</div><!-- /AdvLeft -->
	<div id="advRight">
		<div class="banner_scroll" id="banner_right">
			<div class="item">
				<a id="ban_l18" href="#" rel="nofollow" target="_blank" style="width: 100px; display: block;">
                    <img src="{{ URL::asset('assets/images/adv/cq-NA-HuongNT-161028-dt-100x300.gif') }}">
                </a>
				<a id="ban_l19" href="#" rel="nofollow" target="_blank" style="width: 100px; display: block;">
                    <img src="{{ URL::asset('assets/images/adv/banner-cdc-2704-100x300.gif') }}">
                </a>
			</div>
		</div>
	</div><!-- /Advight -->

	<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
  		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</a>
	<!-- RETURN TO TOP -->

	<!-- ===== JS ===== -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<!-- JS Bootstrap -->
	<script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
	<!-- ===== JS Bxslider ===== -->
	<script src="{{ URL::asset('assets/vendor/bxslider/jquery.bxslider.min.js') }}"></script>
	<!-- ===== JS Bxslider ===== -->
	<script src="{{ URL::asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
	<!-- JS Sticky -->
	<script src="{{ URL::asset('assets/vendor/sticky/jquery.sticky.js') }}"></script>
	<!-- ===== JS Bootstrap Select ===== -->
	<script src="{{ URL::asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
	<!-- Js Common -->
	<script src="{{ URL::asset('assets/js/common.js') }}"></script>

	<script>
		$('.bxslider').bxSlider({
			pagerCustom: '#bx-pager',
			pager: true,
		});
	</script>

</body>
</html>