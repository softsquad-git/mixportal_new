<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name', 'TrixHouse') }}
        </a>
        <a href="/_redakcja"
           class="btn btn-outline-primary ml-3 d-none d-md-block text-uppercase font-weight-bold btn-support">{{ trans('trans.nav.support_editorial') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">

                <li class="nav-item mt-1">
                    <a class="nav-link font-weight-bold" href="{{ route('home') }}">{{ trans('trans.nav.home') }}</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold"
                       href="{{route('publicList',['type'=>'talent'])}}">{{ trans('trans.nav.talent_base') }}</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold text-uppercase"
                       href="{{route('publicList',['type'=>'accommodation'])}}">{{ trans('trans.nav.accommodation_base') }}</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold text-uppercase"
                       href="{{route('publicList',['type'=>'company'])}}">{{ trans('trans.nav.company_base') }}</a>
                </li>
                @guest
                    <li class="nav-item special-btn mt-2 ">
                        <a href="{{ route('login') }}">{{ trans('trans.nav.login') }}</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <button class="btn btn-primary btn-ad btn-block btn-sm mt-1 dropdown-toggle font-weight-bold text-uppercase"
                                type="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            {{ trans('trans.nav.create_ad') }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item font-weight-bold"
                               href="{{route('user.advert.create', ['type' => 'talent'])}}">{{ trans('trans.nav.in_talent_base') }}</a>
                            <a class="dropdown-item font-weight-bold mt-2"
                               href="{{ route('user.advert.create', ['type' => 'accommodation']) }}">{{ trans('trans.nav.in_accommodation_base') }}</a>
                            <a class="dropdown-item font-weight-bold mt-2"
                               href="{{ route('user.advert.create', ['type' => 'company']) }}">{{ trans('trans.nav.in_company_base') }}</a>
                        </div>
                    </li>
                @endauth
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link mt-1 btn-block dropdown-toggle font-weight-bold"
                           href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            {{ substr(Auth::user()->firstname, 0, 1) }}.{{ substr(Auth::user()->surname, 0, 1) }} <span
                                    class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item font-weight-bold text-info text-uppercase"
                               href="{{ route('user.adverts.index') }}">
                                {{ trans('trans.nav.classifieds') }}
                            </a>
                            <a class="dropdown-item font-weight-bold text-uppercase" href="{{ route('profile') }}">
                                {{ trans('trans.nav.profile') }}
                            </a>
                            <a class="dropdown-item font-weight-bold text-uppercase" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ trans('trans.nav.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>