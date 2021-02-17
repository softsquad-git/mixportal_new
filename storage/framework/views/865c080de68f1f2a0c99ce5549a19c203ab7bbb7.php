<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <?php echo e(config('app.name', 'Mixportal')); ?>

        </a>
        <a href="/_redakcja"
           class="btn btn-outline-primary ml-3 d-none d-md-block text-uppercase font-weight-bold btn-support"><?php echo e(trans('trans.nav.support_editorial')); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">

                <li class="nav-item mt-1">
                    <a class="nav-link font-weight-bold" href="<?php echo e(route('home')); ?>"><?php echo e(trans('trans.nav.home')); ?></a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold"
                       href="<?php echo e(route('publicList',['type'=>10])); ?>"><?php echo e(trans('trans.nav.talent_base')); ?></a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold text-uppercase"
                       href="<?php echo e(route('publicList',['type'=>100])); ?>"><?php echo e(trans('trans.nav.accommodation_base')); ?></a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link  font-weight-bold text-uppercase"
                       href="<?php echo e(route('publicList',['type'=>1000])); ?>"><?php echo e(trans('trans.nav.company_base')); ?></a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item special-btn mt-2 ">
                        <a href="<?php echo e(route('login')); ?>"><?php echo e(trans('trans.nav.login')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <button class="btn btn-primary btn-ad btn-block btn-sm mt-1 dropdown-toggle font-weight-bold text-uppercase"
                                type="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <?php echo e(trans('trans.nav.create_ad')); ?>

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item font-weight-bold"
                               href="<?php echo e(route('user.advert.create', ['type' => 'talent'])); ?>"><?php echo e(trans('trans.nav.in_talent_base')); ?></a>
                            <a class="dropdown-item font-weight-bold mt-2"
                               href="<?php echo e(route('advert', ['type' => 100])); ?>"><?php echo e(trans('trans.nav.in_accommodation_base')); ?></a>
                            <a class="dropdown-item font-weight-bold mt-2"
                               href="<?php echo e(route('advert', ['type' => 1000])); ?>"><?php echo e(trans('trans.nav.in_company_base')); ?></a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link mt-1 btn-block dropdown-toggle font-weight-bold"
                           href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <?php echo e(substr(Auth::user()->firstname, 0, 1)); ?>.<?php echo e(substr(Auth::user()->surname, 0, 1)); ?> <span
                                    class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item font-weight-bold text-info text-uppercase"
                               href="<?php echo e(route('ogloszenia')); ?>">
                                <?php echo e(trans('trans.nav.classifieds')); ?>

                            </a>
                            <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('profile')); ?>">
                                <?php echo e(trans('trans.nav.profile')); ?>

                            </a>
                            <a class="dropdown-item font-weight-bold text-uppercase" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(trans('trans.nav.logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/front/partials/navbar.blade.php ENDPATH**/ ?>