@extends('layouts.login')

@section('content')
    <div class="container-2" data-container-2>
        @include('auth._forms_container')
        @include('auth._panels_container')
    </div>
@endsection
