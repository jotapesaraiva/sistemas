<!--                         <li class="heading">
                            <h3 class="uppercase">Indicadores</h3>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-graph"></i>
                                <span class="title">Mantis</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">CGAQ</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Mes Atual</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 6 meses</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 12 meses</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">CGRE</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Mes Atual</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 6 meses</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 12 meses</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">CGPS</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Mes Atual</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 6 meses</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 12 meses</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">CGDA</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Mes Atual</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 6 meses</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="manutencao_page.php" class="nav-link ">Ultimos 12 meses</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'sistema'); ?>">
                            <?php echo anchor('indicadores/sistema','<i class="icon-screen-desktop"></i>Sistema','class="nav-link"'); ?>
                            <?php echo span_segment(2, 'sistema'); ?>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'nfae'); ?>">
                            <?php echo anchor('indicadores/nfae','<i class="icon-screen-desktop"></i>NFAE','class="nav-link"'); ?>
                            <?php echo span_segment(2, 'nfae'); ?>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'arrecadacao'); ?>">
                            <?php echo anchor('indicadores/arrecadacao','<i class="icon-screen-desktop"></i>Arrecadacao','class="nav-link"'); ?>
                            <?php echo span_segment(2, 'arrecadacao'); ?>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'projetos'); ?>">
                            <?php echo anchor('indicadores/projetos','<i class="icon-screen-desktop"></i>PROJETOS','class="nav-link"'); ?>
                            <?php echo span_segment(2, 'projetos'); ?>
                        </li> -->

<!--
//
//=====================================================DASHBOARDS ANALITICOS========================================================================================
//
 -->
<!--                         <li class="heading">
                            <h3 class="uppercase">DASHBOARDS ANALITICOS</h3>
                        </li>
                         <li class="nav-item <?php echo active_segment(2, 'kibana'); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-screen-desktop"></i>
                                <span class="title">Kibana</span>
                                <?php echo span_segment(2, 'kibana'); ?>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo active_segment(3, 'pservico'); ?>">
                                    <?php echo anchor('dashboard/kibana/pservico','<i class="icon-screen-desktop"></i>Pservico','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'pservico'); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo active_segment(3, 'sapbo'); ?>">
                            <?php echo anchor('procesos/plano/sapbo','<i class="icon-screen-desktop"></i>SAPBO','class="nav-link"'); ?>
                            <?php echo span_segment(3, 'sapbo'); ?>
                        </li> -->
<!--
//
//=====================================================PROCESSOS========================================================================================
//
 -->
<!--                         <li class="heading">
                            <h3 class="uppercase">PROCESSOS</h3>
                        </li>
                        <li class="nav-item <?php echo active_segment(2, 'plano'); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Plano Operacional</span>
                                <?php echo span_segment(2, 'plano'); ?>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo active_segment(3, 'cadastrar'); ?>">
                                    <?php echo anchor('procesos/plano/cadastrar','<i class="icon-screen-desktop"></i>Cadastrar','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'cadastrar'); ?>
                                </li>
                                <li class="nav-item <?php echo active_segment(3, 'consultar'); ?>">
                                    <?php echo anchor('procesos/plano/consultar','<i class="icon-screen-desktop"></i>Consultar','class="nav-link"'); ?>
                                    <?php echo span_segment(3, 'consultar'); ?>
                                </li>
                            </ul>
                        </li> -->