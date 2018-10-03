        <input id="groupeIDHidden" type="hidden" class="hidden" value="<?= $groupe_detail->groupes_id ?>">
                        <div class="col-lg-8  account-tab " id="detail-profile">
                            <div class="titleGroupe p-4 bgWheat"> 
                                  <ul class="row row--list clearfix text-center">
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Evenements</span>
                                        <span class="h3">0</span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Membres</span>
                                        <span class="h3"><?= $groupe_detail->membres['count'] ?></span>
                                    </li>
                                    <li class="col-md-4 col-6">
                                        <span class="h6 type--uppercase type--fade">Message</span>
                                        <span class="h3">0</span>
                                    </li>
                                </ul>
                            </div>

                             <div id="eventSearchZone" class="titleGroupe p-4 mt-2 bgWheat"> 
                                <h4>Rechercher des Events</h4>
                                <input type="text" id="event_search_label" name="">
                                <div class="col-md-3 mt-3">
                                <button type="submit" id="recherche_events" class="btn btn--primary">recherche</button>  
                                </div>
                            </div>

                            <div id="displayEventZone">

                            </div>

                             <div class="bgWheat boxed boxed--border" id="loadingEventZone">
                                    <h4 id="titleLoader"> Chargement des evenements...</h4>
                                    <div id="customLoaderEvent" class="customLoader"></div>
                            </div>

                            </div>
                        </div>