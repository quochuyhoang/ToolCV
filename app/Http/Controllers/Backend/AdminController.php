<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function __construct()
	{

		$this->middleware('auth:admin');
	}
	public function Admin()
	{
		$admins = DB::table('admins')->get();

		return view('admin.layouts.admin.list', compact('admins'));
	}

	public function Create(){
		$roles = DB::table('roles')->get();
		return view('admin.layouts.admin.create', compact('roles'));
	}


	public function PostCreate(Request $req){
		$this->validate($req,[
			'name'			=>'required',
			'email'			=>'required|unique:users,email',
			'password'		=>'required|min:6'

		],[
			'name.required'		=>'Name is not defined',
			'level.required'	=>'Level is not defined',
		]);


		DB::table('admins')->insert([
			'name' 		=> $req->name,
			'email' 	=> $req->email,
			'password'	=> bcrypt($req->password),
			'role_id'	=> $req->role_id,   
		]);

		return redirect()->route('admin')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('admins')->delete($id);
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$admins = DB::table('admins')->find($id);
		$roles = DB::table('roles')->get();

		return view('admin.layouts.admin.edit',compact('admins','roles'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			'name'			=>'required',
			'email'			=>'required',
			'password'		=>'required|min:6'

		],[
			'name.required'		=>'Name is not defined',
			'level.required'	=>'Level is not defined',
		]);


		DB::table('admins')->where('id',$id)->update([
			'name' 		=> $req->name,
			'email' 	=> $req->email,
			'password'	=> bcrypt($req->password),
			'role_id'	=> $req->role_id
		]);

		return redirect()->route('admin')->with('success','update success');
	}   

	public function search(Request $rq)
	{
		$input=$rq->all();
		
		$data= DB::table('users')->where('name',$input['search'])->get();
		dd($data);
		# code...
	}
}
