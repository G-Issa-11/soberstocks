@extends('layouts.app')

@section('content')
    @include('partials.header')

    <main>
        @include('partials.hero')
        @include('partials.service')
        @include('partials.about')
        @include('partials.cta')
        @include('partials.contact')
    </main>

    @include('partials.footer')
@endsection
