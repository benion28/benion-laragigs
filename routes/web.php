<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('listings', [
//         'listings' => Listing::all()
//     ]);
// });

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Route::get('/hello', function () {
//     return "Hello World";
// });

// Route::get('/hello', function () {
//     return response("Hello World");
// });

// Route::get('/hello', function () {
//     return response("<h1>Hello World</h1>");
// });

// Route::get('/hello', function () {
//     return response("<h1>Hello World</h1>")->header('Content-Type', 'text/html');
// });

// Route::get('/hello', function () {
//     return response("Hello World", 200)->header('Content-Type', 'text/plain');
// });

Route::get('/hello', function () {
    return response("<h1>Hello World</h1>", 200)
        ->header('Content-Type', 'text/html')
        ->header('foo', 'bar');
});

// Route::get('/posts/{id}', function ($id) {
//     return response("Post " . $id);
// });

// Route::get('/posts/{id}', function ($id) {
//     return response("Post " . $id);
// })->where('id', '[0-9]+');

// Route::get('/posts/{id}', function ($id) {
//     dd($id);
//     return response("Post " . $id);
// })->where('id', '[0-9]+');

// Route::get('/posts/search', function (Request $request) {
//     dd($request);
// });

Route::get('/posts/search', function (Request $request) {
    return $request->name . ' ' . $request->city;
});

Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            [
                'id' => 1,
                'title' => 'Post One',
            ]
        ]
    ]);
});

Route::get('/test', function () {
    return view('testings-1', [
        'heading' => 'Testing User John Doe',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'This is Listing One, description. This is Listing One, description. This is Listing One, description.',
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'This is Listing Two, description. This is Listing Two, description. This is Listing Two, description.',
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'This is Listing Three, description. This is Listing Three, description. This is Listing Three, description.',
            ]
        ]
    ]);
});

Route::get('/tests', function () {
    return view('testings-2', [
        'heading' => 'Testing User John Doe',
        'listings' => Test::all()
    ]);
});

Route::get('/tests/{id}', function ($id) {
    return view('testing', [
        'listing' => Test::find($id)
    ]);
});

// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);

//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
// });

// Create Listing Form
// Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::get('/listings/create', [ListingController::class, 'listingForm'])->middleware('auth');

// Store Listing Data
// Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'submitListing'])->middleware('auth');

// Show Edit Listing Form
// Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'listingForm'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Update Listing
// Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'submitListing'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
