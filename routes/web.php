<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SliderController;

use App\Http\Controllers\TwitterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Session\SessionCartController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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



Route::controller(TwitterController::class)->group(function(){
    Route::get('/auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('/auth/twitter/callback', 'handleTwitterCallback')->name('twitterCallBack');
});
Route::get('/khalti', [OrderItemController::class, 'khalti'])->name('khalti');
Route::get('/payment-success', [EsewaController::class, 'esewaSuccess'])->name('esewaSuccess');
Route::get('/payment-esewafailure/{orderId}', [EsewaController::class, 'esewaFailure'])->name('esewaFailure');
Route::get('/payment-esewa', [EsewaController::class, 'esewaRedirect'])->name('esewaRedirect');
// khalti start 
Route::get('verify-khalti', [KhaltiController::class, 'verifyKhalti'])->name('verifyKhalti');
// khalti end 

Route::prefix('admin/')->group(function(){

    //     Route::get('category', 'index')->name('category')     Route::get('category/create', 'create')->name('category.create')     Route::post('category', 'store')->name('category.store')     Route::get('category/edit/{id}', 'edit')->name('category.edit')     Route::put('category/update/{id}', 'update')->name('category.update')     Route::get('category/destroy/{id}', 'destroy')->name('category.destroy') });
   Route::get('home', [DashBoardController::class, 'index'])->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category', 'store')->name('category.store');
        Route::get('category/edit/{id}', 'edit')->name('category.edit');
        Route::put('category/update/{id}', 'update')->name('category.update');
        Route::get('category/destroy/{id}', 'destroy')->name('category.destroy');
    });
    Route::controller(SliderController::class)->group(function () {
        Route::get('slider', 'index')->name('slider');
        Route::get('slider/create', 'create')->name('slider.create');
        Route::post('slider', 'store')->name('slider.store');
        Route::get('slider/edit/{id}', 'edit')->name('slider.edit');
        Route::put('slider/update/{id}', 'update')->name('slider.update');
        Route::get('slider/destroy/{id}', 'destroy')->name('slider.destroy');
    });
    Route::controller(BookController::class)->group(function () {
        Route::get('book', 'index')->name('book');
        Route::get('book/create', 'create')->name('book.create');
        Route::post('book', 'store')->name('book.store');
        Route::get('book/edit/{id}', 'edit')->name('book.edit');
        Route::put('book/update/{id}', 'update')->name('book.update');
        Route::get('book/destroy/{id}', 'destroy')->name('book.destroy');
    });
    Route::controller(AuthorController::class)->group(function () {
        Route::get('author', 'index')->name('author');
        Route::get('author/create', 'create')->name('author.create');
        Route::post('author', 'store')->name('author.store');
        Route::get('author/edit/{id}', 'edit')->name('author.edit');
        Route::put('author/update/{id}', 'update')->name('author.update');
        Route::get('author/destroy/{id}', 'destroy')->name('author.destroy');
    });

    // Role in admin panel 
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->name('roles');
        Route::get('role/create', 'create')->name('role.create');
        Route::post('role', 'store')->name('role.store');
        Route::get('role/edit/{id}', 'edit')->name('role.edit');
        Route::put('role/update/{id}', 'update')->name('role.update');
        Route::get('role/delete/{id}', 'delete')->name('role.delete');
    });

    // Permission in admin panel 
    Route::controller(PermissionController::class)->group(function () {
        Route::get('permission', 'index')->name('permissions');
        Route::get('permission/create', 'create')->name('permission.create');
        Route::post('permission', 'store')->name('permission.store');
        Route::get('permission/edit/{id}', 'edit')->name('permission.edit');
        Route::put('permission/update/{id}', 'update')->name('permission.update');
        Route::get('permission/delete/{id}', 'delete')->name('permission.delete');
    });

    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('role:Admin');
    Route::post('/user/role/{id}', [UserController::class, 'RoleChange'])->name('change_role')->middleware('role:Admin');
    // Route::controller(RecordController::class)->group(function () {
    //     Route::get('record', 'index')->name('record')     Route::get('record/create', 'create')->name('record.create')     Route::post('record', 'store')->name('record.store')     Route::get('record/edit/{id}', 'edit')->name('record.edit')     Route::put('record/update/{id}', 'update')->name('record.update')     Route::get('record/destroy/{id}', 'destroy')->name('record.destroy') });
    Route::get('orderList', [OrderController::class, 'orderList'])->name('orderList');
    Route::post('orderList', [OrderController::class, 'filter_order'])->name('filter_order');
    Route::get('orderItemList', [OrderController::class, 'orderItemList'])->name('orderItemList');
    Route::get('statusUpdate', [OrderController::class, 'statusUpdate'])->name('statusUpdate');
    Route::get('generatepdf/{orderId}', [OrderController::class, 'generatepdf'])->name('generatepdf');
}); // Route::controller(CategoryController::class)->group(function () {

    Auth::routes();

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/books', [App\Http\Controllers\FrontendController::class, 'books'])->name('books');
Route::get('/about-us', [App\Http\Controllers\FrontendController::class, 'aboutUs'])->name('aboutUs');

