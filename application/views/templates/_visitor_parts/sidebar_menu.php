    <header id="navigation" class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#body">
                    <img src="<?= base_url('users-assets/') ?>images/logo.png" alt="Website Logo"/ style="width: 70px !important;">
                </a>
        </div>

        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav navigation-menu">
            <?php
                function print_menus( $datas )
                {
                    foreach( $datas as $data )
                    {
                        if( ( !$data->status )  ) continue;
                        if( !empty( $data->branch )  )
                        { ?>
                                <li class="dropdown mr-2">
                                    <a id="<?php echo $data->list_id ?>" class="text-white dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $data->name?>
                                    </a>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink" style="padding-left: 3rem !important;">
                                        <ul>
                                        <?php foreach ($data->branch as $key => $dropdown): ?>
                                            <li style="margin: 0.5rem 0 !important;">
                                                <a id="<?php echo $dropdown->list_id ?>" class="dropdown-item" href="<?= site_url( $dropdown->link_visitor ) ?>"><?php echo $dropdown->name?></a>
                                            </li>
                                        <?php endforeach ?>
                                        </ul>
                                        
                                    </div>
                                </li>
                            <?php 
                        }else { ?>
                                <li>
                                    <a id="<?php echo $data->list_id ?>" href="<?= site_url( $data->link_visitor ) ?>"><?= $data->name ?></a>
                                </li>
                  <?php }
                    }
                }
                print_menus( $_menus ); ?>
            <?php if ($this->session->identity == null) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth/') ?>login" class="btn btn-sm btn-default nav-link ml-3">Login</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="<?= site_url().$this->ion_auth->group( $this->ion_auth->user()->row()->group_id )->row()->name ?>" class="btn btn-sm btn-default nav-link">Dashboard</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
      </div>
  </header>

<script type="text/javascript">
    id = '<?= $menu_list_id ?>'
    id = id.trim()
    a = document.getElementById(id.trim())
    // console.log(a);
    a.classList.add("active");
</script>