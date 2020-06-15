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

	class HomeBanner extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'Header' => 'HTMLText',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'VidFile' => File::class,
			'HomePage' => HomePage::class
		];

		private static $owns = [
			'VidFile',
		];

		public function getThumbnail() {
		   if ($this->VidFile()->exists()) { 
		       return $this->VidFile()->ScaleWidth(50); 
		   } else { 
		       return '(No Video)'; 
		   }
		}

		private static $summary_fields = array(
			'Thumbnail' => 'VidFile',
			'Header' => 'Header',
			'Desc' => 'Description',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldsToTab('Root.Main', array(
				new ReadonlyField('SortID', 'Sort ID'),
				$upload = new UploadField('VidFile', 'Video'),
				new HTMLEditorField('Header', 'Header'),
				new TextareaField('Desc', 'Description'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB');

			# Set destination path for the uploaded images.
			$upload->setFolderName('homepage/banner');

			return $fields;
		}
	}
}

