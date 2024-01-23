<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('show', function () {
    return view('blog.' . request('page'), ['type' => request('page')]);
});

Route::get('demo', function () {
    $prevPage = env('FRONTEND_URL_SHOP');
    switch (request('url')) {
        case 'shop-guest-index':
            $prevPage = env('FRONTEND_URL_SHOP');
            break;
        case 'shop-member-stash':
            $prevPage = env('FRONTEND_URL_SHOP') . '/member/stash';
            break;
        case 'shop-guest-show':
            $prevPage = env('FRONTEND_URL_SHOP') . '/guest/show?category=' . request('category') . '&type=' . request('type');
            break;
        case 'blog-guest-website':
            $prevPage = env('APP_URL') . '/blog/show?page=website';
            break;
        default:
            # code...
            break;
    }

    session()->put('url', $prevPage);

    request('file') == null ? $file = 'index' : $file = request('file');

    $back = "<a class='back' href=" . $prevPage . ">Back<img src='/web/button-back.svg'><span>This button is not included in this website, only helps to return to the previous page</span></a>";

    return view('shop.web.' . request('category') . '.' . request('type') . '.' . $file, ['back' => $back, 'title' => "iogm.website • " . request('category') . "• " . request('type')]);
});



// require __DIR__ . '/auth.php';
