<?php //var_dump($clients); die; ?>
<section id="our-team" class="mt-3">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Event <span class="color">Terbaru</span></h2>
				<div class="border"></div>
			</div>
			<?php foreach ($events as $key => $event) : ?>
				<article class="col-md-4 col-sm-6 col-xs-12 clearfix wow fadeInUp" data-wow-duration="500ms">
					<div class="post-block">
						<div class="media-wrapper">
							<img src="<?= $event->image ?>" alt="amazing caves coverimage" class="img-responsive">
						</div>
						
						<div class="content">
							<h3><a href="<?= site_url('visitor/news/article/') . $event->file_content ?>"><?= $event->title ?></a></h3>
							<p><?= $event->preview ?></p>
							<a class="btn btn-transparent" href="<?= site_url('visitor/news/article/') . $event->file_content ?>">Read more</a>
						</div>
					</div>						
				</article>
			<?php endforeach; ?>
		</div>  	<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<!--
Start Call To Action
==================================== -->
<section class="call-to-action carbon overly">
	<div class="container">
		<div class="row " >
			<div class="col-lg-12">
				<div class="title text-center">
					<h2 style="color: white;">Klien<span class="color"> Kami</span></h2>
					<div class="border"></div>
				</div>
			</div>
		</div>
		<div id="clients" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
			<?php foreach ($clients as $key => $client) : ?>
			<div class="item" style="margin: 0 1em;">
				<div class="">
					<img src="<?= $client->image ?>" class="img-responsive" alt="<?= $client->name ?>" style="max-height: 200px !important;">
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<section class="portfolio" id="portfolio">
	<div class="container">
		<div class="row portfolio-items-wrapper">
		</div>
	</div>	<!-- end container -->
</section>   <!-- End section -->