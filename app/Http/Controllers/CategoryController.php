<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    //
	public function addView(){
		$cates = Category::all();
		return view('category.addView', compact('cates'));
	}
	
	public function addCategory(CategoryFormRequest $request){
		//
		$category = new Category;
		$category->name = $request->get('name');
		if (is_null($request->get('parent_id'))){
			$category->parent_id = 0;
		}
		else {
			$category->parent_id = $request->get('parent_id');
		}
		
		$category->save();
		
		return redirect('category/add')->with('status', 'New Category '.$category->name. ' added');
	}
}
