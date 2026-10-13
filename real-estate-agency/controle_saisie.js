function controle_saisie(element){
  var regex = /^\s*\d+[\d\s]*([.,]\d+)?\s*$/;

  if(element.value == '' || regex.test(element.value)){
    element.style.border = "1px solid black";
    return '';
  }

  element.style.border = "3px solid red";
  return 'la valeur de ' + element.name + 'n\'est pas reel';
}
