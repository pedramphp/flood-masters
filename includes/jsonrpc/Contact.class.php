<?php 
	/**
	 * Define a custom exception class
	 */
	class JSONRPCException extends Exception{
	    // Redefine the exception so message isn't optional
	    public function __construct($message, $code = 0) {
	        // some code
	    
	        // make sure everything is assigned properly
	        parent::__construct($message, $code);
	    }
	
	    // custom string representation of object
	    public function __toString() {
	        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	    }
	
	    public function customFunction() {
	        echo "A custom function for this type of exception\n";
	    }
	}
	
	class Contact{
		
		public function __construct(){
		
		}
		
		public function contactUs( $params ){
			
			$message = '';
			$cntuspage = new ContactUsPage($params);
			if( $cntuspage->isValid()){
				if( $cntuspage->submit()){
					$error = false;
					$success = true;						
				}else{
					$message = 'please try again';
					$error = true;
					$success = false;							
				}
			}else{
				$error = true;
				$success = false;
				$message = 'please fill up the empty fields';
			}
			return array(
				'error'=> $error,
				'success'=> $success,
				'errorMsg'=> $message
			);
		}
				
	}


?>