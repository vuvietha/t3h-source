<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//su dung model 
use  App\Models\Admin;
use App\Models\Product;
use App\Models\Size;
class DashboardController extends Controller
{
    public function join(Product $products){
        //$pd = Product::find(1);
        //$data = $pd->sizes()->with('products');
        //$data = (array) $data;
        //$data = Product::find(1)->with('sizes');
        //$data = (array) $data;
        // echo"<pre>";
        // print_r($data);
        // $data = Product::find(1)->with('sizes')
        //                 ->join('sizes','products.sizeid','=','sizes.id')->get();
        // foreach ($data as $key => $val) {
        //     echo"<pre>";
        //     //print_r($val->id);
        //     print_r($val->namesize);
        // }
        $pd = Size::find(1)->products()->where('name','So mi VT_1')->first();
        $pd2 = Size::with('products')->get();
        $pd3 = $products->test();
        dd($pd);
        // $test = Size::find(1)->products()->get();
        // dd($test);
        //dd($data['id']);

    }
    public function orm(){
        $data = Admin::all(); //orm
        // foreach ($data as $key => $val) {
        //     echo $val->username;
        //     echo"<br/>";
        // }
        $data2 = Admin::find(1);

        //DB:table('admins')->where('id',1)->first();
        $data3 = Admin::where(['role'=> -1,'status'=>1])
                        ->orWhere('password','12345')
                        ->get();
        $data4 = Admin::count();
        $data5 = Admin::avg('id');
        $data6 = Admin::max('id');
        $data7 = Admin::where('username','like','%admin%')->get();
        //DB:table('admins')->avg('id');
        //DB::table('admins')->select("");
        dd($data7);
        //dd($data);
        //DB::table('admins')->get() //query builder 

    }
    // public function index(){

    //     //get(): lay tat ca du lieu ra ~ select * from admins
    //     // $admin = DB::table('admins')->get();
    //     // foreach ($admin as $key => $val) {
    //     //     //echo $val['username'];
    //     //     echo $val->username;
    //     //     echo"<br>";
    //     // }
    //     // die();
    //     //dd($admin);
    // 	//truyen du lieu ra view
    //     //select chi ra chinh xac du lieu cua cac truong can lay
    //     $admin = DB::table('admins')->select('username','password')->get();
    //     $admin2 = DB::table('admins')->select('username','password')->first();
    //     $admin3 = DB::table('admins')
    //                   ->select('username','password')
    //                   ->where(['id'=>1, 'status' => 1])
    //                   ->orwhere('role',-1)
    //                   //->where('status',1)
    //                   ->first();
    //     $admin4 = DB::table('admins')->select('username','password')->where('username','like','%admin%')->get();
    //     $product = DB::table('products')
    //                     ->join('sizes','products.sizeid', '=','sizes.id')
    //                     ->join('categories', 'products.catid','=','categories.id')
    //                     ->select('categories.namecat','sizes.namesize')
    //                     ->where('products.id',1)
    //                     ->first();
    //     $product2 = DB::table('products')
    //                     ->leftjoin('sizes','products.sizeid', '=','sizes.id')
    //                     ->get();
    //     $product3 = DB::table('products')
    //                     ->rightjoin('sizes','products.sizeid', '=','sizes.id')
    //                     ->get();
    //     $product4 = DB::table('products')
    //                     ->crossjoin('sizes')
    //                     ->get();
    //     $product5 = DB::table('products')->offset(4)->limit(4)->get();

    //     //dd($admin3->username);
    //     //dd($admin4);
    //     // DB::table('admins')->insert([
    //     //     [
    //     //     'username' => 'vuvietha',
    //     //     'password' => '123',
    //     //     'email' => 'vuvietha@gmail.com',
    //     //     'role' => -1,
    //     //     'status' => 1,
    //     //     'created_at' => date('Y-m-d H:i:s'),
    //     //     'updated_at' => null
    //     // ],[
    //     //     'username' => 'vuvietha1',
    //     //     'password' => '1234',
    //     //     'email' => 'vuvietha1@gmail.com',
    //     //     'role' => -1,
    //     //     'status' => 1,
    //     //     'created_at' => date('Y-m-d H:i:s'),
    //     //     'updated_at' => null
    //     // ]
    //     // ]);
    //     //DB::table('admins')->where('id',12)->update(['username'=>'vuvietha123']);
    //     DB::table('admins')->where('id','>',11)->delete();
    //     //die();
    // 	$data = [];
    // 	$data['lstInfoST'] = [
    // 		[
    // 			'mSV' => 1,
    // 			'name' => 'NVA',
    // 			'gender' => 1,
    // 			'email' => 'test@gmail.com',
    // 			'money' => 2300000
    // 		],
    // 		[
    // 			'mSV' => 2,
    // 			'name' => 'NTB',
    // 			'gender' => 0,
    // 			'email' => 'test123@gmail.com',
    // 			'money' => 4500000
    // 		],
    // 		[
    // 			'mSV' => 3,
    // 			'name' => 'NVC',
    // 			'gender' => 1,
    // 			'email' => 'test12@gmail.com',
    // 			'money' => 2000000
    // 		]
    // 	];
    // 	return view('admin.dashboard.dashboard',$data);
    // }

    public function index(){
        $user = Session::get('userAdmin');
        //$user = $_SESSION['userAdmin'] ?? '';
        //dd($user);
        return view('admin.dashboard.dashboard');
    }
    public function demo(Request $request, $idP){
    	return $idP;
    	//return $request->id;

    }

    public function sum(Request $request){
        $number1 = $request->num1;
        $number2 = $request->num2;
        $data = [];
        $data['sum'] = 0;
        $data['mess'] = '';
        if(is_numeric($number1) && is_numeric($number2)){
             $data['sum'] = $number1 + $number2;
             $data['mess'] = 'OK';

        }else{
            $data['mess'] = 'ERR';
        }
        echo json_encode($data);

    }
}
