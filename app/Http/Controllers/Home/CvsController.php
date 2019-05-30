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
/*$input =$request->all();
dd($input);*/

        $this->validate($request, [
            'name' => 'required',
            'target' => 'required',
            'salary' => 'required',
            'job-name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'hobbies' => 'required',
        ]);
        $input= $request->all();
        $idCV= DB::table('colorcv')
            ->where([
            ['imageCV_id', $input['imageCV']],
            ['color_id', $input['colorCV']]
        ])->first();

        $users= DB::table('users')->where('id','=', $id)->first();
        $data['skills'] = DB::table('skills')
            ->join('user_skill','user_skill.skill_id','=','skills.id')
            ->where('user_id','=',$id)
            ->get();

        // dd($data);


        // die();

        $count= DB::table('user_cvs')->WHERE('user_id',"=",$id)->count();
        if($count<4){
            if ($request->hasFile('newImage')) {

                $file = $request->file('newImage');


                $name = $file->getClientOriginalName();
                $avatar = str_random(4) . "_avatar_" . $name;
                while (file_exists('home_asset/cv/cvimages/' . $avatar)) {
                    $Hinh = str_random(4) . "_avatar_" . $name;
                }
                $file->move('home_asset/cv/cvimages', $avatar);
                $file_name=$avatar;

            } else {
                $file_name = 0;
            }

            DB::table('user_cvs')->insert([
                'user_id'=> $id,
                'user_name'=> $input['name'],
                'user_address'=> $input['address'],
                'job_name'=> $input['job-name'],
                'user_phone'=> $input['phone'],
                'user_email'=> $input['email'],
                'target'=> $input['target'],
                'hobbies'=>$input['hobbies'],
                'image'=>$file_name,
                'salary'=> $input['salary'],
                'colorcv_id'=> $idCV->id
            ]);
                  if($input['skill-level-num']!=null) {
                      for ($i = 1; $i < $input['skill-level-num']; $i++) {
                          DB::table('user_skill')->insert([
                              'user_id' => $id,
                              'skill_id' => $input['skill-name' . $i],
                              'level' => $input['skill-level' . $i],
                          ]);
                      }
                  }

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
                    'reference'=>$input['ex_reference'.$i],
                    'rf_phone'=>$input['ex_rf_phone'.$i],
                ]);
            }
            return Redirect('home')->with('Success','Create CV  Success');

        }
        else
        {
            return Redirect()->back()->with('Success','Three CV');
        }
        // echo "ok";
        // die();


    }
    public function color($name,$color){

        $cv=DB::table('imagecvs')->where('name',$name)->first();
        $color = DB::table('colors')->where('name',$color)->first();
        $users= DB::table('users')->select('id', 'name', DB::raw('(SELECT COUNT(*) FROM user_cvs WHERE user_id=users.id) as count'))
            ->get();
        $skills = DB::table('skills')->get();


        return view('home.layout.cv.'.$name, compact('color','users','skills','cv'));
    }



}
