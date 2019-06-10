<div class="container">
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('home.post') }}" method="post">
                @csrf
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-center" style="text-shadow: 1px 1px 3px;font-size: 30px;">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size:40px;">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class=" w3l-form-group" style="padding-bottom:10px;">
                          <label>Username:</label>
                          <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="checkEmail()">
                        </div>
                        <div class=" w3l-form-group">
                          <label>Password:</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="forgot" style="padding: 5px 0;font-size:13px;">
                            <a href="#" style="color:blue;margin-bottom:5px;">Forgot Password?</a>
                            <div>
                              <p>
                                <span style="padding-right:10px;"><input type="checkbox"> Remember Me</span>
                                <span><input type="checkbox" onclick="showPass()"> Show Password</span>
                              </p>
                            </div>
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
                        <button type="submit" class="btn btn-block btn-success">Login</button>
                        
                    </div>
                </form>
                <div style="text-align: center;margin-bottom:20px;">Don't you have an account? <a  target="_blank" class="btn" style="color:blue;font-size:15px;" data-toggle="modal" data-target="#registerModal">Create Account</a></div>
            </div>
        </div>
    </div>
</div>