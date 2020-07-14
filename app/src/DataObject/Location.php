<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\DateField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\ReadonlyField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Versioned\Versioned;
	use SilverStripe\Control\Controller;

	class Location extends DataObject {

		private static $db = [
			#Specialty
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'Name' => 'Text',
			'Address' => 'Text',
			'LLink' => 'Text',
			'Contact' => 'HTMLText',
		];

		private static $has_one = [
			'Image' => Image::class,
			'HomePage' => HomePage::class
		];

		private static $owns = [
			'Image',
		];

		public function getThumbnail() {
			if ($this->Image()->exists()) { 
				return $this->Image()->ScaleWidth(50); 
			} else { 
				return '(No Video)'; 
			}
		}

		private static $summary_fields = array(
			'Thumbnail' => 'Image',
			'Name' => 'Name',
			'Address' => 'Address',
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortOrder', 'Sort Order'));
			$fields->addFieldsToTab('Root.Main', array(
				new ReadonlyField('SortID', 'Sort ID'),
				$upload = new UploadField('Image', 'Image'),
				new TextField('Name', 'Name'),
				new TextareaField('Address', 'Address'),
				new TextField('LLink', 'Map Link'),
				new HTMLEditorField('Contact', 'Contact'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: within 150px x 150px');

			# Set destination path for the uploaded images.
			$upload->setFolderName('homepage/location');

			$fields->removeByName('SortOrder');
			$fields->removeByName('HomePageID');
			$fields->removeByName('SortID');

			return $fields;
		}
	}
}

