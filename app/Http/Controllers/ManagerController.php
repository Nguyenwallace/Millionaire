<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Http\Requests\NewUserFormRequest;

class ManagerController extends Controller
{
    //
    public function viewUsers(){

    	$users= User::all();
    	$roles= Role::all();
    	return view('manager.users', compact('users','roles'));

    }

    public function viewHome(){

    	//$users= User::all();

    	return view('manager.home');

    }

     public function newUser(NewUserFormRequest $request){ 

     if($request->password===$request->password_confirmation){

    	$user = User::create([
		  'name'     => $request->name,
		  'email'    => $request->email,
		  'password' => bcrypt($request->password),]);
		$user ->roles() ->attach(Role::where('name', $request->role)->first());
		return redirect('/manager/users')->with('status','new user added!');
		}
		else {
			return redirect('/manager/newuser')->with('status','password not matched, try again!');
		}
    }

    public function newUserView(){ 	

    	$roles= Role::all();
		return view('manager.newuser', compact('roles'));
    }
}
