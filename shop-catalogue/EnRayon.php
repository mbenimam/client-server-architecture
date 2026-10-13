<?php
  function EnRayon($produits){

    $opt ='';

    foreach($produits as $rayon => $a){
      $opt .= '<option>'.$rayon.'</option>';
    }
      return '<form id="form">
        <fieldset>
          <input type="text" id="query" name="query"
          autocomplete="off" onkeyup="autocomp(this.value)">
          <select id="cat" name="cat">
            <option value="">All</option>
            '.$opt.'
          </select>
          <input type="submit" value="Recherche">
          <div id="listeAutoComp" style="display:none">

          </div>
        </fieldset>
      </form>';
  }
?>
