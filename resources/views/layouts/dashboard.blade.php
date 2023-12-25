@extends('layouts.home')

@section('head')
    <!-- Include the necessary stylesheets -->
    
    
@endsection

@section('content')
{{-- javscript specific to this page --}}
@include('partials.dashboard.head')

<!-- navbar -->
@include('partials.dashboard.navbar')

@yield('tab-content')
    
@endsection
