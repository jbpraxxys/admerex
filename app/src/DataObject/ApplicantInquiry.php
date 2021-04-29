<?php

namespace {
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Assets\File;
    use SilverStripe\Forms\ReadonlyField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Versioned\Versioned;
    use SilverStripe\Control\Controller;

    class ApplicantInquiry extends DataObject {

        private static $db = [
            'SortOrder' => 'Int',
            'fullname' => 'Text',
            'contact' => 'Text',
            'email' => 'Text',
            'job' => 'Text',
            'pitch' => 'Text',
        ];

        private static $has_one = [
            'File' => File::class,
        ];

        private static $owns = [
            'File',
        ];

        private static $summary_fields = [
            'SortOrder' => 'Sort Order',
            'email' => 'Email Address',
        ];

        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Main', ReadonlyField::create('SortOrder', 'Sort Order'));
            $fields->addFieldToTab('Root.Main', new TextField('fullname', 'Client Name'));
            $fields->addFieldToTab('Root.Main', new TextField('contact', 'Client Number'));
            $fields->addFieldToTab('Root.Main', new TextField('email', 'Client Email'));
            $fields->addFieldToTab('Root.Main', new TextField('job', 'Client Job Post'));
            $fields->addFieldToTab('Root.Main', new TextareaField('pitch', 'Client Pitch'));
            $fields->addFieldToTab('Root.Main', $upload = UploadField::create('File','File'));

            # SET FIELD DESCRIPTION 
            $upload->setDescription('Max file size: 2MB | CV');
            # Set destination path for the uploaded images.
            $upload->setFolderName('careerpage/cv');

            $fields->removeByName('SortOrder');

            return $fields;
        }
    }
}
