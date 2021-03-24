<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
        <?php if(!$list): ?>
                <div class="col-lg-12">
        <form method="get" action="" id="searchForm">

        <div class="row justify-content-start text-center header-customer mb-4">
    <?php echo csrf_field(); ?>
    <div class="col-lg-3 mb-3 ">
        <div>
        <input style="display: none;" type="text"  value="<?php echo e($old['hiddenCity'] ?? ''); ?>" autocomplete="off"  name="hiddenCity" id="hiddenCity">
            <input type="hidden" name="type" value="<?php echo e($old['type']); ?>">
            <input type="hidden" id="subcategory" name="subcategory" value="<?php echo e($old['subcategory'] ?? ''); ?>">
        </div>
        <input type="text" class="form-control" id="city" value="<?php echo e(old('city')); ?>" placeholder="Wpisz miejscowość"  autocomplete="off"  name="city" list="cities" required >
        <div class="invalid-tooltip"></div>
        <small id="city" class="form-text text-white-50">Wpisz nazwę miejscowości i wybierz ją z listy</small>

        <datalist id="cities">

        </datalist>

    </div>
            <div class="col-lg-1.5 ml-3">
                <div class="align-middle">w promieniu</div>
            </div>

            <div class="ml-2 mr-2" >
                <select name="distance" class="form-control" id="exampleFormControlSelect1" onclick="()=>{$('#city').blur()}">
                    <option value="1" >0</option>
                    <option value="10" >10</option>
                    <option value="25" >25</option>
                    <option value="50" >50</option>
                    <option value="100" >100</option>
                    <option value="150" >150</option>
                    <option value="200" >200</option>
                    <option value="350" >350</option>
                    <option value="500" >500</option>
                </select>
            </div>

            <div class="col-lg-1.5">
                <div class="align-middle">km</div>
            </div>

            <div class="col-lg-1.5 ml-3">
                <?php if( app('request')->input('type')  != 1000): ?><a class="btn btn-light" onclick="submitCategoryEvent()" href="javascript:{}" >Szukaj</a><?php endif; ?>
            </div>
        </div>


            <?php if( app('request')->input('type')  == 1000): ?>

                <div class="row justify-content-center mb-5">
                    <ul class="categoryList" style="list-style-type: none;">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li onclick="triggerChild(this)" class="col-md-3">
                <div class="icon-background col-md-12" >
                    <div class="row justify-content-center">
                        <div class="col-md-12"><img class="img-fluid pt-2 pl-2 pb-2 pr-2" width="50px"  src="image/icons/<?php echo e($cat->id); ?>.svg"></div>
                    <div class="col-md-12"><?php echo e($cat->text); ?></div>
                    </div>
                </div>
                <ul id="childContainer" class="child-container ">
                    <div class="row justify-content-start">
                <?php $__currentLoopData = $cat->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="col-md-3 p-0 pl-2 " onclick="submitCategory(<?php echo e($child->id); ?>)" href="javascript:{}"><?php echo e($child->text); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>

            <?php endif; ?>
        </form>
                </div>
        <?php else: ?>
                <?php if (app('mobile-detect')->isMobile()) : ?>
            <?php else: ?>
                <?php if($textSubcategories ?? null): ?> <div class="col-lg-12 text-right ">
                Kategoria:<h5><?php echo e($textSubcategories->text ??'test'); ?></h5>

                </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="col-lg-4 mb-3">
                <form id="searchForm" method="get" action="">
                    <?php echo csrf_field(); ?>

                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Szukaj</h5>
                       <div class="row">
                           <div class="col-lg-12 mb-3">
                               <input type="hidden" id="subcategory" name="subcategory" value="<?php echo e($old['subcategory'] ?? ''); ?>">
                               <input style="display: none;" type="text"  value="<?php echo e($old['hiddenCity'] ?? ''); ?>" autocomplete="off"  name="hiddenCity" id="hiddenCity">
                               <div>
                                   <input type="hidden" name="type" value="<?php echo e($old['type']); ?>">
                               </div>
                               <input type="text" class="form-control" id="city" onfocus="this.value=''" value="<?php echo e($old['city']); ?>" placeholder="Wpisz miejscowość"  autocomplete="off" name="city" list="cities" required >

                              <datalist id="cities"></datalist>
                           </div>
                           <div class="mr-2 ml-3">
                               <div class="align-middle">w promieniu</div>
                           </div>

                           <div class="ml-2 mr-2" >
                               <select name="distance" class="form-control form-control-sm" id="exampleFormControlSelect1">
                                   <option value="1" <?php if($old['distance']   == 1)echo 'selected' ?> >0</option>
                                   <option value="10" <?php if($old['distance']   == 10)echo 'selected' ?> >10</option>
                                   <option value="25" <?php if($old['distance']   == 25)echo 'selected' ?> >25</option>
                                   <option value="50" <?php if($old['distance']   == 50)echo 'selected' ?> >50</option>
                                   <option value="100" <?php if($old['distance']   == 100)echo 'selected' ?> >100</option>
                                   <option value="150" <?php if($old['distance']   == 150)echo 'selected' ?> >150</option>
                                   <option value="200" <?php if($old['distance']   == 200)echo 'selected' ?> >200</option>
                                   <option value="350" <?php if($old['distance']   == 350)echo 'selected' ?> >350</option>
                                   <option value="500" <?php if($old['distance']   == 500)echo 'selected' ?> >500</option>
                               </select>
                           </div>

                           <div class="col-lg-1.5">
                               <div class="align-middle">km</div>
                           </div>

                           <div class="col-lg-12 mt-3 mb-3">
                               <button  class="btn btn-light btn-block" type="submit" >Szukaj</button>
                           </div>

                           <?php if (app('mobile-detect')->isMobile()) : ?>
                           <div class="col-sm-12">
                           <div id="accordion">
                               <div class="card">
                                   <div class="card-header" id="headingOne">
                                           <button type="button" class="btn btn-link btn-sm btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Filtry
                                           </button>

                                   </div>

                                   <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                       <div class="card-body">
                                           <?php if($old['type'] != 1000): ?>
                                               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="custom-control custom-checkbox">
                                                       <input value="1" name="cat_<?php echo e($cat->id); ?>" type="checkbox" <?php if(isset($old['cat_'.$cat->id]) && $old['cat_'.$cat->id] == '1')echo 'checked'; ?> class="custom-control-input" id="customCheckDesktop<?php echo e($cat->id); ?>">
                                                       <label class="custom-control-label"  for="customCheckDesktop<?php echo e($cat->id); ?>"><?php echo e($cat->text); ?></label>
                                                   </div>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>

                                                   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <div class="dropdown">
                                                           <a style="cursor:pointer;white-space: normal" class="dropdown-toggle"  data-toggle="dropdown">
                                                               <?php echo e($cat->text); ?>

                                                               <span class="caret"></span></a>

                                                           <ul class="dropdown-menu">
                                                               <?php $__currentLoopData = $cat->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <a onclick="submitCategory(<?php echo e($child->id); ?>)" href="javascript:{}"><?php echo e($child->text); ?></a>
                                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                           </ul>
                                                       </div>

                                                       </li>

                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                           <?php endif; ?>

                                               <?php if($old['type'] == 100): ?>

                                                       <?php $__currentLoopData = $facility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <div class="custom-control custom-checkbox">
                                                               <input value="1" name="cat_<?php echo e($fac->id); ?>" type="checkbox" <?php if(isset($old['cat_'.$fac->id]) && $old['cat_'.$fac->id] == '1')echo 'checked'; ?> class="custom-control-input" id="customFacDesktop<?php echo e($fac->id); ?>">
                                                               <label class="custom-control-label" for="customFacDesktop<?php echo e($fac->id); ?>"><?php echo e($fac->text); ?></label>
                                                           </div>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                               <?php endif; ?>
                                           </div>
                                       </div>
                                   </div>
                               <?php if($textSubcategories ?? null): ?> <div class="col-lg-12 text-right ">
                                   Kategoria:<h5><?php echo e($textSubcategories->text ??'test'); ?></h5>

                               </div>
                               <?php endif; ?>
                               </div>
                           </div>
                           <?php else: ?>


                           <div class="col-lg-12" >
                               <hr>
                               <?php if($old['type'] != 1000): ?>
                               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="custom-control custom-checkbox">
                                       <input value="1" name="cat_<?php echo e($cat->id); ?>" type="checkbox" <?php if(isset($old['cat_'.$cat->id]) && $old['cat_'.$cat->id] == '1')echo 'checked'; ?> class="custom-control-input" id="customCheckDesktop<?php echo e($cat->id); ?>">
                                       <label class="custom-control-label"  for="customCheckDesktop<?php echo e($cat->id); ?>"><?php echo e($cat->text); ?></label>
                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php else: ?>

                                   <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <div class="dropdown" >
                                               <a style="cursor:pointer;white-space: normal" class="dropdown-toggle"  data-toggle="dropdown">
                                                   <?php echo e($cat->text); ?>

                                                   <span class="caret"></span></a>

                                               <ul class="dropdown-menu">
                                                   <?php $__currentLoopData = $cat->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <li><a onclick="submitCategory(<?php echo e($child->id); ?>)" href="javascript:{}"><?php echo e($child->text); ?></a></li>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               </ul>
                                           </div>

                                       </li>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               <?php endif; ?>


                           </div>

                           <?php if($old['type'] == 100): ?>
                           <div class="col-lg-12 mt-3" >
                           <?php $__currentLoopData = $facility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="custom-control custom-checkbox">
                                   <input value="1" name="cat_<?php echo e($fac->id); ?>" type="checkbox" <?php if(isset($old['cat_'.$fac->id]) && $old['cat_'.$fac->id] == '1')echo 'checked'; ?> class="custom-control-input" id="customFacDesktop<?php echo e($fac->id); ?>">
                                   <label class="custom-control-label" for="customFacDesktop<?php echo e($fac->id); ?>"><?php echo e($fac->text); ?></label>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                           <?php endif; ?>
                           <?php endif; ?>
                       </div>
                    </div>
                </div>
                </form>
            </div>

            <?php endif; ?>
            <div class="col-lg-8">
        <?php if($list): ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3 hoverEffect" style="min-height: 150px;">

                    <a href="<?php echo e(route('talent',$l->slug)); ?>" style="pointer:cursor;color:black;text-decoration: none;">
                    <div class="row">

                        <div style="min-height: 100px;" class="col-md-3 text-center align-content-center">
                            <img style="max-width: 150px;" src="<?php echo e(!empty($l->allphotos[0]) ? 'images/adverts/'.$l->allphotos[0]->url : 'image/default-image.png'); ?>" class="img" >
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                <h5 class="card-title"><?php echo e($l->title); ?></h5>

                                        <p class="card-text"><?php echo e($l->text); ?></p>
                                    </div>
                                    <div class="row">
                                <h5 class="col-md-12"><?php echo e($l->price); ?> zł</h5>
                                    <div class="col-md-12" >
                                        <div class="endline"></div>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    </a>
                </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function triggerChild(e){
                if($('#childContainer',e).is(":visible")){
                    $('.child-container').hide();
                    }
                    else{
                    $('.child-container').hide();
                        $('#childContainer',e).show();
                    }
                }

        function submitCategoryEvent(e){
            if($('#city').val() != '' && $('#hiddenCity').val() != ''){document.getElementById('searchForm').submit();}
            else {
                $('small').hide();
                $('.invalid-tooltip').text('Proszę najpierw wpisać i wybrać miasto z listy')
                $('#city').addClass('is-invalid')

            }

        }

        function submitCategory(id) {
            $('#subcategory').val(id)
            if($('#city').val() != '' && $('#hiddenCity').val() != ''){document.getElementById('searchForm').submit();}
            else {
                $('small').hide();
                $('.invalid-tooltip').text('Proszę najpierw wpisać i wybrać miasto z listy')
                $('#city').addClass('is-invalid')

            }

        }

    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/advert/publicList.blade.php ENDPATH**/ ?>