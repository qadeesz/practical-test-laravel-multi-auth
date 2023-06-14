<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;




// Route::group(['middleware' => ['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){

 
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');

//     Route::post('login', [AuthenticatedSessionController::class, 'store']);
 
// });


// Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin','as'=>'admin.'],function(){
     
//     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//                 ->name('logout');
// });




Route::prefix('admin')
->name('admin.')
->controller(AuthenticatedSessionController::class)
->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store')->name('store');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout', 'destroy')
            ->name('logout');
    });
});
