<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Immobilienverwaltung
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
  //Classes
  'ImmoClass' => 'system/modules/immo/ImmoClass.php',
	// Elements
	'ProjektElement'   => 'system/modules/immo/elements/ProjektElement.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_projekt_element' => 'system/modules/immo/templates'
));
