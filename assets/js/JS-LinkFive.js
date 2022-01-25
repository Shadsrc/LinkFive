
//Renvoie une chaine de caractère aléatoire de longueur 6
// Verifier pour le state si c'est necessaire !!!!

function Chaine_alea(){

    var id = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  
    for (var k = 0; k < 5; k++)
      id += possible.charAt(Math.floor(Math.random() * possible.length));
  
    return id; 
}
  
console.log(Chaine_alea());

/* ----------------------------------------------------------------------------------------------------------*/

fetch("http://10.0.10.139/wp-admin/?code")
  .then(function(res){
    if(res.ok){
      return res.json();
    }
  })
  .then(function(value) {
    console.log(value);
  })
  .catch(function(err) {
    // Une erreur est survenue
  });