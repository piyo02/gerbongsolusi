            <div class="content mt-5 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="text-center">
                                <h4 class="text-white">Tentang Kami</h4>
                                <h6 class="text-secondary" style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quaerat sint, cum optio iure officia alias in eius ducimus hic quidem doloremque corrupti!</h6 style="font-size: 12px;">
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col-lg-4 col-sm-12">
                                <div class="col-8 text-center mb-5">
                                    <svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                                                <image xlink:href="<?= base_url('users-assets/') ?>image/logo-gsm.png" x="10" y="20" width="80"/>
                                            </pattern>
                                        </defs>
                                        <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                                    </svg>
                                    <h6 class="text-danger font-weight-bolder">Gerbong Solusi</h6>
                                    <h5 class="text-white font-weight-bolder">Management</h5>
                                </div>
                                <div class="col-12">
                                    <?php foreach ($contacts as $key => $contact) : ?>
                                        <div class="col-12 mb-2 text-white">
                                            <img src="<?= $contact->image ?>" alt="<?= $contact->icon_name ?>" width="25px">
                                            <?= $contact->contact ?>
                                        </div>
                                    <?php endforeach ?>
                                        <div class="col-12 mb-2 text-white">
                                            <img src="<?= base_url('users-assets/icon/')?>mark-point.png" alt="address" width="25px">
                                            <?= $company->address ?>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $file_content ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="col-12 text-center">
                                <h3 class="text-white font-weight-bolder">Visi</h3>
                            </div>
                            <div class="media">
                                <div class="row">
                                    <div class="col-2">
                                        <img id="icon-mission" src="<?= base_url('users-assets/') ?>icon/icon-mission.png" alt="" width="100%">
                                    </div>
                                    <div class="col-10 text-white">
                                        <div class="media-body text-justify">
                                            <?= $company->perspective ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="col-12 text-center">
                                <h3 class="text-white font-weight-bolder">Misi</h3>
                            </div>
                            <div class="media">
                                <div class="row">
                                    <div class="col-10 text-white">
                                        <div class="media-body text-justify">
                                            <?= $company->objectif ?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img id="icon-vision" src="<?= base_url('users-assets/') ?>icon/target.png" alt="" width="100%">
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
