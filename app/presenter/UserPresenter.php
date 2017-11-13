<?php
namespace amity\presenter;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {
	public function LastLoginDiff () {
		return $this->last_login_at->diffForHumans();
		
	}
}