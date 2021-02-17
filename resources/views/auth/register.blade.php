    @extends('layouts.app')

    @section('content')
    <div class="container mb-5">
        <div class="row justify-content-start">
            <div class="col-md-12 mt-2 mb-2">
                <h4 class="text-left">{{ trans('trans.pages.register.basic_data') }}</h4>
            </div>

            <div class="col-md-12">
                        <form method="POST" action="{{ route('register') }}" id="ItemEditForm">
                            <div class="row">
                            <div class="col-lg-6">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.password.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.password.confirm') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            </div>
                            </div>


                                <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                                    <hr>
                                </div>

                            <h4 class="text-left">{{ trans('trans.pages.register.invoice_data') }}</h4>
                                <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group row">
                                        <label for="firstname" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.name') }}</label>

                                        <div class="col-md-6">
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required value="{{ old('firstname') }}" required autocomplete="firstname">

                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.last_name') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" required value="{{ old('surname') }}" required autocomplete="surname">

                                        @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.company.name') }}</label>

                                    <div class="col-md-6">
                                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}"  autocomplete="company" >

                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nip" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.company.nip') }}</label>

                                    <div class="col-md-6">
                                        <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}"  autocomplete="nip" >

                                        @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="form-group row">
                                        <label for="street" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.address') }}</label>

                                        <div class="col-md-7 mt-4">
                                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}"  autocomplete="street" required >

                                            @error('street')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="postcode" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.post_code') }}}</label>

                                        <div class="col-md-7">
                                            <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}"  autocomplete="postcode"  inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>

                                            @error('postcode')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="city" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.city') }}</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="city" value="{{old('city') ?? ''}}"  autocomplete="off" name="city" list="cities" required >
                                            <datalist id="cities"></datalist>
                                            <span class="invalid-feedback" id="alertErrorCity"  role="alert">
                                            <strong id="errorCity"></strong>
                                        </span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="state" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.voivodeship') }}</label>

                                        <div class="col-md-7">
                                            <!--<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}"  autocomplete="state" >-->
                                            <select class="form-control" id="state" value="{{ old('state') }}"  autocomplete="state" name="state" required>
                                            <?php foreach ($states as $provin){
                                                echo '<option class="state_option" value="'.$provin.'">'.$provin.'</option>';
                                            }?>

                                            </select>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 col-lg-12 mt-2 mb-2" style="">

                                <div class="row justify-content-end">

                                    <div class="col-md-9">
                                <div class="col-lg-12 mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="regulamin" name="regulamin" value="on"
                                           {{ old('regulamin') == 'on' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="regulamin">{{ trans('trans.pages.register.accept') }} <a href="{{route('tabs','Regulamin')}}">{{ trans('trans.pages.register.reg') }}</a></label>
                                </div>
                            </div>
                                <div class="col-lg-12 mt-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="policy" id="policy" value="on"
                                               {{ old('policy') == 'on' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="policy">{{ trans('trans.pages.register.accept') }} <a href="{{route('tabs','polityka-prywatnosci')}}">{{ trans('trans.pages.register.pp') }}</a></label>
                                    </div>
                                </div>
                                        <div class="col-lg-12 mt-0">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="policy" id="policy" value="on"
                                                       {{ old('accident') == 'on' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="policy">{{ trans('trans.pages.register.accept') }} {{ trans('trans.pages.register.that_reg') }}<a href="{{route('tabs','polityka-prywatnosci')}}"> {{ trans('trans.pages.register.reg') }}</a> {{ trans('trans.pages.register.accident') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-0">
                                            <button type="submit" class="btn btn-outline-primary">
                                                {{ __('Załóż konto i przejdź dalej') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>

                            </div>
                        </form>
            </div>
        </div>
    </div>
    @endsection
