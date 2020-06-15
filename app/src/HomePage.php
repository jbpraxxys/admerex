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

	class HomePage extends Page {

		private static $db = [
			'F2Title' => 'Text',
			'F2Desc' => 'Text',

			'F3Title1' => 'Text',
			'F3Title2' => 'Text',
			'F3Title3' => 'Text',
			'F3Desc1' => 'Text',
			'F3Desc2' => 'Text',
			'F3Desc3' => 'Text',
			'F3link1' => 'Text',
			'F3link2' => 'Text',
			'F3link3' => 'Text',

			'F4Title' => 'Text',
			'F4Desc' => 'Text',

			'F5Title' => 'Text',
			'F5Desc' => 'HTMLText',
			'F5Link' => 'Text',


			'F6Title' => 'Text',
			'F6Desc' => 'HTMLText',
			'F6Link' => 'Text',

			'F7Title' => 'Text',
			'F7Desc' => 'HTMLText',

			'F8Title' => 'Text',

			'F9Title' => 'Text',
			'F9Desc' => 'Text',

			'F10Title' => 'Text',
			'F10Desc' => 'Text',

			'F11Title' => 'Text',
		];

		private static $has_one = [
			'F3Img1' => Image::class,
			'F3Img2' => Image::class,
			'F3Img3' => Image::class,
			'F7IMG' => Image::class,
			'F9IMG' => Image::class,
			
		];

		private static $owns = [
			'F3Img1',
			'F3Img2',
			'F3Img3',
			'F7IMG',
			'F9IMG',
		];

		private static $has_many = [
	        'HomeBanners' => HomeBanner::class,
	        'Histories' => History::class,
	        'Locations' => Location::class,
	        'Affiliates' => Affiliate::class,
	    ];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Home Page',
			'MenuTitle' => 'Home',
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
			$fields->addFieldToTab('Root.Frame1.Main', new TabSet('HomeBanners',
				new Tab('HomeBanners', GridField::create(
		            'HomeBanners',
		            'HomeBanners',
		            $this->HomeBanners(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Main', array(
				new TextField('F2Title', 'Header'),
				new TextareaField('F2Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Solution', array(
				$upload = new UploadField('F3Img1', 'Image'),
				new TextField('F3Title1', 'Title'),
				new TextareaField('F3Desc1', 'Description'),
				new TextField('F3link1', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame3.Journeys', array(
				$upload = new UploadField('F3Img2', 'Image'),
				new TextField('F3Title2', 'Title'),
				new TextareaField('F3Desc2', 'Description'),
				new TextField('F3link2', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame3.ContactUs', array(
				$upload = new UploadField('F3Img3', 'Image'),
				new TextField('F3Title3', 'Title'),
				new TextareaField('F3Desc3', 'Description'),
				new TextField('F3link3', 'Link'),
			));

			/*
			|-----------------------------------------------
			| Frame 4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Title', 'Header'),
				new TextareaField('F4Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| Frame 5
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame5.Main', array(
				new TextField('F5Title', 'Header'),
				new HTMLEditorField('F5Desc', 'Description'),
				new TextField('F5Link', 'Link'),
			));

			/*
			|-----------------------------------------------
			| Frame 6
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame6.Main', array(
				new TextField('F6Title', 'Header'),
				new HTMLEditorField('F6Desc', 'Description'),
				new TextField('F6Link', 'Link'),
			));



			/*
			|-----------------------------------------------
			| Frame 7
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame7.Main', array(
				new TextField('F7Title', 'Header'),
				new TextareaField('F7Desc', 'Description'),
				$upload = new UploadField('F7IMG', 'Image'),
			));

			/*
			|-----------------------------------------------
			| Frame 8
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame8.Main', array(
				new TextField('F8Title', 'Header'),
			));

			$fields->addFieldToTab('Root.Frame8.Main', new TabSet('Histories',
				new Tab('Histories', GridField::create(
		            'Histories',
		            'Histories',
		            $this->Histories(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| Frame 9
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame9.Main', array(
				new TextField('F9Title', 'Header'),
				new TextareaField('F9Desc', 'Description'),
				$upload = new UploadField('F9IMG', 'Image'),
			));

			/*
			|-----------------------------------------------
			| Frame 10
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame10.Main', new TabSet('Locations',
				new Tab('Locations', GridField::create(
		            'Locations',
		            'Locations',
		            $this->Locations(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| Frame 10
			|----------------------------------------------- */

			$fields->addFieldsToTab('Root.Frame11.Main', array(
				new TextField('F11Title', 'Header'),
			));

			$fields->addFieldToTab('Root.Frame11.Main', new TabSet('Affiliates',
				new Tab('Affiliates', GridField::create(
		            'Affiliates',
		            'Affiliates',
		            $this->Affiliates(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			
			return $fields;
		}
	}

	class HomePageController extends PageController {


	}
}
