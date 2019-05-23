<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
	public function __construct()
	{

		$this->middleware('auth:admin');
	}
	
	public function Location()
	{
		$locations = DB::table('locations')->get();

		return view('admin.layouts.location.list', compact('locations'));
	}

	public function Create(){
		return view('admin.layouts.location.create');
	}


	public function PostCreate(Request $req){
		$this->validate($req,[
			'name'		=>'required'



		],[
			'name.required'		=>'Name is not defined'
		]);


		DB::table('locations')->insert([
			'name' 		=> $req->name,
		]);

		return redirect()->route('location')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('locations')->delete($id);
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$locations = DB::table('locations')->find($id);

		return view('admin.layouts.location.edit',compact('locations'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			'name'		=>'required'
		],[
			'name.required'		=>'Name is not defined'
		]);



		DB::table('locations')->where('id',$id)->update([
			'name' 		=> $req->name,   
		]);

		return redirect()->route('location')->with('success','update success');
	}
}
