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

    class SocialMedia extends DataObject {

        private static $db = [
            'SortOrder' => 'Int',
            'SortID' => 'Int',
            'ssLink' => 'Text',
        ];

        private static $has_one = [
            'ssIcon' => Image::class,
            'HeaderFooter' => 'HeaderFooter',
        ];

        private static $owns = [
            'ssIcon',
        ];

        private static $summary_fields = [
            'SortOrder' => 'Sort Order',
            'ssLink' => 'Link',
        ];

        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Main', ReadonlyField::create('SortOrder', 'Sort Order'));
            
            $fields->addFieldToTab('Root.Main', new TextField('ssLink', 'Social Media Link'));
            $fields->addFieldToTab('Root.Main', $upload_1 = new UploadField('ssIcon', 'Social Media Icon'));


            # SET FIELD DESCRIPTION 
            $upload_1->setDescription('Max file size: 2MB | Dimension: within 20px x 20px');
            # Set destination path for the uploaded images.
            $upload_1->setFolderName('headerfooter');

            $fields->removeByName('SortOrder');
            $fields->removeByName('HeaderFooterID');
            $fields->removeByName('SortID');

            return $fields;
        }
    }
}
