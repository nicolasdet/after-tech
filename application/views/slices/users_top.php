        <div class="nav-container nav-container--sidebar">
            <div class="nav-sidebar-column bg--dark">
                <div class="text-center text-block">
                    <a href="index.html">
                        <img alt="logo" id="logo_user" class="logo" src="public/assets/img/logo3.jpg" />
                    </a>
                </div>
                <hr>
                <div class="text-block">
                    <ul class="menu-vertical">
                       <li class="dropdown">
                            <span class="dropdown__trigger h2 user_menu_title">Mon Profil</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                                        <li>
                                                            <a href="user">
                                                            Profil
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="user/update">
                                                                Modifier mon profil
                                                            </a>
                                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <span class="dropdown__trigger h2 user_menu_title">Groupes</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                        <li>
                                            <a href="user/groupe">
                                                Mes groupes
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user/groupe/recherche">
                                                Rechercher un groupe
                                            </a>
                                        </li>  
                                        <li>
                                            <a href="user/groupe/create">
                                                Crée un groupe
                                            </a>
                                        </li>    
                                        <li>
                                            <a href="user/groupe/invitation">
                                                Mes invitations
                                            </a>
                                        </li>                                  
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <span class="dropdown__trigger h2 user_menu_title">Entreprises</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                        <li>
                                            <a href="user">
                                                Mon Entreprise
                                            </a>
                                        </li>                               
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <span class="dropdown__trigger h2 user_menu_title">Evenements</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                        <li>
                                            <a href="user/events/all">
                                                Mes Evenements
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="text-block">
                    <a class="btn block btn--primary type--uppercase" id="user_btn_deconnecter" href="/user?disconnect=disconnect">
                        <span class="btn__text">Se déconnecter</span>
                    </a>
                </div>
            
            </div>
            <div class="nav-sidebar-column-toggle visible-xs visible-sm" data-toggle-class=".nav-sidebar-column;active">
                <i class="stack-menu"></i>
            </div>
        </div>

               <div class="background-image-holder background-image-user">
                    <img alt="background" src="public/assets/img/afterWorkHands.jpg" />
                </div>


