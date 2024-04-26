@extends('layouts.home')

@section('head')
@endsection

@section('content')

@auth

{{-- <form action="{{ route('predict.show') }}" method="POST">
    @csrf
    <button type="submit" class="get-data-btn">Show Prediction</button>
</form> --}}
<h1>Predicted Close Price: {{ $predictedClosePrice }}</h1>
@endauth

@endsection
