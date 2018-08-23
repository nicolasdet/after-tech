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
                        <div class="col-md-3 col-6">
                   
                            <a href="user/groupe/<?= $unGroupe->groupe->groupes_id ?>" class="feature">
                                <img class="groupe_span" id="groupe-<?= $unGroupe->groupe->groupes_id ?>" alt="" src="" />
                                <h5 class="mb--0"><?= $unGroupe->groupe->groupes_nom ?></h5>
                                <div>Develloppeurs des incos</div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
             </div>