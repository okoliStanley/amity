<?php
namespace amity;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Baum\Node;


class Page extends Node
{
	use PresentableTrait;

	protected $presenter = 'amity\presenter\PagePresenter';

	 public function updateOrder ($order, $orderPage) {
    	$orderPage = $this->findOrFail($orderPage);

    	if($order == 'before') {

    		$this->moveToLeftOf($orderPage);

    	} elseif($order == 'after') {

    		$this->moveToRightOf($orderPage);

    	} elseif($order =='childOf') {

    		$this->makeChildOf($orderPage);
    	}
    }

    protected $fillable =['title','name', 'uri', 'content', 'template', 'hidden'];

    public function setNameAttribute($value) {
    		$this->attributes['name'] = $value?: null;
    }

    public function setTemplateAttribute($value) {
    	$this->attributes['template'] = $value?: null;
    }


    
}
