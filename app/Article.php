<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	//
	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id'
	];

	public function scopePublished($query){

		$query->where('published_at', '<=', Carbon::now());

	}

	public function scopeUnpublished($query){

		$query->where('published_at', '>', Carbon::now());

	}


	public function setPublishedAtAttributes($date){

			$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	public function user(){

		return $this->belongsTo('App\User');
	}

}
