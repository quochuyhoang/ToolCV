<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
 public function __construct()
	{

		$this->middleware('auth:web')->only('index');
    }
	
	// public function index(){

 //        return view('home.index1');
 //    }

    public function index1(){

        return view('home.home');
    }

    public function ChosenColor()
    {
        return view('home.chosencolor');
    }


    public function Login(){

        return view('home.login');
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
    public function create(){
        $datas['users']= DB::table('users')->select('id', 'name')->get();

        return view('home.create', $datas);
    }
    
    public function CVCreate(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'target' => 'required',
            'salary' => 'required',
        ]);
        $input= $request->all();
        
        $users= DB::table('users')->where('id','=', $id)->first();
        $data['skills'] = DB::table('skills')
            ->join('user_skill','user_skill.skill_id','=','skills.id')
            ->where('user_id','=',$id)
            ->get();

        // dd($data);

        
        // die();

        $count= DB::table('user_cvs')->WHERE('user_id',"=",$id)->count();
        if($count<4){


        DB::table('user_cvs')->insert([
           'user_id'=> $id,
           'target'=> $input['target'],
           'hobbies'=>$input['hobbies'],
           'salary'=> $input['salary']
        ]);

        $cv_ids= DB::table('user_cvs')->select('id')->where('user_id','=',$id)->get();
        foreach ($cv_ids as $cv_id) {
            $cv_id_get=$cv_id->id;
        }

        for($i=1; $i<=$input['edu-number']; $i++){
            DB::table('education')->insert([
                'user_id'=>$id,
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['ed_name'.$i],
                'spe'=>$input['ed_spe'.$i],
                'time'=>$input['ed_time'.$i],
            ]);
        }
        for($i=1; $i<=$input['aw-number']; $i++){
            DB::table('awards')->insert([
                'user_id'=>$id,
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['aw_name'.$i],
                'describe'=>$input['aw_describe'.$i],
                'year'=>$input['aw_time'.$i],
            ]);
        }
        for($i=1; $i<=$input['ex-number']; $i++){
            DB::table('experience')->insert([
                'user_id'=>$id,
                'user_cv_id'=>$cv_id_get,
                'name'=>$input['ex_name'.$i],
                'position'=>$input['ex_position'.$i],
                'describe'=>$input['ex_describe'.$i],
                'achi'=>$input['ex_achiment'.$i],
                'time'=>$input['ex_time'.$i],
            ]);
        }
return view('home.layout.show1',compact('input'));
         return Redirect('home/show1')->with('Success','Create CV  Success');

    }
    else
    {
         return Redirect()->back()->with('Success','Three CV');
    }
        // echo "ok";
        // die();

       
    }


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
