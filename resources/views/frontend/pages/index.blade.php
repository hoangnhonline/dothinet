@extends('frontend.layout') 
  
@include('frontend.partials.meta')
@section('content')
<article class="block-breadcrumb-page">
  <ul class="breadcrumb"> 
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
     <li class="active"><a href="{{ route('danh-muc', $detailPage->slug) }}" title="{!! $detailPage->title !!}">{{ $detailPage->title }}</a></li>
  </ul>
</article>
<section class="block-page-article-1" style="padding:10px 5px">
  <article class="page-article-1-content">
    <div class="block-title-common">
      <h3><span class="icon-tile"><i class="fa fa-user"></i></span> {!! $detailPage->title !!}</h3>
    </div>
    <div class="block-content">
        <?php echo $detailPage->content; ?>
    </div>
  </article>
</section>
@endsection
  