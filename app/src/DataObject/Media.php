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

	class Media extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'ContactPage' => ContactPage::class,
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
			'Desc' => 'Description',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Image','Image'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Desc', 'Description'));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB');

			# Set destination path for the uploaded images.
			$upload->setFolderName('contact');

			return $fields;
		}
	}
}

