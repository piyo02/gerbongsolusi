<style>
  #map {
    height: 100%;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
            <div>
                <div class="content mt-5 mb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="text-center">
                                    <h4 class="text-white">Kontak</h4>
                                    <h6 class="text-secondary" style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quaerat sint, cum optio iure officia alias in eius ducimus hic quidem doloremque corrupti!</h6 style="font-size: 12px;">
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-lg-6 col-sm-12 mb-5">
                                    <div class="col-lg-4 col-sm-12 text-center" style="margin: auto;">
                                        <svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                                                    <image xlink:href="<?= base_url('users-assets/') ?>image/logo-gsm.png" x="10" y="20" width="80"/>
                                                </pattern>
                                            </defs>
                                            <polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
                                        </svg>
                                        <h5 class="text-danger font-weight-bolder">Gerbong Solusi</h5>
                                        <h5 class="text-white font-weight-bolder">Management</h5>
                                    </div>
                                    <div id="section-contact" class="col-12 row justify-content-center">
                                        <div class="col-2">
                                            <button type="button" class="btn">
                                                <img src="<?= base_url('users-assets/') ?>icon/gmail.png" alt="" height="40px">
                                            </button>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-2">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                                                <img src="<?= base_url('users-assets/') ?>icon/mark-point.png" alt="" height="40px">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-body col-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat email">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pesan Anda</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
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


  
  <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div id="map"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4-TBKVqXi0aF2U1-MtRe_y4tT9krvTNc&callback=initMap" async defer></script>
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