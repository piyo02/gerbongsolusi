<section id="services" class="bg-one about">
	<div class="container mt-20">
		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12 wow fadeInUp">
				<article class="wow fadeInUp" data-wow-duration="500ms">
					<div class="block" >							
						<div class="content">
							<div class="text-center" style="margin-bottom: 2rem">
								<h4><?= $article->title ?></h4>
								<div class="border"></div>
							</div>
							<div class="row">
								<div id="galleries" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
									<?php foreach ($galleries as $key => $gallery) : ?>
										<div class="team-member">
											<div class="member-photo">
												<img class="img-responsive" src="<?= $gallery->image ?>" alt="Meghna">
												<div class="mask">
													<ul class="list-inline" id="mask-hero">
														<h4 id="text-slider" >
															<a href="#">
																<?= $gallery->thumbnail ?>
															</a>
														</h4>
													</ul>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<?= $file_content ?>
						</div>
					</div>
				</article>

				<article class="wow fadeInUp" data-wow-duration="500ms">
					<div class="block">							
						<div class="content">
							<div class="text-center" style="margin-bottom: 2rem">
								<h4>Kome<span class="color">ntar</span></h4>
								<div class="border"></div>
							</div>

							<!-- form komentar -->

							<div class="content">
								<form method="post" action="" >
									<div class="form-group">
										<input type="hidden" class="form-control" name="event_id" id="event_id" value="<?= $article->id ?>">
										<input type="hidden" class="form-control" name="comment_id" id="comment_id" value="NULL">
										<input type="text" placeholder="Tulis Komentar..." class="form-control" name="message" id="message">
									</div>
									<?php if( $this->session->userdata('visitor_id') ) :  
											$display_send = 'block';
											$display_gsign = 'none';
										  else :
											$display_send = 'none';
											$display_gsign = 'block';
										  endif; ?>
									<button type="submit" id="btn-comment" class="btn-comment btn btn-sm btn-primary" style="display: <?= $display_send ?>;">Kirim</button>
									<div class="g-signin2 btn-onSignIn" data-onsuccess="onSignIn" id="btn-onSignIn" style="display: <?= $display_gsign ?>;"></div>
								</form>
							</div>

							<!-- end form komentar -->
					<?php
						function print_comment( $datas, $branch = false )
						{
							if( $branch ) $style = 'style="margin-left: 1rem !important;"';
							else $style = '';

							foreach( $datas as $data ) :
							 ?>
						<div class="media" <?= 1 //$style ?>>
							<div class="row">
								<div class="col-md-1 col-sm-1 col-xs-1" style="padding: 0 !important;">
									<img src="<?= $data->image ?>" width="100%" alt="<?= $data->username ?>" style="border-radius: 0.3rem !important; margin-left: 2rem;">
								</div>
								<div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 2rem;">
									<div class="media-body">
										<h5 style="margin: 0 !important;" ><?= $data->username ?></h5>
										<p style="margin: 0 !important" ><?= $data->message ?></p>
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#comment_<?= $data->id ?>" style="padding: 0.2rem !important; border-radius: 0.3rem !important;">
											Balas
										</button>
										<?php	if( !empty( $data->branch )  )
										{
											print_comment( $data->branch, 1 );
										}?>
									</div>
								</div>
							</div>
						</div>
						<?php	
							endforeach;
							}				
						print_comment( $comments );
					?>
						</div>
					</div>
				</article>
			</div>
            
			<article class="col-md-3 col-sm-12 col-xs-12 wow fadeInUp mt-5" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="content">
					<div class="title text-center" style="margin-top: -4rem;">
						<h4>Berita <span class="color">Terpopuler</span></h4>
						<div class="border"></div>
					</div>
					<!-- single blog post -->
					<?php foreach ($news as $key => $new) : ?>
					<article class="col-md-12 col-sm-4 col-xs-6 clearfix wow fadeInUp" data-wow-duration="500ms">
						<div class="post-block">
							<div class="media-wrapper">
								<img src="<?= $new->image ?>" alt="amazing caves coverimage" class="img-responsive">
							</div>
							
							<div class="content">
								<h5><a href="<?= $new->file_article ?>"><?= $new->title ?></a></h5>
							</div>
						</div>						
					</article>
					<?php endforeach; ?>
					<!-- /single blog post -->
				</div>
			</article>
		</div>
	</div> 
</section>
<?php foreach ($comment_list as $key => $comment) : ?>
<div class="modal fade" id="comment_<?= $comment->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="content">
			<form method="post" action="" >
				<div class="form-group">
					<input type="hidden" class="form-control" name="event_id" id="event_id" value="<?= $comment->event_id ?>">
					<input type="hidden" class="form-control" name="comment_id" id="comment_id" value="<?= $comment->comment_id ?>">
					<input type="text" placeholder="Tulis Komentar..." class="form-control" name="message" id="message">
				</div>
		</div>
      </div>
      <div class="modal-footer">

				<div class="g-signin2 btn-onSignIn" data-onsuccess="onSignIn" style="display: <?= $display_gsign ?>;"></div>
				<button type="submit" class="btn-comment btn btn-sm btn-primary" style="display: <?= $display_send ?>;">Kirim</button>
			</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<div class="sharethis-inline-share-buttons"></div>

<!-- rgb(115, 127, 138); -->
<section class="portfolio" id="portfolio">
	<div class="container">
		<div class="row portfolio-items-wrapper">
		</div>
	</div>
</section>

<script>
	function onSignIn(googleUser) {
		var profile = googleUser.getBasicProfile();

		var v_username = profile.getName();
		var v_image = profile.getImageUrl();
		var v_email = profile.getEmail();

		console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		console.log('Name: ' + profile.getName());
		console.log('Image URL: ' + profile.getImageUrl());
		console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

		$.ajax({
            type: 'POST', //method
            url: '<?= base_url('visitor/news/google_sign') ?>', //action
            data: {
                username: v_username,
                email: v_email,
                image: v_image
            }, //data yang dikrim ke action $_POST['id']
            dataType: 'json',
            async: false,
            success: function(data) {
				var btn_comments = document.getElementsByClassName('btn-comment');
				var btn_onSignIns = document.getElementsByClassName('btn-onSignIn');

				console.log(btn_comments.length);
				console.log(btn_onSignIns.length);
				
				for (let index = 0; index < btn_comments.length; index++) {
					const btn_comment = btn_comments[index];
					const btn_onSignIn = btn_onSignIns[index];
					btn_comment.setAttribute('style', 'display: block');
					btn_onSignIn.setAttribute('style', 'display: none');
				}
            }
        });
	}

</script>
