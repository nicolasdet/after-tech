 <div id="user_groupe">
    <div class="container pb-2">
    	<h2>Vos evenements</h2>
    	<?php if(!empty($allEvents)): ?>
                             <?php foreach ($allEvents as $unEvent): ?>
                             
                                <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4><?= $unEvent->events->evenement_nom ?></h4>
                                <ul class="pt-3">
                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 text-center">
                                                <img src="<?= $unEvent->events->evenement_img ?>" alt="Le groupe n'a pas d'image">
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
                            <?php endif; ?>
    </div>
</div>