{extends file="layouts/main.tpl"}

{block name="title"}Categories{/block}

{block name="content"}
<h1>Categories</h1>
{if $categories}
    <ul>
    {foreach $categories as $cat}
        <li style="margin-bottom:.5rem;">
            <a href="/categories/{$cat.id}">{$cat.name|escape}</a>
            {if $cat.description}
                &mdash; <span style="color:#555;">{$cat.description|escape}</span>
            {/if}
        </li>
    {/foreach}
    </ul>
{else}
    <p>No categories found.</p>
{/if}
{/block}
