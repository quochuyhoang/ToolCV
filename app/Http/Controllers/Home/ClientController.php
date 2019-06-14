<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //



    public function Login(){

        return view('home.login');
    }
    public function Logout(){
        Auth::guard('web')-> logout();

        return redirect()->route('home');

    }

    public function register(){
        $data['locations']= DB::table('locations')->get();

        return view('home.register', $data);
    }
    public function PostLogin(Request $req){

        $email 		= $req->input('email');
        $password 	= $req->input('password');

        if(Auth::guard('web')-> attempt(['email' => $req->email, 'password' => $req->password], $req -> remember)){

            //nếu thành công thì chuyển hướng về view dashboard của admin
            return redirect()-> intended(route('home.index1'));

        }
        else {

            //thất bại
            return redirect()->back()->withInput($req->only('email', 'remember'))->with('thongbao', 'Email or password is not correct');
        }
    }

    public function store(Request $req){
        $this->validate($req,[
            'name'		=>'required',
            'birth'		=>'required',
            'email'		=>'required|unique:users,email',
            'location_id'	=>'required'

        ],[
            'name.required'		=>'Name is not defined',
            'birth.required'	=>'Birth is not defined',
            'email.required'	=>'Email is not defined',
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


        }
        else{
            $file_name=null;

        }

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

        if(Auth::guard('web')-> attempt(['email' => $req->email, 'password' => $req->password], $req -> remember)){

            //nếu thành công thì chuyển hướng về view dashboard của admin
            return redirect()-> intended(route('home.index1'))->with('thongbao','Create account success');

        }
        else {

            //thất bại
            return redirect()->back()->withInput($req->only('email', 'remember'));
        }

/*        return redirect()->route('home.index1')->with('success','Add Success');*/
    }
}
