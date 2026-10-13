<?php

  if(isset($_GET["nom"]) AND isset($_GET["prenom"]) AND isset($_GET["mail"])){

    $nom = !empty($_GET['nom']) ? $_GET['nom'] : '';
    $prenom = !empty($_GET['prenom']) ? $_GET['prenom'] : '';
    $mail = !empty($_GET['mail']) ? $_GET['mail'] : '';

    $date = date(time());
    $file = $nom."_".$prenom.'.vcf';
    $file = 'filename="'.$file.'";cration-date="'.$date.'"';

    header("Content-Type: text/x-vcard; charset=utf-8");
    header("Content-Disposition: attachement;".$file);

    echo "begin:vcard\n";
    echo "fn:$nom $prenom\n";
    echo "n:$prenom;$nom\n";
    echo "email;internet:$mail\n";
    echo "version:2.1\n";
    echo "end:vcard";

  }

?>
