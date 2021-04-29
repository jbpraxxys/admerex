	<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;
use SilverStripe\Assets\File;

require '../vendor/autoload.php';

class ApplyUploadController extends Controller {

	private $postFlag;

	private $file;
	private $fileName;
	private $origFileName;
	private $attachmentError;

	public function init() {
		parent::init();

		// print_r($_FILES);
		if(isset($_POST['postFlag']) && is_numeric($_POST['postFlag'])) {
    		$this->postFlag = $_POST['postFlag'];
    		// print_r('PostFlag : '.$this->postFlag);
			// print_r('Saving file...');
			if($this->checkPostVars()) {

				$this->writeFile();
				$this->returnEcho(1, $this->file->ID, $this->origFileName);
			}
    	}

    	exit();
	}

	private function checKPostVars() {

		if(!$this->uploadFile()) {
			$this->returnEcho(0, $this->attachmentError);

			return false;
		}

		return true;
	}

	private function uploadFile() {

		$uploadDir = ASSETS_PATH . '/careerpage/cv/';

		// print_r($uploadDir);
		// Simple path resolver, where uploads will be put
		$pathresolver = new FileUpload\PathResolver\Simple($uploadDir);
		// The machine's filesystem
		$filesystem = new FileUpload\FileSystem\Simple();
		// Process File Name -> Convert to MD5
		$filenamegenerator = new FileUpload\FileNameGenerator\Random();
		// FileUploader itself
		$fileupload = new FileUpload\FileUpload($_FILES['file'], $_SERVER);
		// Adding it all together. Note that you can use multiple validators or none at all
		$fileupload->setPathResolver($pathresolver);
		$fileupload->setFileSystem($filesystem);
		$fileupload->setFileNameGenerator($filenamegenerator);

		list($files, $headers) = $fileupload->processAll();
		//echo json_encode(array('files' => $files));
		// print_r($_FILES['file']);
		$this->origFileName = $_FILES['file']['name'];
		$this->fileName = $files[0]->getFileName();
		// print_r($files[0]->getFileName());

		if($files[0]->error) {
			$this->attachmentError = $files[0]->error;
			return false;
		}

		return true;
	}

	private function writeFile() {
        $this->file = new File();
        //$this->file->Filename = 'assets/careerpage/cv/' . $this->fileName;
        $this->file->FileFilename = 'careerpage/cv/' . $this->fileName;

        $this->file->write();

        // print_r($this->file->ID); exit();
	}

	private function returnEcho($status, $message = 'Sent', $fileName) {
		echo json_encode(array(
			'response' => $status,
			'message' => $message,
			'filename' => $fileName
		));
	}
}