Route::get('/new-arrival', [App\Http\Controllers\FrontendController::class, 'new_arrival'])->name('new_arrival');
Route::get('/new-Trending', [App\Http\Controllers\FrontendController::class, 'new_trending'])->name('trendingBook');
Route::get('/best-selling', [App\Http\Controllers\FrontendController::class, 'best_selling'])->name('best_selling');
Route::post('/books', [App\Http\Controllers\FrontendController::class, 'categorysearch'])->name('categorysearch');
Route::post('/books/search', [App\Http\Controllers\FrontendController::class, 'search_book'])->name('search_book');
Route::get('/book_list', [App\Http\Controllers\FrontendController::class, 'book_listAjax'])->name('book_listAjax');
Route::get('book/{slug}', [App\Http\Controllers\FrontendController::class, 'productdetail'])->name('product_detail');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('get-cart', [CartController::class, 'getcart'])->name('getcart');
Route::post('update-cart/{id}', [CartController::class, 'updateToCart'])->name('updateToCart');

Route::get('cart-delete/{id}', [CartController::class, 'cartdelete'])->name('cartdelete');

Route::middleware(['auth'])->group(function () {
    //home
    Route::get('/home', function () {
        return view('frontend.home');
    })->name('user.home');
    Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    // for esewa 
    Route::get('/payment-verify', [EsewaController::class, 'VerifyPayment'])->name('varify.payment');

    Route::post('orderAdded', [OrderController::class, 'orderAdded'])->name('orderAdded');

    Route::post('orderview/{id}', [OrderController::class, 'orderview'])->name('orderview');
    Route::post('order/delete/{id}', [OrderController::class, 'orderviewDelete'])->name('orderview.delete');
    Route::post('deleteOrderItem/{id}', [OrderController::class, 'deleteOrderItem'])->name('deleteOrderItem');
    Route::post('statusChangeOrder/{id}', [OrderController::class, 'statusChangeOrder'])->name('statusChangeOrder');
    Route::get('thankyou', [OrderController::class, 'thankyou'])->name('thankyou');

    //notification in admin dash
    Route::get('admin/notification/{id}', [DashBoardController::class, 'notification'])->name('order_notify');
    // Route::middleware(['verified'])->group(function (){

        Route::get('/user-profile', [App\Http\Controllers\Frontend\UserController::class, 'userProfile'])->name('userProfile');
        Route::post('/user-profile/update', [App\Http\Controllers\Frontend\UserController::class, 'userProfileUpdate'])->name('profile.user');
        Route::get('/user-profile/change-password', [App\Http\Controllers\Frontend\UserController::class, 'changepassword'])->name('change-password');
        Route::post('/user-profile/change-password', [App\Http\Controllers\Frontend\UserController::class, 'updatePassword'])->name('change.password');
    // });



    //verify email
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
//send response for email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    });
    // email
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('user.home');
    });
});