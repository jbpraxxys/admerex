<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

	class HeaderFooter extends Page {

		private static $db = [


			/*Seo Keywords*/

			'SeoKeywords' => 'Text',	
			'SeoDesc' => 'Text',	

			/*Footer copyrights*/

			'copyright' => 'Text',	

			'fblink' => 'Text',	
			'iglink' => 'Text',	
			'twitterlink' => 'Text',	

			/*Contact*/

			'ftrphone' => 'Text',
			'ftrmail' => 'Text',

		];

		private static $has_one = [
			'Logo' => Image::class,
			'Logo2' => Image::class,
			'Favicon' => Image::class,
			
		];

		private static $owns = [
			'Logo',
			'Logo2',
			'Favicon',
			
		];

		private static $has_many = [
	    ];


		private static $allowed_children = "none";

		private static $defaults = array(
			
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			* Header
			*/
			$fields->addFieldsToTab('Root.Header', array(
				$upload = new UploadField('Logo', 'Logo Black (Max size: 2MB)'),
				$upload = new UploadField('Logo2', 'Logo White (Max size: 2MB)'),
				$upload = new UploadField('Favicon', 'Fav Icon (Max size: 2MB)'),
				// $upload = new UploadField('LoadingIcon', 'Loading Icon (Max size: 2MB)'),
			));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB');
			# Set destination path for the uploaded images.
			$upload->setFolderName('headerfooter');


			/*
			|-----------------------------------------------
			| @SEO Keywords
			|----------------------------------------------- */

			$fields->addFieldsToTab('Root.SEO Keywords', [
				new TextareaField('SeoKeywords', 'SEO Keywords'),
			]);

			$fields->addFieldsToTab('Root.SEO Description', [
				new TextareaField('SeoDesc', 'SEO Description'),
			]);

			/*
			|-----------------------------------------------
			| @Copy Right
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.CopyRights.Main', array(
				new TextField('copyright', 'Copy Rights'),
			));

			/*
			|-----------------------------------------------
			| @Social Media
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.SocialMedia.Main', array(
				new TextField('fblink', 'Facebook Link'),
				new TextField('iglink', 'Instagram Link'),
				new TextField('twitterlink', 'twitter Link'),
			));

			/*
			|-----------------------------------------------
			| @Social Media
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Contact.Main', array(
				new TextField('ftrphone', 'Phone Number'),
				new TextField('ftrmail', 'Email Address'),
			));

			return $fields;
		}
	}

	class HeaderFooterController extends PageController {

	}
}
