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
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="iCho.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />        
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
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
					<li class="level0 {{ \Request::route()->getName() == "home" ? "active" : "" }}"><a class="" href="{{ route('home') }}">Trang chủ</a></li><!-- END MENU HOME -->
					<li class="level0 parent">
						<a href="{{ route('ban') }}">BĐS bán</a>
						<ul class="level0 submenu">
							@foreach($banList as $ban)
							<li class="level1"><a href="{{ route('danh-muc', $ban->slug ) }}">{{ $ban->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU SHOP -->
					<li class="level0"><a href="{{ route('cho-thue') }}">BĐS cho thuê</a>
						<ul class="level0 submenu">
							@foreach($thueList as $thue)
							<li class="level1"><a href="{{ route('danh-muc', $thue->slug ) }}">{{ $thue->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU BLOG -->
					<li class="level0"><a href="{{ route('du-an') }}">Dự án</a></li>
					@foreach($articleCate as $value)
					<li class="level0 {{ isset($cateDetail) && $cateDetail->id == $value->id ? "active" : "" }}"><a href="{{ route('news-list', $value->slug) }}">{{ $value->name }}</a></li>
					@endforeach					
					<li class="level0 postnew"><a href="{{ route('ky-gui') }}"><img src="{{ URL::asset('assets/images/icon-postnews.png') }}" alt="Ký gửi"> Ký gửi</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
        </div>
	</nav><!-- /navigation -->

	@yield('slider')

	@yield('content')
	

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

	<?php 
	$bannerArr = DB::table('banner')->where(['object_id' => 2, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
	?>
	@if($bannerArr)
	<div id="advLeft">
		<div class="banner_scroll" id="banner_left">
			<div class="item">				
				@foreach($bannerArr as $banner)				
				@if($banner->ads_url !='')
				<a id="ban_116" href="{{ $banner->ads_url }}" target="_blank" style="width: 100px; display: block;">
				@endif				
                    <img src="{{ Helper::showImage($banner->image_url) }}">
                @if($banner->ads_url !='')
				</a>
				@endif
				@endforeach
			</div>
		</div>
	</div><!-- /AdvLeft -->
	@endif
	<?php 
	$bannerArr = DB::table('banner')->where(['object_id' => 3, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
	?>
	@if($bannerArr)
	<div id="advRight">
		<div class="banner_scroll" id="banner_right">
			<div class="item">
				@foreach($bannerArr as $banner)				
				@if($banner->ads_url !='')
				<a id="ban_117" href="{{ $banner->ads_url }}" target="_blank" style="width: 100px; display: block;">
				@endif				
                    <img src="{{ Helper::showImage($banner->image_url) }}">
                @if($banner->ads_url !='')
				</a>
				@endif
				@endforeach
			</div>
		</div>
	</div><!-- /Advight -->
	@endif

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
	@yield('javascript_page')
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajaxSetup({
		        headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $('.bxslider').bxSlider({
				pagerCustom: '#bx-pager',
				pager: true,
				auto: true,
				pause: 4000
			});
			$('#district_id').change(function(){
				var district_id = $(this).val();
				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'ward',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#ward_id').html(data).selectpicker('refresh');
					}
				});

				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'street',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#street_id').html(data).selectpicker('refresh');
					}
				});

				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'project',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#project_id').html(data).selectpicker('refresh');
					}
				})
			});
		});
		
	</script>
	<script>
		$(document).ready(function(){
			$('ul.tabssssss li.tab-link').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tabssssss li.tab-link').removeClass('active');
				$('.tab-contents').removeClass('active');

				$(this).addClass('active');
				$("#"+tab_id).addClass('active');
			});
			$(function(){
				// Determine the div width parent
				var width = document.getElementById('nav-tabs-langding').offsetWidth;
				// Determine the div width parent
				var mainDiv = $('#nav-tabs-langding');
				var childDivCount = mainDiv.find('li').length;
				// Get width for li
				var widthItem = width/childDivCount;
				$('#nav-tabs-langding li').css("width", widthItem);
		   });
		});
		$(window, document, undefined).ready(function() {
			$('input , textarea').blur(function() {
			var $this = $(this);
			if ($this.val())
		  		$this.addClass('used');
			else
		  		$this.removeClass('used');
			});
			var $ripples = $('.ripples');
			$ripples.on('click.Ripples', function(e) {
				var $this = $(this);
				var $offset = $this.parent().offset();
				var $circle = $this.find('.ripplesCircle');

				var x = e.pageX - $offset.left;
				var y = e.pageY - $offset.top;

				$circle.css({
					top: y + 'px',
					left: x + 'px'
				});
				$this.addClass('is-active');
			});
			$ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
				$(this).removeClass('is-active');
			});
		});
	</script>

</body>
</html>