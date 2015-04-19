<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;
use Carbon\Carbon;

class ArticlesController extends Controller {

	public function __construct() {
		$this->middleware('auth', ['except' => 'index', 'show']);
	}

	public function index() {
		$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
		return view('articles.index', compact('articles'));
	}

	public function show(Article $article) {
		return view('articles.show', compact('article'));
	}

	public function create() {
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request) {
		$article = Auth::user()->articles()->create($request->all());
		$article->tags()->attach($request->input('tag_list'));
		flash()->success('Your article has been created!');
		return redirect('articles');
	}

	public function edit(Article $article) {
		$tags = Tag::lists('name', 'id');
		return view('articles.edit', compact('article', 'tags'));
	}

	public function update(Article $article, ArticleRequest $request) {
		$article->update($request->all());
		$article->tags()->attach($request->input('tag_list'));
		return redirect('articles');
	}
}
