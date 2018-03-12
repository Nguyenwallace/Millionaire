<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use Auth;

class UserController extends Controller
{
    //
	public function show($id){
		//
		return $id;
	}

	public function delete(Request $request){
		//
		//$id = $request->get('id');
		//Auth::user()->email;
		$user = User::where('id', $request->get('id'))->first();
		if ($user->email !== Auth::user()->email) {
			$user ->roles() ->detach();
			$user->delete();

			$result = ['message'=>"Đã Xóa Thành Công"];
			return Response::json($result);
		}
		
		/*
		else {

			$result = ['message'=>"Không thể xóa user đang sử dụng"];
			return Response::json($result);
		}
		*/
		
	}
}
