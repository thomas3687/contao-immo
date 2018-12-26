<?php
/**
 * Back end modules
 */
 /*



*/
array_insert($GLOBALS['BE_MOD'], 0, array(

//neue Gruppierung im Backend mit dem platzhalter-Namen tl_immobilienverwaltung
    'tl_immobilienverwaltung' => array(
	  //hier werden die Tabellen angegeben auf die das Modul zugreifen darf
    'tl_projekte' => array(
        'tables' => array('tl_immo_projekte', 'tl_immo_wohnungen'),
		      //icon zum Modul
		     'icon'   => 'system/modules/immo/assets/images/home.svg'
        )
  )
));

/**
 * Front end modules
 */

 //Frontendmodule für das Modul "immobilienverwaltung"
$GLOBALS['FE_MOD']['immobilienverwaltung'] = array
(
	//Platzhalter-Name des Templates => Klasse die sich um die implementierung des Templates kümmert
	//'immobilienverwaltung_projekt'     => 'ModuleImmobilienverwaltungProjekt'
);

?>
