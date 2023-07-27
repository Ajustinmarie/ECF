$(document).ready(function() {
    $('.envoie').click(function(){ 
           var  commentaire = $('input[name=commentaire]').val();
           var  note = $('input[name=note]').val();
           var  id_recette = $('input[name=id_recette]').val();
           var  id_user = $('input[name=id_user]').val();

           var url='personnalise/recharge?id={{id_recette}}';
           var id_user = $("#id_user").val();

           
          $('#update_com').load(url,{
            commentaire:commentaire,
            note:note,
            id_recette:id_recette,
            id_user:id_user        
        }),{
            
           };
    });
});


