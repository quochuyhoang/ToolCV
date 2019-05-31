<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CvsController extends Controller
{
    //
    public function __construct()
    {

		$this->middleware('auth');
    }

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
    public function color(Request $request){
        $input= $request->all();
        $color = DB::table('colors')->where('name',$input['CVcolor'])->first();
        $users= DB::table('users')->select('id', 'name', DB::raw('(SELECT COUNT(*) FROM user_cvs WHERE user_id=users.id) as count'))
            ->get();

        return view('home.layout.cv.'.$input['CVname'], compact('color','users'));
    }

        public function showcv($id)
    {
        $user_cvs = DB::table('user_cvs')->find($id);

        $imagecvs = DB::table('colorcv')
        ->select('imagecvs.name as CVname', 'colors.name as colorCv')
        ->join('imagecvs', 'imagecvs.id', '=' ,'colorcv.imageCV_id')
        ->join('colors', 'colors.id', '=', 'colorcv.color_id')
        ->where('colorcv.id', '=', $user_cvs->colorcv_id)->first();

        $experience = DB::table('experience')->where('user_cv_id', '=' ,$id)->get();
        $education = DB::table('education')->where('user_cv_id', '=' ,$id)->get();

        $user_skill = DB::table('user_skill')
        ->select('user_skill.level','skills.name')
        ->join('skills', 'skills.id', '=', 'user_skill.skill_id')
        ->where('user_skill.user_id' ,'=', $id)->get();

        

        // dd($education);

        return view('home.show.'.$imagecvs->CVname, compact('user_cvs','imagecvs'));
    }

}
