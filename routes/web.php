<?php

use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\stadmin\ServiceMediaController;
use App\Http\Controllers\stadmin\StaffMemberController;
use App\Http\Livewire\Admin\AdminAddBlogComponent;
use App\Http\Livewire\Admin\AdminAddPartnerComponent;
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
use App\Http\Livewire\Admin\AdmminPartnerComponent;
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
use App\Models\PartnerLogo;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\Feedback;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/search', [SearchController::class, 'searchService'])->name('searchService');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'blog'])->name('home.blogs');
Route::get('/blog/{blog_slug}', [App\Http\Controllers\HomeController::class, 'blogDetail'])->name('home.blog_detail');
Route::get('/search/blog', [App\Http\Controllers\HomeController::class, 'SearchBlog'])->name('searchBlog.home');
Route::get('/category/{category}', [App\Http\Controllers\HomeController::class, 'showByCategory'])->name('blogCategory.show');


Route::get('/profile/{sprovider_id}', [App\Http\Controllers\service_providers\ServiceProvidersController::class, 'profile'])->name('home.service-provider_profile');
Route::get('/service_provider', [App\Http\Controllers\service_providers\ServiceProvidersController::class, 'serviceProviders'])->name('home.service_provider');
Route::get('/services_provider/{service_category_name}', [App\Http\Controllers\service_providers\ServiceProvidersController::class, 'serviceProviderByCategory'])->name('home.service_provider_by_category');
Route::get('/provider/{location}', [App\Http\Controllers\service_providers\ServiceProvidersController::class, 'ProviderByLocation'])->name('home.providerByLocation');
Route::get('/service-categories', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'AllCategories'])->name('home.service_categories');
Route::get('/services/{category_slug}/{scategory_slug?}', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'ByCategories'])->name('home.service_by_category');
Route::get('/get-services', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'AllServices'])->name('home.services');
Route::get('/service/{service_slug}', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'ServiceDetail'])->name('home.service_details');
Route::get('/{service_location}/service', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'ByLocation'])->name('home.service_location');
Route::get('/services/subcategory/{subcategory_slug}', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'showServicesBySubcategory'])->name('home.service_by_subcategory');
Route::get('/search', [App\Http\Controllers\service_categories\ServiceCategoriesController::class, 'search'])->name('services.search');

Route::get('/booking/{service_slug}', [App\Http\Controllers\BookingController::class, 'BookingService'])->name('home.booking')->middleware('auth');
Route::get('/shop/product', ShopComponent::class)->name('shop.shop');
Route::get('/{product_slug}/product', ProductDetailComponent::class)->name('product-detail');
Route::get('/product-category/{category_slug}/{scategory_slug?}', ProductCategoryComponent::class)->name('product.category');
Route::get('{brand}/product-brand', ProductBrandComponent::class)->name('product.brand');
Route::get('/productautocomplete', [ProductSearchController::class, 'productAutocomplete'])->name('productAutocomplete');
Route::post('/productsearch', [ProductSearchController::class, 'searchProduct'])->name('searchProduct');


Route::post('/bookNow', [App\Http\Controllers\BookingController::class, 'bookNow'])->name('bookings.store');
Route::post('/sendComment', [App\Http\Controllers\CommentController::class, 'sendComment']);
// Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterSubscriptionController::class, 'SubscribeEmail'])->name('Subscriptions.store');
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterSubscriptionController::class, 'SubscribeEmail'])->name('Subscriptions.store');
Route::get('/order', OrderComponent::class)->name('home.order');
Route::post('/sendEmailInquiry', [App\Http\Controllers\service_providers\ServiceProvidersController::class, 'sendEmailInquiry']);
Route::post('/sendMessage', [App\Http\Controllers\HomeController::class, 'sendMessage']);

Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout')->middleware('auth');

Route::get('/about', function () {
    $partners = PartnerLogo::all();
    $feedbacks = Feedback::inRandomOrder()->take(6)->get();
    return view('pages.about', compact('partners', 'feedbacks'));
})->name('about');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/policy', function () {
    return view('pages.policy');
})->name('policy');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store')->middleware('auth');
Route::post('/rating', [App\Http\Controllers\FeedbackController::class, 'RatingStore'])->name('rating.store')->middleware('auth');

