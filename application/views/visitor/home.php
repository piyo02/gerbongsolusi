        <div class="container-fluid">
            <div class="content">
                <div class="container">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="col-6 text-center mb-5">
                                        <svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                                                    <image xlink:href="<?= base_url('users-assets/') ?>image/logo-gsm.png" x="10" y="20" width="80"/>
                                                </pattern>
                                            </defs>
                                            <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                                        </svg>
                                        <h6 class="text-danger font-weight-bolder mt-2">Gerbong Solusi</h6>
                                        <h5 class="text-white font-weight-bolder">Management</h5>

                                        <img src="<?= base_url('uploads/logo/eo.png') ?>" alt="logo-eo" class="mt-5">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 mt-3">
                                    <!-- <div class="col-8"> -->
                                        <!-- galeri -->
                                        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php $i = 0; foreach ($events_most_popular as $key => $event) : ?>
                                                    <?php if($i == 0) : ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                                                    <?php else : ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                                    <?php endif ?>
                                                <?php $i++; endforeach; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                                <?php $i = 0; foreach ($events_most_popular as $key => $event) : ?>
                                                    <?php if($i == 0) : ?>
                                                        <div class="carousel-item active">
                                                            <div class="row justify-content-end">
                                                                <div class="col-lg-7 col-md-7 col-sm-12 order-sm-2 order-md-2">
                                                                    <div class="card">
                                                                        <img src="<?= $event->image ?>" class="d-block w-100" alt="<?= $event->image_old ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-12 order-sm-1 order-md-1">
                                                                    <!-- <div class="carousel-caption d-none d-block"> -->
                                                                        <a class="font-weight-bolder text-white" href="<?= site_url('visitor/news/article/') . $event->file_content ?>"><?= $event->title ?></a>
                                                                    <!-- </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="carousel-item">
                                                            <div class="row justify-content-end">
                                                                <div class="col-lg-7 col-md-7 col-sm-12 order-sm-2 order-md-2">
                                                                    <div class="card">
                                                                        <img src="<?= $event->image ?>" class="d-block w-100" alt="<?= $event->image_old ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-12 order-sm-1 order-md-1">
                                                                    <!-- <div class="carousel-caption d-none d-block"> -->
                                                                        <a class="font-weight-bolder text-white" href="<?= site_url('visitor/news/article/') . $event->file_content ?>"><?= $event->title ?></a>
                                                                    <!-- </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                <?php $i++; endforeach; ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <!-- galeri -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-5 mb-5 pt-5">
            <div id="new-event" class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="text-center">
                            <h3 class="text-white font-weight-bolder">Event Terbaru</h3>
                            <h6 class="text-secondary" style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quaerat sint, cum optio iure officia alias in eius ducimus hic quidem doloremque corrupti!</h6 style="font-size: 12px;">
                        </div>
                    </div>
                    <div class="row col-12">
                        <?php foreach ($events as $key => $event) :?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-lg-7 col-sm-12">
                                    <div class="card" style="width: 15rem;">
                                        <img src="<?= $event->image ?>" class="card-img-top" alt="" style="padding: 1px;">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-8">
                                    <a class="font-weight-bolder text-white" href="<?= site_url('visitor/news/article/') . $event->file_content ?>"><?= $event->title ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="content mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="text-center">
                                <h4 class="text-white">Klien Kami</h4>
                                <h6 class="text-secondary" style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quaerat sint, cum optio iure officia alias in eius ducimus hic quidem doloremque corrupti!</h6 style="font-size: 12px;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="container">
                                    <section class="customer-logos slider">
                                        <?php foreach ($clients as $key => $client) : ?>
                                        <div class="slide"><img src="<?= $client->image ?>"></div>
                                        <?php endforeach ?>
                                    </section>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- <div class="content">
        <div class="contaier">
            <footer class="main-footer">
                <strong>Copyright &copy; 2019 Gerbong Solusi Management</strong>
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 
                </div>
            </footer>
        </div>
    </div> -->