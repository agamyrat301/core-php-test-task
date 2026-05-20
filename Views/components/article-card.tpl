<div class="article-card">
    {if $article.image}
        <img src="{$article.image|escape}" alt="{$article.title|escape}" class="article-card__image">
    {/if}
    <div class="article-card__body">
        <h3 class="article-card__title">
            <a href="/articles/{$article.id}">{$article.title|escape}</a>
        </h3>
        {if $article.description}
            <p class="article-card__desc">{$article.description|escape}</p>
        {/if}
        <div class="article-card__meta">
            <span>{$article.created_at|date_format:'%d %b %Y'}</span>
            <span>{$article.views} views</span>
        </div>
    </div>
</div>
