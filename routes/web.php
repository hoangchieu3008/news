<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('testPage');
});

Route::get('HoTen/{ten}', function ($ten) {
    echo "Ten la: ".$ten;
});
Route::get('/Laravel/{ngay}', function ($ngay) {
   echo "my page: " .$ngay;
})->where(['ngay' => '[0-9]+']);
Route::get('Route1', ['as' => 'MyRoute', function() {
    echo "Thành công định danh route";
}]);
Route::get('/Route2', function () {
  echo "Route 2 nay";
})->name('DinhDanh');
Route::get('GoiTen', function () {
   return redirect()->route('DinhDanh');
});

Route::group(['prefix' => 'MyGroup'], function () {
   Route::get('User1', function () {
       return "User1";
   })->name('DefaultUser    ');
   Route::get('User2', function () {
      return "User2";
   });
   Route::get('User3', function () {
      return "User3 này";
   });
});
Route::get('MyGroup', function () {
    return redirect()->route('DefaultUser');
});

// Call controller
Route::get('GoiController','MyController@XinChao');
Route::get('ThamSo/{ten}', 'MyController@KhoaHoc');

Route::get('MyRequest', 'MyController@GetUrl');

//post
Route::get('getForm', function () {
   return view('postForm');
});
Route::post('postForm', ['as'=>'postForm', 'uses'=>'MyController@postForm']);

//Cookie
Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

//upload
Route::get('uploadFile', function () {
   return view('postFile');
});
Route::post('postFile', ['as'=>'postFile', 'uses'=>'MyController@postFile']);

Route::get('getJson', 'MyController@getJson');

Route::get('myView', 'MyController@myView');

Route::get('Time/{t}', 'MyController@Time');
View::share('KhoaHoc', 'Laravel');

//Blade template
Route::get('blade', function () {
    return view('pages.pageOne');
});

Route::get('BladeTemplate/{str}', 'MyController@blade');