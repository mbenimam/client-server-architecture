<?php
  //include("./header.php");
  require_once("./config.php");
  $m = array();
  if(preg_match(RE_URL, "//www.google.com:80/content?npm=12", $m)){
    echo "inside preg/valide<br>";
  }
  if(count($m) == 6){
    echo "Match<br>";
  }else{
    echo "Match error <br>";
  }
  print_r($m);


  //include("./footer.php");
 ?>
