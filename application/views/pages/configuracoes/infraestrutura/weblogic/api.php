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
            <form method="post">
                        <label class="bold col-md-offset-4 col-md-1">Status:</label>
                        <div class="col-md-3">
                          <select name="myselect" class="selectpicker seletor" id="selector">
                          <!-- <select name="myselect" class="bs-select form-control bs-select-hidden" id="selector"> -->
                              <option value="10.3.3.180">WDesenvolvimento</option>
                              <option value="10.3.3.102">WHomologação</option>
                              <option value="10.3.3.103">WTransição</option>
                              <option value="10.3.3.125">WTeste</option>
                          </select>
                        </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa icon-screen-desktop"></i> API</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th> Servidor </th>
                                    <th> Status </th>
                                    <!-- <th> Health </th> -->
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



<!-- /* End of file api.php */ -->
<!-- /* Location: ./application/views/pages/configuracoes/infraestrutura/weblogic/api.php */ -->