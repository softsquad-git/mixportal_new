    

    <?php $__env->startSection('content'); ?>
        <div class="container mb-2">
            <a href="<?php echo e(url()->previous()); ?>" class="font-weight-light">Wróć</a>
            <div class="row justify-content-start">
                <div class="col-md-5">
                    <div class="row">
                        <div class="fotorama" data-allowfullscreen="true" data-arrows="true"  data-nav="thumbs">
                        <?php $__currentLoopData = $data->allphotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="/images/adverts/<?php echo e($photo->url); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($data->allphotos) == 0): ?>
                                <img src="/image/default-image.png">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="font-weight-bold"><?php echo e($data->title); ?></h4>
                   <?php if($data->www): ?><a class="font-weight-light" href="<?php echo e(strpos($data->www, 'http') === false ? 'http://' . $data->www : $data->www); ?>"  target="_blank">Strona internetowa</a><br><?php endif; ?>
                   <?php if($data->fb): ?> <a href="<?php echo e(strpos($data->fb, 'http') === false ? 'http://' . $data->fb : $data->fb); ?>" target="_blank"><img width="20px" src="image/facebook.png"></a><?php endif; ?>
                    <?php if($data->instagram): ?><a href="<?php echo e(strpos($data->instagram, 'http') === false ? 'http://' . $data->instagram : $data->instagram); ?>" target="_blank"> <img width="20px" src="image/instagram.png"></a><?php endif; ?>

                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-sm-12 offset-md-2 col-md-10">
                            <div class="phoneAndPrice">
                                <div class="price"><button type="button" disabled  class="btn btn-light btn-lg btn-block"><?php echo e($data->price); ?> zł</button></div>
                               <?php if($data->phone): ?><div class="phone"><button type="button" class="btn btn-primary btn-block"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-forward" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        <a href="tel:<?php echo e($data->phone); ?>" style="color:white;">
                                            <span class="ml-3"><?php echo e($data->phone); ?></span>
                                        </a></button></div><?php endif; ?>
                                <?php if($data->emailVisible): ?><div class="phone"><button type="button" class="btn bg-dark btn-block mt-2"><a href="mailto:<?php echo e($data->emailVisible); ?>" style="color:white;"><?php echo e($data->emailVisible); ?></a></button></div><?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php if($data->category->main == 100 && $data->email): ?>

                        <div class="col-md-12 ml-md-4 mt-4">
                    <div class="card  bg-dark" style="width: 100%">

                        <div class="card-body">
                            <?php if(!Session::has('sendQuestion')): ?>
                            <h5 class="card-title text-center text-light">Sprawdź dostępność</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">
                                <input type="date" class="start mb-2" id="start" name="trip-start" value="<?php echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>">
                                <input type="date" class="end" id="end" name="trip-end" value="<?php echo date('Y-m-d', strtotime(' + 1 days'))?>" min="<?php echo date('Y-m-d', strtotime(' + 1 days'))?>">
                            </h6>
                            <button type="submit" id="orderFormOpen" class="btn btn-light btn-block" data-toggle="modal" data-target="#exampleModal">Wyślij zapytanie</button>
                            <!-- Button trigger modal -->
                            <?php else: ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(Session::get('sendQuestion')); ?>

                                </div>

                        <?php endif; ?>

                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Zapytanie o nocleg</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="d-inline" method="POST" action="/question">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" class="form-control" id="topic" value="<?php echo e($data->email); ?>" name="emailToSend" required>
                                                <input type="hidden" class="form-control" value="<?php echo e($data->title); ?>"  name="title" >
                                                <input type="hidden" class="form-control" value="<?php echo e($data->slug); ?>"  name="slug" >
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-12 mb-3">
                                                        <div class="text-muted row justify-content-center ">
                                                           <div class="col-12 col-md-3"> <span class="mr-md-2 mt-1 ">Od</span> <input type="date"  class="start" id="start" name="trip-start" value="<?php echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>" ></div>
                                                            <div class="col-12 mt-2 mt-md-0 col-md-3"><span class="mr-md-2  mt-1">Do</span>  <input type="date"  class="end" id="end" name="trip-end" value="<?php echo date('Y-m-d', strtotime(' + 1 days'))?>" min="<?php echo date('Y-m-d', strtotime(' + 1 days'))?>" ></div>
                                                        </div>
                                                        </div>
                                                        <div class="row justify-content-center">

                                                    <div class="col-10 col-md-3 qty mb-1">
                                                        <span class="font-weight-light">Dorośli</span>
                                                        <span class="minusparents bg-dark">-</span>
                                                        <input type="text" name="parents" class="countparents"  value="1" id="parents" required>
                                                        <span class="plusparents bg-dark">+</span>
                                                    </div>

                                                    <div class="qty col-10 col-md-3 mb-1">
                                                        <span class="font-weight-light">Dzieci</span>
                                                        <span class="minuschildren bg-dark">-</span>
                                                        <input type="text" class="countchildren" name="children" id="children" value="0">
                                                        <span class="pluschildren bg-dark">+</span>
                                                    </div>

                                                    </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <textarea type="text" class="form-control" id="topic" placeholder="Zadaj pytanie" name="text" required ></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4 mt-2 mt-md-0">
                                                            <input type="text" class="form-control" id="email" autocomplete="fistname" placeholder="Imie i nazwisko"  name="name" >
                                                        </div>



                                                        <div class="col-md-4 mt-2 mt-md-0">
                                                            <input type="number" class="form-control" id="email" autocomplete="phone" placeholder="Numer telefonu"  name="phone" >
                                                        </div>


                                                        <div class="col-md-4 mt-2 mt-md-0 ">
                                                            <input type="email" class="form-control" id="email" autocomplete="email" placeholder="Email"  name="email" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mt-1 mt-md-0 ">
                                                    <?php echo NoCaptcha::display(); ?>

                                                </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                            <button type="submit" class="btn btn-primary">Wyślij zgłoszenie</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if($data['type'] == 10): ?>
                <div class="col-md-12">
                    <hr>
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                    <h4 class="font-weight-bold">Opis</h4>
                            <?php echo "<h5>".$data->content. "</h5>" ?>
                        </div>
                        <div class="col-md-6">

                            <?php if($data['yt']): ?><iframe width="100%" height="315" src="http://www.youtube.com/embed/<?php echo e(substr($data['yt'], strpos($data['yt'], '=') + 1)); ?>?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><?php endif; ?>
                            <?php if($data['soundcloud']): ?><iframe id='sc-widget' width='100%' height='166' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=<?php echo e($data['soundcloud']); ?>'></iframe><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="col-md-12">
                        <hr>
                    <h6> <?php echo $data->content ?></h6>
                    </div>
                <?php endif; ?>

                <?php if($data->facility): ?>
                <div class="col-md-12">
            <?php $__currentLoopData = $data->facility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?><?php echo e($fac->text); ?>

                        <?php else: ?>
                        | <?php echo e($fac->text); ?>

                        <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>


                <?php if($data->email && $data['type'] != '100'): ?>

                <div class="col-md-12">
                    <hr>
                    <h4 class="font-weight-bold">Formularz kontaktowy</h4>

                    <?php if(!Session::has('sendQuestion')): ?>
                        <?php if($errors->has('g-recaptcha-response')): ?>
                            <span class="help-block">
                           <div class="alert alert-danger"> <?php echo e($errors->first('g-recaptcha-response')); ?></div>
                    </span>
                        <?php endif; ?>
                    <form class="d-inline" method="POST" action="/question">
                        <input type="hidden" class="form-control" value="true"  name="back" >
                        <input type="hidden" class="form-control" value="<?php echo e($data->email); ?>"  name="emailToSend" >
                        <input type="hidden" class="form-control" value="<?php echo e($data->title); ?>"  name="title" >
                        <div class="card bg-dark">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group row justify-content-start">
                                <div class="col-md-4">
                                    <input type="text" placeholder="Imię i nazwisko" class="form-control " id="name"  name="name" value="<?php echo e(old('name')); ?>" required >
                                </div>
                            </div>
                            <div class="form-group row justify-content-start">
                                <div class="col-md-4">
                                    <input type="email" class="form-control" id="email" autocomplete="email" placeholder="Email" value="<?php echo e(old('email')); ?>"  name="email" >
                                </div>
                            </div>

                            <div class="form-group row justify-content-start">
                                <div class="col-md-4">
                                    <textarea type="email" class="form-control" id="content"  name="text" placeholder="Proszę wpisać treść zapytania" ><?php echo e(old('text') ?? ''); ?></textarea>
                                </div>
                            </div>
                            <?php echo NoCaptcha::display(); ?>


                            <button type="submit" class="btn btn-light m-0 "><?php echo e(__('Wyślij zapytanie')); ?></button>

                        </div>
                        </div>
                    </form>

                    <?php else: ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(Session::get('sendQuestion')); ?>

                        </div>

                    <?php endif; ?>

                </div>
                <?php endif; ?>

                <div class="col-md-12">
              <hr>
                <h4 class="font-weight-bold">Lokalizacja</h4>

            <iframe
                    width="100%"
                    height="300"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key= <?php echo e(config('app.api_key')); ?>&q=<?php echo e($data->location[0]->text ?? ''); ?>,<?php echo e($data->street ?? ''); ?>" allowfullscreen>
            </iframe>
            </div>

                <div class="col-md-12">
                    <hr>
                    <div class="row justify-content-end">
                    <div class="col-md-1"> <a class="text-danger" href="<?php echo e(route('report',['title'=>$data->title])); ?>">Zgłoś</a></div>
                    </div>
                </div>


            </div>
            <?php echo NoCaptcha::renderJs(); ?>





        </div>
        <script type="text/javascript">
            $(document).ready(function(){

                $('#orderFormOpen').on('click',function () {
                    $('.end').val($('#end').val())
                    $('.start').val($('#start').val())
                })




                $(document).on('click','.pluschildren',function(){
                    $('input[name="children"]').val(parseInt($('.countchildren').val()) + 1 );
                });
                $(document).on('click','.minuschildren',function(){
                    $('input[name="children"]').val(parseInt($('.countchildren').val()) - 1 );
                    if ($('.countchildren').val() < 0) {
                        $('.countchildren').val(0);
                    }
                });


                $(document).on('click','.plusparents',function(){
                    $('input[name="parents"]').val(parseInt($('.countparents').val()) + 1 );
                });
                $(document).on('click','.minusparents',function(){
                    $('input[name="parents"]').val(parseInt($('.countparents').val()) - 1 );
                    if ($('.countparents').val() == 0) {
                        $('.countparents').val(1);
                    }
                });
            });

        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/advert/item.blade.php ENDPATH**/ ?>