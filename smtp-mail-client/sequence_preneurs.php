<?php
function lancer_phraseur($fichier){
    $xml_phraseur = xml_parser_create();  
    
    // Les noms de balise et attributs ne doivent pas passer en majuscules
    // automatiquement car XHTML ne le fait pas.
    xml_parser_set_option($xml_phraseur, XML_OPTION_CASE_FOLDING, 0);
    xml_set_element_handler($xml_phraseur, "ouverture", "fermeture");
    xml_set_character_data_handler($xml_phraseur, "texte");
    
    // Ouverture et analyse du fichier
    if (!$fp = fopen($fichier,'r'))
        return array(false, false);

    while ($data = fread($fp,256)){
    	if(!xml_parse($xml_phraseur, $data, feof($fp)))
            return array($xml_phraseur, true);
    }
    return array($xml_phraseur, false);
}
?>
