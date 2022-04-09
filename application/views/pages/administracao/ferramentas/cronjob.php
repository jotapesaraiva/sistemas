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
                            <i class="fa icon-screen-desktop"></i> CronJob do Servidor</div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">

                      <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="<?php echo base_url() ?>cronkeep/src/"></iframe>
                      </div>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>

<!--  // End of file iframe.php -->
<!-- /* Location: ./application/views/sistema/iframe.php */ -->