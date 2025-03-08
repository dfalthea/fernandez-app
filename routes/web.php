<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Services\ProductService;
use App\Http\Controllers\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-container', function (Request $request) {
    $input = $request ->input ('key');
    return $input;
});

Route::get('/test-provider', function (UserService $userService) {
    dd($userService->listUsers());
});

Route::get('/test-users', [UserController::class, 'index']);

Route::get('/test-facade', function (UserService $userService) {
    dd(Response::json($userService->listUsers()));
});


Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . "- Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id','[1-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search','.*');


Route::get('/test/route', function () {
    return route ('test-route');
})->name('test-route');

Route::get('/users', [UserController::class, 'index'])->middleware ('user-middleware');

Route::resource('products', Product::class);

Route::get('/product-list', function (ProductService $productService){
    $data['products']= $productService->listProducts();
    return view('products.list', $data);
});







