<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
Route::get('/', function () {
    return view('welcome');
});
Route::get('', [
    HomeController::class,
    'index'

]);
Route::get('/trang_chu', [
    HomeController::class,
    'index'
] );
//Admin
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
    // Các route khác của admin
});
Route::get('/admin', [
    AdminController::class,
    'index'
] );    
Route::post('/admin-dashboard', [
    AdminController::class,
    'dashboard'
] );
Route::get('/logout', [
    AdminController::class,
    'logout'
] ); 
Route::middleware(AdminMiddleware::class)->group(function () {
    //Category_product
    Route::get('/add_category_product', [
    CategoryProductController::class,   
    'add_category_product'
    ] );
    Route::get('/all_category_product', [
        CategoryProductController::class,   
        'all_category_product'
    ] );       
    Route::post('/save_category_product', [
        CategoryProductController::class, 
        'save_category_product'
    ])->name('save_category_product');
    Route::post('/active_category_product/{category_id}', [
        CategoryProductController::class,   
        'active_category_product'
    ]);
    Route::get('/edit_category_product/{category_id}', [
        CategoryProductController::class,   
        'edit_category_product'
    ] ); 
    Route::get('/delete_category_product/{category_id}', [
        CategoryProductController::class,   
        'delete_category_product'
    ] ); 
    Route::post('/update_category_product/{category_id}', [
        CategoryProductController::class,   
        'update_category_product'
    ] );
    //Brand_product
    Route::get('/add_brand_product', [
        BrandProductController::class,   
        'add_brand_product'
    ] );
    Route::get('/all_brand_product', [
        BrandProductController::class,   
        'all_brand_product'
    ] );       
    Route::post('/save_brand_product', [
        BrandProductController::class, 
        'save_brand_product'
    ])->name('save_brand_product');
    Route::post('/active_brand_product/{brand_id}', [
        BrandProductController::class,   
        'active_brand_product'
    ]);
    Route::get('/edit_brand_product/{brand_id}', [
        BrandProductController::class,   
        'edit_brand_product'
    ] ); 
    Route::get('/delete_brand_product/{brand_id}', [
        BrandProductController::class,   
        'delete_brand_product'
    ] ); 
    Route::post('/update_brand_product/{brand_id}', [
        BrandProductController::class,   
        'update_brand_product'
    ] );
    //product
    Route::get('/add_product', [
        ProductController::class,   
        'add_product'
    ] );
    Route::get('/all_product', [
        ProductController::class,   
        'all_product'
    ] );       
    Route::post('/save_product', [
        ProductController::class, 
        'save_product'
    ])->name('save_product');
    Route::post('/active_product/{product_id}', [
        ProductController::class,   
        'active_product'
    ]);
    Route::get('/edit_product/{product_id}', [
        ProductController::class,   
        'edit_product'
    ] ); 
    Route::get('/delete_product/{product_id}', [
        ProductController::class,   
        'delete_product'
    ] ); 
    Route::post('/update_product/{product_id}', [
        ProductController::class,   
        'update_product'
    ] );

});
