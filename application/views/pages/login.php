<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="login">
    <div class="menu-toggler sidebar-toggler"></div>
    <div class="logo">
        <!-- <a href="index.php"> -->
                <div>
                    <img src="<?php echo base_url('assets/img/talent-management.png'); ?>" alt="" width="10%" />
                </div>
                <!-- <img style="text-shadow: 0px 0px 5px black;" src="<?php echo base_url('assets/layouts/layout6/img/logo4.png'); ?>" alt="" width="10%" /> -->
                <h2 style="color: white;text-shadow: 3px 3px 5px #404040;"><b>Portal de Sistemas<b></h2>
                <!-- <h2 style="color: white;text-shadow: 3px 3px 5px #404040;"><b>NOC<b></h2> -->
        <!-- </a> -->
        <!-- <h2 style="color: white;text-shadow: 3px 3px 5px #404040;"><b>Indicadores Mantis<b></h2> -->
    </div>
    <div class="content" style="box-shadow: 0px 0px 5px #404040;">
    <?php
        erros_validation();
        get_msg('desloga');
        get_msg('errologin');
        echo form_open('login', array('class'=>'login-form'));?>
        <h3 class="form-title font-green">Login de Usuário</h3>
        <div class="form-group">
            <?php echo form_label('Entrar com suas credenciais', 'usuario', array('class' => 'control-label visible-ie8 visible-ie9') )."\n"; ?>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <?php echo form_input(array('name'=>'usuario', 'placeholder'=>'Login', 'class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete'=> 'off'), set_value('usuario'), 'autofocus'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Senha', '', array('class'=> 'control-label visible-ie8 visible-ie9') )."\n"; ?>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <?php echo form_password(array('name'=>'senha', 'placeholder'=>'Senha', 'class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete'=> 'off'), set_value('senha')); ?>
            </div>
        </div>
        <div class="form-actions">
            <?php echo "\t".form_hidden('redirect', $this->session->userdata('redir_para'));
                  echo "\t".form_submit(array('name'=>'logar', 'class'=>'btn green pull-right'), 'Entrar');?>
        </div>
        <?php echo form_close();?>

    </div>
    <div class="copyright"> Created by CGPS - GC. V 2.0.0 © 2020. <br>Secretaria de Estado da Fazenda do Pará</div>

<!-- /* End of file login.php */ -->
<!-- /* Location: ./application/views/login.php */ -->