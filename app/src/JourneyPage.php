<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\CheckboxField;
	use SilverStripe\Forms\DateField;
	use SilverStripe\Forms\ReadonlyField;
	use SilverStripe\Forms\DropdownField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
	use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
	use Bummzack\SortableFile\Forms\SortableUploadField;

	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;

	use SilverStripe\ORM\PaginatedList;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\ORM\ArrayList;
	use SilverStripe\ORM\GroupedList;

	use SilverStripe\View\Requirements;
	use SilverStripe\View\ArrayData;

	use SilverStripe\Control\HTTPRequest;

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
				new Tab('List',
					GridField::create('Announcements', 'List of Announcements', 
						$this->Announcements(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame3.Main', new TabSet('Articles',
				new Tab('List',
					GridField::create('Articles', 'List of Articles', 
						$this->Articles(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			
			return $fields;
		}
	}

	class JourneyPageController extends PageController {


	}
}
