// Variables globales
let lastId = 0 // id du dernier message affiché

// On attend le chargement du document
window.onload = () => {
    // On va chercher la zone texte
    let texte = document.querySelector("#texte")
    texte.addEventListener("keyup", verifEntree)

    // On va chercher le bouton valid
    let valid = document.querySelector("#valid")
    valid.addEventListener("click", ajoutMessage)

    // On charge les nouveaux messages
    setInterval(chargeMessages, 1000)
}

/**
 * Charge les derniers messages en Ajax et les insère dans la discussion
 */

function chargeMessages(){
    // On instancie XMLHttpRequest
    let xmlhttp = new XMLHttpRequest()

    // On gère la réponse
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4){
            if(this.status == 200){
                // On a une réponse
                // On convertit la réponse en objet JS
                let messages = JSON.parse(this.response)

                // On retourne l'objet
                messages.reverse()

                // On récupère la div #discussion
                let discussion = document.querySelector("#discussion")

                for(let message of messages){
                    // On transforme la date du message en JS
                    let dateMessage = new Date(message.created_at)

                    // On ajoute le contenu avant le contenu actuel de discussion
                    discussion.innerHTML = `<p>${message.pseudo} a écrit le ${dateMessage.toLocaleString()} : ${message.message}</p>` + discussion.innerHTML

                    // On met à jour le lastId
                    lastId = message.id
                }
            }else{
                // On gère les erreurs
                let erreur = JSON.parse(this.response)
                alert(erreur.message)
            }
        }
    }

    // On ouvre la requête
    xmlhttp.open("GET", "ajax/chargeMessages.php?lastId="+lastId)

    // On envoie
    xmlhttp.send()
}


/**
 * Cette fonction vérifie si on a appuyé sur la touche entrée
 */
function verifEntree(e){
    if(e.key == "Enter"){
        ajoutMessage();
    }
}

/**
 * Cette fonction envoie le message en ajax à un fichier ajoutMessage.php
 */
function ajoutMessage(){
    // On récupère le message
    let message = document.querySelector("#texte").value
    
    // On vérifie si le message n'est pas vide
    if(message != ""){
        // On crée un objet JS
        let donnees = {}
        donnees["message"] = message

        // On convertit les données en JSON
        let donneesJson = JSON.stringify(donnees)

        // On envoie les données en POST en Ajax
        // On instancie XMLHttpRequest
        let xmlhttp = new XMLHttpRequest()

        // On gère la réponse
        xmlhttp.onreadystatechange = function(){
            // On vérifie si la requête est terminée
            if(this.readyState == 4){
                // On vérifie qu'on reçoit un code 201
                if(this.status == 201){
                    // L'enregistrement a fonctionné
                    // On efface le champ texte
                    document.querySelector("#texte").value = ""
                }else{
                    // L'enregistrement a échoué
                    let reponse = JSON.parse(this.response)
                    alert(reponse.message)
                }
            }
        }

        // On ouvre la requête
        xmlhttp.open("POST", "ajax/ajoutMessage.php")

        // On envoie la requête en incluant les données
        xmlhttp.send(donneesJson)
    }
}


//Création du Popup

var name = "";
//Au clic j'execute la fonction
$("#bouton_popup").click(function () {

    //je recupere le nom 
    name = $('#nom').val();

    //si le nom est bien rentré alors je fais disparaitre le popup
    if ((name !== undefined) && (name !== null) && (name !== "")) {

        $('#insert_nom').text(name);
        insert_nom.innerHTML = name;

        $('#background_popup').animate({
            top: '-700px',
            opacity: '0',
        }, 1000);
        setTimeout(function () { $('#background_popup').css('visibility', 'hidden') }, 1000);
    }else {
        //Sinon je fais une alert
        alert('Saissisez votre nom pour continuer');
    }
});

//Création du quizz/sondage avec un objet
var Sondage = {
    title: "Koh-Lanta - Émission du 27/09",
    questions:
        [
            {
                questionTitle: "À l’issu du l’épreuve d’immunité, Quel sera l’équipe gagnante  ? ",
                answers:
                    [
                        { choice: "Equipe Verte", isRight: true },
                        { choice: "Equipe Bleue", isRight: true }

                    ]
            },
            {
                questionTitle: "Qui va etre éliminé au conseil ?",
                answers:
                    [
                        { choice: "Alix", isRight: false },
                        { choice: "Sébastien", isRight: true },
                        { choice: "Fabrice", isRight: false }
                    ]
            },
            {
                questionTitle: "Parmis ces deux candidates de l'émission, qui exerce un metier de serveuse ?",
                answers:
                    [
                        { choice: "Angélique", isRight: true },
                        { choice: "Lola", isRight: false }

                    ]
            }
        ]
};

//declarations des variables
var points = 0;
var pourcentage;

var j = 0;
var i = 0;

//Fonction affichage 

function afficherQuestion() 
{
    
    if (i <= Sondage.questions.length - 1) 
    {
        
        //Affichage du titre
        $("#titre_sondage").html(Sondage.title);

        //supréssion de la question et des réponses déja existantes 
        $(".question_p").detach();
        $(".choix_reponses").detach();

        //affichage de la question
        let div_question = Sondage.questions[i].questionTitle;
        $(".question_sondage").append('<p class="question_p" >' + div_question + '</p>');
        
        //boucle tant qu'il y a des réponses je les affiche et met en id la réponse vraie
        while (j < Sondage.questions[i].answers.length) 
        {

            let div_reponses = Sondage.questions[i].answers[j].choice;
            $(".reponses").append('<div class="choix_reponses"><p>' + div_reponses + '</p> </p> <input type="radio" name="reponse" class="bouton_choix " id="' + Sondage.questions[i].answers[j].isRight + '" ></checkbox></div>');
            console.log(Sondage.questions[i].answers[j].isRight);
            j++;
        };
        j = 0;
    }
};

//j'affiche la premiere question au démarage
afficherQuestion();

//calcul des résultats / 100
function calc() 
{
    pourcentage = parseInt((points / Sondage.questions.length) * 100);
    return (pourcentage);
}

//au clic je regartde quelle réponse est cochée et j'attribue les points ou non 
$('#btn_envoyer').click(function () 
{
    if ($(".bouton_choix").is(':checked')) 
    {
        //si la question vraie est cochée, alors j'ajoute un point 
        if ($("#true").is(':checked')) 
        {
            points++;
        }

        i++;
        afficherQuestion();
        calc();

        //j'affiche les scores et supprimes les questions 
        if (i >= Sondage.questions.length) 
        {
            $(".question_p").detach();
            $(".choix_reponses").detach();

            div_question = name + ', vous avez obtenu un score de : ' + pourcentage + '%';
            $(".question_sondage").append('<p class="question_p" >' + div_question + '</p>');
            $("#btn_envoyer").html('<a href ="classement.php">Voir le classement</a> ');
        }
    } else if(i <= Sondage.questions.length-1) {
        alert('Veuillez séléctionner une réponse');
    }
})

