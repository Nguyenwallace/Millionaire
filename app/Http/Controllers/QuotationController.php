<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Response;

use App\Stock;
use App\Http\Requests\QuotationFormRequest;
use App\Quotation;
use App\Qp;
use App\Customer;
use Illuminate\Support\Facades\DB;
//use Input;

class QuotationController extends Controller
{
    //
	public function addView(){
		
		return view('quotation.newQuotevn');
	}
	
	public function autocomplete(Request $request)	
	{		
		//$term = $request->get('term');
		$term = $request->term;
		//$term = Input::get('term');
		
		$results = array();
		
		$products = Product::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
		
		foreach ($products as $product)
		{
			//$results[] = [ 'name' => $cate->name, 'id'=> $cate->id];
			//$results[] = ['name' => $cate->name];
			$results[] = $product->name;
		}		
		return Response::json($results);
		//return response()->json($results);
	}  
	
	public function blur(Request $request){
	//public function blur(){
		
		//$product= Product::where('name', $request->get(product_name))->first()->get();
		$name = $request->get('product');
		$product= Product::where('name', $name)->first();
		if(isset($product->id)){
			//$stock= $product->stock()->get()->toArray();
			$stock= Stock::where('id', $product->id)->first();		
			$result= ['price'=>$product->price, 'stock'=>$stock->quantity];
		}
		else {
			
			$result= ['price'=>"", 'stock'=>""];
		}
		//$result= ['price'=>$product->price, 'stock'=>$quantity];
		
		//$result= ['price'=>$name];
		//$result= array('price'=>$product->price);
		
		return Response::json($result);
		//return ($result);
	}
	
	public function addQuote (QuotationFormRequest $request){
		
		$products = $request->get('product');
		$quantities = $request->get('quantity');
		$prices = $request->get('price');		
		$noOfProduct = count($products);		
		
		$quote_number = $request->get('quote_number');
		$quoted_date = $request->get('quotedDate');
		//$dateLocale = DateTime::createFromFormat('d-m-Y', $dateInput);
		//$customer_id = $request->get('customer_id');
		//$supplier_id = $request->get('supplier_id');
		$tax = $request->get('tax');
		$discount = $request->get('discount');	
		$amount = $request->get('amount');
		//create new quotation and saving
		$quote = new Quotation();
		$quote->quote_number = $quote_number;
		$quote->amount=$amount;
		//$quote->customer_id = $customer_id;
		$quote->cusEmail=$request->get('cusEmail');
		//$quote->supplier_id = $supplier_id;
		$quote->tax = $tax;
		$quote->discount = $discount;
		$quote->quoted_date = $quoted_date;
		$quote->save();
		//$qp = array();
		for ($i=0; $i < $noOfProduct; $i++){
			/*
			$qp[$i] = new Qp;			
			$qp[$i]->quotation_id= $quote->id;
			$qp[$i]->product=$products[$i];
			$qp[$i]->quantity=$quantities[$i];
			$qp[$i]->price = $prices[$i];
			$qp[$i]->save();
			*/
			$qp = new Qp;			
			$qp->quotation_id= $quote->id;
			$qp->product=$products[$i];
			$qp->quantity=$quantities[$i];
			$qp->price = $prices[$i];
			$qp->save();
		
		}
		//save quotation here
		return redirect('admin/quotation/add')->with('status', 'New Quotation '.$quote_number. ' added');
		
		
	}
	
	public function viewAll(){
		
		$quotes = Quotation::all();
		return view('quotation.all_quotations', compact('quotes'));
	}
	
	public function show($id){
		$quote = Quotation::where('id', $id)->firstOrFail();
		$qps = Qp::where('quotation_id', $id)->get();
		$customer=Customer::where('email', $quote->cusEmail)->first();
		$quantities = array();
		foreach($qps as $qp){
			$product=Product::where('name', $qp->product)->first();
			$stock=Stock::where('product_id', $product->id)->first();
			$quantities[]=$stock->quantity;
		}
		return view('quotation.showQuotevn', compact('quote','qps','quantities','customer'));
	}
	
	public function delete($id){
		//need to update
		$quote = Quotation::where('id', $id)->firstOrFail();
		$quote->delete();
		$qps = Qp::where('quotation_id', $id)->get();
		foreach ($qps as $qp){
			$qp->delete();
		}
		//$quotes = Quotation::all();
		//return view('quotation.all_quotations',compact('quotes'));
		return redirect('admin\quotation');
	}
	
	public function deleteAll(){
		//need to update
		$quotes = Quotation::all();
		foreach($quotes as $quote){
			$quote->delete();
			$qps = Qp::where('quotation_id', $quote->id)->get();
			foreach ($qps as $qp){
				$qp->delete();
			}
		}
		$quotes = Quotation::all();
		return view('quotation.all_quotations', compact('quotes'));
	}
	
