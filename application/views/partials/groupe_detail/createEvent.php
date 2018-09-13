                        <div class="col-lg-8  hidden  account-tab " id="detail-createEvent">
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