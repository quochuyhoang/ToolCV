<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
     public function __construct()
	{

		$this->middleware('auth:admin');
        $locations = DB::table('locations')->get();
        View::share('locations', $locations);
	}
	public function du_lieu(){
         $data['locations']= DB::table('locations')->get();
         return $data;
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
        $input = $request->all();
        /*dd($input);*/

        $data['name'] = $input['user_name'];
        $data['skill'] = $input['skills'];
        $data['skill_level_down'] = $input['skill_level_down'];
        $data['skill_level_up'] = $input['skill_level_up'];
        if (isset($input['userLocation'])){
            $loca = DB::table('locations')->find($input['userLocation']);
        $data['search_location'] = $loca->name;
        }

        if($input['skill_level_up'] != null) {
            $data['count'] = DB::table('users')
                ->join('user_skill', 'users.id', 'user_skill.user_id')
                ->join('skills', 'skills.id', 'user_skill.skill_id')
                ->where([
                    ['users.name', 'like', '"%' . $input['user_name'] . '%"'],
                    ['skills.name', 'like', '"%' . $input['skills'] . '%"'],
                    ['user_skill.level', '>', $input['skill_level_down']],
                    ['user_skill.level', '<=', $input['skill_level_up']]
                ])
                ->distinct()
                ->count('users.id');

            $data['items'] = DB::table('users')
                ->select('users.id', 'users.name', 'users.birth', 'users.phone', 'users.address', 'users.avatar', 'users.email', 'users.location_id')
                ->join('user_skill', 'users.id', 'user_skill.user_id')
                ->join('skills', 'skills.id', 'user_skill.skill_id')
                ->where([
                    ['users.name', 'like', '"%' . $input['user_name'] . '%"'],
                    ['skills.name', 'like', '"%' . $input['skills'] . '%"'],
                    ['user_skill.level', '>', $input['skill_level_down']],
                    ['user_skill.level', '<=', $input['skill_level_up']]
                ])
                ->distinct()
                ->get();
        }
        else{
            $data['count'] = DB::table('users')
                ->join('user_skill', 'users.id', 'user_skill.user_id')
                ->join('skills', 'skills.id', 'user_skill.skill_id')
                ->join('locations', 'locations.id', 'users.location_id')
                ->where([
                    ['users.name', 'like', '%' . $input['user_name'] . '%'],
                    ['skills.name', 'like', '%' . $input['skills'] . '%']
                ])
                ->distinct()
                ->count('users.id');

            $data['items'] = DB::table('users')
                ->select('users.id', 'users.name', 'users.birth', 'users.phone', 'users.address', 'users.avatar', 'users.email', 'locations.name as city')
                ->join('user_skill', 'users.id','=', 'user_skill.user_id')
                ->join('skills', 'skills.id','=',  'user_skill.skill_id')
                ->join('locations', 'locations.id', 'users.location_id')
                ->where([
                    ['users.name', 'like', '%' . $input['user_name'] . '%'],
                    ['skills.name', 'like', '%' . $input['skills'] . '%']
                ])
                ->distinct()
                ->get();
        }


            /*->max('user_cvs.id');*/
    /*  dd($data['items']);*/

		$data['user_skills']=DB::table('user_skill')
            ->select('skills.name','user_skill.level', 'user_skill.user_id')
            ->join('skills', 'skills.id','user_skill.skill_id')
            ->get();

        return view('admin.layouts.listSearch',$data)->with('success','hihi');
	}
}
