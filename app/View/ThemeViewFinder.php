<?php
namespace amity\View;

	use Illuminate\View\fileViewFinder;

	 class ThemeViewFinder extends fileViewFinder
	 {
	 	protected $activeTheme;

	 	protected $basePath;

	 	public function setBasePath($path)
	 	{
	 		$this->basePath = $path;
	 	}

	 	public function setActiveTheme($theme)
	 	{
	 		$this->activeTheme = $theme;

	 		array_unshift($this->paths, $this->basePath.'/'.$theme.'/views');
	 	}

	 	public function setHints($hints) {
	 		$this->hints = $hints;
	 	}
	}

