<?php
  function CompleteParmi($rayon, $chaine) {

    $regex = '';
    foreach(str_split($chaine) as $c){
      $regex .= '.*'.preg_quote($c, '/');
    }
    $regex = $chaine ? '^'.$regex : '';
    $table = LoadProd($regex, $rayon);
    return join(";", array_keys($table));
  }
?>
