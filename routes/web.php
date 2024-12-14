<?php

use App\Models\Product;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    Benchmark::dd([ 
        'Eloquent' => fn() => Product::get(),
        'Laravel Raw' => fn() => DB::table('products')->get(),
    ], 25);
});

Route::get('/lazy', function () {

    $produtos = Product::all();
    
    foreach ($produtos as $produto) {
        echo $produto->photo->id;
    }

    return '';
});

Route::get('/eager', function () {

    $produtos = Product::with('photo')->get();

    // $produtos = Product::all();
    // $produtos->load('photo');

    foreach ($produtos as $produto) {
        echo $produto->photo->id;
    }

    return '';
});


Route::get('/join', function () {

    $produtos = Product::
        select('products.*', 'photos.id as photo_id')
        ->join('photos', 'products.id', '=', 'photos.product_id')->get();

    foreach ($produtos as $produto) {
        echo $produto->photo_id;
    }

    return '';
});


Route::get('/eager-select', function () {

    $produtos = Product::with([
        'photo' => function ($query) {
            $query->select('id', 'name', 'product_id');
        }
    ])->get();

    foreach ($produtos as $produto) {
        echo $produto->photo->id;
    }

    return '';
});

Route::get('/paginate', function () {

    $produtos = Product::paginate(50);

    foreach ($produtos as $produto) {
        echo $produto->id;
    }

    return '';
});

Route::get('/chunk', function () {

    Product::chunk(100, function ($produtos) {
        foreach ($produtos as $produto) {
            // Processa cada bloco de 100 produtos
            echo $produto->id;
        }
    });

    return '';
});

Route::get('/cache', function () {

    $produtos = Cache::remember('produtos_ativos', 60, function () {
        return Product::get();
    });

    foreach ($produtos as $produto) {
        echo $produto->id;
    }

    return '';
});
