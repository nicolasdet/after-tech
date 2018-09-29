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
                            <span class="dropdown__trigger h2 user_menu_title">Users</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                        <li>
                                            <a href="admin/user/gestion">
                                                Administration des users  
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
                                            <a href="admin/groupe/gestion">
                                                Administration des groupes 
                                            </a>
                                        </li>                                 
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <span class="dropdown__trigger h2 user_menu_title">Evenement</span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical ml-5">
                                        <li>
                                            <a href="admin/event/gestion">
                                                Administration des Evenements 
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
                        <span class="btn__text">Ce déconnecter</span>
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