<style>
	#map {
		height: 400px;  /* The height is 400 pixels */
		width: 100%;  /* The width is the width of the web page */
	}
</style>
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
						<span>JL. H.SUPU YUSUF NO.1 KENDARI <p style="margin-bottom: -1rem; color: #fff !important;"><a data-toggle="modal" data-target="#mapbox"><b>Lihat di map</b></a></p> </span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-telephone-outline"></i>
						<span>Phone: 0811 4033 666 &nbsp -- &nbsp  0811 407 271</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-email-outline"></i>
						<span>Email: gerbongsolusimanagementkendari@gmail.com</span>
					</div>
				</div>
			</div>
				
			<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
				<form method="post" action="<?= site_url('visitor/contact/sendEmail') ?>">
					<div class="form-group">
						<input type="text" placeholder="Nama Lengkap" class="form-control" name="name" id="name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Alamat email" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
					</div>
					<div class="form-group">
						<textarea rows="6" placeholder="Pesan Kamu..." class="form-control" name="message" id="message"></textarea>	
					</div>
					<div>
						<input type="submit" class="btn btn-transparent" value="Submit">
					</div>						
					
				</form>
			</div>
		
		</div>
	</div>
	
	
</section>

<script>
	function initMap() {
		var location = {lat: -3.981716, lng: 122.518213};
		var map = new google.maps.Map(
			document.getElementById('map'), {zoom: 20, center: location});
		var marker = new google.maps.Marker({position: location, map: map});
	}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpwOReXtbD4afdar9LWvwtRF9G6J5QVpE&callback=initMap">
</script>


<div class="modal fade" id="mapbox" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
				<div id="map"></div>
			</div>
        </div>
    </div>
</div>
