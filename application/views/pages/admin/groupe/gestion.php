<div id="admin_groupe">
    <section id="custimSection">
        <div class="container">
              <h2> Gestion des groupes </h2>
                             <?php 
                                if(!empty($allGroupes)):
                              ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($allGroupes as $unGroupe) : #var_dump($uneIvitation); ?>
                                    <tr>
                                        <td><?= $unGroupe->groupes_id ?></td>

                                        <td><?= $unGroupe->groupes_nom ?></td>

                                        <td><?= $unGroupe->groupes_description ?></td>
            <td class="row">    
            <div class="col-md-8">     
            <div class="modal-instance" id="modalCréeEvement">
                                <a class="modal-trigger" href="#">
                                    <button type="submit" class="btn btn-info">
                                         Gerer le groupe
                                    </button>
                                </a>
                <div class="modal-container">
                        <div class="modal-content width-50">
                            <div class="boxed boxed--lg">
                                <h2>Modifier le groupe</h2>
                                <hr class="short">
                                <p class="lead">
                                <form method="POST" action="admin/groupe/change/<?= $unGroupe->groupes_id ?>">

                                            <?=  drawInput($unGroupe->form['nom']); ?>
                                            <?=  drawInput($unGroupe->form['detail']); ?>

                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">
                                                    Modifier le groupe
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
                                            <a href="/admin/groupe/delete/<?= $unGroupe->groupes_id ?>">  
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
                                    <p> pas de groupes </p>
                                <?php endif; ?>
        </div>
    </section>
</div>