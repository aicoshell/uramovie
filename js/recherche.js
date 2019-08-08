$(document).ready(function () {

    $("#rechercheReq").keyup(function () {

        valueRecherche = document.getElementById("rechercheReq").value;

        $.ajax({
            url: './process/recherche.php',
            contentType: 'text/plain',
            dataType: 'html',
            method: 'GET',
            data: { valReq: valueRecherche, nbPage : '1'},
            success: function (data) {
                console.log(data);
                document.getElementById("viewResults").innerHTML = data;
               
            },
            error : function(){
                alert('ERREUR');
            }
        });

    });



    
});