// Route::get('/payment', [App\Http\Controllers\BookingController::class, 'paymentProcess'])->name('home.payment');
// Route::get('/payment/{booking_id}', [App\Http\Controllers\BookingController::class, 'showPaymentForm'])->name('payment.now');
// Route::post('/paymentProcess', [App\Http\Controllers\PaymentController::class, 'processPayment']);

Route::get('/booking/confirmation/{booking_id}', [App\Http\Controllers\BookingController::class, 'showConfirmation'])->name('booking.confirmation');
Route::get('/payment/{booking_id}', [App\Http\Controllers\PaymentController::class, 'showPaymentPage'])->name('payment');
Route::post('/payment/process', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'paymentCallback'])->name('payment.callback');


Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('/customer/dashboard', [App\Http\Controllers\customer\CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/profile', [App\Http\Controllers\customer\CustomerController::class, 'customerProfile'])->name('customer-profile');
    Route::get('/customer/booking_detail/{booking_id}', CustomerBookingDetailComponent::class)->name('customer.booking_detail');
    Route::put('/customer/profile/update/{id}', [App\Http\Controllers\customer\CustomerController::class, 'UpdateProfile'])->name('profile.update');
    Route::get('/customer/profile/edit', [App\Http\Controllers\customer\CustomerController::class, 'edit'])->name('CustomerProfile.edit');
    Route::put('/customer/booking/cancel/{id}', [App\Http\Controllers\customer\CustomerController::class, 'cancelBooking'])->name('customer.cancelBooking');
    Route::put('/booking/reschedule/{id}', [App\Http\Controllers\customer\CustomerController::class, 'BookingReschedule'])->name('BookingReschedule');
    Route::get('/customer/services', [App\Http\Controllers\customer\CustomerController::class, 'GetService'])->name('customer.services');
    Route::get('/customer/services_providers', [App\Http\Controllers\customer\CustomerController::class, 'GetProvider'])->name('customer.GetProviderService');
    Route::get('/customer/services/{slug}', [App\Http\Controllers\customer\CustomerController::class, 'showService'])->name('CustomerService.show');
    Route::get('/customer/booking/{slug}', [App\Http\Controllers\customer\CustomerController::class, 'CustomerBooking'])->name('CustomerService.book');
    Route::post('/customer/serviceBook', [App\Http\Controllers\customer\CustomerController::class, 'ServiceBook'])->name('serviceBooking');
    Route::get('/customer/service/booked', [App\Http\Controllers\customer\CustomerController::class, 'CustomerServiceBooked'])->name('CustomerServiceBooked');
    Route::get('/customer/service/booked/{id}', [App\Http\Controllers\customer\CustomerController::class, 'ServiceBookedDetail'])->name('ServiceBookedDetail');
    Route::get('/customer/search', [App\Http\Controllers\customer\CustomerController::class, 'CustomerSearch'])->name('customerSearch');
    Route::get('/customer/serviceProvided/{id}', [App\Http\Controllers\customer\CustomerController::class, 'ServiceProviderService'])->name('customer.ServiceProviderService');
    Route::get('/customer/service/providers/{id}', [App\Http\Controllers\customer\CustomerController::class, 'ServiceProviderDetail'])->name('customer.ServiceProviderDetail');
});

