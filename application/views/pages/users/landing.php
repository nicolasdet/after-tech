                <section class="bg--secondary space--sm">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border">
                                <a class="btn btn--primary btn--icon" id="change_user_info" href="/user/update">
                                    <span class="btn__text">
                                        <i class="icon-Add-File"></i> Mes  informations 
                                    </span>
                                </a>
                                <div class="text-block text-center">
                                    <img alt="avatar" src="<?= $user->user_img ?>" class="image--md" />
                                    <span class="h3"><?= $user->user_nom." ".$user->user_prenom  ?></span>
                                    <span>fonction: </span>
                                </div>
                                <div class="text-block clearfix text-center">
                                    <ul class="row row--list">
                                        <li class="col-md-4">
                                            <span class="type--fine-print block ">Entreprise:</span>
                                            <span>Pas encore d'entreprise</span>
                                        </li>
                                        <li class="col-md-4">
                                            <span class="type--fine-print block">Menbre depuis:</span>
                                            <span>?</span>
                                        </li>
                                        <li class="col-md-4">
                                            <span class="type--fine-print block">Email:</span>
                                            <a href="#"><?= $user->user_email ?></a>
                                        </li>
                                </div>
                                </ul>
                            </div>
                            <div class="boxed boxed--border">
                                <ul class="row row--list clearfix text-center">
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Evenements</span>
                                        <span class="h3">0</span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Groupes</span>
                                        <span class="h3"><?= $listGroupes['count'] ?></span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Message</span>
                                        <span class="h3"><?= $listeMessages['count'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="boxed boxed--border">
                               <?php if(!empty($FirstEvent)): ?>
                                <h4>Prochain evenement dans : <span class=" countdown" data-date="<?= $FirstEvent->events->evenement_debut ?>" data-date-fallback="Timer Done"  data-days-text="jours"></span></h4>
                             
                                <div class="titleGroupe p-2 bgWheat"> 
                                  <h4><?= $FirstEvent->events->evenement_nom ?></h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-7">
                                                <p><?= $FirstEvent->events->evenement_debut ?> <br />  
                                                <?= $FirstEvent->events->evenement_description ?></p>
                                                <span class="type--fine-print"></span>
                                                <div class="d-flex justify-content-start">
                                                <a href="user/event/detail/<?= $FirstEvent->events->evenement_id ?>"> 
                                                    <button type="submit" class="btn btn--primary btn-event">Detail</button>
                                                </a>
                                              
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php else: ?>

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


                            <?php endif; ?>
                            </div>
                            <!--
                            <div class="boxed boxed--border">
                                <h4>Activitée récente</h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <p>Evenement</p>
                                                <span class="type--fine-print">01/03/1996</span>
                                                <p>
                                                    Discourse in writing dealing with a particular point or idea.
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">mode_edit</i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <span class="type--fine-print">14th July, 2017</span>
                                                <a href="#" class="block color--primary">Tips for web typography</a>
                                                <p>
                                                    To write beside or "written beside" is a self-contained unit of a discourse in writing dealing with a particular point or idea.
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                </ul>
                                <a href="#" class="type--fine-print pull-right">View All</a>
                            </div>
                        -->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>