@extends('layout.main')
@section('Password_reset')
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login">
                                <fieldset class="wrap-title">
                                    <p class="">Forgot your password? No problem. Just let us know your email address
                                        and we will email you a password reset link that
                                        will allow you to choose a new one.</p>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="frm-login-uname" name="email"
                                        placeholder="Type your email address">
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="EMAIL PASSWORD RESET LINK"
                                    name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>
@endsection