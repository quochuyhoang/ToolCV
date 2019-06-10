<div class="container">

    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('home.post') }}" method="post">
                @csrf
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class=" w3l-form-group">
                            <label>Username:</label>
                            <div class="group">
                                <i class="fas fa-user"></i>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="checkEmail()">
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>Password:</label>
                            <div class="group">
                                <i class="fas fa-unlock"></i>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="forgot">
                            <a href="#">Forgot Password?</a>
                            <p><input type="checkbox">Remember Me
                                <input type="checkbox" onclick="showPass()">Show Password</p>
                            <script>
                                function showPass() {
                                    var x = document.getElementById('password');

                                    if (x.type === 'password') {
                                        x.type = 'text';
                                    } else {
                                        x.type = 'password';
                                    }

                                }

                                function checkEmail(obj) {
                                    var x = obj.value;

                                    var vitri = x.search("@");
                                    if (vitri === 0) {
                                        alert('"@" cannot be at the beginning of the string');
                                        obj.focus();
                                    } else if (vitri === x.length - 1) {
                                        alert('"@" cannot be at the the end of the string');
                                        obj.focus();
                                    } else if (vitri === -1) {
                                        alert('Please include "@" in the email address');
                                        obj.focus();
                                    } else {

                                    }
                                }

                            </script>
                        </div>



                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Login</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>
                <div style="text-align: center;;">Bạn Chưa có tài khoản? <a  target="_blank" class="btn" style="margin-right:20px;" data-toggle="modal" data-target="#registerModal">Create Account</a></div>
            </div>
        </div>
    </div>

</div>