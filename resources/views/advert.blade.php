@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12 mt-2 mb-2">
                <h4 class="text-left">{{ __('Dane podstawowe:') }}</h4>
            </div>

            <div class="col-md-12">
                <form method="POST" action="/advert">
                    <div class="row">
                        <div class="col-lg-6">
                        @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-left ">{{ __('Tytuł oferty:') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="email" maxlength="40">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-3 col-form-label text-md-left ">{{ __('Kategoria:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="category" value="{{ old('state') }}"  autocomplete="state" name="category" >
                                        <?php foreach ($categories as $cat){
                                            echo '<option value="'.$cat->id.'">'.$cat->text.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-left ">{{ __('Miejscowość') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" value="{{ old('hiddenCity') }}" name="hiddenCity" id="hiddenCity">
                                    <input type="text" class="form-control" id="city" value="{{ old('city') }}"  autocomplete="state" name="city" list="cities" >
                                    <datalist id="cities"></datalist>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-left ">{{ __('Cena:') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required >
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">PLN</span>
                                    </div>
                                    </div>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left">{{ __('Opis:') }}</h4>
                        </div>

                            <div class="col-md-12">
                                    <textarea id="content" style="height: 150px;" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required  maxlength="255">
                                    </textarea>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>



                        @if ($type === 100)
                            <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                                <hr>
                            </div>

                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left">{{ __('Udogodnienia:') }}</h4>
                        </div>

                        <div class="form-row align-items-center">
                        <div class="col-lg-12 ">
                        <?php foreach ($facilities as $fc){
                            echo '<div class="form-check form-check-inline pl-2">';
                            echo '<input class="form-check-input" value=1 name="fac_'.$fc->id.'"  id="fc" type="checkbox">';
                            echo '<label class="form-check-label" for="fc" >'.$fc->text.'</label>';
                            echo '</div>';
                        } ?>
                            </div>
                        </div>

                        @endif

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="www" class="col-md-2 col-form-label text-md-left ">{{ __('WWW:') }}</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1.018 7.5h2.49c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM2.255 4H4.09a9.266 9.266 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.024 7.024 0 0 0 2.255 4zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm-.5 1.077c-.67.204-1.335.82-1.887 1.855-.173.324-.33.682-.468 1.068H7.5V1.077zM7.5 5H4.847a12.5 12.5 0 0 0-.338 2.5H7.5V5zm1 2.5V5h2.653c.187.765.306 1.608.338 2.5H8.5zm-1 1H4.51a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm1 2.5V8.5h2.99a12.495 12.495 0 0 1-.337 2.5H8.5zm-1 1H5.145c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm-2.173 2.472a6.695 6.695 0 0 1-.597-.933A9.267 9.267 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM1.674 11H3.82a13.651 13.651 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm8.999 3.472A7.024 7.024 0 0 0 13.745 12h-1.834a9.278 9.278 0 0 1-.641 1.539 6.688 6.688 0 0 1-.597.933zM10.855 12H8.5v2.923c.67-.204 1.335-.82 1.887-1.855A7.98 7.98 0 0 0 10.855 12zm1.325-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.91 4a9.277 9.277 0 0 0-.64-1.539 6.692 6.692 0 0 0-.597-.933A7.024 7.024 0 0 1 13.745 4h-1.834zm-1.055 0H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                                             </svg></span>
                                        </div>
                                        <input id="www" type="text" class="form-control @error('www') is-invalid @enderror" name="www" value="{{ old('www') }}">
                                    </div>
                                    @error('www')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="phone" class="col-md-2 col-form-label text-md-left ">{{ __('Telefon:') }}</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="soundcloud"><img src="{{url('/image/phone.png')}}" width="20"></span>
                                        </div>
                                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="www" class="col-md-2 col-form-label text-md-left ">{{ __('Instagram:') }}</label>
                                    <div class="col-md-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><img src="{{url('/image/instagram.png')}}" width="20"></span>
                                            </div>
                                            <input id="www" type="text" class="form-control @error('www') is-invalid @enderror" name="instagram" value="{{ old('www') }}">
                                        </div>
                                        @error('www')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="facebook" class="col-md-2 col-form-label text-md-left ">{{ __('Facebook:') }}</label>
                                        <div class="col-md-7">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="facebook"><img src="{{url('/image/facebook.png')}}" width="20"></span>
                                                </div>
                                                <input id="facebook" type="text" class="form-control @error('www') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" >
                                            </div>
                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                        @if ($type === 10)
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="youtube" class="col-md-2 col-form-label text-md-left ">{{ __('Youtube:') }}</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="youtube"><img src="{{url('/image/youtube.png')}}" width="20"></span>
                                        </div>
                                        <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ old('youtube') }}" >
                                    </div>
                                    @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="soundcloud" class="col-md-2 col-form-label text-md-left ">{{ __('Soundcloud:') }}</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="soundcloud"><img src="{{url('/image/soundcloud.png')}}" width="20"></span>
                                        </div>
                                        <input id="soundcloud" type="text" class="form-control @error('youtube') is-invalid @enderror" name="soundcloud" value="{{ old('soundcloud') }}" >
                                    </div>
                                    @error('soundcloud')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left">{{ __('Zdjecia:') }}</h4>
                        </div>

                        <div class="col-lg-12 mt-1">
                        <div class="col-md-12">
                                    <div id="image-list" class="row justify-content-center">
                                    </div>
                            </div>

                            <div class="mt-2 text-center">
                                <label for="photoImage">
                                    <a class="btn btn-outline-primary">Dodaj zdjecie</a>
                                </label>
                            <input type="file"  id="photoImage" class="custom-file-input">
                                </div>
                        </div>
                    </div>


                    <div class="col-lg-12 mt-1">
                        <div class="form-group row justify-content-end">

                            <div class="col-lg-6">
                                <div class="alert alert-primary" role="alert">
                                    Koszt za ogłoszenie w {{$paymentSetting[0]['name']}} wynosi {{$paymentSetting[0]['price']}} zł
                                    <input type="hidden" name="type" id="type" value="{{$type}}" >
                                </div>
                            </div>


                            <div class="col-md-6 text-right ">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Dodaj ogłoszenie i przejdź do płatności') }}
                                </button>
                            </div>


                            <div class="col-md-4 col-sm-12 text-right ">
                                <span class="payu-text">Płatności obsługuje</span>
                                <img width="90" class="img-fluid mr-3" src="image/PAYU_LOGO_LIME.png">
                            </div>

                        </div>
                    </div>
                </form>
                    </div>
              </div>

            </div>
        </div>
    </div>
@endsection
