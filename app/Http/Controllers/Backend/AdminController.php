<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\MaxKey;

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

	public function search(Request $request)
	{
		$input=$request->all();
		$data['name']=$input['user_name'];
		$data['skill']=$input['skills'];
		$data['level']=$input['skill_level'];

        $data['count'] = DB::table('users')
            ->join('user_skill', 'users.id', 'user_skill.user_id')
            ->join('skills', 'skills.id', 'user_skill.skill_id')
            ->where([
                ['users.name', 'like', '%' . $input['user_name'] . '%'],
                ['skills.name', 'like', '%' . $input['skills'] . '%'],
                ['user_skill.level', 'like', '%' . $input['skill_level'] . '%']
            ])
            ->distinct()
            ->count('users.id');

            $data['items'] = DB::table('users')
                ->select('users.id', 'users.name', 'users.birth', 'users.phone', 'users.address', 'users.avatar', 'users.email', 'users.location_id' )
                ->join('user_skill', 'users.id', 'user_skill.user_id')
                ->join('skills', 'skills.id', 'user_skill.skill_id')
                ->where([
                    ['users.name', 'like', '%' . $input['user_name'] . '%'],
                    ['skills.name', 'like', '%' . $input['skills'] . '%'],
                    ['user_skill.level', 'like', '%' . $input['skill_level'] . '%']
                ])
                ->distinct()
                ->get();


            /*->max('user_cvs.id');*/
           /* dd($data['items']);*/

		$data['user_skills']=DB::table('user_skill')
            ->select('skills.name','user_skill.level', 'user_skill.user_id')
            ->join('skills', 'skills.id','user_skill.skill_id')
            ->get();



		# code...
        return view('admin.layouts.listSearch',$data)->with('success','hihi');
	}
}
