function creajoin(){
    let monserv = document.getElementById('serv').value;
    $.ajax({
        url:'./createjoin.php',
        type:'POST',
        data:'serv=' + monserv,
        success : function(code, statut){
            console.log('réussi');
        },
        error: function(resultat, statut, erreur){
            console.log('Raté')
        }
    })
}