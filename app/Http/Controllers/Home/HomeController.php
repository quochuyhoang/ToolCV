<?php

namespace App\Http\Controllers\Home;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
  public function __construct()
 	{

        $locations = DB::table('locations')->get();
        View::share('locations', $locations);
     }


    public function index1(){
        $data['imageCVs']=DB::table('imagecvs')->paginate(4);
        $data['user_cvs'] = DB::table('user_cvs')->get();

        return view('home.home',$data);

    }

    /*
     *profile
     *  */

    public function profile($id){

        $data['user_cvs'] = DB::table('user_cvs')->where('user_id', $id)->get();
        $data['user_cvs_count'] = DB::table('user_cvs')->where('user_id', $id)->count();

/*        dd($data['user_cvs']);*/
        return view('home.profile',$data);

    }

    public function editInfor(Request $request,$id){


        $this->validate($request,[
            'name'			=>'required',
            'birth'			=>'required',
            'phone'			=>'required',
            'address'		=>'required',
            'email'			=>'required',
        ],[
            'name.required'			=>'Name is not defined',
            'birth.required'		=>'Birth is not defined',
            'phone.required'		=>'Phone is not defined',
            'address.required'		=>'Address is not defined',
            'email.required'		=>'Email is not defined',
        ]);
        $input=$request->all();
        $old= DB::table('users')->where('id',$id)->first();

        if ($request->hasFile('newAvatar')) {

            $file = $request->file('newAvatar');

            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('assets/img/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('assets/img/avatar/', $avatar);
            if ($old->avatar != null) {
                unlink('assets/img/avatar/' . $old->avatar);
            }
            $file_name = $avatar;

        } else {
            /* return Redirect('admin/CVs')->with('thongbao','You have not uploaded your CV');*/

            $file_name = $input['old-file'];
        }

        DB::table('users')->where('id',$id)->update([
            'name' 			=> $request->name,
            'birth' 		=> $request->birth,
            'phone' 		=> $request->phone,
            'avatar'		=> $file_name,
            'address' 		=> $request->address,
            'email' 		=> $request->email,
        ]);

        return redirect()->back()->with('success','update success');
    }

    public function changePass(Request $request, $id){
        $this->validate($request,[
            'oldPass'=>'required',
            'newPass'=>'required',
            'reNewPass'=>'required'
        ]);

        $input=$request->all();
        $user=DB::table('users')->find($id);

        if (password_verify($input['oldPass'],$user->password)) {
            DB::table('users')->where('id', $id)->update([
                'password' => bcrypt($input['reNewPass']),
            ]);
            return redirect()->back()->with('success','change paswword success');
        }else{
            return redirect()->back()->with('failed','Change passwword failed! old pasword dose not match');
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

    public function checkPass($id, $value){


          $user=DB::table('users')->find($id);

        if (password_verify($value,$user->password)) {

        }else{
            echo 'This old pasword dose not match';
        }


    }

}
