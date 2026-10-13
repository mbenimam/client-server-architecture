<?php
  function filtrer($offre,
                   $categorie=false,
                   $terrain=false,
                   $logement=false){


    if($categorie AND isset($offre["categorie"]) AND $offre["categorie"] != $categorie) return false;
    if($terrain AND isset($offre["terrain"]) AND $offre["terrain"] > $terrain) return false;
    if($logement AND isset($offre["logement"]) AND $offre["logement"] > $logement) return false;

    return true;
  }

?>
