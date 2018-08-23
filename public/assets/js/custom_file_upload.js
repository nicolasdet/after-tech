$(function() {

  $.ajax({
                       type: 'GET',
                       url: 'user/groupe/create/getImgCache',
                       success: function(data) {
                                  // alert(data);
                                  if(data != false){

                                    console.log('la');
                                    var randomNum = Math.floor(Math.random() * 1000000) + 1;
                                    $('#img_groupe_create').attr("src", data+'?'+ randomNum);
               
                                  }
                       },
           
            });


});


 // les fonction si dessous gérent l'upload de l'image
$(document).on('dragenter', '#dropfile', function() {
            $(this).css('border', '3px dashed red');
            return false;
});
 
$(document).on('dragover', '#dropfile', function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).css('border', '3px dashed red');
            return false;
});
 
$(document).on('dragleave', '#dropfile', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).css('border', '3px dashed #BBBBBB');
            return false;
});


$(document).on('drop', '#dropfile', function(e) {
            if(e.originalEvent.dataTransfer){
                       if(e.originalEvent.dataTransfer.files.length) {
                                   // Stop the propagation of the event
                                   e.preventDefault();
                                   e.stopPropagation();
                                   $(this).css('border', '3px dashed green');
                                   // Main function to upload
                                   upload(e.originalEvent.dataTransfer.files);
                       }  
            }
            else {
                       $(this).css('border', '3px dashed #BBBBBB');
            }
            return false;
});



function upload(files) {
            var f = files[0] ;
            var typeImg = "";
 
            // Only process image files.
            if (!f.type.match('image/jpeg') && !f.type.match('image/png')) {
                       alert('The file must be a jpeg image or png') ;
                       return false ;

            }
              
        			
           var reader = new FileReader();
            // When the image is loaded,
            // run handleReaderLoad function
            reader.onload = handleReaderLoad;
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);            
}


function handleReaderLoad(evt) {


            var pic = {};
            pic.file = evt.target.result.split(',')[1];
            var string = evt.target.result;

            if(string.indexOf('png;') !== -1){
            	typeImg ='png';
            } else if(string.indexOf('jpeg;') !== -1) {
            	typeImg = 'jpg';
            }
            var str = jQuery.param(pic);
 	
            $.ajax({
                       type: 'POST',
                       url: 'user/groupe/create/imgUpload?type='+typeImg,
                       data: str,
                       success: function(data) {
                                  // alert(data);
                                    console.log('la');
                                    var randomNum = Math.floor(Math.random() * 1000000) + 1;
                                   $('#img_groupe_create').attr("src", data+'?'+ randomNum);
                       },
                       error: function(e) {
                           $('#dropfile').text('Une erreur c\'est produite, veuillez réessayer ultérieurement');
                           $('#dropfile').css('border', '3px dashed red');
                       }
            });
            
}
