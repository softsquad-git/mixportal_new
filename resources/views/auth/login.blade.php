@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="">
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<h4 class="text-center mb-3 font-weight-bold">{{ __('trans.nav.login') }}</h4>
					<div class="form-group row justify-content-center ">

						<div class=" col-md-6">
							<input id="email" type="email" placeholder="{{ __('trans.forms.email') }}" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row justify-content-center">

						<div class="col-md-6">
							<input id="password" type="password" placeholder="{{ __('trans.forms.password.password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						</div>

					<div class="form-group row">
						<div class="col-lg-3 col-md-3 offset-md-4 offset-lg-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="remember">
									{{ __('trans.nav.remember_me') }}
								</label>
							</div>
						</div>

						<div class="col-md-4 offset-md-0">
							<div class="form-check">
						@if (Route::has('password.request'))
							<a class="" href="{{ route('password.request') }}">
								{{ __('trans.nav.forgot_password') }}
							</a>
						@endif
						</div>
						</div>
					</div>

					<div class="form-group row mb-0 justify-content-center">
						<div class="mt-2">
							<button style="width:150px" class="btn btn-outline-primary" type="submit"> {{ __('trans.nav.login') }}</button>

						</div>
					</div>
				</form>

				<div class="form-group row mb-0 justify-content-center">
					<div class="col-md-12 offset-md-0 offset-lg-12 mt-4">
						<h3 class="text-center">{{ __('trans.nav.dont_account') }}</h3>
					</div>
					<div class="mt-3">
						<a href="{{ route('register') }}" class="btn btn-outline-primary">{{ __('trans.nav.register') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
