<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

// Route::get('/', function () {
//     return response("<h1>Hello There</h1>", 200)
//         ->header('Content-Type', 'text/plain');
// });

// Route::get("/posts/{id}", function($id) { 
//     return view("hello", ['id' => $id]);
// })->where('id', "\d+");

// Route::get("/search", function(Request $res) { 
//     return view("hello", ['pet' => $res->pet]);
// });

Route::get("/", 
    [ListingController::class, "index"]

    // function() {
        // return view("listings", [
            // "heading"  => "Latest Listings",
            // "listings" => Listing::all(), 
        // ]);
    // }
);

Route::get("/listings/{listing}", 
    [ListingController::class, "show"]

    // function(Listing $listing) {
        // return view('listing', [
        //     'listing' => $listing
        // ]);

        // if (Listing::find($id)) {
        //     return view("listing", [
        //         "listing" => Listing::find($id)
        //     ]);
        // } else {
        //     return response("<h1>Listing not found.</h1>");
        // }
    // }
);