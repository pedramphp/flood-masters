<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "The Flood Masters, Masters of Disaster";
			switch(LiteFrame::getActiveAction()){	
			
				case "homepage" :
					$title = "The Flood Masters, Masters of Disaster";
					break;
				case "residential-services":
					$title = "water, fire, mold, cleaning, flooring and waterproofing";
					break;
				case "commercial-services":
					$title = "water, fire, mold, cleaning, flooring and waterproofing";
					break;
				case "residential-services":
					$title = "The Flood Masters, Masters of Disaster";
					break;
				case "about":
					$title = "About The Flood Masters and our services";
					break;
				case "contact":
					$title = "Call today 703-499-0011, 1-855-356-6391";
					break;
				case "fire":
					$title = "Fire, smoke and soot clean up and restoration";
					break;
				case "water":
					$title = "Water, flood and storm damage clean up and restoration";
					break;
				case "fire":
					$title = "Fire, smoke and soot clean up and restoration";
					break;
				case "mold":
					$title = "Mold mitigation, clean up and restoration services";
					break;
				case "cleaning":
					$title = "Commercial and residential cleaning services";
					break;
				case "floor":
					$title = "Carpet, hardwood and tile installation and repair";
					break;
				case "basement":
					$title = "Commercial and residential waterproofing";
					break;
						
			}
			$this->results = $title;
			
		}
		
	}


?>
