@include('frontend.partials.meta')
@section('content')
<section class="col-sm-8 col-xs-12 block-sitemain">
  <article class="block block-news-default row">
    <div class="block-news-default-left">
      <div class="col-sm-7 col-xs-12">
        <div class="block-news-default-item" style="height:346px">
          <div class="block-thumb">
            <a href="{{ route('news-detail', ['slug' => $tinThiTruong[0]['slug'], 'id' => $tinThiTruong[0]['id']]) }}" title="">
              <img src="{{ $tinThiTruong[0]['image_url'] ? Helper::showImageThumb($tinThiTruong[0]['image_url'], 2) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="">
            </a>
          </div>
          <h2 class="block-title">
                  <a href="{{ route('news-detail', ['slug' => $tinThiTruong[0]['slug'], 'id' => $tinThiTruong[0]['id']]) }}" title="">{{ $tinThiTruong[0]['title'] }}</a>
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
          <li><h3><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="">{{ $tin['title'] }}</a></h3></li>
          @endif
          @endforeach
        </ul>
      </div>
    </div><!-- /block-news-default-right -->
  </article><!-- /block-news-default -->

  <article class="block block-news-new clearfix">
    <div class="col-sm-12 col-xs-12">      
        <div class="row">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#trmn1" aria-controls="trmn1" role="tab" data-toggle="tab">BĐS BÁN</a>
            </li>
            <li role="presentation">
              <a href="#trmn2" aria-controls="trmn2" role="tab" data-toggle="tab">BĐS CHO THUÊ</a>
            </li>
          </ul>
          
          <div class="block-contents">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="trmn1">
                <ul>                  
                  @foreach($hotProduct as $product)
                    <li class="news-new-item">                      
                      <div class="news-new-item-head">
                        <a  href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><img  title="" src="{{ $product->image_urls ? Helper::showImageThumb($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" ></a>
                      </div>
                      <div class="news-new-item-description">
                        <h4><a class="description-title vip1" href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}">{{ $product->title }}</a></h4>
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
              </div><!-- /home -->
              <div role="tabpanel" class="tab-pane" id="trmn2">
                  <ul>
                  @foreach($hotProduct2 as $product)
                    <li class="news-new-item">                      
                      <div class="news-new-item-head">
                        <a  href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><img  title="" src="{{ $product->image_urls ? Helper::showImageThumb($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" style="height:128px !important;width:100% !important;"></a>
                      </div>
                      <div class="news-new-item-description">
                        <h4><a class="description-title vip1" href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}">{{ $product->title }}</a></h4>
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
              </div><!-- /profile -->
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
              <a href="{{ route('news-detail', ['slug' => $phongthuy[0]['slug'], 'id' => $phongthuy[0]['id']]) }}" title="">
                <img src="{{ $phongthuy[0]['image_url'] ? Helper::showImageThumb($phongthuy[0]['image_url'], 2, '312x234') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="">
              </a>    
                    
                    <h4><a href="{{ route('news-detail', ['slug' => $phongthuy[0]['slug'], 'id' => $phongthuy[0]['id']]) }}">{{ $phongthuy[0]['title'] }}</a></h4>
                </div>
                <div class="fengshui-news-list">
                  <ul>
                    <?php $i =0; ?>
                  @foreach($phongthuy as $tin)
                  <?php $i++; 
                  ?>
                  @if($i > 1)
                  <li><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="">{{ $tin['title'] }}</a></li>
                  @endif
                  @endforeach
                    
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
                    <a href="{{ route('news-detail', ['slug' => $khonggiansong[0]['slug'], 'id' => $khonggiansong[0]['id']]) }}" title="">
                <img src="{{ $khonggiansong[0]['image_url'] ? Helper::showImageThumb($khonggiansong[0]['image_url'], 2) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="">
              </a>    
                    
                    <h4><a href="{{ route('news-detail', ['slug' => $khonggiansong[0]['slug'], 'id' => $khonggiansong[0]['id']]) }}">{{ $khonggiansong[0]['title'] }}</a></h4>
                </div>
                <div class="fengshui-news-list">
                  <ul>
                     <?php $i =0; ?>
                      @foreach($khonggiansong as $tin)
                      <?php $i++; 
                      ?>
                      @if($i > 1)
                      <li><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="">{{ $tin['title'] }}</a></li>
                      @endif
                      @endforeach
                  </ul>
                </div>
          </div>
        </div>
      </div>
    </div>
  </article><!-- /block-fengshui -->



</section><!-- /block-site-left -->
@endsection