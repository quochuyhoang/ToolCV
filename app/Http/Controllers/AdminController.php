<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth:admin')-> only('index');
    }

    /*
     * khi đăng nhạp thành công
     * */
    public function index(){
        return view('admin.dashboard');
    }

/*
 * đăng ký tài khỏan admin
 * */
    public function create(){
        return view('admin.auth.register');
    }


    public function store(Request $request){

        // lấy dữ liệu
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        //khởi tạo model

        $adminModel =new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->role_id = 1;
        $adminModel->level = 1;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();


        return redirect()->route('admin.auth.login');

    }




}
