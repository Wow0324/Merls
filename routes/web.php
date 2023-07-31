<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    $user = Auth::user();
    if($user){
        $role = $user['role'];
        switch($role){
            case 0:
                return redirect()->route('admin.author_users');
            case 1:
                return redirect()->route('customer.dashboard');
            default:
                return redirect()->route('dispatcher.author_users');
        }
    }
    else{
        return redirect()->route('login');
    } 
});

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
|
|
|
*/
Auth::routes();

 // Registration Routes...
 Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
 Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
 Route::post('update_profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('update_profile');
 Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login'); 
 Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login'); 
 // Authentication Routes...
 Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/customers', [App\Http\Controllers\Admin\CustomersController::class, 'index'])->name('customers');
    Route::get('/properties', [App\Http\Controllers\Admin\PropertiesController::class, 'index'])->name('properties');
    Route::get('/author_users', [App\Http\Controllers\Admin\AuthorUsersController::class, 'index'])->name('author_users');
    Route::get('/dispatchers', [App\Http\Controllers\Admin\DispatchersController::class, 'index'])->name('dispatchers');
    Route::get('/detail_property', [App\Http\Controllers\Admin\PropertiesController::class, 'detailProperty'])->name('detail_property');
    
    Route::post('/get_customer', [App\Http\Controllers\Admin\CustomersController::class, 'getCustomer'])->name('get_customer');
    Route::post('/delete_customer', [App\Http\Controllers\Admin\CustomersController::class, 'deleteCustomer'])->name('delete_customer');
    Route::post('/add_customer', [App\Http\Controllers\Admin\CustomersController::class, 'addCustomer'])->name('add_customer');
    Route::post('/approve_customer', [App\Http\Controllers\Admin\CustomersController::class, 'approveCustomer'])->name('approve_customer');
    Route::post('/get_dispatcher', [App\Http\Controllers\Admin\DispatchersController::class, 'getDispatcher'])->name('get_dispatcher');
    Route::post('/delete_dispatcher', [App\Http\Controllers\Admin\DispatchersController::class, 'deleteDispatcher'])->name('delete_dispatcher');
    Route::post('/add_dispatcher', [App\Http\Controllers\Admin\DispatchersController::class, 'addDispatcher'])->name('add_dispatcher');
    Route::post('/add_property', [App\Http\Controllers\Admin\PropertiesController::class, 'addProperty'])->name('add_property');
    Route::post('/get_property', [App\Http\Controllers\Admin\PropertiesController::class, 'getProperty'])->name('get_property');
    Route::post('/delete_property', [App\Http\Controllers\Admin\PropertiesController::class, 'deleteProperty'])->name('delete_property');
    Route::post('/approve_property', [App\Http\Controllers\Admin\PropertiesController::class, 'approveProperty'])->name('approve_property');
    Route::post('/edit_jurisdiction', [App\Http\Controllers\Admin\PropertiesController::class, 'editJurisdiction'])->name('edit_jurisdiction');
    Route::post('/add_author', [App\Http\Controllers\Admin\AuthorUsersController::class, 'addAuthor'])->name('add_author');
    Route::post('/delete_author', [App\Http\Controllers\Admin\AuthorUsersController::class, 'deleteAuthor'])->name('delete_author');
});

/*
|--------------------------------------------------------------------------
| Customer routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::prefix('customer')->name('customer.')->group(function() {
    Route::get('/signup2', [App\Http\Controllers\Customer\AddPropertyController::class, 'index'])->name('signup2');
    Route::post('/signup2', [App\Http\Controllers\Customer\AddPropertyController::class, 'addProperty']);
    Route::get('/signup3', [App\Http\Controllers\Customer\AddAuthorUserController::class, 'index'])->name('signup3');
    Route::post('/signup3', [App\Http\Controllers\Customer\AddAuthorUserController::class, 'addAuthorUser']);
    Route::get('/dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/()', [App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('dashboard');

    Route::post('/add_property', [App\Http\Controllers\Customer\DashboardController::class, 'addProperty'])->name('add_property');
    Route::post('/add_author', [App\Http\Controllers\Customer\DashboardController::class, 'addAuthor'])->name('add_author');
});

/*
|--------------------------------------------------------------------------
| Dispatcher routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::prefix('dispatcher')->name('dispatcher.')->group(function() {
    Route::get('/properties', [App\Http\Controllers\Dispatcher\PropertiesController::class, 'index'])->name('properties');
    Route::get('/author_users', [App\Http\Controllers\Dispatcher\AuthorUsersController::class, 'index'])->name('author_users');    
});
