@extends('layouts.app')

@section('content')
<section class="login-form-section pt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb50 text-center">{{ __('Reset Password') }}</h1>
                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="login-form site-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <fieldset>
                    <p>
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
                    
                    <p class="text-center pt20">
                    
                            <button type="submit">
                                {{ __('Send Password Reset Link') }}
                            </button>
                    
                    </p>
</fieldset>
                </form>
                
            </div>
        </div>
    </div>
</section>
@endsection
