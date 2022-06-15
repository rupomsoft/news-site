@extends('Layout.app')
@section('title', "Home")

@section('trending')
    @include('Component.Trending')
@endsection

@section('content')
        @include('Component.AdvertiseModal')
        @include('Component.AdvertiseBottomFixed')
{{--        @include('Component.Marque')--}}
        @include('Component.FirstLead')
        @include('Component.SecondLead')
        @include('Component.Politics')
        @include('Component.National')
        @include('Component.sports')
        @include('Component.International')
        @include('Component.Entertainment')
        @include('Component.SampleComonent1')
        @include('Component.SampleComponent2')
        @include('Component.SampleComponent3')
        @include('Component.Video')
        @include('Component.ImageGallery')
        @include('Component.Feature')
@endsection
