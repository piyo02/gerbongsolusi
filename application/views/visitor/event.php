<!-- Start Services Section
==================================== -->

<section id="services" class="bg-one">
	<div class="container mt-20">
		<div class="row">
            <!-- Single Service Item -->
			<article class="col-md-9 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
				<div class="service-block clearfix">
					<div class="title text-center" style="margin-top: -4rem;">
						<h2>Ev<span class="color">ent</span></h2>
						<div class="border"></div>
					</div>
					<?php foreach ($events as $key => $event) : ?>
					<!-- single blog post -->
					<article class="col-12 clearfix wow fadeInUp" data-wow-duration="500ms">
						<div class="post-block img-rounded">
							<div class="row">
								<div class="col-md-4">
									<div class="media-wrapper">
									<img src="<?= $event->image ?>" alt="amazing caves coverimage" class="img-responsive" style="padding: 1em;">
								</div>
								</div>
								<div class="col-md-8">
									<div class="content">
										<h3><a href="<?= $event->file_article ?>"><?= $event->title ?></a></h3>
										<p><?= $event->preview ?></p>
									</div>	
								</div>
							</div>
						</div>					
					</article>
					<!-- /single blog post -->
					<?php endforeach; ?>
				</div>
			</article>
            <!-- End Single Service Item -->
            
            <!-- Single Service Item -->
			<article class="col-md-3 col-sm-12 col-xs-12 wow fadeInUp mt-5" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="content">
					<div class="title text-center" style="margin-top: -4rem;">
						<h4>Berita <span class="color">Terpopuler</span></h4>
						<div class="border"></div>
					</div>
					<!-- single blog post -->
					<?php foreach ($popular_event as $key => $event) : ?>
					<article class="col-md-12 col-sm-4 col-xs-6 clearfix wow fadeInUp" data-wow-duration="500ms">
						<div class="post-block">
							<div class="media-wrapper">
								<img src="<?= $event->image ?>" alt="amazing caves coverimage" class="img-responsive">
							</div>
							
							<div class="content">
								<h5><a href="<?= $event->file_article ?>"><?= $event->title ?></a></h5>
							</div>
						</div>						
					</article>
					<?php endforeach; ?>
					<!-- /single blog post -->
				</div>
			</article>
            <!-- End Single Service Item -->
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<section class="portfolio" id="portfolio">
	<div class="container">
		<div class="row portfolio-items-wrapper">
		</div>
	</div>	<!-- end container -->
</section>   <!-- End section -->