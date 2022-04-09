<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nome :</label>
                            <div class="col-md-9">
                                <input name="nome" placeholder="Nome" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Cluster:</label>
                             <div class="col-md-9">
                                 <select class="selectpicker form-control" name="cluster[]" data-live-search="true" multiple>
                                     <!-- <option value=""> ---Selecione um cluster--- </option> -->
                                     <?php foreach($clusters->result() as $cluster) :?>
                                     <option value="<?=$cluster->id_cluster?>"><?=$cluster->nome_cluster." - ".$cluster->nome_weblogic?></option>
                                     <?php endforeach ?>
                                 </select>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">Weblogic:</label>
                             <div class="col-md-9">
                                 <select class="selectpicker form-control" name="weblogic" data-live-search="true">
                                     <option value="">------Selecione um weblogic-----</option>
                                     <?php foreach($weblogics->result() as $weblogic) :?>
                                     <option value="<?=$weblogic->id_weblogic?>"><?=$weblogic->nome_weblogic?></option>
                                     <?php endforeach ?>
                                 </select>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">tipo de Datasource:</label>
                            <div class="col-md-9">
                                <input name="tipo" placeholder="tipo" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nome da JNDI :</label>
                            <div class="col-md-9">
                                <input name="jndi" placeholder="Nome da JNDI" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Usuário :</label>
                            <div class="col-md-9">
                                <input name="usuario" placeholder="Usuário" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">String URL :</label>
                            <div class="col-md-9">
                                <input name="string" placeholder="String URL" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- /* End of file modal_datasource.php */ -->
<!-- /* Location: ./application/views/modal/modal_datasource.php */ -->