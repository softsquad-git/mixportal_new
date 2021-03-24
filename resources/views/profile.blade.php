@extends('layouts.app')

@section('content')
    <div class="container">
    <h4 class="text-left">{{ trans('trans.pages.register.invoice_data') }}</h4>
        <form method="POST" action="">
            @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label for="firstname" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.name') }}</label>

                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required value="{{ $data->firstname }}" required autocomplete="firstname">

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-md-3 col-form-label text-md-left ">{{ trans('trans.forms.last_name')  }}</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" required value="{{ $data->surname }}" required autocomplete="surname">

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
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ $data->company }}"  autocomplete="company" >

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
                    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $data->nip }}"  autocomplete="nip" >

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

                <div class="col-md-7">
                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $data->street }}"  autocomplete="street" required >

                    @error('street')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="postcode" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.post_code') }}</label>

                <div class="col-md-7">
                    <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ $data->postcode }}"  autocomplete="postcode"  inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>

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
                    <input type="text" class="form-control" id="city" onfocus="this.value=''" value="{{$data->city}}" autocomplete="state" name="city" list="cities" required >
                    <datalist id="cities"></datalist>
                </div>
            </div>


            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-left ">{{ trans('trans.forms.address.voivodeship') }}</label>

                <div class="col-md-7">
                <!--<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}"  autocomplete="state" >-->
                    <select class="form-control" id="state" value="{{ $data->state }}"  autocomplete="state" name="state" required>
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
        <div class="form-group row mb-3">
            <div class="col-md-2 ">
                <button type="submit" class="btn btn-outline-primary btn-block">
                    {{ __('trans.buttons.save') }}
                </button>
            </div>
            @if($successData?? false)
            <div class="alert alert-success" role="alert">
                {{ __('trans.pages.profile.saved') }}
            </div>
            @endif
        </div>
    </form>
        <form method="post" action="{{route('changeEmail')}}">
            @csrf
        <hr>
        <h4 class="text-left">{{ __('trans.pages.register.account_data') }}</h4>

        <div class="form-group row">
            <label for="email" class="col-md-1 col-form-label text-md-left ">{{ __('trans.forms.email') }}</label>
            <div class="col-md-4">
                <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}"  autocomplete="off" required>

            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('trans.pages.profile.email_confirmed') }}
                </button>
            </div>
            @if($successChangeEmail?? false)
                <div class="alert alert-success" role="alert">
                    {{ __('trans.pages.profile.email_changed') }}
                </div>
            @endif

    </div>
        </form>
        <hr>
        <div class="form-group row mb-3">
        <form action="/password/reset" >
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-warning btn-block">
                        {{ __('trans.pages.profile.change_password') }}
                    </button>
                </div>

        </form>


        @if(request()->user()->admin != 1)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                {{ __('Usuń konto') }}
            </button>
        @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="/user/delete">
                        @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Usuwanie konta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Czy na pewno chcesz usunąć swoje konto ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Potwierdzam</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </div>

@endsection
 