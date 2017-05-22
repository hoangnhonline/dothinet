@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<section class="col-sm-8 col-xs-12 block-sitemain">
	<article class="block block-news-new block-news-cate clearfix">
		<div class="block-cate-title"><h1>Tag : '{{ $detail->name }}'</h1></div>
		<div class="block-searchresult">			
			<span class="block-countresult">Có <b>{{ number_format(count($productList)) }}</b> bất động sản</span>
		</div>
		<div class="col-sm-12 col-xs-12">
			<div class="row">
				<div class="block-title block-title-catenews">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-tabs-cus" role="tablist">
						<li role="presentation" class="active"><a href="#dsrt" aria-controls="dsrt" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Danh sách BĐS</a></li>
					</ul>
				</div>
				<div class="block-contents">
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
						@if(!empty( (array) $productList ))
							<ul>
								@foreach( $productList as $product )
								<li class="news-new-item">
									<div class="news-new-item-head"><a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><img title="{{ $product->title }}" src="{{ $product->image_urls ? Helper::showImageThumb($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="{{ $product->title }}"></a></div>
									<div class="news-new-item-description">
										<h4>
											<a class="description-title vip1" title="{{ $product->title }}" href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><i class="vipdb fa fa-star"></i> {{ $product->title }} </a></h4>
                						<div class="description-info">
                							<div class="price"><label>Giá<span>:</span></label>{{ $product->price }} {{ Helper::getName($product->price_unit_id, 'price_unit')}}</div>
				                            <div class="area"><label>Diện tích<span>:</span></label>{{ $product->area }} m<sub>2</sub></div>
				                            <div class="location"><label>Vị trí<span>:</span></label>{{ Helper::getName($product->district_id, 'district')}} - {{ Helper::getName($product->city_id, 'city') }}</div>
                						</div>
                						<span class="date">{{ date('d/m/Y', strtotime($product->created_at)) }}</span>
									</div>
								</li>
								@endforeach
								
							</ul>
							@endif
							<!--<nav class="block-pagination">
								<ul class="pagination">
									<li><a class="selected" href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#" aria-label="Previous">Trang sau</a></li>
									<li><a href="#" aria-label="Next">Trang cuối</a></li>
								</ul>
							</nav>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</article><!-- /block-news-new -->
</section><!-- /block-site-left -->
@endsection