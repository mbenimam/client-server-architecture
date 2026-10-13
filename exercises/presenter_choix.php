<?php
  require_once("./config.php");
  function presenter_choix($tableau_valeurs, $n, $ch=""){
    print_r($tableau_valeurs);
    // verification de n
    if($n > count($tableau_valeurs)){
      $n = count($tableau_valeurs)-1;
    }
    // creation du formulaire
    $form = '<form action="" method="POST"><fieldset>';
    $form .= '<ul>
    ';
    if($n>0) $form .= '<li><input name="item" value="'. ($n-1) .'" type="submit"></li>';
  $form .= '<li><input name="item" value="'.array_values($tableau_valeurs)[$n].'" type="submit"></li>';
  if($n<count($tableau_valeurs)-1) $form .= '<li><input name="item" value="'. ($n+1) .'" type="submit"></li>
  <li></li>
</ul>';
    $form .= '</fieldset></form>';

    return $form;
  }
?>
