<?php

namespace amity;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Post extends Model
{
	use PresentableTrait;

	 protected $presenter = 'amity\presenter\PostPresenter';


    protected $fillable = ['author_id', 'title', 'slug', 'body', 'excerpt', 'published_at'];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($value) {
    	$this->attributes['published_at'] = $value?:null;
    }

    public function author() {
    	return	$this->belongsTo(User::class);
    }
}
