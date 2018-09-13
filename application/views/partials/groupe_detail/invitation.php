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