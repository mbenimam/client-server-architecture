<?php
  function getCatItems($rayon='', $debut=''){
    $regex = $debut ? '^'.preg_quote($debut, '/').'.*$' : '';
    $table = LoadProd($regex, $rayon);
    return join(";", array_keys($table));
  }
?>
