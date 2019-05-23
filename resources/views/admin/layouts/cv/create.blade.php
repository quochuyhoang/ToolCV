@extends('admin.dashboard')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5> Create User's CV</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @if(session('success'))
                            {{-- <div class = "alert alert-success">{{ session('thongbao') }}</div>--}}
                            <script>
                                alert('{{ session('success') }}');
                            </script>
                        @endif
                        <div class="table-responsive">


                            <form name="create" action="{{ route('usercvs.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset($users))
                                    <select name="name" class="form-control">
                                        <option>--Select user--</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                @endif
                                <p style="color:red">{{ $errors->first('name') }}</p>

                                <div class="form-group">
                                    <label class="text-body custom-control-label">Target</label>
                                    <textarea name="target" class="form-control"></textarea>
                                    <p style="color:red">{{ $errors->first('target') }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="text-body custom-control-label">hobby</label>
                                    <input name="hobbies" class="form-control"></input>
                                    <p style="color:red">{{ $errors->first('hobby') }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="text-body custom-control-label">Desired Salary</label>
                                    <input name="salary" class="form-control" type="number" placeholder="Desired Salary">
                                    <p style="color:red">{{ $errors->first('salary') }}</p>
                                </div>
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5> Education</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>

                                            <a  onclick="edu()">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                            <script type="text/javascript" >
                                                function edu() {
                                                    var get= document.getElementById('edu-number');
                                                    var dem= parseInt(get.value)+1;
                                                    get.value= dem;

                                                    var x= $("#edu");
                                                    x.append('<h4>Stage'+dem+'</h4>'
                                                        +'<div class="form-group">'
                                                    +'<label class="text-body custom-control-label">School Name</label>'
                                                    +'<input name="ed_name'+dem+'" class="form-control" type="text" placeholder="Desired Salary">'
                                                    '<p style="color:red">{{ $errors->first('salary') }}</p>'
                                                    +'</div>'
                                                    +'<div class="form-group">' 
                                                    + '<label class="text-body custom-control-label">Speciality</label>' 
                                                    + '<input name="ed_spe'+dem+'" class="form-control" type="text" placeholder="Speciality">'
                                                    + '<p style="color:red">{{ $errors->first('salary') }}</p>'
                                                    + '</div>' 
                                                    + '<div class="form-group">' 
                                                    + '<label class="text-body custom-control-label">Time</label>' 
                                                    + '<input name="ed_time'+dem+'" class="form-control" type="text" placeholder="Time">'
                                                    + '<p style="color:red">{{ $errors->first('salary') }}</p>'
                                                    + '</div>'

                                                    );

                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="ibox-content" id="edu">
                                        <input name="edu-number" type="hidden" id="edu-number" value="1">
                                        <h3>Stage 1</h3>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">School Name</label>
                                            <input name="ed_name1" class="form-control" type="text" placeholder="Desired Salary">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Speciality</label>
                                            <input name="ed_spe1" class="form-control" type="text" placeholder="Speciality">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Time</label>
                                            <input name="ed_time1" class="form-control" type="text" placeholder="Time">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5> Award</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>

                                            <a  onclick="aw()">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                            <script type="text/javascript" >
                                                function aw() {
                                                    var get= document.getElementById('aw-number');
                                                    var dem= parseInt(get.value)+1;
                                                    get.value= dem;

                                                    var x= $("#aw");
                                                    x.append('<h4>Award '+dem+'</h4>'
                                                        +'<div class="form-group">'
                                                        +'<label class="text-body custom-control-label">School Name</label>'
                                                        +'<input name="aw_name'+dem+'" class="form-control" type="text" placeholder="Desired Salary">'
                                                        +'</div>'
                                                        +'<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Speciality</label>'
                                                        + '<input name="aw_describe'+dem+'" class="form-control" type="text" placeholder="Speciality">'
                                                        + '<p style="color:red">{{ $errors->first('salary') }}</p>'
                                                        + '</div>'
                                                        + '<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Time</label>'
                                                        + '<input name="aw_time'+dem+'" class="form-control" type="text" placeholder="Time">'
                                                        + '<p style="color:red">{{ $errors->first('salary') }}</p>'
                                                        + '</div>'

                                                    );
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="ibox-content" id="aw">
                                        <input name="aw-number" type="hidden" id="aw-number" value="1">
                                        <h3>Award 1</h3>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Name</label>
                                            <input name="aw_name1" class="form-control" type="text" placeholder="Name">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Describe</label>
                                            <input name="aw_describe1" class="form-control" type="text" placeholder="Describe">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Year</label>
                                            <input name="aw_time1" class="form-control" type="text" placeholder="Year">
                                            <p style="color:red">{{ $errors->first('salary') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5> Experience</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>

                                            <a  onclick="ex()">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                            <script type="text/javascript" >
                                                function ex() {
                                                    var get= document.getElementById('ex-number');
                                                    var dem= parseInt(get.value)+1;
                                                    get.value= dem;

                                                    var x= $("#ex");
                                                    x.append('<h4>Stage'+dem+'</h4>'
                                                        +'<div class="form-group">'
                                                        +'<label class="text-body custom-control-label">Name</label>'
                                                        +'<input name="ex_name'+dem+'" class="form-control" type="text" placeholder="Name">'
                                                        +'</div>'
                                                        +'<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Position</label>'
                                                        + '<input name="ex_position'+dem+'" class="form-control" type="text" placeholder="Position">'
                                                        + '</div>'
                                                        +'<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Describe</label>'
                                                        + '<input name="ex_describe'+dem+'" class="form-control" type="text" placeholder="Describe">'
                                                        + '</div>'
                                                        +'<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Achiment</label>'
                                                        + '<input name="ex_achiment'+dem+'" class="form-control" type="text" placeholder="Achiment">'
                                                        + '</div>'
                                                        + '<div class="form-group">'
                                                        + '<label class="text-body custom-control-label">Time</label>'
                                                        + '<input name="ex_time'+dem+'" class="form-control" type="text" placeholder="Time">'
                                                        + '</div>'

                                                    );

                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="ibox-content" id="ex">
                                        <input name="ex-number" type="hidden" id="ex-number" value="1">
                                        <h3>Stage 1</h3>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Name</label>
                                            <input name="ex_name1" class="form-control" type="text" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Position</label>
                                            <input name="ex_position1" class="form-control" type="text" placeholder="Position">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Describe</label>
                                            <input name="ex_describe1" class="form-control" type="text" placeholder="Describe">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Achiment</label>
                                            <input name="ex_achiment1" class="form-control" type="text" placeholder="Achiment">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-body custom-control-label">Time</label>
                                            <input name="ex_time1" class="form-control" type="text" placeholder="Time">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <a class="btn btn-success" href="{{ route('admin.dashboard') }}" type="submit" title="Cancel">Cancel</a>
                                    <input name="submit" class="btn btn-success" type="submit" value="Create" >
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function fileValidation(a){
            var fileInput = document.getElementById('cv'+a);
            var filePath = fileInput.value;//lấy giá trị input theo id
            var allowedExtensions = /(\.pdf)$/i;//các tập tin cho phép
//Kiểm tra định dạng

            if(!allowedExtensions.exec(filePath)){
                alert('You can only select files with .pdf extension.');
                fileInput.value = '';
                return false;
            }else{
            }
        }

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
        function ask() {
            return confirm('Bạn Có Chắc Chắn xóa user này?');
        }

        function add() {
            var add= document.getElementById("add");

            add.removeAttribute('hidden');

        };
        function edit(id) {
            var get_file= "cv"+ id;
            var get= "edit"+ id;
            var but= "b-edit"+ id;
            var edit1= document.getElementById(get_file);
            var edit= document.getElementById(get);
            edit1.removeAttribute('hidden');
            edit.removeAttribute('readonly');
            edit.style.border= 'black solid 1px';

            var edit= document.getElementById(but);
            edit.removeAttribute('hidden');

        }
    </script>

@endsection