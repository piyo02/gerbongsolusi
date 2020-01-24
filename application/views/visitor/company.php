<!--
		Start About Section
		==================================== -->
		<section class="bg-one about">
			<div class="container">
				<div class="row">
				
					<!-- section title -->
					<div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
						<h2>Tentang <span class="color">Kami</span> </h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
				</div> 		<!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->

<section class="section about-2 padding-0 bg-dark" id="about">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 padding-0 ">
				<img class="img-responsive" src="<?= base_url('users-assets/') ?>images/about/img-profile.jpg" alt="" width="100%">
			</div>
			<div class="col-md-7">
				<div class="content-block">
					<h2><b><?= $company->name ?></b></h2>
					<?= $file_content ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--
Start Call To Action
==================================== -->
<section class="call-to-action section-sm carbon overly about">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center wow fadeInUp" data-wow-duration="500ms" >
				<div class="block" >							
					<div class="icon-box">
						<img src="<?= base_url('users-assets/') ?>images/logo.png" alt="logo-eo" width="80%" style="margin-top: -2rem;">
						<!-- <i class="tf-ion-ios-glasses"></i> -->
					</div>					
					<div class="content text-center">
						<h3 class="ddd">Visi</h3>								
						<p><?= $company->perspective ?></p>
					</div>
				</div>
			</div> 
			<div class="col-md-6 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms">
				<div class="block">
					<div class="icon-box">
						<img src="<?= base_url('users-assets/') ?>images/logo.png" alt="logo-eo" width="80%" style="margin-top: -2rem;">
						<!-- <i class="tf-ion-jet"></i> -->
					</div>
					<div class="content text-center">
						<h3>Misi</h3>
						<p><?= $company->objectif ?></p>
					</div>
				</div>
			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->