<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- js -->
    <script src="{{ asset('home_asset') }}/js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('home_asset') }}/js/sliding.form.js"></script>

    <!-- //js -->
    <link href="{{ asset('home_asset') }}/css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('home_asset') }}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('home_asset') }}/css/smoothbox.css" type='text/css' media="all" />
    <style>
        input{
            color:white;
        }
    </style>
</head>

<body>
@if(session('success'))
    <div class = "alert alert-success">{{ session('success') }}</div>
@endif
@if(session('failed'))
    <div class = "alert alert-danger">{{ session('failed') }}</div>
@endif
    <div class="main">
        <h1>User Profile</h1>
        <div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
            <div id="steps" style="margin:0 auto;border-radius: 10px;" class="agileits w3_steps">
                <form id="formElem" name="formElem" action="{{ url('home/profile/edit/'.Auth::user()->id) }}" method="post" class="w3_form w3l_form_fancy" enctype="multipart/form-data">
                    @csrf
                    <div class="step agileinfo w3ls_fancy_step" style="padding: 10px 0;">
                        <legend>About Me</legend>
                        <div class="abt-agile">
                            <input type="hidden" name="old-file" value="{{ Auth::user()->avatar }}">

                            <div class="abt-agile-left" id="imagePreview"><img src="{{asset('assets/img/avatar/'.Auth::user()->avatar)}}" width="100%"></div>


                            <div class="abt-agile-right">
                                <input type="text" name="name" class="user-infor" value="{{ Auth::user()->name }}"
                                    style="font-size: 20px;width: 95%;color: white;font-weight: bold;"
                                    readonly>
                                <ul class="address">
                                    <li>
                                        <ul class="address-text">
                                            <li><b>D.O.B: </b></li>
                                            <li><input type="date" name="birth" class="user-infor" value="{{ Auth::user()->birth }}" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>E-MAIL: </b></li>
                                            <li><input type="text" name="email" class="user-infor" value="{{ Auth::user()->email }}" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>PHONE: </b></li>
                                            <li><input type="text" name="phone" class="user-infor" value="{{ Auth::user()->phone }}" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>ADDRESS: </b></li>
                                            <li><input type="text" name="address" class="user-infor" value="{{ Auth::user()->address }}" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>CV Created: </b></li>
                                            <li>{{ $user_cvs_count }}</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <script type="text/javascript">
                                            function fileValidation(){
                                                var fileInput = document.getElementById('avatar');
                                                if (fileInput.files && fileInput.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" width="100%">';
                                                        document.getElementById('old').style.display="none";
                                                    };
                                                    reader.readAsDataURL(fileInput.files[0]);
                                                }
                                            }
                                        </script>
                                        <input type="file" id="avatar" name="newAvatar" onchange="fileValidation()" accept=".png, .jpg, .jpeg, .gif"hidden/>
                                    </li>
                                    <li>
                                        <input class="btn btn-outline-primary" type="submit" id="editSave" value="Save" hidden>
                                    </li>
                                </ul>
                            </div>
                </form>

                            <table class="table text-light table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Name CV</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user_cvs as $key => $user_cv)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>CV{{ $key+1 }}</td>
                                        <td>
                                            <a class="btn btn-danger" style="font-size: 12px;padding: 2px 10px;" href="{{ url('home/ShowCV/'.$user_cv->id) }}">
                                                Show <img src="{{ asset('home_asset') }}/images/show.png" alt="" style="width: 17px;"></a>
                                            <button class="btn btn-outline-light"
                                                style="font-size: 12px;padding: 2px 10px;">
                                                Delete <img src="./images/delete.png" alt=""
                                                    style="width: 17px;"></button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div style="padding-top: 15px;">
                                <div>
                                  {{--  <a class="btn btn-outline-warning">--}}
                                        <a href="{{ url('') }}" class="btn btn-outline-warning" style="text-decoration: none;color: yellow">Back to home page</a>
                                  {{--  </a>--}}
                                    <input type="button" class="btn btn-outline-success" id="edit" onclick="editInfor()" value="Edit Info">
                                    <input type="button" class="btn btn-outline-danger" id="editCancel" onclick="cancelInfor()" value="Cancel">
                                    <input type="button" class="btn btn-outline-info" onclick="changePass()" value="Chang PassWord">
                                    <script>
                                        function editInfor() {
                                            $('#edit').hide();
                                            $('#editCancel').show();
                                            $('.user-infor').removeAttr('readonly');
                                            $('#editSave').removeAttr('hidden');
                                            $('#avatar').removeAttr('hidden');
                                            $('.user-infor').css('border','1px solid red');
                                            $('.user-infor').css('background-color','white');
                                            $('.user-infor').css('color','black');
                                        }
                                        function cancelInfor() {
                                            $('#edit').show();
                                            $('#editCancel').hide();
                                            $('.user-infor').prop('readonly', true);
                                            $('#editSave').prop('hidden', true);
                                            $('#avatar').prop('hidden', true);
                                            $('.user-infor').css('border','none');
                                            $('.user-infor').css('background','none');
                                            $('.user-infor').css('color','white');
                                        }
                                        function changePass() {
                                            $('#change-infor').show();
                                        }
                                    </script>

                                </div>
                            </div>
                            <br>
                <form action="{{ url('home/profile/changePass/'.Auth::user()->id) }}" method="post" name="changepass">
                    @csrf
                            <div class="card text-white" style="background-color: transparent;" id="change-infor">
                                <div class="card-header">
                                    Change Password
                                </div>
                                <div class="card-body">
                                    <label>Current Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" name="oldPass"  class="form-control"
                                            placeholder="Current Password" id="oldpass" style="width: 93%;" >
                                        <p style="color:red">{{ $errors->first('oldPass') }}</p>
                                    </div>
                                    <label>New Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" name="newPass" id="pass" class="form-control" placeholder="New Password"
                                            style="width: 93%;" onchange="lengthPasswword()">
                                        <div style="color: red;"  id="lengthpass"></div>
                                        <p style="color:red">{{ $errors->first('newPass') }}</p>
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" name="reNewPass" id="confirmpass" class="form-control" placeholder="Confirm Password"
                                            style="width: 93%;" onchange="confirmPasswword()">
                                        <div style="color: red;" id="errorpass"></div>
                                        <p style="color:red">{{ $errors->first('reNewPass') }}</p>
                                    </div>
                                    <div>
                                        <input type="button" class="btn btn-outline-danger" value="Cancel" onclick="editHide()">
                                         <script>
                                             function editHide() {
                                                 $('#change-infor').hide();
                                             }
                                         </script>
                                        <input class="btn btn-outline-primary" type="submit" value="Save">

                                    </div>
                                </div>
                            </div>
                    <script>
                        function lengthPasswword() {
                            var x= document.getElementById('pass').value;



                            if(x.length < 8){
                                document.getElementById('lengthpass').style.display = 'block';
                                document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
                            }
                            else
                            {
                                document.getElementById('lengthpass').style.display = 'none';

                            }
                        }


                        function confirmPasswword() {
                            var x= document.getElementById('pass').value;
                            var y= document.getElementById('confirmpass').value;


                            if(x != y){
                                document.getElementById('errorpass').style.display = 'block';
                                document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
                            }
                            else
                            {
                                document.getElementById('errorpass').style.display = 'none';

                            }
                        }</script>
                </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('home_asset') }}js/smoothbox.jquery2.js"></script>
    <script src="{{asset('') }}home_asset/js/jquery.2.2.3.min.js"></script>
<script>
    $(document).ready(function () {
       $('#change-infor').hide();
       $('#editCancel').hide();
    });
</script>
</body>

</html>