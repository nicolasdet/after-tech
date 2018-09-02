 <div id="user_groupe">
    <section>
                <div class="container">
                    <div class="row pb-5">
                        <div class="col-4">
                            <h4>Groupes</h4>
                        </div>
                        <div class="col-4">
                            <a href="user/groupe/create">Créer un groupe</a>
                        </div>
                        <div class="col-4 text-right">
                            <a href="user/groupe/recherche">Chercher un groupe</a>
                        </div>
                    </div>
                    <div class="row">

                             
                    <?php  
                    if(!empty($listGroupes)):
                     foreach ($listGroupes as $unGroupe) :
                       ?>   
                          <div class="masonry__item col-md-3 col-6" data-masonry-filter="Inspiration">
                                        <article class="feature feature-1">
                                            <div class="feature__body boxed boxed--border">
                                            <a href="#" class="block">
                                                 <img class="groupe_span" id="groupe-<?= $unGroupe->groupe->groupes_id ?>" alt="" src="" />
                                            </a>
                            
                                                <h5><?= $unGroupe->groupe->groupes_nom ?></h5>
                                                <a class="btn btn--primary btn--icon mt-5" id="change_user_info" href="/user/groupe/<?= $unGroupe->groupe->groupes_id ?>">
                                                    <span class="btn__text">
                                                        <i class="icon-Add-File"></i> Aller voir
                                                    </span>
                                                </a>
                                  
                                            </div>
                                        </article>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            Vous ne faite pas encore parti de groupes, veuillez en rejoindre ou en crée.
                        <?php endif; ?>


                    </div>
                </div>
            </section>
             </div>