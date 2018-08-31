   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <div id="user_groupe">
     
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <h1>
                                <span class="inline-block typed-text typed-text--cursor color--primary" data-typed-strings="Rejoignez des groupes, organisez des after works, Profitez, Partager "></span>
                                <br class="hidden-xs">Partout autour de vous.</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <form class="form-horizontal" method="GET" action="/user/groupe/recherche">
                        <?=  drawInput($getSearchGroupeForm['nom']); ?>
                            <!--
                            <div class="col-md-3">
                                <label>Guests</label>
                                <div class="input-select input-select--borderless">
                                    <select name="guests">
                                        <option value="1">1</option>
                                        <option value="2" selected="">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                             -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn--primary">Search</button>
                            </div>
                        </form>




                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <h4>Groupes</h4>
                        </div>
                        <div class="col-3 d-flex justify-content-between">
                            <?php if(!empty($getNomParam)): ?>
                            <a href="/user/groupe/recherche">anuler le filtre</a>
                            <?php endif; ?>

                            <?php if(!$all): ?>
                            <a href="/user/groupe/recherche/all<?php echo !empty($getNomParam) ? '?nom='.$getNomParam : '' ?>">View more</a>
                            <?php else: ?>
                            <a href="/user/groupe/recherche<?php echo !empty($getNomParam) ? '?nom='.$getNomParam : '' ?>">View less</a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">

                        <?php 
                         if($listeGroupeDefault):
                         foreach ($listeGroupeDefault as $unGroupe) :  ?>

                        <div class="col-md-3 col-6 ">
                            <a href="#" class="feature groupe_show_recherche height-400">
                                <img class="groupe_span img_groupe_recherche" id="groupe-<?= $unGroupe->groupes_id ?>" alt="le groupe n'a pas d'image" src="" />
                                <h5 class="mb--0"><?= $unGroupe->groupes_nom ?></h5>
                            </a>
                        </div>
                        <?php endforeach; endif; ?>

                    </div>
                </div>
            </section>
             </div>

             <!--

                                            <div class="col-md-3">
                                <label>Une adresse</label>
                                <input type="text" name="date-check-in" class="datepicker datepicker--fluid" placeholder="Check in date" />
                            </div>
                            <div class="col-md-3">
                                <label>Une entreprise</label>
                                <input type="text" name="date-check-out" class="datepicker datepicker--fluid" placeholder="Check out date" />
                            </div>

                            -->