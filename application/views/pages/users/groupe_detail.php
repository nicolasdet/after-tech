           <section class="bg--secondary space--sm conversation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="boxed boxed--lg boxed--border" data-scroll-class="180px:pos-fixed">
                                <div class="text-block text-center">
                                    <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" src="<?= isset($groupe_detail->groupes_img) ? $groupe_detail->groupes_img : '' ?>" />
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
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-gestion;hidden"><i class="material-icons groupe_icon">person</i> Gestion</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-createEvent;hidden"><i class="material-icons groupe_icon">person</i>Crée un evenement</a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#detail-invitation;hidden"><i class="material-icons groupe_icon">person</i>Invitations</a>
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
                        <div class="col-lg-8 hidden account-tab " id="detail-profile">
                            <div class="titleGroupe p-4 bgWheat"> 
                                  <ul class="row row--list clearfix text-center">
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Evenements</span>
                                        <span class="h3">0</span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Membres</span>
                                        <span class="h3"><?= $groupe_detail->membres['count'] ?></span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Message</span>
                                        <span class="h3">0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 hidden  account-tab " id="detail-invitation">
                            <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4>Administration des invitations</h4>
                                  <hr />
                                 <h5 class="mt-3">Inviter un utilisateur</h5>
                            <form method="POST" action="user/groupe/invitation-groupe/<?= $groupe_detail->groupes_id ?>/">
                                <?=  drawInput($getSearchUserForm['nom']); ?>
                                 <div class="col-md-3">
                                <button type="submit" class="btn btn--primary">Rechercher</button>
                                </div>
                            </form>

                            <hr />
                            <h5 class="mt-3">Liste des invitations</h5>

                             <?php 
                                        if(!empty($invitationsGroupe)):
                                     ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th >id</th>
                                        <th>utilisateur</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($invitationsGroupe as $uneIvitation) : #var_dump($uneIvitation); ?>
                                    <tr>
                                        <td><?= $uneIvitation->id ?></td>
                                        <td><?= $uneIvitation->user_invit->user_nom ?></td>
                                        <td>
                                        <?php if($uneIvitation->type == INVITATION_TYPE_USER): ?>
                                            Invitation reçut
                                        <?php elseif($uneIvitation->type == INVITATION_TYPE_GROUPE): ?>
                                            Invitation envoyée
                                        <?php endif; ?>
                                        </td>
                                        <td>    
                                        <?php if($uneIvitation->type == INVITATION_TYPE_USER): ?>
                                            <div class="row">
                                                 <a class="col-md-6" 
                                                    href="user/groupe/invitation/ok/<?= $uneIvitation->groupe->groupes_id ?>/<?= $uneIvitation->user_id ?>">
                                                  <button type="button" class="btn btn-success button_invit">Accepter</button>
                                                 </a>
                                                 <a class="col-md-6"
                                                 href="user/groupe/invitation/refuser/<?= $uneIvitation->groupe->groupes_id ?>">
                                                  <button type="button" class="btn btn-danger button_invit">Refuser</button>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                               <a class="col-md-6"
                                                 href="user/groupe/invitation/annuler/<?= $uneIvitation->groupe->groupes_id ?>">
                                                  <button type="button" class="btn btn-danger button_invit">annuler</button>
                                                </a>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                    </table>

                                <?php else: ?>
                                    <p> pas d'invitations </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-8 hidden  account-tab " id="detail-gestion">
                            <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4>Gestion du groupe</h4>
                                  <hr />
                                 <h5 class="mt-3">Modifier les informations gennerales</h5>
                                  <form method="POST" action="user/groupe/update/<?= $groupe_detail->groupes_id ?>">
                                     <?=  drawInput($getUpdateGroupeForm['nom']); ?>
                                     <?=  drawInput($getUpdateGroupeForm['detail']); ?>
                                 <div class="col-md-3">
                                <button type="submit" class="btn btn--primary">modifier</button>
                                </div>
                            </form>

                            <hr class="mt-5" />
                            <h5 class="mt-3">Modifier l'image</h5>
                            <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" 
                                src="<?= isset($groupe_detail->groupes_img) ? $groupe_detail->groupes_img : '' ?>" />
                            <?php echo form_open_multipart("user/groupe/update/do_upload/".$groupe_detail->groupes_id);?>
                                        <input type="file" class="mt-1" id="upl_img_user" name="userfile" size="20" />
                                        <br /><br />
                                        <button type="submit" class="btn btn--primary" >telecharger l'image </button>
                                        </form>
                            <hr class="mt-5" />
                            <h5 >Gestion des utilisateurs</h5>
                              <?php 
                                        if(!empty($groupe_detail->membres['users'])):
                                     ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th >nom</th>
                                        <th>prenom</th>
                                        <th>status</th>
                                        <th>options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($groupe_detail->membres['users'] as $unUser) : #var_dump($unUser->user_model); ?>
                                    <tr>
                                        <td><?= $unUser->user_model->user_nom ?></td>
                                        <td><?= $unUser->user_model->user_prenom ?></td>
                                        <td> 
                                            <?php if($unUser->status == 1): ?>
                                                Administrateur
                                            <?php else: ?>
                                                 Membre 
                                            <?php endif; ?>
                                        </td> 
                                        <td>
                                                <?php if(!$unUser->status == 1): ?>

                                                <a class="col-md-6"
                                                 href="user/groupe/supprimer/<?= $unUser->user_id ?>/<?= $groupe_detail->groupes_id ?>">
                                                  <button type="button" class="btn btn-danger button_invit">Retirer du groupe</button>
                                                </a>

                                                <?php endif; ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                    </table>

                                <?php else: ?>
                                    <p> pas d'utilisateurs </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-8    account-tab " id="detail-createEvent">
                                <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4>Gestion des evenements</h4>
                                  <hr />

                               <div class="modal-instance " id="modalCréeEvement">
                                <a class=" modal-trigger" href="#">
                                    <button type="submit" class="btn btn--primary">Crée un evement</button>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content width-50">
                                        <div class="boxed boxed--lg">
                                            <h2>Crée un evenement</h2>
                                            <hr class="short">
                                            <p class="lead">
                                                <form method="POST" action="user/event/create/<?= $groupe_detail->groupes_id ?>">
                                                <?=  drawInput($getCreateEventForm['nom']); ?>
                                                <?=  drawInput($getCreateEventForm['description']); ?>
                                                <?=  drawInput($getCreateEventForm['adresse']); ?>
                                                <?=  drawInput($getCreateEventForm['ville']); ?>
                                                <?=  drawInput($getCreateEventForm['date_debut']); ?>
                                                <?=  drawInput($getCreateEventForm['duree']); ?>
                                                <?=  drawSelect($getCreateEventForm['type']); ?>

                                                <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">Crée l'evenement</button>  
                                                </div>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <hr />
                                </div>
                        </div>




                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>


