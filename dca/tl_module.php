<?php

/*
Palette für das Modul turnierpaare_list
*/

// $GLOBALS['TL_DCA']['tl_module']['palettes']['turnierpaare_list'] = '{title_legend},name,headline,type;{turnierpaare_select_legend},tl_turnierpaare_selectCouples;{turnierpaaredetail_legend},tl_turnierpaare_detail;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/*
Palette für das Modul turnierpaare_ergebnisse_list
*/
// $GLOBALS['TL_DCA']['tl_module']['palettes']['turnierpaare_ergebnisse_list'] = '{title_legend},name,headline,type;{turnierpaaredetail_legend},tl_turnierpaare_detail;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/*
Palette für das Modul turnierpaare_ergebniss_neu
*/
// $GLOBALS['TL_DCA']['tl_module']['palettes']['turnierpaare_ergebnisse_neu'] = '{title_legend},name,headline,type;{turnierpaare_ergebniss_neu_legend},tl_turnierpaare_ergebniss_email,tl_turnierpaare_ergebniss_email_absender,tl_turnierpaare_ergebniss_email_name,tl_turnierpaare_ergebniss_email_subject;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/*
Palette für das Modul turnierpaare_turniermeldungen
*/
// $GLOBALS['TL_DCA']['tl_module']['palettes']['turnierpaare_turniermeldungen'] = '{title_legend},name,headline,type;{turnierpaare_turniermeldungen_legend},tl_turniermeldungen_selection;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/*
Palette für das Modul turnierpaare_turniermeldungen
*/
// $GLOBALS['TL_DCA']['tl_module']['palettes']['turnierpaare_turniermeldungen_suche'] = '{title_legend},name,headline,type;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

// $GLOBALS['TL_DCA']['tl_module']['palettes']['tanzpartnervermittlung_list'] = '{title_legend},name,headline,type;{tanzpartnervermittlung_select_gender_legend},tl_tanzpartnervermittlung_selectGender;
// {tanzpartnervermittlung_legend},tl_tanzpartnervermittlung_detail;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

// $GLOBALS['TL_DCA']['tl_module']['palettes']['tanzpartnervermittlung_neu'] = '{title_legend},name,headline,type;
// {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
 /**
 * Add fields to tl_module
 */

/*
hier wird die tabelle tl_module um folgende felder erweitert um die Einstellungen des Moduls speichern zu können

*/

//speichert die Weiterleitungsseite (Frontend) in er die Details des Turnierpaares angeschaut werden können
/*$GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_bilder'] = array(
       'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_bilder'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'foreignKey'              => 'tl_page.title',
	'eval'                    => array('mandatory'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'",
	'relation'                => array('type'=>'hasOne', 'load'=>'eager')
);
*/

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_email_name'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_email_name'],
//        'exclude'                 => true,
//  			'sorting'                 => true,
//  			'flag'                    => 1,
//  			'search'                  => true,
//  			'inputType'               => 'text',
//  			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
//  			'sql'                     => "varchar(255) NOT NULL default ''"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_email_subject'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_email_subject'],
//        'exclude'                 => true,
//  			'sorting'                 => true,
//  			'flag'                    => 1,
//  			'search'                  => true,
//  			'inputType'               => 'text',
//  			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
//  			'sql'                     => "varchar(255) NOT NULL default ''"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_email'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_email'],
// 	'exclude'                 => true,
//   'inputType'               => 'text',
//   'eval'                    => array('mandatory'=>true, 'rgxp'=>'email', 'maxlength'=>255, 'unique'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50'),
//   'sql'                     => "varchar(255) NOT NULL default ''"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_email_absender'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_email_absender'],
// 	'exclude'                 => true,
//   'inputType'               => 'text',
//   'eval'                    => array('mandatory'=>true, 'rgxp'=>'email', 'maxlength'=>255, 'unique'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50'),
//   'sql'                     => "varchar(255) NOT NULL default ''"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_selectCouples'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_selectCouples'],
//        'default' => 'Alle',
//        'inputType' => 'select',
//        'options' => array('A','B','C','D','E','R'),
// 	   //reference = ersetzt die options 'A' 'B' ... durch richtigen text
// 	   'reference' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_filteroptions'],
//        'eval' => array('mandatory' => true),
//        'sql' => "varchar(255) NOT NULL default ''"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turniermeldungen_selection'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turniermeldungen_selection'],
//        'default' => 'Alle',
//        'inputType' => 'select',
//        'options' => array('Alle','Eigene'),
// 	   //reference = ersetzt die options 'A' 'B' ... durch richtigen text
// 	   'reference' => &$GLOBALS['TL_LANG']['tl_module']['tl_turniermeldungen_selection_filteroptions'],
//        'eval' => array('mandatory' => true),
//        'sql' => "varchar(255) NOT NULL default ''"
// );


//speichert die Weiterleitungsseite (Frontend) in er die Details des Turnierpaares angeschaut werden können
// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_detail'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_detail'],
// 	'exclude'                 => true,
// 	'inputType'               => 'pageTree',
// 	'foreignKey'              => 'tl_page.title',
// 	'eval'                    => array('mandatory'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr'),
// 	'sql'                     => "int(10) unsigned NOT NULL default '0'",
// 	'relation'                => array('type'=>'hasOne', 'load'=>'eager')
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_turnierpaare_ergebniss_bilder'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_turnierpaare_ergebniss_bilder'],
// 	'exclude'                 => true,
//   'inputType'               => 'fileTree',
//   'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
//   'sql'                     => "binary(16) NULL"
// );

// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_tanzpartnervermittlung_selectGender'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_tanzpartnervermittlung_selectGender'],
//        'default' => 'Alle',
//        'inputType' => 'select',
//        'options' => array('M','F'),
// 	   //reference = ersetzt die options 'A' 'B' ... durch richtigen text
// 	   'reference' => &$GLOBALS['TL_LANG']['tl_module']['tl_tanzpartnervermittlung_selectGender_filteroptions'],
//        'eval' => array('mandatory' => true),
//        'sql' => "varchar(255) NOT NULL default ''"
// );


//speichert die Weiterleitungsseite (Frontend) in er die Details des Turnierpaares angeschaut werden können
// $GLOBALS['TL_DCA']['tl_module']['fields']['tl_tanzpartnervermittlung_detail'] = array(
//        'label' => &$GLOBALS['TL_LANG']['tl_module']['tl_tanzpartnervermittlung_detail'],
//        'inputType' => 'pageTree',
//        'foreignKey' => 'tl_page.title',
//         'eval' => array('fieldType'=>'radio', 'mandatory'=>true),
//        'sql' => "varchar(255) NOT NULL default ''"
// );

?>
