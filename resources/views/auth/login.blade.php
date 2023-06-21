@extends('layouts.app')

@section('content')
    <section class="Sign">
        <div class="container">
            <div class="row">
                <div class="signin_form_main">
                    <h1 class="text-center">{{ __('Sign In to ') }}<span style="color: #fcd535;">Polus Network </span></h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" aria-describedby="emailHelp" placeholder="Enter email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if (Route::has('password.request'))
                            <div class="form-check own_account">
                                <p>{{ __('Forgot Your Password? ') }}<a href="{{ route('password.request') }}">
                                        {{ __('Click Here') }}</a></p>
                            </div>
                        @endif
                        <input type="submit" class="btn btn-primary signin_btn" value="{{ __('Login') }}" />
                    </form>


                </div>
            </div>


        </div>
    </section>
@endsection
