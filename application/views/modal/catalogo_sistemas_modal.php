 <!-- Bootstrap modal  -->
<div class="modal fade" id="modal_catalogo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!--modal-full-->
        <div class="modal-content">

            <div class="modal-header dynamic-sistema">
                <script type="text/template" id="row_sistema">
                    {{#sistema}}
                    <form class="form-horizontal" role="form">
                        <div class="form-body row_sistema">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title bold uppercase">{{nome_sistema}} </h4>
                            <h5 style="margin: 10px 40px 10px 40px;">{{descricao_sistema }}</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Tipo Sistema:</label>
                                        <div class="col-md-7">
                                            <p class="form-control-static"> {{nome_tipo_sistema}} </p>
                                        </div>
                                    </div>
                                </div>

                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label class="control-label col-md-5">Área de Negócio:</label>
                                       <div class="col-md-7">
                                            <p class="form-control-static"> {{nome_negocio}} </p>
                                       </div>
                                   </div>
                               </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Data Implantação:</label>
                                        <div class="col-md-7">
                                            <p class="form-control-static"> {{data_sis}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Status:</label>
                                        <div class="col-md-7">
                                            <p class="form-control-static"> <span class='label lable-sm label-{{flag}}'> {{status_sis}} </span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{/sistema}}
                </script>
            </div>

            <div class="modal-body">
              <div class="container-fluid">
                <div class="tabbable-line boxless margin-bottom-20">
                    <ul class="nav nav-tabs" style="margin-left: 300px !important">
                        <!-- TODO: juntar aplicação + mapeamento apache -->
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab" aria-expanded="true"> Produção </a>
                        </li>
                        <!--TODO: juntar as ambas managed server + servidor + datasource + certificado-->
                        <li class="">
                            <a href="#tab_2" data-toggle="tab" aria-expanded="false"> Transição </a>
                        </li>
                        <li class="">
                            <!-- TODO: mudar o nome da aba codigo fonte para Documentação -->
                            <a href="#tab_3" data-toggle="tab" aria-expanded="false"> Homologação </a>
                        </li>
                        <li class="">
                            <a href="#tab_4" data-toggle="tab" aria-expanded="false"> Desenvolvimento </a>
                        </li>
<!--                         <li class="">
                            <a href="#tab_5" data-toggle="tab" aria-expanded="false"> TESTE</a>
                        </li> -->
                    </ul>
                    <div class="tab-content" style="padding:15px !important">

                        <div class="tab-pane active" id="tab_1">

                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <ul class="nav nav-tabs tabs-left">
                                        <li>
                                            <a href="#tab_1_1" data-toggle="tab"> Documentação </a>
                                        </li>
                                        <li class="active">
                                            <a href="#tab_1_2" data-toggle="tab"> Serviço </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_3" data-toggle="tab"> Managed Server </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_4" data-toggle="tab"> DataSource </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_5" data-toggle="tab"> Certificado </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="tab-content">

                                        <div class="tab-pane fade" id="tab_1_1">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                        <!-- <h3 class="form-section">Repositorio</h3> -->
                                                        <!--/row-->
                                                        <div class="row">

                                                            <div class="dynamic-documentacao-p">
                                                                <script type="text/template" id="row_documentacao_p">
                                                            {{#documentacao}}
                                                                <div class="row_documentacao_p">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Repositorio</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{nome_repositorio}}" class="form-control" readonly=""> </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">URL</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{url_documentacao}}" class="form-control" readonly=""> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{/documentacao}}
                                                                </script>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="tab-pane active" id="tab_1_2">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <!-- <div class="row"> -->
                                                                <div class="dynamic-servico">
                                                                    <script type="text/template" id="row_servico">
                                                                    {{#servico_p}}
                                                                    <div class="row_servico">
                                                                        <h3 class="form-section" style="margin-top:5px">{{nome_servico}}</h3>
                                                                        <div class="row">

                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Versão</label>
                                                                                    <div class="col-md-9">
                                                                                        <input name="versao" class="form-control" value="{{versao_servico}}" type="text" readonly="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Cluster</label>
                                                                                    <div class="col-md-9">
                                                                                        <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Weblogic</label>
                                                                                    <div class="col-md-9">
                                                                                        <input name="weblogic" class="form-control" value="{{nome_weblogic}}" type="text" readonly="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <hr>
                                                                    </div>
                                                                    {{/servico_p}}
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_1_3">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <div class="row">

                                                                <div class="dynamic-managed">
                                                                    <script type="text/template" id="row_managed">
                                                                    {{#managed_p}}
                                                                    <div class="row_managed">
                                                                    <h3 class="form-section" style="margin-top:5px">{{nome_weblogic}}</h3>
                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Nome</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="nome" class="form-control" value="{{nome_managed_server}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                 <label class="control-label col-md-3">Porta</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="porta" class="form-control" value="{{porta_managed_server}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                  <label class="control-label col-md-3">Memoria</label>
                                                                                  <div class="col-md-9">
                                                                                      <input name="memoria" class="form-control" value="{{memoria_managed_server}}" type="text" readonly="">
                                                                                  </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Versão</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="versao" class="form-control" value="{{versao_java_managed_server}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Certificado</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="certificado" class="form-control" value="{{id_certificado}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Status</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="status_p" type="checkbox" class="make-switch" {{status_mn}} readonly data-on-text="&nbsp;Running&nbsp;&nbsp;" data-off-text="&nbsp;Shutdown&nbsp;">
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Argumento</label>
                                                                                <div class="col-md-9">
                                                                                    <textarea class="form-control" readonly="" name="argumento" rows="3" style="width: 919px; height: 79px;">{{argumento_managed_server}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    {{/managed_p}}
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_1_4">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body"  style="padding:0px !important">
                                                            <div class="row">
                                                                <div class="dynamic-datasource">
                                                                    <script type="text/template" id="row_datasource">
                                                                {{#datasource_p}}
                                                                <div class="row_datasource">
                                                                    <h3 class="form-section" style="margin-top:5px" >{{nome_weblogic}}</h3>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Nome</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="nome" class="form-control" value="{{nome_datasource}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Tipo DS</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="tipo" class="form-control" value="{{tipo_datasource}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JNDI</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="jndi" class="form-control" value="{{jndi_datasource}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Cluster</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Usuário</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="usuario" class="form-control" value="{{usuario_datasource}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">String URL</label>
                                                                                <div class="col-md-9">
                                                                                    <textarea readonly="" class="form-control" name="url" rows="3">{{string_url_datasource}}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                                {{/datasource_p}}
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_1_5">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                            <h3 class="form-section">Nome do CT</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">URL</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" placeholder="Chee Kin">
                                                                            <span class="help-block"> This is inline help </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-error">
                                                                        <label class="control-label col-md-3">Tipo CT</label>
                                                                        <div class="col-md-9">
                                                                            <select name="foo" class="form-control">
                                                                                <option value="1">Option 1</option>
                                                                                <option value="1">Option 2</option>
                                                                                <option value="1">Option 3</option>
                                                                            </select>
                                                                            <span class="help-block"> This field has error. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Validade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Diretorio</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Documentação</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="tab_2">

                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <ul class="nav nav-tabs tabs-left">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Serviço </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Managed Server </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_3" data-toggle="tab"> DataSource </a>
                                        </li>
<!--                                         <li>
                                            <a href="#tab_2_4" data-toggle="tab"> Documentação </a>
                                        </li> -->
                                        <li>
                                            <a href="#tab_2_5" data-toggle="tab"> Certificado </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_2_1">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <!-- <div class="row"> -->
                                                                <div class="dynamic-servico-t">
                                                                    <script type="text/template" id="row_servico_t">
                                                                    {{#servico_t}}
                                                                    <div class="row_servico">
                                                                    <h3 class="form-section" style="margin-top:5px">{{nome_servico}}</h3>
                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Versão</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="versao" class="form-control" value="{{versao_servico}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Cluster</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Weblogic</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="weblogic" class="form-control" value="{{nome_weblogic}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    </div>
                                                                    {{/servico_t}}
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_2_2">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <div class="row">

                                                                <div class="dynamic-managed-t">
                                                                    <script type="text/template" id="row_managed_t">
                                                                    {{#managed_t}}
                                                                    <div class="row_managed_t">
                                                                <h3 class="form-section" style="margin-top:5px">{{nome_weblogic}}</h3>
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Nome</label>
                                                                            <div class="col-md-9">
                                                                                <input name="nome" class="form-control" value="{{nome_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                             <label class="control-label col-md-3">Porta</label>
                                                                            <div class="col-md-9">
                                                                                <input name="porta" class="form-control" value="{{porta_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                              <label class="control-label col-md-3">Memoria</label>
                                                                              <div class="col-md-9">
                                                                                  <input name="memoria" class="form-control" value="{{memoria_managed_server}}" type="text" readonly="">
                                                                              </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Versão</label>
                                                                            <div class="col-md-9">
                                                                                <input name="versao" class="form-control" value="{{versao_java_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Certificado</label>
                                                                            <div class="col-md-9">
                                                                                <input name="certificado" class="form-control" value="{{id_certificado}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Status</label>
                                                                            <div class="col-md-9">
                                                                                <input name="status" class="form-control" value="{{status_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Argumento</label>
                                                                            <div class="col-md-9">
                                                                                <textarea readonly="" class="form-control" name="argumento" rows="3">{{argumento_managed_server}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    {{/managed_t}}
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_2_3">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body"  style="padding:0px !important">
                                                            <div class="row">
                                                                <div class="dynamic-datasource-t">
                                                                    <script type="text/template" id="row_datasource_t">
                                                                {{#datasource_t}}
                                                                <div class="row_datasource">
                                                            <h3 class="form-section" style="margin-top:5px" >{{nome_weblogic}}</h3>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Nome</label>
                                                                        <div class="col-md-9">
                                                                            <input name="nome" class="form-control" value="{{nome_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Tipo DS</label>
                                                                        <div class="col-md-9">
                                                                            <input name="tipo" class="form-control" value="{{tipo_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">JNDI</label>
                                                                        <div class="col-md-9">
                                                                            <input name="jndi" class="form-control" value="{{jndi_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Cluster</label>
                                                                        <div class="col-md-9">
                                                                            <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Usuário</label>
                                                                        <div class="col-md-9">
                                                                            <input name="usuario" class="form-control" value="{{usuario_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">String URL</label>
                                                                        <div class="col-md-9">
                                                                            <textarea  readonly="" class="form-control" name="url" rows="3">{{string_url_datasource}}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                {{/datasource_t}}
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_2_4">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                        <!-- <h3 class="form-section">Repositorio</h3> -->
                                                        <!--/row-->
                                                        <div class="row">

                                                            <div class="dynamic-documentacao-p">
                                                                <script type="text/template" id="row_documentacao_p">
                                                            {{#documentacao}}
                                                                <div class="row_documentacao_p>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Repositorio</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{nome_repositorio}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">URL</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{url_documentacao}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{/documentacao}}
                                                                </script>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_5">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                            <h3 class="form-section">Nome do CT</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">URL</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" placeholder="Chee Kin">
                                                                            <span class="help-block"> This is inline help </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-error">
                                                                        <label class="control-label col-md-3">Tipo CT</label>
                                                                        <div class="col-md-9">
                                                                            <select name="foo" class="form-control">
                                                                                <option value="1">Option 1</option>
                                                                                <option value="1">Option 2</option>
                                                                                <option value="1">Option 3</option>
                                                                            </select>
                                                                            <span class="help-block"> This field has error. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Validade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Diretorio</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Documentação</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab_3">

                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <ul class="nav nav-tabs tabs-left">
                                        <li class="active">
                                            <a href="#tab_3_1" data-toggle="tab"> Serviço </a>
                                        </li>
                                        <li>
                                            <a href="#tab_3_2" data-toggle="tab"> Managed Server </a>
                                        </li>
                                        <li>
                                            <a href="#tab_3_3" data-toggle="tab"> DataSource </a>
                                        </li>
<!--                                         <li>
                                            <a href="#tab_3_4" data-toggle="tab"> Documentação </a>
                                        </li> -->
                                        <li>
                                            <a href="#tab_3_5" data-toggle="tab"> Certificado </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_3_1">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <!-- <div class="row"> -->
                                                                <div class="dynamic-servico-h">
                                                                    <script type="text/template" id="row_servico_h">
                                                                    {{#servico_h}}
                                                                    <div class="row_servico">
                                                                    <h3 class="form-section" style="margin-top:5px">{{nome_servico}}</h3>
                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Versão</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="versao" class="form-control" value="{{versao_servico}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Cluster</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Weblogic</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="weblogic" class="form-control" value="{{nome_weblogic}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    </div>
                                                                    {{/servico_h}}
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_3_2">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <div class="row">

                                                                <div class="dynamic-managed-h">
                                                                    <script type="text/template" id="row_managed_h">
                                                                    {{#managed_h}}
                                                                    <div class="row_managed">
                                                                <h3 class="form-section" style="margin-top:5px">{{nome_weblogic}}</h3>
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Nome</label>
                                                                            <div class="col-md-9">
                                                                                <input name="nome" class="form-control" value="{{nome_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                             <label class="control-label col-md-3">Porta</label>
                                                                            <div class="col-md-9">
                                                                                <input name="porta" class="form-control" value="{{porta_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                              <label class="control-label col-md-3">Memoria</label>
                                                                              <div class="col-md-9">
                                                                                  <input name="memoria" class="form-control" value="{{memoria_managed_server}}" type="text" readonly="">
                                                                              </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Versão</label>
                                                                            <div class="col-md-9">
                                                                                <input name="versao" class="form-control" value="{{versao_java_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Certificado</label>
                                                                            <div class="col-md-9">
                                                                                <input name="certificado" class="form-control" value="{{id_certificado}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Status</label>
                                                                            <div class="col-md-9">
                                                                                <input name="status" class="form-control" value="{{status_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Argumento</label>
                                                                            <div class="col-md-9">
                                                                                <textarea readonly="" class="form-control" name="argumento" rows="3">{{argumento_managed_server}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    {{/managed_h}}
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_3_3">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body"  style="padding:0px !important">
                                                            <div class="row">
                                                                <div class="dynamic-datasource-h">
                                                                    <script type="text/template" id="row_datasource_h">
                                                                {{#datasource_h}}
                                                                <div class="row_datasource">
                                                            <h3 class="form-section" style="margin-top:5px" >{{nome_weblogic}}</h3>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Nome</label>
                                                                        <div class="col-md-9">
                                                                            <input name="nome" class="form-control" value="{{nome_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Tipo DS</label>
                                                                        <div class="col-md-9">
                                                                            <input name="tipo" class="form-control" value="{{tipo_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">JNDI</label>
                                                                        <div class="col-md-9">
                                                                            <input name="jndi" class="form-control" value="{{jndi_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Cluster</label>
                                                                        <div class="col-md-9">
                                                                            <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Usuário</label>
                                                                        <div class="col-md-9">
                                                                            <input name="usuario" class="form-control" value="{{usuario_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">String URL</label>
                                                                        <div class="col-md-9">
                                                                            <textarea readonly="" class="form-control" name="url" rows="3">{{string_url_datasource}}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                {{/datasource_h}}
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_3_4">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                        <!-- <h3 class="form-section">Repositorio</h3> -->
                                                        <!--/row-->
                                                        <div class="row">

                                                            <div class="dynamic-documentacao-p">
                                                                <script type="text/template" id="row_documentacao_p">
                                                            {{#documentacao}}
                                                                <div class="row_documentacao_p">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Repositorio</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{nome_repositorio}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">URL</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{url_documentacao}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{/documentacao}}
                                                                </script>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_3_5">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                            <h3 class="form-section">Nome do CT</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">URL</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" placeholder="Chee Kin">
                                                                            <span class="help-block"> This is inline help </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-error">
                                                                        <label class="control-label col-md-3">Tipo CT</label>
                                                                        <div class="col-md-9">
                                                                            <select name="foo" class="form-control">
                                                                                <option value="1">Option 1</option>
                                                                                <option value="1">Option 2</option>
                                                                                <option value="1">Option 3</option>
                                                                            </select>
                                                                            <span class="help-block"> This field has error. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Validade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Diretorio</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Documentação</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab_4">

                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <ul class="nav nav-tabs tabs-left">
                                        <li class="active">
                                            <a href="#tab_4_1" data-toggle="tab"> Serviço </a>
                                        </li>
                                        <li>
                                            <a href="#tab_4_2" data-toggle="tab"> Managed Server </a>
                                        </li>
                                        <li>
                                            <a href="#tab_4_3" data-toggle="tab"> DataSource </a>
                                        </li>
<!--                                         <li>
                                            <a href="#tab_4_4" data-toggle="tab"> Documentação </a>
                                        </li> -->
                                        <li>
                                            <a href="#tab_4_5" data-toggle="tab"> Certificado </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_4_1">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <!-- <div class="row"> -->
                                                                <div class="dynamic-servico-d">
                                                                    <script type="text/template" id="row_servico_d">
                                                                    {{#servico_d}}
                                                                    <div class="row_servico">
                                                                    <h3 class="form-section" style="margin-top:5px">{{nome_servico}}</h3>
                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Versão</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="versao" class="form-control" value="{{versao_servico}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Cluster</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Weblogic</label>
                                                                                <div class="col-md-9">
                                                                                    <input name="weblogic" class="form-control" value="{{nome_weblogic}}" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    </div>
                                                                    {{/servico_d}}
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_4_2">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-body" style="padding:0px !important">
                                                            <div class="row">

                                                                <div class="dynamic-managed-d">
                                                                    <script type="text/template" id="row_managed_d">
                                                                    {{#managed_d}}
                                                                    <div class="row_managed">
                                                                <h3 class="form-section" style="margin-top:5px">{{nome_weblogic}}</h3>
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Nome</label>
                                                                            <div class="col-md-9">
                                                                                <input name="nome" class="form-control" value="{{nome_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                             <label class="control-label col-md-3">Porta</label>
                                                                            <div class="col-md-9">
                                                                                <input name="porta" class="form-control" value="{{porta_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                              <label class="control-label col-md-3">Memoria</label>
                                                                              <div class="col-md-9">
                                                                                  <input name="memoria" class="form-control" value="{{memoria_managed_server}}" type="text" readonly="">
                                                                              </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Versão</label>
                                                                            <div class="col-md-9">
                                                                                <input name="versao" class="form-control" value="{{versao_java_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Certificado</label>
                                                                            <div class="col-md-9">
                                                                                <input name="certificado" class="form-control" value="{{id_certificado}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Status</label>
                                                                            <div class="col-md-9">
                                                                                <input name="status" class="form-control" value="{{status_managed_server}}" type="text" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Argumento</label>
                                                                            <div class="col-md-9">
                                                                                <textarea readonly="" class="form-control" name="argumento" rows="3">{{argumento_managed_server}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    {{/managed_d}}
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_4_3">

                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body"  style="padding:0px !important">
                                                            <div class="row">
                                                                <div class="dynamic-datasource-d">
                                                                    <script type="text/template" id="row_datasource_d">
                                                                {{#datasource_d}}
                                                                <div class="row_datasource">
                                                            <h3 class="form-section" style="margin-top:5px" >{{nome_weblogic}}</h3>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Nome</label>
                                                                        <div class="col-md-9">
                                                                            <input name="nome" class="form-control" value="{{nome_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Tipo DS</label>
                                                                        <div class="col-md-9">
                                                                            <input name="tipo" class="form-control" value="{{tipo_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">JNDI</label>
                                                                        <div class="col-md-9">
                                                                            <input name="jndi" class="form-control" value="{{jndi_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Cluster</label>
                                                                        <div class="col-md-9">
                                                                            <input name="cluster" class="form-control" value="{{nome_cluster}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Usuário</label>
                                                                        <div class="col-md-9">
                                                                            <input name="usuario" class="form-control" value="{{usuario_datasource}}" type="text" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">String URL</label>
                                                                        <div class="col-md-9">
                                                                            <textarea readonly="" class="form-control" name="url" rows="3">{{string_url_datasource}}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                {{/datasource_d}}
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>

                                        </div>

                                        <div class="tab-pane fade" id="tab_4_4">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                        <!-- <h3 class="form-section">Repositorio</h3> -->
                                                        <!--/row-->
                                                        <div class="row">

                                                            <div class="dynamic-documentacao-p">
                                                                <script type="text/template" id="row_documentacao_p">
                                                            {{#documentacao}}
                                                                <div class="row_documentacao_p">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Repositorio</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{nome_repositorio}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">URL</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="{{url_documentacao}}" class="form-control"> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{/documentacao}}
                                                                </script>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_4_5">
                                            <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal">
                                                        <div class="form-body">

                                                            <h3 class="form-section">Nome do CT</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">URL</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" placeholder="Chee Kin">
                                                                            <span class="help-block"> This is inline help </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group has-error">
                                                                        <label class="control-label col-md-3">Tipo CT</label>
                                                                        <div class="col-md-9">
                                                                            <select name="foo" class="form-control">
                                                                                <option value="1">Option 1</option>
                                                                                <option value="1">Option 2</option>
                                                                                <option value="1">Option 3</option>
                                                                            </select>
                                                                            <span class="help-block"> This field has error. </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Validade</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Diretorio</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Documentação</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"> </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                            <!--/row-->
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

<!--                         <div class="tab-pane" id="tab_5">
                                <div class="portlet-body form">

                                        <form action="#" class="form-horizontal">
                                            <div class="form-body">
                                                <h3 class="form-section" style="margin-top: 0px;">Person Info</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Chee Kin">
                                                                <span class="help-block"> This is inline help </span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group has-error">
                                                            <label class="control-label col-md-3">Last Name</label>
                                                            <div class="col-md-9">
                                                                <select name="foo" class="form-control">
                                                                    <option value="1">Option 1</option>
                                                                    <option value="1">Option 2</option>
                                                                    <option value="1">Option 3</option>
                                                                </select>
                                                                <span class="help-block"> This field has error. </span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gender</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control">
                                                                    <option value="">Male</option>
                                                                    <option value="">Female</option>
                                                                </select>
                                                                <span class="help-block"> Select your gender. </span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Date of Birth</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy"> </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Category</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="Category 1">Category 1</option>
                                                                    <option value="Category 2">Category 2</option>
                                                                    <option value="Category 3">Category 5</option>
                                                                    <option value="Category 4">Category 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Membership</label>
                                                            <div class="col-md-9">
                                                                <div class="radio-list">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="optionsRadios2" value="option1" /> Free </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="optionsRadios2" value="option2" checked/> Professional </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <h3 class="form-section">Address</h3>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address 1</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address 2</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">City</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"> </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">State</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"> </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Post Code</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control"> </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Country</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control">
                                                                    <option>Country 1</option>
                                                                    <option>Country 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                    </div>
                            </div> -->

                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Voltar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->


