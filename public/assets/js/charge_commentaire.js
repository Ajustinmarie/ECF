$(document).ready(function() {
    $('.envoie').click(function(){ 
           var  commentaire = $('input[name=commentaire]').val();
           var  note = $('input[name=note]').val();
           var  id_recette = $('input[name=id_recette]').val();
           var  id_user = $('input[name=id_user]').val();
        
          $('#update_com').load('personnalise/recharge?id=1'),{
              recette: id_recette
           };

      
    
    });

});



