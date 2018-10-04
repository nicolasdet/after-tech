 <div id="user_groupe">
    <a href="entreprise/quit/<?= $entreprise->entreprise_id ?>">
        <button class="btn btn-danger pl-2 pr-2 ml-1"> quitter le groupe </button>
    </a>
 	            <section id="section_groupe_create">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1><?= $entreprise->entreprise_nom ?></h1>
                        </div>
                    </div>
                </div>
            </section>

    <section>
    	<div class="row d-flex justify-content-center">
    		<div class="col-md-9 d-flex justify-content-center">
                <p><?= $entreprise->entreprise_description ?></p>
    		</div>
    	</div>
    </section>
 </div>