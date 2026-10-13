<?php
 include_once('phraser.php');
 include_once('filtrer.php');
  /**
   *
   */
  interface sax_interface{
    function ouvrante($sax, $name, $att);
    function fermante($sax, $name);
    function texte($sax, $texte);
  }

  class sax_immobilier implements sax_interface{

    private $selected_items= array();
    private $item = array();
    private $contact = array();
    private $texte = "";

    function getSelected(){
      return $this->selected_items;
    }

    function ouvrante($sax, $name, $att){
      $this->texte = "";
      if($name == "item"){
        $this->item = $att;
      }
    }
    function fermante($sax, $name){
      global $filtres;

      if($name == "item"){
        if(filtrer($this->item, $filtres["categorie"],
                         $filtres["terrain"],
                         $filtres["logement"])){

          $this->selected_items[] = $this->item;
          /*print_r($this->selected_items);
          echo '<br>';*/
        }

        $this->contact = array();

      }else if($name == "description"){
        $this->item[$name] = $this->texte;
      }else if($name == "contact"){
        $this->item[$name] = $this->contact;
      }else if($name == "nom" || $name == "prenom" || $name == "mail"){
        $this->contact[$name] = $this->texte;
      }
    }
    function texte($sax, $texte){
      $this->texte .=  trim($texte);
    }
  }
?>
