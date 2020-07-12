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

	class JourneyPage extends Page {

		private static $db = [
			'F1Title' => 'Text',
			'F1Desc' => 'Text'
		];

		private static $has_one = [
			'F1BG' => Image::class,
		];

		private static $owns = [
			'F1BG'
		];

		private static $has_many = [
	        'Announcements' => Announcement::class,
	        'Articles' => Article::class,
	    ];



		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Journey Page',
			'MenuTitle' => 'Journey',
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
				$upload = new UploadField('F1BG', 'Background 1300 x 650'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB');
			# Set destination path for the uploaded images.
			$upload->setFolderName('journey');

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame2.Main', new TabSet('Announcements',
				new Tab('Announcements', GridField::create(
		            'Announcements',
		            'Announcements',
		            $this->Announcements(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame3.Main', new TabSet('Articles',
				new Tab('Articles', GridField::create(
		            'Articles',
		            'Articles',
		            $this->Articles(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			
			return $fields;
		}
	}

	class JourneyPageController extends PageController {


	}
}
