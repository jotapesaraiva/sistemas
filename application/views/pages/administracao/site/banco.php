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
                            <i class="fa icon-screen-desktop"></i> Configuração Banco de dados </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <div class="tabbable-line boxless margin-bottom-20">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab" aria-expanded="true"> Local </a>
                                </li>
                                <li class="">
                                    <a href="#tab_2" data-toggle="tab" aria-expanded="false"> Mantis </a>
                                </li>
                                <li class="">
                                    <a href="#tab_3" data-toggle="tab" aria-expanded="false"> Mantishom </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <form class="form-horizontal" id="basic" role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Hostname: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $default_hostname; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Database: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $default_database; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Username: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $default_username; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Password: </label>
                                                <div class="col-md-3">
                                                    <input type="password" class="form-control" value="<?php echo $default_password; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Dbdriver: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $default_dbdriver; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Salvar</button>
                                                    <button type="button" class="btn default">Limpar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <form class="form-horizontal" id="log" role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Hostname: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantis_hostname; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Database: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantis_database; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Username: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantis_username; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Password: </label>
                                                <div class="col-md-3">
                                                    <input type="password" class="form-control" value="<?php echo $mantis_password; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Dbdriver: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantis_dbdriver; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Salvar</button>
                                                    <button type="button" class="btn default">Limpar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <form class="form-horizontal" id="cache" role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Hostname: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantishom_hostname; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Database: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantishom_database; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Username: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantishom_username; ?>">
                                                </div>
                                                <label class="col-md-2 control-label">Password: </label>
                                                <div class="col-md-3">
                                                    <input type="password" class="form-control" value="<?php echo $mantishom_password; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Dbdriver: </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="<?php echo $mantishom_dbdriver; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Salvar</button>
                                                    <button type="button" class="btn default">Limpar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>


<!-- /* End of file banco.php */ -->
<!-- /* Location: ./application/views/pages/configuracoes/portal/banco.php */ -->