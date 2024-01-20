<?php

namespace App\Http\Controllers;

use App\WatchlistItem;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlistItems = auth()->user()->watchlistItems;
        return view('menupages.watchlist', compact('watchlistItems'));
    }

    public function addToWatchlist(Request $request)
    {
        // Validate request
        $request->validate([
            'symbol' => 'required|max:255',
            'company_name' => 'required|max:255',
        ]);

        // Create a new watchlist item
        $watchlistItem = new WatchlistItem([
            'symbol' => $request->input('symbol'),
            'company_name' => $request->input('company_name'),
            'user_id' => auth()->user()->id,
        ]);
        $watchlistItem->save();

        return back()->with('success', 'Added to watchlist!');
    }

    public function removeFromWatchlist(WatchlistItem $item)
    {
        // Find and delete the watchlist item
        if(auth()->user()->id === $item['user_id']) {
            $item->delete();
        }
        // return redirect('/home/blog');
        // $watchlistItem = WatchlistItem::find($id);
        // $watchlistItem->delete();

        return back()->with('success', 'Removed from watchlist!');
    }
}
