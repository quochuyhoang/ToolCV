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
}