	public function update($id, QuotationFormRequest $request){
		
		$products = $request->get('product');
		$quantities = $request->get('quantity');
		$prices = $request->get('price');
		$noOfProduct = count($products);		
		
		$quote_number = $request->get('quote_number');
		$customer_id = $request->get('customer_id');
		$supplier_id = $request->get('supplier_id');
		$tax = $request->get('tax');
		$discount = $request->get('discount');	
		$quoted_date = $request->get('quotedDate');
		$amount = $request->get('amount');
		//create new quotation and saving
		$quote = Quotation::where('id',$id)->first();
		$quote->quote_number = $quote_number;
		$quote->amount=$amount;
		$quote->customer_id = $customer_id;
		$quote->supplier_id = $supplier_id;
		$quote->tax = $tax;
		$quote->discount = $discount;
		$quote->quoted_date = $quoted_date;
		$quote->save();
		//$qp = array();
		
		$qps = Qp::where('quotation_id', $id)->get();
		foreach($qps as $qp){
			$qp->delete();
		}
		for ($i=0; $i < $noOfProduct; $i++){
			/*
			$qp[$i] = new Qp;			
			$qp[$i]->quotation_id= $quote->id;
			$qp[$i]->product=$products[$i];
			$qp[$i]->quantity=$quantities[$i];
			$qp[$i]->price = $prices[$i];
			$qp[$i]->save();
			*/
			$qp = new Qp;			
			$qp->quotation_id= $quote->id;
			$qp->product=$products[$i];
			$qp->quantity=$quantities[$i];
			$qp->price = $prices[$i];
			$qp->save();
		
		}
		
		return redirect('admin/quotation')->with('status', 'Báo Giá Số '.$quote_number. ' đã được cập nhật!');
	}
	
	public function autoCustomer(Request $request)	
	{		
		//$term = $request->get('term');
		$term = $request->term;
		//$term = Input::get('term');
		
		$results = array();
		
		$customers = Customer::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
		
		foreach ($customers as $customer)
		{
			//$results[] = [ 'name' => $cate->name, 'id'=> $cate->id];
			//$results[] = ['name' => $cate->name];
			$results[] = $customer->name;
		}		
		return Response::json($results);
		//return response()->json($results);
	}  
	
	public function blurCustomer(Request $request){
	//public function blur(){
		
		//$product= Product::where('name', $request->get(product_name))->first()->get();
		$name = $request->get('customer');
		$customer= Customer::where('name', $name)->first();
		if(!isset($customer->id)){
			$result= ['id'=>'', 'address'=>'', 'telephone'=>'', 'email'=>''];
		}
		else{
			$result= ['id'=>$customer->id, 'address'=>$customer->address, 'telephone'=>$customer->telephone, 'email'=>$customer->email];
		}
		//$result= ['price'=>$product->price, 'stock'=>$quantity];
		
		//$result= ['price'=>$name];
		//$result= array('price'=>$product->price);
		
		return Response::json($result);
		//return ($result);
	}
	
	public function report(){
		//
		$quotes = Quotation::whereBetween('quoted_date',['2017-10-4', '2018-02-6'])->get();
		
		return view('report.report', compact('quotes'));
	}
	
	public function reportedSelect(Request $request){
		
		$dateFrom= $request->get('dateFrom');
		$dateTo= $request->get('dateTo');
		
		if(!isset($request->customer)){
		
			$quotes = Quotation::whereBetween('quoted_date',[$dateFrom, $dateTo])->get();
			
			return view('report.report', compact('quotes'));
		}
		else {
			
			$test = $request->get('customer');
			$customer=Customer::where('name',$test)->first();
			$mail=$customer->email;
			//$quotes = Quotation::whereBetween('quoted_date',[$dateFrom, $dateTo])->where('cusEmail',$mail)->get();
			//try to chose the month only whereMonth
			//$quotes = Quotation::whereBetween('quoted_date',[$dateFrom, $dateTo])->whereMonth('quoted_date','11')->get();
			$quotes = Quotation::whereBetween('quoted_date',[$dateFrom, $dateTo])->where('cusEmail',$mail)->get();

			return view('report.report', compact('quotes'));
			
		}
	}
	

	public function all($no=10, Request $request){

		//$customers = Customer::all();
		//return view('customer.all', compact('customers'));
		$cusArray= array();
		session_start();		
		if (isset($request->perpage)){
			$_SESSION["quotepage"] = $request->get('perpage');			
		}
		if(isset($_SESSION["quotepage"])){
			$no = $_SESSION["quotepage"];
		}
		//$customers= Customer::all()->paginate(10);
		$quotes = DB::table('quotations')->paginate($no);	
		foreach ($quotes as $quote)	{
			$cusArray[]=Customer::where('email', $quote->cusEmail)->first()->name;
			//$stock=Stock::where('product_id', $product->id)->first();
		}	
		return view('quotation.all', compact('quotes','cusArray'));
	}

	public function deleteQuote(Request $request){
		//need to update
		$id=$request->get('id');
		$quote = Quotation::where('id', $id)->firstOrFail();
		$quote->delete();
		$qps = Qp::where('quotation_id', $id)->get();
		foreach ($qps as $qp){
			$qp->delete();
		}

		$result = ['message'=>"Đã Xóa Thành Công"];
		return Response::json($result);
		//$quotes = Quotation::all();
		//return view('quotation.all_quotations',compact('quotes'));
		//return redirect('admin\quotation');
	}

}
