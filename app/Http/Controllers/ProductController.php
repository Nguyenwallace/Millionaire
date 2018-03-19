<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Stock;
use Response;

class ProductController extends Controller
{
    //
	public function view()
	{
		$products = Product::all();
		return view('product.all_products', compact('products'));
	}

	public function viewall($no=10, Request $request){

		//$customers = Customer::all();
		//return view('customer.all', compact('customers'));		
		session_start();		
		if (isset($request->perpage)){
			$_SESSION["productpage"] = $request->get('perpage');			
		}
		if(isset($_SESSION["productpage"])){
			$no = $_SESSION["productpage"];
		}
		//$customers= Customer::all()->paginate(10);
		$products = DB::table('products')->paginate($no);

		$stocks = array();	

		foreach ($products as $product){

			$stocks[]= Stock::where('product_id', $product->id)->first()->quantity;

		}
			
		return view('product.all_products', compact('products','stocks'));
		
	}	
	
	
	public function addView()
	{	
		
		$cates = Category::all();
		return view('product.addView', compact('cates'));
	}
	
	public function quickAddProduct(ProductFormRequest $request){		
		// this is not updated
		//$cates = Category::all();		
		$product= new Product();
		$product->name= $request->get('name');
		//$product->category_id = $request->get('cate');
		$product->category_id = 1;
		$product->price = $request->get('price');
		$product->content=$request->get('content');
		$product->manu_date=$request->get('manu_date');
		$product->save();
		return redirect('admin/products')->with('status', 'New product name '.$product->name.' added');
		
	}
	
	public function show(){
		//this function not update
		$products = Product::all();
		return view('product.all_products', compact('products'));
	}
		
	public function delete(){
		//this function not update
		$products = Product::all();
		return view('product.all_products', compact('products'));
	}	
	
	public function autocomplete(Request $request)	
	{		
		//$term = $request->get('term');
		$term = $request->term;
		//$term = Input::get('term');
		
		$results = array();
		
		$cates = Category::where('name', 'LIKE', '%'.$term.'%')->take(2)->get();
		
		foreach ($cates as $cate)
		{
			//$results[] = [ 'name' => $cate->name, 'id'=> $cate->id];
			//$results[] = ['name' => $cate->name];
			$results[] = $cate->name;
		}		
		return Response::json($results);
		//return response()->json($results);
	}  
	
}
