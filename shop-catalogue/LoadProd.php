<?php
require_once('Phraseur.php');

  function LoadProd($regex='', $nomRay='',$file='Produits.xml'){

    global $produits;

    lancer_phraseur($file);

    if($regex === false AND !empty($nomRay)){
      return isset($produits[$nomRay]) ? $produits[$nomRay]: array();
    }

    $prods = array();
    $tous = !$nomRay ? $produits : (isset($produits[$nomRay]) ? array($produits[$nomRay]): array());
    if($regex != '')
      $regex = '/'.$regex.'/i';
    // faire pour tout les rayons
    foreach($tous as $rayon){

      $prods_rayon = $rayon['prod'];
      // verifier les produit de ce rayon
      foreach ($prods_rayon as $nom => $prix) {
        if(!$regex OR preg_match($regex, $nom)){
          $prods[$nom] = $prix;

        }
      }

    }
    ksort($prods);
    return $prods;
  }
?>
