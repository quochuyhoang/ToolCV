<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	$location = "An Giang,Bà Rịa - Vũng Tàu,Bắc Giang,Bắc Kạn,Bạc Liêu,Bắc Ninh,Bến Tre,Bình Định,Bình Dương,Bình Phước,Bình Thuận,Cà Mau,Cao Bằng,Đắk Lắk,Đắk Nông,Điện Biên,Đồng Nai,Đồng Tháp,Gia Lai,Hà Giang,Hà Nam,Hà Tĩnh,Hải Dương,Hậu Giang,Hòa Bình,Hưng Yên,Khánh Hòa,Kiên Giang,Kon Tum,Lai Châu,Lâm Đồng,Lạng Sơn,Lào Cai,Long An,Nam Định,Nghệ An,Ninh Bình,Ninh Thuận,Phú Thọ,Quảng Bình,Quảng Nam,Quảng Ngãi,Quảng Ninh,Quảng Trị,Sóc Trăng,Sơn La,Tây Ninh,Thái Bình,Thái Nguyên,Thanh Hóa,Thừa Thiên Huế,Tiền Giang,Trà Vinh,Tuyên Quang,Vĩnh Long,Vĩnh Phúc,Yên Bái,Phú Yên,Cần Thơ,Đà Nẵng,Hải Phòng,Hà Nội,TP HCM";
    	$explode = explode(',',$location);
    	foreach($explode as $ex)
    	{
    		DB::table('locations')->insert([
    			'name' => $ex
    		]);
    	}



        $location = "Collaborators, Editor, Admin";
        $explode = explode(',',$location);
        foreach($explode as $ex)
        {
            DB::table('roles')->insert([
                'name' => $ex
            ]);
        }

        for($i=1; $i<=20; $i++){
            DB::table('imageCVs')->insert([
                'name' => 'CV'.$i
            ]);
        }

        $location = "red,blue,green,purple,orange,yellow,black";
        $explode = explode(',',$location);
        $j=1;
        foreach($explode as $ex)
        {
            DB::table('colors')->insert([
                'name' => $ex,
            ]);
            $j++;
        }
        for($x=1; $x<$i; $x++){
            for($y=1; $y<$j; $y++){
                DB::table('colorCV')->insert([
                    'imageCV_id' => $x,
                    'color_id' => $y,
                ]);
            }
        }


    	DB::table('admins')->insert([
    		'name' => 'admin',
    		'email' => '1@gmail.com',
    		'password' =>bcrypt('12345678'),
    		'role_id' => '3',
    	]);


        DB::table('users')->insert([
            'name' => 'hoang',
            'birth' => '1996-02-01',
            'phone' => '02312321',
            'address'=> 'asd',
            'email' => '1@gmail.com',
            'password' =>bcrypt('12345678'),
            'location_id' => '1',
        ]);
    }
}
