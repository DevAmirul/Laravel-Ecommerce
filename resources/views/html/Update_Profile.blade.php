@extends('layout.main')
@section('Update_Profile')
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Update Profile</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Update Profile Information</h3>
                                    <p>Update your account's profile information and email address.</p>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Name:</label>
                                    <input type="text" id="frm-login-uname" name="name"
                                        placeholder="Type your name">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="email" id="frm-login-uname" name="email"
                                        placeholder="Type your email address">
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Save" name="submit">
                            </form>
                            <br> <br> <br> <br>
                            <form name="frm-login">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Update Password</h3>
                                    <p>Ensure your account is using a long, random password to stay secure.</p>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Current Password:</label>
                                    <input type="password" id="frm-login-pass" name="pass" placeholder="************">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">New Password:</label>
                                    <input type="password" id="frm-login-pass" name="pass" placeholder="************">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Confirm Password:</label>
                                    <input type="password" id="frm-login-pass" name="pass" placeholder="************">
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Save" name="submit">
                            </form>
                            <br> <br> <br> <br>
                            <form name="frm-login">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Delete Account</h3>
                                    <p>Once your account is deleted, all of its resources and data will be permanently
                                        deleted. Before deleting your account,
                                        please download any data or information that you wish to retain.</p>
                                </fieldset>

                                <input type="submit" class="btn btn-submit" value="DELETE ACCOUNT" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>
@endsection