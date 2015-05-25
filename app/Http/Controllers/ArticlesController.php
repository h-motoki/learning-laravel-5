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
		$this->createArticle($request);
		flash()->success('Your article has been created!');
		return redirect('articles');
	}

	public function edit(Article $article) {
		$tags = Tag::lists('name', 'id');
		return view('articles.edit', compact('article', 'tags'));
	}

	public function update(ArticleRequest $request, Article $article) {
		$article->update($request->all());
		$tags = $request->input('tag_list');
		if (!is_array($tags)) {
			$tags = [];
		}
		$this->syncTags($article, $tags);
		return redirect('articles');
	}

	private function syncTags(Article $article, array $tags) {
		$currentTags = array_filter($tags, 'is_numeric');
		$newTags = array_diff($tags, $currentTags);
		foreach ($newTags as $newTag) {
			if ($tag = Tag::create(['name' => $newTag])) {
				$currentTags[] = $tag->id;
			}
		}
		$article->tags()->sync($currentTags);
	}

	private function createArticle(ArticleRequest $request) {
		$article = Auth::user()->articles()->create($request->all());
		$tags = $request->input('tag_list');
		if (!is_array($tags)) {
			return $article;
		}
		$this->syncTags($article, $tags);
		return $article;
	}
}
