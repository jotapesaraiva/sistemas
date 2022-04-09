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
                            <div class="col-md-9 ">
                                <input name="nome" placeholder="Nome" class="form-control " type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Descrição :</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="descricao" rows="7"></textarea>
                                <span class="help-block"></span>
                            </div>
                            <hr>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Data de Implantação :</label>
                            <div class="col-md-9">
                            <div class="input-group date date-picker">
                                <input type="text" name="data" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                            <span class="help-block"></span>
                        </div>
                            <hr>
                        </div>

                        <div class="dynamic-negocio">
                            <script type="text/template" id="row_negocio">
                                <div class="form-group row_negocio">
                                    <label class="control-label col-md-3">Area de Negocio :</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker form-control" name="negocio[]" multiple data-live-search="true">
                                            <option value="">------Selecione uma área de negócio-----</option>
                                            {{#negocio}}
                                            <option id="{{id_area_negocio}}" value="{{id_negocio}}">{{nome_negocio}}</option>
                                            {{/negocio}}
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </script>
                        </div>

                        <div class="dynamic-documentacao">
                            <script type="text/template" id="row_documentacao">
                                <div class="form-group row_doc documentacao_{{doc}}">
                                    <input type="hidden" id="documentacao_{{doc}}" value="{{id_documentacao}}" name="id_documentacao"/>
                                    <label class="control-label col-md-3">Documentação :</label>
                                    <div class="col-md-9">
                                        <input name="url[]" value="{{url_documentacao}}" placeholder="URL" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <select class="selectpicker form-control" name="repositorio[]" data-live-search="true">
                                            <option value="">------Selecione um repositório-----</option>
                                            {{#repositorio}}
                                            <option data-icon="glyphicon glyphicon-inbox" value="{{id_repositorio}}">{{nome_repositorio}}</option>
                                            {{/repositorio}}
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-1 plus">
                                         <button class="btn blue add" onclick="addRows()" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-1 minus">
                                         <button class="btn red remove" onclick="removeRows({{doc}})" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </script>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tipo Sistema :</label>
                            <div class="col-md-9 dynamic-tipo_sistema">
                                <script type="text/template" id="select_tipo_sistema">
                                    <div class="select_tipo_sistema">
                                        <select class="selectpicker form-control" name="tipo_sistema" data-live-search="true">
                                            <option value="">------Selecione um Tipo de Sistema-----</option>
                                            {{#tipo_sistema}}
                                            <option value="{{id_tipo_sistema}}">{{nome_tipo_sistema}}</option>
                                            {{/tipo_sistema}}
                                        <span class="help-block"></span>
                                        </select>

                                    </div>
                                </script>
                            </div>
                        </div>

                        <div class="dynamic-link">
                            <script type="text/template" id="row_link">
                                <div class="form-group row_doc link_{{lnk}}">
                                    <input type="hidden" id="id_link_{{lnk}}" value="{{id_link}}" name="id_link"/>
                                    <label class="control-label col-md-3">Link Sistema :</label>
                                    <div class="col-md-9">

                                        <div class="input-group">
                                            <div class="input-icon">
                                                <input style="padding: 6px 12px !important;" class="form-control" name="link_sistema[]" value="{{url_sistema}}" placeholder="link sistema" type="text">
                                            </div>
                                            <span class="input-group-btn">
                                                <button class="btn blue plus" id="add_link_sistema" onclick="addLink()" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button class="btn red minus" id="remove_link_sistema" onclick="removeLink({{lnk}})" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </script>
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-3">Status :</label>
                            <div class="col-md-9">
                                <select class="selectpicker form-control" name="status">
                                    <option value="0" data-content="<span class='label lable-sm label-danger'>Desativado </span>">Desativado</option>
                                    <option value="1" data-content="<span class='label lable-sm label-success'>Ativado </span>">Ativado</option>
                                    <option value="2" data-content="<span class='label lable-sm label-info'>Desenvolvimento </span>">Desenvolvimento</option>
                                </select>
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
</div><!-- /.modal-->


