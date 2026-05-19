{extends file="layouts/main.tpl"}

{block name="title"}Home{/block}

{block name="content"}
{if $categories}
    <ul>
    {foreach $categories as $cat}
        <div class="category-wrapper">
        </div>
    {/foreach}
    </ul>
{else}
    <p>No categories found.</p>
{/if}
{/block}
