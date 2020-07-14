<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\Forms\FormField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
	use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

	class ContactPage extends Page {

		private static $db = [
			
			'F1Title' => 'Text',
			'F1Desc' => 'Text',
			

			'F3Header' => 'Text',


			'AIHeader' => 'Text',
			'AIDesc' => 'Text',
			'AIEmail' => 'Text',

			'CIHeader' => 'Text',
			'CIDesc' => 'Text',
			'CIEmail' => 'Text',


			'F4Desc' => 'Text',
			'F4Button' => 'Text',
			'F4Link' => 'Text',

		];

		private static $has_one = [
			'F1BG' => Image::class,
			'F2Img' => Image::class,
			'F4Img1' => Image::class,
			'F4Img2' => Image::class,
		];

		private static $owns = [
			'F1BG',
			'F2Img',
			'F4Img1',
			'F4Img2',
		];

		private static $has_many = [
	        'Medias' => Media::class,
	    ];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Contact Page',
			'MenuTitle' => 'Contact Us',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| Frame 1
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame1.Main', array(
				new TextField('F1Title', 'Title'),
				new TextareaField('F1Desc', 'Description'),
				$uploadf1 = new UploadField('F1BG', 'Background Image'),
			));

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */
			$fields->addFieldToTab('Root.Frame2.Main', new TabSet('Medias',
				new Tab('List',
					$uploadf2 = new UploadField('F2Img', 'Play Button'),
					GridField::create('Medias', 'List of Medias', 
						$this->Medias(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Main', array(
				new TextField('F3Header', 'Title'),
			));

			$fields->addFieldsToTab('Root.Frame3.ApplicantInquiry', array(
				new TextField('AIHeader', 'Title'),
				new TextField('AIDesc', 'Description'),
				new TextField('AIEmail', 'Email Receipient'),
			));

			$fields->addFieldsToTab('Root.Frame3.ClientInquiry', array(
				new TextField('CIHeader', 'Title'),
				new TextField('CIDesc', 'Description'),
				new TextField('CIEmail', 'Email Receipient'),
			));

			/*
			|-----------------------------------------------
			| Frame 4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Text', array(
				new TextareaField('F4Desc', 'Description'),
				new TextField('F4Button', 'Button Text'),
				new TextField('F4Link', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame4.Image', array(
				$uploadf4_1 = new UploadField('F4Img1', 'Mascot'),
				$uploadf4_2 = new UploadField('F4Img2', 'Icon'),
			));

			# SET FIELD DESCRIPTION 
			$uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 650px');
			$uploadf2->setDescription('Max file size: 2MB | Dimension: 90px x 90px');
			$uploadf4_1->setDescription('Max file size: 2MB | Dimension: 290px x 360px');
			$uploadf4_2->setDescription('Max file size: 2MB | Dimension: 70px x 70px');

			# Set destination path for the uploaded images.
			$uploadf1->setFolderName('contact/frame1');
			$uploadf2->setFolderName('contact/frame2');
			$uploadf4_1->setFolderName('contact/frame4');
			$uploadf4_2->setFolderName('contact/frame4');


			return $fields;
		}
	}

	class ContactPageController extends PageController {

	}
}
