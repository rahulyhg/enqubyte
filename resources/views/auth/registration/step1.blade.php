<h2></h2>
<section class="form-section">
    <h1 class="mb-3 font-weight-bold text-center">{{ __('Get your sales assistant -- now!') }}</h1>

                <h3 class="mb-3 text-center text-muted">{{ __('Enqubyte helps over 3.5 million freelancers, consultants, and small businesses simplify their finances.')}}</h3>
    <div class="form-group">
        <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" placeholder="First name" required autofocus>
        @if ($errors->has('fname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('fname') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" placeholder="Last name" required>
        @if ($errors->has('lname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lname') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group mt-3">
        <a href="#next" class="btn btn-primary mb-4 btn-lg btn-block wizard-control" data-parsley-group="block-1">
            {{ __('Continue') }}
        </a>
        <div class="loginSignUpSeparator"><span class="textInSeparator">or</span></div>
        <p class="text-center">
            Already have an account?
            <a class="btn-link" href="{{ route('login') }}">
                {{ __('Sign In') }}
            </a>
        </p>
    </div>
</section>