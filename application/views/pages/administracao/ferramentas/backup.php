<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- CONTEUDO-->
<div class="page-content-wrapper">
    <div class="page-content">

       <!-- FARELO DE PAO DA PAGINA + CALENDARIO-->
        <div class="page-bar">
            <?php echo $this->breadcrumbs->show(); ?>
        </div>
        <?php
          get_msg('loginOk');
          get_msg('msgOK');
        ?>
        <br>

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



                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                         <!-- <button class="btn sbold green" onclick="add_person()"> Realizar backup manual
                                             <i class="fa fa-plus"></i>
                                         </button> -->
                                         <?php echo anchor('administracao/ferramentas/backup/manual/default','Realizar backup manual <i class="fa fa-plus"></i>','id="reload_table" class="btn sbold green"');?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Ferramentas
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#" id="btn-print">
                                                    <i class="fa fa-print"></i> Imprimir </a>
                                            </li>
                                            <li>
                                                <a href="#" id="btn-pdf">
                                                    <i class="fa fa-file-pdf-o"></i> Salvar em PDF </a>
                                            </li>
                                            <li>
                                                <a href="#" id="btn-excel">
                                                    <i class="fa fa-file-excel-o"></i> Exportar para Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table1">
                            <thead>
                                <tr>
                                       <th>Nome</th>
                                       <th>Data</th>
                                       <th>Tamanho</th>
                                       <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php echo $files; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>

<!-- /* End of file backup.php */ -->
<!-- /* Location: ./application/views/pages/configuracoes/portal/backup.php */ -->