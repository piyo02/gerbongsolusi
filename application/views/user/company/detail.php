<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark"><?php echo $block_header ?></h5>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <?php
                        echo $alert;
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5>
                                <?php echo strtoupper($header) ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
          <div class="card">
            <div class="card-body">
              <!--  -->
                <?php echo (isset($contents)) ? $contents : '';  ?>
                <div>
                    <a href="<?php echo site_url('user/company/edit') ?>" class="btn btn-sm btn-primary waves-effect">Edit</a>
                </div> 
              <!--  -->
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="row clearfix">
                <div class=" col-md-12 ">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Logo Perusahaan</label>
                            <?php if( $logo ) : ?>
                            <div class="mb-2 ml-1">
                                <img class="img-fluid" src="<?= $logo ?>" alt="User" />
                            </div>
                            <?php else : ?>
                              <div class="mb-2 ml-1">
                                <img class="img-fluid" src="<?php echo base_url('assets/')?>img/user.png" alt="User" />
                            </div>
                            <?php endif; ?>
                            <?= $btn_edit ?>
                        </div>
                    </div>
                </div>
                <div class=" col-md-12 ">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Kontak Perusahaan</label>
                            <div>
                                <?php foreach ($contacts as $key => $contact) : ?> 
                                    <div class="col-12 mb-2">
                                        <img src="<?= $contact->image ?>" alt="<?= $contact->icon_name ?>" width="25px">
                                        <?= $contact->contact ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?= $btn_contact ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>