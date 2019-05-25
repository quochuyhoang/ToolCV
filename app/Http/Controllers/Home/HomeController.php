<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
//  public function __construct()
// 	{

// 		$this->middleware('auth:web')->only('index');
//     }
	
	// public function index(){

 //        return view('home.index1');
 //    }

    public function index1(){

        return view('home.home');
    }

    public function ChosenColor($name)
    {
        /*$data['name']= DB::table('')*/
        $data['name']= $name;
        return view('home.chosencolor', $data);
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


    /*
     * tạo cv người dùng
     * */


    public function ShowCvs()
    {
        $user_cvs = DB::table('user_cvs')->get();
        $users = DB::table('users')->get();
        $user_skill = DB::table('user_skill')->get();
        $skills = DB::table('skills')->get();
        $education = DB::table('education')->get();
        $experience = DB::table('experience')->get();

        return view('home.layout.show',compact('user_cvs','skills','users','user_skill','education','experience'));
    }

        public function ShowCvs1()
    {
        $user_cvs = DB::table('user_cvs')->get();
        $users = DB::table('users')->get();
        $user_skill = DB::table('user_skill')->get();
        $skills = DB::table('skills')->get();
        $education = DB::table('education')->get();
        $experience = DB::table('experience')->get();

        return view('home.layout.show1',compact('user_cvs','skills','users','user_skill','education','experience'));
    }


}
