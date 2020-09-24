@include('backend.form.login.includes.header')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">{{ __('Name') }}</label>

                                                <input id="name" type="text" placeholder="Enter your name" class="form-control py-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email" placeholder="Enter email address" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">{{ __('Password') }}</label>

                                                <input id="password" type="password" placeholder="Enter password" class="form-control py-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control py-4" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Register') }}
                                        </button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@include('backend.form.login.includes.footer')
