@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12 mt-2 mb-2">
                <h4 class="text-left">{{ __('Dane podstawowe:') }}</h4>
            </div>

            <div class="col-md-12">
                <form method="POST" action="/advert" id="ItemEditForm">
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="row">
                        <div class="col-lg-6">
                        @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-left ">{{ __('Tytuł oferty:') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }} {{$data->title ?? null}}"  autocomplete="email" maxlength="40" required>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            @if($type == 1000)
                                <div class="form-group row">
                                    <label for="category" class="col-md-3 col-form-label text-md-left ">{{ __('Kategoria:') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="categoryCompany" value="{{ old('state') }}"  autocomplete="state" name="category" >
                                            <?php foreach ($categories as $cat){
                                                if(isset($data->category) && $cat->id == $data->category->id )echo '<option value="'.$cat->id.'" selected>'.$cat->text.'</option>';
                                                else echo '<option value="'.$cat->id.'">'.$cat->text.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                        <div class="col-md-6 offset-3 mt-3">
                                            <input type="hidden" id="id_subcategory" value="{{$data->subcategory['id'] ?? ''}}">
                                        <select class="form-control d-none" id="subcategory"  autocomplete="state" name="subcategory" >
                                        </select>

                                    </div>
                                </div>

                            @else
                            <div class="form-group row">
                                <label for="category" class="col-md-3 col-form-label text-md-left ">{{ __('Kategoria:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="category" value="{{ old('state') }}"  autocomplete="state" name="category" >

                                        <?php foreach ($categories as $cat){
                                            if(isset($data->category) && $cat->id == $data->category->id )echo '<option value="'.$cat->id.'" selected>'.$cat->text.'</option>';
                                           else echo '<option value="'.$cat->id.'">'.$cat->text.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-left ">{{ __('Miejscowość:') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="{{$data->hiddenCity ?? ''}}city" name="hiddenCity" id="hiddenCity">

                                    <datalist id="cities"></datalist>

                                    <span class="invalid-feedback" id="alertErrorCity"  role="alert">
                                            <strong id="errorCity"></strong>
                                        </span>

                                </div>
                            </div>

                            @if($type === 100)
                                <div class="form-group row">
                                    <label for="street" class="col-md-3 col-form-label text-md-left ">{{ __('Ulica, nr domu / mieszkania') }}</label>
                                    <div class="col-md-6 mt-3">
                                        <input type="text" class="form-control" id="street" value="{{$data->street ?? ''}}"   name="street" >
                                    </div>
                                </div>

                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-left ">{{ __('Cena:') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$data->price ?? ''}}" required >
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
                                <textarea class="ckeditor form-control"  name="content" required>{{$data->content ?? ''}}</textarea>

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

                        @foreach ($facilities as $fc)
                          <div class="form-check form-check-inline pl-2">
                              <input type="hidden" name="fac_{{$fc->id}}" value="0" />
                           <input class="form-check-input" value=1 name="fac_{{$fc->id}}" <?php if( isset($data->facility) && array_search($fc->id, array_column(json_decode($data->facility ?? ''), 'id')) != null)echo 'checked'; ?>   id="fc" type="checkbox">

                              <label class="form-check-label" for="fc" >{{$fc->text}}</label>
                            </div>
                            @endforeach
                            </div>
                        </div>

                        @endif

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group row justify-content-start">
                                <label for="email" class="col-md-3 col-form-label text-md-left "> {{ __('Email do formularza kontaktowego:') }}</label>

                                <div class="col-md-4 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><img src="{{url('/image/open-email.png')}}" width="20"></span>
                                        </div>
                                        <input id="email" type="email"  class="form-control @error('phone') is-invalid @enderror" name="email" value="{{$data->email ?? ''}}">
                                        <small id="emailHelp" class="form-text text-muted">W przypadku braku maila brak formularza kontaktowego </small>
                                    </div>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group row justify-content-start">
                                <label for="emailVisible" class="col-md-3 col-form-label text-md-left "> {{ __('Email widoczny w ogłoszeniu:') }}</label>

                                <div class="col-md-4 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><img src="{{url('/image/open-email.png')}}" width="20"></span>
                                        </div>
                                        <input id="emailVisible" type="email"  class="form-control @error('phone') is-invalid @enderror" name="emailVisible" value="{{$data->emailVisible ?? ''}}">
                                        <small id="emailHelp" class="form-text text-muted">Może być to email rejestracyjny lub ten sam co powyżej</small>
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
                                <label for="www" class="col-md-2 col-form-label text-md-left ">{{ __('WWW:') }}</label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1.018 7.5h2.49c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM2.255 4H4.09a9.266 9.266 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.024 7.024 0 0 0 2.255 4zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm-.5 1.077c-.67.204-1.335.82-1.887 1.855-.173.324-.33.682-.468 1.068H7.5V1.077zM7.5 5H4.847a12.5 12.5 0 0 0-.338 2.5H7.5V5zm1 2.5V5h2.653c.187.765.306 1.608.338 2.5H8.5zm-1 1H4.51a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm1 2.5V8.5h2.99a12.495 12.495 0 0 1-.337 2.5H8.5zm-1 1H5.145c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm-2.173 2.472a6.695 6.695 0 0 1-.597-.933A9.267 9.267 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM1.674 11H3.82a13.651 13.651 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm8.999 3.472A7.024 7.024 0 0 0 13.745 12h-1.834a9.278 9.278 0 0 1-.641 1.539 6.688 6.688 0 0 1-.597.933zM10.855 12H8.5v2.923c.67-.204 1.335-.82 1.887-1.855A7.98 7.98 0 0 0 10.855 12zm1.325-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.91 4a9.277 9.277 0 0 0-.64-1.539 6.692 6.692 0 0 0-.597-.933A7.024 7.024 0 0 1 13.745 4h-1.834zm-1.055 0H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                                             </svg></span>
                                        </div>
                                        <input id="www" type="text" class="form-control @error('www') is-invalid @enderror" name="www" value="{{$data->www ?? ''}}">
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
                                            <span class="input-group-text" id="phone"><img src="{{url('/image/phone.png')}}" width="20"></span>
                                        </div>
                                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data->phone ?? ''}}">
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
                                            <input id="www" type="text" class="form-control @error('www') is-invalid @enderror" name="instagram" value="{{$data->instagram ?? ''}}">
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
                                                <input id="facebook" type="text" class="form-control @error('www') is-invalid @enderror" name="facebook" value="{{$data->fb ?? ''}}" >
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
                                        <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{$data->yt ?? ''}}" >
                                        <small id="emailHelp" class="form-text text-muted">Link zostanie wyświetlony jako odtwarzacz video</small>
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
                                        <input id="soundcloud" type="text" class="form-control @error('youtube') is-invalid @enderror" name="soundcloud" value="{{$data->soundcloud ?? ''}}" >
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">Link zostanie wyświetlony jako odtwarzacz soundcloud</small>
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
                                        @if(isset($data->allphotos))
                                        <?php $countOfImage = 0 ?>
                                        @foreach($data->allphotos as $photo)
                                            <div class="image-container ml-2" id="container_{{str_replace(".","",$photo->url)}}">
                                            <img width="190px" class="img-thumbnail img-fluid" src="/images/adverts/{{$photo->url}}">
                                            <img id="{{$photo->url}}" onclick="removeImage(this)" class="remove-img" src="image/criss-cross.png">

                            <input type="hidden" id="image_{{$countOfImage}}" name="image_{{$countOfImage}}" value='{{$photo->url}}'>
                                            </div>
                                <?php $countOfImage++; ?>
                            @endforeach
                            @endif
                                    </div>
                            </div>

                            <div class="mt-2 text-center">
                                <label for="photoImage">
                                    <a class="btn btn-outline-primary photoImageBtn" aria-disabled="true">Dodaj zdjecie</a>
                                    <div class="text-danger" id="maxImageError">Maksymalnie możesz dodać 12 zdjęć.(max 4 MB jedno zdjęcie)</div>
                                </label>
                            <input type="file" id="photoImage" class="custom-file-input">
                                </div>

                        </div>
                    </div>


                    <div class="col-lg-12 mt-1">
                        <div class="form-group row justify-content-end">

                            <input type="hidden" name="id" value="{{$data->id ?? ''}}">
                            @if($data && $data->payment->status == 'SUCCESS')

                                <div class="col-md-6 text-right ">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Zaktualizuj ogłoszenie') }}
                                    </button>
                                </div>
                            @else

                                <div class="col-lg-6">
                                    <div class="alert alert-primary" role="alert">

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

                                @endif

                        </div>
                    </div>
                </form>
                    </div>
              </div>

            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">


    window.removeImage = function(e){
        axios({
            method: 'post',
            url:'/api/imageRemove',
            data:{name:e.id},
            config: {
                headers: {
                    'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                }}}).then((result)=>{
                    console.log(result)
            $('#container_'+e.id.split('.').join("")).remove();
        });
    }

    </script>
