<?php

  include_once('filtrer.php');
  include_once('immobilier.sax.php');

  if(isset($_POST["categorie"]) AND
     isset($_POST["terrain"]) AND
     isset($_POST["logement"])){
    /*print_r($_POST);
    echo '<br>';*/
    // etape entree utilisateur , regx, preprocessing
    $categorie= ($_POST["categorie"] != "") ? $_POST["categorie"]: false;
    $terrain  = !empty($_POST["terrain"]) ? $_POST["terrain"]: false;
    $logement = !empty($_POST["logement"]) ? $_POST["logement"]: false;


    // creation du global filtre
    $filtres = array("categorie" => $categorie,
                     "terrain"   => $terrain,
                     "logement"  => $logement );
    /*print_r($filtres);
    echo '<br>';*/
    // creation du parser
    $obj = new sax_immobilier();

    phraser("immobilier.xml", $obj);
    $selected_items = $obj->getSelected();
    /*print_r($selected_items);*/
    if(empty($selected_items)){
      echo '<h1>Pas de Resultat</h1>';
    }else{
      ?>
        <table>
          <caption>Resultats</caption>
          <tr>
            <th>contact</th>
            <th>categorie</th>
            <th>prix</th>
            <th>terrain</th>
            <th>logement</th>
            <th>description</th>
          </tr>
          <?php
            foreach($selected_items as $item){
              // contact
              $nom = $item["contact"]["nom"];
              $prenom = $item["contact"]["prenom"];
              $mail = $item["contact"]["mail"];

              $url = "vcard.php?nom=$nom&prenom=$prenom&mail=$mail";
              // autres elements
              $categorie = $item["categorie"];
              $prix = $item["prix"];
              $terrain = !empty($item["terrain"]) ? $item["terrain"] : "None";
              $logement = $item["logement"];
              $description = $item["description"];


              echo '<tr class="'.$categorie.'">';
              echo '<td><a href="'.$url.'">'.$nom.' '.$prenom.'</a></td>';
              echo '<td>'.$categorie.'</td>';
              echo '<td>'.$prix.'</td>';
              echo '<td>'.$terrain.'</td>';
              echo '<td>'.$logement.'</td>';
              echo '<td>'.$description.'</td>';
              echo '</tr>';
            }
          ?>
        </table>

      <?php
    }

  }
?>
