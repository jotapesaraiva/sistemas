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
                            <i class="fa icon-screen-desktop"></i> Catálogos</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">


                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> Menu </th>
                                        <th> Descrição </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <i class="icon-wrench"></i> Infraestrutura </td>
                                        <td> Inventario de equipamentos fisicos de infraestrutura geridos por esta DTI, weblogic, servidores e etc </td>
                                    </tr>
<!--                                     <tr>
                                        <td> <i class="icon-rocket"></i> Projeto </td>
                                        <td> Descrição dos Projetos em andamento  </td>
                                    </tr> -->
                                    <tr>
                                        <td> <i class="icon-flag"></i> Serviços </td>
                                        <td> Descrição detalhada dos serviços disponibilizado por esta DTI, objetivo, negocio ambiente e publico alvo </td>
                                    </tr>
                                    <tr>
                                        <td> <i class="icon-screen-desktop  "></i> Sistemas </td>
                                        <td> Catálogos de sistemas disponibilizados para contribuinte </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>

<!-- /* End of file catalogo.php */ -->
<!-- /* Location: ./application/views/pages/catalogo.php */ -->