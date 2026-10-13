<?php
  require_once("./config.php");

  function trouver_sous_index($destination, $nomPays){
    foreach($destination as $continent => $pays){
      foreach($pays as $p => $villes){
        if($p == $nomPays){
          return $villes;
        }
      }
    }
    return array();
  }

?>
