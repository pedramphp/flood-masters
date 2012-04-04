<?php 

	class Meta extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			switch(LiteFrame::getActiveAction()){	
			
				case "homepage" :
					$keyword = "Fire, Water, Mold Emergency Restoration. Carpet and Upholstery Cleaning";
					$description = "24 Hour emergency water, flood, fire and mold clean up and restoration services. Carpet and upholstery cleaning, repair and installation";
					break;
				case "residential-services":
					$keyword = "fire damage restoration, water and mold damage restoration, carpet and upholstery cleaning, carpet and hardwood installation, sump pump and basement waterproofing";
					$description = "water, fire, mold damage clean up, carpet, upholstery cleaning and installation. Basement waterproofing and sump pump installation";
					break;
				case "commercial-services":
					$keyword = "fire damage restoration, water and mold damage restoration, carpet and upholstery cleaning, carpet and hardwood installation, sump pump and basement waterproofing";
					$description = "water, fire, mold damage clean up, carpet, upholstery cleaning and installation. Basement waterproofing and sump pump installation";					
					break;
				case "residential-services":
					$keyword = "Fire, Water, Mold Emergency Restoration. Carpet and Upholstery Cleaning";
					$description = "24 Hour emergency water, flood, fire and mold clean up and restoration services. Carpet and upholstery cleaning, repair and installation";
					break;
				case "about":
					$keyword = "Property restoration, fire damage restoration, water damage restoration, mold mitigation services, carpet cleaning, upholstery cleaning";
					$description = "Property Damage Restoration Company specializing in clean up and restoration of Commercial and Residential properties from fire, water, mold";
					break;
				case "contact":
					$keyword = "703-499-0011, 1-855-356-6391, info@thefloodmasters.com, www.thefloodmasters.com, facebook.com/thefloodmasters, property damage restoration";
					$description = "call or email the flood masters professionals, emergency property damage restoration clean up services, carpet and upholstery cleaning";
					break;
				case "fire":
					$keyword = "Furnace puff back, fire damage, smoke damage, soot damage, fire damage clean up, kitchen fire repair, odor removal";
					$description = "Fire, smoke and soot clean up and restoration for commercial and residential propertiesd";
					break;
				case "water":
					$keyword = "water damage, flood damage, storm damage, basement flood, toilet over flow, sewage back up, contents management, document drying, water extraction";
					$description = "water, flood and storm damage restoration and clean up for commercial and residential, dehumidification, drying and odor removal";
					break;
				case "fire":
					$keyword = "Fire, Water, Mold Emergency Restoration. Carpet and Upholstery Cleaning";
					$description = "24 Hour emergency water, flood, fire and mold clean up and restoration services. Carpet and upholstery cleaning, repair and installation";
					break;
				case "mold":
					$keyword = "Mold clean up, mold mitigation, mold removal, odor removal, mold restoration, wet basement clean up";
					$description = "Mold mitigation, clean up and restoration. Odor and bacteria removal. Property decontamination and clean up";
					break;
				case "cleaning":
					$keyword = "Carpet cleaning, upholstery cleaning, Oriental and Persian rug cleaning, Tile and grout cleaning, sewage clean up, power washing, hard floor cleaning";
					$description = "Carpet and upholstery cleaning, oriental and Persian rug cleaning, tile and grout cleaning, sewage clean up and power washing";
					break;
				case "floor":
					$keyword = "Berber carpet, plush carpet, carpet installation, hardwood floor installation, tile installation, carpet repair";
					$description = "Carpet, hardwood, tile installation and repair, berber and plus carpet, next day installation, carpet repair and re-stretching";
					break;
				case "basement":
					$keyword = "Basement waterproofing, interior water damage repair, French drain installation, sump pump installation, sump pump repair, battery back up system";
					$description = "Basement waterproofing, sump pump installation, interior and exterior drain repair and installation, French drain installation";
					break;
						
			}
			$this->results["keyword"] = $keyword;
			$this->results["description"] = $description;
			
		}
		
	}


?>
