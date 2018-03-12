<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use App\Product;

class StockController extends Controller
{
    //
	public function viewALl(){
		//
		$stocks = Stock::all();
		$products = array();
		//$i=0;
		foreach ($stocks as $stock){
		//$products[$i] = Product::where('id', $stock->product_id)->firstOrFail();
		$products[] = Product::where('id', $stock->product_id)->firstOrFail();
		//$i++;
		}
		return view('stock.viewAll', compact('stocks','products'));
		
	}
}
