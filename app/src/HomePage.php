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

	class HomePage extends Page {

		private static $db = [
			'F2Title' => 'Text',
			'F2Desc' => 'Text',

			'F3Title1' => 'Text',
			'F3Title2' => 'Text',
			'F3Title3' => 'Text',
			'F3Desc1' => 'Text',
			'F3Desc2' => 'Text',
			'F3Desc3' => 'Text',
			'F3Btn1' => 'Text',
			'F3Btn2' => 'Text',
			'F3Btn3' => 'Text',
			'F3link1' => 'Text',
			'F3link2' => 'Text',
			'F3link3' => 'Text',

			'F4Title' => 'Text',
			'F4Desc' => 'Text',

			'F5Title' => 'Text',
			'F5Desc' => 'HTMLText',
			'F5Btn' => 'Text',
			'F5Link' => 'Text',


			'F6Title' => 'Text',
			'F6Desc' => 'HTMLText',
			'F6Btn' => 'Text',
			'F6Link' => 'Text',

			'F7Title' => 'Text',
			'F7Desc' => 'HTMLText',

			'F8Title' => 'Text',

			'F9Title' => 'Text',
			'F9Desc' => 'Text',
			'YTLink' => 'Text',

			'F10Title' => 'Text',
			'F10Desc' => 'Text',

			'F11Title' => 'Text',
		];

		private static $has_one = [
			'F2Bg' => Image::class,
			'F3Img1' => Image::class,
			'F3Img2' => Image::class,
			'F3Img3' => Image::class,
			'F3Bg' => Image::class,
			'F7IMG' => Image::class,
			'F8Bg' => Image::class,
			'F9IMG' => Image::class,
			'F9IMG2' => Image::class,
			'F9Vid' => File::class,
			
		];

		private static $owns = [
			'F2Bg',
			'F3Img1',
			'F3Img2',
			'F3Img3',
			'F3Bg',
			'F7IMG',
			'F8Bg',
			'F9IMG',
			'F9IMG2',
			'F9Vid',
		];

		private static $has_many = [
			'HomeBanners' => HomeBanner::class,
			'Histories' => History::class,
			'Locations' => Location::class,
			'Affiliates' => Affiliate::class,
		];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Home Page',
			'MenuTitle' => 'Home',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| Frame 1
			|----------------------------------------------- */
			$fields->addFieldToTab('Root.Frame1', new TabSet('HomeBanners',
				new Tab('List',
					GridField::create('HomeBanners', 'List of Home Banners', 
						$this->HomeBanners(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			/*
			|-----------------------------------------------
			| Frame 2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Text', array(
				new TextField('F2Title', 'Title'),
				new TextareaField('F2Desc', 'Description'),
			));

			$fields->addFieldsToTab('Root.Frame2.Image', array(
				$uploadf2 = new UploadField('F2Bg', 'Background Image')
			));

			/*
			|-----------------------------------------------
			| Frame 3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Solution', array(
				$uploadf3_1 = new UploadField('F3Img1', 'Image'),
				new TextField('F3Title1', 'Title'),
				new TextareaField('F3Desc1', 'Description'),
				new TextField('F3Btn1', 'Button Text'),
				new TextField('F3link1', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame3.Journeys', array(
				$uploadf3_2 = new UploadField('F3Img2', 'Image'),
				new TextField('F3Title2', 'Title'),
				new TextareaField('F3Desc2', 'Description'),
				new TextField('F3Btn2', 'Button Text'),
				new TextField('F3link2', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame3.ContactUs', array(
				$uploadf3_3 = new UploadField('F3Img3', 'Image'),
				new TextField('F3Title3', 'Title'),
				new TextareaField('F3Desc3', 'Description'),
				new TextField('F3Btn3', 'Button Text'),
				new TextField('F3link3', 'Link'),
			));

			$fields->addFieldsToTab('Root.Frame3.BackgroundImage', array(
				$uploadf3_4 = new UploadField('F3Bg', 'Background Image')
			));

			/*
			|-----------------------------------------------
			| Frame 4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Title', 'Title'),
				new TextareaField('F4Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| Frame 5
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame5.Main', array(
				new TextField('F5Title', 'Title'),
				new HTMLEditorField('F5Desc', 'Description'),
				new TextField('F5Btn', 'Button Text'),
				new TextField('F5Link', 'Link'),
			));

			/*
			|-----------------------------------------------
			| Frame 6
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame6.Main', array(
				new TextField('F6Title', 'Title'),
				new HTMLEditorField('F6Desc', 'Description'),
				new TextField('F6Btn', 'Button Text'),
				new TextField('F6Link', 'Link'),
			));

			/*
			|-----------------------------------------------
			| Frame 7
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame7.Main', array(
				new TextField('F7Title', 'Title'),
				new HTMLEditorField('F7Desc', 'Description'),
				$uploadf7 = new UploadField('F7IMG', 'Image'),
			));

			/*
			|-----------------------------------------------
			| Frame 8
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame8.TextBackground', array(
				new TextField('F8Title', 'Title'),
				$uploadf8 = new UploadField('F8Bg', 'Image'),
			));

			$fields->addFieldToTab('Root.Frame8.List', new TabSet('Histories',
				new Tab('List',
					GridField::create('Histories', 'List of Histories', 
						$this->Histories(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			/*
			|-----------------------------------------------
			| Frame 9
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame9.Main', array(
				new TextField('F9Title', 'Title'),
				new TextareaField('F9Desc', 'Description'),
				$uploadf9_1 = new UploadField('F9IMG', 'Vid Thumbnail'),
				$uploadf9_2 = new UploadField('F9Vid', 'Video'),
				$uploadf9_3 = new TextField('YTLink', 'Youtube Link'),
				$uploadf9_4 = new UploadField('F9IMG2', 'Play Button'),
			));

			/*
			|-----------------------------------------------
			| Frame 10
			|----------------------------------------------- */

			$fields->addFieldToTab('Root.Frame10.Main', new TabSet('Locations',
				new Tab('List',
					GridField::create('Locations', 'List of Locations', 
						$this->Locations(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			/*
			|-----------------------------------------------
			| Frame 10
			|----------------------------------------------- */

			$fields->addFieldsToTab('Root.Frame11.Main', array(
				new TextField('F11Title', 'Title'),
			));

			$fields->addFieldToTab('Root.Frame11.Main', new TabSet('Affiliates',
				new Tab('List',
					GridField::create('Affiliates', 'List of Affiliates', 
						$this->Affiliates(), 
					GridFieldConfig_RecordEditor::create(10)
					->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			));

			# SET FIELD DESCRIPTION 
			$uploadf2->setDescription('Max file size: 2MB | Dimension: 1366px x 500px');

			$uploadf3_1->setDescription('Max file size: 2MB | Dimension: 590px x 350px');
			$uploadf3_2->setDescription('Max file size: 2MB | Dimension: 590px x 350px');
			$uploadf3_3->setDescription('Max file size: 2MB | Dimension: 590px x 350px');
			$uploadf3_4->setDescription('Max file size: 2MB | Dimension: 1366px x 600px');

			$uploadf7->setDescription('Max file size: 2MB | Dimension: 150px x 150px');
			$uploadf8->setDescription('Max file size: 2MB | Dimension: 1366px x 900px');

			$uploadf9_1->setDescription('Max file size: 2MB | Dimension: 650px x 450px');
			$uploadf9_2->setDescription('Max file size: 5MB');
			$uploadf9_3->setDescription('Get the link from the URL, and replace watch?v= with embed/');
			$uploadf9_4->setDescription('Max file size: 2MB | Dimension: 90px x 90px');

			
			# Set destination path for the uploaded images.
			$uploadf2->setFolderName('HomePage/frame2');

			$uploadf3_1->setFolderName('HomePage/frame3');
			$uploadf3_2->setFolderName('HomePage/frame3');
			$uploadf3_3->setFolderName('HomePage/frame3');
			$uploadf3_4->setFolderName('HomePage/frame3');

			$uploadf7->setFolderName('HomePage/frame7');
			$uploadf8->setFolderName('HomePage/frame8');

			$uploadf9_1->setFolderName('HomePage/frame9');
			$uploadf9_2->setFolderName('HomePage/frame9');
			$uploadf9_4->setFolderName('HomePage/frame9');

			
			return $fields;
		}
	}

	class HomePageController extends PageController {


	}
}
