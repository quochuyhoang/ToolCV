<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home.login

Route::get('/', 'Home\HomeController@index1')->name('home');
Route::get('/cv', function (){
  return view('home.layout.cv.CV3');
});
Route::prefix('home')->group(function (){

    /*Route::get('/', 'Home\HomeController@index')->name('home.index');*/
    Route::get('/', 'Home\HomeController@index1')->name('home.index1');


//show cv
    Route::get('/show', 'Home\HomeController@ShowCvs')->name('home.show');
    Route::get('/show1', 'Home\HomeController@ShowCvs1')->name('home.show1');

    // Route::get('Register', 'Home\HomeController@register')->name('home.register');

    Route::get('Login','Home\ClientController@Login')->name('home.login');
    Route::get('logout','Home\ClientController@Logout')->name('home.logout');
    Route::get('register','Home\ClientController@register')->name('home.register.get');


    Route::post('Login','Home\ClientController@PostLogin')->name('home.post');
    Route::post('register','Home\ClientController@store')->name('home.register.post');


    Route::prefix('Register')->group(function(){

        Route::get('/', 'Backend\UserController@Register')->name('home.register');


//->middleware('verify')
//Register
        Route::get('Create', 'Backend\UserController@Create')->name('user.create');
        Route::post('Create', 'Backend\UserController@PostCreate1')->name('user.postcreate1');


    });
//->middleware('verify')
//form
    Route::prefix('Create')->group(function(){

        Route::get('/', 'Home\CvsController@Create')->name('home.createcv');

        Route::post('Create/{id}', 'Home\CvsController@CVCreate')->name('home.postcv');
        Route::post('CreateCV', 'Home\CvsController@color')->name('home.color');

    });

    Route::get('ChosenColor/{id}','Home\HomeController@ChosenColor')->name('home.chosen');

    //showCV
    Route::get('ShowCV/{id}','Home\CvsController@showcv');

});
Auth::routes();





/*
 * route cho admin
 * */
Route::prefix('backend')->group(function (){

    //URL: ...public/admin/
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //URL: ...public/admin/dashboard
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    /*
     * URL: ...public/admin/register
     * đăng ký tài khỏan admin
     * */
    Route::get('register', 'AdminController@create')->name('admin.register');

    /*
     * URL: ...public/admin/register
     * đăng ký từ form Post
     * */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /*
     * URL: ...public/admin/login
     * đăng nhập admin
     * */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    /*
     * xử lý quá trình đăng nhập admin
     * */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');


    /*
    * URL: ...public/admin/login
    * đăng xuất
    * */

    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');



    /*
    * URL:.../backend/user
    *
    **/
    Route::prefix('user')->group(function(){

        Route::get('/', 'Backend\UserController@User')->name('user');

        Route::get('Create', 'Backend\UserController@Create')->name('user.create');
        Route::post('Create', 'Backend\UserController@PostCreate')->name('user.postcreate');

        Route::get('Edit/{id}', 'Backend\UserController@Edit')->name('user.edit');
        Route::post('Edit/{id}', 'Backend\UserController@PostEdit')->name('user.postedit');


        Route::get('Delete/{id}', 'Backend\UserController@Delete')->name('user.delete');

    });

    /**
    * Admin
    **/
    Route::prefix('admin')->group(function(){



        Route::get('/', 'Backend\AdminController@Admin')->name('admin');

        Route::get('Create', 'Backend\AdminController@Create')->name('admin.create');
        Route::post('Create', 'Backend\AdminController@PostCreate')->name('admin.postcreate');

        Route::get('Edit/{id}', 'Backend\AdminController@Edit')->name('admin.edit');
        Route::post('Edit/{id}', 'Backend\AdminController@PostEdit')->name('admin.postedit');


        Route::get('Delete/{id}', 'Backend\AdminController@Delete')->name('admin.delete');

        Route::post('search', 'Backend\AdminController@search')->name('search');

    });

    /**
    * Skill
    **/
    Route::prefix('skill')->group(function(){

        Route::get('/', 'Backend\SkillController@Skill')->name('skill');

        Route::get('Create', 'Backend\SkillController@Create')->name('skill.create');
        Route::post('Create', 'Backend\SkillController@PostCreate')->name('skill.postcreate');

        Route::get('Edit/{id}', 'Backend\SkillController@Edit')->name('skill.edit');
        Route::post('Edit/{id}', 'Backend\SkillController@PostEdit')->name('skill.postedit');


        Route::get('Delete/{id}', 'Backend\SkillController@Delete')->name('skill.delete');

    });


    /**
    * User_Skill
    **/
    Route::prefix('user_skill')->group(function(){

        Route::get('/', 'Backend\User_skillController@User_skill')->name('user_skill');

        Route::get('Create', 'Backend\User_skillController@Create')->name('user_skill.create');
        Route::post('Create', 'Backend\User_skillController@PostCreate')->name('user_skill.postcreate');

        Route::get('Edit/{id}', 'Backend\User_skillController@Edit')->name('user_skill.edit');
        Route::post('Edit/{id}', 'Backend\User_skillController@PostEdit')->name('user_skill.postedit');


        Route::get('Delete/{id}', 'Backend\User_skillController@Delete')->name('user_skill.delete');

    });



    /**
    * Role
    **/
    Route::prefix('role')->group(function(){

        Route::get('/', 'Backend\RoleController@Role')->name('role');

        Route::get('Create', 'Backend\RoleController@Create')->name('role.create');
        Route::post('Create', 'Backend\RoleController@PostCreate')->name('role.postcreate');

        Route::get('Edit/{id}', 'Backend\RoleController@Edit')->name('role.edit');
        Route::post('Edit/{id}', 'Backend\RoleController@PostEdit')->name('role.postedit');


        Route::get('Delete/{id}', 'Backend\RoleController@Delete')->name('role.delete');

    });


        /**
    * Location
    **/
    Route::prefix('location')->group(function(){

        Route::get('/', 'Backend\LocationController@Location')->name('location');

        Route::get('Create', 'Backend\LocationController@Create')->name('location.create');
        Route::post('Create', 'Backend\LocationController@PostCreate')->name('location.postcreate');

        Route::get('Edit/{id}', 'Backend\LocationController@Edit')->name('location.edit');
        Route::post('Edit/{id}', 'Backend\LocationController@PostEdit')->name('location.postedit');


        Route::get('Delete/{id}', 'Backend\LocationController@Delete')->name('location.delete');

    });


    Route::get('Cv', 'Backend\CVsController@Create')->name('cv');
    Route::post('Cv', 'Backend\CVsController@CVCreate')->name('usercvs.create');


});

