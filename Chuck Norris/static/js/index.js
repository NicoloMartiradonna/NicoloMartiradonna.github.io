
document.querySelector(".submitBtn1").addEventListener("click", function(e){
 let url="https://api.chucknorris.io/jokes/random";
 let categoria=document.querySelector(".category").value;
 if (categoria) {
    url += `?categoria=${categoria}`;
   }
   fetch(url)
     .then(response => response.json())
     .then(data => {
       document.querySelector(".paragraph").textContent = data.value;
       const linkjoke = document.querySelector(".linkjoke");
       const link = document.createElement("a");
       link.href = data.url;
       link.textContent = "Link alla battuta";
       document.querySelector(".di").appendChild(link);
       linkjoke.href = url;
       console.log("URL del link del joke caricato:", linkjoke.href);
});
   });

document.querySelector(".submitBtn2").addEventListener("click", function(e){
 const jokeText=document.querySelector(".paragraph").textContent;

 navigator.clipboard.writeText(jokeText);
});

