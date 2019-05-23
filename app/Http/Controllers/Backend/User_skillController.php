<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class User_skillController extends Controller
{
 public function __construct()
	{

		$this->middleware('auth:admin');
	}
	public function User_skill()
	{
		$user_skills = DB::table('user_skill')->get();

		return view('admin.layouts.user_skill.list', compact('user_skills'));
	}

	public function Create(){
		$users = DB::table('users')->get();
		$skills = DB::table('skills')->get();
		return view('admin.layouts.user_skill.create', compact('users','skills'));
	}


	public function PostCreate(Request $req){
		$this->validate($req,[

		],[

		]);


		DB::table('user_skill')->insert([

			'user_id'	=> $req->user_id,
			'skill_id'	=> $req->skill_id,   
		]);

		return redirect()->route('user_skill')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('user_skill')->delete($id);
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$user_skills = DB::table('user_skill')->find($id);
		$users = DB::table('users')->get();
		$skills = DB::table('skills')->get();

		return view('admin.layouts.user_skill.edit',compact('user_skills','users','skills'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			

		],[
			
		]);


		DB::table('user_skill')->where('id',$id)->update([
			'user_id'	=> $req->user_id,
			'skill_id'	=> $req->skill_id,
		]);

		return redirect()->route('user_skill')->with('success','update success');
	}   
}
