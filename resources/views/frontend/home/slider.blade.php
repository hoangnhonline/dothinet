@section('slider')
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
@endsection