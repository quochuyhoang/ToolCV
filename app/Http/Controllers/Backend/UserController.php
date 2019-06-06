<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
	 {

		$this->middleware('auth:admin')->except('Register', 'Create','PostCreate1');
	}

	public function Register(){

		$locations 	= DB::table('locations')->get();
		$users = DB::table('users')->get();
        return view('home.register',compact('locations'));
    }


	public function User()
	{
		$users = DB::table('users')->get();

		return view('admin.layouts.user.list', compact('users'));
	}

	public function Create(){
		$locations = DB::table('locations')->get();	
		return view('admin.layouts.user.create',compact('locations'));
	}


	public function PostCreate(Request $req){
		$this->validate($req,[
			'name'		=>'required',
			'birth'		=>'required',
			'phone'		=>'required',
			'address'	=>'required',
			'avatar'	=>'required',
			'email'		=>'required|unique:users,email',
			'password'	=>'required|min:6',
			'location_id'	=>'required'

		],[
			'name.required'		=>'Name is not defined',
			'birth.required'	=>'Birth is not defined',
			'phone.required'	=>'Phone is not defined',
			'address.required'	=>'Address is not defined',
			'avatar.required'	=>'Avatar is not defined',
			'email.required'	=>'Email is not defined',
			'password.required'	=>'Password is not defined',
			'location_id.required'	=>'Location is not defined',
		]);

 if ($req->hasFile('avatar')) {

            $file = $req->file('avatar');

            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('assets/img/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('assets/img/', $avatar);
            $file_name = $avatar;

        // } else {
            /* return Redirect('admin/CVs')->with('thongbao','You have not uploaded your CV');*/

            // $file_name = $input['old-file'];
         }

		DB::table('users')->insert([
			'name' 			=> $req->name,
			'birth' 		=> $req->birth, 
			'phone' 		=> $req->phone,
			'avatar'		=> $file_name,
			'address' 		=> $req->address,
			'email' 		=> $req->email,
			'password' 		=> bcrypt($req->password),   
			'location_id'	=> $req->location_id, 
		]);

		return redirect()->route('user')->with('success','Add Success');
	}


	public function PostCreate1(Request $req){
//        $input=$req->all();
////        dd($input);

		$this->validate($req,[
			'name'		=>'required',
			'birth'		=>'required',
			'phone'		=>'required',
			'address'	=>'required',
			//'avatar'	=>'required',
			'email'		=>'required|unique:users,email',
			'password'	=>'required|min:6',
			'location_id'	=>'required'

		],[
			'name.required'		=>'Name is not defined',
			'birth.required'	=>'Birth is not defined',
			'phone.required'	=>'Phone is not defined',
			'address.required'	=>'Address is not defined',
			'email.required'	=>'Email is not defined',
			'password.required'	=>'Password is not defined',
			'location_id.required'	=>'Location is not defined',
		]);

        if ($req->hasFile('avatar')) {

            $file = $req->file('avatar');

            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('assets/img/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('assets/img/avatar/', $avatar);
            $file_name = $avatar;

            echo "ok";
         }
         else{
         	$file_name=null;
         	echo "ko ok";
         }
         die();

		DB::table('users')->insert([
			'name' 			=> $req->name,
			'birth' 		=> $req->birth, 
			'phone' 		=> $req->phone,
			'avatar'		=> $file_name,
			'address' 		=> $req->address,
			'email' 		=> $req->email,
			'password' 		=> bcrypt($req->confirmPassword),
			'location_id'	=> $req->location_id, 
		]);

		return redirect()->route('home.index1')->with('success','Add Success');
	}


	public function Delete($id){

		DB::table('users')->delete($id);
		
		return redirect()->back()->with('success','Delete Success');
	}



	public function Edit($id){
		$users 		= DB::table('users')->find($id);
		$locations 	= DB::table('locations')->get();

		return view('admin.layouts.user.edit',compact('users','locations'));
	}

	public function PostEdit(Request $req, $id){
		$this->validate($req,[
			'name'			=>'required',
			'birth'			=>'required',
			'phone'			=>'required',
			'address'		=>'required',			
			'avatar'		=>'required',
			'email'			=>'required',
			'password'		=>'required|min:6',
			'location_id' 	=>'required',
		],[
			'name.required'			=>'Name is not defined',
			'birth.required'		=>'Birth is not defined',
			'phone.required'		=>'Phone is not defined',
			'address.required'		=>'Address is not defined',
			'avatar.required'		=>'Avatar is not defined',
			'email.required'		=>'Email is not defined',
			'password.required'		=>'Password is not defined',
			'location_id.required'	=>'Address is not defined',
		]);

if ($req->hasFile('avatar')) {

            $file = $req->file('avatar');

            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('assets/img/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('assets/img/', $avatar);
            $file_name = $avatar;

        } else {
            /* return Redirect('admin/CVs')->with('thongbao','You have not uploaded your CV');*/

            $file_name = $input['old-file'];
        }

		DB::table('users')->where('id',$id)->update([
			'name' 			=> $req->name,
			'birth' 		=> $req->birth, 
			'phone' 		=> $req->phone,
			'avatar'		=> $file_name,
			'address' 		=> $req->address,
			'email' 		=> $req->email,
			'password' 		=> bcrypt($req->password),
			'location_id'	=> $req->location_id,    
		]);

		return redirect()->route('user')->with('success','update success');
	}
}
