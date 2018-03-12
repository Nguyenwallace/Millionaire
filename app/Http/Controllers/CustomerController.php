<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CustomerFormRequest;

use App\Customer;

use Response;

use Illuminate\Support\Facades\DB;

use File;

class CustomerController extends Controller
{
    //
	public function addView(){
		
		return view('customer.addView');
	}
	
	public function add(CustomerFormRequest $request){
		//
		if ($request->hasFile('photo')) {
			$file = $request->file('photo');
			$photo = $file->getClientOriginalName();
			$file->move(public_path() . '/images/customer/', $photo);
		}
		$customer = new Customer;
		$customer->address= $request->get('address');
		$customer->name= $request->get('name');
		$customer->telephone= $request->get('telephone');
		$customer->email= $request->get('email');
		$customer->photo= $photo;
		$customer->save();
		
		return redirect('admin/customer/add')-> with('status','new customer '.$request->get('name').' created');
		
	}
	
	public function viewAll($no=10, Request $request){
		session_start();		
		if (isset($request->perpage)){
			$_SESSION["cuspage"] = $request->get('perpage');			
		}
		if(isset($_SESSION["cuspage"])){
			$no = $_SESSION["cuspage"];
		}
		//$customers= Customer::all()->paginate(10);
		$customers = DB::table('customers')->paginate($no);			
		return view('customer.viewAll', compact('customers'));
	}
	
	public function show ($id){
		//update
		$customer= Customer::where('id',$id)->firstOrFail();
		return view('customer.show', compact('customer'));
		
	}
	
	public function delete ($id, Request $request){
		
		//update here
		$customer= Customer::where('id', $id)->first();
		$photo=$customer->photo;		
		$image_path = 'images/customer/'.$photo; 
		//File::delete($image_path);
		if(File::exists($image_path)) {
			File::delete($image_path);
		}
		$customer->delete();
		return redirect('admin\customer')->with('status', 'Đã xóa khách hàng '. $customer->name.' và photo! '.$photo);
		
	}
	
	public function update($id, Request $request){
		//
		$customer = Customer::where('id', $request->get('customer_id'))->first();
		$photo=$customer->photo;		
		$image_path = 'images/customer/'.$photo; 
		//File::delete($image_path);
		if(File::exists($image_path)) {
			File::delete($image_path);
		}
		
		if ($request->hasFile('photo')) {
			$file = $request->file('photo');
			$photo = $file->getClientOriginalName();
			$file->move(public_path() . '/images/customer/', $photo);
		}
		
		$customer->address= $request->get('address');
		$customer->name= $request->get('name');
		$customer->telephone= $request->get('telephone');
		$customer->email= $request->get('email');
		$customer->photo= $photo;
		$customer->save();
		
		return redirect('admin\customer\all')->with('status', 'customer '.$customer->name. ' updated');
		
	}
	
	public function viewIndex(){
				
		return view('customer.viewindex');
		
	}

	public function addnew(){
				
		return view('customer.addnew');
		
	}
	public function quickadd(CustomerFormRequest $request){
		//
		if ($request->hasFile('photo')) {
			$file = $request->file('photo');
			$photo = $file->getClientOriginalName();
			$file->move(public_path() . '/images/customer/', $photo);
		}
		$customer = new Customer;
		$customer->address= $request->get('address');
		$customer->name= $request->get('name');
		$customer->telephone= $request->get('telephone');
		$customer->email= $request->get('email');
		$customer->photo= $photo;
		$customer->save();
		
		return redirect('admin/customer/')-> with('status','Khách hàng mới tên '.$request->get('name').' đã được tạo');
		
	}

	public function all($no=10, Request $request){

		//$customers = Customer::all();
		//return view('customer.all', compact('customers'));
		session_start();		
		if (isset($request->perpage)){
			$_SESSION["cuspage"] = $request->get('perpage');			
		}
		if(isset($_SESSION["cuspage"])){
			$no = $_SESSION["cuspage"];
		}
		//$customers= Customer::all()->paginate(10);
		$customers = DB::table('customers')->paginate($no);			
		return view('customer.all', compact('customers'));
	}
	
	
	public function cusQuickAdd(Request $request){

		$customer = new Customer;
		$customer->address= $request->get('address');
		$customer->name= $request->get('name');
		$customer->telephone= "0909876545";
		$customer->email= $request->get('email');
		$customer->photo= "test.gif";
		$customer->save();

		$result = ['message'=>"Đã Thêm Thành Công"];
		return Response::json($result);
	}
	
}
