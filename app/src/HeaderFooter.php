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

	class HeaderFooter extends Page {

		private static $db = [


			/*Seo Keywords*/

			'SeoKeywords' => 'Text',
			'SeoDesc' => 'Text',

			/*Footer copyrights*/

			'copyright' => 'Text',

			/*Contact*/

			'ftrLabel1' => 'Text',
			'ftrLabel2' => 'Text',
			'ftrphone' => 'Text',
			'ftrmail' => 'Text',

		];

		private static $has_one = [
			'Logo' => Image::class,
			'Logo2' => Image::class,
			'Favicon' => Image::class,
		];

		private static $has_many = [
			'SocialMedias' => SocialMedia::class,
		];

		private static $owns = [
			'Logo',
			'Logo2',
			'Favicon',
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
				$upload_1 = new UploadField('Logo', 'Logo Black'),
				$upload_2 = new UploadField('Logo2', 'Logo White'),
				$upload_3 = new UploadField('Favicon', 'Fav Icon'),
				// $upload = new UploadField('LoadingIcon', 'Loading Icon (Max size: 2MB)'),
			));

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
			| @Frame 1
			|----------------------------------------------- */
			$fields->addFieldToTab('Root.Medias', new TabSet('MediasSets',
				new Tab('List',
					GridField::create('SocialMedias', 'List of Social Media', 
						$this->SocialMedias(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			$fields->addFieldsToTab('Root.Column2.Main', array(
				new TextField('ftrLabel1', 'Column 2 Title'),
			));

			/*
			|-----------------------------------------------
			| @Contact
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Contact.Main', array(
				new TextField('ftrLabel2', 'Column 3 Title'),
				new TextField('ftrphone', 'Phone Number'),
				new TextField('ftrmail', 'Email Address'),
			));

			/*
			|-----------------------------------------------
			| @Copy Right
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.CopyRights.Main', array(
				new TextField('copyright', 'Copy Rights'),
			));


			# SET FIELD DESCRIPTION 
			$upload_1->setDescription('Max file size: 2MB | Dimension: 208px x 74px');
			$upload_2->setDescription('Max file size: 2MB | Dimension: 208px x 74px');
			$upload_3->setDescription('Max file size: 2MB | Dimension: 1:1');
			# Set destination path for the uploaded images.
			$upload_1->setFolderName('headerfooter');
			$upload_2->setFolderName('headerfooter');
			$upload_3->setFolderName('headerfooter');

			return $fields;
		}
	}

	class HeaderFooterController extends PageController {

	}
}
