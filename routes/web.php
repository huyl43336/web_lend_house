<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRegularRole;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[HomeController::class,'index'])->name('index');
Route::get('/login',[Authenticate::class,'index'])->name('login.index');
Route::post('/login/register',[Authenticate::class,'store'])->name('register.create');
Route::post('/login/process_login', [Authenticate::class, 'process_login'])->name('login.process_login');
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/lend/house/{house}', [HouseController::class, 'show_house'])->name('house.index');
Route::post('/save_house/{id}',[UserController::class,'save_house'])->name('save_house');


Route::get('/lend',[HouseController::class,'show_lend'])->name('lend');
Route::get('/lend/search',[HouseController::class,'search'])->name('search_house');
Route::get('/home/search',[HomeController::class,'home_search'])->name('home_search');
Route::middleware([CheckAdminRole::class])->prefix('admin')->group(function () {
    // Routes inside this group will have the AuthenticateMiddleware applied
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/account',[AdminController::class,'manage'])->name('admin.manage');
    Route::get('/create',[AdminController::class,'create'])->name('account.create');
   Route::post('/store',[AdminController::class,'store'])->name('admin.store');
   Route::post('/logout',[Authenticate::class,'logout'])->name('login.logout');
   Route::get('/edit/{account}',[AdminController::class,'edit'])->name('admin.edit');
   Route::post('/update/{account}',[AdminController::class,'update'])->name('admin.update');
   Route::get('/home/manage',[AdminController::class,'homemanage'])->name('homemanage');
   Route::get('/home/edit/{home}',[AdminController::class,'homeedit'])->name('home.edit');
   Route::post('/update/home/{home}',[AdminController::class,'update_home'])->name('home.update');
   Route::get('/create_home',[AdminController::class,'create_home'])->name('create_home');
   Route::post('/create_home/store',[AdminController::class,'store_content_home'])->name('store_content_home');
   Route::delete('/delete_account/{account}',[AdminController::class,'destroy'])->name('account.delete');
   Route::post('/reset_account/{account}',[AdminController::class,'reset_password'])->name('account.reset_password');
   Route::delete('/delete_home/{home}',[AdminController::class,'deletehome'])->name('deletehome');
   Route::get('/post/manage',[AdminController::class,'housemanage'])->name('housemanage');
   Route::get('/create_house',[AdminController::class,'create_house'])->name('create_house');
   Route::post('/create_house/store_house',[AdminController::class,'store_house'])->name('store_house');
 Route::get('/test',[AdminController::class,'test'])->name('test');
 Route::get('/edit_house/{house}',[AdminController::class,'edit_house'])->name('edit_house');
 Route::post('/update_house/{house}',[AdminController::class,'update_house'])->name('update_house');
 Route::delete('/delete_house/{house}',[AdminController::class,'delete_house'])->name('delete_house');
 Route::get('/contact',[AdminController::class,'contact_us'])->name('contact_us');
   
  
    // Add more routes as needed
});
Route::middleware([CheckRegularRole::class])->prefix('regular')->group(function () {
Route::post('/logout',[Authenticate::class,'logout'])->name('login.logout');

Route::get('/user/{id}',[UserController::class,'index'])->name('user.detail');
Route::get('/user/{id}/changepassword',[UserController::class,'change_password'])->name('change_password');
Route::post('/user/process_changepass',[UserController::class,'process_changepass'])->name('process_changepass');

Route::post('/user/change_avatar/{user}', [UserController::class, 'change_avatar'])->name('change_avatar');
// Route::get('/lend/{house}',[HomeController::class,'show_lend'])->name('lend');
});
Route::get('/regular',[HomeController::class,'regular'])->name('regular');
Route::get('home/testimonial',[FeedbackController::class,'testimonial'])->name('testimonial');
Route::post('home/comments/{house}',[HouseController::class,'store_comments'])->name('store_comments');
Route::post('home/replycomments/{house}',[HouseController::class,'store_reply_comments'])->name('store_reply_comments');
Route::post('home/likes/{house}',[HouseController::class,'store_likes'])->name('store_likes');

Route::get('/introduce',[HomeController::class,'showintro'])->name('showintro');
Route::get('/linktopage',[HomeController::class,'showpage'])->name('linktopage');
Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::post('/linktopage/sendcontact',[HomeController::class,'store_contact'])->name('store_contact');

Route::post('home/testimonial/store_feedback',[FeedbackController::class,'store_feedback'])->name('store_feedback');

