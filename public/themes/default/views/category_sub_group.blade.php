@extends('layouts.main')

@section('content')
    <!-- CATEGORY COVER IMAGE -->
    @include('banners.category_cover', ['category' => $categorySubGroup])

    <!-- HEADER SECTION -->
    @include('headers.category_sub_group_page', ['category' => $categorySubGroup])

    <!-- CONTENT SECTION -->
    @include('contents.category_page', ['category' => $categorySubGroup])

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection