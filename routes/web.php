<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\Admin\AdminAddBlogComponent;
use App\Http\Livewire\Admin\AdminAddProductCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminBlogDetailComponent;
use App\Http\Livewire\Admin\AdminBlogsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditBlogComponent;
use App\Http\Livewire\Admin\AdminEditOrderComponent;
use App\Http\Livewire\Admin\AdminEditProductCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminProductCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductOrdersComponent;
use App\Http\Livewire\Admin\AdminProductOrdersDetailComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServiceProvidersComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Admin\AdminUserMailComponent;
use App\Http\Livewire\Admin\AdminUsersComponent;
use App\Http\Livewire\BlogDetailComponent;
use App\Http\Livewire\BlogsComponent;
use App\Http\Livewire\BookingComponent;
use App\Http\Livewire\Cart\CartComponent;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\Checkout\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Customer\CustomerBookingDetailComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Customer\CustomerPorderDetailComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Order\OrderComponent;
use App\Http\Livewire\ServiceByCategoryComponent;
use App\Http\Livewire\ServiceByLocationComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\ServiceProviderByCategoryComponent;
use App\Http\Livewire\ServiceProviderByLocationComponent;
use App\Http\Livewire\ServiceProviderComponent;
use App\Http\Livewire\ServiceProviderProfileComponent;
use App\Http\Livewire\ServicesComponent;
use App\Http\Livewire\Shop\ProductBrand;
use App\Http\Livewire\Shop\ProductBrandComponent;
use App\Http\Livewire\Shop\ProductCategoryComponent;
use App\Http\Livewire\Shop\ProductDetailComponent;
use App\Http\Livewire\Shop\ShopComponent;
use App\Http\Livewire\Sprovider\AddServiceComponent;
use App\Http\Livewire\Sprovider\EditProviderServicesComponent;
use App\Http\Livewire\Sprovider\EditSproviderProfileComponent;
use App\Http\Livewire\Sprovider\ProfileSproviderComponent;
use App\Http\Livewire\Sprovider\ProviderServicesComponent;
use App\Http\Livewire\Sprovider\ServiceProviderServices;
use App\Http\Livewire\Sprovider\ServicesProviderServiceOfferingComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderEditOrderComponent;
use App\Http\Livewire\Sprovider\SproviderOrderComponent;
use App\Http\Livewire\Sprovider\SproviderProfileComponent;
use App\Http\Livewire\Sprovider\SproviderServiceComponent;
use App\Http\Livewire\ThankYouComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class)->name('home');
Route::get('/services', ServicesComponent::class)->name('home.services');
Route::get('/service-categories', ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/services/{category_slug}/{scategory_slug?}', ServiceByCategoryComponent::class)->name('home.service_by_category');
Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.service_details');
Route::get('/services/{service_location}', ServiceByLocationComponent::class)->name('home.service_location');
Route::get('/service_provider/{slocation}', ServiceProviderByLocationComponent::class)->name('home.service_provider_location');
Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/search', [SearchController::class, 'searchService'])->name('searchService');
Route::get('/contact', ContactComponent::class)->name('home.contact');
Route::get('/blogs', BlogsComponent::class)->name('home.blogs');
Route::get('/blog/{blog_slug}', BlogDetailComponent::class)->name('home.blog_detail');

Route::get('/change-location', ChangeLocationComponent::class)->name('home.change_location');
Route::get('/profile/{sprovider_id}', ServiceProviderProfileComponent::class)->name('home.service-provider_profile');
Route::get('/service_provider', ServiceProviderComponent::class)->name('home.service_provider');
Route::get('/services_provider/{service_category_name}', ServiceProviderByCategoryComponent::class)->name('home.service_provider_by_category');

Route::get('/{service_slug}/booking', BookingComponent::class)->name('home.booking')->middleware('auth');
Route::get('/shop/product', ShopComponent::class)->name('shop.shop');
Route::get('/{product_slug}/product', ProductDetailComponent::class)->name('product-detail');
Route::get('/product-category/{category_slug}/{scategory_slug?}', ProductCategoryComponent::class)->name('product.category');
Route::get('{brand}/product-brand', ProductBrandComponent::class)->name('product.brand');
Route::get('/productautocomplete', [ProductSearchController::class, 'productAutocomplete'])->name('productAutocomplete');
Route::post('/productsearch', [ProductSearchController::class, 'searchProduct'])->name('searchProduct');

Route::post('/bookNow', [App\Http\Controllers\BookingController::class, 'bookNow']);
Route::post('/sendComment', [App\Http\Controllers\CommentController::class, 'sendComment']);
Route::post('/sendNewsletter', [App\Http\Controllers\NewsletterController::class, 'sendNewsletter'])->name('newsletter');
Route::get('/order', OrderComponent::class)->name('home.order');

Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout')->middleware('auth');
Route::get('/thank-you', ThankYouComponent::class)->name('thank-you');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
    Route::get('/customer/booking_detail/{booking_id}', CustomerBookingDetailComponent::class)->name('customer.booking_detail');
    Route::get('/customer/product_order_detail/{porder_id}', CustomerPorderDetailComponent::class)->name('customer.porder_detail');
});

Route::middleware([
    'auth:sanctum',
    'authsprovider',
    'verified'
])->group(function () {
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
    Route::get('/profile/sprovider', ProfileSproviderComponent::class)->name('sprovider.profile');
    Route::get('/sprovider/profile/edit', EditSproviderProfileComponent::class)->name('sprovider.edit_profile');
    Route::get('/sprovider/service/add', AddServiceComponent::class)->name('sprovider.add_service');
    Route::get('/offering', ServicesProviderServiceOfferingComponent::class)->name('offerings.service');
    Route::get('/sprovider/order', SproviderOrderComponent::class)->name('sprovider.order');
    Route::get('/sprovider/order/edit/{order_id}', SproviderEditOrderComponent::class)->name('sprovider.edit_order');
    Route::get('/sprovider/service/edit/{service_slug}', EditProviderServicesComponent::class)->name('sprovider.edit_service');
});

Route::middleware([
    'auth:sanctum',
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}', AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services', AdminServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services', AdminServicesByCategoryComponent::class)->name('admin.service_by_category');
    Route::get('/admin/service/add', AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}', AdminEditServiceComponent::class)->name('admin.edit_service');

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add', AdminAddSliderComponent::class)->name('admin.add_slider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditSliderComponent::class)->name('admin.edit_slider');

    Route::get('/admin/blogs', AdminBlogsComponent::class)->name('admin.blogs');
    Route::get('/admin/blog/add', AdminAddBlogComponent::class)->name('admin.add_blog');
    Route::get('/admin/blog/edit/{slug}', AdminEditBlogComponent::class)->name('admin.edit_blog');
    Route::get('/admin/blog/{blog_slug}', AdminBlogDetailComponent::class)->name('admin.blog_detail');
    Route::get('/admin/order', AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/order/edit/{order_id}', AdminEditOrderComponent::class)->name('admin.edit_order');
    Route::get('/admin.service_providers', AdminServiceProvidersComponent::class)->name('admin.service_providers');
    Route::get('/admin/users', AdminUsersComponent::class)->name('admin.users');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product_category', AdminProductCategoryComponent::class)->name('admin.product_category');
    Route::get('/admin/edit_product/{product_id}', AdminEditProductComponent::class)->name('admin.edit_product');
    Route::get('/admin/add_products', AdminAddProductComponent::class)->name('admin.add_products');
    Route::get('/admin/edit_product_category/{category_id}', AdminEditProductCategoryComponent::class)->name('admin.edit_product_category');
    Route::get('/admin/add_product_category', AdminAddProductCategoryComponent::class)->name('admin.add_product_category');
    Route::get('/admin/product_order', AdminProductOrdersComponent::class)->name('admin.product_order');
    Route::get('/admin/product_order_detail/{order_id}', AdminProductOrdersDetailComponent::class)->name('admin.product_order_detail');
    Route::get('/export-excel', [App\Http\Controllers\ReportController::class, 'exportExcel'])->name('exportExcel');
    Route::get('/admin/users-email', AdminUserMailComponent::class)->name('admin.users_email');
    Route::post('users-send-email', [App\Http\Controllers\UserController::class, 'sendEmail'])->name('ajax.send.email');
});
