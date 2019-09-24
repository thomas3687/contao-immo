<?php

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array(
       'ImmoClass',
       'loadProjektReference'
);

$GLOBALS['TL_DCA']['tl_content']['palettes']['immobilienverwaltung_projekt'] = 'name,type;{projekt_select_legend},tl_immo_projekt_selected;{protected_legend:hide},protected;{expert_legend:hide},align,space,cssID';

/**
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['tl_immo_projekt_selected'] = array(
       'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_immo_projekt_selected'],
       'inputType' => 'select',
	     'reference' => &$GLOBALS['TL_LANG']['tl_immo_projekte']['projektReference'],
       'options_callback' => array('ImmoClass', 'getProjekte'),
       'eval' => array('mandatory' => true, 'tl_class' => 'clr'),
       'sql' => "varchar(255) NOT NULL default ''"
);
