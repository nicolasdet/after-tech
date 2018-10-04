 <div id="user_groupe">
 	            <section id="section_groupe_create">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Crée votre Entreprise.</h1>
                        </div>
                    </div>
                </div>
            </section>

    <section>
    	<div class="row d-flex justify-content-center">
    		<div class="col-md-9 d-flex justify-content-center">
	          <form method="POST" action="user/entreprise/createEntreprise/" class="form" >
	           <span></span>
	           <div class="row d-flex justify-content-center">   
	           <?=  drawInput($entrepriseForm['nom']); ?>
	           <?=  drawTextarea($entrepriseForm['description']); ?>

	           <div class="col-md-8 ">
		           <button 
			           class=" mt-3 btn btn--primary" 
			           type="submit" name="submit" value="submit" >S'inscrire 
		           </button>
	           </div>

	           </div>
	           </form>
    		</div>
    	</div>
    </section>
 </div>