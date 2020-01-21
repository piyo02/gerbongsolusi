            <div class="content mb-5">
                <div class="container">
                    <div class="row">
                        <div class="row col-12">
                            <div class="col-lg-9 col-sm-12 mb-5">
                                <div class="card bg-light">
                                    <!-- style="background-color: rgba(104, 104, 104, 0.8);" -->
                                    <div class="card-body">
                                        <h3><?= $article->title ?></h3>
                                        <div class="row mb-3">
                                            <div class="col-lg-4 col-sm-12">
                                                <p style="font-size: 12px">Gerbong Solusi Management</p>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <p style="font-size: 12px"><?= date('d M Y', strtotime( $article->date )) ?></p>
                                            </div>
                                            <div class="col-12">
                                                <?= $article->hit . ' dilihat' ?>
                                            </div>
                                        </div>
                                        <?= $file_content ?>
                                        <!-- galeri -->
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php $i = 0; foreach ($galleries as $key => $gallery) : ?>
                                                    <?php if($i == 0) : ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                                                    <?php else : ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                                    <?php endif ?>
                                                <?php $i++; endforeach; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                                <?php $i = 0; foreach ($galleries as $key => $gallery) : ?>
                                                    <?php if($i == 0) : ?>
                                                        <div class="carousel-item active">
                                                            <img src="<?= $gallery->image ?>" class="d-block w-100" alt="<?= $gallery->name ?>">
                                                            <div class="carousel-caption d-none d-md-block">
                                                                <h4 class="font-weight-bolder text-black-50"><?= $gallery->thumbnail ?></h4>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="carousel-item">
                                                            <img src="<?= $gallery->image ?>" class="d-block w-100" alt="<?= $gallery->name ?>">
                                                            <div class="carousel-caption d-none d-md-block">
                                                                <h4 class="font-weight-bolder text-black-50"><?= $gallery->thumbnail ?></h4>
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

                                        <!-- comment -->
                                        <div class="mt-5">
                                            <h5>Komentar</h5>
                                        </div>
                                        <div class="media mt-5">
                                            <img src="..." class="mr-3" alt="...">
                                            <div class="media-body">
                                                <h5 class="mt-0">Media heading</h5>
                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                                <div class="media mt-3">
                                                    <a class="mr-3" href="#">
                                                        <img src="..." class="mr-3" alt="...">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Media heading</h5>
                                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Event Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= base_url('users-assets/') ?>image/1.png" alt="" width="50px">
                                            </div>
                                            <div class="col-9">
                                                <div class="last-event">
                                                    <a href="#"><h6><b>Judul Event</b></h6></a>
                                                    <p style="font-size: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                            <hr class="w-100">
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= base_url('users-assets/') ?>image/2.png" alt="" width="50px">
                                            </div>
                                            <div class="col-9">
                                                <div class="last-event">
                                                    <a href="#"><h6><b>Judul Event</b></h6></a>
                                                    <p style="font-size: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                            <hr class="w-100">
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= base_url('users-assets/') ?>image/3.png" alt="" width="50px">
                                            </div>
                                            <div class="col-9">
                                                <div class="last-event">
                                                    <a href="#"><h6><b>Judul Event</b></h6></a>
                                                    <p style="font-size: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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