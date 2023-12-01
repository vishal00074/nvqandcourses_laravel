<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebCoursesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\Admin\WebPagesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CoursesLevelController;
use App\Http\Controllers\UserPaypalController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/run-composer', function () {
    Artisan::call('composer update');
    return 'Composer command triggered.';
});



Route::get('/clear-config-cache', function () {
    // Clear the configuration cache
    Artisan::call('config:cache');

    return 'Configuration config cache.';
});

Route::get('/clear-config-clear', function () {
    // Clear the configuration cache
    Artisan::call('config:clear');

    return 'Configuration cache cleared.';
});

Route::get('/clear-optimize-clear', function () {
    // Clear the configuration cache
    Artisan::call('optimize:clear');

    return 'Configuration  optimize cache cleared.';
});

Route::post('pay', [PayPalController::class, 'pay']);
Route::get('success/{id}', [PayPalController::class, 'success']);
Route::get('error', [PayPalController::class, 'error']);
Route::get('/get_paypal/{id}', [PayPalController::class, 'GetPaypal'])->name('paypal.get');



Route::get('slug', [WebCoursesController::class, 'Slug']);

Route::view('thankyou', 'pages.thankyou');


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'About']);
Route::get('policy',[HomeController::class, 'policy']);
Route::get('terms',[HomeController::class, 'terms']);
Route::get('/blog', [HomeController::class, 'Blog']);
Route::get('/contact', [HomeController::class, 'Contact']);

Route::get('blog/{id}', [HomeController::class, 'Blog_Show']);

Route::get('sitemap.xml', [HomeController::class, 'SiteMap']);

/** Courses Route */
Route::get('nvq_courses/{slug}',[WebCoursesController::class, 'NVQCourse'] );
Route::get('courses', [WebCoursesController::class, 'Courses']);
Route::get('short_courses', [WebCoursesController::class, 'ShortCourses']);
Route::get('plumbing_courses', [WebCoursesController::class, 'PlumbingCourses']);
Route::get('couses_detail/{slug}', [WebCoursesController::class, 'CoursesDetail']);
Route::get('electrical_courses', [WebCoursesController::class, 'ElectricalCourses']);
Route::get('citb_courses', [WebCoursesController::class, 'CITBCourses']);



Route::get('guest_cart/{id}', [WebCoursesController::class, 'GuestCart']);
Route::post('guest_registration',[WebCoursesController::class, 'GuestRegister']);
Route::get('apply_course/{id}',[WebCoursesController::class, 'ApplyCourse']);
Route::get('enquire_course/{id}',[WebCoursesController::class, 'EnquireCourse']);
Route::post('save_apply_course',[WebCoursesController::class, 'SubmitApplyCourse']);


/* Registration routes */
Route::post('user_registration',[RegisterController::class, 'SubmitRegister']);
Route::post('verify_otp',[RegisterController::class, 'verifyOTP']);
Route::get('/sendotp/{id}',[RegisterController::class, 'otp'])->name('otp.verification');
Route::get('login',[RegisterController::class, 'Login'])->name('user.login');
Route::post('logged_in',[RegisterController::class, 'LoggedIn']);
Route::get('sign_out',[RegisterController::class, 'SignOut']);
Route::get('/register', [RegisterController::class, 'Register']);
Route::get('forget_password',[RegisterController::class, 'Forget_Password']);
Route::post('send/otp',[RegisterController::class, 'SubmitRequest']);
Route::post('user_queries',[PagesController::class, 'CustomerQuery']);
Route::get('test',[PagesController::class, 'Test']);
Route::get('forget-password',[RegisterController::class, 'verificationMail']);
Route::post('forget-password',[RegisterController::class, 'ForgetPassword']);
Route::get('resend_otp/{id}',[RegisterController::class, 'ResendOtp']);




/** Guest Payment */
Route::post('guest_payment', [PaymentController::class, 'GuestPayment'])->name('guest.stripe');
Route::get('get_payment/{id}', [WebCoursesController::class, 'GetPaymentStripe'])->name('guest.payment');

