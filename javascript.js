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
            if (mesServeurs[0]['serv'] != '') {
                mesServeurs.forEach(function (serveurs) {
                    let mesServ = document.createElement("BUTTON");
                    mesServ.id = compteur;
                    const compteur2 = compteur;
                    mesServ.onclick = function () {
                        affichechat(compteur2);
                        
                    };
                    compteur++;
                    console.log(compteur2);
                    mesServ.innerText = serveurs.serv;
                    maDiv.appendChild(mesServ);
                })
            }

        }
    })
}
function affichechat(numserv) {
    $.ajax({
        url: './affichechat.php',
        type: 'POST',
        data: 'numserv=' + numserv,
        success: function (chat, statut) {
            console.log(chat);
            let maTA = document.getElementById('maTA');
            let monChat = JSON.parse(chat);
            maTA.value = '';
            monChat.forEach(element => {
                //    console.log(element['message']);
                maTA.value += "-> " + element['date'] + " | " + element['pseudo'] + " : " + element['message'] + "\n";
                ;
            })

        },
        error: function (resultat, statut, erreur) {
            console.log('Raté2')
        }
    })
}