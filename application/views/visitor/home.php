<?php //var_dump($clients); die; ?>
<section id="our-team" class="mt-3">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Event <span class="color">Terbaru</span></h2>
				<div class="border"></div>
			</div>
			<?php foreach ($events as $key => $event) : ?>
				<div class="col-md-4 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms">
					<div class="team-member">
						<div class="member-photo">
							<img class="img-responsive" src="<?= $event->image ?>" alt="Meghna">
							<div class="mask">
								<ul class="list-inline">
									<h4>
										<a href="<?= site_url('visitor/news/article/') . $event->file_content ?>">
											<?= $event->title ?>
										</a>
									</h4>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>  	<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-1 overly">
	<div class="container">
		<div class="row " >
			<div class="col-lg-12">
				<div class="title text-center">
					<h2>Klien<span class="color"> Kami</span></h2>
					<div class="border"></div>
				</div>
			</div>
		</div>
		<div id="clients" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
			<?php foreach ($clients as $key => $client) : ?>
			<div class="item" style="margin: 0 1em;">
				<div class="">
					<img src="<?= $client->image ?>" class="img-responsive" alt="<?= $client->name ?>">
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