Route::middleware([
    'auth:sanctum',
    'authsprovider',
    'verified'
])->group(function () {
    Route::get('/sprovider/dashboard', [App\Http\Controllers\stadmin\StadminController::class, 'SDashboard'])->name('sprovider.dashboard');
    Route::get('/service/provider/service', [App\Http\Controllers\stadmin\ServiceController::class, 'index'])->name('serviceProvider.index');
    Route::get('/service/provider/service/{slug}', [App\Http\Controllers\stadmin\ServiceController::class, 'show'])->name('serviceProvider.show');
    Route::get('/service/provider/serviceEdit/{slug}', [App\Http\Controllers\stadmin\ServiceController::class, 'edit'])->name('serviceProvider.edit');
    Route::get('/service/provider/new/service/add', [App\Http\Controllers\stadmin\ServiceController::class, 'create'])->name('serviceProvider.create');
    Route::post('/service/provider/addService', [App\Http\Controllers\stadmin\ServiceController::class, 'store'])->name('serviceProvider.store');
    Route::put('/service/provider/serviceUpdate/{id}', [App\Http\Controllers\stadmin\ServiceController::class, 'update'])->name('serviceProvider.update');
    Route::delete('/service/provider/serviceDelete/{id}', [App\Http\Controllers\stadmin\ServiceController::class, "destroy"])->name('serviceProvider.destroy');

    Route::get('/offering/{slug}', [App\Http\Controllers\stadmin\StadminController::class, 'ServiceOfferingDetail'])->name('offerings.detail');
    Route::get('/sprovider/service/add', [App\Http\Controllers\stadmin\StadminController::class, 'ServiceOfferingAddPage'])->name('sprovider.add_service');
    Route::post('/addService', [App\Http\Controllers\stadmin\StadminController::class, 'addService']);
    Route::get('/service/provider/bookings', [App\Http\Controllers\stadmin\BookingsController::class, 'index'])->name('serviceProviderBooking.index');
    Route::get('/service/provider/booking/{id}', [App\Http\Controllers\stadmin\BookingsController::class, 'show'])->name('serviceProviderBooking.show');
    Route::put('/service/provider/booking/{id}/approve', [App\Http\Controllers\stadmin\BookingsController::class, 'approveBooking'])->name('serviceProviderBooking.approve');
    Route::put('/service/provider/booking/{id}/cancel', [App\Http\Controllers\stadmin\BookingsController::class, 'cancelBooking'])->name('serviceProviderBooking.cancel');
    Route::put('/service/provider/booking/{id}/complete', [App\Http\Controllers\stadmin\BookingsController::class, 'CompleteBooking'])->name('serviceProviderBooking.complete');
    Route::post('/serviceProvider/booking', [App\Http\Controllers\stadmin\BookingsController::class, 'store'])->name('service_bookings.store');
    // ************* ServiceProvider blog routes ****************
    Route::get('/ServiceProvider/blogs', [App\Http\Controllers\stadmin\BlogsController::class, 'index'])->name('serviceProviderBlog.index');
    Route::get('/ServiceProvider/blog/add', [App\Http\Controllers\stadmin\BlogsController::class, 'create'])->name('serviceProviderBlog.CreateBlog');
    Route::post('/ServiceProvider/blog/create', [App\Http\Controllers\stadmin\BlogsController::class, 'store'])->name('serviceProviderBlog.StoreBlog');
    Route::get('/ServiceProvider/blog/edit/{id}', [App\Http\Controllers\stadmin\BlogsController::class, 'edit'])->name('serviceProviderBlog.editBlog');
    Route::get('/ServiceProvider/blog/{slug}', [App\Http\Controllers\stadmin\BlogsController::class, 'show'])->name('serviceProviderBlog.blogDetail');
    Route::delete('/ServiceProvider/blog/delete/{id}', [App\Http\Controllers\stadmin\BlogsController::class, 'destroy'])->name('serviceProviderBlog.blogDelete');
    Route::put('/ServiceProvider/blog/update/{id}', [App\Http\Controllers\stadmin\BlogsController::class, 'update'])->name('serviceProviderBlog.blogUpdate');


    // exceptionnnnn
    // Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
    Route::get('/ServiceProvider/profile', [App\Http\Controllers\stadmin\ProfileController::class, 'index'])->name('sprovider.profile');
    Route::get('/ServiceProvider/profile/edit', [App\Http\Controllers\stadmin\ProfileController::class, 'edit'])->name('sprovider.edit_profile');
    Route::put('/ServiceProvider/update/{id}', [App\Http\Controllers\stadmin\ProfileController::class, 'update'])->name('ServiceProvider.updateProfile');
    // Route::get('/offering', ServicesProviderServiceOfferingComponent::class)->name('offerings.service');
    Route::get('/sprovider/order', SproviderOrderComponent::class)->name('sprovider.order');
    Route::get('/sprovider/order/edit/{order_id}', SproviderEditOrderComponent::class)->name('sprovider.edit_order');
    Route::get('/sprovider/service/edit/{id}', [App\Http\Controllers\stadmin\StadminController::class, 'ServiceEditDetail'])->name('sprovider.edit_service');
    Route::post('/updateService/{id}', [App\Http\Controllers\stadmin\StadminController::class, 'updateService']);

    Route::get('/sprovider/portfolios', [App\Http\Controllers\stadmin\PortfolioController::class, 'index'])->name('sprovider.portfolio');
    Route::get('/sprovider/portfolio/{id}', [App\Http\Controllers\stadmin\PortfolioController::class, 'show'])->name('sprovider.ShowPortfolio');
    Route::post('/createPortfolioService', [App\Http\Controllers\stadmin\PortfolioController::class, 'store']);
    Route::put('/updatePortfolio/{id}', [App\Http\Controllers\stadmin\PortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('/deletePortfolio/{id}', [App\Http\Controllers\stadmin\PortfolioController::class, "destroy"])->name('portfolios.destroy');
    Route::post('/images/upload', [App\Http\Controllers\service_providers\ServicesController::class, 'upload']);

    Route::get('/sprovider/working_hours', [App\Http\Controllers\stadmin\WorkingHourController::class, 'index'])->name('working_hours.index');
    Route::get('/sprovider/working_hours/create', [App\Http\Controllers\stadmin\WorkingHourController::class, 'create'])->name('working_hours.create');
    Route::post('/working_hours/add', [App\Http\Controllers\stadmin\WorkingHourController::class, 'store'])->name('working_hours.store');
    Route::get('/sprovider/working_hours/{id}/edit', [App\Http\Controllers\stadmin\WorkingHourController::class, 'edit'])->name('working_hours.edit');
    Route::put('/working_hours/update/{id}', [App\Http\Controllers\stadmin\WorkingHourController::class, 'update'])->name('working_hours.update');
    Route::delete('/working_hours/delete/{id}', [App\Http\Controllers\stadmin\WorkingHourController::class, 'destroy'])->name('working_hours.destroy');

    Route::get('/service/profile/{id}', [App\Http\Controllers\stadmin\StadminController::class,  'showProfile'])->name('profile');

    Route::get('/sprovider/promotions', [App\Http\Controllers\stadmin\PromotionsController::class, 'index'])->name('promotions.index');
    Route::post('/promotionsAdd', [App\Http\Controllers\stadmin\PromotionsController::class, 'storePromotion'])->name('promotions.store');
    Route::put('/promotions/{id}', [App\Http\Controllers\stadmin\PromotionsController::class, 'update'])->name('promotions.update');

    Route::get('/sprovider/clients', [App\Http\Controllers\stadmin\StadminController::class, 'SClients'])->name('sprovider.clients');
    Route::get('/sprovider/clients/{user_id}', [App\Http\Controllers\stadmin\StadminController::class, 'SClientDetail'])->name('sprovider.clientDetails');

    Route::get('/service-media', [ServiceMediaController::class, 'index'])->name('sprovider.media');
    Route::get('/service/{service}/media', function ($serviceId) {
        $service = \App\Models\Service::with('media')->findOrFail($serviceId);
        return view('service_media', compact('service'));
    })->name('service.media');

    Route::post('/service-media', [ServiceMediaController::class, 'store'])->name('service-media.store');
    Route::delete('/service-media/{id}', [ServiceMediaController::class, 'destroy'])->name('service-media.destroy');

    Route::get('/staff-members', [StaffMemberController::class, 'index'])->name('staff-members.index');
    Route::post('/staff-members', [StaffMemberController::class, 'store'])->name('staff-members.store');
    Route::post('/staff-members/{id}', [StaffMemberController::class, 'update'])->name('staff-members.update');
    Route::post('/updateServices/{id}', [StaffMemberController::class, 'updateServices'])->name('staff-members.updateServices');
    Route::delete('/staff-members/{id}', [StaffMemberController::class, 'destroy'])->name('staff-members.destroy');

    Route::get('/ServiceProvider/user-reviews', [App\Http\Controllers\stadmin\ProfileController::class, 'UserReviews'])->name('serviceProvider.reviews');
    Route::get('/ServiceProvider/feedbacks', [App\Http\Controllers\stadmin\ProfileController::class, 'UserFeedback'])->name('serviceProvider.feedback');
});

Route::middleware([
    'auth:sanctum',
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/service-categories', [App\Http\Controllers\admin\ServiceCategoryController::class, 'index'])->name('admin.service_categories');
    Route::get('/admin/service-category/add', [App\Http\Controllers\admin\ServiceCategoryController::class, 'create'])->name('admin.add_service_category');
    Route::post('/admin/service-category/create', [App\Http\Controllers\admin\ServiceCategoryController::class, 'createNewCategory'])->name('admin.create_service_category');
    Route::get('/admin/service-category/edit/{id}', [App\Http\Controllers\admin\ServiceCategoryController::class, 'edit'])->name('admin.edit_service_category');
    Route::put('/admin/service-category/{id}', [App\Http\Controllers\admin\ServiceCategoryController::class, 'updateServiceCategory'])->name('admin.update_service_category');
    Route::delete('/admin/service-category/delete/{id}', [App\Http\Controllers\admin\ServiceCategoryController::class, "destroy"])->name('admin.delete_service_category');
    Route::get('/admin/{category_slug}/services', [App\Http\Controllers\admin\ServiceCategoryController::class, "showServiceByCategory"])->name('admin.service_by_category');
    Route::get('/admin/subCategories', [App\Http\Controllers\admin\ServiceCategoryController::class, 'SubCat'])->name('admin.sub_category');
    Route::delete('/admin/subCategory/delete/{id}', [App\Http\Controllers\admin\ServiceCategoryController::class, "destroySub"])->name('admin.delete_sub_category');
    Route::post('/admin/subCategory/create', [App\Http\Controllers\admin\ServiceCategoryController::class, 'NewSubCategory'])->name('admin.add_Subcategory');
    // ****************** admin service routes*************

    Route::get('/admin/all-services', [App\Http\Controllers\admin\ServicesController::class, 'index'])->name('admin.all_services');
    Route::delete('/admin/service/delete/{id}', [App\Http\Controllers\admin\ServicesController::class, "destroy"])->name('admin.delete_service');
    Route::put('/admin/service/{id}', [App\Http\Controllers\admin\ServicesController::class, 'updateService'])->name('admin.update_service');
    Route::get('/admin/service/{slug}', [App\Http\Controllers\admin\ServicesController::class, 'showService'])->name('admin.show_service');
    Route::get('/admin/create/service', [App\Http\Controllers\admin\ServicesController::class, 'createService'])->name('admin.create_service');
    Route::post('/admin/post/service', [App\Http\Controllers\admin\ServicesController::class, 'postService'])->name('admin.post_service');
    Route::get('/admin/service/{id}/edit', [App\Http\Controllers\admin\ServicesController::class, 'editService'])->name('admin.edit_service');

    // ************** admin slider routes **************
    Route::get('/admin/slider', [App\Http\Controllers\admin\SliderController::class, 'index'])->name('admin.slider');
    Route::post('/admin/slider/add',  [App\Http\Controllers\admin\SliderController::class, 'store'])->name('admin.add_slider');
    Route::get('/admin/slider/edit/{id}', [App\Http\Controllers\admin\SliderController::class, 'edit'])->name('admin.edit_slider');
    Route::put('/admin/slider/update/{id}', [App\Http\Controllers\admin\SliderController::class, 'update'])->name('admin.update_slider');
    Route::delete('/admin/slider/delete/{id}', [App\Http\Controllers\admin\SliderController::class, 'destroy'])->name('admin.delete_slider');

    // ************* admin blog routes ****************
    Route::get('/admin/blogs', [App\Http\Controllers\admin\BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/admin/blog/add', [App\Http\Controllers\admin\BlogController::class, 'create'])->name('admin.add_blog');
    Route::post('/admin/blog/create', [App\Http\Controllers\admin\BlogController::class, 'store'])->name('admin.blog_create');
    Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\admin\BlogController::class, 'edit'])->name('admin.edit_blog');
    Route::get('/admin/blog/{slug}', [App\Http\Controllers\admin\BlogController::class, 'show'])->name('admin.blog_detail');
    Route::delete('/admin/blog/delete/{id}', [App\Http\Controllers\admin\BlogController::class, 'destroy'])->name('admin.blog_delete');
    Route::put('/admin/blog/update/{id}', [App\Http\Controllers\admin\BlogController::class, 'update'])->name('admin.blog_update');
    Route::put('/admin/blog/{id}/approve', [App\Http\Controllers\admin\BlogController::class, 'approveBlog'])->name('admin.blogApprove');
    // ************* admin partner routes *************
    Route::get('/admin/partners', [App\Http\Controllers\admin\PartnerController::class, 'index'])->name('admin.partners');

    Route::post('/admin/add/partner', [App\Http\Controllers\admin\PartnerController::class, 'store'])->name('admin.add_partner');
    Route::delete('/admin/delete/partner/{id}', [App\Http\Controllers\admin\PartnerController::class, 'destroy'])->name('admin.delete_partner');

    Route::get('/admin/booking', [App\Http\Controllers\admin\BookingController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/booking/{id}', [App\Http\Controllers\admin\BookingController::class, 'show'])->name('admin.show_booking');

    Route::get('/admin/service_providers', [App\Http\Controllers\admin\ServiceProviderController::class, 'index'])->name('admin.service_providers');
    Route::get('/admin/service_providers/create', [App\Http\Controllers\admin\ServiceProviderController::class, 'create'])->name('admin.AddServiceProviders');
    Route::get('/admin/service_providers/{id}', [App\Http\Controllers\admin\ServiceProviderController::class, 'show'])->name('admin.ShowServiceProviders');
    Route::post('/admin/AddServiceProvide', [App\Http\Controllers\admin\ServiceProviderController::class, 'storeServiceProvide'])->name('ServiceProviderAdd');
    Route::get('/admin/users',  [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.users');
    Route::delete('/admin/users/delete/{id}',  [App\Http\Controllers\admin\UserController::class, 'destroy'])->name('users.delete');

    Route::get('/admin/activate/{user_id}', [App\Http\Controllers\admin\UserController::class, 'adminActivate'])->name('admin.activate');
    Route::get('/customer/activate/{user_id}', [App\Http\Controllers\admin\UserController::class, 'customerActivate'])->name('customer.activate');
    Route::get('/provider/activate/{user_id}', [App\Http\Controllers\admin\UserController::class, 'providerActivate'])->name('provider.activate');

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

    // ************** messages ********************
    Route::get('admin/messages', [App\Http\Controllers\admin\MessagesController::class, 'index'])->name('admin.messages');
    Route::get('admin/message/{id}', [App\Http\Controllers\admin\MessagesController::class, 'show'])->name('admin.messageDetail');
    Route::delete('admin/message/delete/{id}', [App\Http\Controllers\admin\MessagesController::class, 'destroy'])->name('admin.delete_message');

    // ************* admin newsletter routes ****************
    Route::get('/admin/newsletters', [App\Http\Controllers\NewsletterSubscriptionController::class, 'index'])->name('admin.newsletterSubscriptions.index');
    Route::get('/admin/newsletter/add', [App\Http\Controllers\NewsletterSubscriptionController::class, 'create'])->name('admin.newsletterSubscriptions.create');
    Route::post('/admin/newsletter/create', [App\Http\Controllers\NewsletterSubscriptionController::class, 'store'])->name('admin.newsletterSubscriptions.store');
    Route::get('/admin/newsletter/edit/{id}', [App\Http\Controllers\NewsletterSubscriptionController::class, 'edit'])->name('admin.newsletterSubscriptions.edit');
    Route::get('/admin/newsletter/{slug}', [App\Http\Controllers\NewsletterSubscriptionController::class, 'show'])->name('admin.newsletterSubscriptions.show');
    Route::delete('/admin/newsletter/delete/{id}', [App\Http\Controllers\NewsletterSubscriptionController::class, 'destroy'])->name('admin.newsletterSubscriptions.destroy');
    Route::put('/admin/newsletter/update/{id}', [App\Http\Controllers\NewsletterSubscriptionController::class, 'update'])->name('admin.newsletterSubscriptions.update');
    Route::get('/admin/newsletters/send', [App\Http\Controllers\NewsletterSubscriptionController::class, 'Newsletter'])->name('admin.newsletterSubscriptions.send');
    Route::post('newsletter_subscriptions/send-newsletter', [App\Http\Controllers\NewsletterSubscriptionController::class, 'sendNewsletter'])->name('admin.newsletterSubscriptions.sendNewsletter');

    Route::get('/admin/providers/feedbacks', [App\Http\Controllers\admin\ServiceProviderController::class, 'ProviderFeedback'])->name('admin.ProviderFeedback');
    Route::get('/admin/providers/ratings', [App\Http\Controllers\admin\ServiceProviderController::class, 'ProviderRating'])->name('admin.ProviderRatings');
    Route::put('/admin/rating/{id}/approve', [App\Http\Controllers\admin\ServiceProviderController::class, 'approveRating'])->name('admin.RatingApprove');
    Route::put('/admin/feedback/{id}/approve', [App\Http\Controllers\admin\ServiceProviderController::class, 'approveFeedback'])->name('admin.feedbackApprove');
});
