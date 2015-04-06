<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Auth;
use Carbon\Carbon;

class ArticlesController extends Controller {

	public function __construct() {
		$this->middleware('auth', ['only' => 'create']);
	}

	public function index() {
		$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
		return view('articles.index', compact('articles'));
	}

	public function show(Article $article) {
		return view('articles.show', compact('article'));
	}

	public function create() {
		return view('articles.create');
	}

	public function store(ArticleRequest $request) {
		Auth::user()->articles()->create($request->all());
		return redirect('articles')->with([
			'flash_message' => 'Your article has been created!',
			'flash_message_important' => true,
		]);
	}

	public function edit(Article $article) {
		return view('articles.edit', compact('article'));
	}

	public function update(Article $article, ArticleRequest $request) {
		$article->update($request->all());
		return redirect('articles');
	}
}
