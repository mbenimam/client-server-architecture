function immobilier_dom(form){


  var terrain = form.elements['terrain'];
  var logement = form.elements['logement'];
  var categorie = form.elements['categorie'];

  var errors = document.getElementById("messageErreur");

  var t = controle_saisie(terrain);
  var l = controle_saisie(logement);
  var c = (categorie.value == 'appartement' && terrain.value) ? 'Pas de terrain si appartement' : '';

  if(l || t || c){
    errors.innerHTML = '<p>'+t+'</p>' + '<p>' + l + '</p>' + '<p>'+c+'</p>';
    return false;
  }

  errors.innerHTML = '';

  // quesry string
  var qs = "terrain="+terrain.value+
           "&logement="+logement.value+
           "&categorie="+categorie.value;

  return !ajax("immobilier.post.php", qs, immobilier, 'POST');
}
