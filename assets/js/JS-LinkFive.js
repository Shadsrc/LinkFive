
//Renvoie une chaine de caractère aléatoire de longueur 6

function Chaine_alea(){

    var id = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  
    for (var k = 0; k < 5; k++)
      id += possible.charAt(Math.floor(Math.random() * possible.length));
  
    return id; 
}
  
console.log(Chaine_alea());

/* ----------------------------------------------------------------------------------------------------------*/
