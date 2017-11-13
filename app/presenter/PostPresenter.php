<?php
 namespace amity\presenter;

use Laracasts\Presenter\Presenter;
use League\CommonMark\Converter;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostPresenter extends Presenter {

	/*	protected $markdown;

	public function __construct($object,Converter $markdown) {
		$this->markdown = $markdown;

		parent::__construct($object);
	} */

	public function excerptHtml () {
		
		return $this->excerpt ? Markdown::convertToHtml($this->excerpt) :null;
	}

	public function bodyHtml () {
		return $this->body? Markdown::convertToHtml($this->body) : null;
	}
	public function publishedDate() {
		if($this->published_at) {
			return $this->published_at->toFormattedDateString();
		}

		return 'Not Yet Published';
	}
	public function publishedHighlight() {
		if($this->published_at && $this->published_at->isFuture()) {
			return 'info';
		} elseif(! $this->published_at) {
			return 'warning';
		}

	}
}