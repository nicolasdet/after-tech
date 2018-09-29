<div id="admin_groupe">
    <section id="custimSection">
        <div class="container">
              <h2> Gestion des utilisateurs </h2>
                             <?php 
                                if(!empty($allUsers)):
                              ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($allUsers as $unUser) : #var_dump($uneIvitation); ?>
                                    <tr>
                                        <td><?= $unUser->user_id ?></td>

                                        <td><?= $unUser->user_nom ?></td>

                                        <td><?= $unUser->user_prenom ?></td>
            <td class="row">    
            <div class="col-md-3">     
            <div class="modal-instance" id="modalCréeEvement">
                                <a class="modal-trigger" href="#">
                                    <button type="submit" class="btn btn-info">
                                         Gerer un utilisateur
                                    </button>
                                </a>
                <div class="modal-container">
                        <div class="modal-content width-50">
                            <div class="boxed boxed--lg">
                                <h2>modifier un utilisateur</h2>
                                <hr class="short">
                                <p class="lead">
                                <form method="POST" action="admin/user/change/<?= $unUser->user_id ?>">

                                            <?=  drawInput($unUser->form['nom']); ?>
                                            <?=  drawInput($unUser->form['prenom']); ?>
                                            <?=  drawInput($unUser->form['email']); ?>

                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">
                                                    Modifier l'utilisateur
                                                </button>  
                                            </div>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="/admin/user/delete/<?= $unUser->user_id ?>">  
                                                <button type="button" class="btn btn-danger button_invit">
                                                    supprimer
                                                </button>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                    </table>
                                <?php else: ?>
                                    <p> pas d'utilisateur </p>
                                <?php endif; ?>
        </div>
    </section>
</div>