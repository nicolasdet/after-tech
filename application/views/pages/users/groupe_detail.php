 <div id="user_groupe">
 	            <section id="section_groupe_create">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <h1>Groupe <?= $groupe_detail->groupes_nom ?></h1>
                            <p>Groupe <?= $groupe_detail->groupes_description ?></p>
                        </div>
                    </div>
                </div>
            </section>

    <section>
    	<div class="row">
            <div class="col-md-5 d-flex justify-content-center">
                <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" src="" />
            </div>
            <div class=" col-md-5 d-flex padding11 persoChatbox">
           
                   <div class="row chatBox">

                    <div class="col-sm-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <strong>Nicolas</strong> <span class="text-muted">commented 5 days ago</span>
                    </div>
                    <div class="panel-body">
                    Salut
                    </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->

                    <div class="col-sm-12 mt-2">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <strong>kevin</strong> <span class="text-muted">commented 2 days ago</span>
                    </div>
                    <div class="panel-body">
                   on se fait un after-work demain ?  
                    </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div><!-- /row -->
                    <div class="widget-area no-padding blank pt-2">
                                <div class="status-upload">
                                    <form>
                                        <textarea placeholder="Un message ? un after work ? " ></textarea>
                                        <ul>
                                
                                        </ul>
                                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Envoyer</button>
                                    </form>
                                </div><!-- Status Upload  -->
                            </div><!-- Widget Area -->
             
            </div>
    	</div>
            <div class="groupes_events" >
 
                            <div class="boxed boxed--border">
                                <h4>Prochain evenement </h4>
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
                      
                    </div>
    </section>
 </div>