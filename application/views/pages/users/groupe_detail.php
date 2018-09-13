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


                        <?php
                            partial('groupe_detail/chat', ['groupe_detail' => $groupe_detail ]);
                        ?>
                        <?php
                            partial('groupe_detail/events', ['listEvents' => $listEvents ]);
                        ?>

                        <?php
                            partial('groupe_detail/profile', ['groupe_detail' => $groupe_detail ]);
                        ?>

                        <?php
                            partial('groupe_detail/invitation', ['invitationsGroupe' => $invitationsGroupe ]);
                        ?>                      

                        <?php
                            partial('groupe_detail/gestion', ['groupe_detail' => $groupe_detail ]);
                        ?>  
                        <?php
                            partial('groupe_detail/createEvent', ['groupe_detail' => $groupe_detail ]);
                        ?>  





                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>


