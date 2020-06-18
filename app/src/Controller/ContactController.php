<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;

require '../vendor/autoload.php';

class ContactController extends Controller {

	private $fullname;
	private $email;
	private $contact;
	private $job;
	
	// private $messagedetails;
	private $recipient;
	// private $captchaResponse;

	private $errors;

	public function init() {
		parent::init();
		// print_r('Init...');
		if(isset($_POST['postFlag']) && is_numeric($_POST['postFlag'])) {

    		$postFlag = $_POST['postFlag'];
    		// print_r('PostFlag : '$_POST['postFlag']);
    		switch ($postFlag) {
    		
	    		// Sending
	    		case 1:
	    				
					if($this->setPostVars() && $this->checkPostVars()) {
						// print_r('Sending...');
						$this->setRecipients();
						$this->sendEmail();
						$this->sendConfirmationEmail();
						$this->returnEcho(1, 'Sending successful!');
					}

				break;
			}
    	}

    	exit();
	}

	private function setPostVars() {
		// print_r('Set post...');


		if(isset($_POST['fullname'])) {
			$this->fullname = $_POST['fullname'];
		}

		if(isset($_POST['email'])) {
			$this->email = $_POST['email'];
		}

		if(isset($_POST['contact'])) {
			$this->contact = $_POST['contact'];
		}

		if(isset($_POST['job'])) {
			$this->job = $_POST['job'];
		}


		// if(isset($_POST['messagedetails'])) {
		// 	$this->messagedetails = $_POST['messagedetails'];
		// }

		


		return true;

	}

	private function checKPostVars() {
		// print_r('Check post...');

		
		if(empty($_POST['fullname'])) {
			$this->errors['fullname'] = array(
				'error' => 'Please input your full name'
			);
		}


		if(empty($_POST['contact'])) {
			$this->errors['contact'] = array(
				'error' => 'Please input your Contact number'
			);
		}


		if(empty($_POST['email'])) {
			$this->errors['email'] = array(
				'error' => 'Please input your email'
			);
		}

		// if(empty($_POST['messagedetails'])) {
		// 	$this->errors['messagedetails'] = array(
		// 		'error' => 'Please leave a message'
		// 	);
		// }


		switch ($this->postFlag) {
    		// Sending
    		case 1: break;
    	}		
    	// print_($this->errors);
		if(!empty(count($this->errors) > 0)) {
			$this->returnEcho(0, 'Error');
			// print_r($this->errors);

			return false;
		}
 
		return true;

	}

	private function setRecipients() {
		$email = ContactPage::get()->First()->AIEmail;
		$this->recipient = $email;
		// $this->recipient = $_POST['mailrecipient'];
	}


	private function sendEmail() {
		// print_r('Email...');
		$to = explode(',', $this->recipient);
		// Enables HTML Text
		// $headers .= "\r\n" . "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		$subject = $this->subject .'ADMEREX: New Website Inquiry!';

		$message = $this->getEmailTemplate();

		$this->sendPHPMailer($to, $subject, $message);

	}

	private function sendConfirmationEmail() {
		// print_r('Email confirmation...');
		
		$recipients = explode(',', $this->email);
		$subject = $this->subject .'ADMEREX: This is to notify you that we have succesfully received your message on ADMEREX';
		
		// Enables HTML Text
		// $headers .= "\r\n" . "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		$message = $this->getEmailTemplate();

		$this->sendPHPMailer($recipients, $subject, $message);
	}

	private function getEmailTemplate() {

		$arrayData = new ArrayData(array(
		    'fullname' => $this->fullname,
		    'contact' => $this->contact,
		    'email' => $this->email,
		    'job' => $this->job,
		    // 'messagedetails' => $this->messagedetails,
		));

		return $arrayData->renderWith('ContactEmailTemplate');
	}

	private function sendPHPMailer($recipients, $subject, $body) {
		// print_r('Emailing...' . $recipients);
		try {

			$mail = new PHPMailer(true);  

			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->Host = 'email.praxxys.ph';
		    $mail->Username = 'mark.praxxys';
		    $mail->Password = '5xRaJCyQ6ddWRTeR';
		    $mail->Port = 587;

			$mail->setFrom('no-reply@praxxys.ph', 'www.admerexsolutions.com');

			// Add in each recipient to the "TO"
			foreach ($recipients as $recipient) {
				$mail->addAddress($recipient, $recipient);
			}

			$mail->isSMTP();
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $body;

			$mail->send();

			// print_r('Emailing done...');

		} catch (phpmailerException $e) {
			// print_r($e->errorMessage());
		} catch (Exception $e) {
			// print_r($e->getMessage());
		}
	}

	private function returnEcho($status, $message = 'Sent') {
		echo json_encode(array(
			'status' => $status,
			'message' => $message
		));
	}

}