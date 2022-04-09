<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- CONTEUDO-->
<div class="page-content-wrapper">
    <div class="page-content">

       <!-- FARELO DE PAO DA PAGINA + CALENDARIO-->
        <div class="page-bar">
            <?php echo $this->breadcrumbs->show(); ?>
        </div>
        <br>
        <?php
          get_msg('loginOk');
          get_msg('msgOK');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div id="msgs"></div>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa icon-screen-desktop"></i> Ambientes</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <!-- <form class="form-horizontal" action="salvar" method="post" role="form"> -->
                        <?php echo form_open('administracao/site/ldap/salvar', array('class'=>'form-horizontal')); ?>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Admin Group: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="admin_group" class="form-control" value="<?php echo $admin_group; ?>" placeholder="Enter text">
                                    </div>
                                    <label class="col-md-2 control-label">Port: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="port" class="form-control" value="<?php echo $port; ?>" placeholder="Enter text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Base DN: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="base_dn" class="form-control" value="<?php echo $base_dn; ?>" placeholder="Enter text">
                                    </div>
                                    <label class="col-md-2 control-label">AD Domain: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="ad_domain" class="form-control" value="<?php echo $ad_domain; ?>" placeholder="Enter text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Start OU: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="start_ou" class="form-control" value="<?php echo $start_ou; ?>" placeholder="Enter text">
                                    </div>
                                    <label class="col-md-2 control-label">Proxy User: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="proxy_user" class="form-control" value="<?php echo $proxy_user; ?>" placeholder="Enter text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Hosts: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="hosts" class="form-control" value="<?php echo $hosts; ?>"></input>
                                    </div>
                                    <label class="col-md-2 control-label">Proxy Password: </label>
                                    <div class="col-md-3">
                                        <input type="text" name="proxy_pass" class="form-control" value="<?php echo $proxy_pass; ?>" placeholder="Enter text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <?php echo form_submit(array('name'=>'salvar', 'class'=>'btn green'), 'Salvar'); ?>
                                        <!-- <button type="submit" class="btn green">Salvar</button> -->
                                        <button type="button" class="btn default">Limpar</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>


<!-- /* End of file ldap.php */ -->
<!-- /* Location: ./application/views/pages/configuracoes/ldap.php */ -->