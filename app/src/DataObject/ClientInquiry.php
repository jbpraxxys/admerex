<?php

namespace {
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\ReadonlyField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Versioned\Versioned;
    use SilverStripe\Control\Controller;

    class ClientInquiry extends DataObject {

        private static $db = [
            'SortOrder' => 'Int',
            'fullname' => 'Text',
            'contact' => 'Text',
            'email' => 'Text',
            'business' => 'Text',
            'service' => 'Text',
        ];

        private static $has_one = [
            
        ];

        private static $summary_fields = [
            'SortOrder' => 'Sort Order',
            'email' => 'Email Address',
        ];

        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Main', ReadonlyField::create('SortOrder', 'Sort Order'));
            $fields->addFieldToTab('Root.Main', new ReadonlyField('fullname', 'Client Name'));
            $fields->addFieldToTab('Root.Main', new ReadonlyField('contact', 'Client Number'));
            $fields->addFieldToTab('Root.Main', new ReadonlyField('email', 'Client Email'));
            $fields->addFieldToTab('Root.Main', new ReadonlyField('business', 'Client Line of Business'));
            $fields->addFieldToTab('Root.Main', new ReadonlyField('service', 'Client Service Interested In'));

            $fields->removeByName('SortOrder');

            return $fields;
        }
    }
}
