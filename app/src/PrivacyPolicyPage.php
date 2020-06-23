<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

	class PrivacyPolicy extends Page {

		private static $db = [
			/*Frame 1*/
			'Header' => 'Text',
			'Desc' => 'HTMLText',
		
		];

		private static $has_one = [
		];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Privacy Policy',
			'MenuTitle' => 'Privacy Policy',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| @Frame1
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame1.Main', array(
				new TextField('Title', 'header'),
				new HTMLEditorField('Desc', 'Description'),
			));
			
			return $fields;
		}
	}

	class PrivacyPolicyController extends PageController {

	}
}
