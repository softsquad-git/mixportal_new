<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <meta name="keywords" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <?php echo $__env->yieldContent('facebook_meta'); ?>
    <meta name="robots" content="index, follow">
    <link rel="icon" href="<?php echo e(URL::asset('/favicon.png')); ?>" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js?ver=1.0.1')); ?>" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css?ver=1.0.1')); ?>" rel="stylesheet">

    <style>
        /* MIXPORTAL */
        .navbar-brand {
            width: 102px;
            height: 21px;
            left: 194px;
            top: 10px;

            font-family: Run;
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 14px;
            color: #0099FF !important;
            text-shadow: 0px 0px 1px #0099FF;
        }

        .navbar-brand:hover {
        color:rgba(0,153,255,0.8) !important;
        }

        .nav-item{
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 300;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: 0.02em;
            color: #000000;
        }

        .nav-item.special-btn{
            width: 169px;
            height: 23px;
            left: 1003px;
            top: -2px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            text-align: center;
            background: rgba(0, 153, 255, 0.8);
        }

        .nav-item.special-btn:hover{
            box-shadow: 0 0 3px rgba(0,0,0,0.8);
        }
        .nav-item.special-btn a{
            width: 172px;
            height: 26px;
            left: 1000px;
            top: 10px;
            text-align: center;
            font-family: Open Sans;
            font-weight: bold;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 25px;
            color: #FFFFFF!important;
        }


        .cookie-info{
            color: white;
            height: 7%;
            width: 100%;
            position: fixed;
            bottom:0px;
            background-color: rgba(0,0,0,0.86);
            z-index: 100;
        }

        .cookie-info .text{
            font-size: 8pt;
            width: 80%!important;
            text-align: start;
            padding-left: 1%;
            padding-top: 1%;
            float: left;
        }
        .cookie-info .close-btn{
            font-size: 20px;
            float: left;
            text-align: end;
            width: 20%!important;
            padding-right: 10px;
            cursor: pointer;
        }

        .nav-link{
            font-size: 14px !important;
        }

        @media (max-width: 600px) {
            .cookie-info{
                height: 15%;
            }
        }
    </style>
</head>
<body>
<div id="app">
        <div class="cookie-info">
        <div class="text">Nasza strona internetowa używa plików cookies (tzw. ciasteczka) w celach statystycznych, reklamowych oraz funkcjonalnych. Dzięki nim możemy indywidualnie dostosować stronę do twoich potrzeb. Każdy może zaakceptować pliki cookies albo ma możliwość wyłączenia ich w przeglądarce, dzięki czemu nie będą zbierane żadne informacje. Dowiedz się więcej <a href="https://support.google.com/chrome/answer/95647?hl=pl">jak je wyłączyć.</a> <a href="/_polityka-prywatnosci">Polityka Prywatnosci</a></div>
        <div onclick="setCookie('cookie', 'true', 365)" class="close-btn">x</div>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'Mixportal')); ?>

            </a>

            <a href="/_redakcja" class="btn btn-outline-primary ml-3 d-none d-md-block   text-uppercase font-weight-bold " style="font-family: 'Open Sans';font-size:10px;">Wesprzyj redakcję</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto ">

                        <li class="nav-item mt-1">
                            <a class="nav-link font-weight-bold"  href="/">Strona główna</a>
                        </li>
                        <li class="nav-item mt-1">
                            <a class="nav-link  font-weight-bold"  href="<?php echo e(route('publicList',['type'=>10])); ?>">Baza talentów</a>
                        </li>
                        <li class="nav-item mt-1">
                            <a class="nav-link  font-weight-bold" style="text-transform: uppercase;" href="<?php echo e(route('publicList',['type'=>100])); ?>">Baza noclegowa</a>
                        </li>
                        <li class="nav-item mt-1">
                            <a class="nav-link  font-weight-bold" style="text-transform: uppercase;" href="<?php echo e(route('publicList',['type'=>1000])); ?>">Baza firm</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item special-btn mt-2 ">
                            <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Zaloguj się')); ?></a>
                        </li>
                        <?php endif; ?>
                       <!-- Authentication Links -->
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown">
                            <button class="btn btn-primary btn-block btn-sm mt-1 dropdown-toggle font-weight-bold text-uppercase" type="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" style="font-size: 12px">
                                Dodaj ogłoszenie
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item  font-weight-bold" href="<?php echo e(route('advert',['type'=>10])); ?>">W bazie talentów</a>
                                <a class="dropdown-item  font-weight-bold mt-2" href="<?php echo e(route('advert',['type'=>100])); ?>">W bazie noclegów</a>
                                <a class="dropdown-item  font-weight-bold mt-2" href="<?php echo e(route('advert',['type'=>1000])); ?>">W bazie firm</a>
                            </div>
                        </li>
                       <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link mt-1 btn-block dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" v-pre>
                                <?php echo e(substr(Auth::user()->email, 0,8)); ?>... <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-weight-bold text-info text-uppercase" href="<?php echo e(route('ogloszenia')); ?>">
                                    <?php echo e(__('Moje ogłoszenia')); ?>

                                </a>

                                <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('profile')); ?>">
                                    <?php echo e(__('Mój profil')); ?>

                                </a>

                             <?php if(request()->user()->admin == 1): ?>
                                    <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('listnews')); ?>">
                                        <?php echo e(__('Lista newsów')); ?>

                                    </a>

                                    <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('addnews')); ?>">
                                        <?php echo e(__('Dodaj news')); ?>

                                    </a>

                                    <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('listadvert')); ?>">
                                        <?php echo e(__('Lista ogłoszeń')); ?>

                                    </a>


                                    <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('edittabs')); ?>">
                                        <?php echo e(__('Edytuj zakładki')); ?>

                                    </a>

                                <?php endif; ?>

                                <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Wyloguj')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>

                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 mt-5">
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

</div>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyCrfKQizgivB-ufJzmJieSS7eoLhqUU-FI",
        authDomain: "mixportal-973f5.firebaseapp.com",
        databaseURL: "https://mixportal-973f5.firebaseio.com",
        projectId: "mixportal-973f5",
        storageBucket: "mixportal-973f5.appspot.com",
        messagingSenderId: "423251871237",
        appId: "1:423251871237:web:b77a867dcf794a3fda3e6c",
        measurementId: "G-LCBKF4HQXY"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>

</body>
<script>
    (function() {
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        var myCookie = getCookie("cookie");

        if(myCookie == "true") {
            document.getElementsByClassName('cookie-info')[0].classList.add('d-none')
        }
        else {
            document.getElementsByClassName('cookie-info')[0].classList.remove('d-none')
        }

    })();
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
        document.getElementsByClassName('cookie-info')[0].classList.add('d-none')
    }
</script>
</html>
<?php /**PATH /home/informackr/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>