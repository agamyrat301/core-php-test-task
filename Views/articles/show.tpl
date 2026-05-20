{extends file="layouts/main.tpl"}

{block name="title"}Articles{/block}

{block name="content"}
<h1></h1>

{if $article}
    
{else}
    <p>Article not found.</p>
{/if}
{/block}
