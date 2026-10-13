  <?php
  // definir des variables ou des functions
  $shema_reg = "(?:([^:]+)://)?";
  $server_reg = "([^:/]+)?";
  $port = "(?::([0-9]+))?";
  $chemin = "(?:(/[^\?]+)*)?";
  $query_str = "(?:\?(.*))?";

    $reg = "#^"
    .$shema_reg."".
    $server_reg."".
    $port.
    $chemin.
    $query_str."#";




    require_once("./tableau_en_select.php");
    require_once("./trouver_sous_index.php");
    require_once("./presenter_choix.php");
    require_once("./destination.php");

    define("RE_URL", $reg);
    echo $reg."<br>";

  ?>
