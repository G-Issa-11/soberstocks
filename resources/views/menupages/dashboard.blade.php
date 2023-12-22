@extends('layouts.home')

@section('head')
    <!-- Include the necessary stylesheets -->
    
    
@endsection

@section('content')
    <!-- Inside your dashboard blade -->
  
<link rel="stylesheet" href="{{asset('assets/css/index.css')}}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <!-- Your existing HTML content -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active" style="margin-left: 50px;">
              <a class="nav-link" href="#">Stock Time Series</a>
            </li>
            <li class="nav-item" style="margin-left: 50px">
              <a class="nav-link" href="forex.html">Forex(FX)</a>
            </li>
          </ul>
        </div>
      </nav>

      <div id="company_container">
        <select id="companies" class="btn btn-light" name="companies">
          <option value="Apple Inc(AAPL)">Apple Inc (AAPL)</option>
          <option value="Microsoft Corp(MSFT)">Microsoft Corp (MSFT)</option>
          <option value="International Business Machine(IBM)"
            >International Business Machine (IBM)</option
          >
        </select>
        <button
          id="get_data"
          onclick="getData()"
          class="btn get-data-btn"
          style="margin-left: 5%;"
        >
          Get Data
        </button>
      </div>

      <div id="loading_container">
        {{-- <progress></progress> --}}
        <div class="circular-progress">
            <div class="spinner"></div>
          </div>
          
      </div>

      <button id="download_data" onclick="download()" class="btn btn-danger">
        Download Data(CSV)
      </button>

    <div id="chartContainer"></div>
    <div id="table_container"></div>

    <!-- Include the necessary scripts -->
    
@endsection
