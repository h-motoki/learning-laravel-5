<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/articles">Blog</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="/articles">Articles</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
        </ul>
    </div>
</nav>
