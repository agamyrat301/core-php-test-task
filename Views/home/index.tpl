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
                <div class="flex-1">
                    <div class="rounded">
                        <img src="{$article.image|escape}" alt="{$article.title|escape}"/>
                    </div>
                    
                    <div class="p-2 flex-col gap-2">
                        <p>
                            {$article.title|escape}
                        </p>
                        <p>
                            {$article.created_at}
                        </p>

                        <p>
                            {$article.body}
                        </p>
                        <a href="/articles/{$article.id}">Continue reading</a>

                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    {/foreach}
    </div>
{else}
    <p>No categories found.</p>
{/if}
{/block}
