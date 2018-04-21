<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierFormRequest;
use App\Supplier;
use Response;
use Auth;
use DB;

class SupplierController extends Controller
{
    //	

	public function supQuickAdd(SupplierFormRequest $request)
	{

		$supplier = new Supplier;		
		$supplier->name = $request->get('name');
		$supplier->email =  $request->get('email');
		$supplier->address = $request->get('address');
		$supplier->telephone = $request->get('telephone');
		$supplier->save();

		$result = ['message'=>"Đã thêm NCC vào"];

		return Response::json($result);

	}

	public function quickAdd(SupplierFormRequest $request)
	{

		$supplier = new Supplier;		
		$supplier->name = $request->get('name');
		$supplier->email =  $request->get('email');
		$supplier->address = $request->get('address');
		$supplier->telephone = $request->get('telephone');
		$supplier->user_id = Auth::user()->id;
		$supplier->save();

		return redirect('admin/supplier');

	}

	public function autocomplete(Request $request)	
	{		
		//$term = $request->get('term');
		$term = $request->term;
		//$term = Input::get('term');
		
		$results = array();
		
		$suppliers = Supplier::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
		
		foreach ($suppliers as $supplier)
		{
			//$results[] = [ 'name' => $cate->name, 'id'=> $cate->id];
			//$results[] = ['name' => $cate->name];
			$results[] = $supplier->name;
		}		
		return Response::json($results);
		//return response()->json($results);
	} 

	public function blur(Request $request){
	//public function blur(){
		
		//$product= Product::where('name', $request->get(product_name))->first()->get();
		$name = $request->get('supplier');
		$supplier= Supplier::where('name', $name)->first();
		if(!isset($supplier->id)){
			$result= ['id'=>'', 'address'=>'', 'telephone'=>'', 'email'=>''];
		}
		else{
			$result= ['id'=>$supplier->id, 'address'=>$supplier->address, 'telephone'=>$supplier->telephone, 'email'=>$supplier->email];
		}
		//$result= ['price'=>$product->price, 'stock'=>$quantity];
		
		//$result= ['price'=>$name];
		//$result= array('price'=>$product->price);
		
		return Response::json($result);
		//return ($result);
	} 

	public function all(Request $request, $no=10)
	{

		//$supplier = Supplier::all();
		session_start();		
		if (isset($request->perpage)){
			$_SESSION["suppage"] = $request->get('perpage');			
		}
		if(isset($_SESSION["suppage"])){
			$no = $_SESSION["suppage"];
		}
		//$customers= Customer::all()->paginate(10);
		$suppliers = DB::table('suppliers')->where('user_id',Auth::user()->id)->paginate($no);			
		return view('supplier.all', compact('suppliers'));
		
	}

	public function delete($id)
	{
		//will implement here
		echo "test";
	}

		
		

}
