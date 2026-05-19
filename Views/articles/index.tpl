{extends file="layouts/main.tpl"}

{block name="title"}Articles{/block}

{block name="content"}
<h1>Articles</h1>

{if $articles}
    {foreach $articles as $article}
    <div style="margin-bottom: 2rem; border-bottom: 1px solid #eee; padding-bottom: 1rem;">
        {if $article.image}
            <img src="{$article.image|escape}" alt="{$article.title|escape}" style="height:160px; object-fit:cover;">
        {/if}
        <h2 style="margin:.5rem 0;">
            <a href="/articles/{$article.id}">{$article.title|escape}</a>
        </h2>
        {if $article.description}
            <p style="color:#555;">{$article.description|escape}</p>
        {/if}
        <small style="color:#999;">Views: {$article.views}</small>
    </div>
    {/foreach}
{else}
    <p>No articles found.</p>
{/if}
{/block}
