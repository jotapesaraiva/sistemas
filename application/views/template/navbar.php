<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- CORPO -->
<!-- <body class=""> -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- LOGO GESTAO A VISTA-->
            <div class="page-logo">
                <a href="<?php echo base_url('home'); ?>">
                    <!-- <img src="<?php echo base_url('assets/layouts/layout6/img/logo4.png'); ?>" alt="logo" class="logo-default" /> -->
                    <img src="<?php echo base_url('assets/img/SystemGate-white.png'); ?>" alt="logo" class="logo-default" width="80%"/>
                </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
            </div>
            <!-- MENU ABRI E FECHA RESPONSIVO -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- TOPO DA PAGINA -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                     <!-- OPCOES DO USUARIO -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <!-- <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" /> -->
                            <span class="username username-hide-on-mobile"> <?php echo username() ?> </span>
                            <!-- <i class="fa fa-angle-down"></i> -->
                        </a>
<!--                         <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="page_user_login_1.html">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul> -->
                    </li>

                    <!-- LOGOFF USUARIO -->
                    <li class="">
                        <?php echo anchor('login/logoff', '<i class="icon-logout"></i>'); ?>

                    </li>

                </ul>
            </div>
        </div>
    </div>

<!-- /* End of file navbar.php */ -->
<!-- /* Location: ./application/views/template/navbar.php */ -->