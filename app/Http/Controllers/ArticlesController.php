<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

class ArticlesController extends Controller {

	//

	public function __construct(){

		$this->middleware('auth', ['except' => 'index']);
	}

	public function index(){
	
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id){

		$article = Article::findOrFail($id);
		dd($article->created_at->diffForHumans());


		//dd($article);
		return view('articles.show', compact('article'));
	}

	public function create(){

		return view('articles.create');
	}

	public function store(ArticleRequest $request){

			//$input = Request::all();
			//$input['published_at'] = Carbon::now();

			//$article = new Article;

			//$article->title = $input['title'];
			//$article->body = $input['body'];
			//$article->published_at = Carbon::now();



			//Article::create($request->all());

			$article = new Article($request->all());
			Auth::user()->articles()->save($article);
			return redirect('articles');


	}

	public function edit($id){

		$article= Article::findOrFail($id);


		return view('articles.edit', compact('article'));
	}

	public function update($id, ArticleRequest $request){

		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}

	public function isATeamManager()
	{
		return false;
	}
}
