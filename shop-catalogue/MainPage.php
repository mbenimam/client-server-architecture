<?php
  require_once('LoadProd.php');
  require_once('EnRayon.php');


  function tableau_en_table($tab, $caption=''){
    if (!$tab) return '';
    $chaine = "";
    foreach($tab as $k => $v)
      $chaine .= "<tr>\n<td>$k</td>\n<td>$v</td>\n</tr>\n";
    $th = "<tr>\n<th>Nom</th>\n<th>Prix</th>\n</tr>\n";
    return "<table>\n<caption>$caption</caption>\n$th$chaine</table>\n";
  }
  function debut_html($title, $links = array()) {

  $styles = '';
  foreach ($links as $link) {
      if (!is_array($link)) {
          // Si pas un sous-tableau,
          // on considere que c'est un contenu pour une balise Style
          // Les DTD autorisent qu'il y en ait plusieurs.
          $styles .= "<style type='text/css'>$link</style>";
      } else {
          $atts = '';
          // prevoir une valeur par defaut pour rel, et ce qui va avec
          if (!isset($link['rel'])) {
              $link['rel'] = 'stylesheet';
              if (!isset($link['type']))
                  $link['type'] = 'text/css';
          }
         foreach ($link as $k => $v) $atts .= " $k='$v'";
         $styles .= "<link$atts />";
      }
  }
  return
    "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML Basic 1.1//EN'
        'http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd'>\n" .
    "<html xmlns='http://www.w3.org/1999/xhtml' lang='fr'>\n" .
    "<head>" .
    "<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />\n" .
    "<title>" .
    $title .
    "</title>" .
    $styles .
    "</head>";
  }

  echo debut_html("Objet de complément",array(array('rel'=>'stylesheet', 'href'=>'MainPage.css', "type"=>'text/css')));
  echo '<body>';

  $table = LoadProd();
  if(!$table){
    echo '<h1>Entretien du site</h1>';
  }else{

    echo '<h1 id="rayon">All</h1>';
    echo EnRayon($produits);
    echo tableau_en_table($table);

  }

?>

<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="autocomp.js"></script>
<script type="text/javascript" src="rayonnage.js"></script>
<script>
  var form = document.getElementById('form');
  form.onsubmit = function(event){
    rayonnage();
    event.preventDefault();
  }
</script></body></html>
