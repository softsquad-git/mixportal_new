@extends('layouts.app')

@section('content')
    <div class="container">
        <front-ads-list
                :type="'{{ $type }}'"
                :ads_list_url="'{{ route('api.ads.all') }}'"
                :current_lang="'{{ App::getLocale() }}'"
        ></front-ads-list>
    </div>
    {{--        <div class="row">--}}
    {{--            @if(!$list)--}}
    {{--                <div class="col-lg-12">--}}
    {{--                    <form method="get" action="" id="searchForm">--}}
    {{--                        <div class="row justify-content-start text-center header-customer mb-4">--}}
    {{--                            @csrf--}}
    {{--                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
    {{--                                <div>--}}
    {{--                                    <input style="display: none;" type="text" value="{{ $old['hiddenCity'] ?? '' }}"--}}
    {{--                                           autocomplete="off" name="hiddenCity" id="hiddenCity">--}}
    {{--                                    <input type="hidden" name="type" value="{{$old['type']}}">--}}
    {{--                                    <input type="hidden" id="subcategory" name="subcategory"--}}
    {{--                                           value="{{$old['subcategory'] ?? ''}}">--}}
    {{--                                </div>--}}
    {{--                                <input type="text" class="form-control" id="city" value="{{ old('city') }}"--}}
    {{--                                       placeholder="Wpisz miejscowość" autocomplete="off" name="city" list="cities"--}}
    {{--                                       required>--}}
    {{--                                <div class="invalid-tooltip"></div>--}}
    {{--                                <small id="city" class="form-text text-white-50">Wpisz nazwę miejscowości i wybierz ją z--}}
    {{--                                    listy</small>--}}

    {{--                                <datalist id="cities">--}}

    {{--                                </datalist>--}}

    {{--                            </div>--}}
    {{--                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">--}}
    {{--                                <select name="distance" class="form-control" id="exampleFormControlSelect1"--}}
    {{--                                        onclick="()=>{$('#city').blur()}">--}}
    {{--                                    <option value="1">0 km</option>--}}
    {{--                                    <option value="10">10 km</option>--}}
    {{--                                    <option value="25">25 km</option>--}}
    {{--                                    <option value="50">50 km</option>--}}
    {{--                                    <option value="100">100 km</option>--}}
    {{--                                    <option value="150">150 km</option>--}}
    {{--                                    <option value="200">200 km</option>--}}
    {{--                                    <option value="350">350 km</option>--}}
    {{--                                    <option value="500">500 km</option>--}}
    {{--                                </select>--}}
    {{--                                <small class="form-text text-white-50">szukaj w promieniu</small>--}}
    {{--                            </div>--}}

    {{--                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">--}}
    {{--                                @if( app('request')->input('type')  != 1000)<a class="btn btn-light w-100"--}}
    {{--                                                                               onclick="submitCategoryEvent()"--}}
    {{--                                                                               href="javascript:{}">Szukaj</a>@endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}


    {{--                        @if( app('request')->input('type')  == 'company')--}}

    {{--                            <div class="row justify-content-center mb-5">--}}
    {{--                                <ul class="categoryList" style="list-style-type: none;">--}}
    {{--                                    @foreach($categories as $cat )--}}
    {{--                                        <li onclick="triggerChild(this)" class="col-md-3">--}}
    {{--                                            <div class="icon-background col-md-12">--}}
    {{--                                                <div class="row justify-content-center">--}}
    {{--                                                    <div class="col-md-12"><img class="img-fluid pt-2 pl-2 pb-2 pr-2"--}}
    {{--                                                                                width="50px"--}}
    {{--                                                                                src="image/icons/{{$cat->id}}.svg">--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="col-md-12">{{$cat->text}}</div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <ul id="childContainer" class="child-container ">--}}
    {{--                                                <div class="row justify-content-start">--}}
    {{--                                                    @foreach($cat->category->childs as $child)--}}
    {{--                                                        <a class="col-md-3 p-0 pl-2 "--}}
    {{--                                                           onclick="submitCategory({{$child->translates[0]->id }})"--}}
    {{--                                                           href="javascript:{}">{{$child->translates[0]->text }}</a>--}}
    {{--                                                    @endforeach--}}
    {{--                                                </div>--}}
    {{--                                            </ul>--}}
    {{--                                        </li>--}}
    {{--                                    @endforeach--}}

    {{--                                </ul>--}}
    {{--                            </div>--}}

    {{--                        @endif--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                @handheld--}}
    {{--                @elsehandheld--}}
    {{--                @if($textSubcategories ?? null)--}}
    {{--                    <div class="col-lg-12 text-right ">--}}
    {{--                        Kategoria:<h5>{{$textSubcategories->text ??'test'}}</h5>--}}

    {{--                    </div>--}}
    {{--                @endif--}}
    {{--                @endhandheld--}}
    {{--                <div class="col-lg-4 mb-3">--}}
    {{--                    <form id="searchForm" method="get" action="">--}}
    {{--                        @csrf--}}

    {{--                        <div class="card ">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <h5 class="card-title">Szukaj</h5>--}}
    {{--                                <div class="row">--}}
    {{--                                    <div class="col-lg-12 mb-3">--}}
    {{--                                        <input type="hidden" id="subcategory" name="subcategory"--}}
    {{--                                               value="{{$old['subcategory'] ?? ''}}">--}}
    {{--                                        <input style="display: none;" type="text" value="{{ $old['hiddenCity'] ?? '' }}"--}}
    {{--                                               autocomplete="off" name="hiddenCity" id="hiddenCity">--}}
    {{--                                        <div>--}}
    {{--                                            <input type="hidden" name="type" value="{{$old['type']}}">--}}
    {{--                                        </div>--}}
    {{--                                        <input type="text" class="form-control" id="city" onfocus="this.value=''"--}}
    {{--                                               value="{{$old['city']}}" placeholder="Wpisz miejscowość"--}}
    {{--                                               autocomplete="off" name="city" list="cities" required>--}}

    {{--                                        <datalist id="cities"></datalist>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="mr-2 ml-3">--}}
    {{--                                        <div class="align-middle">w promieniu</div>--}}
    {{--                                    </div>--}}

    {{--                                    <div class="ml-2 mr-2">--}}
    {{--                                        <select name="distance" class="form-control form-control-sm"--}}
    {{--                                                id="exampleFormControlSelect1">--}}
    {{--                                            <option value="1" <?php if ($old['distance'] == 1) echo 'selected' ?> >0--}}
    {{--                                            </option>--}}
    {{--                                            <option value="10" <?php if ($old['distance'] == 10) echo 'selected' ?> >--}}
    {{--                                                10--}}
    {{--                                            </option>--}}
    {{--                                            <option value="25" <?php if ($old['distance'] == 25) echo 'selected' ?> >--}}
    {{--                                                25--}}
    {{--                                            </option>--}}
    {{--                                            <option value="50" <?php if ($old['distance'] == 50) echo 'selected' ?> >--}}
    {{--                                                50--}}
    {{--                                            </option>--}}
    {{--                                            <option value="100" <?php if ($old['distance'] == 100) echo 'selected' ?> >--}}
    {{--                                                100--}}
    {{--                                            </option>--}}
    {{--                                            <option value="150" <?php if ($old['distance'] == 150) echo 'selected' ?> >--}}
    {{--                                                150--}}
    {{--                                            </option>--}}
    {{--                                            <option value="200" <?php if ($old['distance'] == 200) echo 'selected' ?> >--}}
    {{--                                                200--}}
    {{--                                            </option>--}}
    {{--                                            <option value="350" <?php if ($old['distance'] == 350) echo 'selected' ?> >--}}
    {{--                                                350--}}
    {{--                                            </option>--}}
    {{--                                            <option value="500" <?php if ($old['distance'] == 500) echo 'selected' ?> >--}}
    {{--                                                500--}}
    {{--                                            </option>--}}
    {{--                                        </select>--}}
    {{--                                    </div>--}}

    {{--                                    <div class="col-lg-1.5">--}}
    {{--                                        <div class="align-middle">km</div>--}}
    {{--                                    </div>--}}

    {{--                                    <div class="col-lg-12 mt-3 mb-3">--}}
    {{--                                        <button class="btn btn-light btn-block" type="submit">Szukaj</button>--}}
    {{--                                    </div>--}}

    {{--                                    @handheld--}}
    {{--                                    <div class="col-sm-12">--}}
    {{--                                        <div id="accordion">--}}
    {{--                                            <div class="card">--}}
    {{--                                                <div class="card-header" id="headingOne">--}}
    {{--                                                    <button type="button" class="btn btn-link btn-sm btn-block"--}}
    {{--                                                            data-toggle="collapse" data-target="#collapseOne"--}}
    {{--                                                            aria-expanded="true" aria-controls="collapseOne">--}}
    {{--                                                        Filtry--}}
    {{--                                                    </button>--}}

    {{--                                                </div>--}}

    {{--                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"--}}
    {{--                                                     data-parent="#accordion">--}}
    {{--                                                    <div class="card-body">--}}
    {{--                                                        @if($old['type'] != 1000)--}}
    {{--                                                            @foreach($categories as $cat)--}}
    {{--                                                                <div class="custom-control custom-checkbox">--}}
    {{--                                                                    <input value="1" name="cat_{{$cat->id}}"--}}
    {{--                                                                           type="checkbox"--}}
    {{--                                                                           <?php if (isset($old['cat_' . $cat->id]) && $old['cat_' . $cat->id] == '1') echo 'checked'; ?> class="custom-control-input"--}}
    {{--                                                                           id="customCheckDesktop{{$cat->id}}">--}}
    {{--                                                                    <label class="custom-control-label"--}}
    {{--                                                                           for="customCheckDesktop{{$cat->id}}">{{$cat->text}}</label>--}}
    {{--                                                                </div>--}}
    {{--                                                            @endforeach--}}
    {{--                                                        @else--}}

    {{--                                                            @foreach($categories as $cat)--}}
    {{--                                                                <div class="dropdown">--}}
    {{--                                                                    <a style="cursor:pointer;white-space: normal"--}}
    {{--                                                                       class="dropdown-toggle" data-toggle="dropdown">--}}
    {{--                                                                        {{$cat->text}}--}}
    {{--                                                                        <span class="caret"></span></a>--}}

    {{--                                                                    <ul class="dropdown-menu">--}}
    {{--                                                                        @foreach($cat->childs as $child)--}}
    {{--                                                                            <a onclick="submitCategory({{$child->id}})"--}}
    {{--                                                                               href="javascript:{}">{{$child->text}}</a>--}}
    {{--                                                                        @endforeach--}}
    {{--                                                                    </ul>--}}
    {{--                                                                </div>--}}

    {{--                                                                </li>--}}

    {{--                                                            @endforeach--}}

    {{--                                                        @endif--}}

    {{--                                                        @if($old['type'] == 100)--}}

    {{--                                                            @foreach($facility as $fac)--}}
    {{--                                                                <div class="custom-control custom-checkbox">--}}
    {{--                                                                    <input value="1" name="cat_{{$fac->id}}"--}}
    {{--                                                                           type="checkbox"--}}
    {{--                                                                           <?php if (isset($old['cat_' . $fac->id]) && $old['cat_' . $fac->id] == '1') echo 'checked'; ?> class="custom-control-input"--}}
    {{--                                                                           id="customFacDesktop{{$fac->id}}">--}}
    {{--                                                                    <label class="custom-control-label"--}}
    {{--                                                                           for="customFacDesktop{{$fac->id}}">{{$fac->text}}</label>--}}
    {{--                                                                </div>--}}
    {{--                                                            @endforeach--}}

    {{--                                                        @endif--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            @if($textSubcategories ?? null)--}}
    {{--                                                <div class="col-lg-12 text-right ">--}}
    {{--                                                    Kategoria:<h5>{{$textSubcategories->text ??'test'}}</h5>--}}

    {{--                                                </div>--}}
    {{--                                            @endif--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    @elsehandheld--}}


    {{--                                    <div class="col-lg-12">--}}
    {{--                                        <hr>--}}
    {{--                                        @if($old['type'] != 1000)--}}
    {{--                                            @foreach($categories as $cat)--}}
    {{--                                                <div class="custom-control custom-checkbox">--}}
    {{--                                                    <input value="1" name="cat_{{$cat->id}}" type="checkbox"--}}
    {{--                                                           <?php if (isset($old['cat_' . $cat->id]) && $old['cat_' . $cat->id] == '1') echo 'checked'; ?> class="custom-control-input"--}}
    {{--                                                           id="customCheckDesktop{{$cat->id}}">--}}
    {{--                                                    <label class="custom-control-label"--}}
    {{--                                                           for="customCheckDesktop{{$cat->id}}">{{$cat->text}}</label>--}}
    {{--                                                </div>--}}
    {{--                                            @endforeach--}}
    {{--                                        @else--}}

    {{--                                            @foreach($categories as $cat)--}}
    {{--                                                <div class="dropdown">--}}
    {{--                                                    <a style="cursor:pointer;white-space: normal"--}}
    {{--                                                       class="dropdown-toggle" data-toggle="dropdown">--}}
    {{--                                                        {{$cat->text}}--}}
    {{--                                                        <span class="caret"></span></a>--}}

    {{--                                                    <ul class="dropdown-menu">--}}
    {{--                                                        @foreach($cat->childs as $child)--}}
    {{--                                                            <li><a onclick="submitCategory({{$child->id}})"--}}
    {{--                                                                   href="javascript:{}">{{$child->text}}</a></li>--}}
    {{--                                                        @endforeach--}}
    {{--                                                    </ul>--}}
    {{--                                                </div>--}}

    {{--                                                </li>--}}

    {{--                                            @endforeach--}}

    {{--                                        @endif--}}


    {{--                                    </div>--}}

    {{--                                    @if($old['type'] == 100)--}}
    {{--                                        <div class="col-lg-12 mt-3">--}}
    {{--                                            @foreach($facility as $fac)--}}
    {{--                                                <div class="custom-control custom-checkbox">--}}
    {{--                                                    <input value="1" name="cat_{{$fac->id}}" type="checkbox"--}}
    {{--                                                           <?php if (isset($old['cat_' . $fac->id]) && $old['cat_' . $fac->id] == '1') echo 'checked'; ?> class="custom-control-input"--}}
    {{--                                                           id="customFacDesktop{{$fac->id}}">--}}
    {{--                                                    <label class="custom-control-label"--}}
    {{--                                                           for="customFacDesktop{{$fac->id}}">{{$fac->text}}</label>--}}
    {{--                                                </div>--}}
    {{--                                            @endforeach--}}
    {{--                                        </div>--}}
    {{--                                    @endif--}}
    {{--                                    @endhandheld--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}

    {{--            @endif--}}
    {{--            <div class="col-lg-8">--}}
    {{--                @if($list)--}}
    {{--                    @foreach($list as $l)--}}
    {{--                        <div class="card mb-3 hoverEffect" style="min-height: 150px;">--}}

    {{--                            <a href="{{route('talent',$l->slug)}}"--}}
    {{--                               style="pointer:cursor;color:black;text-decoration: none;">--}}
    {{--                                <div class="row">--}}

    {{--                                    <div style="min-height: 100px;" class="col-md-3 text-center align-content-center">--}}
    {{--                                        <img style="max-width: 150px;"--}}
    {{--                                             src="{{!empty($l->allphotos[0]) ? 'images/adverts/'.$l->allphotos[0]->url : 'image/default-image.png'}}"--}}
    {{--                                             class="img">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-md-9">--}}
    {{--                                        <div class="card-body">--}}
    {{--                                            <div class="row">--}}
    {{--                                                <div class="col-10">--}}
    {{--                                                    <h5 class="card-title">{{$l->title}}</h5>--}}

    {{--                                                    <p class="card-text">{{$l->text}}</p>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="row">--}}
    {{--                                                    <h5 class="col-md-12">{{$l->price}} zł</h5>--}}
    {{--                                                    <div class="col-md-12">--}}
    {{--                                                        <div class="endline"></div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}

    {{--                                        </div>--}}
    {{--                                    </div>--}}

    {{--                                </div>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}

    {{--                    @endforeach--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <script type="text/javascript">--}}
    {{--        function triggerChild(e) {--}}
    {{--            if ($('#childContainer', e).is(":visible")) {--}}
    {{--                $('.child-container').hide();--}}
    {{--            } else {--}}
    {{--                $('.child-container').hide();--}}
    {{--                $('#childContainer', e).show();--}}
    {{--            }--}}
    {{--        }--}}

    {{--        function submitCategoryEvent(e) {--}}
    {{--            if ($('#city').val() != '' && $('#hiddenCity').val() != '') {--}}
    {{--                document.getElementById('searchForm').submit();--}}
    {{--            } else {--}}
    {{--                $('small').hide();--}}
    {{--                $('.invalid-tooltip').text('Proszę najpierw wpisać i wybrać miasto z listy')--}}
    {{--                $('#city').addClass('is-invalid')--}}

    {{--            }--}}

    {{--        }--}}

    {{--        function submitCategory(id) {--}}
    {{--            $('#subcategory').val(id)--}}
    {{--            if ($('#city').val() != '' && $('#hiddenCity').val() != '') {--}}
    {{--                document.getElementById('searchForm').submit();--}}
    {{--            } else {--}}
    {{--                $('small').hide();--}}
    {{--                $('.invalid-tooltip').text('Proszę najpierw wpisać i wybrać miasto z listy')--}}
    {{--                $('#city').addClass('is-invalid')--}}

    {{--            }--}}

    {{--        }--}}

    {{--    </script>--}}

@endsection


