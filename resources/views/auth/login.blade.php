@extends('layouts.app')

@section('content')
<section class="login-form-section pt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb50 text-center">Member Login</h1>

                <form id="login-form" class="login-form site-form" method="POST" action="{{ route('login') }}">
                    <fieldset>
                        @csrf
                        <p>
                            <label for="uname">Email</label>
                            <input type="text" placeholder="" id="email" name="email" required>
                            @error('email')
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p>
                            <label for="psw">Password</label>
                            <input type="password" placeholder="" id="password" name="password" required>
                            @error('password')
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p class="text-center pt30">
                            <button type="submit">Login</button>
                        </p>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</section>

<footer>
    <div style="display:none">
        <div id="forgot-pw-popup" class="popup" style="width: 700px; max-width: 100%;">
            <div class="inner bcwhite">
                <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Password Recovery</h3>

                    <form class="forgot-pw-form site-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <label for="zipcode">Email Account</label>
                                        <input type="email" placeholder="" name="email" >
                                    </p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <p>Remember your login? <a href="{{route('login')}}" class="blue">Login Here</a></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-right">
                                        <button type="submit">Recover Password</button>
                                    </p>
                                </div>
                            </div>
          
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</footer>

@endsection
