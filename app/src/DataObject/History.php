<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\ORM\DataObject;
	
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

	use SilverStripe\Versioned\Versioned;
	use SilverStripe\Control\Controller;
	use SilverStripe\Control\HTTPRequest;

	class History extends DataObject {

		private static $db = [
			#Specialty
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'Year' => 'Text',
		];

		private static $has_one = [
			'HomePage' => HomePage::class,
		];

		private static $owns = [
			'Image',
		];

		private static $has_many = [
			'HistoryLists' => HistoryList::class,
		];

		private static $summary_fields = array(
			'Year' => 'Year',
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldsToTab('Root.Main', array(
				new ReadonlyField('SortOrder'),
				new ReadonlyField('SortID', 'Sort ID'),
				new TextField('Year', 'Year'),
			));

			$fields->addFieldToTab('Root.HistoryLists', GridField::create('HistoryLists', 'Lists of Histories', 
				$this->HistoryLists(), GridFieldConfig_RecordEditor::create(10)->addComponent(new GridFieldSortableRows('SortOrder'))
			));

			$fields->removeByName('SortOrder');
			$fields->removeByName('HomePageID');
			$fields->removeByName('SortID');

			return $fields;
		}
	}
}

