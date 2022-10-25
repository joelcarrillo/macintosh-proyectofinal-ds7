<header class="pc-header">
    <div class="header-wrapper">
        <div class="mr-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">

                    <div class="dropdown-menu pc-h-dropdown">

                        <a href="?op=perfil" class="dropdown-item">
                            <i data-feather="user"></i>
                            <span>Mi Perfil</span>
                        </a>
                        <div class="pc-level-menu">
                            <a href="#!" class="dropdown-item">
                                <i data-feather="menu"></i>
                                <span class="float-right"><i data-feather="chevron-right" class="mr-0"></i></span>
                                <span>Level2.1</span>
                            </a>
                            <div class="dropdown-menu pc-h-dropdown">
                                <a href="?op=perfil" class="dropdown-item">
                                    <i class="fas fa-circle"></i>
                                    <span>Mi Perfil</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="fas fa-circle"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="fas fa-circle"></i>
                                    <span>Support</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="fas fa-circle"></i>
                                    <span>Lock Screen</span>
                                </a>
                                <a href="?op=logout" class="dropdown-item">
                                    <i class="fas fa-circle"></i>
                                    <span>Cerrar sesión</span>
                                </a>
                            </div>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item"></a>
                        <i data-feather="life-buoy"></i>
                        <span>Support</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i data-feather="lock"></i>
                            <span>Lock Screen</span>
                        </a>
                        <a href="?op=logout" class="dropdown-item">
                            <i data-feather="power" name="botoncerrar"></i>
                            <span>Cerrar sesión</span>
                        </a>



                    </div>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <i data-feather="search"></i>
                                <input type="search" class="form-control border-0 shadow-none"
                                    placeholder="Search here. . .">
                            </div>
                        </form>
                    </div>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                    
                        <img src="public/images/users/<?php echo $_SESSION["foto"]; ?>" class="user-avtar">

                        <span>
                            <span class="user-name"><?php echo $_SESSION["user"]; ?></span>
                            <span class="user-desc">Administrator</span>
                        </span>
                    </a>
                    <br>
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                        <div class=" dropdown-header">
                            <h6 class="text-overflow m-0">Bienvenido/a !</h6>
                        </div>
                        <a href="?op=perfil" class="dropdown-item">
                            <i data-feather="user"></i>
                            <span>Mi Perfil</span>
                        </a>
                        <!--
                            <a href="#!" class="dropdown-item">
                                <i data-feather="settings"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i data-feather="life-buoy"></i>
                                <span>Support</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i data-feather="lock"></i>
                                <span>Lock Screen</span>
                            </a>
-->
                        <a href="?op=logout" class="dropdown-item">
                            <i data-feather="power"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</header>