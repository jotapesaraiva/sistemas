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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa icon-screen-desktop"></i> Servidor</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th> Hostname </th>
<!--                                     <th> Ambiente </th>
                                    <th> Contexto </th> -->
                                    <th> SO </th>
                                    <th> IP </th>
                                    <th> Memoria </th>
                                    <th> Processador </th>
                                    <th> Domínio </th>
                                    <th> Ações </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>

<!-- /* End of file servidor.php */ -->
<!-- /* Location: ./application/views/pages/catalogo/infraestrutura/servidor.php */ -->