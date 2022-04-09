<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="clearfix"> </div>
       <div class="page-container">
            <!-- MENU LATERAL -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li>

<!--
//
//=====================================================CATÁLOGOS========================================================================================
//
 -->
                        <li class="heading">
                            <h3 class="uppercase">Catálogos</h3>
                        </li>

                        <li class="nav-item <?php echo active_segment(2, 'sistemas'); ?>">
                            <?php echo anchor('catalogo/sistemas', '<i class="icon-screen-desktop"></i><span class="title">Sistemas</span>', 'class="nav-link"'); ?>
                            <?php echo span_segment(2, 'sistemas'); ?>
                        </li>
<!--
//
//=====================================================CONFIGURACOES========================================================================================
//
 -->
                        <li class="heading">
                            <h3 class="uppercase">CONFIGURAÇÕES</h3>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'infraestrutura'); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-wrench"></i>
                                <span class="title">infraestruturas</span>
                                <?php echo span_segment(2, 'infraestrutura'); ?>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo active_segment(3, 'weblogic'); ?>">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-wrench"></i>
                                        <span class="title">Weblogic</span>
                                        <?php echo span_segment(3, 'weblogic'); ?>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php echo active_segment(4, 'servico'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/weblogic/servico','<i class="icon-screen-desktop"></i> Aplicação','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'servico'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'cluster'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/weblogic/cluster','<i class="icon-screen-desktop"></i> Cluster','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'cluster'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'managed_server'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/weblogic/managed_server','<i class="icon-screen-desktop"></i> Managed Server','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'managed_server'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'datasource'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/weblogic/datasource','<i class="icon-screen-desktop"></i> Data Source','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'datasource'); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'realtime'); ?>">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-wrench"></i>
                                        <span class="title">Real Time</span>
                                        <?php echo span_segment(3, 'weblogic'); ?>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php echo active_segment(4, 'application'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/realtime/applications','<i class="icon-screen-desktop"></i> Applications','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'applications'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'cluster'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/realtime/clusters','<i class="icon-screen-desktop"></i> Clusters','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'clusters'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'servers'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/realtime/servers','<i class="icon-screen-desktop"></i> Servers','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'servers'); ?>
                                        </li>
                                        <li class="nav-item <?php echo active_segment(4, 'datasource'); ?>">
                                            <?php echo anchor('configuracoes/infraestrutura/realtime/datasources','<i class="icon-screen-desktop"></i> Data Sources','class="nav-link"'); ?>
                                            <?php echo span_segment(4, 'datasources'); ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php echo active_segment(2, 'itens'); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-gears"></i>
                                <span class="title">Itens</span>
                                <?php echo span_segment(2, 'itens'); ?>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                              <li class="nav-item <?php echo active_segment(3, 'weblogic'); ?>">
                                  <?php echo anchor('configuracoes/itens/weblogic','<i class="icon-screen-desktop"></i> Weblogic','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'weblogic'); ?>
                              </li>
                                <li class="nav-item <?php echo active_segment(3, 'servidor'); ?>">
                                    <?php echo anchor('configuracoes/itens/servidor','<i class="icon-screen-desktop"></i> Servidor','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'servidor'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'certificado'); ?>">
                                    <?php echo anchor('configuracoes/itens/certificado','<i class="icon-screen-desktop"></i> Certificado','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'certificado'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'area_negocio'); ?>">
                                    <?php echo anchor('configuracoes/itens/area_negocio','<i class="icon-screen-desktop"></i> Área de negócio','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'area_negocio'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'ambiente'); ?>">
                                    <?php echo anchor('configuracoes/itens/ambiente','<i class="icon-screen-desktop"></i> Ambientes','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'ambiente'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'contexto'); ?>">
                                    <?php echo anchor('configuracoes/itens/contexto','<i class="icon-screen-desktop"></i> Contextos','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'contexto'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'repositorio'); ?>">
                                    <?php echo anchor('configuracoes/itens/repositorio','<i class="icon-screen-desktop"></i> Repositorios','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'repositorio'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'tecnologia'); ?>">
                                    <?php echo anchor('configuracoes/itens/tecnologia','<i class="icon-screen-desktop"></i> Tecnologias','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'tecnologia'); ?>
                                </li>
<!--                                 <li class="nav-item <?php echo active_segment(3, 'tipo_certificado'); ?>">
                                    <?php echo anchor('configuracoes/itens/tipo_certificado','<i class="icon-screen-desktop"></i> Tipo Certificado','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'tipo_certificado'); ?>
                                </li> -->
                            </ul>
                        </li>
<?php if(super_admin()): ?>
<!--
//
//=====================================================ADMINISTRAÇÃO========================================================================================
//
 -->
                        <li class="heading">
                           <h3 class="uppercase">Administração</h3>
                        </li>
                          <li class="nav-item <?php echo active_segment(2, 'site'); ?>">
                             <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="icon-screen-desktop"></i>
                                 <span class="title">Site</span>
                                 <?php echo span_segment(2, 'site'); ?>
                                 <span class="arrow"></span>
                             </a>
                             <ul class="sub-menu">
                              <li class="nav-item <?php echo active_segment(3, 'banco'); ?>">
                                  <?php echo anchor('administracao/site/banco','<i class="fa fa-database"></i> Banco','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'banco'); ?>
                              </li>
                              <li class="nav-item <?php echo active_segment(3, 'ldap'); ?>">
                                  <?php echo anchor('administracao/site/ldap','<i class="fa fa-windows"></i> LDAP','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'ldap'); ?>
                              </li>
                              <li class="nav-item <?php echo active_segment(3, 'perfil'); ?>">
                                  <?php echo anchor('administracao/site/perfil','<i class="fa fa-list-ul"></i> Perfil','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'perfil'); ?>
                              </li>
                              <li class="nav-item <?php echo active_segment(3, 'sistema'); ?>">
                                  <?php echo anchor('administracao/site/sistema','<i class="fa fa-file-code-o"></i> Sistema','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'sistema'); ?>
                              </li>
                              <li class="nav-item <?php echo active_segment(3, 'usuarios'); ?>">
                                  <?php echo anchor('administracao/site/usuarios','<i class="fa fa-group"></i> Usuario','class="nav-link"'); ?>
                                  <?php echo span_segment(3, 'usuarios'); ?>
                              </li>
                             </ul>
                          </li>
                          <li class="nav-item <?php echo active_segment(2, 'ferramentas'); ?>">
                             <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="icon-screen-desktop"></i>
                                 <span class="title">Ferramentas</span>
                                 <?php echo span_segment(2, 'ferramentas'); ?>
                                 <span class="arrow"></span>
                             </a>
                             <ul class="sub-menu">
                                    <li class="nav-item <?php echo active_segment(3, 'auditoria'); ?>">
                                        <?php echo anchor('administracao/ferramentas/auditoria','<i class="fa fa-shield"></i> Auditoria','class="nav-link"'); ?>
                                        <?php echo span_segment(3, 'auditoria'); ?>
                                    </li>
                                    <li class="nav-item <?php echo active_segment(3, 'backup'); ?>">
                                        <?php echo anchor('administracao/ferramentas/backup','<i class="fa fa-copy"></i> Backup','class="nav-link"'); ?>
                                        <?php echo span_segment(3, 'backup'); ?>
                                    </li>
<!--                                     <li class="nav-item <?php echo active_segment(3, 'cron'); ?>">
                                        <?php echo anchor('administracao/ferramentas/cron','<i class="fa fa-clock-o"></i> Cron','class="nav-link"'); ?>
                                        <?php echo span_segment(3, 'cron'); ?>
                                    </li>
                                    <li class="nav-item <?php echo active_segment(3, 'logs'); ?>">
                                        <?php echo anchor('administracao/ferramentas/logs','<i class="fa fa-code"></i> Logs','class="nav-link"'); ?>
                                        <?php echo span_segment(3, 'logs'); ?>
                                    </li>
                                    <li class="nav-item <?php echo active_segment(3, 'migrate'); ?>">
                                        <?php echo anchor('administracao/ferramentas/migrate','<i class="icon-layers"></i> Migrate','class="nav-link"'); ?>
                                        <?php echo span_segment(3, 'migrate'); ?>
                                    </li> -->
                               </ul>
                           </li>
<?php endif; ?>
                    </ul>
                </div>
            </div>


<!-- /* End of file sidebar.php */ -->
<!-- /* Location: ./application/views/template/sidebar.php */ -->