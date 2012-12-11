<?php 

	class Meta extends SiteObject {

		public function __construct(){
			parent::__construct();
		}


		public function process(){

			switch(LiteFrame::getActiveAction()){	

				case "homepage" :
					$keyword = "flood damage cleanup, mold removal washington dc, mold removal Virginia, flood damage cleanup Virginia, flood damage cleanup Washington dc, flood damage restoration";
					$description = "The flood masters is fire, mold, flood damage cleanup & removal company, offering services in Virginia, Washington DC, Maryland. We offers flood damage cleanup & mold removal of commercial & residential properties.";
					break;
				case "commercial-services":
					$keyword = "commercial cleaning services, commercial flood restoration, commercial water damage recovery, commercial fire restoration, commercial smoke and soot restoration, commercial services Virginia, commercial mold remediation, commercial flooring services, commercial sewage damage restoration, commercial pipe burst restoration, commercial flooring services, commercial basement waterproofing";
					$description = "The Flood Masters provides 24 hour emergency commercial water, fire, mold damage clean up, carpet, upholstery cleaning and installation, basement waterproofing and sump pump installation services.";					
					break;
				case "residential-services":
					$keyword = "residential cleaning services, residential flood restoration, residential water damage recovery, residential fire restoration, residential smoke and soot restoration, residential services Virginia, residential mold remediation, residential flooring services, residential sewage damage restoration, residential pipe burst restoration, residential flooring services, residential basement waterproofing";
					$description = "The Flood Masters provides 24 hour emergency residential water, flood, fire, mold clean up and restoration and carpet and upholstery cleaning, repair and installation services.";
					break;
				case "about":
					$keyword = "Property restoration service, fire damage restoration, water damage restoration, mold mitigation services, carpet cleaning service, upholstery cleaning service, Tile and Laminate Floor Installation, carpet and hardwood installation, Asbestos Abatement Services";
					$description = "Property Damage Restoration Company specializing in clean up and restoration of Commercial and Residential properties from fire, water, mold";
					break;
				case "contact":
					$keyword = "damage restoration service virginia, damage restoration services virginia, restoration services virginia, floodmasters virginia, flood damage recovery virginia, flood damage restoration virginia, mold emergency restoration virginia, carpet and Mold Emergency Restoration virginia, Carpet and Upholstery Cleaning virginia, fire damage restoration virginia, disaster recovery services virginia, disaster recovery services Virginia";
					$description = "call or email the flood masters professionals, emergency property damage restoration clean up services, carpet and upholstery cleaning";
					break;
				case "water":
					$keyword = "water damage restoration service, water damage restoration, water damage cleanup, water damage repair, water damage restoration virginia, water damage restoration washington dc, water damage restoration maryland";
					$description = "Get water damage restoration service from The flood masters at competitive rates in Virginia, Washington DC, Maryland. We provide 24x7 water damage restoration service, call us at 1-855-356-6391.";
					break;
				case "fire":
					$keyword = "fire damage cleanup, fire damage cleanup virginia, fire damage cleanup washington dc, fire damage cleanup maryland, fire damage cleanup & restoration, fire damage restoration services, fire damage restoration";
					$description = "Fire Damage Cleanup - We are providing superior fire damage cleanup services in Virginia, Washington DC, Maryland. We offer 24hr emergency fire damage cleanup & restoration service.";
					break;
				case "mold":
					$keyword = "mold remediation virginia, mold remediation, mold remediation washington dc, mold remediation maryland, mold damage restoration services, mold mitigation services";
					$description = "Need help for mold remediation in Virginia? We specialize in mold remediation service in Virginia, Washington DC, Maryland. Get effective mold remediation service at affordable rates.";
					break;
				case "cleaning":
					$keyword = "carpet cleaning virginia, carpet cleaning washington dc, carpet cleaning maryland, rug cleaning virginia, rug cleaning washington dc, rug cleaning maryland, residential carpet cleaning virginia";
					$description = "Carpet Cleaning Virginia - We provides residential & commercial carpet cleaning services using power of hot water extraction to keep your carpet looking fresh and new. Contact us!";
					break;
				case "floor":
					$keyword = "flooring installation service, indoor and out carpet install, wool carpet install, textures carpet install, Berbers carpet install, wood lamination service, domestic hardwood installation, exotic hardwood installation, bamboo wood installation, cork flooring, ceramic flooring, carpet installation";
					$description = "We provide expert floor installation service for residential, commercial and industrial spaces in Virginia, Washington DC, Maryland.";
					break;
				case "basement":
					$keyword = "basement waterproofing virginia, basement waterproofing washington dc, basement waterproofing maryland, basement waterproofing, basement waterproofing solution, basement waterproofing solution va";
					$description = "The flood masters is a reliable basement waterproofing solution provider in Virginia, Washington DC & Maryland.  We provide basement waterproofing for residential & commercial spaces.";
					break;

			}
			$this->results["keyword"] = $keyword;
			$this->results["description"] = $description;

		}

	}


?>