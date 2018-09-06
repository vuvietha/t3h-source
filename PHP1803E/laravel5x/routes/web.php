<?php

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
// 	return view('welcome');
// })->name('welcome');
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

],function(){
	// $language = Session::get('locale');
	// $language = ($language == '' || $language == null) ? 'vi' : $language;
	// App::setLocale($language);
	// LaravelLocalization::setLocale($language);
	Route::get('/','ProductController@index')->name('product.index');
	Route::get('add-cart/{id}','CartController@add')->name('addcart');
	Route::get('cart','CartController@showcart')->name('show.cart');
	Route::get('delete-cart/{id}','CartController@delete')->name('cart.delete');
	Route::get('destroy-cart','CartController@remove')->name('cart.removeall');
	Route::post('update-cart','CartController@update')->name('cart.update');

});

Route::get('switch-language/{lang}', function($lang = null){
	//dd($lang);
	//set ngon ngu cho toan bo ung dung
	App::setLocale($lang);
	//Luu ngon ngu vao sesion de cho cac phien lam viec khac nhau
	Session::put('locale',$lang);
	//dung thu vien LaravelLocalization set lai ngon ngu 1 lan nua de no cí the tu hieu va chuyen doi ngon ngu dua vao tham so tren url truyen vao
	LaravelLocalization::setLocale($lang);
	//Dieu huong ve trang ma nguoi dung dang dung trc khi ho bam vao nut chuyen doi ngon ngu
	$url = LaravelLocalization::getLocalizedURL(App::getLocale(),\URL::previous());
	return redirect($url);

})->name('language');

Route::get('hello',function(){
	return "Hello World";

});

Route::get('sam-sung/galaxys', function(){
	return 'Galaxy S9+';
})->name('samsung');

Route::post('apple/iphone', function(){
	return 'Iphone X';
});

Route::match(['get','post'], 'apple/macbook',function(){
	return "Macbook 2018";

});

Route::any('sony/sonyz', function(){
	//return "Sony Experia 2";
	return Redirect()->route('samsung');

});

Route::view('/view','welcome');

//Truyen tham so bat buoc vao routinng
Route::get('book/{name}/{id}', function($nameBook, $id){
	return $nameBook.'---'.$id;

})->where(['name' => '[A-Za-z]+', 'id' => '[0-9]+']);

//Truyen tham so khong bat buoc vao routing
Route::get('phim-truyen/{name?}/{id?}', function($name = null, $id = null){
	return $name.'---'.$id;
})->where(['name' => '[A-Za-z]+', 'id' => '[0-9]+']);

//Validate param

Route::get('football', function(){
	return "Phap";
})->name('worldcup');

Route::redirect('hello', 'football',301);

Route::get('watch-football', function(){
	return redirect()->route('worldcup');
	//return redirect('football');
});



Route::group([
	'prefix' => 'admin',
	'as' => 'admin.'
], 
function(){
	Route::get('home', function(){
		return "Admin - Home";
	})->name('home');

	Route::get('product', function(){
		return "Admin - Product";
	})->name('product');

});

Route::get('login', function(){
	//return redirect()->route('admin.home');
	//$route = Route::current();
	//$name = Route::currentRouteName();
	$action = Route::currentRouteAction();
	//die + var_dump
	dd($action);

})->name('login');

// Route::domain('{account}.myweb.com')->group(function(){
// 	 Route::get('user/{id}', function ($account, $id) {
//         return "Sub-domain {$account} - {$id}";
//     });

// });



Route::group([
	'middleware' => ['check_age:admin','web'] //Truyen tham so vao middleware admin la tham so cua middleware
], function(){
	Route::get('watch-film/{age}', function(){
		return "OK - ban duoc xem";

	}); 

	Route::get('shopping/{age}', function($ages){
		return "OK - Ban duoc mua hang";

	});

});

Route::get('so-nguyen-to/{number}', function($number){
	return "La so nguyen to";

})->middleware('check_snt');

Route::get('khong-la-snt', function(){
	return "Ko la so nguyen to";

})->name('khong-la-snt');


Route::get('helloworld','TestController@show')->name('helloworld');
Route::group([
	'namespace' => 'Backend', //Group namespace Backend
	'as' => 'admin.',
	'prefix' => LaravelLocalization::setLocale().'/admin',
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function(){
	Route::get('login','LoginController@login')->name('showForm');
	Route::get('logout','LoginController@logout')->name('logout');
	Route::post('handle-login', 'LoginController@handleLogin')->name('handleLogin');

});
Route::group([
	'namespace' => 'Backend', //Group namespace Backend
	'as' => 'admin.',
	'prefix' => LaravelLocalization::setLocale().'/admin',
	//'middleware' => ['web','adminLogin']
	'middleware' => ['web','adminLogin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('demo/{id}', 'DashboardController@demo')->name('demo');	
	Route::post('sum-number', 'DashboardController@sum')->name('sum');	
	Route::get('orm','DashboardController@orm')->name('orm');
	Route::get('join','DashboardController@join')->name('join');
	Route::get('product','ProductController@index')->name('product');	
	Route::get('add-product','ProductController@add')->name('addproduct');	
	Route::post('add','ProductController@handleadd')->name('product.handleadd');
	Route::post('delete','ProductController@delete')->name('product.delete');
	Route::get('product-detail/{id}','ProductController@detail')->name('product.detail');

});

Route::get('demo', 'TestController@check')->name('check');
Route::get('login', function(){
	return "Ban hay login";

})->name('login');

//Dinh nghia cac route lam viec voi API
Route::group([
	'namespace' => 'API',
	'prefix' => 'api'
],function(){
	Route::resource('football','FootballController')->only(
		['index','show']
	);
	Route::resource('create-product','FootballController')->only('store');
	Route::resource('delete-product','FootballController')->only('destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
