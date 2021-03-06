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

	class Media extends DataObject {

		private static $db = [
			#Specialty
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'Desc' => 'Text',
			'ExternalLink' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'Vid' => File::class,
			'ContactPage' => ContactPage::class,
		];

		private static $owns = [
			'Image',
			'Vid',
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
			$fields->addFieldToTab('Root.Main', $upload_1 = UploadField::create('Vid','Video'));
			$fields->addFieldToTab('Root.Main', $upload_2 = TextField::create('ExternalLink', 'Youtube Link'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Desc', 'Description'));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: within 410px x 250px');
			$upload_1->setDescription('Max file size: 5MB');
			$upload_2->setDescription('Get the link from the URL, and replace watch?v= with embed/');

			# Set destination path for the uploaded images.
			$upload->setFolderName('contact');
			$upload_1->setFolderName('contact');

			$fields->removeByName('SortOrder');
			$fields->removeByName('ContactPageID');
			$fields->removeByName('SortID');

			return $fields;
		}
	}
}

