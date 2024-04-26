<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function index() {
        // Make HTTP request to Flask API endpoint
        $response = Http::get('http://127.0.0.1:5000/predicted_close_price');

        // Check if the request was successful and the response contains predicted_close_price key
        if ($response->successful() && $response->json()['predicted_close_price']) {
            // Extract predicted close price value from the response
            $predictedClosePrice = $response->json()['predicted_close_price'];

            // Pass the predicted close price value to the view
            return view('menupages.prediction', ['predictedClosePrice' => $predictedClosePrice]);
        } else {
            // Handle the case where the API response is not successful or doesn't contain predicted_close_price key
            return view('error');
        }
    }

    public function predictStock(Request $request)
    {
        // Make HTTP request to Flask API endpoint
        $response = Http::get('http://127.0.0.1:5000/predicted_close_price');

        // Check if the request was successful and the response contains predicted_close_price key
        if ($response->successful() && $response->json()['predicted_close_price']) {
            // Extract predicted close price value from the response
            $predictedClosePrice = $response->json()['predicted_close_price'];
            echo($predictedClosePrice );

            // Pass the predicted close price value to the view
            return view('menupages.prediction', ['predictedClosePrice' => $predictedClosePrice]);
        } else {
            // Handle the case where the API response is not successful or doesn't contain predicted_close_price key
            return view('error');
        }
    }
}
