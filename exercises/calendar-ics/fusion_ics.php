<?php


  function fusion_ics($fichier_agenda1, $fichier_agenda2){
    // lecture des fichier ics, ou chaque ligne est une case du tableaux
    $agenda1 = file($fichier_agenda1);
    $agenda2 = file($fichier_agenda2);

    //on retire le dernier element du premier
    array_pop($agenda1);
    //on retire le premier begin, et on onleve toutes les lignes qui ne sont pas fann_destroy
    // begin jusqu'a en arriver a un;
    array_shift($agenda2);

    while(!preg_match("@^BEGIN:@", $agenda2[0])){
      array_shift($agenda2);
    }
    // maintenant on fusionne les deux arrays
    $merged_array_agenda = array_merge($agenda1, $agenda2);
    // on affiche le truc
    // /var_dump($merged_array_agenda);


    return $merged_array_agenda;
  }
  function envoi_ics($array_agenda, $filename){
    // si le tableau vide on affiche le resultat en tant
    // que texte, sinon on affihce l'agenda
    if(!empty($array_agenda)){
      header("Content-Type: text/calendar; charset=utf-8");
      header("Content-Transfer-Encodig 8bit");
      header("Content-Disposition: inline; filename*=utf-8''$filename");
      echo join($array_agenda);
    }else{
      header("Content-Type: text/plain; charset=utf-8");
      echo $filename;
    }


  }

  // UNFINISHED: etes_vous_libre() is pseudo-code and does not parse yet.
  // Kept commented out (not deleted) until its logic is written.
  /*
  function etes_vous_libre($array_agenda, $str_date){
    $i=0;

    $reg_date = "(\d{8})T\(d{6})";
    preg_match("@$reg_date@", $str_date, $arr_original);

  while(i<len($array_agenda)){

      while(!preg_match("@^DSTART."$arr_original[1]."T(.*)$@", $array_agenda[$i++], $arr1));

      while(!preg_match("@^DEND.*."$arr_original[1]."T(.*)$@", $array_agenda[$i++], $arr2));

      // pseudo code verifie jour

            if($arr1[2]<=$arr_original[2] and $arr2[2]>=$arr_original[2])
                  return False;

      }
      array_pop();
      $array_agenda[]="BEGIN:VEVENT";
      $array_agenda[]="DTSTART;TZID=Europe/Paris:20181217T160000";
      $array_agenda[]="DTEND;TZID=Europe/Paris:20181217T174500";
      $array_agenda[]="LAST-MODIFIED:20190529T044624";
      $array_agenda[]="UID:SACS-Travaux Dirigés-11-1@https://www-licence.ufr-info-p6.jussieu.fr:8083/lmd/licence/2018/ue/3I016-2018oct";
      $array_agenda[]="SUMMARY:SACS TD G1 11";
      $array_agenda[]="DESCRIPTION:SACS (Séance 11)";
      $array_agenda[]="ATTENDEE:mailto:rafael.ferro@ircam.fr";
      $array_agenda[]="LOCATION:14-24 110";
      $array_agenda[]="SEQUENCE:15";
      $array_agenda[]="END:VEVENT";
      $array_agenda[]="END:VCALENDAR";
      return True;

    }

  }

  }
  */

  //envoi_ics(fusion_ics("./agenda1.ics", "./agenda2.ics"), "agenda3.ics");

?>