Route::group(['middleware'=>'auth'], function() {

    
/** Courses Route */
Route::get('user_cart/{id}', [WebCoursesController::class, 'Cart']);
Route::get('cart', [WebCoursesController::class, 'CartDetail']);
Route::get('delete_cart/{id}',[WebCoursesController::class, 'DeleteCart']);

Route::get('profile', [RegisterController::class, 'GetProfile']);
Route::post('update_profile', [RegisterController::class, 'UpdateProfile']);


//Payment
Route::controller(PaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

//Paypal Payment  
Route::get('get_user_paypal',[UserPaypalController::class, 'GetUserPaypal']);
Route::post('user_pay',[UserPaypalController::class, 'UserPay']);
Route::get('user_success/{id}', [UserPaypalController::class, 'UserSuccess']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('adminLogin');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('adminLoginPost');
    
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');
        Route::get('/logout',  [LoginController::class, 'adminLogout'])->name('adminLogout');
        
        Route::get('profile',[LoginController::class, 'profile']);
        Route::post('profile/post',[LoginController::class, 'profile_post']);
        
        Route::resource('courses', CoursesController::class);
        Route::get('enrolled_courses',[CoursesController::class, 'enrolled_courses']);
        Route::get('enrolled_courses/{id}',[CoursesController::class, 'enrolled_courses_show']);
        Route::delete('enrolled_courses/{id}',[CoursesController::class, 'enrolled_courses_destroy']);
        Route::get('enrolled_guest',[CoursesController::class, 'enrolled_guest']);
        Route::get('enrolled_guest/{id}',[CoursesController::class, 'enrolled_guest_show']);
        Route::delete('enrolled_guest/{id}',[CoursesController::class, 'enrolled_guest_destroy']);
        Route::resource('users', UsersController::class);
        Route::get('user_queries',[UsersController::class, 'user_queries']);
        Route::delete('user_queries/{id}',[UsersController::class, 'user_queries_destroy']);
        
        Route::get('contact_us',[WebPagesController::class, 'contact_us']);
        Route::post('contact_us/post',[WebPagesController::class, 'contact_us_post']);
        
        Route::get('about_us',[WebPagesController::class, 'about_us']);
        Route::post('about_us/post',[WebPagesController::class, 'about_us_post']);
        
        Route::get('home_header',[WebPagesController::class, 'home_header']);
        Route::get('home_header/add',[WebPagesController::class, 'home_header_add']);
        // Route::post('home_header/post',[WebPagesController::class, 'home_header_post']);
        Route::post('home_header/post',[WebPagesController::class, 'home_header_post']);
        Route::get('home_header/{id}',[WebPagesController::class, 'home_header_show']);
        Route::post('home_header/update/{id}',[WebPagesController::class, 'home_header_update']);
        Route::delete('home_header/delete/{id}',[WebPagesController::class, 'home_header_delete']);
        
        Route::post('home_choose/post',[WebPagesController::class, 'home_choose_update']);
        
        Route::get('home',[WebPagesController::class, 'home']);
        Route::post('home/post',[WebPagesController::class, 'home_post']);
        
        Route::get('policy',[WebPagesController::class, 'policy']);
        Route::post('policy/post',[WebPagesController::class, 'policy_post']);
        
        Route::get('terms',[WebPagesController::class, 'terms']);
        Route::post('terms/post',[WebPagesController::class, 'terms_post']);
        Route::get('/general',[WebPagesController::class, 'general']);
        Route::post('/general/post',[WebPagesController::class, 'general_post']);
        Route::post('/footer/post',[WebPagesController::class, 'footer_post']);
        Route::post('/home/update',[WebPagesController::class, 'home_update']);


        Route::get('applied_courses',[CoursesController::class, 'applied_courses']);
        Route::get('applied_courses/{id}',[CoursesController::class, 'applied_courses_show']);
        Route::delete('applied_courses/{id}',[CoursesController::class, 'applied_courses_destroy']);
      

        Route::resource('blogs', BlogController::class);

        Route::resource('courses_level', CoursesLevelController::class);
    });
});



