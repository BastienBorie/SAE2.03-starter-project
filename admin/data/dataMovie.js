
// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "https://mmi.unilim.fr/~borie54/SAE2.03-starter-project";//"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

/**
 * DataMovie.add
 *
 * Prend en paramètre un objet FormData (données de formulaire) à envoyer au serveur.
 * Ces données sont incluses dans une requête HTTP en méthode POST.
 * La requête comprend aussi un paramètre todo valant add pour indiquer au serveur qu'il
 * s'agit d'une création (car on a codé le serveur pour qu'il sache quoi faire en fonction de la valeur de todo).
 *
 * @param {*} fdata un objet FormData contenant les données du formulaire à envoyer au serveur.
 * @returns la réponse du serveur.
 */

DataMovie.add = async function (fdata) {
  // console.log("DataMovie.add 1"); // Point de repère n°1
  let config = {
    method: "POST", // méthode HTTP à utiliser
    body: fdata, // données à envoyer sous forme d'objet FormData
  };
  // console.log("DataMovie.add 2 ", config); // Point de repère n°2

  let answer = await fetch(HOST_URL + "/server/script.php?todo=updateMovie", config);
  // console.log("DataMovie.add 3 "); // Point de repère n°3
  let data = await answer.json();
  return data;
};
export {DataMovie};
