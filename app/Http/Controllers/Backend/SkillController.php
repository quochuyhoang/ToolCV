<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SkillController extends Controller
{
    public function __construct()
	{

		$this->middleware('auth:admin');
        $locations = DB::table('locations')->get();
        View::share('locations', $locations);
	}
	public function Skill()
	{
		$skills = DB::table('skills')->get();

		return view('admin.layouts.skill.list', compact('skills'));
	}

	public function Create(){
		return view('admin.layouts.skill.create');
	}


	public function PostCreate(Request $req){
		$this->validate($req,[
			'name'		=>'required',
			'level'	=>'required'



		],[
			'name.required'		=>'Name is not defined',
			'level.required'	=>'Level is not defined',
		]);


		DB::table('skills')->insert([
			'name' 		=> $req->name,
			'level' 	=> $req->level   
		]);

		return redirect()->route('skill')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('skills')->delete($id);
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$skills = DB::table('skills')->find($id);

		return view('admin.layouts.skill.edit',compact('skills'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			'name'		=>'required',
			'level'		=>'required'
		],[
			'name.required'		=>'Name is not defined',
			'level.required'	=>'Level is not defined'
		]);



		DB::table('skills')->where('id',$id)->update([
			'name' 		=> $req->name,
			'level' 	=> $req->level      
		]);

		return redirect()->route('skill')->with('success','update success');
	}
}
