@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <h5 class="mb-4">
            {{ __('trans.pages.advert.add_base') }} {{ trans('trans.pages.advert.title.'.$type) }}
        </h5>
        <form
                method="POST"
                action="{{ $item->id ? route('user.advert.update', ['id' => $item->id]) : route('user.advert.create', ['type' => $type]) }}"
                enctype="multipart/form-data"
        >
            @csrf
            <input type="hidden" id="locationLAT" name="location_lat">
            <input type="hidden" id="locationLNG" name="location_lng">
            <input type="hidden" id="locationPLACEID" name="location_place_id">
            <input type="hidden" value="{{ $type }}" name="type">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pl-tab" data-toggle="tab" href="#pl" role="tab" aria-controls="pl" aria-selected="true">Polski</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="jpg" aria-selected="false">
                                {{ App::getLocale() == 'pl' ? 'Zdjęcia' : 'Images' }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pl" role="tabpanel" aria-labelledby="pl-tab">
                            <div class="row mt-3">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" aria-label="Tytuł" placeholder="Tytuł" value="{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->title : old('trans.pl.title') }}" name="trans[pl][title]">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="input-group mb-3">
                                        <input aria-label="Cena" id="price" placeholder="Cena" value="{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->price : old('trans.pl.price') }}" type="number" class="form-control"
                                               name="trans[pl][price]" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">PLN</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                <textarea id="contentPL" class="ckeditor form-control" aria-label="Treść" placeholder="Treść"
                                          name="trans[pl][content]" required>value="{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->content : old('trans.pl.content') }}"</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="row mt-3">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" aria-label="Title" placeholder="Title" value="{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->title : old('trans.en.title') }}" name="trans[en][title]">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="input-group mb-3">
                                        <input aria-label="Price" id="price" placeholder="Price" value="{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->price : old('trans.en.price') }}" type="number" class="form-control"
                                               name="trans[en][price]" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                <textarea id="contentEN" class="ckeditor form-control" aria-label="Content" placeholder="Content"
                                          name="trans[en][content]" required>{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->content : old('trans.en.content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="form-group mt-2">
                                <label for="images" class="text-left">{{ App::getLocale() == 'pl' ? 'Zdjęcia' : 'Images' }}</label>
                                <input name="images[]" type="file" id="images" multiple class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <select id="category" data-url="{{ route('api.categories.sub') }}" class="form-control" aria-label="Category" name="category_id">
                        <option value="" selected>{{ __('trans.category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category->id }}"{{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->text }}</option>
                        @endforeach
                    </select>
                    <span class="form-text text-muted">
                        {{ trans('trans.category_auto_trans') }}
                    </span>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <select id="subCategory" class="form-control" aria-label="sub category" name="subcategory_id">
                        <option value="" selected>{{ __('trans.sub_category') }}</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">
                    <input type="email" aria-label="E-mail" placeholder="{{ __('trans.email_form_contact') }}" value="{{ $item->email ? $item->email : old('email') }}" class="form-control"
                           name="email" >
                    <small class="form-text text-muted">
                        {{ __('trans.email_form_contact_none') }}
                    </small>
                </div>
                <div class="col-md-4">
                    <input type="email" aria-label="E-mail" placeholder="{{ __('trans.email_view_ads') }}" class="form-control"
                           name="email_visible" value="{{ $item->email_visible ? $item->email_visible : old('email_visible') }}">
                    <small class="form-text text-muted">
                        {{ trans('trans.email_view_ads_none') }}
                    </small>
                </div>
                <div class="col-md-4">
                    <input type="text" aria-label="Phone" value="{{ $item->phone ? $item->phone : old('phone') }}" placeholder="{{ trans('trans.phone') }}" class="form-control" name="phone">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input id="autocomplete" class="form-control" placeholder="{{ __('trans.city') }}" value="{{ $item->city ? $item->city : old('city') }}" aria-label="City" type="text" size="50">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="fb"><img src="{{ asset('image/facebook.png') }}" alt="instagram" width="20"></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $item->fb ? $item->fb : old('fb') }}" aria-label="Facebook" name="fb" placeholder="Facebook">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="ig"><img src="{{ asset('image/instagram.png') }}" alt="instagram" width="20"></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $item->ig ? $item->ig : old('ig') }}" aria-label="Instagram" name="ig" placeholder="Instagram">
                    </div>
                </div>
            </div>

            @if($type == 'talent')
                <div class="row form-group">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="yt"><img src="{{ asset('image/youtube.png') }}" alt="instagram" width="20"></span>
                            </div>
                            <input type="text" aria-label="Link do YouTube" placeholder="{{ __('trans.yt_link') }}" class="form-control" value="{{ $item->yt ? $item->yt : old('yt') }}" name="yt">
                            <small id="ytHelp" class="form-text text-muted w-100">
                                {{ trans('trans.video_link') }}
                            </small>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="sc"><img src="{{ asset('image/soundcloud.png') }}" alt="instagram" width="20"></span>
                            </div>
                            <input type="text" aria-label="Link do YouTube" placeholder="{{ __('trans.sc_link') }}" class="form-control" value="{{ $item->soundcloud ? $item->soundcloud : old('soundcloud') }}" name="soundcloud">
                            <small id="scHelp" class="form-text text-muted w-100">
                                {{ __('trans.sound_link') }}
                            </small>
                        </div>
                    </div>
                </div>
            @endif

            @if($type == 'accommodation')
                <div class="row form-group">
                    <div class="col-12 p-0">
                        <div class="col-12 mt-1">
                            <h4 class="mb-2">{{ __('trans.amenities') }}</h4>
                            <div class="col-12">
                                @foreach($amenities as $amenity)
                                    <label class="amenities-list">
                                        <input id="{{ $amenity->id }}" type="checkbox" value="{{ $amenity->id }}" name="amenities[]">
                                        {{ $amenity->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input id="city" name="address" value="{{ $item->address ? $item->address : old('address') }}" class="form-control" aria-label="Address" placeholder="{{ __('trans.acc_address') }}">
                    </div>
                </div>
            @endif

            <div class="form-group row mt-3">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">
                        {{ App::getLocale() == 'pl' ? 'Zapisz i przejdź do płatności' : 'Save and proceed to payment' }}
                    </button>
                </div>
            </div>


        </form>
        <div class="payments-logo">
            <img src="{{ asset('image/PayPal-Logo.png') }}" alt="PayPal"/>
        </div>
    </div>
@endsection

@section('customScripts')
    <script type="text/javascript">
        CKEDITOR.replace('contentPL, contentEN', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'

        });
    </script>
    <script>
        function initialize() {
            var input = document.getElementById('autocomplete');
            const autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                const place = autocomplete.getPlace();
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                $('#locationLAT').val(lat);
                $('#locationLNG').val(lng);
                $('#locationPLACEID').val(place.place_id);
            })
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection