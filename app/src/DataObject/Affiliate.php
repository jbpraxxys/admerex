<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Assets\Image;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\DateField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\ReadonlyField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Versioned\Versioned;
	use SilverStripe\Control\Controller;

	class affiliate extends DataObject {

		private static $db = [
			#Specialty
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'ALink' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'HomePage' => HomePage::class,
		];

		private static $owns = [
			'Image',
		];

		public function getThumbnail() {
			if ($this->Image()->exists()) { 
				return $this->Image()->ScaleWidth(50); 
			} else { 
				return '(No Image)'; 
			}
		}

		private static $summary_fields = array(
			'Thumbnail' => 'Image',
			'ALink' => 'Link',
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Image','Image'));
			$fields->addFieldToTab('Root.Main', TextField::create('ALink', 'Link'));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: within 150px x 150px');

			# Set destination path for the uploaded images.
			$upload->setFolderName('homepage/affiliate');

			$fields->removeByName('SortOrder');
			$fields->removeByName('HomePageID');
			$fields->removeByName('SortID');

			return $fields;
		}
	}
}

