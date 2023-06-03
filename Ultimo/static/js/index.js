

let piatti = [
        {
            nome: "Parmigiana di melanzane",
            foto: "img/parmigiana.jpg",
            descrizione: "Sei una parmigiana",
            valore: 20,
            label: "Meglio cotte"
          },
          
          {
            nome: "Sgagliozze",
            foto: "img/sgagliozze.jpg",
            descrizione: "Sei proprio una sgagliozza",
            valore: 30,
            label: "La colazione del campione"
          },
          {
            nome: "Popizze",
            foto: "img/popizze.jpg",
            descrizione: "Sei una bella popizza",
            valore: 40,
            label: "Troppo cozzale"
          },
          {
            nome: "Pasta al pesto",
            foto: "img/pasta-al-pesto.jpg",
            descrizione: "Sei un buongustaio",
            valore: 10,
            label: "Pasta al pesto"
          },
          {
            nome: "Carbonara",
            foto: "img/carbonara.jpg",
            descrizione: "Sei un amante dei sapori forti",
            valore: 0,
            label: "Carbonara"
          },
          {
            nome: "Patate riso e cozze",
            foto: "img/patate-riso-cozze.jpg",
            descrizione: "Sei un'appassionato di cucina tradizionale",
            valore: 5,
            label: "Patate riso e cozze"
          },
          {
            nome: "Lasagna",
            foto: "img/lasagna.jpg",
            descrizione: "Sei un gourmet raffinato",
            valore: -10,
            label: "Lasagna"
          },
          {
            nome: "Crudaiola",
            foto: "img/crudaiola.jpg",
            descrizione: "Sei un esperto di cucina creativa",
            valore: 20,
            label: "Crudaiola"
          },
          {
            nome: "Orecchiette",
            foto: "img/orecchiette.jpg",
            descrizione: "Sei un'appassionato di pesce fresco",
            valore: 30,
            label: "Orecchiette"
          },
          {
            nome: "Agnello con piselli",
            foto: "img/agnello-piselli.jpg",
            descrizione: "Sei un gourmet raffinato",
            valore: -10,
            label: "Agnello con piselli"
          },
          {
            nome: "Calzone di cipolle",
            foto: "img/calzone-cipolle.jpg",
            descrizione: "Sei un esperto di cucina creativa",
            valore: 20,
            label: "Calzone di cipolle"
          },
          {
            nome: "Crudo di Mare",
            foto: "img/crudo-di-mare.jpg",
            descrizione: "Sei un'appassionato di pesce fresco",
            valore: 30,
            label: "Crudo di Mare"
          },
        ];
    let questions = [
       {
           question: "Che ne pensi delle cozze?",
           answers: [
               {
                   "text": "Parmigiana di melanzane",
                   "value": 10
               },
               {
                   "text": "Sgagliozze",
                   "value": 0
               },
               {
                   "text": "Popizze",
                   "value": -10
               }
           ]
       },
       {
       question: "Quale è il tuo piatto preferito?",
           answers: [
               {
                   "text": "Pasta al pesto",
                   "value": 10
               },
               {
                   "text": "Carbonara",
                   "value": 0
               },
               {
                   "text": "Patate riso e cozze",
                   "value": -10
               }
           ]
       },
       {

       question: "Quale è il tuo piatto preferito?",
           answers: [
               {
                   "text": "Lasagna",
                   "value": 10
               },
               {
                   "text": "Crudaiola",
                   "value": 0
               },
               {
                   "text": "Orecchiette",
                   "value": -10
               }
           ]
       },

       {

           question: "Cosa ti piacerebbe assaggiare come primo piatto a pranzo?",
           answers: [
               {
                   "text": "Agnello con piselli",
                   "value": -10
               },
               {
                   "text": "Calzone di cipolle",
                   "value": 5
               },
               {
                   "text": "Crudo di Mare",
                   "value": 20
               }
           ]
       }
    ]




function Punteggio(){
    var punti=0; 


    for(var i=0; i<questions.length; i++){
        var domanda=questions[i];
        var risposte=document.getElementsByName("question -" +(i+1))



        for(var j=0; j<risposte.length; j++){
            var risposta=risposte[j];


            if(risposta.checked){
                var valorerisposta=domanda.answers[j].value;
                punti=punti+valorerisposta;
                break;
            }
        }
    }


    var piattiscelti=document.querySelectorAll(".Domande input[type='radio']:checked");
    for(var k=0; k<piattiscelti.length; k++){
        var piattoScelto=piattiscelti[k];
        var valorepiatto=piattoScelto.value;



        for(var m=0; m<piatti.length; m++){
            var piatto=piatti[m];


            if(piatto.nome===valorepiatto){
                punti=punti+parseInt(piatto.valore);
                break;
            }
        }
    }


    var Risultato=document.querySelector(".Risultato1")
    Risultato.innerHTML="Il tuo punteggio è "+punti



    var descrizione;
    var immaginipiatti;

    for(var s=0; s<piatti.length; s++){
        var piatto=piatti[s];
        if(punti===piatto.valore){
            descrizione=piatto.descrizione;
            immaginipiatti=document.createElement("img")
            immaginipiatti.src=piatto.foto;
            break;
        }
    }


    var DescriRisul=document.querySelector(".Risultato2")
    if(descrizione){
        DescriRisul.innerHTML=descrizione
        DescriRisul.appendChild(immaginipiatti)
    }
    else{
        DescriRisul.innerHTML="Non corrispondi a nulla"
    }
}







        




        
    

        
    