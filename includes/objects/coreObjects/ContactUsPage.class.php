<?php 

class ContactUsPage {
	
	private $fullName;
	private $emailAddress;
	private $phoneNumber;
	private $website;
	private $rate;
	private $reason;
	private $message;
	
	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'The Flood Masters Website';
	//private static $to = 'info@thefloodmasters.com'; //info@alhussaintv.tv
	private static $to = 'info@thefloodmasters.com';
	private static $subject = "New Message: The Flood Masters Website Contact Us Form";
	private static $emailLogo;
	private static $bgTop;
	private static $bgMiddle;
	private static $bgBottom;
	private static $tick;
	private $request;
	private $services = array();
	
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
	
		$this->request = $request;
	
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/contact.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/contactUser.html';
		self::$emailLogo = LiteFrame::GetImagePath()."email/logo-email-thefloodmaster.png";
		self::$bgTop = LiteFrame::GetImagePath()."email/bg-email-top.png";
		self::$bgMiddle = LiteFrame::GetImagePath()."email/bg-email-mid.png";
		self::$bgBottom = LiteFrame::GetImagePath()."email/bg-email-btm.png";
		self::$tick = LiteFrame::GetImagePath()."email/icon-email-tick.png";
		
		
		foreach( $request as $key => $value ){
			$request[$key] = htmlspecialchars(stripslashes(ucfirst( trim( $value ))));
			if(empty($request[$key]) && $key != 'emailAddress'){
				$request[$key] = self::$empty; 
			}
		}
		$this->fullName =		$request['contact-fullname'];
		$this->emailAddress =	$request['contact-email'];
		$this->address = 		$request['contact-address'];
		$this->phone =			$request['contact-phone'];
		$this->message =		$request['contact-message'];
		
		$this->buildServices();
	}

	public function isValid(){
		return filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName);
	}
	
	public function submit(){
		
		$services = (empty($this->services)) ? self::$empty : $this->services;
		
		if($services != self::$empty ){		
			$services = implode("\n",$services);
		}
		
		$message = file_get_contents(self::$emailTemplate);
		
		$arrayTplVars = array('{bgTop}','{bgMiddle}','{bgBottom}','{tick}','{emailLogo}','{fullName}','{emailAddress}','{address}','{phone}','{message}','{services}');
		$arrayTplData = array(	self::$bgTop,
								self::$bgMiddle,
								self::$bgBottom,
								self::$tick,
								self::$emailLogo,
								$this->fullName,
								$this->emailAddress,
								$this->address,
								$this->phone,
								$this->message,
								$services);
								
		$message = str_replace($arrayTplVars, $arrayTplData, $message);
		
		
		
		$headers = 'From: '.self::$emailTitle.' <'.$this->emailAddress.'> ' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		
		$userMessage = file_get_contents(self::$userEmailTemplate);
		$arrayTplVars = array('{bgTop}','{bgMiddle}','{bgBottom}','{fullName}','{message}','{emailLogo}');
		$arrayTplData = array(self::$bgTop,
								self::$bgMiddle,
								self::$bgBottom,$this->fullName, $this->message, self::$emailLogo);
		$userMessage = str_replace($arrayTplVars, $arrayTplData, $userMessage);

		$headersUser = 'From: '.self::$emailTitle.' <'.self::$to.'>'. "\r\n";
		$headersUser .= 'MIME-Version: 1.0' . "\r\n";
		$headersUser .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if( mail( self::$to, self::$subject, $message, $headers ) &&
			mail( $this->emailAddress, self::$subject, $userMessage, $headersUser )){
			return true;
		}else{
			return false;
		}
		
		
	}
	
	
	private function buildServices(){
		$time = array(
			"waterService" => "Water Damage Restoration",
			"sewageService" => "Sewage Damage Services",
			"fireService" => "Fire Damage Restoration",
			"flooringService" => "Flooring Service",
			"moldService" => "Mold Remediation, Removal Service",
			"cleaningService" => "Cleaning Service"
		);
		
		$wrapper = "<li style='float: left; margin-bottom:5px; width: 50%'>".
				     "<label style='float:left;margin:2px 5px 0 0;'>".
				     	"<img src='".self::$tick."' />".
				     "</label>".
				     "<span style='float:left; width: 170px;'>";
		
		foreach( $time as $key => $val ){
			if(isset($this->request[$key])){
				$this->services[] = $wrapper.$val."</span></li>";
			}
		}
		
	}
	
}
?>
