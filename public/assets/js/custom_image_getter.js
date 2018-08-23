$(function() {

var groupes = $('.groupe_span');
  console.log(groupes);

for (var key in groupes) {
  if (groupes.hasOwnProperty(key)) {
        if(typeof(groupes[key].attributes) != "undefined"){
        var id = groupes[key].attributes.id.value;
        var id_groupe = id.split("-")["1"];

        $(groupes[key]).attr("src", 'public/assets/img/upload/groupes/'+id_groupe);
      }
    }
  }



});