<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ProductService;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome', ['name' => 'fernandez-app']);
});

Route::get('/users', [UserController::class, 'index']);

Route::resource('/products', ProductController::class);


Route::get('/test-container', function (Request $request) {
    return $request->input('key');
});

Route::get('/test-provider', function (UserService $userService) {
    return response()->json($userService->listUsers());
});

Route::get('/test-facade', function (UserService $userService) {
    return response()->json($userService->listUsers());
});


Route::get('/post/{post}/comment/{comment}', function (string $post, string $comment) {
    return "Post ID: " . $post . " - Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[1-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');


Route::get('/test/route', [UserController::class, 'test'])->name('test-route');


Route::get('/product-list', function (ProductService $productService) {
    return view('products.list', ['products' => $productService->listProducts()]);
});
