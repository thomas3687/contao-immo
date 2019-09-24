<?php
// ImmoClass.php


class ImmoClass extends System
	{


	public function getProjekte()
		{

			$this->import('Database'); // Nötig für Datenbankabfragen
			// hier kommen die nötigen Funktionalitäten
			$rubriken = $this->Database->prepare("SELECT id FROM tl_immo_projekte ORDER BY projektName ASC")->execute()->fetchAllAssoc();
			$all_rubriken = array();
			$i = 0;
			 foreach ($rubriken as $rubrik):
				$all_rubriken[$i] = $rubrik['id'];
				$i++;
				endforeach;

			return $all_rubriken;
		}

	 public function loadProjektReference($dc){

	  $reference = array();
	  $this->import('Database');
	  $objCouples = $this->Database->prepare("SELECT * FROM tl_immo_projekte ORDER BY id")
                                      ->execute();
	while($objCouples->next()){
		$id = $objCouples->id;
		$reference[$id] = $objCouples->projektName;
		}
	  $GLOBALS['TL_LANG']['tl_immo_projekte']['projektReference'] = $reference;
	  }

	}
?>
