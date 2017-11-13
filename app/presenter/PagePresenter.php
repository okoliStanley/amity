<?php
 namespace amity\presenter;

use Laracasts\Presenter\Presenter;
use GrahamCampbell\Markdown\Facades\Markdown;


class PagePresenter extends Presenter {

	public function contentHtml() {
		return Markdown::convertToHtml($this->content);
	}
	public function prettyUri() {
		return '/'.ltrim($this->uri, '/');
	}

	public function linkToPaddedTitle($link) {
		$padding = str_repeat('&nbsp;', $this->depth * 4);

		return $padding.link_to($link, $this->title);
	}

	public function PaddedTitle() {
		return str_repeat('&nbsp;', $this->depth * 4).$this->title;

	}

	public function uri_wildcard() {
		return $this->uri.'*';
	}
}