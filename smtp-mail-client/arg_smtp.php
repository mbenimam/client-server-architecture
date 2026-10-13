<?php
function arg_smtp($sock, $mail, $requete='RCPT TO')
{
   if (preg_match('@<(.*)>@', $mail, $m))
        $exp = $m[1];
    else $exp = $mail;
    fputs($sock, "$requete: $exp\r\n");
    return reponse_smtp($sock);
 }
?>
