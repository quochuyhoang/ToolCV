<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    public function __construct()
	{

		$this->middleware('auth:admin');
        $locations = DB::table('locations')->get();
        View::share('locations', $locations);
	}
	public function Role()
	{
		$roles = DB::table('roles')->get();

		return view('admin.layouts.role.list', compact('roles'));
	}

	public function Create(){
		return view('admin.layouts.role.create');
	}


	public function PostCreate(Request $req){
		$this->validate($req,[
			'name'		=>'required'



		],[
			'name.required'		=>'Name is not defined'
		]);


		DB::table('roles')->insert([
			'name' 		=> $req->name,
		]);

		return redirect()->route('role')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('roles')->delete($id);
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$roles = DB::table('roles')->find($id);

		return view('admin.layouts.role.edit',compact('roles'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			'name'		=>'required'
		],[
			'name.required'		=>'Name is not defined'
		]);



		DB::table('roles')->where('id',$id)->update([
			'name' 		=> $req->name,   
		]);

		return redirect()->route('role')->with('success','update success');
	}
}
