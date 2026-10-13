// Fonction d'envoi de requetes asynchrones:
// url: ressource sur le serveur courant, avec query-string eventuelle
// flux: flux d'entree en cas de methode POST
// rappel: fonction a appliquer sur l'objet Ajax lorsque le serveur repond
// method: methode HTTP (GET par defaut)
function ajax(url, flux, rappel, method) {
  var r = window.XMLHttpRequest ? new XMLHttpRequest() :
    (window.ActiveXObject ?  new ActiveXObject("Microsoft.XMLHTTP") : '');
  if (!r) return false;
  r.onreadystatechange = function () {rappel(r);}
  r.open(method ? method : 'GET', url, true);
  if (flux)
      r.setRequestHeader("Content-Type", 
                         "application/x-www-form-urlencoded; ");
  r.send(flux);
  return true;
}
