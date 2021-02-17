
<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">

					<ul class="list-unstyled quick-links">
						<li><a href="/"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="<?php echo e(route('publicList',['type'=>10])); ?>"><i class="fa fa-angle-double-right"></i>Baza Talentów</a></li>
						<li><a href="<?php echo e(route('publicList',['type'=>100])); ?>"><i class="fa fa-angle-double-right"></i>Baza Noclegów</a></li>
						<li><a href="<?php echo e(route('publicList',['type'=>1000])); ?>"><i class="fa fa-angle-double-right"></i>Baza Firm</a></li>

					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">

					<ul class="list-unstyled quick-links">
						<li><a href="<?php echo e(route('tabs','Kontakt')); ?>"><i class="fa fa-angle-double-right"></i>Kontakt</a></li>
						<li><a href="<?php echo e(route('tabs','Regulamin')); ?>"><i class="fa fa-angle-double-right"></i>Regulamin</a></li>
						<li><a href="<?php echo e(route('tabs','Polityka-prywatności')); ?>"><i class="fa fa-angle-double-right"></i>Polityka prywatności</a></li>
						<li><a href="<?php echo e(route('tabs','Cennik')); ?>"><i class="fa fa-angle-double-right"></i>Cennik</a></li>
						<li><a href="<?php echo e(route('tabs','Jak-utworzyć-reklamę')); ?>"><i class="fa fa-angle-double-right"></i>Jak utworzyć reklamę?</a></li>
                        <li><a href="<?php echo e(route('tabs','Redakcja')); ?>"><i class="fa fa-angle-double-right"></i>Redakcja / wesprzyj redakcję</a></li>
                        <li><a href="<?php echo e(route('tabs','Reklama-Patronat')); ?>"><i class="fa fa-angle-double-right"></i>Reklama/Patronat</a></li>
                        <li><a href="<?php echo e(route('tabs','Obowiązek-informacyjny')); ?>"><i class="fa fa-angle-double-right"></i>Obowiązek informacyjny</a></li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-4 col-md-4">
					<ul class="list-unstyled quick-links">
						<img width=80 src="/image/PAYU_LOGO_WHITE.png">
					</ul>
				</div>

			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.facebook.com/mixportalonline/?ref=py_c"><i class="fa fa-facebook"></i></a></li>
						<!--<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="mailto:redakcja@mixportal.pl" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					</ul>
				</div>

				<hr>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">© All rights reserved 2020<a class="text-green ml-2" href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name')); ?></a></p>
				</div>
				<hr>
			</div>
		</div>
	</section>

<?php /**PATH /home/informackr/www/resources/views/layouts/footer.blade.php ENDPATH**/ ?>