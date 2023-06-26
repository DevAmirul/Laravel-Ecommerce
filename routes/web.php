<?php

use App\Http\Livewire\Admin\AddCategory;
use App\Http\Livewire\Admin\AddCoupon;
use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\Contact;
use App\Http\Livewire\Admin\Coupons;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\DetailsOrder;
use App\Http\Livewire\Admin\EditCategory;
use App\Http\Livewire\Admin\EditCoupon;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\ShowOrders;
use App\Http\Livewire\Admin\SiteSettings;
use App\Http\Livewire\Cart;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Home;
use App\Http\Livewire\InlineComponent\Thankyou;
use App\Http\Livewire\Nothing;
use App\Http\Livewire\ProductCategory;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\ProductSearch;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Wishlist;
use Illuminate\Support\Facades\Route;



Route::get('/', Home::class)->name('/');
Route::get('shop', Shop::class)->name('shop');
Route::get('product/{slug}', ProductDetails::class)->name('product.details');
Route::get('cart', Cart::class)->name('cart');
Route::get('wishlist', Wishlist::class)->name('wishlist');
Route::get('category/{slug}', ProductCategory::class)->name('category');
Route::get('search', ProductSearch::class)->name('search');

Route::get('thankyou', Thankyou::class)->name('Thankyou');
Route::get('contact-us', ContactUs::class)->name('contactUs');
Route::get('nothing', Nothing::class)->name('password');


require __DIR__ . '/userAuth.php';

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('categories', Categories::class)->name('categories');
    Route::get('add/category', AddCategory::class)->name('addCategory');
    Route::get('edit/category/{cate_id}', EditCategory::class)->name('editCategory');

    Route::get('products', Products::class)->name('products');
    Route::get('product/add', AddProduct::class)->name('addProduct');
    Route::get('product/edit/{slug}', EditProduct::class)->name('editProduct');
    Route::get('coupons', Coupons::class)->name('coupons');
    Route::get('add/coupon', AddCoupon::class)->name('addCoupon');
    Route::get('edit/coupon/{couponId}', EditCoupon::class)->name('editCoupon');
    Route::get('show/orders', ShowOrders::class)->name('showOrders');
    Route::get('orders/details/{orderId}', DetailsOrder::class)->name('ordersDetails');
    Route::get('contacts', Contact::class)->name('contacts');
    Route::get('settings', SiteSettings::class)->name('settings');
});


