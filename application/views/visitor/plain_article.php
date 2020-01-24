<section id="services" class="bg-one about">
	<div class="container mt-20">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp">
				<article class="wow fadeInUp" data-wow-duration="500ms">
					<div class="block" >							
						<div class="content">
							<div class="text-center" style="margin-bottom: 2rem">
								<h4><?= $article->title ?></h4>
								<div class="border"></div>
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
									<button type="submit" class="btn btn-sm btn-primary" disabled>Kirim</button>
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
									<img src="<?= base_url('uploads/users_photo/') . $data->image ?>" width="100%" alt="<?= $data->username ?>" style="border-radius: 0.3rem !important; margin-left: 2rem;">
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
            
			<article class="col-md-3 col-sm-3 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="service-block clearfix">
					<div class="title text-center" style="margin-top: -4rem;">
						<h4>Berita <span class="color">Terbaru</span></h4>
						<div class="border"></div>
					</div>
					<article class="col-12 clearfix wow fadeInUp" data-wow-duration="500ms">
						<div class="post-block img-rounded">
							<div class="row">
								<div class="col-md-4">
									<div class="media-wrapper">
										<img src="../images/blog/blog-post-1.jpg" alt="amazing caves coverimage" class="img-responsive" style="padding: 0.5em 0 0.5em 0.5em;">
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-justify" style="padding-right: 1em;"><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, vero.</a></h6>
								</div>
							</div>
						</div>					
					</article>
				</div>
			</article>
		</div>
	</div> 
</section>

<section class="portfolio" id="portfolio">
	<div class="container">
		<div class="row portfolio-items-wrapper">
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
					<input type="hidden" class="form-control" name="event_id" id="event_id" value="<?= $article->id ?>">
					<input type="hidden" class="form-control" name="comment_id" id="comment_id" value="NULL">
					<input type="text" placeholder="Tulis Komentar..." class="form-control" name="message" id="message">
				</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="text-black btn btn-primary">Kirim</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- rgb(115, 127, 138); -->