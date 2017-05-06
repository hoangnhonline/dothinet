@include('frontend.partials.meta')
@section('content')
<section class="col-sm-8 col-xs-12 block-sitemain">
	<article class="block block-cate-news-detail">
		<h1>{{ $detail->name }}</h1>
		<div class="cate-news-detail-location">
	        <i class="fa fa-map-marker"></i> Khu vực:
	    	<a style="color: #015f95;" href="#">Cho thuê căn hộ chung cư tại Him Lam Riverside</a> - {{ Helper::getName($detail->district_id, 'district')}} - {{ Helper::getName($detail->city_id, 'city')}}
	    </div><!-- /cate-news-detail-location -->
	    <ul class="cate-news-detail-price">
			<li>Giá: <span>{{ $detail->price }} {{ Helper::getName($detail->price_unit_id, 'price_unit')}}</span></li>
			<li>Diện tích: <span>{{ $detail->area }}</span></li>
	    </ul><!-- /cate-news-detail-price -->
	    <hr>
	    <div class="cate-news-detail-desc">
	    	<h3>Thông tin mô tả</h3>
	    	<div class="cate-news-detail-desc-content">
	    		<?php echo $detail->description; ?>
	    	</div>
	    </div><!-- /cate-news-detail-desc -->
	    <div class="cate-news-detail-tab">
		 	<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a class="imgdetail" href="#home" aria-controls="home" role="tab" data-toggle="tab">Hình ảnh</a></li>
				<li role="presentation"><a class="mapdetail" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bản đồ</a></li>
			</ul>
		 	<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<div id="slide-detail">
						<ul class="slide-detail">
							@foreach( $hinhArr as $hinh )
							<li><img src="{{ Helper::showImage($hinh['image_url']) }}" /></li>
                            @endforeach
						</ul>
						<ul id="bx-pager-detail">
							<?php $i = 0; ?>
							@foreach( $hinhArr as $hinh )							
							<li><a data-slide-index="{{ $i }}" href=""><img src="{{ Helper::showImage($hinh['image_url']) }}" /></a></li>
							<?php $i++; ?>
							@endforeach
						</ul>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					<div class="block-map">
						<object class="mymap" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126263.60819855973!2d-84.44808690325613!3d33.735934882617194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDQ0JzQ1LjQiTiA4NMKwMjMnMzUuMyJX!5e0!3m2!1svi!2s!4v1475105845390"></object>
					</div>
				</div>
			</div>
	    </div><!-- /cate-news-detail-tab -->
	    <hr>
	    <div class="block-detail-info row">
	    	<div class="col-sm-6">
	    		<h3>Đặc điểm bất động sản</h3>
	    		<table class="table table-customize">	    			
	    			<tr>
	    				<td><b>Loại tin rao</b></td>
	    				<td>{{ Helper::getName($detail->estate_type_id, 'estate_type') }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Ngày đăng tin</b></td>
	    				<td>{{ date('d/m/Y', strtotime($detail->created_at)) }}</td>
	    			</tr>	    			
	    			<tr>
	    				<td><b>Hướng nhà</b></td>
	    				<td>{{ $detail->direction_id > 0 ? Helper::getName($detail->direction_id, 'direction')  : "KXD" }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Số phòng</b></td>
	    				<td>{{ $detail->no_room }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Số toilet</b></td>
	    				<td>{{ $detail->no_wc }}</td>
	    			</tr>
	    		</table>
	    	</div>
	    	<div class="col-sm-6">
	    		<h3>Thông tin liên hệ</h3>
	    		<table class="table table-customize">
	    			<tr>
	    				<td><b>Tên liên lạc</b></td>
	    				<td>{{ $detail->contact_name }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Địa chỉ</b></td>
	    				<td>{{ Helper::getName($detail->district_id, 'district')}} - {{ Helper::getName($detail->city_id, 'city') }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Di động</b></td>
	    				<td>{{ $detail->contact_mobile }}</td>
	    			</tr>
	    			<tr>
	    				<td><b>Email</b></td>
	    				<td>{{ $detail->contact_email }}</td>
	    			</tr>
	    		</table>
	    	</div>
	    </div><!-- /block-detail-info -->
	    <div class="block-share">
	    	<a href="#" class="btn btn-success"><i class="fa fa-print"> In tin này</i></a>
	    	<a href="#" class="btn btn-success"><i class="fa fa-save"> Lưu tin</i></a>
	    </div>
	</article><!-- /block-cate-news-detail -->

	<article class="block block-news-with-region">
		<div class="block-title block-title-common">
			<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> TIN RAO CÙNG KHU VỰC</h3>
		</div>
		<div class="block-contents">
			<div class="news-with-region-list">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
				</div>
				<a href="#" title="" class="viewall">
					<span class="glyphicon glyphicon-share-alt"></span>
					<i>Xem tất cả</i>
				</a>
			</div>
		</div>
	</article><!-- /block-news-with-region -->

	<article class="block block-news-with-region">
		<div class="block-title block-title-common">
			<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> TIN RAO CÙNG KHOẢNG GIÁ</h3>
		</div>
		<div class="block-contents">
			<div class="news-with-region-list">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<p>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </p>
			                        <p>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </p>
			                        <p>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </p>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
					<div class="col-sm-6 col-xs-12">
						<div class="news-with-region-item clearfix">
							<div class="news-with-region-title">
								<a href="#" title="">Cho thuê nhà mặt phố Trần Khát Chân, 40m2, mặt tiền 4m</a>
							</div>
							<div class="news-with-region-content">
								<div class="news-with-region-img">
									<a href="#" title=""><img src="images/with-region/20170327191629-dd4e.jpg" alt=""></a>
								</div>
								<div class="news-with-region-info">
									<div>
			                            <label>Giá:</label>
			                            <span>Thỏa thuận</span>
			                        </div>
			                        <div>
			                            <label>Diện tích:</label>
			                            40&nbsp;m²
			                        </div>
			                        <div>
			                            <label>Vị trí:</label>
			                            Hai Bà Trưng - Hà Nội
			                        </div>
								</div>
							</div>
						</div>
					</div><!-- /col-sm-6 col-xs-12 -->
				</div>
				<a href="#" title="" class="viewall">
					<span class="glyphicon glyphicon-share-alt"></span>
					<i>Xem tất cả</i>
				</a>
			</div>
		</div>
	</article><!-- /block-news-with-region -->
	
</section><!-- /block-site-left -->

@endsection
@section('javascript_page')
<script src="{{ URL::asset('assets/vendor/zoom/jquery.zoom.min.js') }}"></script>
<!-- Js bxslider -->
<script src="{{ URL::asset('assets/vendor/bx-slider/jquery.bxslider.min.js') }}"></script>
<!-- Countdown -->
<script src="{{ URL::asset('assets/vendor/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/updown.js') }}"></script>
<script type="text/javascript">
 $(document).ready(function () {
    $('.bxslider .item').each(function () {
        $(this).zoom();
    });

    $(".bxslider").bxSlider({
    	controls: false,
        pagerCustom: '.pro-thumb-img',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });

    $(".pro-thumb-img").bxSlider({
        slideMargin: 20,
        maxSlides: 4,
        pager: false,
        controls: true,
        slideWidth: 80,
        infiniteLoop: false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });
    /** COUNT DOWN **/
	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			var fomat ='<i class="fa fa-clock-o"></i> <b>Thời gian còn lại:</b> <span>%D ngày,</span> <span>%H</span> : %M<span class="minute"></span> : %S<span class="seconds"></span>';
			$this.html(event.strftime(fomat));
		});
	});
});

</script>
@endsection