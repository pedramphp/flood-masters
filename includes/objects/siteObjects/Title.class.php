<?php 

	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$title = "The Flood Masters Official Website";
			switch(LiteFrame::getActiveAction()){	
			
				case "homepage" :
					$title = "The Flood Masters Official Website";
					break;
			}
			$this->results = $title;
			
		}
		
	}


?>
