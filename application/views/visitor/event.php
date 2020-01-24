<!-- Start Services Section
==================================== -->

<section id="services" class="bg-one">
	<div class="container mt-20">
		<div class="row">
            <!-- Single Service Item -->
			<article class="col-md-9 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
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
			<article class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="service-block clearfix">
					<div class="title text-center" style="margin-top: -4rem;">
						<h4>Berita <span class="color">Terpopuler</span></h4>
						<div class="border"></div>
					</div>
					<!-- single blog post -->
					<article class="col-12 clearfix wow fadeInUp" data-wow-duration="500ms">
						<div class="post-block img-rounded">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="media-wrapper">
										<img src="<?= base_url('users-assets') ?>/images/blog/blog-post-1.jpg" alt="amazing caves coverimage" class="img-responsive" style="padding: 0.5em 0 0.5em 0.5em;">
									</div>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<h6 class="text-justify" style="padding-right: 1em;"><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, vero.</a></h6>
								</div>
							</div>
						</div>					
					</article>
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