<?php
  header('Content-Type: Text/plain');

  $cat = isset($_GET['cat']) ? $_GET['cat'] : false;
  $txt = isset($_GET['txt']) ? $_GET['txt'] : '';
  $qry = isset($_GET['qry']) ? $_GET['qry'] : '';

  if($cat === false){
    header('HTTP/1.0 204 No Content');
    exit();
  }
  require_once('LoadProd.php');

  if(isset($_GET['txt'])){
    require_once('CompleteParmi.php');
    echo CompleteParmi($cat, $txt);
  }elseif(isset($_GET['qry'])){
    require_once('getCatItems.php');
    echo getCatItems($cat, $qry);
  }else{

    $table = LoadProd(false, $cat);
    global $produits;

    if(!$table) echo "All;";
    else{
      echo $cat.';';
      if(isset($produits[$cat]) AND isset($produits[$cat]['img'])){
        echo $produits[$cat]['img'];
      }
    }
  }
?>
