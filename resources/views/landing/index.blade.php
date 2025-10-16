@extends('layouts.landing')

@section('title', 'PolCaBot - Home')

@section('landing-content')
    @include('landing.home')
    @include('landing.features')
    @include('landing.about')
    @include('landing.contact')
@endsection