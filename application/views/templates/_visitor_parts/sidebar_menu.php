                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                    <?php
                        function print_menus( $datas )
                        {
                            foreach( $datas as $data )
                            {
                                if( ( !$data->status )  ) continue;

                                if( !empty( $data->branch )  )
                                {
                                    ?>
                                        <li class="nav-item dropdown mr-2">
                                            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $data->name?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <?php foreach ($data->branch as $key => $dropdown): ?>
                                                <a class="dropdown-item " href="<?= site_url( $dropdown->link_visitor ) ?>"><?php echo $dropdown->name?></a>
                                                <?php endforeach ?>
                                            </div>
                                        </li>
                                    <?php
                                }else{
                                    ?>
                                        <li class="nav-item mr-2">
                                            <a class="nav-link text-white" href="<?= site_url( $data->link_visitor ) ?>"><?= $data->name ?></a>
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
                            <a href="<?= site_url().$this->ion_auth->group( $this->ion_auth->user()->row()->group_id )->row()->name ?>" class="btn btn-default nav-link">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>