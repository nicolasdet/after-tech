 

<!--
 <div id="user_groupe">
 	  <section id="section_groupe_create">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <h1>Groupe <?= $groupe_detail->groupes_nom ?></h1>
                            <p>Groupe <?= $groupe_detail->groupes_description ?></p>
                        </div>
                    </div>
                </div>
            </section>

    <div class="row" >
    
    <section class="col-md-10">
        <div id="detail-profile" class="account-tab">
            <div class="col-md-5 d-flex justify-content-center">
                <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" src="" />
            </div>
        </div>
        <div class="hidden groupes_events account-tab" id="detail-events" >
 
                            <div class="boxed boxed--border">
                                <h4>Prochain evenement </h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <p>Pas d'évenement à venir</p>
                                                <span class="type--fine-print"></span>
                                                <p>
                                                    clique ici pour en crée ou en rejoindre
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>        
        </div>
        <div class="hidden account-tab col-md-10 d-flex padding11 persoChatbox" id="detail-chat">
               
                       <div class="row chatBox">

                        <div class="col-sm-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>Nicolas</strong> <span class="text-muted">commented 5 days ago</span>
                        </div>
                        <div class="panel-body">
                            Salut
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>kevin</strong> <span class="text-muted">commented 2 days ago</span>
                        </div>
                        <div class="panel-body">
                       on se fait un after-work demain ?  
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="widget-area no-padding blank pt-2">
                                    <div class="status-upload">
                                        <form>
                                            <textarea placeholder="Un message ? un after work ? " ></textarea>
                                            <ul>
                                    
                                            </ul>
                                            <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Envoyer</button>
                                        </form>
                                    </div>
                        </div>              
        </div>

    </section>
    <section class="col-md-2">
                                    <div class="text-block">
                                    <ul class="menu-vertical sideMenuGroupe">
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-profile;hidden">Groupe</a>
                                        </li>
    
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-events;hidden">Evennements</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden">Chat</a>
                                        </li>
                                        </li> 
                                        <?php if($admin):  ?>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden">Gestion</a>

                                        <?php endif; ?>
                                    </ul>
                                </div>
    </section>

    </div>
 </div>


-->


            <section class="bg--secondary space--sm conversation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="boxed boxed--lg boxed--border" data-scroll-class="180px:pos-fixed">
                                <div class="text-block text-center">
                                    <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" src="" />
                                    <span class="h4"><?= $groupe_detail->groupes_nom ?></span>
                                    <span class="h5"><?= $groupe_detail->groupes_description ?></span>
                                </div>
                                <hr>
                                <div class="text-block">
                                    <ul class="menu-vertical">
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-profile;hidden">Groupe</a>
                                        </li>
    
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-events;hidden">Evennements</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden">Chat</a>
                                        </li>
                                        
                                        <?php if($admin):  ?>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden"><i class="material-icons groupe_icon">person</i> Gestion</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden"><i class="material-icons groupe_icon">person</i>Crée un evenement</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-chat;hidden"><i class="material-icons groupe_icon">person</i>Invitations</a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-8 hidden account-tab" id="detail-chat">
                            <div class="conversation__head boxed boxed--lg bg--primary">
                                <h4>Espace de discution du groupe <?= $groupe_detail->groupes_nom ?> </h4>
                                <span>26juillet</span>
                            </div>
                            <div class="conversation__reply boxed boxed--border">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea rows="2" name="reply" placeholder="Type reply message here"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn">Envoyer le message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="comments conversation__comments">
                                <ul class="comments__list">
                                    <li>
                                        <div class="comment">
                                            <div class="comment__avatar">
                                                <img alt="Image" src="public/assets/img/avatar-round-2.png" />
                                            </div>
                                            <div class="comment__body">
                                                <h5 class="type--fine-print">You</h5>
                                                <div class="comment__meta">
                                                    <span>14th March 2017, 2:04pm</span>
                                                </div>
                                                <p>
                                                    Responsive hacker intuitive driven waterfall is so 2000 and late intuitive cortado bootstrapping venture capital. Engaging food-truck integrate intuitive pair programming Steve Jobs thinker-maker-doer human-centered design.
                                                </p>
                                                <p>
                                                    Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                                </p>
                                            </div>
                                        </div>
                                        <!--end comment-->
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="comment__avatar">
                                                <img alt="Image" src="public/assets/img/avatar-round-1.png" />
                                            </div>
                                            <div class="comment__body">
                                                <h5 class="type--fine-print">Anne Brady</h5>
                                                <div class="comment__meta">
                                                    <span>14th March 2017, 1:08pm</span>
                                                </div>
                                                <p>
                                                    Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                                </p>
                                            </div>
                                        </div>
                                        <!--end comment-->
                                    </li>
                                </ul>
                            </div>
                            <!--end comments-->
                        </div>
                        <div class="col-lg-8 hidden account-tab " id="detail-events">
                            <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4>Prochain evenement  <span class="countdown" data-date="03/13/2017"></span></h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <p>Pas d'évenement à venir</p>
                                                <span class="type--fine-print"></span>
                                                <p>
                                                    clique ici pour en crée ou en rejoindre
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 account-tab " id="detail-profile">
                            <div class="titleGroupe p-4 bgWheat"> 
                                  <ul class="row row--list clearfix text-center">
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Evenements</span>
                                        <span class="h3">0</span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Membres</span>
                                        <span class="h3">1</span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Message</span>
                                        <span class="h3">0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>




                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>