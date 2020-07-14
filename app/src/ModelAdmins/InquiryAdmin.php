<?php

namespace {
	use SilverStripe\Admin\ModelAdmin;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
	use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

	class InquiryAdmin extends ModelAdmin {

		private static $managed_models = [
			'ApplicantInquiry' => [
				'title' => 'Inquiries'
			],
		];

		public function getEditForm($id = null, $fields = null) {
			$form = parent::getEditForm($id, $fields);

			if($this->modelClass == 'ApplicantInquiry' && $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass))) {

				if($gridField instanceof GridField) {
					$gridField->getConfig()->addComponent(new GridFieldSortableRows('SortOrder'));
				}
			}

			return $form;
		}

		private static $menu_title = 'Applicant Inquiry Manager';
		private static $url_segment = 'applicant-inquiries';
		
	}
}