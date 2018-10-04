$(function() {
$('#loadingEventZone').hide();

	 start = 0;
	 end   = 0 
	 listeEvent = [];

   var hasEntreprise = $('#user_has_entreprise').val();

	$("#entrepriseSearch").on('click', function(){

		var SearchText = $('#entrepriseSearchText').val();
    $('#displayEntepriseZone').empty();

		  $.ajax({
                   type: 'GET',
                   url: 'entreprise/ajax/search/'+SearchText,
                   dataType: 'json',
                    success: function(data) {
                         if(data != false && data !== "false"){

                    			  LoadSuccessSearch(data);

                          }else {
                            LoadErrorSearch();
                          }
                       },
                    	error: function(){
                          LoadErrorSearch();
                    }
         });
	});


  function LoadSuccessSearch(data){
      for(unEvent of data){

        html = `
        <div class='titleGroupe p-4 mt-2 bgWheat'>
        <div class='row'>
          <div class='col-md-9'>
          <h4>`+ unEvent.entreprise_nom +`</h4>
          <p>`+ unEvent.entreprise_description +`</p>
          `;

           if(!hasEntreprise) {
             html += `
             <a href="user/entreprise/join/`+unEvent.entreprise_id+`">
            <button class="btn btn-success pl-2 pr-2">Intégrer</button> 
            </a>
              `;
          }else {
             html += `
            <button class="btn btn-danger p-3">Vous avez deja une entreprise</button> 
            `;
          }


          html += `
          </div>
        </div> 
        </div>
        `;
        $("#displayEntepriseZone").append(html);
      }
  }


  function LoadErrorSearch(){
     html = `
        <div class='titleGroupe p-4 mt-2 bgWheat'>
        <div class='row'>
          <div class='col-md-9'>
          <h4>Il n'y à pas d'entreprise avec ce nom</h4>
          </div>
        </div> 
        </div>
        `;
        $("#displayEntepriseZone").append(html);
  }


});