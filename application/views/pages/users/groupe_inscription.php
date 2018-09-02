 <div id="user_groupe">
    <section>
                <div class="container">

                                    <?php 
                                        if(!empty($listeInvitations)):
                                     ?>
                        <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th >Numero de l'invitation</th>
                                        <th>groupe</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listeInvitations as $uneIvitation) : ?>
                                    <tr>
                                        <td><?= $uneIvitation->id ?></td>
                                        <td><?= $uneIvitation->groupe->groupes_nom ?></td>
                                        <td>
                                        <?php if($uneIvitation->type == INVITATION_TYPE_USER): ?>
                                            Invitation envoyée, en attente de réponse.
                                        <?php elseif($uneIvitation->type == INVITATION_TYPE_GROUPE): ?>
                                            Invitation reçut
                                        <?php endif; ?>
                                        </td>
                                        <td>    
                                        <?php if($uneIvitation->type == INVITATION_TYPE_GROUPE): ?>
                                            <div class="row">
                                                 <a class="col-md-6" 
                                                    href="user/groupe/invitation/ok/<?= $uneIvitation->groupe->groupes_id ?>">
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
                    </section>
                </div>