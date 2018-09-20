


<div id="user_groupe" class="detail_event">
               <div class="background-image-holder ">
                    <img alt="background" src="<?= $ActualEvent->evenement_img ?>" />
                </div>
            <section class="text-center sectionNoPadding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-lg-8">
                <h2 class="evenementTitre bgWhite"><?= $ActualEvent->evenement_nom ?> <span class="h3 countdown" data-date="09/18/2018" data-date-fallback="Timer Done"  data-days-text="jours"></span></h2>
                            <p class="lead bgWhite">
                                <?= $ActualEvent->evenement_description ?> <Br />
                                 
                            </p>
                        </div>
                    </div>
                    <!--end of row-->
                </div>  
                <!--end of container-->
            </section>
            <section class="switchable">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-lg-6 col-md-7 pt-5 eventMiddleCol">

<style> #map { height: 50vh; }</style>
 <span id="adresse" class="hidden"><?php echo $ActualEvent->evenement_adresse . $ActualEvent->evement_ville;  ?></span>

 <div id="map" class="mt-3"></div>
 <script>
    var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 48.849145, lng: 2.3896591},
          zoom: 14
        });
      }
      var request = new XMLHttpRequest();
 
request.onreadystatechange = function() {
  if(request.readyState === 4) {
    if(request.status === 200) { 
        console.log(request);
        var resultat = request.response.results[0].geometry.location;
        var lat = resultat.lat;
        var lng =  resultat.lng;
        console.log(lat);
        console.log(map);
            var center = new google.maps.LatLng(lat, lng);
            var myLatLng = {lat: lat, lng: lng};
              var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: ''
                  });
            map.panTo(center);
    } else {
    } 
  }
}

var adresse = document.getElementById("adresse").innerHTML;
console.log(adresse);
var adresseOK = adresse.split(' ').join('+');
request.open('Get', 'https://maps.googleapis.com/maps/api/geocode/json?address='+adresseOK+'&key=AIzaSyAh7g2N-Ka1iDp3e8Tv5LULDWmHqA--kDk');
request.responseType = 'json';
request.send();
</script>

       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAh7g2N-Ka1iDp3e8Tv5LULDWmHqA--kDk&callback=initMap"
    async defer></script>

                        <div class="modal-instance modalUpdateEvent" id="modalCréeEvement">
                                <a class=" modal-trigger" href="#">
                                    <button type="submit" class="btn btn--primary btn-event buttonModifierContainer"><i class="material-icons groupe_icon IModifierElement">person</i>Inviter d'autre groupes</button>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content width-50">
                                        <div class="boxed boxed--lg">
                                            <h2>Modifier l'image de l'evenement</h2>
                                            <hr class="short">
                                            <p class="lead">
                                                <form method="POST" action="user/event/update/<?= $ActualEvent->evenement_id ?>">

                                                <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">Upload l'image</button>  
                                                </div>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        <div class="modal-instance modalUpdateEvent" id="modalCréeEvement">
                                <a class=" modal-trigger" href="#">
                                    <button type="submit" class="btn btn--primary btn-event buttonModifierContainer"><i class="material-icons groupe_icon IModifierElement">person</i>Modifier l'image</button>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content width-50">
                                        <div class="boxed boxed--lg">
                                            <h2>Modifier l'image de l'evenement</h2>
                                            <hr class="short">
                                            <p class="lead">
                                       <?php echo form_open_multipart('user/event/do_upload/'.$ActualEvent->evenement_id);?>
                                        <input type="file" class="mt-1" id="upl_img_user" name="userfile" size="20" />
                                        <br /><br />
                                        <button type="submit" class="btn btn--primary" >telecharger l'image </button>
                                        </form>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            <div class="modal-instance modalUpdateEvent" id="modalCréeEvement">
                                <a class=" modal-trigger" href="#">
                                    <button type="submit" class="btn btn--primary btn-event buttonModifierContainer"><i class="material-icons groupe_icon IModifierElement">person</i>Modifier l'evement</button>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content width-50">
                                        <div class="boxed boxed--lg">
                                            <h2>Modifier l'evenement</h2>
                                            <hr class="short">
                                            <p class="lead">
                                                <form method="POST" action="user/event/update/<?= $ActualEvent->evenement_id ?>">
                                                <?=  drawInput($getUpdateEventForm['nom']); ?>
                                                <?=  drawInput($getUpdateEventForm['description']); ?>
                                                <?=  drawInput($getUpdateEventForm['adresse']); ?>
                                                <?=  drawInput($getUpdateEventForm['ville']); ?>
                                                <?=  drawInput($getUpdateEventForm['date_debut']); ?>
                                                <?=  drawInput($getUpdateEventForm['duree']); ?>
                                                <?=  drawSelect($getUpdateEventForm['type']); ?>

                                                <div class="col-md-3">
                                                <button type="submit" class="btn btn--primary">Modifier</button>  
                                                </div>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>
</div>

                        <div class="col-lg-5 col-md-5 eventMiddleCol">
                            <div class="switchable__text">
                                <h3 ><?= $ActualEvent->evenement_adresse ?>
                                    <br /><?= $ActualEvent->evement_ville ?></h3>
                                <p class="lead">
                                    <?= $ActualEvent->evenement_debut ?> <Br />
                                    Groupes & participants : <Br />

                            <div class="row">
                                
                            <?php foreach ($eventGroupes as $UnGroupe): 
                                    $MonGroupe       = $UnGroupe->groupe;
                                    $UnGroupeMembre  = $UnGroupe->membres;
                             ?>
                            <div class="eventzonegroupe col-md-6">
                            
                                    <img src="<?= $MonGroupe->groupes_img ?>"> 
                                    <h5 class=""> <?= $MonGroupe->groupes_nom ?> </h5>
                                     <h4 class="eventGroupeMembreCount"><?= $UnGroupeMembre['count'] ?> Membres</h4>
                              
                            </div>
                            <?php endforeach; ?>
                            </div>
                                </p>
                                    <!--
                                <p class="lead">
                                    E:
                                    <a href="#">hello@stack.net</a>
                                    <br /> P: +613 4827 2294w                                </p>
                                <p class="lead">
                                    We are open from 9am &mdash; 5pm week days.
                                </p>
                            -->


                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            </div>