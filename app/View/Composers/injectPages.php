<?php
namespace amity\View\Composers;

use amity\Page;
use Illuminate\View\View;

class injectPages {
		protected $pages;
	public function __construct(Page $pages) {
		$this->pages = $pages;
	}

	public function compose(View $view) {

		$pages = $this->pages->where('hidden', false)->get()->toHierarchy();

		$view->with('pages', $pages);

	}
}