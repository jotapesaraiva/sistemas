<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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
                            <i class="fa icon-screen-desktop"></i> Sistemas</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th> Nome </th>
                                    <th> Descrição </th>
                                    <th> Area de Negocio </th>
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

<!-- /* End of file sistemas.php */ -->
<!-- /* Location: ./application/views/pages/sistemas.php */ -->