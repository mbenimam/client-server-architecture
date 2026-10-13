<?
  function reponse_smtp($sock){

    if($sock){
      while($reponse = fgets($sock)){
        echo $reponse;

        if(!preg_match("/^(\d\d\d)(.)/", $reponse, $m))
          return 500;
        if($m[2] == ' '){
          if($m[1] < 400) return $m[1];
          else die('Refus de servir');
        }

      }
    }
    die('Erreur !');
  }
?>
