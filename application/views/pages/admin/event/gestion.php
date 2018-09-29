<div id="admin_groupe">
    <section id="custimSection">
        <div class="container">
              <h2> Gestion des groupes </h2>
                             <?php 
                                if(!empty($allEvents)):
                              ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>description</th>
                                        <th>adresse</th>
                                        <th>ville</th>
                                        <th>date</th>
                                        <th>duree</th>
                                        <th>type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($allEvents as $unEvent) : ?>
                                    <tr>
                                        <td><?= $unEvent->evenement_id ?></td>

                                        <td><?= $unEvent->evenement_nom ?></td>

                                        <td><?= $unEvent->evenement_description ?></td>

                                        <td><?= $unEvent->evenement_adresse ?></td>

                                        <td><?= $unEvent->evement_ville ?></td>

                                        <td><?= $unEvent->evenement_debut ?></td>

                                        <td><?= $unEvent->evenement_type ?></td>
            <td class="row">    
            <div class="col-md-8">     
            <div class="modal-instance" id="modalCréeEvement">
                                <a class="modal-trigger" href="#">
                                    <button type="submit" class="btn btn-info">
                                         Gerer l'evenement
                                    </button>
                                </a>
                <div class="modal-container">
                        <div class="modal-content width-50">
                            <div class="boxed boxed--lg">
                                <h2>Modifier l'evenement</h2>
                                <hr class="short">
                                <p class="lead">
                                <form method="POST" action="admin/event/change/<?= $unEvent->evenement_id ?>">
                                                <?=  drawInput($unEvent->form['nom']); ?>
                                                <?=  drawInput($unEvent->form['description']); ?>
                                                <?=  drawInput($unEvent->form['adresse']); ?>
                                                <?=  drawInput($unEvent->form['ville']); ?>
                                                <?=  drawInput($unEvent->form['date_debut']); ?>
                                                <?=  drawInput($unEvent->form['duree']); ?>
                                                <?=  drawSelect($unEvent->form['type']); ?>

                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">
                                                    Modifier l'evenement
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
                                            <a href="/admin/event/delete/<?= $unEvent->evenement_id ?>">  
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