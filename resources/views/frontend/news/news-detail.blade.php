@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.main-header')
    @include('frontend.partials.home-menu')
  @endsection
  
  @include('frontend.news.content-news-detail')

  

  @section('javascript_page')
  	
@endsection