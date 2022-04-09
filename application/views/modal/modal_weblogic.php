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
                            <label class="control-label col-md-3">Nome Weblogic :</label>
                            <div class="col-md-9">
                                <input name="weblogic" placeholder="Nome Weblogic" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Servidor :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="servidor" data-live-search="true">
                                    <option value="">------Selecione um servidor-----</option>
                                    <?php foreach($servidors->result() as $servidor) :?>
                                    <option value="<?=$servidor->id_servidor?>"><?=$servidor->hostname_servidor." - ". $servidor->ip_servidor?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Ambiente :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="ambiente" data-live-search="true">
                                    <option value="">------Selecione uma ambiente-----</option>
                                    <?php foreach($ambientes->result() as $ambiente) :?>
                                    <option value="<?=$ambiente->id_ambiente?>"><?=$ambiente->nome_ambiente?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contexto :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="contexto" data-live-search="true">
                                    <option value="">------Selecione uma contexto-----</option>
                                    <?php foreach($contextos->result() as $contexto) :?>
                                    <option value="<?=$contexto->id_contexto?>"><?=$contexto->nome_contexto?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tecnologia :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="tecnologia" data-live-search="true">
                                    <option value="">------Selecione uma tecnologia-----</option>
                                    <?php foreach($tecnologias->result() as $tecnologia) :?>
                                    <option value="<?=$tecnologia->id_tecnologia?>"><?=$tecnologia->nome_tecnologia?></option>
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