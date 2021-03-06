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

	class HistoryList extends DataObject {

		private static $db = [
			#Specialty
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'HTitle' => 'Text',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'History' => History::class,
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
			'HTitle' => 'Title',
			'Desc' => 'Description',
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldsToTab('Root.Main', array(
				new ReadonlyField('SortOrder'),
				new ReadonlyField('SortID', 'Sort ID'),
				$upload = new UploadField('Image', 'Image'),
				new TextField('HTitle', 'Title'),
				new TextareaField('Desc', 'Description'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: within 650px x 350px');

			# Set destination path for the uploaded images.
			$upload->setFolderName('homepage/history');

			$fields->removeByName('SortOrder');
			$fields->removeByName('HistoryID');
			$fields->removeByName('SortID');

			return $fields;
		}
	}
}

