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
                            <div class="col-lg-3 col-sm-12">
                                <div class="col-8 text-center">
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

                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="media">
                        <div class="row">
                            <div class="col-lg-2 col-sm-12 order-sm-2">
                                <img src="<?= base_url('users-assets/') ?>icon/icon-mission.png" alt="" width="100%">
                            </div>
                            <div class="col-lg-10 col-sm-12 text-white order-sm-1">
                                <div class="media-body">
                                    <h5 class="mt-0">Center-aligned media</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
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

    <script src="<?= base_url('users-assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
    </script>