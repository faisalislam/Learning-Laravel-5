<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function about(){

	$anime= [
		'Fullmetal Alchemist', 'Slam Dunk', 'Inuyasha'
	];
		return view('pages.about', compact('anime'));
	}

	public function contact(){
		return view('pages.contact');
	}

}
