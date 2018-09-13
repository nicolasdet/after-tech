<div id="user_groupe">
        <h3 class="text-center bold"><?= $ActualEvent->evenement_nom ?></h3>
    <section>
                <div class="container row mt-4">
                    <div class="col-md-3 ml-3">
                        <div class="sideMenuGroupe">  
                            <h4 class="text-center"> Groupes participant </h4>
                        </div>
                        <br />
                        <?php foreach ($eventGroupes as $UnGroupe): $UnGroupe = $UnGroupe->groupe ?>
                            <h5 class="text-center"> <?= $UnGroupe->groupes_nom ?> </h5>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-3 ml-3">
                        <div class="sideMenuGroupe">  
                            <h4 class="text" > </h4>
                        </div>
                        <br />
                        <?php foreach ($eventGroupes as $UnGroupe): $UnGroupe = $UnGroupe->groupe ?>
                            
                        <?php endforeach; ?>
                    </div>
                </div>   
    </section>
</div>