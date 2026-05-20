{extends file="layouts/main.tpl"}

{block name="title"}Home{/block}

{block name="content"}
{if $categories}
    <div class="flex-col gap-4 flex">
    {foreach $categories as $cat}
        <div class="category-wrapper">
            <div class="flex justify-between items-center">
                <h1>
                {$cat.name|escape}
                </h1>

                <a href="categories/{$cat.id}">View all</a>    
            </div>
            <div class="flex justify-between items-center gap-4">

                {foreach $cat.articles as $article}
                    {include file="components/article-card.tpl" article=$article}
                {/foreach}
            </div>
        </div>
    {/foreach}
    </div>
{else}
    <p>No categories found.</p>
{/if}
{/block}
