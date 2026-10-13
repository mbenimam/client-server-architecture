<?php
require_once('sequence_preneurs.php');

$mails = array('from' => array(),
               'to' =>   array());

function ouverture($sax, $name, $att){
  global $mails, $lastAtt;
  if($name == 'item'){
    if(!isset($att['type']))
      $att['type'] = 'to';
  }
  if($name == 'mail'){
    $att['type'] = $lastAtt['type'];
  }
  $lastAtt = $att;
}
function fermeture($sax, $name){
  global $mails, $lastAtt, $data;

  if($name == 'mail'){
    $str = $lastAtt['adresse'];

    if($data){
      $str = '"'.$data.'" <'.$lastAtt['adresse'].'>';
      $str = htmlspecialchars($str);
    }

    $index = $lastAtt['type'] == 'moi' ? 'from' : 'to';

    $mails[$index][] = $str;
  }
  $data = '';
}
function texte($sax, $texte){
  global $data;

  $data = trim($texte);
}
?>
