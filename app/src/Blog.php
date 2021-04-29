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

	class Blog extends Page {

		private static $db = [

			/*blog*/
			'Featured' => 'Boolean',
			'Header' => 'Text',
			'Date' => 'Date',
			'Desc' => 'HTMLText',
		
		];

		private static $has_one = [
			'Image' => Image::class
		];

		private static $owns = [
			'Image',
	    ];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Blog',
			'MenuTitle' => 'Blog',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| @Service
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Blog.Main', array(
				$upload = UploadField::create('Image','Blog Banner'),
				new TextField('Header', 'Blog Title'),
				new DateField('Date', 'Date'),
				new HTMLEditorField('Desc', 'Description'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$upload->setFolderName('Solution');

			$fields->addFieldsToTab('Root.Blog.Featured', array(
				new CheckboxField('Featured', 'Featured News')
			));


			# SET FIELD DESCRIPTION 
			// $uploadf->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			
			# Set destination path for the uploaded images.
			// $uploadf->setFolderName('ServicePage/frame-1');

			return $fields;
		}
	}

	class BlogController extends PageController {
		
	}
}
