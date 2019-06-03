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
</head>

<body>
    <div class="main">
        <h1>User Profile</h1>
        <div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
            <div id="steps" style="margin:0 auto;border-radius: 10px;" class="agileits w3_steps">
                <form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy">
                    <div class="step agileinfo w3ls_fancy_step" style="padding: 10px 0;">
                        <legend>About Me</legend>
                        <div class="abt-agile">
                            <div class="abt-agile-left"></div>
                            <div class="abt-agile-right">
                                <input type="text" placeholder="BRUCE WAYNE"
                                    style="font-size: 20px;width: 95%;color: white;text-transform: uppercase;font-weight: bold;"
                                    disabled>
                                <ul class="address">
                                    <li>
                                        <ul class="address-text">
                                            <li><b>Password </b></li>
                                            <li><input type="password" placeholder="**********" readonly></li>
                                        </ul>
                                        <button class="btn btn-link"
                                            style="font-size: 13px;text-decoration: none;">Change Password</button>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>D.O.B </b></li>
                                            <li><input type="text" placeholder="28/10/1998" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>E-MAIL </b></li>
                                            <li><input type="text" placeholder="son.bjerg@gmail.com" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>PHONE </b></li>
                                            <li><input type="text" placeholder="0396309287" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>ADDRESS </b></li>
                                            <li><input type="text" placeholder="Vietnam" readonly></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="address-text">
                                            <li><b>CV Created </b></li>
                                            <li><input type="text" placeholder="3" readonly></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <table class="table text-light table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Name CV</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark Zuckerberg Mark Zuckerberg Mark Zuckerberg</td>
                                        <td>
                                            <button class="btn btn-danger" style="font-size: 12px;padding: 2px 10px;">
                                                Show <img src="{{ asset('home_asset') }}/images/show.png" alt="" style="width: 17px;"></button>
                                            <button class="btn btn-outline-light"
                                                style="font-size: 12px;padding: 2px 10px;">
                                                Delete <img src="./images/delete.png" alt=""
                                                    style="width: 17px;"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob Bixenman</td>
                                        <td>
                                            <button class="btn btn-danger" style="font-size: 12px;padding: 2px 10px;">
                                                Show <img src="{{ asset('home_asset') }}/images/show.png" alt="" style="width: 17px;"></button>
                                            <button class="btn btn-outline-light"
                                                style="font-size: 12px;padding: 2px 10px;">
                                                Delete <img src="./images/delete.png" alt=""
                                                    style="width: 17px;"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry Ellison</td>
                                        <td>
                                            <button class="btn btn-danger" style="font-size: 12px;padding: 2px 10px;">
                                                Show <img src="{{ asset('home_asset') }}/images/show.png" alt="" style="width: 17px;"></button>
                                            <button class="btn btn-outline-light"
                                                style="font-size: 12px;padding: 2px 10px;">
                                                Delete <img src="./images/delete.png" alt=""
                                                    style="width: 17px;"></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding-top: 15px;">
                                <div>
                                    <button class="btn btn-outline-warning">
                                        <a href="" style="text-decoration: none;color: white">Back to home page</a>
                                    </button>
                                    <button class="btn btn-outline-success">
                                        <a href="" style="text-decoration: none;color: white">Edit Info</a>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="card text-white" style="background-color: transparent;">
                                <div class="card-header">
                                    Change Password
                                </div>
                                <div class="card-body">
                                    <label>Current Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" value="faisalkhan@123" class="form-control"
                                            placeholder="Current Password" readonly style="width: 93%;">
                                    </div>
                                    <label>New Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" placeholder="New Password"
                                            style="width: 93%;">
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            style="width: 93%;">
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-danger">
                                            <a href="" style="text-decoration: none;color: white">Cancel</a>
                                        </button>
                                        <button class="btn btn-outline-primary">
                                            <a href="" style="text-decoration: none;color: white">Save</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('home_asset') }}js/smoothbox.jquery2.js"></script>
</body>

</html>