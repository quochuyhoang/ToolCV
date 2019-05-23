<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CVsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');
    }


    /*
     * tạo cv người dùng
     * */
    public function create(){
        $datas['users']= DB::table('users')->select('id', 'name')->get();

        return view('admin.layouts.CV.create', $datas);
    }
    public function CVCreate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'target' => 'required',
            'salary' => 'required',
        ]);
        $input= $request->all();
        $count= DB::table('user_cvs')->WHERE('user_id',"=",$input['name'])->count();
        if($count<4){


        DB::table('user_cvs')->insert([
           'user_id'=> $input['name'],
           'target'=> $input['target'],
           'hobbies'=>$input['hobbies'],
           'salary'=> $input['salary']
        ]);

        $cv_ids= DB::table('user_cvs')->select('id')->where('user_id','=',$input['name'])->get();
        foreach ($cv_ids as $cv_id) {
        	$cv_id_get=$cv_id->id;
        }

        for($i=1; $i<=$input['edu-number']; $i++){
            DB::table('education')->insert([
                'user_id'=>$input['name'],
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['ed_name'.$i],
                'spe'=>$input['ed_spe'.$i],
                'time'=>$input['ed_time'.$i],
            ]);
        }
        for($i=1; $i<=$input['aw-number']; $i++){
            DB::table('awards')->insert([
                'user_id'=>$input['name'],
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['aw_name'.$i],
                'describe'=>$input['aw_describe'.$i],
                'year'=>$input['aw_time'.$i],
            ]);
        }
        for($i=1; $i<=$input['ex-number']; $i++){
            DB::table('experience')->insert([
                'user_id'=>$input['name'],
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['ex_name'.$i],
                'position'=>$input['ex_position'.$i],
                'describe'=>$input['ex_describe'.$i],
                'achi'=>$input['ex_achiment'.$i],
                'time'=>$input['ex_time'.$i],
            ]);
        }
         return Redirect('backend')->with('Success','Create CV  Success');
    }
    else
    {
		 return Redirect()->back()->with('Success','Three CV');
    }
        // echo "ok";
        // die();

       
    }
}
