                        <div class="col-lg-8  account-tab " id="detail-events">

                            <?php if(!empty($listEvents)): ?>
                             <?php foreach ($listEvents as $unEvent): ?>
                             
                                <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4><?= $unEvent->events->evenement_nom ?></h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <div class="icon-circle">
                                                    <i class="icon icon--lg material-icons">comment</i>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-7">
                                                <p><?= $unEvent->events->evenement_debut ?> <br />  
                                                <?= $unEvent->events->evenement_description ?></p>
                                                <span class="type--fine-print"></span>
                                                <div class="d-flex justify-content-start">
                                                <a href="user/event/detail/<?= $unEvent->events->evenement_id ?>"> 
                                                    <button type="submit" class="btn btn--primary btn-event">Detail</button>
                                                </a>
                                              
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                                <?php endforeach; ?>
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