<?php 

	class Title extends SiteObject {

		public function __construct(){
			parent::__construct();
		}


		public function process(){

			$title = "The Flood Masters, Masters of Disaster";
			switch(LiteFrame::getActiveAction()){	

				case "homepage" :
					$title = "Flood Damage Cleanup | Mold Removal Virginia, Washington DC";
					break;
				case "residential-services":
					$title = "Residential Property Clean Up and Restoration | The Flood Masters";
					break;
				case "commercial-services":
					$title = "Commercial Property Clean Up and Restoration | The Flood Masters";
					break;
				case "about":
					$title = "About Us | The Flood Masters";
					break;
				case "contact":
					$title = "Contact Us | The Flood Masters";
					break;
				case "water":
					$title = "Water Damage Restoration Service | Water Damage Restoration Service Virginia, Washington DC, Maryland";
					break;
				case "fire":
					$title = "Fire Damage Cleanup | Fire Damage Restoration Virginia, Washington DC, Maryland";
					break;
				case "mold":
					$title = "Mold Remediation Virginia | Mold Mitigation Virginia, Washington DC, Maryland";
					break;
				case "cleaning":
					$title = "Carpet Cleaning Virginia | Rug Cleaning Virginia, Washington DC, Maryland";
					break;
				case "floor":
					$title = "Flooring Installation Services - Carpet, Hardwood, Tile | The Flood Masters";
					break;
				case "basement":
					$title = "Basement Waterproofing Virginia | Basement Waterproofing Washington DC, Maryland";
					break;

			}
			$this->results = $title;

		}

	}


?>