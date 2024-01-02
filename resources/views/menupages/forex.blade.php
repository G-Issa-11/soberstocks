@extends('layouts.dashboard')

@section('head')

@endsection


@section('tab-content')
    <div id="currency_container">
            <label>From</label>
            <select id="from_currency" class="btn btn-light" name="from_currency" style="margin-left: 2%;">
            </select>
            <label style="margin-left: 5%;">To</label>
            <select id="to_currency" class="btn btn-light" name="to_currency" style="margin-left: 2%;">
            </select>
            <button id="get_data" onclick="getData()" class="btn get-data-btn" style="margin-left: 5%;">Get Data</button>
          </div>
          <button id="download_data" onclick="download()" class="btn btn-danger">
              Download Data(CSV)
            </button>
          @include('partials.loading-circle')
          <div id="exchange_chart">
            <div id="exchange" style="display:none"></div>
            <div id="chartContainer"></div>
          </div>
          <div id="table_container"></div>
          <script>
            const apiKeyCurrency = "{{ env('API_KEY_CURRENCY') }}";
            const apiKeyRate = "{{ env('API_KEY_RATES') }}";
        </script>
          <script src="{{ asset('assets/js/forex.js') }}" defer></script>
@endsection