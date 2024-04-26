@extends('layouts.home')

@include('partials.dashboard.head')

@section('content')

@auth
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container">

    <!-- Form for adding new items to the watchlist -->
    <form action="{{ route('watchlist.add') }}" method="POST" class="watchlist-form">
        @csrf
        <div class="form-group">
            <label for="stockDropdown">Select Stock:</label>
            <select name="symbol" id="stockDropdown" class="form-control custom-select" required>
                <option value="AAPL">Apple Inc.</option>
                <option value="GOOG">Alphabet Inc. (Google)</option>
                <option value="MSFT">Microsoft Corporation</option>
                <option value="AMZN">Amazon.com Inc.</option>
                <option value="IBM">International Business Machines </option>
                
            </select>
            <!-- Hidden fields for company name -->
            <input type="hidden" name="company_name" id="companyName" value="">
        </div>
        <button type="submit" class="get-data-btn">Add to Watchlist</button>
    </form>


    @if (count($watchlistItems) > 0)
    <!-- Table for existing watchlist items -->
    <table class="table watchlist-table">
        <!-- Table headers -->
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Symbol</th>
                {{-- <th>Real Stock Price</th> --}}
                <th>Predicted Stock Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            @foreach ($watchlistItems as $item)
                <tr>
                    <td>{{ $item->company_name }}</td>
                    <td>{{ $item->symbol }}</td>
                    {{-- <td>Real Stock Price Placeholder (replace with actual value) --</td> --}}
                    <td>@if ($item->symbol=== 'IBM')
                        {{$predictedClosePrice}}
                    @else
                        --
                    @endif</td>
                    <td>
                        <form action="{{ route('watchlist.remove', ['item' => $item->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <i class="material-icons delete-icon" onclick="this.parentNode.submit()">delete</i>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="empty-warning">No items in your watchlist.</p>
@endif
</div>

<!-- JavaScript to update hidden field with selected company name -->
<script>
    document.getElementById('stockDropdown').addEventListener('change', function() {
        var companyName = this.options[this.selectedIndex].text;
        document.getElementById('companyName').value = companyName;
    });
</script>

@endauth
@guest
    Please login or sign up to get started!
@endguest
@endsection
