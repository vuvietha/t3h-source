<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function add($id, Request $request){
    	//dd($id);
    	$id = is_numeric($id) ? $id : 0;

    	//Lay thong tin chi tiet cua san pham
    	$infoPd  = DB::table('products')->where('id',$id)->first();
    	//dd($infoPd);

    	if(isset($infoPd->id) && $infoPd->id > 0){
    		//add thong tin san pham do vao gio hang
    		//su dung thu vien shopping cart cua laravel
    		$dataAdd = [
    			'id' => $id,
    			'name' => $infoPd->namepd,
    			'qty' => 1,
    			'price' => $infoPd->pricepd,
    			'options' => [
    				'image' => $infoPd->imagepd,
    				'description' => $infoPd->despd
    			]
    		];
    		if(Cart::add($dataAdd)){
    			return redirect()->route('show.cart');
    		}else{
    			return redirect()->route('show.cart',['state' => 'fail']);
    		}

    	}else{
    		//dieu huong ve cac trang not found page
    	}
    }

    public function showCart(){
    	//Can lay duoc thong tin tu trong gio hang khi nguoi dung da them san pham vao
    	//dd(Cart::content());
    	$data = [];
    	$data['cart'] = Cart::content();
    	return view('cart.index',$data);
    }

    public function delete($id){
    	//dd($id);
    	//delete rowid nam trong gio hang
    	Cart::remove($id);
    	return redirect()->route('show.cart');

    }

    public function remove(){
    	//Xoa tat ca san pham trong gio hang
    	Cart::destroy();
    	return redirect()->route('show.cart');
    }

    public function update(Request $request){
    	$cartId = $request->rowCart;
    	$qty = $request->qtyPd;
    	//echo $cartId.'---'.$qty;
    	//Kiem tra san pham co rowid nay co nam trong gio hang ko
    	//neu co thi moi update
    	$cartContent = Cart::content();
    	$flagCheck = false;
    	foreach ($cartContent as $key => $cart) {
    		if($key == $cartId ){
    			$flagCheck = true;
    		}
    	}
    	$data =[];
    	$data['money'] = 0;
    	$data['totalmoney'] = 0;
    	if($flagCheck ){
    		//Update cart
    		Cart::update($cartId, $qty);
    		//lay ra thong tin
    		$infoCart = Cart::get($cartId);
    		//print_r($infoCart);
    		$data['money'] = number_format($infoCart->price * $qty) ;
    		$data['totalmoney'] = Cart::subtotal();
    	}
    	echo json_encode($data);
    }
}
