@include('frontend.partials.meta')
@section('content')
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
@endsection