@section('slider')
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
<section class="block-slider-home">
@if($bannerArr)
	<div class="owl-carousel dotsData owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="false" data-loop="true">
		<?php $i = 0; ?>
		@foreach($bannerArr as $banner)
		 <?php $i++; ?>
		<div class="item-slide" data-dot="{{ $i }}">
			@if($banner->ads_url !='')
			<a href="{{ $banner->ads_url }}">
			@endif
				<img src="{{ Helper::showImage($banner->image_url) }}" alt="slide {{ $i }}">
			@if($banner->ads_url !='')
			</a>
			@endif
		</div><!-- item-slide1 -->
		@endforeach		
	</div>
@endif
</section><!-- /block-slider -->
@endsection