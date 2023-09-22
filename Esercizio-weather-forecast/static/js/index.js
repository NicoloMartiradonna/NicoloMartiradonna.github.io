document.addEventListener("DOMContentLoaded", function () {
    let marker;
    let circle;
    let map;
    let latitudine;
    let longitudine;
    let Posizione = document.querySelector(".Posizione");
    let temperature_2m_max;
    let temperature_2m_min;
    let Temperatura = document.querySelector(".Temperatura");
    let reset=document.querySelector(".Reset")


    reset.addEventListener("click", function () {
        let lati=document.querySelector("#lat");
        lati.value="";
    });

    function creazioneMappa(lati, lon) {
      if (map) {
        map.remove();
      }
  
      map = L.map('map').setView([lati, lon], 13);
      map.on('click', function (event) {
        let lati = event.latlng.lat;
        let lon = event.latlng.lng;
        creazioneMappa(lati, lon);
      });
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);
  
      if (marker) {
        marker.remove();
      }
  
      if (circle) {
        circle.remove();
      }
  
      marker = L.marker([lati, lon]).addTo(map);
      marker.on('dragend', function (event) {
        latitudine = event.target.latitude;
        longitudine = event.target.longitude;
        Posizione.innerHTML = 'Latitudine: ' + latitudine + ', Longitudine: ' + longitudine;
        T(latitudine, longitudine);
      });

      Posizione.innerHTML = 'Latitudine: ' + latitudine + ', Longitudine: ' + longitudine;
  
      Temperature(lati, lon);

  
    }
  
    navigator.geolocation.getCurrentPosition(
      function (event) {
        latitudine = event.coords.latitude;
        longitudine = event.coords.longitude;
        console.log("L'utente ha accettato");
        creazioneMappa(latitudine, longitudine);
      },
      function (event) {
        console.log("L'utente non ha accettato")
        creazioneMappa(0,0)
      }
    );
  
    let Richiesta = document.querySelector(".Dati");
    Richiesta.addEventListener("click", function (event) {
      event.preventDefault();
  
      let lati = document.querySelector("#lat").value;
      let lon = document.querySelector("#lng").value;
  
      creazioneMappa(lati, lon);
    });



    function Temperature(latitudine, longitudine){
        let url=`https://api.open-meteo.com/v1/forecast?latitude=${latitudine}&longitude=${longitudine}&daily=temperature_2m_min,temperature_2m_max`;
        
    
        fetch(url)
        .then(function(resp){
            return resp.json();
        })
        .then(function (data){
            if(data.daily.temperature_2m_min != undefined && data.daily.temperature_2m_max != undefined){
                temperature_2m_min=data.daily.temperature_2m_min[0];
                temperature_2m_max=data.daily.temperature_2m_max[0];
                
                console.log(temperature_2m_max, temperature_2m_min);
  
            }
        })
    }
  });
