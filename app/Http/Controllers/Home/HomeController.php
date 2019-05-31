<?php

namespace App\Http\Controllers\Home;

use App\Http\Middleware\RedirectIfAuthenticated;
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
        $data['imageCVs']=DB::table('imageCVs')->paginate(4);
        $data['user_cvs'] = DB::table('user_cvs')->get();

        return view('home.home',$data);

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
