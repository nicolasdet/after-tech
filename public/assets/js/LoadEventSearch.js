$(function() {

	 start = 0;
	 end   = 0 
	 groupe_id  = $('#groupeIDHidden').val();
	 listeEvent = [];
	 
			  $.ajax({
                   type: 'GET',
                   url: 'events/ajax/search/ListeEvents?groupe='+groupe_id,
                   dataType: 'json',
                    success: function(data) {
                         if(data != false && data !== "false"){
                    			listeEvent = data;

                          }else {
                          }
                       },
                    error: function(){

                    }
         }); 

	$("#recherche_events").on('click', function(){
		var SearchText = $('#event_search_label').val();
		  $.ajax({
                   type: 'GET',
                   url: 'events/ajax/search/'+SearchText+'?groupe='+groupe_id,
                   dataType: 'json',
                    success: function(data) {
                         if(data != false && data !== "false"){
                    			LoadSuccess(data);

                          }else {
                          }
                       },
                    error: function(){

                    }
         });

	});

	function LoadSuccess(data){
		console.log('--');
		console.log(listeEvent);
		if(typeof(data) == 'object' && 1==2){
			html = `
				<div class='titleGroupe p-4 mt-2 bgWheat'>
				<div class='row'>
					<div class='col-md-9'>
					<h4>`+ data.evenement_nom +`</h4>
					<p>`+ data.evenement_description +`</p>
					<p>`+ data.evenement_debut +`</p>
					<p>`+ data.evement_ville +`</p>
					<button  class="btn btn-success p-3">Participer</button> 
					</div>
					<div class='col-md-3'>
					<img src='`+data.evenement_img+`' alt="L\'evenement n'a pas d'image "/>
					</div>
				</div> 
				</div>
				`;

				$("#displayEventZone").append(html);

		}else{

			for(unEvent of data){
				html = `
				<div class='titleGroupe p-4 mt-2 bgWheat'>
				<div class='row'>
					<div class='col-md-9'>
					<h4>`+ unEvent.evenement_nom +`</h4>
					<p>`+ unEvent.evenement_description +`</p>
					<p>`+ unEvent.evenement_debut +`</p>
					<p>`+ unEvent.evement_ville +`</p>

					<a href="/events/add/`+unEvent.evenement_id+`/`+groupe_id+`">
						<button class="btn btn-success p-3">Participer</button> 
					</a>

					</div>
					<div class='col-md-3'>
					<img src='`+unEvent.evenement_img+`' alt="L\'evenement n'a pas d'image "/>
					</div>
				</div> 
				</div>
				`;

				$("#displayEventZone").append(html);
			}
		}


	}

});