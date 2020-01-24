<div class="row justify-content-center mt-3">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div id="jumbotron" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
            <?php foreach ($events as $key => $event) : ?>
                <div class="team-member">
                    <div class="member-photo">
                        <img class="img-responsive" src="<?= $event->image ?>" alt="Meghna">
                        <div class="mask">
                            <ul class="list-inline" id="mask-hero">
                                <h4 id="text-slider" >
                                    <a href="<?= site_url('visitor/news/article/') . $event->file_content ?>">
                                        <?= $event->title ?>
                                    </a>
                                </h4>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>