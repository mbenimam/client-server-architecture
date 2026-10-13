<?php
  require_once('Lancer_Phraseur.php');

  $produits = array();

  function ouverture($sax, $name, $att){

    global $produits, $lastAtt;

    if($name == "prix"){
      $att['for'] = $lastAtt['for'];
    }
    if($att) $lastAtt = $att;
  }
  function fermeture($sax, $name){

    global $produits, $lastAtt, $data;

    if($name == "rayon"){
      if(!isset($produits[$lastAtt['id']])){
        $produits[$lastAtt['id']] = array();

        if(isset($lastAtt['img'])){
          $produits[$lastAtt['id']]['img'] = $lastAtt['img'];
        }

        $produits[$lastAtt['id']]['desc'] = $data;
        $produits[$lastAtt['id']]['prod'] = array();
      }
      return;
    }
    if($name == "nom"){
      $produits[$lastAtt['for']]['prod'][$data] = $lastAtt['val'].$lastAtt['devise'];
    }

    $data = '';

  }
  function texte($sax, $texte){
    global $data;

    if($texte != ''){
      $data .= trim($texte);
    }

  }
?>
