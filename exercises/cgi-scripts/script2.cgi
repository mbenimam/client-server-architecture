#!/bin/sh
cat << EOF
Content-type: text/html; charset=utf-8

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>server info</title>
  </head>
  <body>
  <table>
    <tr style="background-color:#81D4FA">
      <th>Nom variable</th>
      <th>Valeur</th>
    </tr>
    <tr style="background-color:#039BE5">
      <td>SCRIPT_NAME</td>
      <td>$SCRIPT_NAME</td>
    </tr>
    <tr style="background-color:#81D4FA">
      <td>SERVER_SOFTWARE</td>
      <td>$SERVER_SOFTWARE</td>
    </tr>
    <tr style="background-color:#039BE5">
      <td>SERVER_ADDR</td>
      <td>$SERVER_ADDR</td>
    </tr>
    <tr style="background-color:#81D4FA">
      <td>REMOTE_PORT</td>
      <td>$REMOTE_PORT</td>
    </tr>
    <tr style="background-color:#039BE5">
      <td>REMOTE_ADDR</td>
      <td>$REMOTE_ADDR</td>
    </tr>
  </table>

  </body>
</html>


EOF
