<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div style="width: 50%; margin: 0 auto;">
        <svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                    <image xlink:href="<?= base_url('users-assets/') ?>images/logo.png" x="10" y="22" width="80" />
                </pattern>
            </defs>
            <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
        </svg>
    </div>
    <h4 class="text-danger font-weight-bolder mt-2">Gerbong Solusi</h4>
    <h3 class="text-white font-weight-bolder" style="margin-top: -10px; font-size: 1.5rem;">Management</h3>
    <img src="<?= base_url('users-assets/') ?>images/eo.png" alt="logo-eo" class="mt-5">
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <!-- galeri -->
    <div id="jumbotron" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
        <?php foreach ($events as $key => $event) : ?>
            <div class="team-member">
                <div class="member-photo">
                    <img class="img-responsive" src="<?= $event->image ?>" alt="Meghna">
                    <div class="mask">
                        <ul class="list-inline">
                            <h4 id="text-slider" >
                                <a href="<?= site_url('visitor/news/article') . $event->file_content ?>">
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