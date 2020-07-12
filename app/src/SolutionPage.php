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

	class SolutionPage extends Page {

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
	        'Solutions' => Solution::class,
	    ];



		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Solution Page',
			'MenuTitle' => 'Solution',
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
			$upload->setFolderName('solution');

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame2.Main', new TabSet('Solutions',
				new Tab('Solutions', GridField::create(
		            'Solutions',
		            'Solutions',
		            $this->Solutions(),
		            GridFieldConfig_RecordEditor::create()
				))
			));


			
			return $fields;
		}
	}

	class SolutionPageController extends PageController {


	}
}
