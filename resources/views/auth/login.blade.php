@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="">
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<h4 class="text-center mb-3 font-weight-bold">Logowanie</h4>
					<div class="form-group row justify-content-center ">

						<div class=" col-md-6">
							<input id="email" type="email" placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row justify-content-center">

						<div class="col-md-6">
							<input id="password" type="password" placeholder="Hasło" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
									{{ __('Pamiętaj mnie') }}
								</label>
							</div>
						</div>

						<div class="col-md-4 offset-md-0">
							<div class="form-check">
						@if (Route::has('password.request'))
							<a class="" href="{{ route('password.request') }}">
								{{ __('Zapomniałem hasła') }}
							</a>
						@endif
						</div>
						</div>
					</div>

					<div class="form-group row mb-0 justify-content-center">
						<div class="mt-2">
							<ui5-button style="width:150px" type="submit" submits="true" design="Default"> {{ __('Zaloguj się') }}</ui5-button>

						</div>
					</div>
				</form>

				<div class="form-group row mb-0 justify-content-center">
					<div class="col-md-12 offset-md-0 offset-lg-12 mt-4">
						<h3 class="text-center">Nie masz konta?</h3>
					</div>
					<div class="mt-3">
						<form method="GET" action="{{ route('register') }}">
						<ui5-button  submits="true"  style="width:150px"  design="Default"> {{ __('Zarejestruj się') }}</ui5-button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
