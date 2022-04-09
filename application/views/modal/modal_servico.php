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
                            <label class="control-label col-md-3">Sistema:</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="sistema" data-live-search="true">
                                    <option value="">------Selecione uma ambiente-----</option>
                                    <?php foreach($sistemas->result() as $sistema) :?>
                                    <option value="<?=$sistema->id_sistema?>"><?=$sistema->nome_sistema?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Aplicação :</label>
                            <div class="col-md-9">
                                <input name="aplicacao" placeholder="Aplicação" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Versão :</label>
                            <div class="col-md-9">
                                <input name="versao" placeholder="Versão" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cluster:</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="cluster" data-live-search="true">
                                    <option value="">------Selecione um cluster-----</option>
                                    <?php foreach($clusters->result() as $cluster) :?>
                                    <option value="<?=$cluster->id_cluster?>"><?=$cluster->nome_cluster." - ".$cluster->nome_weblogic?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Admin Server:</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="weblogic" data-live-search="true">
                                    <option value="">------Selecione um Admin Server-----</option>
                                    <?php foreach($weblogics->result() as $weblogic) :?>
                                    <option value="<?=$weblogic->id_weblogic?>"><?=$weblogic->nome_weblogic?></option>
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