function creajoin(){
    let monserv = document.getElementById('serv').value;
    $.ajax({
        url:'./createjoin.php',
        type:'POST',
        data:'serv=' + monserv,
        success : function(code, statut){
            console.log('Réussi');
        },
        error: function(resultat, statut, erreur){
            console.log('Raté')
        }
    })
}

function affichechat(serv){
    $.ajax({
        url:'./affichechat.php',
        type:'POST',
        data:'chat=' + serv,
        success : function(code, statut){
            console.log('Réussi2');
        },
        error: function(resultat, statut, erreur){
            console.log('Raté2')
        }
    })
}