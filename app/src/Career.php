<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;

	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\Forms\LabelField;
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

	class Career extends Page {

		private static $db = [

			/*Career*/
			'JobTitle' => 'Text',
			'Desc' => 'HTMLText',
			'CareerLevel' => 'Text',
			'YearExp' => 'Text',
			'Qualification' => 'Text',
			'JobType' => 'Text',
			'JobHighlights' => 'HTMLText',
			'JobRequirements' => 'HTMLText',
		
		];

		private static $has_one = [
		];

		private static $owns = [
	    ];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Career',
			'MenuTitle' => 'Career',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| @SCareer
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Career.Main', array(
				new TextField('JobTitle', 'Job Title'),
				new HTMLEditorField('Desc', 'Job Description'),
			));

			$fields->addFieldsToTab('Root.Career.Qualification', array(
				new TextField('CareerLevel', 'Career Level'),
				new TextField('YearExp', 'Years of Experience'),
				new TextField('Qualification', 'Qualification'),
				new TextField('JobType', 'Job Type'),
			));

			$fields->addFieldsToTab('Root.Career.JobHighlights', array(
				new LabelField('For Bullets', 'Use Bullet List'),
				new HTMLEditorField('JobHighlights', 'Job Highlights'),
			));

			$fields->addFieldsToTab('Root.Career.JobRequirement', array(
				new LabelField('For Bullets2', 'Use Bullet List'),
				new HTMLEditorField('JobRequirements', 'Job Requirements'),
			));

			return $fields;
		}
	}

	class CareerController extends PageController {
		
	}
}
