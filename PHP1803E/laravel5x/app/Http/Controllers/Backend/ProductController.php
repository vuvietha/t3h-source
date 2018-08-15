<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Size;
use App\Models\Product;
use App\Http\Requests\StoreProductPost;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

    public function index(Request $request){
    	$data = [];
    	$data['status'] = $request->session()->get('status');
    	//$data['lstPd'] = Product::all();
    	$keyword = $request->keyword;
    	$data['lstPd'] = DB::table('products')->where('namepd','LIKE',
    		"%{$keyword}%")->orwhere('pricepd','LIKE',"%{$keyword}%")->paginate(2);
    	$data['key'] = $keyword;
        //dd($keyword);
        //dd($data);
    	return view('admin.product.product',$data);
    }
    public function add(){
    	$data = [];
    	$data['categories'] = Category::all();
    	$data['sizes'] = Size::all();
    	return view('admin.product.addproduct',$data);

    }
    public function handleadd(StoreProductPost $request){
    	//dd($request);
    	$namepd = $request->namePd; //$request->input('namepd')
    	$cat = $request->catid;
    	$size = $request->sizeid;
    	$price = $request->pricepd;
    	$sale = $request->saleoff;
    	$qty = $request->qtypd;
    	$description = $request->despd;

    	//upload file trong laravel
    	$checkUpload = false;
    	$nameFile = '';
    	if($request->hasFile('imagepd')){
    		$file = $request->file('imagepd');
    		//Lay ten file
    		$nameFile = $file->getClientOriginalName();
    		if($file->getError()==0){
    			//upload
    			if($file->move("uploads/images",$nameFile)){
    				$checkUpload = true;

    			}

    		}
    	}
    	if(!$checkUpload && $nameFile == ''){
    		$request->session()->flash('errUpload','Vui long chon file upload');
    		return redirect()->route('admin.addproduct',['state'=>'fail']);
    	}else{
    		//insert data
    		$dataInsert = [
    			'catid' => $cat,
    			'sizeid' => $size,
    			'namepd' => $namepd,
    			'imagepd' => $nameFile,
    			'pricepd' => $price,
    			'saleoff' => $sale,
    			'statuspd' => 1,
    			'qtypd' => $qty,
    			'despd' => $description,
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => null
    		];
    		if(DB::table('products')->insert($dataInsert)){
    			$request->session()->flash('status','success');
    			return redirect()->route('admin.product');
    		}else{
    			$request->session()->flash('status','fail');
    			return redirect()->route('admin.addproduct',['state' => 'err']);
    		};

    	}
    }
    public function delete(Request $request){
    	$id = $request->id;
    	//echo $id;
    	$id = is_numeric($id) ? $id : 0;
    	if($id <= 0){
    		echo "ERR";
    	}else{
    		if(DB::table('products')->where('id',$id)->delete()){
    			echo "OK";

    		}else{
    			echo "Fail";
    		}
    		
    	}
		
	}
	public function detail($id, Request $request){
		//echo $id;
		$id = is_numeric($id) ? $id : 0;
		$infoPd = Product::find($id);
		//dd($infoPd);
		if(isset($infoPd->id)){
			$data = [];
			$data['info'] = $infoPd;
			$data['categories'] = Category::all();
    		$data['sizes'] = Size::all();
			return view('admin.product.editproduct',$data);

		}else{
			//Dieu huong ve cac trang not found page
		}

	}
}
