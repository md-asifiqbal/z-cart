@extends('layouts.main')

@section('content')
    <!-- breadcrumb -->
    @include('headers.cart_page')

    <!-- CONTENT SECTION -->
    @include('contents.cart_page')

    <div class="space30"></div>

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection

@section('scripts')
    @include('modals.ship_to')
    @include('scripts.cart')
    @include('scripts.dynamic_checkout')
@endsection