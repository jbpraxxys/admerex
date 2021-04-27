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
			'SortOrder' => 'Int',
			'SortID' => 'Int',
			'Header' => 'HTMLText',
			'Desc' => 'Text',
			'BtnLinkText' => 'Text',
			'BtnLinkTo' => 'Text',
			'Fr1File2' => 'Text',
		];

		private static $has_one = [
			'VidFile' => File::class,
			'Banner' => Image::class,
			'HomePage' => 'HomePage',
		];

		private static $owns = [
			'VidFile',
			'Banner',
		];

		private static $summary_fields = array(
			'Header' => 'Title',
			'Desc' => 'Description',
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldsToTab('Root.Main', array(
				new ReadonlyField('SortOrder'),
				new ReadonlyField('SortID', 'Sort ID'),
				new HTMLEditorField('Header', 'Title'),
				new TextField('BtnLinkText', 'Button Text'),
				new TextField('BtnLinkTo', 'Button Link To'),
				new TextareaField('Desc', 'Description'),
			));

			$fields->addFieldToTab('Root.Media', $upload_2 = new UploadField('Banner', 'Background Image'));
			$fields->addFieldToTab('Root.Media', $upload_1 = new UploadField('VidFile', 'Video'));
			$fields->addFieldToTab('Root.Media', $upload_3 = TextField::create('Fr1File2', 'Video Link Outsource'));

			$fields->removeByName('SortOrder');
			$fields->removeByName('HomePageID');
			$fields->removeByName('SortID');

			# SET FIELD DESCRIPTION 
			$upload_1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			$upload_2->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			$upload_3->setDescription('Make sure that the link ends with a video format like .mp4');

			# Set destination path for the uploaded images.
			$upload_1->setFolderName('homepage/banner');
			$upload_2->setFolderName('homepage/banner');

			return $fields;
		}
	}
}

