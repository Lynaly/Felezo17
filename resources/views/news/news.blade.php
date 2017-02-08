<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $news->title }}</h3>
    </div>
    <div class="panel-body">{{ $news->body }}</div>
    <div class="panel-footer"><i>{{ $news->createt_at->format('Y. m. d. H:i') }}</i></div>
</div>