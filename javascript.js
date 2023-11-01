function creajoin() {
    let monserv = document.getElementById('serv').value;
    $.ajax({
        url: './createjoin.php',
        type: 'POST',
        data: 'serv=' + monserv,
        success: function (code, statut) {
            console.log('Réussi');
        },
        error: function (resultat, statut, erreur) {
            console.log('Raté')
        }
    })
}

function afficheserv() {
    $.ajax({
        url: './afficheserv.php',
        type: 'GET',
        data: '',
        success: function (serveurs, statut) {
            let compteur = 0;
            let mesServeurs = JSON.parse(serveurs);
            let maDiv = document.getElementById('messerv');
            maDiv.innerHTML = "";
            console.log(mesServeurs[0]['serv']);
            if(mesServeurs[0]['serv'] != ''){ 
                mesServeurs.forEach(function (serveurs) {
                let mesServ = document.createElement("BUTTON");
                mesServ.id = compteur;
                mesServ.onclick = function() {
                    affichechat(compteur);
                };
                compteur++;
                console.log(compteur);
                mesServ.innerText = serveurs.serv;
                maDiv.appendChild(mesServ);
            })}

        }
    })
}
function affichechat(numserv){
    $.ajax({
        url:'./affichechat.php',
        type:'POST',
        data:'numserv=' + numserv,
        success : function(code, statut){
            console.log('Réussi2');
        },
        error: function(resultat, statut, erreur){
            console.log('Raté2')
        }
    })
}