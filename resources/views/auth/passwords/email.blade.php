@extends('layouts.app')

@section('content')
    <section class="Sign">
        <div class="container">
            <div class="row">
                <div class="signin_form_main">
                    <h1 class="text-center">{{ __('Reset Password') }}</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                        </div>
                        <input type="submit" class="btn btn-primary signin_btn"
                            value="{{ __('Send Password Reset Link') }}" />
                    </form>


                </div>
            </div>


        </div>
    </section>
@endsection
