		<footer id="footer" class="bg-one">
			<div class="container">
			    <div class="row wow fadeInUp" data-wow-duration="500ms">
					<div class="col-lg-12">
						
						<div class="social-icon">
							<ul class="list-inline">
							<?php foreach ($footers as $key => $footer) : ?>
								<li><a href="<?= $footer->contact ?>"><i class="<?= $footer->icon ?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
						</div>

						<div class="copyright text-center">
							<p>Theme Gerbong Solusi Management.
								<br>.Technoindo.
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<div id="scroll-up">
			up
		</div>
		
	    
		
		
		
		
		
		
		


		<!-- 
		Essential Scripts
		=====================================-->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/jquery/dist/jquery.min.js"></script>
			
		<!-- Main jQuery -->
		<!-- Bootstrap 3.1 -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Slick Carousel -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/slick-carousel/slick/slick.min.js"></script>
		<!-- Portfolio Filtering -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/mixitup/dist/mixitup.min.js"></script>
		<!-- Smooth Scroll -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
		<!-- Magnific popup -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<!-- Google Map API -->
		<!-- <script type="text/javascript"  src="<?= base_url('users-assets/')?>http://maps.google.com/maps/api/js?sensor=false"></script> -->
		<!-- Sticky Nav -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/Sticky/jquery.sticky.js"></script>
		<!-- Number Counter Script -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/count-to/jquery.countTo.js"></script>
		<!-- wow.min Script -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>plugins/wow/dist/wow.min.js"></script>
		<!-- Custom js -->
		<script type="text/javascript" src="<?= base_url('users-assets/')?>js/script.js"></script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>		
    </body>
</html>
