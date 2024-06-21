<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\Crud\BrandController;
use App\Http\Controllers\Crud\CategorieController;
use App\Http\Controllers\Crud\DetailsOrderController;
use App\Http\Controllers\Crud\DetailsProductController;
use App\Http\Controllers\Crud\DetailsUserController;
use App\Http\Controllers\Crud\ModeloController;
use App\Http\Controllers\Crud\ProductController;
use App\Http\Controllers\Crud\SupplierController;
use App\Http\Controllers\Crud\UserController;
use App\Http\Controllers\Crud\TransportController;
use App\Http\Controllers\Crud\OrderController;
use App\Http\Controllers\Crud\OrderItemsController;
use App\Http\Controllers\ShoppingCartDetailController;
Route::controller(FrontController::class)->group(function(){
    Route::get('/','index')->name('Front.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teams', function () {
    return view('teams');
})->middleware(['auth', 'verified'])->name('teams');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/index',[FrontController::class,'index'] )->name('index');

Route::get('/Registrar', function () {
    return view('auth.register');
})->name('registrar');
Route::get('/admin/dashboard', [DashboardController::class]);

Route::get('/seccion1',[ListController::class,'seccion1'] )->name('seccion1');
Route::get('/seccion2',[ListController::class,'seccion2'] )->name('seccion2');
Route::get('/seccion3',[ListController::class,'seccion3'] )->name('seccion3');
Route::get('/seccion4',[ListController::class,'seccion4'] )->name('seccion4');

Route::get('/auth/redirect',[AuthController::class,'Redirect'] )
    ->name ('auth.redirect');

Route::get('/auth/callback', [AuthController::class,'callback'])
    ->name ('auth.callback');

require __DIR__.'/auth.php';

#######CRUD#####
Route::resource('product', ProductController::class);
Route::resource('detailsProduct', DetailsProductController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('brand', BrandController::class);
Route::resource('modelo', ModeloController::class);
Route::resource('user', UserController::class);
Route::resource('transport', TransportController::class);
Route::resource('order', OrderController::class);
Route::resource('detailsUser', DetailsUserController::class);

######## carrito########

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/generate-invoice', [CartController::class, 'generateInvoice'])->name('cart.generateInvoice');
});






route::get('admin/dashboard',[HomeController::class,'index'])->
  middleware(['auth','admin'])-> name('dashboard.admin');