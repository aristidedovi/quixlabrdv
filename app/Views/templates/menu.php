<!--**********************************
       Sidebar start
   ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Tableau de bord</li>
            <li class="nav-label">
            <span style="text-transform: uppercase; font-size: small;"><?= $_SESSION['nomComplet']; ?></span>
            <span style="text-transform: uppercase; font-size: small;"> &nbsp;<?= $_SESSION['type']; ?></span>
            <em>
                (<?php
                if($_SESSION['id_type'] == 3){
                    echo $_SESSION['domaine'];
                }elseif ($_SESSION['id_type'] == 2){
                    echo $e->service;
                }elseif ($_SESSION['id_type'] == 1){
                    echo "Administrateur";
                }
                ?>)
            </em>
            </li>
            <?php if($_SESSION["id_type"] == 1){?>
                <li>
                    <a href="index.php?p=admin.employer.index" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Accueil</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon-grid menu-icon"></i><span class="nav-text">gestion employer</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="?p=admin.employer.add&type=1">Nouveau admin</a></li>
                        <li><a href="?p=admin.employer.add&type=3">Nouveau médecin</a></li>
                        <li><a href="?p=admin.employer.add&type=2">Nouveau sécretaire</a></li>
                        <li><a href="index.php?p=admin.employer.lister">Lister des employés</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon-grid menu-icon"></i><span class="nav-text">gestion des rendez-vous</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="?p=admin.employer.stats">Les statistiques</a></li>
                        <li><a href="?p=admin.rendezVous.lister">Rendez-vous du jour</a></li>
                        <li><a href="?p=admin.rendezVous.listerTotal">Liste des rendez-vous</a></li>
                        <li><a href="?p=admin.rendezVous.calendrier">Calendrier des rendez-vous</a></li>
                        <li><a href="?p=admin.rendezVous.effectuer">Rendez-vous effectuer</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Les services & autres</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.php?p=admin.service.index">Lister les services</a></li>
                        <li><a href="index.php?p=admin.domaine.index">Lister les domaines</a></li>
                        <li><a href="index.php?p=admin.typeEmployer.index">Lister les type employer</a></li>
                    </ul>
                </li>
            <?php }elseif ($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){?>
                <li>
                    <a href="index.php?p=admin.rendezVous.index" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Accueil</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon-grid menu-icon"></i><span class="nav-text">Gestion Rendez-vous</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.php?p=admin.rendezVous.add">Nouveau Rendez-vous</a></li>
                        <li><a href="index.php?p=admin.rendezVous.lister">Liste des rendez-vous du jour</a></li>
                        <li><a href="index.php?p=admin.rendezVous.listerTotal">Liste des rendez-vous</a></li>
                        <li><a href="index.php?p=admin.rendezVous.calendrier">Calendrier</a></li>
                        <li><a href="index.php?p=admin.rendezVous.effectuer">Rendez-vous effectuer</a></li>

                    </ul>
                </li>
            <?php }elseif ($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){?>
            <li>
                <a href="index.php?p=admin.medecin.index" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Accueil</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Gestion Rendez-vous</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.php?p=admin.medecin.lister">Lister rendez vous du jour</a></li>
                    <li><a href="index.php?p=admin.medecin.listerTotal">Lister des rendez vous</a></li>
                    <li><a href="index.php?p=admin.medecin.calendrier">Calendrier</a></li>
                    <li><a href="index.php?p=admin.medecin.effectuer">Rendez-vous effectuer</a></li>
                </ul>
            </li>
            <?php }
            ?>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Mon profil</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="index.php?p=admin.employer.profil">Voire profil</a></li>
                        <li><a href="index.php?p=admin.employer.edit">Modifier le profil</a></li>
                    </ul>
            </li>
            <li>
                <a href="index.php?p=admin.employer.logout" aria-expanded="false">
                    <i class="icon-logout menu-icon"></i><span class="nav-text">Deconnecter</span>
                </a>
            </li>
       <!--     <li class="mega-menu mega-menu-sm">
                        <div class="card-body">
                            <h4 class="card-title">Blague du jour <span style="font-size:30px">&#x1F602;</span></br></h4>
                            <div class="general-button">
                                <iframe src="https://www.blagues-en-stock.org/compl%C3%A9ments/blague-du-jour.php"
                                        width="100%" height="100%" border="0" marginwidth="0" marginheight="0" hspace="0"
                                        vspace="0" frameborder="0" scrolling="yes">

                                </iframe>
                                <br>
                                <div style="margin-bottom: 6px;" align="center">
                                    <a href="http://m3.moostik.net/img/?pseudo=bdj2&amp;redirige=https://www.blagues-en-stock.org&amp"
                                       title="blagues-en-stock.org : les meilleurs blagues"
                                       style="{color:FF7F50; text-decoration:none; font-weight: normal; font-size:10px ; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;}">
                                        La blague du jour par <b>blagues-en-stock.org</b>
                                    </a>
                                </div>
                            </div>
                        </div>
            </li>-->
          <!--  <li>
          <li class="nav-label">Apps</li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Administration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.php?p=admin.posts.index">Articles</a></li>
                    <li><a href="index.php?p=admin.categories.index">Categories</a></li>
                     <li><a href="./index-2.html">Home 2</a></li>
                </ul>
            </li>-->
          <!--  <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./layout-blank.html">Blank</a></li>
                    <li><a href="./layout-one-column.html">One Column</a></li>
                    <li><a href="./layout-two-column.html">Two column</a></li>
                    <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                    <li><a href="./layout-vertical.html">Vertical</a></li>
                    <li><a href="./layout-horizontal.html">Horizontal</a></li>
                    <li><a href="./layout-boxed.html">Boxed</a></li>
                    <li><a href="./layout-wide.html">Wide</a></li>


                    <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                    <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./email-inbox.html">Inbox</a></li>
                    <li><a href="./email-read.html">Read</a></li>
                    <li><a href="./email-compose.html">Compose</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">Profile</a></li>
                    <li><a href="./app-calender.html">Calender</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./chart-flot.html">Flot</a></li>
                    <li><a href="./chart-morris.html">Morris</a></li>
                    <li><a href="./chart-chartjs.html">Chartjs</a></li>
                    <li><a href="./chart-chartist.html">Chartist</a></li>
                    <li><a href="./chart-sparkline.html">Sparkline</a></li>
                    <li><a href="./chart-peity.html">Peity</a></li>
                </ul>
            </li>
            <li class="nav-label">UI Components</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./ui-accordion.html">Accordion</a></li>
                    <li><a href="./ui-alert.html">Alert</a></li>
                    <li><a href="./ui-badge.html">Badge</a></li>
                    <li><a href="./ui-button.html">Button</a></li>
                    <li><a href="./ui-button-group.html">Button Group</a></li>
                    <li><a href="./ui-cards.html">Cards</a></li>
                    <li><a href="./ui-carousel.html">Carousel</a></li>
                    <li><a href="./ui-dropdown.html">Dropdown</a></li>
                    <li><a href="./ui-list-group.html">List Group</a></li>
                    <li><a href="./ui-media-object.html">Media Object</a></li>
                    <li><a href="./ui-modal.html">Modal</a></li>
                    <li><a href="./ui-pagination.html">Pagination</a></li>
                    <li><a href="./ui-popover.html">Popover</a></li>
                    <li><a href="./ui-progressbar.html">Progressbar</a></li>
                    <li><a href="./ui-tab.html">Tab</a></li>
                    <li><a href="./ui-typography.html">Typography</a></li>
                    <!-- </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                    </a>
                    <ul aria-expanded="false"> -->
                <!--    <li><a href="./uc-nestedable.html">Nestedable</a></li>
                    <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="./uc-toastr.html">Toastr</a></li>
                </ul>
            </li>
            <li>
                <a href="widgets.html" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                </a>
            </li>
            <li class="nav-label">Forms</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./form-basic.html">Basic Form</a></li>
                    <li><a href="./form-validation.html">Form Validation</a></li>
                    <li><a href="./form-step.html">Step Form</a></li>
                    <li><a href="./form-editor.html">Editor</a></li>
                    <li><a href="./form-picker.html">Picker</a></li>
                </ul>
            </li>
            <li class="nav-label">Table</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                    <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                </ul>
            </li>
            <li class="nav-label">Pages</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./page-login.html">Login</a></li>
                    <li><a href="./page-register.html">Register</a></li>
                    <li><a href="./page-lock.html">Lock Screen</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="./page-error-404.html">Error 404</a></li>
                            <li><a href="./page-error-403.html">Error 403</a></li>
                            <li><a href="./page-error-400.html">Error 400</a></li>
                            <li><a href="./page-error-500.html">Error 500</a></li>
                            <li><a href="./page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>-->

    </div>
</div>

<!--**********************************
    Sidebar end
***********************************-->