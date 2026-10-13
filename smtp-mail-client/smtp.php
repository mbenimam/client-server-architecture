<?
require_once('mails.php');
require_once('reponse_smtp.php');
require_once('arg_smtp.php');
require_once('mime_smtp.php');

  function smtp($emet, $dest, $sujet, $corp, $server='127.0.0.1', $port){
    header('Content-Type: text/plain');

    $sock = @fsockopen($server, $port, $e, $m);
    reponse_smtp($sock);
    fputs($sock, "EHLO $server\r\n");
    reponse_smtp($sock);
    arg_smtp($sock ,$emet,'MAIL FROM');
    foreach($dest as $m) arg_smtp($sock, $m);
    fputs($sock, 'DATA'. "\r\n");
    reponse_smtp($sock);

    if(!$sujet){
      fputs($sock, $corp);
    }else{
      mime_smtp($emet, $dest, $sujet, $corp, $sock);
    }

    fputs($sock, "\r\n.\r\n");
    reponse_smtp($sock);
    fputs($sock, "QUIT\r\n");
    reponse_smtp($sock);

  }

  global $mails;
  lancer_phraseur('carnet.xml');

  smtp('mbeni12333@gmail.com', $mails['to'], 'khra', 'FUCK YOU', '127.0.0.1', 5225)
?>
