fetch("index.php")
   .then(response => response.json())
   .then(data => console.log(data))
   .catch(error => console.log("Si è verificato un errore!", error));