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

	private $resume;
	private $file;
	
	private $pitch;
	private $recipient;
	private $captcha;

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
						// $this->sendConfirmationEmail();
						$this->writeRecord();
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

		if(isset($_POST['resume'])) {
			$this->resume = $_POST['resume'];
		}

		if(isset($_POST['pitch'])) {
			$this->pitch = $_POST['pitch'];
		}

		if(isset($_POST['g-recaptcha-response'])){
			$this->captcha=$_POST['g-recaptcha-response'];
		}

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

		if(empty($_POST['resume'])) {
			$this->errors['resume'] = array(
				'error' => 'Please upload your resume'
			);
		}

		if(empty($_POST['pitch'])) {
			$this->errors['pitch'] = array(
				'error' => 'Please leave a pitch'
			);
		}

		if(empty($_POST['g-recaptcha-response']) ) {
			$this->errors = 'Please check the the captcha form';
		}

		$secretKey = "6LcqdLAZAAAAAJN1lr9_3mf6yRXS3sgocn-ROxqS";
		$response = $this->postRecaptcha($secretKey, $this->captcha);

		// should return JSON with success as true
		if($response->success) {
		} else {
			$this->errors = 'CAPTCHA verification failed.';
		}

		switch ($this->postFlag) {
			// Sending
			case 1: break;
		}
 
		return true;

	}

	private function setRecipients() {
		$email = ContactPage::get()->First()->AIEmail;
		$this->recipient = $email;
		// $this->recipient = $_POST['mailrecipient'];
	}

	private function writeRecord() {
		$duplicate = new ApplicantInquiry();
		$duplicate->fullname = $this->fullname;
		$duplicate->email = $this->email;
		$duplicate->contact = $this->contact;
		$duplicate->job = $this->job;
		$this->file = File::get()->ByID($this->resume);
		$duplicate->FileID = $this->file->ID;
		$duplicate->write();
	}


	private function sendEmail() {
		// print_r('Email...');
		$to = explode(',', $this->recipient);
		// Enables HTML Text
		// $headers .= "\r\n" . "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		$subject = $this->subject .'ADMEREX: New Website Application Inquiry!';

		$message = $this->getEmailTemplate();

		$this->sendPHPMailer($to, $subject, $message);

	}

	// private function sendConfirmationEmail() {
	// 	// print_r('Email confirmation...');
		
	// 	$recipients = explode(',', $this->email);
	// 	$subject = $this->subject .'ADMEREX: This is to notify you that we have succesfully received your message on ADMEREX';
		
	// 	// Enables HTML Text
	// 	// $headers .= "\r\n" . "MIME-Version: 1.0" . "\r\n";
	// 	// $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

	// 	$message = $this->getEmailTemplate();

	// 	$this->sendPHPMailer($recipients, $subject, $message);
	// }

	private function getEmailTemplate() {

		$arrayData = new ArrayData(array(
			'fullname' => $this->fullname,
			'contact' => $this->contact,
			'email' => $this->email,
			'job' => $this->job,
			'pitch' => $this->pitch,
			'file' => $this->file->AbsoluteLink(),
		));

		return $arrayData->renderWith('ContactEmailTemplate');
	}

	private function sendPHPMailer($recipients, $subject, $body) {
		// print_r('Emailing...' . $recipients);
		try {

			$mail = new PHPMailer;
			// Set PHPMailer to use the sendmail transport
			$mail->isSendmail();
			//Set who the message is to be sent from
			$mail->setFrom('no-reply@admerexsolutions.com', 'www.admerexsolutions.com');
			//Set an alternative reply-to address
			$mail->addReplyTo('no-reply@admerexsolutions.com', 'www.admerexsolutions.com');
			//Set who the message is to be sent to

			// Add in each recipient to the "TO"
			foreach ($recipients as $recipient) {
				$mail->addAddress($recipient, $recipient);
			}

			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $body;

			// $mail->send();

			if (!$mail->send()) {
				echo 'Mailer Error: '. $mail->ErrorInfo;
			} else {
				echo 'Message sent!';
			}

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

	private function postRecaptcha($secret, $response) {

		$data = array(
			'secret' => $secret,
			'response' => $response
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		return  json_decode(curl_exec($verify));

	}

}