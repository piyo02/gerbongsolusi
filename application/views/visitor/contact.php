<!-- Srart Contact Us
=========================================== -->		
<section id="contact-us" class="section-bg">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeIn" data-wow-duration="500ms">
				<h2>Tertarik? "Let's Take Action With Us!"</h2>
				<div class="border"></div>
				<h3>Kontak <span class="color">Kami</span></h3>
			</div>
			
			<div class="contact-info col-md-6 wow fadeInUp" data-wow-duration="500ms">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 20%;">
						<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<defs>
								<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
									<image xlink:href="<?= base_url('users-assets/') ?>images/logo.png" x="10" y="22" width="80" />
								</pattern>
							</defs>
							<polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
						</svg>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<h3 class="color">Gerbong Solusi</h3>
						<h3 id="management">Management</h3>
					</div>
				</div>
				<div class="contact-details mt-3">
					<div class="con-info clearfix">
						<i class="tf-map-pin"></i>
						<span>Khaja Road, Bayzid, Chittagong, Bangladesh</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-telephone-outline"></i>
						<span>Phone: +880-31-000-000</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-iphone"></i>
						<span>Fax: +880-31-000-000</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-email-outline"></i>
						<span>Email: hello@meghna.com</span>
					</div>
				</div>
			</div>
				
			<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
				<form id="contact-form" method="post" action="sendmail.php" role="form">
				
					<div class="form-group">
						<input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
					</div>
					
					<div class="form-group">
						<input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
					</div>
					
					<div class="form-group">
						<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
					</div>
					
					<div class="form-group">
						<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>	
					</div>
					
					<div id="mail-success" class="success">
						Thank you. The Mailman is on His Way :)
					</div>
					
					<div id="mail-fail" class="error">
						Sorry, don't know what happened. Try later :(
					</div>
					
					<div id="cf-submit">
						<input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
					</div>						
					
				</form>
			</div>
		
		</div>
	</div>
	
	<!-- <div class="google-map">
		<div id="map-canvas"></div>
	</div>	 -->
	
</section>