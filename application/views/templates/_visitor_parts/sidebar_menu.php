<!-- 
  Fixed Navigation
  ==================================== -->
    <header id="navigation" class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
              <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->
    
                <!-- logo -->
                <a class="navbar-brand logo" href="#body">
                    <img src="<?= base_url('users-assets/') ?>images/logo.png" alt="Website Logo"/ style="width: 70px !important;">
                </a>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav navigation-menu">
            <?php
                function print_menus( $datas )
                {
                    foreach( $datas as $data )
                    {
                        if( ( !$data->status )  ) continue;

                        if( !empty( $data->branch )  )
                        {
                            ?>
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
                        }else{
                            ?>
                                <li>
                                    <a id="<?php echo $data->list_id ?>" href="<?= site_url( $data->link_visitor ) ?>"><?= $data->name ?></a>
                                </li>
                            <?php
                        }
                    }
                }
            
                print_menus( $_menus );
            ?>
            <?php if ($this->session->identity == null) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth/') ?>login" class="btn btn-sm btn-outline-primary nav-link ml-3">Login</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="<?= site_url().$this->ion_auth->group( $this->ion_auth->user()->row()->group_id )->row()->name ?>" class="btn btn-sm btn-default nav-link">Dashboard</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
        <!-- /main nav -->
  
      </div>
  </header>
  <!--
  End Fixed Navigation
  ==================================== -->

        <script type="text/javascript">
            function menuActive(id) {
                id = id.trim();
                // console.log( id );
                // // console.log(a = document.getElementById(id.trim()));
                a = document.getElementById(id.trim())
                // // // var a =document.getElementById("menu").children[num-1].className="active";
                // // var a = document.getElementById(id.trim());
                // // console.log(a.parentNode.parentNode);
                a.classList.add("active");
                // b = a.parentNode.parentNode.parentNode;
                // b.classList.add("menu-open");
                // b.children[0].classList.add("active");
                // // console.log( b.children[0] );
                // // document.getElementById(id).classList.add("active");

            }
        </script>