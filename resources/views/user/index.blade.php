@extends('user.layouts.layouts')
@section('user_layout')

{{-- Model --}}
@include('user.contents.model')

<!-- slider-->
@include('user.contents.slider')

<!-- category slider-->
@include('user.contents.category_slider')

<!-- banners-->
@include('user.contents.banner')

<!-- Products Tabs-->
@include('user.contents.products_tab')

<!-- Best Sales-->
@include('user.contents.best_sales')

<!-- Deals-->
@include('user.contents.deals')

<!-- Top selling-->
@include('user.contents.top_selling')

@endsection