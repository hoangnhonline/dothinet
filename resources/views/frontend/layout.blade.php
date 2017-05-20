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
	<meta name="csrf-token" content="{{ csrf_token() }}" />
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
					<li class="level0 {{ \Request::route()->getName() == "home" ? "active" : "" }}"><a class="" href="{{ route('home') }}">Trang chủ</a></li><!-- END MENU HOME -->
					<li class="level0 parent">
						<a href="#">BĐS bán</a>
						<ul class="level0 submenu">
							@foreach($banList as $ban)
							<li class="level1"><a href="{{ route('danh-muc', $ban->slug ) }}">{{ $ban->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU SHOP -->
					<li class="level0"><a href="#">BĐS cho thuê</a>
						<ul class="level0 submenu">
							@foreach($thueList as $thue)
							<li class="level1"><a href="{{ route('danh-muc', $thue->slug ) }}">{{ $thue->name }}</a></li>							
							@endforeach
						</ul>
					</li><!-- END MENU BLOG -->
					@foreach($articleCate as $value)
					<li class="level0 {{ isset($cateDetail) && $cateDetail->id == $value->id ? "active" : "" }}"><a href="{{ route('news-list', $value->slug) }}">{{ $value->name }}</a></li>
					@endforeach
					<li class="level0"><a href="{{ route('du-an') }}">Dự án</a></li>
					<li class="level0 postnew"><a href="{{ route('ky-gui') }}"><img src="{{ URL::asset('assets/images/icon-postnews.png') }}" alt="Ký gửi"> Ký gửi</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
        </div>
	</nav><!-- /navigation -->

	@yield('slider')
	
	@yield('search')

	<section class="main" id="site-main">
		<section class="container">
			<section class="row">
				
				@yield('content')
				@if(\Request::route()->getName() != "ky-gui")
				<section class="col-sm-4 col-xs-12 block-sitebar">
					<article class="block-sidebar block-news-sidebar">
						<div class="block-title-common">
							<h3><span class="icon-tile"><i class="fa fa-star"></i></span> Tin xem nhiều</h3>
						</div>
						<div class="block-contents">
							<ul class="block-list-sidebar block-icon-title">
								@foreach($tinRandom as $tin)
		                      
		                      <li><h4><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="">{{ $tin['title'] }}</a></h4></li>
		                     
		                      @endforeach
								
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
								@if($landingList)
									@foreach($landingList as $value)
									<div class="large-item">
		                                <a href="{{ route('detail-project', [$value->slug, $value->id])}}" title=""><img src="{{ $value->image_url ? Helper::showImageThumb($value->image_url, 3, '306x194') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" /></a>
		                                <h4><a href="{{ route('detail-project', [$value->slug, $value->id])}}" title="">{{ $value->name }}</a></h4>
		                                <p>{{ $value->address }}</p>
		                            </div>
		                            @endforeach
		                        @endif
								</div>
								<div id="bx-pager" class="bx-thumbnail">
									@if($landing2List)
									@foreach($landing2List as $value)
									<div class="item">
										<div class="item-child">
				                            <a data-slide-index="0" class="slide_title" onclick="location.href='{{ route('detail-project', [$value->slug, $value->id])}}'" href="{{ route('detail-project', [$value->slug, $value->id])}}" title=""><img class="avatar" src="{{ $value->image_url ? Helper::showImageThumb($value->image_url, 3, '306x194') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" /></a>
				                            <div class="slide_info">
				                                <a  onclick="location.href='{{ route('detail-project', [$value->slug, $value->id])}}'" href="{{ route('detail-project', [$value->slug, $value->id])}}" title="">{{ $value->name }}</a>
				                                <p>{{ $value->address }}</p>
				                            </div>
			                            </div>
			                        </div>
			                        @endforeach
			                        @endif			                       
			                        
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
								@foreach($customLink as $link)
								<li><h4><a href="{{ $link->link_url }}" title="{{ $link->link_text }}">{{ $link->link_text }}</a></h4></li>
								@endforeach
							</ul>							
						</div>
					</article><!-- /block-news-sidebar -->
				</section><!-- /block-site-right -->
				@endif
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

</body>
</html>