@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.search_results')

    <!-- CONTENT SECTION -->
    @include('contents.search_results')

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')
@endsection