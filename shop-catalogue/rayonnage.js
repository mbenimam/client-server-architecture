function rayonnage(){

  var input = document.getElementById('query');
  var cat = document.getElementById('cat');

  var req = 'getCatInfo.php?cat='+cat.value;

  ajax(req, '', responseRayon);
  req = req + '&qry='+input.value;
  ajax(req, '', responseProduits);
}

function responseProduits(xhr){
  if(xhr.readyState == 4){
    var listeAutoComp = document.getElementById('listeAutoComp');

    listeAutoComp.style.display = 'none';
    var response = xhr.responseText;
    var tr, regex, td, i;
    var trs = document.getElementsByTagName('tr');

    for(i=0;i<trs.length;i++){
      tr = trs[i];
      td = tr.firstElementChild.firstChild.nodeValue;

      regex = new RegExp(td+';');

      if(regex.test(response)){
        tr.style.display= 'table-row';
      }else{
        tr.style.display= 'none';
      }
    }

  }
}
function responseRayon(xhr){

  if(xhr.readyState == 4){
    var header = document.getElementById('rayon');
    var response = xhr.responseText.split(';');
    header.firstChild.nodeValue = response[0];
    header.style.backgroundImage = (!response[1]) ? 'None' : 'url('+response[1]+')';
  }

}
