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
			
	    	/*Email*/
			'Email' => 'Text',

			'F1Title' => 'Text',
			'F1Desc' => 'Text',
			

			'F3Header' => 'Text',


			'AIHeader' => 'Text',
			'AIDesc' => 'Text',

			'CIHeader' => 'Text',
			'CIDesc' => 'Text',


			'F4Desc' => 'Text',
			'F4Link' => 'Text',

		];

		private static $has_one = [
			'F1BG' => Image::class,
		];

		private static $owns = [
			'F1BG'
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
				$upload = new UploadField('F1BG', 'Background'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB');
			# Set destination path for the uploaded images.
			$upload->setFolderName('contact');

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */
			$fields->addFieldToTab('Root.Frame2.Main', new TabSet('Medias',
				new Tab('Medias', GridField::create(
		            'Medias',
		            'Medias',
		            $this->Medias(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Main', array(
				new TextField('F3Header', 'Header'),
			));

			$fields->addFieldsToTab('Root.Frame3.ApplicantInquiry', array(
				new TextField('AIHeader', 'Header'),
				new TextField('AIDesc', 'Description'),
			));

			$fields->addFieldsToTab('Root.Frame3.ClientInquiry', array(
				new TextField('CIHeader', 'Header'),
				new TextField('CIDesc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| Frame 4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextareaField('F4Desc', 'Description'),
				new TextField('F4Link', 'Link'),
			));


			/*
			|-----------------------------------------------
			| @E-mail
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Email.Main', array(
				new TextField('Email', 'E-mail Recipient'),
			));
			
			return $fields;
		}
	}

	class ContactPageController extends PageController {

	}
}
