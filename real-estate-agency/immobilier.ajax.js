function immobilier(xhr){
  if(xhr.readyState != 4){
    return;
  }
  if(xhr.status != 200){
    alert("Error");
    return;
  }

  var c = document.getElementById('resultats');

  c.innerHTML = xhr.responseText;
}
