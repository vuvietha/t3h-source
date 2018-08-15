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

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

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
	'prefix' => 'admin'
], function(){
	Route::get('login','LoginController@login')->name('showForm');
	Route::get('logout','LoginController@logout')->name('logout');
	Route::post('handle-login', 'LoginController@handleLogin')->name('handleLogin');

});
Route::group([
	'namespace' => 'Backend', //Group namespace Backend
	'as' => 'admin.',
	'prefix' => 'admin',
	'middleware' => ['web','adminLogin']
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
	Route::post('edit/{id}','ProductController@handleedit')->name('product.handleedit');

});

Route::get('demo', 'TestController@check')->name('check');
Route::get('login', function(){
	return "Ban hay login";

})->name('login');

