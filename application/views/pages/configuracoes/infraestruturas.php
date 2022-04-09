<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CONTEUDO-->
<div class="page-content-wrapper">
    <div class="page-content">

       <!-- FARELO DE PAO DA PAGINA + CALENDARIO-->
        <div class="page-bar">
            <?php echo $this->breadcrumbs->show(); ?>
        </div>
        <br>
        <div class="row">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-comments"></i>Infraestruturas</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
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
                                        <td> <i class="icon-wrench"></i> Serviços </td>
                                        <td> Inventario de equipamentos fisicos de infraestrutura geridos por esta DTI, nobreaks, switchs, roeadores, servidores e etc</td>
                                    </tr>
                                    <tr>
                                        <td> <i class="icon-rocket"></i> DataSource </td>
                                        <td> Descrição dos Projetos em andamento  </td>
                                    </tr>
                                    <tr>
                                        <td> <i class="icon-flag"></i> Servidor </td>
                                        <td> Descrição detalhada dos serviços disponibilizado por esta DTI, objetivo, negocio ambiente e publico alvo</td>
                                    </tr>
                                    <tr>
                                        <td> <i class="icon-screen-desktop  "></i> Aplicação </td>
                                        <td> Catálogos de sistemas disponibilizados para contribuinte  </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        </div>

    </div>
</div>

<!-- /* End of file infraestrutura.php */ -->
<!-- /* Location: ./application/views/pages/catalogo/infraestrutura.php */ -->