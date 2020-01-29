<section id="our-team" class="mt-3">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Team <span class="color">Kami</span></h2>
				<div class="border"></div>
			</div>
			<!-- CEO -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-center mb-3">
				<!-- <div class="col-md-9">
					<div class="team-member">
						<div class="member-meta" style="height: 296.667px !important">
							<h2>TEAM</h2>
						</div>
					</div>
				</div> -->
				<?php foreach ($teams[0] as $key => $employee) :?>
				<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms">
					<div class="team-member">
						<div class="member-photo">
							<img class="img-responsive" src="<?= $employee->image ?>" alt="Meghna">
							<!-- <div class="mask"></div> -->
						</div>
						<div class="member-meta">
							<h4><?= $employee->name ?></h4>
							<span><?= $employee->position ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- END CEO -->
			
			<!-- officer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php $i = 1;  foreach ($teams[1] as $key => $employee) :?>
				<?php if( ($i-1) % 4 == 0 ) : ?>
					<div class="container">
						<div class="row">
				<?php endif; ?>

				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
					<div class="team-member">
						<div class="member-photo">
							<img class="img-responsive" src="<?= $employee->image ?>" alt="Meghna">
							<!-- <div class="mask"></div> -->
						</div>
						<div class="member-meta">
							<h4><?= $employee->name ?></h4>
							<span><?= $employee->position ?></span>
						</div>
					</div>
				</div>
				<?php if( ($i) % 4 == 0 ) : ?>
						</div>
					</div>
				<?php endif; ?>
				<?php $i++; endforeach; ?>
			</div>
			<!-- end officer -->
		</div>
	</div>
</section>
<!-- 521 -->
<!-- 478 -->