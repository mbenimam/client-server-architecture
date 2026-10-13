<?php
  require_once("./header.php");
  require_once("./config.php");


  if(isset($_POST['destination'])){
    setcookie("ville", $_POST["destination"]);
  }else if(isset($_COOKIE['ville'])){
    $n = isset($_POST['item']) ? $_POST['item']: 1;
    echo presenter_choix(trouver_sous_index($destinations, $_COOKIE['ville']), $n);
  }else{
    echo tableau_en_select($destinations, "");
  }





  require_once("./footer.php")
?>
