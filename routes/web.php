<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::domain('k4.grassstation.xyz')->group(function () {
    Route::get('/', [Controllers\Gsk4Controller::class, 'index'])->name('k4.root');
    
    Route::get("menu",[Controllers\Gsk4Controller::class, 'menu'])->name('k4.menu');
    Route::get("contact",[Controllers\Gsk4Controller::class, 'contact'])->name('k4.contact');
});
Route::domain('tattoo.grassstation.xyz')->group(function () {
    Route::get('/', [Controllers\GsTtController::class, 'index'])->name('tat.root');
    
    Route::get("works",[Controllers\GsTtController::class, 'works'])->name('tat.works');
    Route::get("contact",[Controllers\GsTtController::class, 'contact'])->name('tat.contact');
});
Route::get('/', [Controllers\GsController::class, 'index'])->name('root');

Route::get("menu",[Controllers\GsController::class, 'menu'])->name('menu');
Route::get("contact",[Controllers\GsController::class, 'contact'])->name('contact');


Route::domain('members.grassstation.xyz')->group(function () {
    Route::get('/', [Controllers\GsMController::class, 'index'])->name('m.root');
    
    Route::get("login",[Controllers\GsMLoginController::class, 'menu'])->name('m.login');
});

Route::get("map",function () {
    return view('map');
})->name('map');

Route::get("products/json",[Controllers\ProductController::class, 'json'])->name('products.json');
Route::post("products/json",[Controllers\ProductController::class, 'jsonX'])->name('products.jsonX');
Route::resource('products',Controllers\ProductController::class);
Route::post("products/{product}/pic",[Controllers\ProductController::class, 'picUpdate'])->name('products.picup')->middleware('auth');
Route::resource('article',Controllers\ArticleController::class);
Auth::routes(['register' => false,'reset' => false,'verify' => false]);

Route::get('admin/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/menu', [Controllers\HomeController::class, 'menu'])->name('admin.menu');
Route::get('admin/article', [Controllers\HomeController::class, 'article'])->name('admin.article');
Route::resource('admin/pics',Controllers\ProductPicController::class);
Route::post('admin/picmodify',[Controllers\ProductPicController::class, 'modify'])->name("pics.modify")->middleware('auth');
Route::post('admin/fs',[Controllers\ProductController::class, 'flipStock'])->name('products.fs')->middleware('auth');

Route::get('/generate-sitemap', [Controllers\SitemapController::class, 'index']);

Route::domain('forms.grassstation.xyz')->group(function () {
    Route::get('/', [Controllers\GsFController::class, 'index'])->name('f.root');
    
    //GSF01: Plant Material Intake Forms
    Route::get("gsf01/s",[Controllers\GsFController::class, 'suppliers'])->name('f.suppliers');
    Route::get("gsf01/i",[Controllers\GsFController::class, 'intake'])->name('f.intake');
    Route::get("gsf01/p",[Controllers\GsFController::class, 'product'])->name('f.product');

    //GSF02: Client Reporting Forms
    Route::get("gsf02/c",[Controllers\GsFController::class, 'cust'])->name('f.customer');

    //GSF03: Plant Material Discharge Forms
    Route::get("gsf03/sales",[Controllers\GsFController::class, 'sales'])->name('f.sales');
    Route::get("gsf03/shifts",[Controllers\GsFController::class, 'shifts'])->name('f.shifts');
});
Route::domain('admin.grassstation.xyz')->group(function () {
    Route::get('/', [Controllers\GsAController::class, 'index'])->name('a.root');
    
    Route::get("pos",[Controllers\GsAController::class, 'ps'])->name('a.pos');
});