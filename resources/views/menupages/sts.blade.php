@extends('layouts.dashboard')

@section('head')
    <!-- Include the necessary stylesheets -->
    
    
@endsection

@section('tab-content')

      <div id="company_container">
        <select id="companies" class="btn btn-light" name="companies">
          <option value="Apple Inc(AAPL)">Apple Inc (AAPL)</option>
          <option value="Microsoft Corp(MSFT)">Microsoft Corp (MSFT)</option>
          <option value="International Business Machine(IBM)"
            >International Business Machine (IBM)</option
          >
          <option value="Google(GOOG)">Google (GOOG)</option>
    <option value="Amazon(AMZN)">Amazon (AMZN)</option>
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

      @include('partials.loading-circle')

      <button id="download_data" onclick="download()" class="btn btn-danger">
        Download Data(CSV)
      </button>

    <div id="chartContainer"></div>
    <div id="table_container"></div>

    <!-- Include the necessary scripts -->
    <script src="{{ asset('assets/js/index.js') }}" defer></script>
    
@endsection


