$(function() {


/*	
	Le JS s'execute ligne par ligne donc dans l'ordre :
	** function **
	** Init **
	** Listener **

	PS: Les fonction peuvent executer des requetes asynchrone mais doivent pas pertuber le cour normal de l'app ( INIT )
	PS: Voir Status -> variable permetant de connaitre l'état de l'App à tout moment
	PS: State -> 0 = null | 1 = loading | 2 = loaded OK | 3 loaded Error 
*/

/*---------------------------------------------------------------------------------------------------------------------*/
	//  On definit les fonction du core de l'app de chat
/*---------------------------------------------------------------------------------------------------------------------*/
	function LoadChat(){
		  $.ajax({
                   type: 'GET',
                   url: 'user/groupe/ajax/loadChat/'+idSalon,
                    success: function(data) {
                         if(data != false){
                         	if(data !== "false"){
                         		return SuccessChat()
                         	}
               				return SuccessChat();

                          }else {
                          	return ErrorChat();
                          }
                       },
                    error: function(){
                    	return ErrorChat();
                    }
            }, "JSON");
	};

	function SuccessChat(){
		State = 2;
		$('#loadingChatZone').fadeOut("400", "swing").promise().done(function(){
			$('#groupeChatZone').fadeIn();
		});
	};

    function NoMessageChat(){

		$('#titleLoader').text("Pas de message pour l'instant, lancer vous....");
		$('#customLoader').hide();
		$('#loadingChatZone').css("min-height", "90px");
    };

	function ErrorChat()
	{	
		$('#titleLoader').text("Une erreur s'est produite, veuillez réessayer plus tard");
		$('#customLoader').hide();
		$('#loadingChatZone').css("min-height", "90px");
		
		console.log('error');
	};

	function SendMessage(message){
		console.log(idSalon);
		console.log(message);

		$.post("user/groupe/ajax/addMessage/"+idSalon+"/"+idUser, { text: message }, 
			function(data, status){
	        		if(status == "success"){
	        			if(data !== "false"){
	        				//return reloadChat();
	        				//return;
	        			}
	        		}else {
	        			//return;
	        		}
	        		
	    	}, "JSON");
	};

	function initChat()
	{

		LoadChat();
	}


/*---------------------------------------------------------------------------------------------------------------------*/
	//  ON LANCE L'APPLI DE CHAT
/*---------------------------------------------------------------------------------------------------------------------*/
	State = 0;  /* 0 = null, 1 = loading, 2 = loaded OK, 3 loaded Error */
	idSalon = $('input#salon_id').val();
	idUser  = $('input#user_id').val();
	initChat();

/*---------------------------------------------------------------------------------------------------------------------*/




/*---------------------------------------------------------------------------------------------------------------------*/
	//  Evenement / Listener 
/*---------------------------------------------------------------------------------------------------------------------*/
	
	$('#sendMessage').on('click', function(){
		if(State != 2){
			return;
		}

		text = $("#chatText").val().trim();

		if(text !== " " && text !== ""){
			SendMessage(text);
		}

	});



})