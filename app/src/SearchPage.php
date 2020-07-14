<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;

	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\Forms\FormField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\ORM\ArrayList;
	use SilverStripe\ORM\PaginatedList;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
	use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

	class SearchPage extends Page {

		private static $db = [
			
		];

		private static $has_one = [
		];

		private static $owns = [
		];

		private static $has_many = [
		];



		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Search Page',
			'MenuTitle' => 'Search',
			'ShowInMenus' => false,
			'ShowInSearch' => false,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');
			
			return $fields;
		}
	}

	class SearchPageController extends PageController {

		private $searchResults;
		private $search;

		private $searchResultsAnnounce;
		private $searchResultsArticle;

		public function init() {
			parent::init();

			// $this->getProductsPage();
			$this->search();
		}

		private function search() {

			if(isset($_GET['q']) && !empty($_GET['q'])) {
				$this->search = ($_GET['q']);
			}

			$this->queryItems();
			$this->queryItemsAnnounce();
			$this->queryItemsArticle();
		}

		private function queryItems() {
			$results = new ArrayList();

			if($this->search) {
				$solution = Solution::get()->filterAny(Array(
					'SolTitle:PartialMatch:nocase' => $this->search,
					'Desc:PartialMatch:nocase' => $this->search
				));

				foreach ($solution as $p) { 
					$results->push($p);
				}
			}

			if(count($results) > 0){
				$this->searchResults = $results;
				// $this->successResponse();
				$this->PaginatedPages();
			}
			else{
				 $this->searchResults =  $results;
			}

		}

		private function queryItemsAnnounce() {
			$results = new ArrayList();

			if($this->search) {
				$announcement = Announcement::get()->filterAny(Array(
					'ATitle:PartialMatch:nocase' => $this->search,
					'Date:PartialMatch:nocase' => $this->search,
					'Desc:PartialMatch:nocase' => $this->search
				));

				foreach ($announcement as $p) { 
					$results->push($p);
				}
			}

			if(count($results) > 0){
				$this->searchResultsAnnounce = $results;
				// $this->successResponse();
				$this->PaginatedPages();
			}
			else{
				 $this->searchResultsAnnounce =  $results;
			}

		}

		private function queryItemsArticle() {
			$results = new ArrayList();

			if($this->search) {
				$article = Article::get()->filterAny(Array(
					'ATitle:PartialMatch:nocase' => $this->search,
					'Date:PartialMatch:nocase' => $this->search,
					'Desc:PartialMatch:nocase' => $this->search
				));

				foreach ($article as $p) { 
					$results->push($p);
				}
			}

			if(count($results) > 0){
				$this->searchResultsArticle = $results;
				// $this->successResponse();
				$this->PaginatedPages();
			}
			else{
				 $this->searchResultsArticle =  $results;
			}

		}

		public function getSearch() {
			return $this->search;
		}
		public function PaginatedPages() {
			$list = new PaginatedList($this->searchResults, $this->getRequest());
			$list->setPageLength(9);
		   	$list->setPaginationGetVar('page');
			return $list;
		}

		public function PaginatedPagesAnnounce() {
			$list = new PaginatedList($this->searchResultsAnnounce, $this->getRequest());
			$list->setPageLength(9);
		   	$list->setPaginationGetVar('page');
			return $list;
		}

		public function PaginatedPagesArticle() {
			$list = new PaginatedList($this->searchResultsArticle, $this->getRequest());
			$list->setPageLength(9);
		   	$list->setPaginationGetVar('page');
			return $list;
		}
	}
}
