<?php

  require_once("./config.php");
      if(isset($_POST["destination"])){
        $truc = explode(".", $_POST["destination"]);
        echo "<p>vous avez choisi <b>".$truc[1]."</b>";
      }

?>
