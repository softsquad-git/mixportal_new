<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul class="list-unstyled quick-links">
                    <li><a href="/"><i class="fa fa-angle-double-right"></i>{{ trans('trans.nav.home') }}</a></li>
                    <li><a href="{{route('publicList',['type'=>'talent'])}}"><i
                                    class="fa fa-angle-double-right"></i>{{ trans('trans.nav.talent_base') }}</a></li>
                    <li><a href="{{route('publicList',['type'=>'accommodation'])}}"><i
                                    class="fa fa-angle-double-right"></i>{{ trans('trans.nav.accommodation_base') }}</a>
                    </li>
                    <li><a href="{{route('publicList',['type'=>'company'])}}"><i
                                    class="fa fa-angle-double-right"></i>{{ trans('trans.nav.company_base') }}</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul class="list-unstyled quick-links">
                    @if(isset($pages['footer']))
                        @foreach($pages['footer'] as $page)
                            <li><a href="{{ route('front.pages.show', ['alias' => $page->alias]) }}"
                                   title="{{ $page->title }}"><i class="fa fa-angle-double-right"></i>{{ $page->title }}
                                </a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul class="list-unstyled quick-links">
                    <li>
                        <img width=80 src="{{ asset('image/paypal-white.png') }}" alt="PayPal-Logo">
                    </li>
                    <li><a href="{{ route('change.lang', ['locale' => 'pl']) }}" class="font-weight-bold pl-3">Polski</a></li>
                    <li><a href="{{ route('change.lang', ['locale' => 'en']) }}" class="font-weight-bold pl-3">English</a></li>
                </ul>
            </div>
        </div>,
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href="https://www.facebook.com/trixmagcom"><i
                                    class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
            <hr>
        </div>
        <div class="row" style="color: #e8e8e8">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                {{ config('app.name') }} &copy; {{ now()->year }}
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                Created by <a href="https://studiownet.pl/" target="_blank">studiownet.pl</a>
            </div>
        </div>
    </div>
</section>

