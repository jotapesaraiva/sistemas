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
                            <label class="control-label col-md-3">Managed Server :</label>
                            <div class="col-md-9">
                                <input name="managed_server" placeholder="Managed Server" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Weblogic :</label>
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
                            <label class="control-label col-md-3">Porta :</label>
                            <div class="col-md-9">
                                <input name="porta" placeholder="Porta" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Memória :</label>
                            <div class="col-md-9">
                                <input name="memoria" placeholder="Memoria" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Argumento :</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="argumento" rows="3"></textarea>
                                <!-- <input name="argumento" placeholder="Argumento" class="form-control" type="text"> -->
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Versão do java :</label>
                            <div class="col-md-9">
                                <input name="versao_java" placeholder="Versão do java" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Certificado :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="certificado" data-live-search="true">
                                    <option value="">------Selecione um certificado-----</option>
                                    <?php foreach($certificados->result() as $certificado) :?>
                                    <option value="<?=$certificado->id_certificado?>"><?=$certificado->nome_certificado?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status :</label>
                            <div class="col-md-9">
                                <input name="status" type="checkbox" class="make-switch" checked data-on-text="&nbsp;Running&nbsp;&nbsp;" data-off-text="&nbsp;Shutdown&nbsp;">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Nome do cluster:</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="cluster" data-live-search="true">
                                    <option value="">------Selecione um Cluster-----</option>
                                    <?php foreach($clusters->result() as $cluster) :?>
                                    <option value="<?=$cluster->id_cluster?>"><?=$cluster->nome_cluster." - ".$cluster->nome_weblogic?></option>
                                    <?php endforeach ?>
                                </select>
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


<!-- /* End of file modal_managed_server.php */ -->
<!-- /* Location: ./application/views/modal/modal_managed_server.php */ -->