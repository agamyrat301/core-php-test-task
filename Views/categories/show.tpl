{extends file="layouts/main.tpl"}

{block name="title"}{$category->name|escape}{/block}

{block name="content"}

<div class="category-header">
    <div>
        <h1>{$category->name|escape}</h1>
        {if $category->description}
            <p class="category-description">{$category->description|escape}</p>
        {/if}
    </div>

    <form class="sort-form" method="get">
        <label for="sort">Sort by</label>
        <select id="sort" name="sort" onchange="this.form.submit()">
            <option value="date"  {if $currentSort === 'date'}selected{/if}>Publication date</option>
            <option value="views" {if $currentSort === 'views'}selected{/if}>Most viewed</option>
        </select>
    </form>
</div>

{if $pagination.items->count() > 0}

    <div class="articles-grid">
        {foreach $pagination.items as $article}
            {include file="components/article-card.tpl" article=$article}
        {/foreach}
    </div>

    <div class="pagination">
        <span class="pagination__info">
            {$pagination.from}–{$pagination.to} of {$pagination.total}
        </span>

        <div class="pagination__links">
            {if $pagination.currentPage > 1}
                <a class="pagination__btn" href="?sort={$currentSort}&page={$pagination.currentPage - 1}">&laquo; Prev</a>
            {/if}

            {for $p = 1 to $pagination.lastPage}
                <a class="pagination__btn {if $p === $pagination.currentPage}pagination__btn--active{/if}"
                   href="?sort={$currentSort}&page={$p}">{$p}</a>
            {/for}

            {if $pagination.currentPage < $pagination.lastPage}
                <a class="pagination__btn" href="?sort={$currentSort}&page={$pagination.currentPage + 1}">Next &raquo;</a>
            {/if}
        </div>
    </div>

{else}
    <p>No articles in this category yet.</p>
{/if}

{/block}
