<?php

class ProjektElement extends \ContentElement
{

	public function getImages($UUIDS){

		$multiSRC = \StringUtil::deserialize($UUIDS);

		// Return if there are no files
		if (empty($multiSRC) || !\is_array($multiSRC))
		{
			return array('EMPTY OR NO ARRAY');
		}

		$objFiles = \FilesModel::findMultipleByUuids($multiSRC);

		if ($objFiles === null)
		{
			return array('NULL OBJ');
		}

		$images = array();

   foreach ($objFiles as $file) {

		 $objFile = new \File($file->path);

		 				if (!$objFile->isImage)
		 				{
		 					continue;
		 				}
						array_push($images,array
		 				( 'name'       => $objFile->basename,
		 					'singleSRC'  => $objFile->path
		 				));
   }

	 return $images;
	}


  protected $objFiles;

	/**
	 * @var string Template
	 */
	protected $strTemplate = 'mod_projekt_element';

	/**
	 * Parse the template
	 *
	 * @return string Parsed element
	 */
	public function generate()
	{

		if($this->tl_immo_projekt_selected){

		$projekt = Database::getInstance()->query("Select * FROM tl_immo_projekte WHERE id = ".$this->tl_immo_projekt_selected)->fetchAllAssoc()[0];
		$objTemplate->title = $projekt['projektName'];


		// Get the file entries from the database


		return parent::generate();
	}else{
		return parent::generate();
	}
	}

	/**
	 * Compile the content element
	 *
	 * @return void
	 */
	public function compile()
	{

		$this->Template = new \FrontendTemplate($this->strTemplate);
		$this->Template->setData($this->arrData);

		if($this->tl_immo_projekt_selected){

		$projekt = Database::getInstance()->query("Select * FROM tl_immo_projekte WHERE id = ".$this->tl_immo_projekt_selected);
	  $wohnungen = Database::getInstance()->query("Select * FROM tl_immo_wohnungen WHERE pid = ".$this->tl_immo_projekt_selected." ORDER by etage, name ASC");
		$projektObjekt = $projekt->fetchAllAssoc()[0];
		$this->Template->projekt = $projektObjekt;
		$this->Template->projektImages = $this->getImages($projektObjekt['multiSRC']);

		$wohnungen = $wohnungen->fetchAllAssoc();
		$alleWohnungen = array();
		foreach ($wohnungen as $wohnung){
			$wohnung['images'] = $this->getImages($wohnung['multiSRC']);
			array_push($alleWohnungen, $wohnung);
		}

		$this->Template->wohnungen =$alleWohnungen;

	}else{
		$projekt = Database::getInstance()->query("Select * FROM tl_immo_projekte WHERE id = -1");
		$wohnungen = Database::getInstance()->query("Select * FROM tl_immo_wohnungen WHERE pid = -1 ORDER by etage, name ASC");
		$this->Template->projekt = $projekt->fetchAllAssoc();
		$this->Template->wohnungen = $wohnungen->fetchAllAssoc();
	}
	}
}
