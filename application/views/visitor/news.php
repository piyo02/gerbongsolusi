            <div class="content mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3 row " >
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <img src="<?= base_url('users-assets/') ?>image/event-1.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="carousel-item active">
                                            <img src="<?= base_url('users-assets/') ?>image/event-2.jpg" class="d-block w-100" alt="name">
                                            <div id='main-slider' class="carousel-caption d-none d-block mr-5">
                                                <p>Cocok nih buat liburan di akhir pekan. Murah meriah dan pemandangannya juara!</p>
                                            </div>
                                        </div>
                                        <!-- <img src="<?= base_url('users-assets/') ?>image/event-2.jpg" width="18rem" class="card-img-top" alt="..."> -->
                                    </div>
                                    <div class="col-6">
                                        <img src="<?= base_url('users-assets/') ?>image/event-3.jpg" width="18rem" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <img src="<?= base_url('users-assets/') ?>image/event-4.jpg" width="18rem" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <img src="<?= base_url('users-assets/') ?>image/event-5.png" width="18rem" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col-lg-9 col-sm-12 mb-5">
                                <div class="card" style="background-color: rgba(104, 104, 104, 0.8);">
                                    <div class="card-body">
                                        <?php foreach( $news as $key => $new ) : ?>
                                        <div class="row mb-3">
                                            <div class="col-lg-4 col-sm-12 mb-2">
                                                <img src="<?= $new->image ?>" alt="" width="100%">
                                            </div>
                                            <div class="col-lg-8 col-sm-12">
                                                <div class="event">
                                                    <a href="<?= $current_page . 'article/' . $new->file_content ?>"><h5><b><?= $new->title ?></b></h5></a>
                                                    <div>
                                                        <span style="font-size: 0.8em;" class="mr-2 text-white">Gerbong Solusi Management</span>
                                                        <span style="font-size: 0.8em;" class="text-white"><?= date('d M Y', strtotime($new->date)) ?></span>
                                                    </div>
                                                    <p><?= $new->preview ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Event Terpopuler</h5>
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
                                <div class="card mt-3">
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