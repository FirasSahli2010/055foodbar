<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CheakController;
use App\Http\Controllers\frontend\AfspraakController;
use App\Http\Controllers\frontend\PaymentController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\UserPofileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\MenuController;
use App\Http\Controllers\frontend\MollieController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/**Admin  */
Route::group(['middleware' => 'guest'], function() {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('login');
});

/*user Dashboard*/
Route::group(['middleware'=> 'auth'], function() {
    Route::get('dashboard',[DashboardController::class ,'index'])->name('dashboard'); // profile bezorgadress/
    Route::get('profile',[UserPofileController::class,'index'])->name('profile');//user.profile
    Route::put('profile',[UserPofileController::class,'updateProfile'])->name('profile.update'); //user.profile.update
    Route::post('profile',[UserPofileController::class,'updatePassword'])->name('profile.update.password'); //user.profile.update
    Route::Post('profile/image',[UserPofileController::class,'updateImage'])->name('profile.image.update'); //user.profile.update

    //user dasbord bezorg pagina
    Route::post('address',[DashboardController::class, 'createAddress'])->name('address.store');
    Route::put('address/{id}/edit', [DashboardController::class, 'updateAddress'])->name('address.update');
    Route::delete('address/{id}', [DashboardController::class, 'destroyAddress'])->name('address.destroy');

});
   /******Route menu*******/
   Route::get('product-detail/{slug}', [MenuController::class, 'showProduct'])->name('product-detail');
   Route::get('menu',[MenuController::class,'index'])->name('menu-page');

/******Route Reservation*******/
// Route::post('/reservation',[FrontendController::class,'reservation'])->name('reuservation.store');
Route::resource('afspraak', AfspraakController::class);


/** shoppingcart frontend */
require __DIR__.'/auth.php';
Route::get('/',[HomePageController::class,'index'])->name('home');
Route::get('product-detail/{slug}', [FrontendController::class, 'showProduct'])->name('product-detail');
/**Route shoppingCart**/
Route::get('/load-product-modal/{productId}', [FrontendController::class, 'loadProductModal'])->name('load-product-modal');
Route::post('add-to-cart', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProduct'])->name('get-cart-products');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');
Route::get('cart-details', [CartController::class,'cartDetails'])->name('cart-details');



/** cart page Routes* */
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart-update-qty', [CartController::class,'cartQtyUpdate'])->name('cart.quantity-update');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');
Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');


/** codepoun route Routes* */
Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/destroy-coupon', [FrontendController::class, 'destroyCoupon'])->name('destroy-coupon');




/****cheakout list*/
Route::group(['middleware'=> 'auth'], function(){
    Route::get('cheak-out-page',[CheakController::class,'cheakout'])->name('cheakout-page');
    Route::get('checkout/{id}/delivery-cal',[CheakController::class, 'CalculateDeliveryCharge'])->name('cheakout.delivery-cal');
    /***route de checkout om te gaan te payment */
    Route::post('checkout',[CheakController::class, 'checkoutRedirect'])->name('checkout.redirect');


    /***Payment route****/
    Route::get('payment',[PaymentController::class, 'index'])->name('payment.index');
    Route::post('make-payment',[PaymentController::class, 'makePayment'])->name('make-payment');
    Route::get('payment/success',[PaymentController::class,'paymentSuccess'])->name('payment.success');
    Route::get('payment/cancel',[PaymentController::class,'paymentCancel'])->name('payment.cancel');
    Route::post('/order/{id}/update-payment-status', [PaymentController::class, 'updatePaymentStatus']);

    /** Mollie Routes */
    // Route::get('/mollie-payment', [PaymentController::class, 'payWithmollie'])->name('mollie.payment');
    // Route::get('mollie/success', [PaymentController::class, 'success'])->name('mollie.success');
    // Route::get('mollie/cancel', [PaymentController::class, 'cancel'])->name('mollie.cancel');
    // Route::post('/webhook/mollie', [PaymentController::class, 'handleWebhook']);

    Route::get('/mollie-payment', [PaymentController::class, 'payWithmollie'])->name('payment.create');
    Route::get('mollie/success', [PaymentController::class, 'success'])->name('payment.success');


    Route::get('/paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.payment');
    Route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.success');
    Route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.cancel');

});




