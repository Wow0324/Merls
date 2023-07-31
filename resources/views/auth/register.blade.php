@extends('layouts.app')

@section('content')

<section class="signup-form-section pt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb50 text-center">Create an Account</h1>

                <form class="signup-form site-form" action="{{route('register')}}" method="POST">
                    <fieldset>
                    @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="email">Email</label>
                                    <input type="text" placeholder="" value="{{ old('email') }}" name="email" id="email">
                                    @error('email')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="phone">Phone</label>
                                    <input type="tel" value="{{ old('phone') }}" name="phone" id="phone" >
                                    @error('phone')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="password">Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password" id="password" required>
                                    @error('password')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="password_confirmed">Confirm Password</label>
                                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="first_name">First Name</label>
                                    <input type="text" placeholder="" value="{{ old('first_name') }}" name="first_name" id="first_name">
                                    @error('first_name')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="lastname">Last Name</label>
                                    <input type="text" placeholder="" value="{{ old('last_name') }}" name="last_name" id="last_name">
                                    @error('last_name')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="address">Address</label>
                                    <input type="text" value="{{ old('address') }}" name="address" id="address">
                                    @error('address')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="city">City</label>
                                    <input type="text" value="{{ old('city') }}" name="city" id="city">
                                    @error('city')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="state">State</label>
                                    <input type="text" value="{{ old('state') }}" name="state" id="state">
                                    @error('state')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="zipcode">Zipcode</label>
                                    <input type="text" value="{{ old('zipcode') }}" name="zipcode" id="zipcode">
                                    @error('zipcode')
                                        <span class="small text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <p>Already have an account? <a href="{{route('login')}}" class="blue">Login Here</a></p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-right">
                                    <button class="btn btn-red" type="submit">Next</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
