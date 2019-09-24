<?php

 /*klasse tl_turnierpaare
 hier werden hauptsächlich callback Funktionen implementiert die wir im DCA von der tabelle tl_turnierpaare benötigen

 */
 class tl_immo_projekte extends Backend
{
    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

	public function buttonWohnungen($row, $href, $label, $title, $icon, $attributes)
    {
        return '<a href="' . $this->addToUrl($href . '&id=' . $row['id'], 1) . '" title="' . specialchars($title) . '"' . $attributes . '>' . $this->generateImage($icon, $label) . '</a> ';
    }

    /**
     * Dynamically add flags to the "multiSRC" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setMultiSrcFlags($varValue, DataContainer $dc)
    {
      if ($dc->activeRecord)
      {
        $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = Config::get('validImageTypes');
      }

      return $varValue;
    }
}

/**
 * Table tl_turnierpaare
 */

 /*
 Hier wird die eigentliche MySQL Tabelle angelegt und konfiguriert, sowie festgelegt in welcher Form die einzelnen Felder im Backend ausgefüllt werden können

 nähere infos zu den einzelnen Felder:
 https://contao.org/de/manual/3.2/data-container-arrays.html

 */
$GLOBALS['TL_DCA']['tl_immo_projekte'] = array
(

	// Config
	'config'   => array
	(
		'dataContainer'    => 'Table',
		'enableVersioning' => true,
		'doNotCopyRecords' => true,
		/*ctable = Kind-Tabellen
			hierbei gilt zum Beispiel tl_turnierpaare.id = tl_turnierergebnisse.pid
			Dies ist besonders praktisch da hier contao für uns vorselektiert wenn wir später im Backend unter Turnierpaare in Paar auswählen und in einem unter Menu die Ergebnisse anschauen wollen
			Entsprechend muss in den DCA's im Bereich config der Kindertabellen der Eintrag 'ptable' = 'tl_turnierpaare' gesetzt werden

		*/
		'ctable'			=> array('tl_immo_wohnungen'),
		'sql'				=> array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),


	// List
	'list'     => array
	(
		/*
		Auswahl der felder nach denen der Reihe nach sortert werden soll
		*/
		'sorting'           => array
		(
			'mode'        => 2,
			'fields'      => array('projektName'),
			'flag'        => 1,
			/*
			Hier wird dem PanelLayout mitgeteilt, dass wir gerne filtern, sortieren und suchen wollen können. Nach was im einzelnen gefiltert, sortiert bzw gesucht werden kann wir in den einzelnen Feldern bekannt gemacht
			*/
			'panelLayout' => 'filter,sort,search'
		),

		/*
		hier wird die Darstellung der einzelnen Reihe im Backend formatiert
		fields = diese Tabellenfelder werden benötigt
		format = eingetliche formatierung der Reihe, HTML tags können verwendet werden
		*/

		'label'             => array
		(
			'fields' => array('projektName'),
			'format' => '%s',
		),

		//Globale Operationen
		'global_operations' => array
		(
			'all' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),


		//Operationen pro Reihe
		'operations'        => array
		(
		//bearbeiten
			'edit'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_immo_projekte']['edit'],
				'href'  => 'act=edit&mode=0',
				'icon'  => 'edit.gif'
			),
		//weiterleitung auf die turnierpaarbilder des entsprechenden Turnierpaares
			'wohnungen' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_immo_projekte']['wohnungen'],
                'icon' => 'sizes.gif',
				'attributes' => 'class="contextmenu"',
				//hier wird im link die tabelle festgelegt in der die turnierpaarbilder sind
				'href'       => 'table=tl_immo_wohnungen',
				//button_callback erstellt den eigentlichen link in der klasse 'tl_turnierpaare'  und der funktion buttonTurnierpaarbilder()
				'button_callback' => array(
                    'tl_immo_projekte',
                    'buttonWohnungen'
                )
            ),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_immo_projekte']['delete'],
				'href'       => 'act=delete&mode=0',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_immo_projekte']['show'],
				'href'       => 'act=show&mode=0',
				'icon'       => 'show.gif',
				'attributes' => 'style="margin-right:3px"'
			),

		)
	),

	// Palettes
	/*
	Palette = Layout im Bearbeitungsbereich eines Turnierpaares

	Formatierung: {...} = Bereichsüberschift Platzhalter
	Danch die eingentliche Felder die bearbeitet werden sollen die durch ',' getrennt werden und ein neuer Bereich durch ';' angelegt


	*/
	'palettes' => array
	(
		'default'       => '{projekt_legend},projektName,projektBeschreibung,besondereAusstattung;{source_legend},multiSRC'
),

// Fields
/*
Hier werden die eigentlichen felder der tabelle tl_turnierpaare bekannt gemacht.

Änderungen die hier durchgeführt werden, müssen im Contao Backend unter 'Erweiterungsverwaltung'-> 'Datenbank aktualisiern' aktualisiert werden
*/
	'fields'   => array
	(
	//Pflichtfeld
		'id'     => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
	//Pflichtfeld
		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'projektName'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_immo_projekte']['projektName'],
      'inputType' => 'text',
			'exclude'   => false,
			'sorting'   => true,
			'flag'      => 1,
            'search'    => true,
			'eval'      => array(
				'mandatory'   => true,
                                'unique'         => false,
                                'maxlength'   => 255
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'projektBeschreibung'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_immo_projekte']['projektBeschreibung'],
      'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'rte'=>'tinyMCE', 'helpwizard'=>true),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		),
		'besondereAusstattung'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_immo_projekte']['besondereAusstattung'],
      'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'rte'=>'tinyMCE', 'helpwizard'=>true),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		),
    'multiSRC' => array
    (
      'label'                   => &$GLOBALS['TL_LANG']['tl_immo_projekte']['multiSRC'],
      'exclude'                 => true,
      'inputType'               => 'fileTree',
      'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'orderField'=>'orderSRC', 'files'=>true),
      'sql'                     => "blob NULL",
      'load_callback' => array
      (
        array('tl_immo_projekte', 'setMultiSrcFlags')
      )
    ),
    'orderSRC' => array
    (
      'label'                   => &$GLOBALS['TL_LANG']['tl_immo_projekte']['sortOrder'],
      'sql'                     => "blob NULL"
    ),
    'sortBy' => array
    (
      'label'                   => &$GLOBALS['TL_LANG']['tl_immo_projekte']['sortBy'],
      'exclude'                 => true,
      'inputType'               => 'select',
      'options'                 => array('custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'),
      'reference'               => &$GLOBALS['TL_LANG']['tl_immo_projekte'],
      'eval'                    => array('tl_class'=>'w50'),
      'sql'                     => "varchar(32) NOT NULL default ''"
    )

       )
);
