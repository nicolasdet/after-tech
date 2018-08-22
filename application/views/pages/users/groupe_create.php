 <div id="user_groupe">
 	            <section id="section_groupe_create">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <h1>Crée votre groupe.</h1>
                        </div>
                    </div>
                </div>
            </section>

    <section>
    	<div class="row d-flex justify-content-center">
    		<div class="col-md-7 d-flex justify-content-center">
	          <form method="POST" action="user/groupe/createGroupe/" class="form" >
	           <span></span>
	           <div class="row d-flex justify-content-center">   
	           <?=  drawInput($CreateGroupeFormData['nom']); ?>
	           <?=  drawTextarea($CreateGroupeFormData['detail']); ?>

	           <div class="col-md-8 ">
		           <button 
			           class=" mt-3 btn btn--primary" 
			           type="submit" name="submit" value="submit" >S'inscrire 
		           </button>
	           </div>

	           </div>
	           </form>
    		</div>
    		<div class="col-md-5 d-flex align-items-center  flex-column">
                    <h3>telecharger une image</h3>
    		        <img id="img_groupe_create" src="" alt="pas encore d'image">
					<div id="dropfile" class="mt-5">Glisse / Dépose une image ici !</div>
    		
    		</div>
    	</div>
    </section>
 </div>