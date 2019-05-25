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

    public function regisster(){
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
            return redirect()->back()->withInput($req->only('email', 'remember'));
        }
    }
}
