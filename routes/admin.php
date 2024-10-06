<?php

use App\DataTables\ReservationTimeDataTable;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\DeliveryController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\MenuOptionController;
use App\Http\Controllers\admin\MenuVariantItemController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductImageGalleryController;
use App\Http\Controllers\admin\ProductVariantItemController;
use App\Http\Controllers\admin\PaymentGatewaySettingsController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\Admin\OptionProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\admin\ReservatioTimenController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin', 'as' => 'admin.'], function(){

/***Profile Routes**** */
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateprofile'])->name('profile.update');
/***Profile update password**** */
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');
 Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
/**Slider-Home-page */
Route::resource('sliderHomePage', SliderController::class);

/**Route-About */
Route::put('change-status',[AboutController::class,'changeStatus'])->name('about-change-status');
Route::resource('about', AboutController::class);

/**Route-category */
Route::put('change-status',[CategoryController::class,'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/**Route-Products */
Route::put('product/change-status', [ProductController::class,'changeStatus'])->name('product.change-status');
Route::resource('products', ProductController::class);

//***page Menu */
Route::put('menu/change-status', [MenuController::class,'changeStatus'])->name('menu.change-status');
Route::resource('menupage', MenuController::class);

/***Route menuVaraitItem ***/
Route::put('menu-variant-item-status', [MenuVariantItemController::class,'changeStatus'])->name('menu-variant-item.change-status');
Route::get('menu-variant-item/{productId}',[MenuVariantItemController::class,'index'])->name('menu-variant-item.index');
Route::get('menu-variant-item/create/{productId}',[MenuVariantItemController::class,'create'])->name('menu-variant-item.create');
Route::post('menu-variant-item',[MenuVariantItemController::class,'store'])->name('menu-variant-item.store');
Route::get('menu-variant-item-edit/{variantItemId}',[MenuVariantItemController::class,'edit'])->name('menu-variant-item.edit');
Route::put('menu-variant-item-update/{variantItemId}',[MenuVariantItemController::class,'update'])->name('menu-variant-item.update');
Route::delete('menu-variant-item/{variantItemId}',[MenuVariantItemController::class,'destroy'])->name('menu-variant-item.destroy');

/***Route menuOption ***/
Route::put('menu-option-item-status', [MenuOptionController::class,'changeStatus'])->name('menu-option-item.change-status');

Route::get('menu-option-item/{productId}',[MenuOptionController::class,'index'])->name('menu-option-item.index');
Route::get('menu-option-item/create/{productId}',[MenuOptionController::class,'create'])->name('menu-option-item.create');
Route::post('menu-option-item',[MenuOptionController::class,'store'])->name('menu-option-item.store');
Route::get('menu-option-item-edit/{productId}',[MenuOptionController::class,'edit'])->name('menu-option-item.edit');
Route::put('menu-option-item/{variantItemId}',[MenuOptionController::class,'update'])->name('menu-option-item.update');
Route::delete('menu-option-item/{variantItemId}',[MenuOptionController::class,'destroy'])->name('menu-option-item.destroy');
/**Route Image Gallery***/
Route::resource('products-image-gallery',ProductImageGalleryController::class);

/**Route Variant-item***/
Route::put('products-variant-item-status', [ProductVariantItemController::class,'changeStatus'])->name('products-variant-item.change-status');
Route::get('products-variant-item/{productId}',[ProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}',[ProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class,'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}',[ProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[ProductVariantItemController::class,'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}',[ProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');

/**Route productOptions***/
Route::get('products-option-item/{productId}',[OptionProductController::class,'index'])->name('product-option-item.index');
Route::get('products-option-item/create/{productId}',[OptionProductController::class,'create'])->name('products-option-item.create');
Route::post('products-option-item',[OptionProductController::class,'store'])->name('products-option-item.store');
Route::get('products-option-item-edit/{productId}',[OptionProductController::class,'edit'])->name('products-option-item.edit');

/**ReservationTime Route* */
Route::put('reservation-status', [ReservatioTimenController::class,'changeStatus'])->name('reservation-change-status');
Route::resource('reservation-time',ReservatioTimenController::class);
Route::get('reservation', [ReservationController::class,'index'])->name('reservation.index');
Route::post('reservation', [ReservationController::class,'update'])->name('reservation.update');
Route::delete('reservation/{id}', [ReservationController::class,'destroy'])->name('reservation.destroy');

/*****Route Bestelen*****/
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

/**Route Coupons***/
Route::put('coupon/change-status', [CouponController::class,'changeStatus'])->name('coupon.change-status');
Route::resource('coupon', CouponController::class);

/***Route Delivery */
Route::put('delivery/change-status', [DeliveryController::class,'changeStatus'])->name('delivery.change-status');
Route::resource('delivery', DeliveryController::class);







//*****Genral Setting route***** */
Route::get('setting', [settingsController::class,'index'])->name('settings.index');
Route::put('generale-setting-update', [settingsController::class,'generalSettingUpdate'])->name('generale-setting-update');

//*****Genral GatwayspaymentSettings***** */
Route::get('payment-settings', [PaymentGatewaySettingsController::class,'index'])->name('payment-settings');
Route::put('paypal-settings', [PaymentGatewaySettingsController::class,'paypalSettingUpdate'])->name('paypal-settings-update');
