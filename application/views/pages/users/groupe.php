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
                            <a href="user/groupe/research">Chercher un groupe</a>
                        </div>
                    </div>
                    <div class="row">

                             
                    <?php   foreach ($listGroupes as $unGroupe) :  ?>   
                          <div class="masonry__item col-md-3 col-6" data-masonry-filter="Inspiration">
                                        <article class="feature feature-1">
                                            <a href="#" class="block">
                                                 <img class="groupe_span" id="groupe-<?= $unGroupe->groupe->groupes_id ?>" alt="" src="" />
                                            </a>
                                            <div class="feature__body boxed boxed--border">
                            
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


                    </div>
                </div>
            </section>
             </div>