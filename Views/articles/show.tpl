{extends file="layouts/main.tpl"}

{block name="title"}{$article->title|escape}{/block}

{block name="content"}

{if $article->image}
    <img src="{$article->image|escape}" alt="{$article->title|escape}" class="article-hero">
{/if}

<div class="article-detail">

    <h1 class="article-detail__title">{$article->title|escape}</h1>

    <div class="article-detail__meta">
        <span>{$article->created_at|date_format:'%d %b %Y'}</span>
        <span>{$article->views} views</span>
        {if $categories}
            <span>
                {foreach $categories as $cat}
                    <a href="/categories/{$cat.id}">{$cat.name|escape}</a>{if !$cat@last}, {/if}
                {/foreach}
            </span>
        {/if}
    </div>

    {if $article->description}
        <p class="article-detail__description">{$article->description|escape}</p>
    {/if}

    <div class="article-detail__body">
        {$article->body|escape|nl2br}
    </div>

</div>

{if $related && $related->count() > 0}
    <section class="related-articles">
        <h2>Related articles</h2>
        <div class="articles-grid">
            {foreach $related as $article}
                {include file="components/article-card.tpl" article=$article}
            {/foreach}
        </div>
    </section>
{/if}

{/block}
