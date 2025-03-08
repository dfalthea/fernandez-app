<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function($app) {
            $products = [
                [
                    'id' => 1,
                    'name' => 'apple',
                    'category' => 'fruit'
                ],
                [
                    'id' => 2,
                    'name' => 'carrots',
                    'category' => 'vegetables'
                ],
                [
                    'id' => 3,
                    'name' => 'tomato',
                    'category' => 'vegetables'
                ]
        

                ];
                return new ProductService($products);


        });
    
}
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey', 'key-thea');
    }
}
