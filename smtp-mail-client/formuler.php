<?php
require_once('mails.php');

  function formuler($mails, $sujet='', $corp='', $script=''){


    $opt = '';
    $own = '';
    if(isset($mails['to'])){
      foreach($mails['to'] as $dest){
        $opt .= '<li><label><input type="checkbox" name="to[]">'.$dest.'</label></li>';
      }
    }
    if(isset($mails['from'])){
      foreach ($mails['from'] as $key => $self) {
        $own .= '<option vaule="'.$key.'">'.$self.'</option>';
      }
    }

      return '<form method="post" action="'.$script.'" style="width:70%;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%)">
        <fieldset>
          <legend>To</legend>
          <ul style="list-style: none">
            '.$opt.'
          </ul>
        </fieldset>
        <fieldset>
          <label for="sujet">Sujet:
          <input type="text" id ="sujet" name="sujet" value="'.$sujet.'">
          </label>
        </fieldset>
        <fieldset>
          <textarea name="form" style="font-size: 24px;padding: 10px;width:100%;height:300px;resize:none">'.$corp.'</textarea>
          <label for="from"></label>
          <select name="from">
            <option value="" selected="selected"></option>
            <?echo $own;?>
          </select>
          <input type="submit" value="Submit">
        </fieldset>
      </form>';
  }

  /*global $mails;
  lancer_phraseur('carnet.xml');
  echo formuler($mails, 'kheryah', 'Hello fucker', 'khra.php');*/
?>
