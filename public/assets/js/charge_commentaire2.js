$(document).ready(function() {
    $('.envoie').click(function(){ 
           var  commentaire = $('input[name=commentaire]').val();
           var  note = $('input[name=note]').val();
           var  id_recette = $('input[name=id_recette]').val();
           var  id_user = $('input[name=id_user]').val();
        
          $('#update_com2').load('/recette/personnalise/'),{
              recette: id_recette
           };

      
    
    });

});
