@extends('layouts.app')

@section('customCss')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            <div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Sign in</h5>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="email" type="text" name="email" value="{{ old('email') }}">
                                <label for="email" class="center-align">Email</label>
                                @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input id="password" type="password" name="password">
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <input type="checkbox" name="remember" id="remember" value="" aria-required="true" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember Me</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <p class="margin medium-small"><a href="user-register.html">Register Now!</a></p>
                            </div>
                            <div class="input-field col s6 m6 l6">
                                <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customJs')
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
@endsection