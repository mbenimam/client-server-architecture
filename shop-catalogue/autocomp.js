function autocomp(text){
  var listeAutoComp = document.getElementById('listeAutoComp');

  listeAutoComp.innerHTML = '';
  listeAutoComp.style.display = 'none';

  if(text.length != ''){
    var cat = document.getElementById('cat');
    ajax('getCatInfo.php?cat='+cat.value +'&txt='+text,'', recvAutocomp);
  }
}

function recvAutocomp(xhr){

  if(xhr.readyState == '4'){
    var listeAutoComp = document.getElementById('listeAutoComp');
    var response = xhr.responseText.split(';');

    if(response) listeAutoComp.style.display = 'block';
    var d;
    console.log(response);
    for(var i in response){
      d = document.createElement('div');
      d.className = 'autoItem';
      d.addEventListener("click", function(){
        changeText(this);
      });
      d.appendChild(document.createTextNode(response[i]));
      listeAutoComp.appendChild(d);
    }

  }
}
function changeText(thing){
  document.getElementById('query').value = thing.firstChild.nodeValue ;
  document.getElementById('listeAutoComp').style.display='none';
}
