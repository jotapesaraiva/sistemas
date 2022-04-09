<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if($this->uri->segment(1) != 'login'): ?>
    </div>
    <!-- RODAPE TIME DE CONFIGURACAO -->
    <div class="page-footer">
       <div class="page-footer-inner"> 2019 © Gestão à Vista by Gestão de Configuração.
       </div>
       <div class="scroll-to-top">
           <i class="icon-arrow-up"></i>
       </div>
    </div>
<?php endif; ?>
<!-- JAVASCRIPTS -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
    <!-- javascript base -->
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/js.cookie.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/jquery.blockui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/uniform/jquery.uniform.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
    <!-- My javascript -->
    <?php echo $footer_meio; ?>
    <script type="text/javascript" src="<?php echo base_url('assets/global/scripts/app.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/pages/scripts/components-date-time-pickers.js'); ?>"></script>
    <!-- javascript template-->
    <script type="text/javascript" src="<?php echo base_url('assets/layouts/layout/scripts/layout.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/layouts/layout/scripts/demo.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/layouts/global/scripts/quick-sidebar.min.js'); ?>"></script>
    <script>
    $("#myAlert").fadeOut(4000);
    </script>
</body>
</html>

<!-- /* End of file footer.php */ -->
<!-- /* Location: ./application/views/template/footer.php */ -->